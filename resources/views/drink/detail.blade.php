<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

@extends('layouts.app')
@section('content')
<h1>詳細確認</h1>
<table style = "margin-left: 42%;">
  <tr>
    <th>ID</tf>
    <td>{{ $drink->id }}</td>
  </tr>
  <tr>
    <th>商品画像</tf>
    <td>{{ $drink->img }}</td>
  </tr>
  <tr>
    <th>商品名</tf>
    <td>{{ $drink->name }}</td>
  </tr>
  <tr>
    <th>価格</tf>
    <td>{{ $drink->kakaku }}</td>
  </tr>
  <tr>
    <th>在庫数</tf>
    <td>{{ $drink->zaiko }}</td>
  </tr>
  <tr>
    <th>メーカー</tf>
    <td>{{ $drink->maker }}</td>
  </tr>
  <td><button type="button" class="btn btn-primary"  onclick="location.href='/drink/edit/{{ $drink->id }}'">編集</td>
  <td><button type="button" class="btn btn-primary"  onclick="location.href='/home'">戻る</td>
</table>

   @endsection
  </body>
</html>