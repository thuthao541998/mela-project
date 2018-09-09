<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('client.contactUs');
    }
    public function save(Request $request){

        $contactData = $request -> contactData;
        $jsonData = json_decode($contactData);
        $contact = new Contact;
        $contact -> name = $jsonData -> name;
        $contact -> phone = $jsonData -> phone;
        $contact -> email = $jsonData -> email;
        $contact -> message = $jsonData -> message;
        $contact -> save();
        return 'Done';
    }
    public function showContact(){
        $contact = Contact::all();
        return 1;
    }
}
