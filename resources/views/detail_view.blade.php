<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css')  }}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: "Helvetica Neue",
            Arial,
            "Hiragino Kaku Gothic ProN",
            "Hiragino Sans",
            Meiryo,
            sans-serif;
    }
    </style>
 </head>
@extends('layouts.app')
@section('content')
<h1>詳細確認</h1>
<table style = "margin-left: 42%;">
  <tr>
    <th>ID</tf>
    <td>{{ $product->company_id }}</td>
  </tr>
  <tr>
    <th>商品画像</th>
    <td>
    @if($product->img_path)
      <img src="{{asset('./storage/images/'.$product->img_path)}}" width='30' height='60'/>
    @endif
    </td>
  </tr>
  <tr>
    <th>商品名</tf>
    <td>{{ $product->product_name }}</td>
  </tr>
  <tr>
    <th>価格</tf>
    <td>{{ $product->price }}</td>
  </tr>
  <tr>
    <th>在庫数</tf>
    <td>{{ $product->stock }}</td>
  </tr>
  <tr>
    <th>メーカー名</tf>
    <td>{{ $product->company_name }}</td>
  </tr>
  <td><button type="button" class="btn btn-primary"  onclick="location.href='/product/edit/{{ $product->id }}'">編集</td>
  <td><button type="button" class="btn btn-primary"  onclick="location.href='/home'">戻る</td>
</table>

   @endsection
  </body>
</html>