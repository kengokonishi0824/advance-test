<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostcodeRule;


class ContactRequest extends FormRequest
{

    public function rules()
    {
        return [
        'family_name' => 'required|string',
        'first_name' => 'required|string',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => ['required', new PostcodeRule()],
        'postcode' => 'regex:/^[!-~ ¥]+$/u',
        'address' => 'required',
        'opinion' => 'required|max:120|'
        ];
    }
    public function messages()
    {
        return [
        'family_name.required' => '必須項目です',
        'first_name.required' => '必須項目です',
        'gender.required' => '必須項目です',
        'email.email' => 'メールの形式で入力ください',
        'email.required' => '必須項目です',
        'postcode.required' => '必須項目です',
        'postcode.regex' => '半角で入力ください',
        'address.required' => '必須項目です',
        'opinion.required' => '必須項目です',
        'opinion.max' => '120文字以内で入力ください'
        ];
    }

    public function prepareForValidation()
{
    // 全角→半角 英数(※変換できないものもあるので注意)
    $this->merge(['postcode.regex' => mb_convert_kana($this->postcode, 'as')]);
}


}
