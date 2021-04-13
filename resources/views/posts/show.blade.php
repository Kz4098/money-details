@extends('layouts.layouts')

@session('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif
    
    <div clss="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->date }}</h5>
            <p class="card-text">{{ number_format($post->kingaku) }}円</p>
            
            <div class="d-flex" style="height: 36.4px;">
                <button class="btn btn-outline-primary">Show</button>
                <a href="/posts/{{ $post->kingaku }}/edit" class="btn btn-outline-primary">Edit</a>
                <form action="/posts/{{ $post->kingaku }}" method="POST" onsubmit="if(confirm('Delite? Are you sure?')) { return true } else { return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
    <a href="/posts/{{ $post->kingaku }}/edit">Edit</a>
    <a href="/posts">Back</a>

@endsection
