<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('client.contactUs');
    }
    public function save(Request $request){

//        Lưu dữ liệu contact vào database
        $contactData = $request -> contactData;
        $jsonData = json_decode($contactData);
//        $contact = new Contact;
//        $contact -> name = $jsonData -> name;
//        $contact -> phone = $jsonData -> phone;
//        $contact -> email = $jsonData -> email;
//        $contact -> message = $jsonData -> message;
//        $contact -> save();
//        return 'Done';

//        Gửi dữ liệu contact vào mail mela.cosmetics.2018@gmail.com

        Mail::send('client.test', $contactData, function ($jsonData, $msg){
            $msg->from($jsonData->email, $jsonData -> name);
            $msg->to('mela.cosmetics.2018@gmail.com', 'Mela Cosmetics')->subject('Customer Service Mela');
        });
    }
    public function showContact(){
        $contact = Contact::all();
        return 1;
    }
}
