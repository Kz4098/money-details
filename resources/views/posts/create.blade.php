@extends('layouts,layouts')

@section('title', 'Simple Board')

@section('content')

<h1>New Post</h1>

@if ($errors->any())
    <div class="alert alert-denger">
        <ui>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ui>   
    </div>
@endif

<form method="POST" action="/posts">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="examleInputEmail">Title</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="examleInputPassword1">Content</label>
            <textarea class="form-control" name="content">{{old('content')}}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<a href="/posts">Back</a>

@endsection