<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function email() {
        
        $email = \Config\Services::email();

        $email->setFrom('francisco@easyprograms.com.br', 'Francisco');
        $email->setTo('bolevi7715@hapincy.com');
 //       $email->setCC('another@another-example.com');
 //       $email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($email->send()) {
            
            echo 'Email enviado';
        } else {
                
                echo $email->printDebugger();        
         
         } 
    }

}
