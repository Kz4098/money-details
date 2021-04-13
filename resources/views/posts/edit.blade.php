@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    <h1 style="color: #00a5dd ; font-size: 30px; padding-top: 50px">編集</h1>


<form method="POST" action="/update">

    {{ csrf_field() }}
    <div class="form-group">
    <label for="examleInputEmail">日付</label>
            <input type="date" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="date" value="{{$details[0]->date}}">
    </div>
    <div class="form-group">
        <label for="examleInputEmail">食費</label>
            <input type="text" placeholder = "目標を越さない様に心がけよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_1" value="{{$kingaku[0]->kingaku}}">円
    </div>
    <div class="form-group">
        <label for="examleInputPassword1">日用品</label>
            <input type="text" placeholder = "不足品を確認しよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_2" value="{{$kingaku[1]->kingaku}}">円
    </div>
    <div class="form-group">
        <label for="examleInputPassword1">その他の支出</label>
            <input type="text" placeholder = "その支出がいるのかよく考えよう" style="width: 255px ; height:30px" class="form-control" aria-describedby="emailHelp" name="item_id_3" value="{{$kingaku[2]->kingaku}}">円
    </div>

 <button type="submit" class="btn btn-outline-primary">記録</button>
</form>

<a href="/posts">Back</a>

@endsection