<?php

namespace App\Controllers;


class Emailing extends BaseController
{

    public function index()
    {
        $email = \Config\Services::email();
        $config["SMTPUser"] = getenv('email.username');
        $config["SMTPPass"] = getenv('email.password');
        $email->initialize($config);
        $email->setTo('omarsalehnemo@gmail.com');
        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');
        if ($email->send()) {
            echo "Email Sent nowss";
        } else {
            print_r($email->printDebugger(['headers']));
        }
    }
}
