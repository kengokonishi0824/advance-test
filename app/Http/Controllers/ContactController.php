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

    public function find()
    {
        $contacts = [];
        return view('search', ['fullname' => $fullname, 'gender' => $gender, 'created_at' => $date, 'email' => $email]);
    }

    public function search(Request $request)
    {
        $fullname = $request['fullname'];
        $gender = $request['gender'];
        $date_from = $request['date_from'];
        $date_to = $request['date_to'];
        $email = $request['email'];
        $contacts = Contact::doSearch($fullname, $gender, $date_from, $date_to ,$email);
        
        return view('admin.search', ['contacts' => $contacts, 'fullname' => $fullname, 'gender' => $gender, 'date_from' => $date_from, 'date_to' => $date_to, 'email' => $email]);
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

    public function delete(Request $request)
    {
        $todo = Contact::find($request->id);
        return view('delete', ['form' => $contact]);
    }

    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect("/");
    }


}
