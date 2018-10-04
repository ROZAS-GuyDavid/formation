@extends('layouts.master')

@section('content')
<h1 class="text-center my-4 animated fadeIn delay2">Formation / Stage</h1>

<div class="row d-flex justify-content-around">
    @if (count($posts) > 0)
        @foreach($posts as $post)
        <div class="card mb-4 zoomIn post post{{$loop->iteration}}" style="width: 22rem;">
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
        @endforeach
    @else
    <div class="alert alert-info" role="alert">Désolé pour l'instant aucun post n'est publié sur le site</div>
    @endif

@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/animeIndex.js')}}"></script>
    <script src="{{asset('js/animeFadeIn.js')}}"></script>
@endsection