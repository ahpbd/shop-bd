<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use App\User;

class ContactController extends Controller
{
     
  public function contact()
	{    
		return view('frontend.contact');
	}
  public function showroom()
	{    
		return view('frontend.showroom');
	}
  //Send email to admin
    public function contactSubmit(Request $request)
    {

     if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
     {
        $secret ='6LeWtuscAAAAAMOTbQ1QSuDE8BjkYPjnne1-zux3';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
        Mail::send('emails.contactmail',[
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'msg' => $request->msg
        ],function($mail) use($request){
          $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
          $mail->to("nurislamahp@gmail.com")->subject('Contact Us Query- Al Haramain Perfumes');
          
        });
        flash(translate('Email Sent successfully'))->success();
        return view('frontend.contact');
        }
        else
        {
            flash(translate('Robot verification failed, please try again'))->failed();
            return view('frontend.contact');
            
        }
   }
        
        return view('frontend.contact');

    }
   
  

}

