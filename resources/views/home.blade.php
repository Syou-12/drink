<div class="links">
  <table style="margin-left: 80px">
     <thead style="background: #00ff00;" >
        <tr>
            <th style="padding-right: 15px;">ID</th>
            <th style="padding-right: 15px;">商品画像</th>
            <th style="padding-right: 20px;">商品名</th>
            <th style="padding-right: 20px;">価格</th>
            <th style="padding-right: 20px;">在庫数</th>
            <th style="padding-right: 15px;">メーカー名</th>
            <th><button type="button" class="btn btn-primary"  onclick="location.href='create'">新規登録</button></th>
        </tr>
    </thead>
    @foreach ($drinks as $drink)
        <tr style="border: 1px solid #000;">
            <td style="text-align:left">{{ $drink->id }}</td>
            <td style="text-align:left">{{ $drink->img }}</td>
            <td>{{ $drink->name }}</td>
            <td style="text-align:left">{{ $drink->kakaku }}円</td>
            <td style="text-align:left">{{ $drink->zaiko }}個</td>
            <td style="text-align:left">{{ $drink->maker }}</td>
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

