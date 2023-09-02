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
            <h1>新規登録画面</h1>
            <form action="{{ route('store') }}" method="post" action="/store" enctype="multipart/form-data" >
                @csrf
                <!--
                <div class="form-group menu" >
                    <label for="title">商品画像</label>
                    <input type="file" class="form-control" id="img_path" name="img_path" placeholder="商品画像">
                </div>
                -->

                <div class="form-group  menu">
                    <label for="title">商品名</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="商品名" value="{{ old('product_name') }}">
                    @if($errors->has('product_name'))
                        <p>{{ $errors->first('product_name') }}</p>
                    @endif
                </div>

                <div class="form-group menu">
                    <label for="title">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="価格" value="{{ old('price') }}">
                    @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数" value="{{ old('stock') }}">
                    @if($errors->has('stock'))
                        <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">メーカー名</label>
                    <input type="text" class="form-control" id="maker_name" name="maker_name" placeholder="メーカー名" value="{{ old('company_name') }}">
                    @if($errors->has('maker_name'))
                        <p>{{ $errors->first('maker_name') }}</p>
                    @endif
                </div>

                <div class="form-group  menu">
                    <label for="title">コメント</label>
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="コメント" value="{{ old('comment') }}">
                    @if($errors->has('comment'))
                        <p>{{ $errors->first('comment') }}</p>
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
