@extends('layouts.app')

@section('title', '投稿画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Post Form</h1>
            <form action="{{ route('drink.update',$drink->id) }}" method="post">
                @method('post')
                @csrf

                <div class="form-group" style="margin-bottom:20px;">
                    <label for="title">ID</label>
                    <label for="title" style="font-size: 15px;">{{ $drink->id }}</h2>
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="title">商品画像</label>
                    <input type="text" class="form-control" id="img" name="img" placeholder="商品画像" value="{{ $drink->img }}">
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="name">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="商品名" value="{{ $drink->name }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="title">価格</label>
                    <input type="text" class="form-control" id="kakaku" name="kakaku" placeholder="価格" value="{{ $drink->kakaku }}">
                    @if($errors->has('kakaku'))
                        <p>{{ $errors->first('kakaku') }}</p>
                    @endif
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="title">在庫数</label>
                    <input type="text" class="form-control" id="zaiko" name="zaiko" placeholder="在庫数" value="{{ $drink->zaiko }}">
                    @if($errors->has('zaiko'))
                        <p>{{ $errors->first('zaiko') }}</p>
                    @endif
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="title">メーカー名</label>
                    <input type="text" class="form-control" id="maker" name="maker" placeholder="メーカー名" value="{{ $drink->maker }}">
                    @if($errors->has('maker'))
                        <p>{{ $errors->first('maker') }}</p>
                    @endif
                </div>

                <div class="form-group" style="margin-bottom:50px;">
                    <label for="title">コメント</label>
                    <input type="text" class="form-control" id="coment" name="coment" placeholder="コメント" value="{{ $drink->coment }}">
                    @if($errors->has('coment'))
                        <p>{{ $errors->first('coment') }}</p>
                    @endif
                </div>

              

                <button type="submit" class="btn btn-default">更新</button>
                <button type="button" class="btn btn-primary"  onclick="location.href='/drink/{{ $drink->id }}'">戻る</button>
            </form>
        </div>
    </div>
@endsection