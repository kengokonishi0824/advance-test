<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<form method="POST" action="/contact/confirm">
    @csrf
  <table class="form_table">
  <tr class="width_title">
    <th colspan="3">お問い合わせ</th>
  </tr>
  <tr class="form_row">
    <td class="form_title">
      お名前※
    </td>
    <td>
      <input type="text" name="family_name" value="{{ old('family_name') }}" class="contact_form">
      @if ($errors->has('family_name'))
            {{$errors->first('family_name')}}
      @endif
    </td>
    <td>
      <input type="text" name="first_name" value="{{ old('first_name') }}" class="contact_form">
      @if ($errors->has('first_name'))
            {{$errors->first('first_name')}}
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
    <td valign="top" class="table_example">　例）山田</td>
    <td valign="top" class="table_example">　例）太郎</td>
  </tr class="form_row">
    <td>
      性別※
    </td>
    <td colspan="2">
      <label class="contact_radio"><input type="radio" name="gender" value=1 class="contact_button" checked>男性</label>
      <label class="contact_radio"><input type="radio" name="gender" value=2 class="contact_button">女性</label>
    </td>
  </tr>
  <tr>
    <td class="table_example">　</td>
    <td></td>
    <td></td>
  </tr>
  <tr class="form_row">
    <td>
      メールアドレス※
    </td>
    <td colspan="2">
      <input type="text" name="email" value="{{ old('email') }}" class="contact_form">
      @if ($errors->has('email'))
            {{$errors->first('email')}}
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="table_example" colspan="2">　例）test@example.com</td>
  </tr>
  <tr class="form_row">
    <td>
      郵便番号※
    </td>
    <td colspan="2">
      〒　<input type="text" name="postcode" value="{{ old('postcode') }}" class="contact_form_p">
      @if ($errors->has('postcode'))
            {{$errors->first('postcode')}}
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="table_example" colspan="2">　例）123-4567</td>
  </tr>
  <tr class="form_row">
    <td>
      住所※
    </td>
    <td colspan="2">
      <input type="text" name="address" value="{{ old('address') }}" class="contact_form">
      @if ($errors->has('address'))
            {{$errors->first('address')}}
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="table_example" colspan="2">　例）東京都渋谷区千駄ヶ谷1-2-3</td>
  </tr>
  <tr class="form_row">
    <td>
      建物名
    </td>
    <td colspan="2">
      <input type="text" name="building_name" value="{{ old('building_name') }}" class="contact_form">
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="table_example" colspan="2">　例）千駄ヶ谷マンション101</td>
  </tr>
  <tr class="form_row">
    <td>
      ご意見※
    </td>
    <td colspan="2">
      <input type="text" name="opinion" value="{{ old('opinion') }}" class="opinion_form">
      @if ($errors->has('opinion'))
            {{$errors->first('opinion')}}
      @endif
    </td>
  </tr> 
  <tr class="form_row">
    <th colspan="3">
      <input type="submit" name="" value="確認" class="button_submit">
</th>
  </tr>
</table>
</form>