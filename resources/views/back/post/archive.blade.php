@extends('layouts.master')

@section('content')
<h1 class="text-center my-4">Archives</h1>
    {{$posts->links()}}
    @include('back.post.partials.flash')
    <form action="{{route('deleteMultiple')}}" method="POST" id="formDeleteMultiple">    
        <table class="table table-striped">
            {!! csrf_field() !!}
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type de poste</th>
                    <th>Date de publication</th>
                    <th>Prix</th>
                    <th>Désarchiver</th>
                    <th>Editer</th>
                    <th>supprimer</th>
                    <th><button type="submit" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Supprimer en trie par lot >></button></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->post_type}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->price}}</td>
                        <td class="text-center">
                            <a href="{{route('unArchiveSingle', $post->id)}}" class="btn btn-warning"><i class="fas fa-archive"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('deleteSingle', $post->id)}}" class="btn btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <td class=" d-block text-center">
                            <input type="checkbox" name="ids[]" value="{{$post->id}}">
                        </td>

                    </tr>
                @empty
                    Vous n'avez aucun poste archivé...
                @endforelse
            </tbody>
        </table>
    </form>
        {{$posts->links()}}
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection