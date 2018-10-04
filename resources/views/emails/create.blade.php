@extends('layouts.master')

@section('content')
<h1 class="text-center my-4 animated fadeIn delay2">Contact</h1>

<div class="container col-6 animated fadeIn delay1">
    <form action="{{ route('postContact') }}" method="POST">
        {{ csrf_field() }}

        <div>
            <div class="form-group">
                <label for="email">Address email</label>
                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="JohnasB@gmail.com" value="{{old('email')}}">
                @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        <span class="error">{{$errors->first('email')}}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="message">Description</label>
                <textarea class="form-control" required="required" name="message"  id="message" rows="3">{{old('message')}}</textarea>
                @if($errors->has('message'))
                    <div class="alert alert-danger" role="alert">
                        <span class="error">{{$errors->first('message')}}</span>
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>

@endsection