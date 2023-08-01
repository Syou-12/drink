<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css')  }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('title', '投稿画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Post Form</h1>
            <form action="{{ route('store') }}" method="post" action="/store" enctype="multipart/form-data" >
                @csrf

                <div class="form-group menu">
                    <label for="title">商品画像</label>
                    <input type="file" class="form-control" id="img" name="img" placeholder="商品画像">
                </div>

                <div class="form-group  menu">
                    <label for="title">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="商品名" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group menu">
                    <label for="title">価格</label>
                    <input type="text" class="form-control" id="kakaku" name="kakaku" placeholder="価格" value="{{ old('kakaku') }}">
                    @if($errors->has('kakaku'))
                        <p>{{ $errors->first('kakaku') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">在庫数</label>
                    <input type="text" class="form-control" id="zaiko" name="zaiko" placeholder="在庫数" value="{{ old('zaiko') }}">
                    @if($errors->has('zaiko'))
                        <p>{{ $errors->first('zaiko') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">メーカー名</label>
                    <input type="text" class="form-control" id="maker" name="maker" placeholder="メーカー名" value="{{ old('maker') }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">コメント</label>
                    <input type="text" class="form-control" id="coment" name="coment" placeholder="コメント" value="{{ old('maker') }}">
                    @if($errors->has('coment'))
                        <p>{{ $errors->first('coment') }}</p>
                    @endif
                </div>

              

                <button type="submit" class="menu-btn">送信</button>
                <button type="button" class="btn btn-primary"  onclick="location.href='/home'">戻る</button>
            </form>
        </div>
    </div>
@endsection
</body>
</html>
