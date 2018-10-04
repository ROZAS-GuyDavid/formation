@extends('layouts.master')

@section('content')
<h1 class="text-center my-4 animated fadeIn delay2">Les posts</h1>
    {{$posts->links()}}
    @include('back.post.partials.flash')
    <a href="{{route('post.create')}}"><button type="button" class="btn btn-info">créez un poste</button></a>
    <form action="{{route('archiveMultiple')}}" method="POST">    
        <table class="table table-striped">
            {!! csrf_field() !!}
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type de poste</th>
                    <th>Date de publication</th>
                    <th>Prix</th>
                    <th>Statut</th>
                    <th>Editer</th>
                    <th>Archiver</th>
                    <th><button type="submit" class="btn btn-warning btn-xs"><i class="fas fa-archive"></i> Archiver en trie par lot >></button></th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                    @foreach($posts as $post)
                        <tr class="fadeInUp post post{{$loop->iteration}}">
                            <td><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></td>
                            <td>{{$post->post_type}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->price}} €</td>
                            <td class="text-center">
                                @if($post->status == 'published')
                                <span class="badge badge-success">published</span>
                                @elseif($post->status == 'unpublished')
                                <span class="badge badge-secondary">unpublished</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('post.edit', $post->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('archiveSingle', $post->id)}}" class="btn btn-warning"><i class="fas fa-archive"></i></a>
                            </td>
                            <td class=" d-block text-center">
                                <input type="checkbox" name="ids[]" value="{{$post->id}}">
                            </td>

                        </tr>
                    @endforeach
                @else
                    Commencer par créer un poste ...
                @endif
            </tbody>
        </table>
    </form>
        {{$posts->links()}}
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
    <script src="{{asset('js/animeIndex.js')}}"></script>
    <script src="{{asset('js/animeFadeIn.js')}}"></script>
@endsection