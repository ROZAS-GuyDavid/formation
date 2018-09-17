@extends('layouts.master')

@section('content')
    {{$posts->links()}}
    @include('back.post.partials.flash')
    <a href="{{route('post.create')}}"><button type="button" class="btn btn-info">créez un post</button></a>
        <table class="table table-striped">
            <form action="{{route('del')}}" method="POST">
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
                        <th><button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove">delete selected</i></button></th>
                    </tr>
                </thead>
            </form>
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
                            @else 
                            <button type="button" class="btn btn-warning">unpublished</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('post.show', $post->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">eye-open</span></a>
                        </td>
                        <td>
                            <a href="{{route('post.edit', $post->id)}}"><i class="far fa-edit">edit</i></a>
                        </td>
                        <td>
                            <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input class="btn btn-danger" type="submit" value="delete" >
                            </form>
                        </td>
                        <td>
                            <input type="checkbox" name="delid[]" value="{{$post->id}}">
                        </td>

                    </tr>
                @empty
                    aucun post ...
                @endforelse
            </tbody>
        </table>
        {{$posts->links()}}
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection