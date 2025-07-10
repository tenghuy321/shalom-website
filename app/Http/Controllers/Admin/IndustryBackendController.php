<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndustryBackendController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('order')->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'title.ch' => 'nullable|string|max:255',
        ]);
        $nextOrder = Industry::max('order') + 1;

        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'order' => $nextOrder,
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('industries', 'custom');
        }

        $i = Industry::create($data);

        return $i
            ? redirect()->route('industry-backend.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $industry = Industry::findOrFail($id);
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, string $id)
    {
        $industry = Industry::findOrFail($id);
        $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'title.ch' => 'nullable|string|max:255',
        ]);

        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
        ];

        if ($request->hasFile('image')) {
            if ($industry->image && Storage::disk('custom')->exists($industry->image)) {
                Storage::disk('custom')->delete($industry->image);
            }

            $data['image'] = $request->file('image')->store('industries', 'custom');
        }

        $i = $industry->update($data);

        return $i
            ? redirect()->route('industry-backend.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Industry::where('id', operator: $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $industry = Industry::findOrFail($id);

        if ($industry->icon && Storage::disk('custom')->exists($industry->icon)) {
            Storage::disk('custom')->delete($industry->icon);
        }

        $deleted = $industry->delete();

        return $deleted
            ? redirect()->route('industry-backend.index')->with('success', 'Deleted Successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
