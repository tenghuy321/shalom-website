<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerBackendController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {

        $nextOrder = Partner::max('order') + 1;

        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'date' => [
                'en' => $request->input('date.en', ''),
                'kh' => $request->input('date.kh', ''),
                'ch' => $request->input('date.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
            'order' => $nextOrder,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partners/images', 'custom');
        }

        if ($request->hasFile('our_logo')) {
            $data['our_logo'] = $request->file('our_logo')->store('partners/logos', 'custom');
        }
        if ($request->hasFile('our_logo')) {
            $data['partner_logo'] = $request->file('partner_logo')->store('partners/logos', 'custom');
        }

        $i = Partner::create($data);

        return $i
            ? redirect()->route('partner.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
                'ch' => $request->input('title.ch', ''),
            ],
            'date' => [
                'en' => $request->input('date.en', ''),
                'kh' => $request->input('date.kh', ''),
                'ch' => $request->input('date.ch', ''),
            ],
            'content' => [
                'en' => $request->input('content.en', ''),
                'kh' => $request->input('content.kh', ''),
                'ch' => $request->input('content.ch', ''),
            ],
        ];

        if ($request->hasFile('our_logo')) {
            if ($partner->our_logo && Storage::disk('custom')->exists($partner->our_logo)) {
                Storage::disk('custom')->delete($partner->our_logo);
            }

            $data['our_logo'] = $request->file('our_logo')->store('partners/logos', 'custom');
        }

        if ($request->hasFile('partner_logo')) {
            if ($partner->partner_logo && Storage::disk('custom')->exists($partner->partner_logo)) {
                Storage::disk('custom')->delete($partner->partner_logo);
            }

            $data['partner_logo'] = $request->file('partner_logo')->store('partners/logos', 'custom');
        }

        if ($request->hasFile('image')) {
            if ($partner->image && Storage::disk('custom')->exists($partner->image)) {
                Storage::disk('custom')->delete($partner->image);
            }

            $data['image'] = $request->file('image')->store('services/image', 'custom');
        }

        $i = $partner->update($data);

        return $i
            ? redirect()->route('partner.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Partner::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->image && Storage::disk('custom')->exists($partner->image)) {
            Storage::disk('custom')->delete($partner->image);
        }

        if ($partner->our_logo && Storage::disk('custom')->exists($partner->our_logo)) {
            Storage::disk('custom')->delete($partner->our_logo);
        }

        if ($partner->partner_logo && Storage::disk('custom')->exists($partner->partner_logo)) {
            Storage::disk('custom')->delete($partner->partner_logo);
        }

        $deleted = $partner->delete();

        return $deleted
            ? redirect()->route('partner.index')->with('success', 'Deleted Successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
