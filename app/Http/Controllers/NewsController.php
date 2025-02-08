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
    public function edit($id)  
    {  
        $post = Post::findOrFail($id);  
        return view('admin.views.news-edit', compact('post'));  
    }  
    
    public function update(Request $request, $id)  
{  
    $post = Post::findOrFail($id);  
    
    $validatedData = $request->validate([  
        'title' => 'required|max:255',  
        'content' => 'required',  
        'images' => 'nullable|array',  
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'  
    ]);  

    // For debugging  
    \Log::info('Received content:', ['content' => $request->content]);  

    try {  
        // Handle image upload if present  
        if ($request->hasFile('images')) {  
            // Delete old image  
            if ($post->image && file_exists(public_path('news_images/' . $post->image))) {  
                unlink(public_path('news_images/' . $post->image));  
            }  
            
            // Save new image  
            $file = $request->file('images');  
            $filename = time() . $file[0]->getClientOriginalName();  
            $file[0]->move(public_path('news_images'), $filename);  
            $post->image = $filename;  
        }  

        // Update post  
        $post->title = $request->title;  
        $post->content = $request->content;  
        $post->save();  

        return redirect()->route('news.index')->with('success', 'News post updated successfully!');  
    } catch (\Exception $e) {  
        \Log::error('Error updating post:', ['error' => $e->getMessage()]);  
        return back()->with('error', 'Error updating post: ' . $e->getMessage());  
    }  
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
