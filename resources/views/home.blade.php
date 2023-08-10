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
    @foreach ($products as $product)
        <tr>
            <td>{{ $products->id }}</td>
            <td>
            @if($product->img_path)
            <img src="{{asset('./storage/images/'.$product->img_path)}}" width='30' height='60'/>
            @endif
             </td>
             <td>{{ $product->product_name }}</td>
            <td >{{ $product->price }}円</td>
            <td>{{ $product->stock }}個</td>
            <td >{{ $product->maker_name }}</td>
            <td><button type="button" class="btn btn-primary"  onclick="location.href='/product/{{  $product->company_id }}'">詳細</button></td>
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



