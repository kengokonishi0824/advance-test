<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>

  @livewireStyles
</head>

<form method="POST" action="/contact/confirm">
    @csrf
  <table class="form_table">
  <tr class="width_title">
    <th colspan="3">お問い合わせ</th>
  </tr>
  <tr class="form_row">
    <td class="form_title">
      お名前<span class="aka">※</span>
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
      性別<span class="aka">※</span>
    </td>
    <td colspan="2">
      <input type="radio" name="gender" value=1 id=1  class="contact_button" checked><label for=1  class="contact_radio">男性</label>
      <input type="radio" name="gender" value=2 id=2 class="contact_button"><label for=2 class="contact_radio">女性</label>
    </td>
  </tr>
  <tr>
    <td class="table_example">　</td>
    <td></td>
    <td></td>
  </tr>
  <tr class="form_row">
    <td>
      メールアドレス<span class="aka">※</span>
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
      郵便番号<span class="aka">※</span>
    </td>
    <td colspan="2">
      〒　<input id="zip" type="text" name="zip" value= "{{ old('postcode') }}" class="contact_form_p">
      <button class="api-address" type="button">住所を自動入力</button>
      @if ($errors->has('postcode'))
            {{$errors->first('postcode')}}
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="table_example" colspan="2">　例）1234567</td>
  </tr>
  <tr class="form_row">
    <td>
      住所<span class="aka">※</span>
    </td>
    <td colspan="2">
      <input id="address" type="text" name="address" value="{{ old('address') }}" class="contact_form">
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
      ご意見<span class="aka">※</span>
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

<script>
    //イベントリスナの設置：ボタンをクリックしたら反応する
    document.querySelector('.api-address').addEventListener('click', () => {
        //郵便番号を入力するテキストフィールドから値を取得
        const elem = document.querySelector('#zip');
        const zip = elem.value;
        //fetchでAPIからJSON文字列を取得する
        fetch('../api/address/' + zip)
            .then((data) => data.json())
            .then((obj) => {
                //郵便番号が存在しない場合，空のオブジェクトが返ってくる
                //オブジェクトが空かどうかを判定
                if (!Object.keys(obj).length) {
                    //オブジェクトが空の場合
                    txt = '住所が存在しません。'
                } else {
                    //オブジェクトが存在する場合
                    //住所は分割されたデータとして返ってくるので連結する
                    txt = obj.pref + obj.city + obj.town;
                }
                //住所を入力するテキストフィールドに文字列を書き込む
                document.querySelector('#address').value = txt;
            });
    });
</script>


