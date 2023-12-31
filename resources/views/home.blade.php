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

<div>
  <form action="{{ route('home') }}" method="GET">

  @csrf

    <input type="text" name="keyword">
    <input type="submit" value="検索">

       <!--プルダウンカテゴリ選択  ※修正必須-->
       <div class="form-group row">
              <label>商品カテゴリ</label>
              <div class="col-sm-3">
                <select name="categoryId" class="form-control" value="{{ $company -> id }}">
                  <option value="">未選択</option>

                  @foreach($companies as $company)
                  <option value="{{ $id }}">
                    {{ $company_name }}
                  </option>  
                  @endforeach
                </select>
              </div>
            </div>
    
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
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>
            @if($product->img_path)
            <img src="{{asset('./storage/images/'.$product->img_path)}}" width='30' height='60'/>
            @endif
             </td>
             <td>{{ $product->product_name }}</td>
            <td >{{ $product->price }}円</td>
            <td>{{ $product->stock }}個</td>
            <td >{{ $product->company_name }}</td>
            <td><button type="button" class="btn btn-primary"  onclick="location.href='/product/{{  $product->id }}'">詳細</button></td>
            <td>
            <form action="{{ route('product.delete',$product->company_id)}}" method=”POST”>
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



