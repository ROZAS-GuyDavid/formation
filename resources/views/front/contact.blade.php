@extends('layouts.master')

@section('content')
<h1 class="text-center my-4">Contact</h1>
<!-- <div class="container">
    <form class="row justify-content-md-center col-6">
        <div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Address email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="JohnasB@gmail.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div> -->
<div class="container col-6">
    <form>
        <div>
            <div class="form-group">
                <label for="title">Address email</label>
                <input type="email" class="form-control" id="title" placeholder="JohnasB@gmail.com">
            </div>
            <div class="form-group">
                <label for="message">Description</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>

@endsection