@extends('layouts.master')

@section('content')
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
                    <th>Delete</th>
                    <!-- <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button></th> -->
                    <th><button type="submit" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-remove">Archive selected</i></button></th>
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
                        <td>
                            @if($post->status == 'published')
                            <button type="button" class="btn btn-success">published</button>
                            @elseif($post->status == 'archived')
                            <button type="button" class="btn btn-default">archived</button>
                            @else
                            <button type="button" class="btn btn-warning">unpublished</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('post.show', $post->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">eye-open</span></a>
                        </td>
                        <td>
                            <a href="{{route('post.edit', $post->id)}}"><i class="fa fa-edit">edit</i></a>
                        </td>
                        <td>
                            {{-- <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form> --}}
                            <a href="{{route('deleteSingle', $post->id)}}" class="btn btn-danger">delete</a>
                        </td>
                        <td>
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