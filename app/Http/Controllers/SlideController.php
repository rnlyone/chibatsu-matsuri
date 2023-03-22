<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
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
        $settings = ['title' => ': Slides',
                     'customcss' => $customcss,
                     'pagetitle' => 'Slides',
                     'navactive' => '',
                     'baractive' => 'slidesbar'];
                     foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }


        $slides = Slide::all();

        return view('admin.slides', [
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'slides' => $slides,
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
            'photo' => 'required',
            'link' => 'nullable',
        ]);

        $file = $validatedData['photo'];
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;

        $newSlide = new Slide;
        $newSlide->photo = $fileName;
        $newSlide->link = $validatedData['link'] ?? "#";
        $newSlide->save();

        // Move uploaded file to storage
        $file->storeAs('public/slides', $fileName, 'public');

        return response()->json(['status' => 'success', 'slide' => $newSlide]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return response()->json(['status' => 'success']);
    }
}
