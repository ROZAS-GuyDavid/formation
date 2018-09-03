@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            <h1>Editer le Post : </h1>
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Titre du post">
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('title')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" value="{{$post->description}}" class="form-control" placeholder="Description du post">{{$post->description}}</textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('description')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_begin">Date de début :</label>
                        <input type="date" name="date_begin" value="{{$date_begin}}" class="form-control" id="date_begin">
                        @if($errors->has('date_begin'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('date_begin')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_end">Date de fin :</label>
                        <input type="date" name="date_end" value="{{$date_end}}" class="form-control" id="date_end">
                        @if($errors->has('date_end'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('date_end')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{$post->price}}" class="form-control" placeholder="3,4"></input>
                        @if($errors->has('price'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('price')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="max_stud">Nombre d'elève maximum :</label>
                        <input type="text" name="max_stud" value="{{$post->max_stud}}" class="form-control" placeholder="400"></input>
                        @if($errors->has('max_stud'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('max_stud')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-select">
                        <label for="post_type">type de post :</label>
                        <select name="post_type" id="post_type">
                            <option value="undetermined" {{ $post->post_type == "" ? 'selected' : '' }}></option>
                            <option value="stage" {{ $post->post_type == "stage" ? 'selected' : '' }}>Stage</option>
                            <option value="formation" {{ $post->post_type == "formation" ? 'selected' : '' }}>Formation</option>
                        </select>
                    </div>
                    <div class="form-select">
                        <label for="category_id">category :</label>
                        <select name="category_id" id="category_id">
                            @foreach($category as $id => $title)
                                <option value="{{$id}}" {{ $post->category_id == $id ? 'selected' : '' }}>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <div class="input-radio">
                    <h2>Status</h2>
                    <input type="radio" name="status" value="published" @if($post->status =='published') checked @endif> publier<br>
                    <input type="radio" name="status" value="unpublished" @if($post->status =='unpublished') checked @endif> dépublier<br>
                </div>
                <div class="input-file">
                    <h2>File :</h2>
                    <input class="file" type="file" name="picture" >
                    @if($errors->has('picture'))
                    <div class="alert alert-danger" role="alert">
                        <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection