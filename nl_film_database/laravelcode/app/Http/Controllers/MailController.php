<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function basic_email(){
      $data = array('name'=>"Info @ tildehekje");
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('pauldeveth@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('info@tildehekje.nl','Mail response adres webwinkel');
      });
      return redirect()->route('product.index')->with('success', 'Order is verwerkt u ontvangt uw product(en) zo spoedig mogelijk ');
   }
}
