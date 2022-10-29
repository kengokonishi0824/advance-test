<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Rules\PostcodeRule;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(10);
        return view('admin.index', ['contacts' => $contacts]);
    }

    public function contact()
    {
        return view('contact.contact');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('contact.confirm', ['inputs' => $inputs]);
    }

    public function create(ContactRequest $request)
    {
        $action = $request->input('action');
        $inputs = $request->except('action');
        if($action !== 'submit'){
            return redirect("/contact")
                ->withInput($inputs);
        } else {
            Contact::create($inputs);
            //送信完了ページのviewを表示
            return view('contact.thanks');
    }
}
}
