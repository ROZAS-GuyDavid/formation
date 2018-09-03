<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // importez l'alias de la classe
use App\Category;
use App\Picture;

class FrontController extends Controller
{
    public function index(){
        // $posts = Post::all(); // retourne tous les post de l'application
        // $categorys = Category::all();
        // return view('front.index', ['posts' => $posts, 'categorys' => $categorys]); 
        

        // $prefix = request()->page?? 'home';
        // $path = 'post' . $prefix;

        // $posts = Cache::remember($path, 60*24, function(){
        //     return Book::unpublished()->with('picture','category')->paginate(5);
        // });
        $posts = Post::published()->futurFormationStage()->with('picture','category')->limit(2)->get();
        // rien ne saffichera si il n'y a pas de post anteriéure a aujourd'hui avec le status plublished

        return view('front.index', ['posts' => $posts]); 
    }

    public function show(int $id){
        $post = Post::find($id);

        return view('front.show', ['post' => $post]); 
    }

    public function showStage(){
        $posts = Post::published()->where('post_type' , 'stage')->get();

        return view('front.stage', ['posts' => $posts]); 
    }

    public function showFormation(){
        $posts = Post::published()->where('post_type' , 'formation')->get();

        return view('front.formation', ['posts' => $posts]); 
    }

    public function showContact(){
        return view('front.contact'); 
    }
    public function showSearch(Request $request){

        // dd($request->search); // die avec vardump Laravel
        $query = $request->search;

        // requete 
        $posts = Post::published()->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate(10);

        return view('front.search', ['posts' => $posts, 'query' => $query]); 
    }
}
