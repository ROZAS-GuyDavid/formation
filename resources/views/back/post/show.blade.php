@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card my-4">
        @if(is_null($post->picture) == false)
        <div style="height: 38rem;overflow: hidden;">
            <img class="card-img-top" src="{{url('images',$post->picture->link)}}" alt=""  style="margin-top: -25%;">    
        </div>
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
            <li class="list-group-item">maximum d'élèves : {{$post->max_stud}}</li>
            <li class="list-group-item">{{$post->price}} €</li>
        </ul>
    </div>
</div>
@endsection