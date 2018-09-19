<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Picture;
use App\category;
use Carbon\Carbon;
use Storage;
use Route;

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
        $posts = Post::notArchived()->with('picture', 'category')->paginate(10);
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
            'description' => 'required|string|max:255',
            'post_type' => 'in:stage,formation,undetermined',
            'max_stud' => 'integer',
            'date_begin' => 'date',
            'date_end' => 'date',
            'price' => 'numeric',
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
        $category = Category::pluck('title', 'id')->all();
        $post = Post::find($id);
        $date_begin =  Carbon::parse($post->date_begin)->format('Y-m-d');
        $date_end =  Carbon::parse($post->date_end)->format('Y-m-d');
        return view('back.post.edit', ['post' => $post, 'category' => $category, 'date_begin' => $date_begin, 'date_end' => $date_end]);
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
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'post_type' => 'in:stage,formation,undetermined',
            'max_stud' => 'integer',
            'date_begin' => 'date',
            'date_end' => 'date',
            'price' => 'numeric',
            'category_id' => 'integer',
            'status' => 'in:published,unpublished',
            'picture' => 'image|max:3000',
        ]);

        $post = Post::find($id); // associé les fillables

        $post->update($request->all());
        
        // image
        $im = $request->file('picture');

        if(!empty($im)){

            $link = $im->store('images');

            // suppression de l'image si elle existe 
            if(is_null($post->picture)==false){
                Storage::disk('local')->delete($post->picture->link); // supprimer physiquement l'image
                $post->picture()->delete(); // supprimer l'information en base de données
            }

            $post->picture()->create([
                'title' => $request->title_image?? $request->title,
                'link' => $link
            ]);
        }

        return redirect()->route('post.index')->with('message', 'success');
        // dump($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('message', 'success delete');
    }
    
    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');

        // var_dump("Post.deleteMultiple()", $ids);
        // exit();

        $post = Post::whereIn('id', $ids);
        $post->delete();
        return redirect()->route('post.archiveList')->with('message', 'success delete');
    }

    public function archiveMultiple(Request $request)
    {
        $archiveIds = $request->input('ids');

        // var_dump("Post.archiveMultiple()", $archiveIds);
        // exit();

        // $posts = Post::pluck('id')->where('id', $ids);
        Post::whereIn('id', $archiveIds)
                ->update(['status' => 'archived']);
        // return view('post.archiveMultiple');
        flashy('Vos posts on bien été archivé!');
        return redirect()->route('post.index')->with('message', 'archivage des posts');
    }

    public function deleteSingle($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'success delete');
    }

    public function showArchive()
    {
        $posts = Post::archived()->where('status', 'archived')->with('picture', 'category')->paginate(10);
        // var_dump( $posts);
        // exit();
        return view('back.post.archive', ['posts' => $posts]);
    }
}
