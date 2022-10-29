<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<div class = "pagination">
  <div class = "page_indication"><p>{{$contacts->total()}}件中 {{$contacts->firstitem()}}-{{$contacts->lastitem()}}件</p></div>
  <div>{{$contacts->links('pagination::default')}}</div>
</div>
<table class="opinion_table">
  <tr class="table_header" align="left">
    <th class="table_header">ID</th>
    <th class="table_header">お名前</th>
    <th class="table_header">性別</th>
    <th class="table_header">メールアドレス</th>
    <th class="table_header">ご意見</th>
  </tr>
  @foreach ($contacts as $contact)
  <tr>
    <td>
      {{$contact->id}}
    </td>
    <td>
      {{$contact->fullname}}
    </td>
    <td>
      @if($contact->gender==1)
        男性
      @elseif($contact->gender==2)
        女性
      @endif
    </td>
    <td>
      {{$contact->email}}
    </td>
    <td>
      <p class = "admin_opinion">{{$contact->opinion}}</p>
    </td>
  </tr>
  @endforeach
</table>
