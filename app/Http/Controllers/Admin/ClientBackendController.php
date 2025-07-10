<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientBackendController extends Controller
{
    public function index()
    {
        $clients = Client::get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('clients/images'), $filename);
                $imagePaths[] = 'clients/images/' . $filename;
            }
        }

        Client::create([
            'image' => json_encode($imagePaths), // Save as JSON
        ]);

        return redirect()->route('client-backend.index')->with('success', 'Client added successfully.');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $existingImages = json_decode($client->image, true) ?? [];
        $removed = json_decode($request->removed_images, true) ?? [];
        $imageOrder = json_decode($request->image_order, true) ?? [];

        // Remove deleted images
        $existingImages = array_filter($existingImages, function ($img) use ($removed) {
            if (in_array($img, $removed)) {
                $path = public_path($img);
                if (file_exists($path)) unlink($path);
                return false;
            }
            return true;
        });

        // Upload new images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('clients/images'), $filename);
                $existingImages[] = 'clients/images/' . $filename;
            }
        }

        // Reorder existing images according to image_order
        $orderedImages = [];
        foreach ($imageOrder as $imgPath) {
            if (in_array($imgPath, $existingImages)) {
                $orderedImages[] = $imgPath;
            }
        }

        // Add any images not in order array (new uploads or missed)
        foreach ($existingImages as $imgPath) {
            if (!in_array($imgPath, $orderedImages)) {
                $orderedImages[] = $imgPath;
            }
        }

        $client->update([
            'image' => json_encode(array_values($orderedImages)),
        ]);

        return redirect()->route('client-backend.index')->with('success', 'Client updated successfully.');
    }
}
