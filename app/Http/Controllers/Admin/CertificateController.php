<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $nextOrder = Certificate::max('order') + 1;

        $data = [
            'order' => $nextOrder,
        ];
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates', 'custom');
        }

        $i = Certificate::create($data);

        return $i
            ? redirect()->route('certificate.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, string $id)
    {
        $certificate = Certificate::findOrFail($id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($certificate->image && Storage::disk('custom')->exists($certificate->image)) {
                Storage::disk('custom')->delete($certificate->image);
            }

            $data['image'] = $request->file('image')->store('certificates', 'custom');
        }

        $i = $certificate->update($data);

        return $i
            ? redirect()->route('certificate.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Certificate::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $certificate = Certificate::findOrFail($id);

        $deleted = $certificate->delete();

        return $deleted
            ? redirect()->route('certificate.index')->with('success', 'Deleted Successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
