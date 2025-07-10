<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventBackendController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('order')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $imagePaths = [];
        $nextOrder = Event::max('order') ?? 0;
        $nextOrder++;

        if ($request->hasFile('image')) {
            $uploadedImages = $request->file('image');
            $imageOrder = json_decode($request->input('image_order'), true);

            if (!is_array($imageOrder)) {
                $imageOrder = [];
            }

            $orderedImages = [];

            foreach ($imageOrder as $name) {
                foreach ($uploadedImages as $img) {
                    if ($img->getClientOriginalName() === $name) {
                        $orderedImages[] = $img;
                        break;
                    }
                }
            }

            if (count($orderedImages) !== count($uploadedImages)) {
                $orderedImages = $uploadedImages; // fallback
            }

            foreach ($orderedImages as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('events/images'), $filename);
                $imagePaths[] = 'events/images/' . $filename;
            }
        }

        $event = new Event();
        $event->title = [
            'en' => $request->input('title.en', ''),
            'kh' => $request->input('title.kh', ''),
            'ch' => $request->input('title.ch', ''),
        ];
        $event->content = [
            'en' => $request->input('content.en', ''),
            'kh' => $request->input('content.kh', ''),
            'ch' => $request->input('content.ch', ''),
        ];
        $event->order = $nextOrder;
        $event->image = $imagePaths;

        $event->save();

        return redirect()->route('event-backend.index')->with('success', 'Added successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $existingImages = $event->image ?? [];
        $removed = json_decode($request->input('removed_images', '[]'), true);
        $imageOrder = json_decode($request->input('image_order', '[]'), true);

        // Step 1: Remove deleted images
        $existingImages = array_filter($existingImages, function ($img) use ($removed) {
            if (in_array($img, $removed)) {
                $path = public_path($img);
                if (file_exists($path)) {
                    unlink($path);
                }
                return false;
            }
            return true;
        });

        // Step 2: Upload new images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('events/images'), $filename);
                $existingImages[] = 'events/images/' . $filename;
            }
        }

        // Step 3: Reorder images based on given image_order
        $orderedImages = [];

        foreach ($imageOrder as $imgPath) {
            if (in_array($imgPath, $existingImages)) {
                $orderedImages[] = $imgPath;
            }
        }

        // Include any images that were not part of the ordering array
        foreach ($existingImages as $imgPath) {
            if (!in_array($imgPath, $orderedImages)) {
                $orderedImages[] = $imgPath;
            }
        }

        // Step 4: Update event
        $event->update([
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'image' => array_values($orderedImages),
        ]);

        return redirect()->route('event-backend.index')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);

        // Delete associated images from storage
        if (is_array($event->image)) {
            foreach ($event->image as $imgPath) {
                $fullPath = public_path($imgPath);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }

        // Delete event record
        $event->delete();

        return redirect()->route('event-backend.index')->with('success', 'Deleted successfully.');
    }
}
