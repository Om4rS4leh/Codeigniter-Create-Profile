<?php

namespace App\Controllers;

use App\Libraries\Hash;
use \Config\Services;
use \App\Models\UsersModel;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'Form']);
    }

    public function index()
    {
        return redirect()->to("/auth/login");
    }

    public function login()
    {
        return view("Auth/login");
    }

    public function register()
    {
        return view("Auth/register");
    }

    public function save()
    {
        $validation =  Services::validation();
        $validationResult = $validation->run($this->request->getPost(), 'signup');

        if (!$validationResult) {
            return view("auth/register", ["validation" => $validation]);
        }

        $name = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $hashedPassword = Hash::make($password);
        $emailVerificationCode = Hash::emailCode();


        $values = [
            "name" => $name,
            "email" => $email,
            "password" => $hashedPassword,
            "emailVerificationCode" => $emailVerificationCode
        ];

        $usermodel = new UsersModel();
        $query = $usermodel->insert($values);

        if (!$query) {
            return redirect()->back()->with("warning", "Error Happened, Try Again Later...")->withInput();
        }

        $email = Services::email();
        $config["SMTPUser"] = getenv('email.username');
        $config["SMTPPass"] = getenv('email.password');
        $email->initialize($config);
        $email->setTo($this->request->getPost("email"));
        $email->setSubject('Email Verification');
        $email->setMessage('Hello ' . ucfirst($name) . '! <br> We Are Pleased That You Have Registered In Our Website, <br>To Verify Your Account Click On The Link Below..<br><hr><a href="' . base_url('/auth/verify/' . $emailVerificationCode) . '">Verify Now</a>');

        if (!$email->send()) {
            return print_r($email->printDebugger(['headers']));
        }

        $userId = $usermodel->insertId();
        session()->set('userId', $userId);
        return redirect()->to("/dashboard");
    }

    public function verify($seg1)
    {
        if (!isset($seg1) || empty($seg1)) {
            return redirect()->to("/dashboard");
        }

        $emailVerificationCode = $seg1;
        $usermodel = new UsersModel();
        $usermodel->where(['emailVerificationCode' => $emailVerificationCode])->set(['isVerified' => 1])->update();

        return redirect()->to("/dashboard")->with("success", "Your Email Has Been Verified Successfuly!");
    }

    public function check()
    {
        $validation =  Services::validation();
        $validationResult = $validation->run($this->request->getPost(), 'signin');
        if (!$validationResult) {
            return view("auth/login", ["validation" => $validation]);
        }

        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $usermodel = new UsersModel();
        $query = $usermodel->where('email', $email)->first();

        $check = Hash::check($password, $query["password"]);

        if (!$check) {
            return redirect()->back()->with("danger", "Invalid Password")->withInput();
        }
        session()->set('userId', $query['id']);
        return redirect()->to("/dashboard")->with("success", "Logged In Successfuly!");
    }

    public function logout()
    {
        if (session()->has("userId")) {
            session()->remove("userId");
            return redirect()->to("/auth/login?access=out")->with("warning", "You are now logged out successfully...");
        }
        return redirect()->to("/auth/login");
    }
}
