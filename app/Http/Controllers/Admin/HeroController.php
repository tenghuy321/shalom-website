<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::get();

        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create');
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services/image', 'custom');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services/icon', 'custom');
        }

        $i = Hero::create($data);

        return $i
            ? redirect()->route('hero.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(Request $request, string $id)
    {
        $hero = Hero::findOrFail($id);
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
            if ($hero->icon && Storage::disk('custom')->exists($hero->icon)) {
                Storage::disk('custom')->delete($hero->icon);
            }

            $data['icon'] = $request->file('icon')->store('heroes/icon', 'custom');
        }

        if ($request->hasFile('image')) {
            if ($hero->image && Storage::disk('custom')->exists($hero->image)) {
                Storage::disk('custom')->delete($hero->image);
            }

            $data['image'] = $request->file('image')->store('heroes/image', 'custom');
        }

        $i = $hero->update($data);

        return $i
            ? redirect()->route('hero.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }
}
