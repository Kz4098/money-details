@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

    <h1 style="color: #00a5dd ; font-size: 30px; padding-top: 50px">月の支出合計</h1>

    @foreach($posts as $post)
    
        <div class="card" style="width: 300px ; height: 110px ;padding: 10px">
            <div class="card-body">
                <h5 class="card-title">{{ $post->date }}月分</h5>
            　　<p class="card-text">{{ number_format($post->kingaku) }}円</p>

                
            </div>
        </div> 
    <div style="text-align:right;">
    <img src="https://illustrain.com/wp-content/uploads/2016/09/illustrain02-dinosaur03-300x300.png"width="100" height="100">
    </div>
    @endforeach

@endsection