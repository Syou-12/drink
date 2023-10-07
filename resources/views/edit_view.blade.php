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

@section('title', '編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>更新</h1>
            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf

                <div class="form-group menu" >
                    <label for="title">ID</label>
                    <label for="title" style="font-size: 15px;">{{ $product->company_id }}</h2>
                </div>

                <div class="form-group menu" >
                    <label for="title">商品画像</label>
                    <input type="file" class="form-control" id="img_path" name="img_path" placeholder="商品画像">
                </div>

                <div class="form-group menu" >
                    <label for="name">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="商品名" value="{{ $product->product_name }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group menu" >
                    <label for="title">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="価格" value="{{ $product->price }}">
                    @if($errors->has('kakaku'))
                        <p>{{ $errors->first('kakaku') }}</p>
                    @endif
                </div>

                <div class="form-group menu">
                    <label for="title">在庫数</label>
                    <input type="text" class="form-control" id="zaiko" name="zaiko" placeholder="在庫数" value="{{ $product->stock }}">
                    @if($errors->has('zaiko'))
                        <p>{{ $errors->first('zaiko') }}</p>
                    @endif
                </div>

                <<div class="form-group  menu">
                    <label for="title">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数" value="{{ old('stock') }}">
                    @if($errors->has('stock'))
                        <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group menu">
                    <label for="title">コメント</label>
                    <input type="text" class="form-control" id="coment" name="coment" placeholder="コメント" value="{{ $product->comment }}">
                    @if($errors->has('coment'))
                        <p>{{ $errors->first('coment') }}</p>
                    @endif
                </div>

              

                <button type="submit" class="menu-btn">更新</button>
                <button type="button" class="btn btn-primary"  onclick="location.href='/product/{{ $product->id }}'">戻る</button>
            </form>
        </div>
    </div>
@endsection
</body>
</html>
