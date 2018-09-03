<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Picture;
use App\category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "dashboard";
        $posts = Post::with('picture', 'category')->paginate(10);
        return view('back.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title', 'id')->all();
        return view('back.post.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'post_type' => 'in:stage,formation,undetermined',
            'max_stud' => 'integer',
            'date_begin' => 'date',
            'date_end' => 'date',
            'price' => 'integer',
            'category_id' => 'integer',
            'status' => 'in:published,unpublished',
            'picture' => 'image|max:3000',
        ]);

        $post = Post::create($request->all());
        
        // image
        $im = $request->file('picture');

        if(!empty($im)){
            // ... faire quelque chose si il y a une image

            $link = $im->store('images');

            $post->picture()->create([
                'title' => $request->title_image?? $request->title,
                'link' => $link
            ]);
        }

        return redirect()->route('post.index')->with('message', 'success');
        // dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('back.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
