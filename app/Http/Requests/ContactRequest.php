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
        'family_name.required' => 'おい',
        'first_name.required' => 'おい',
        'gender.required' => 'おい',
        'email.email' => 'おいメール',
        'email.required' => 'おい必須',
        'postcode.required' => 'おい必須',
        'postcode.regex' => 'おい全角',
        'address.required' => 'おい',
        'opinion.required' => 'おい必須',
        'opinion.max' => 'おい文字数'
        ];
    }

    public function prepareForValidation()
{
    // 全角→半角 英数(※変換できないものもあるので注意)
    $this->merge(['postcode.regex' => mb_convert_kana($this->postcode, 'as')]);
}


}
