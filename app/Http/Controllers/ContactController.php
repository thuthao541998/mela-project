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
        $message = (new \Swift_Message('New Customer Feedback'))
            ->setFrom(['thuthao541998@gmail.com' => 'Customer Service'])
            ->setTo(['mela.cosmetics.2018@gmail.com'=>'Mela Cosmetics'])
            ->addPart('<div style="color: #444151">'.
                '<div style="font-weight: bold; font-size: large;">Customer: <span style="font-weight: normal; font-size: medium;">'.$name.'</span></div><br>'.
                '<div style="font-weight: bold; font-size: large;">Phone:  <span style="font-weight: normal; font-size: medium;">'.$phone.'</span></div><br>'.
                '<div style="font-weight: bold; font-size: large;">Email:  <span style="font-weight: normal; font-size: medium;">'.$email.' (click to reply)</span></div><br>'.
                '<div style="font-weight: bold; font-size: large;">Content: <p style="font-weight: normal;font-style: italic; font-size: medium;">'.$content.'</p></div>'.
                '</div>'
                ,'text/html')
            ;

// Send the message
        $result = $mailer->send($message);
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script
			  src='https://code.jquery.com/jquery-3.3.1.min.js'
			  integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
			  crossorigin='anonymous'></script>
        <script>
            $(document).ready(function(e) {
                swal('Your message has been sent successfully!', {icon: 'success'});
                window.location.href = '/';
            });
        </script>
        ";
    }

    public function showContact(){
        $contact = Contact::all();
        return 1;
    }
}
