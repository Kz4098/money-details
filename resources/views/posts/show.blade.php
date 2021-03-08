@extends('layouts,layouts')

@session('title', 'Simple Board')

@session('content')
    @if (session('message'))
        {{ session('message') }}
    @endif

    {{ $post->title }}
    {{ $post->content }}
@endsection
