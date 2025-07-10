<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $nextOrder = Faq::max('order') + 1;

        $data = [
            'question' => [
                'en' => $request->input('question.en', ''),
                'kh' => $request->input('question.kh', ''),
                'ch' => $request->input('question.ch', ''),
            ],
            'answer' => [
                'en' => $request->input('answer.en', ''),
                'kh' => $request->input('answer.kh', ''),
                'ch' => $request->input('answer.ch', ''),
            ],
            'order' => $nextOrder,
        ];

        $i = Faq::create($data);

        return $i
            ? redirect()->route('faq.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to Create.')->withInput();
    }

    public function edit(string $id)
    {

        $faq = Faq::findOrFail($id);

        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);
        $data = [
            'question' => [
                'en' => $request->input('question.en', ''),
                'kh' => $request->input('question.kh', ''),
                'ch' => $request->input('question.ch', ''),
            ],
            'answer' => [
                'en' => $request->input('answer.en', ''),
                'kh' => $request->input('answer.kh', ''),
                'ch' => $request->input('answer.ch', ''),
            ],
        ];

        $i = $faq->update($data);

        return $i
            ? redirect()->route('faq.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('succees', 'Failed to updated');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Faq::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $faq = Faq::findOrFail($id);

        $deleted = $faq->delete();

        return $deleted
            ? redirect()->route('faq.index')->with('success', 'Deleted Successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
