<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.views.add-news');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('images');
        $filename = time() . $file[0]->getClientOriginalName();
        $file[0]->move(public_path('news_images'), $filename);
         $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
        ]);
        return redirect()->route('add.news');
    }

    /**
     * Display the specified resource.
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost($id)
    {
        $post = Post::where('id', $id)->delete();

        return redirect()->route('news');
    }
}
