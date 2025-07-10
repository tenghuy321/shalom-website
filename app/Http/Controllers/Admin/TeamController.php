<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('order')->get();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.en' => 'nullable|string|max:255',
            'position.en' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'link' => 'nullable',
        ]);
        $nextOrder = Team::max('order') + 1;

        $data = [
            'name' => [
                'en' => $request->input('name.en', ''),
                'kh' => $request->input('name.kh', ''),
                'ch' => $request->input('name.ch', ''),
            ],
            'position' => [
                'en' => $request->input('position.en', ''),
                'kh' => $request->input('position.kh', ''),
                'ch' => $request->input('position.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'link' => $request->link,
            'order' => $nextOrder,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'custom');
        }

        $i = Team::create($data);

        return $i
            ? redirect()->route('team.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);
        $request->validate([
            'name.en' => 'nullable|string|max:255',
            'position.en' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'link' => 'nullable',
        ]);

        $data = [
            'name' => [
                'en' => $request->input('name.en', ''),
                'kh' => $request->input('name.kh', ''),
                'ch' => $request->input('name.ch', ''),
            ],
            'position' => [
                'en' => $request->input('position.en', ''),
                'kh' => $request->input('position.kh', ''),
                'ch' => $request->input('position.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'link' => $request->link,
        ];

        if ($request->hasFile('image')) {
            if ($team->image && Storage::disk('custom')->exists($team->image)) {
                Storage::disk('custom')->delete($team->image);
            }

            $data['image'] = $request->file('image')->store('teams', 'custom');
        }

        $i = $team->update($data);

        return $i
            ? redirect()->route('team.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Team::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
