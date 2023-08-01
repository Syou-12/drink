<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('../css/style.css')  }}" >
  <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('title', '一覧画面')

@section('content')

<div class="kensaku">
  <form action="{{ route('home') }}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>

<div class="links list">
  <table>
     <thead>
        <tr>
            <th class="top">ID</th>
            <th  class="top">画像</th>
            <th class="top-a">商品名</th>
            <th class="top-a">価格</th>
            <th class="top-a">在庫数</th>
            <th class="top">メーカー名</th>
            <th><button type="button" class="btn btn-primary"  onclick="location.href='create'">新規登録</button></th>
        </tr>
    </thead>
    @foreach ($drinks as $drink)
        <tr>
            <td >{{ $drink->id }}</td>
            <td>
            @if($drink->img)
            <img src="{{asset('./storage/images/'.$drink->img)}}" width='30' height='60'/>
            @endif
             </td>
            <td>{{ $drink->name }}</td>
            <td >{{ $drink->kakaku }}円</td>
            <td>{{ $drink->zaiko }}個</td>
            <td >{{ $drink->maker }}</td>
            <td><button type="button" class="btn btn-primary"  onclick="location.href='/drink/{{ $drink->id }}'">詳細</button></td>
            <td>
            <form action="{{ route('drink.delete',$drink->id)}}" method=”POST”>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">削除</button>
            </form>
            </td>
        </tr>
        @endforeach
  </table>
 
</div>
@endsection

</body>
</html>



