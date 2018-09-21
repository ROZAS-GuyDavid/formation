@extends('layouts.master')

@section('content')
<h1 class="text-center my-4">Les posts</h1>
    {{$posts->links()}}
    @include('back.post.partials.flash')
    <a href="{{route('post.create')}}"><button type="button" class="btn btn-info">créez un post</button></a>
    <form action="{{route('archiveMultiple')}}" method="POST">    
        <table class="table table-striped">
            {!! csrf_field() !!}
            <thead>
                <tr>
                    <th>Title</th>
                    <th>type de post</th>
                    <th>Date de publication</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>prix</th>
                    <th>Status</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Archive</th>
                    <th><button type="submit" class="btn btn-warning btn-xs"><i class="fas fa-archive"></i> Archive selected</button></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->post_type}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->date_begin}}</td>
                        <td>{{$post->date_end}}</td>
                        <td>{{$post->price}}</td>
                        <td class="text-center">
                            @if($post->status == 'published')
                            <span class="badge badge-success">published</span>
                            @elseif($post->status == 'unpublished')
                            <span class="badge badge-secondary">unpublished</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('post.show', $post->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
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
                @empty
                    aucun post ...
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