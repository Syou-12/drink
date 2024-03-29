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

<div style="margin-left:80px;">
  <form action="{{ route('home') }}" method="GET">

  @csrf

    <input type="text" name="keyword">
    <select name="company_name" id="company_name" class="form-control" style="width:13%;">
                    <option value="">選択してください</option>
                    @foreach($companies as $company)
                    <option value="{{$company -> id}}">{{$company -> company_name}}</option>
                    @endforeach
                   </select>
    <input type="submit" value="検索">

    
  </form>
</div>

<div class="links list" style="margin-left:80px;">
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
            <td>{{ $product->id }}</td>
            <td>
            @if($product->img_path)
            <img src="{{asset($product-> img_path)}}" width='30' height='60'/>
            @endif
             </td>
             <td>{{ $product->product_name }}</td>
            <td >{{ $product->price }}円</td>
            <td>{{ $product->stock }}個</td>
            <td >{{ $product->company_name }}</td>
            <td><button type="button" class="btn btn-primary"  onclick="location.href='/product/{{  $product->id }}'">詳細</button></td>
            <td>
            <form action="{{ route('product.delete',['id'=>$product->id])}}" method=”POST”>
             @csrf
             @method('DELETE')
            <button type="submit" class="btn item-destroy">
              削除
            </button>
</form>
            </td>
        </tr>
        @endforeach
  </table>
 
</div>
@endsection

</body>
</html>
