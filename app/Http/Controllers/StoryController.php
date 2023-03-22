<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Story',
                     'customcss' => $customcss,
                     'pagetitle' => 'Story',
                     'navactive' => '',
                     'baractive' => 'storybar'];
                     foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }


        $mystories = Story::where('id_user', auth()->user()->id)->get();

        return view('admin.story', [
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'mystories' => $mystories,
            'stgs' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'nullable|in:photo,video',
            'length' => 'nullable|integer|min:1',
            'src' => 'required',
            'preview' => 'nullable',
            'link' => 'nullable',
            'link_text' => 'nullable',
            'seen' => 'boolean',
        ]);

        $file = $validatedData['src'];
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;

        $newStory = new Story;
        $newStory->id_user = auth()->user()->id;
        $newStory->type = 'photo';
        $newStory->length = 15;
        $newStory->src = $fileName;
        $newStory->preview = $validatedData['preview'] ?? null;
        $newStory->link = $validatedData['link'] ?? null;
        $newStory->link_text = $validatedData['link_text'] ?? null;
        $newStory->seen = $validatedData['seen'] ?? false;
        $newStory->save();

        // Move uploaded file to storage
        $file->storeAs('public/stories', $fileName, 'public');

        return response()->json(['status' => 'success', 'story' => $newStory]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return response()->json(['status' => 'success']);
    }
}
