<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
         
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $input = $request->all();

        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }

        Post::create($input);
         
        return redirect()->route('posts.index')
            ->with('success','Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    { 
        $input = $request->all();

        if ($thumbnail = $request->file('thumbnail')) {
            if($post->thumbnail){
                $image = Post::find($post->id);
                unlink("img/".$image->thumbnail);
            }
            
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }else{
            unset($input['thumbnail']);
        }

        $post->update($input);
         
        return redirect()->route('posts.index')
            ->with('success','Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->thumbnail){
            $image = Post::find($post->id);
            unlink("img/".$image->thumbnail);
        }

        $post->delete();
  
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully!');
    }
}
