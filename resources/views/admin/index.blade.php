<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<p>管理システム<p>

<div class="search_box">
  <form action="/search" method="get" class="">
    <div class="search_name_gender">
      <p class="search_title">お名前<p>
        <input type="text" name="fullname" class="contact_search">
      <p class="search_title">　　　　性別<p>
        <input type="radio" name="gender" value=0 id=0  class="contact_button" checked><label for=0  class="contact_radio">全て</label>
        <input type="radio" name="gender" value=1 id=1  class="contact_button"><label for=1  class="contact_radio">男性</label>
        <input type="radio" name="gender" value=2 id=2  class="contact_button"><label for=2  class="contact_radio">女性</label>
    </div>
    <div class="search_date">
      <p class="search_title">登録日<p>
        <input type="date" name="date_from" class="contact_search">
        <p>　　〜　　<p>
        <input type="date" name="date_to"  class="contact_search">
    </div>
    <div class="search_email">
      <p class="search_title">メールアドレス<p>
        <input type="calender" name="email" class="contact_search">
    </div>
    <div class="admin_buton">
      <div class="button_submit">
        <input type="submit" value="検索" class="button_submit">
      </div>
      <br>
      <div class="reset">
        <a href="/" >リセット</a>
      </div>
    </div>
  </form>
</div>

<div class = "pagination">
  <div class = "page_indication"><p>全{{$contacts->total()}}件中 {{$contacts->firstitem()}}-{{$contacts->lastitem()}}件</p></div>
  <div>{{$contacts->links('pagination::default')}}</div>
</div>

<form action="/delete" method="POST" class="form_delete">
@csrf
<table class="opinion_table">
  <tr class="table_header" align="left">
    <th class="table_header">ID</th>
    <th class="table_header">お名前</th>
    <th class="table_header">性別</th>
    <th class="table_header">メールアドレス</th>
    <th class="table_header">ご意見</th>
    <th class="table_header"></th>
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
    <td>
      <input type ="hidden" name="id" value="{{$contact->id}}">
      <input type="submit" value="削除" class="button-delete">
  </tr>
  @endforeach
</table>
</form>
