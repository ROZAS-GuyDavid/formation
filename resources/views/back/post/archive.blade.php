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
                    <th>Title</th>
                    <th>type de post</th>
                    <th>Date de publication</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>prix</th>
                    <th>Unarchive</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th><button type="submit" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete selected</button></th>
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
                            <a href="{{route('unArchiveSingle', $post->id)}}" class="btn btn-warning"><i class="fas fa-archive"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('post.show', $post->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
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