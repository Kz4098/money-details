@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1 style="color: #00a5dd ; font-size: 30px; margin-top:10px">一日の支出</h1>
    <div style="text-align:right;">
    <img src="https://illustrain.com/wp-content/uploads/2016/12/illustrain09-inu10-300x300.png"width="45" height="45">
    </div>


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
    <label for="examleInputEmail">日付</label>
            <input type="date" style="width: 255px ; height:25px" class="form-control" aria-describedby="emailHelp" name="date" value="">
    </div>
    <!--<div class="form-group">-->
    <!--<label for="examleInputEmail">月目標</label>-->
    <!--        <input type="text" placeholder="無理のない目標にしよう" style="width: 255px ; height:25px" class="form-control" aria-describedby="emailHelp" name="month_id" value="">円-->
            
    <!--</div>-->
    <div class="form-group">
        <label for="examleInputEmail">食費</label>
            <input type="text" placeholder = "食べ過ぎないように調整しよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_1" value="">円
            
    </div>
    <div class="form-group">
        <label for="examleInputPassword1">日用品</label>
            <input type="text" placeholder = "不足品を確認しよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_2" value="">円
            
    </div>
    <div class="form-group">
        <label for="examleInputPassword1">その他の支出</label>
            <input type="text" placeholder = "その支出がいるのかよく考えよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_3" value="">円
    </div>

 <button type="submit"style = "height: 30px" class="btn btn-outline-primary">記録</button>
<a href="/posts">戻る</a>
</form>

<!--<a href="/posts">戻る</a>-->

@endsection