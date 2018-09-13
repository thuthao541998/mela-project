<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Contact;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Notifications\Console\NotificationTableCommand;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

require_once 'F:\PHP\mela-project\vendor\autoload.php';

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

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('thuthao541998@gmail.com')
            ->setPassword('rujvodxxejlcbskq')
        ;
        $mailer = new \Swift_Mailer($transport);
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

    public function showMail(){
        $emails = Contact::all('email');
        return view('admin.contact.create')->with('list_obj', $emails);
    }

    public function sendSubscriptionMail(Request $request){
        $subject = Input::get('subject');
        $content = Input::get('content');

        $contacts = Contact::all();
        $emails = [];
        foreach ($contacts as $contact){
            $email = $contact->email;
            array_push($emails, $email);
        };

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('mela.cosmetics.2018@gmail.com')
            ->setPassword('coahjemgakklfnkq')
        ;
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message($subject))
            ->setFrom(['mela.cosmetics.2018@gmail.com'=>'Mela Cosmetics'])
            ->setTo($emails)
            ->addPart('{!$content!}','text/html')
        ;
        $result = $mailer->send($message);
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script
			  src='https://code.jquery.com/jquery-3.3.1.min.js'
			  integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
			  crossorigin='anonymous'></script>
        <script>
            $(document).ready(function(e) {
                swal('Your subscription email has been sent successfully!', {icon: 'success'});
                window.location.href = '/admin';
            });
        </script>
        ";
    }
}
