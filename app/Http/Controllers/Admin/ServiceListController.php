<?php

namespace App\Http\Controllers\Admin;

use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceListController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {

        $nextOrder = Services::max('order') + 1;

        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'full_title' => [
                'en' => $request->input('full_title.en', ''),
                'kh' => $request->input('full_title.kh', ''),
                'ch' => $request->input('full_title.ch', ''),
            ],
            'content_display' => [
                'en' => $request->input('content_display.en', ''),
                'kh' => $request->input('content_display.kh', ''),
                'ch' => $request->input('content_display.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'slug' => Str::slug($request->input('title.en', '')),
            'order' => $nextOrder,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services/image', 'custom');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services/icon', 'custom');
        }

        $i = Services::create($data);

        return $i
            ? redirect()->route('servicelist.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $service = Services::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Services::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'full_title' => [
                'en' => $request->input('full_title.en', ''),
                'kh' => $request->input('full_title.kh', ''),
                'ch' => $request->input('full_title.ch', ''),
            ],
            'content_display' => [
                'en' => $request->input('content_display.en', ''),
                'kh' => $request->input('content_display.kh', ''),
                'ch' => $request->input('content_display.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'slug' => Str::slug($request->input('title.en', '')),
        ];

        if ($request->hasFile('icon')) {
            if ($service->icon && Storage::disk('custom')->exists($service->icon)) {
                Storage::disk('custom')->delete($service->icon);
            }

            $data['icon'] = $request->file('icon')->store('services/icon', 'custom');
        }

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('custom')->exists($service->image)) {
                Storage::disk('custom')->delete($service->image);
            }

            $data['image'] = $request->file('image')->store('services/image', 'custom');
        }

        $i = $service->update($data);

        return $i
            ? redirect()->route('servicelist.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Services::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $service = Services::findOrFail($id);
        if ($service->image && Storage::disk('custom')->exists($service->image)) {
            Storage::disk('custom')->delete($service->image);
        }
        if ($service->icon && Storage::disk('custom')->exists($service->icon)) {
            Storage::disk('custom')->delete($service->icon);
        }

        $deleted = $service->delete();

        return $deleted
            ? redirect()->route('servicelist.index')->with('success', 'Deleted Successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
