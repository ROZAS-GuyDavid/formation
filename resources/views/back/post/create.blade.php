@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            <h1>Create Post : </h1>
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Titre du post">
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('title')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" value="{{old('description')}}" class="form-control" placeholder="Description du post"></textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('description')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_begin">Date de début :</label>
                        <input type="date" name="date_begin" value="{{old('date_begin')}}" class="form-control" id="date_begin">
                        @if($errors->has('date_begin'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('date_begin')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_end">Date de fin :</label>
                        <input type="date" name="date_end" value="{{old('date_end')}}" class="form-control" id="date_end">
                        @if($errors->has('date_end'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('date_end')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="3,4"></input>
                        @if($errors->has('price'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('price')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="max_stud">Nombre d'elève maximum :</label>
                        <input type="text" name="max_stud" value="{{old('max_stud')}}" class="form-control" placeholder="400"></input>
                        @if($errors->has('max_stud'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('max_stud')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-select">
                        <label for="post_type">type de post :</label>
                        <select name="post_type" id="post_type">
                            <option value="undetermined" {{ old('post_type') == "" ? 'selected' : '' }}></option>
                            <option value="stage" {{ old('post_type') == "stage" ? 'selected' : '' }}>Stage</option>
                            <option value="formation" {{ old('post_type') == "formation" ? 'selected' : '' }}>Formation</option>
                        </select>
                    </div>
                    <div class="form-select">
                        <label for="category_id">category :</label>
                        <select name="category_id" id="category_id">
                            @foreach($category as $id => $title)
                                <option value="{{$id}}" {{ old('category_id') == $id ? 'selected' : '' }}>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 
                    a faire:
                        category
                    -->
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Ajouter un post</button>
                <div class="input-radio">
                    <h2>Status</h2>
                    <input type="radio" name="status" value="published" @if(old('status')=='published') checked @endif> publier<br>
                    <input type="radio" name="status" value="unpublished" @if(old('status')=='unpublished') checked @endif> dépublier<br>
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