@extends('layouts.master')

@section('content')
<h1 class="text-center my-4 animated fadeIn delay2">resultat(s) de recherche pour "{{$query}}"</h1>
{{$posts->links()}}

<div class="row d-flex justify-content-around">
    @forelse($posts as $post)
    <div class="card mb-4" style="width: 22rem;">
        @if(is_null($post->picture) == false)
        <img class="card-img-top" src="{{url('images',$post->picture->link)}}" alt="">    
        @endif
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('post', $post->id)}}">{{$post->title}}</a>
                <span>
                    @if(is_null($post->category) == false)
                    {{$post->category->title}}
                    @endif
                </span>
            </h5>
            <p class="card-text">Description : {{$post->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">du {{$post->date_begin}} au {{$post->date_end}}</li>
        </ul>
    </div>
    @empty
    <div class="alert alert-info" role="alert">Il n’y a aucun résultat pour votre recherche</div>
    @endforelse
</div>
@endsection