<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

require_once 'C:\Users\Adminis\Desktop\Mela\vendor\autoload.php';

class ContactController extends Controller
{
    public function index(){
        return view('client.contactUs');
    }
//    Gửi phản hồi của người dùng vào mail mela.cosmetics.2018@gmail.com
    public function save(Request $request){
        $name = Input::get('name');
        $phone = Input::get('phone');
        $email = Input::get('email');
        $content = Input::get('message');
        $contactData = ['name'=>$name, 'phone'=>$phone, 'email'=>$email, 'content'=>$content];
//        Mail::send('client.test', $contactData, function ($msg){
//            $msg->from('mybarbershole@gmail.com', 'Tea');
//            $msg->to('mela.cosmetics.2018@gmail.com', 'Mela Cosmetics')->subject('Customer Service Mela');
//        });

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('thuthao541998@gmail.com')
            ->setPassword('rujvodxxejlcbskq')
        ;

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message('Wonderful Subject'))
            ->setFrom(['thuthao541998@gmail.com' => 'Customer Feedback'])
            ->setTo(['mela.cosmetics.2018@gmail.com'=>'Mela Cosmetics'])
            ->addPart('<div>Customer: </div>'.$name.'<br>', 'text/html')
            ->addPart('<div>Phone: </div>'.$phone.'<br>', 'text/html')
            ->addPart('<div>Email: </div>'.$email.'<br>', 'text/html')
            ->addPart('<div>Content: </div>', 'text/html')
            ->addPart('<p>'.$content.'</p>', 'text/html')
            ;

// Send the message
        $result = $mailer->send($message);

    }

    public function showContact(){
        $contact = Contact::all();
        return 1;
    }
}
