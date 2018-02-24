<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
      Function to send the email through the library send grid
    */

    /*
      Função para realizar o envio do email através da biblioteca send grid
    */

    public function sendMail ()
    {

        $data = ['message' => 'This is a test!'];
        Mail::to('recipientemail@exemple.com')->send(new TestEmail($data));
    }
}
