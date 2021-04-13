@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

    <h1 style="color: #00a5dd ; font-size: 30px; margin-top: 50px">毎日の支出記録</h1>
    <div style="text-align:right;">
        <img src="https://illustrain.com/wp-content/uploads/2016/12/illustrain09-kujirairuka5-300x300.png"width="60" height="60">
    </div>

    @foreach($posts as $post)
    
        <div class="card" style="width: 300px ; height: 160px ;padding: 10px">
            <div class="card-body">
                <h5 class="card-title">{{ $post->date }}</h5>
            　　<p class="card-text">{{ number_format($post->kingaku) }}円</p>

                
                <div class="d-flex" style="height: 33px;">
                    <a href="/posts/{{ $post->id }}/edit" class= "btn btn-outline-primary">編集</a>
                    <form action="/delete" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="date" value="{{ $post->date }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" style = "height: 33px" class="btn btn-outline-danger">削除</button>
                    </form>
                </div>
            </div>
        </div> 
    @endforeach
    <a href="/posts/create" style="margin-top: 100px">記録する</a>
    <div style="text-align:right;">
    <img src="https://illustrain.com/wp-content/uploads/2016/09/illustrain02-penguin04-300x300.png"width="55" height="55">
    </div>
@endsection