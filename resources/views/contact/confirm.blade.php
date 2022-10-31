<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>admin_page</title>
</head>

<form method="POST" action="/contact/create">
    @csrf
<table class="form_table">
<tr class="form_row">
    <th colspan="2">内容確認</th>
</tr>
<tr class="form_row">
    <td class="form_title">
    お名前
    </td>
    <td>
    {{ $inputs['family_name'] }} {{ $inputs['first_name'] }}
    <input type="hidden" name="fullname" value="{{ $inputs['family_name'] }} {{ $inputs['first_name'] }}" class="">
    <input type="hidden" name="family_name" value="{{ $inputs['family_name'] }}" class="">
    <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    性別
    </td>
    <td>
    @if($inputs['gender'] ==1)
    男性
    @elseif($inputs['gender']==2)
    女性
    @endif
    <input type="hidden" name="gender" value="{{ $inputs['gender'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    メールアドレス
    </td>
    <td>
    {{ $inputs['email'] }}
    <input type="hidden" name="email" value="{{ $inputs['email'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    郵便番号
    </td>
    <td>
    {{ $inputs['zip'] }}
    <input type="hidden" name="postcode" value="{{ $inputs['zip'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    住所
    </td>
    <td>
        {{ $inputs['address'] }}
    <input type="hidden" name="address" value="{{ $inputs['address'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    建物名
    </td>
    <td>
    {{ $inputs['building_name'] }}
    <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}" class="">
    </td>
</tr>
<tr class="form_row">
    <td>
    ご意見
    </td>
    <td>
        {{ $inputs['opinion'] }}
    <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}" class="">
    </td>
</tr> 
<tr class="form_row">
    <th colspan="2">
    <button type="submit" name="action" value="submit" class="button_submit">
        送信
    </button>
    </th>
</tr>
<tr class="form_row">
    <th colspan="2">
    <button type="submit" name="action" value="back" class="button_submit">
        入力内容修正
    </button>
    </th>
</tr>
</table>
</form>