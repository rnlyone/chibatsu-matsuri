<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        $settings = ['title' => ': Artikel',
                        'customcss' => $customcss,
                        'pagetitle' => 'List Artikel Blog',
                        'navactive' => '',
                        'baractive' => 'lombabar'];
                        foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                        }

        $blogs = Blog::all();

        return view('admin.blog', [
            'blogs' => $blogs,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings]);
    }

    public function blogdetail($uuid)
    {
        $article = Blog::where('uuid', $uuid)->first();

        #page_setup
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        try {
            $other['prev'] = Blog::where('id', '<', $article->id)->orderBy('id', 'desc')->first()->uuid;
        } catch (\Throwable $th) {
            $other['prev'] = null;
        }

        try {
            $other['next'] = Blog::where('id', '>', $article->id)->orderBy('id', 'desc')->first()->uuid;
        } catch (\Throwable $th) {
            $other['next'] = null;
        }

        $latest = Blog::latest()->take(3)->get();

        return view('blog.blogdetail', [
            'article' => $article,
            'other' => $other,
            'latest' => $latest,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $customcss = '';
        $jmlsetting = Setting::where('group', 'env')->get();
        $settings = ['title' => ': Blog',
                     'customcss' => $customcss,
                     'pagetitle' => 'Blog',
                     'navactive' => '',
                     'baractive' => ''];
                    foreach ($jmlsetting as $i => $set) {
                        $settings[$set->setname] = $set->value;
                     }

        return view('admin.blog.buatartikel', [
            'article' => $blog,
            'customcss' => $customcss,
            $settings['navactive'] => '-active-links',
            $settings['baractive'] => 'active',
            'stgs' => $settings,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
