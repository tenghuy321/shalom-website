<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutListController extends Controller
{
    public function index()
    {
        $abouts = About::get();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $data = [
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
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('abouts', 'custom');
        }

        $i = About::create($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);
        $data = [
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
        ];

        if ($request->hasFile('icon')) {
            if ($about->icon && Storage::disk('custom')->exists($about->icon)) {
                Storage::disk('custom')->delete($about->icon);
            }

            $data['icon'] = $request->file('icon')->store('abouts', 'custom');
        }

        $i = $about->update($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }
}
