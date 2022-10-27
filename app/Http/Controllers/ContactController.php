<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(10);
        return view('index', ['contacts' => $contacts]);
    }

    public function contact()
    {
    }

    public function confirm(Request $request)
    {
    }

    public function send(Request $request)
    {
    }
}
