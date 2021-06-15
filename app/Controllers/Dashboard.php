<?php

namespace App\Controllers;



use App\Libraries\Hash;
use \Config\Services;
use \App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper(['url', 'Form', 'Flashing']);
    }

    public function index()
    {
        $userModel = new UsersModel();
        $userId = session()->get('userId');
        $user = $userModel->find($userId);
        $data = [
            'user' => $user
        ];
        $user['isVerified'] === '1' ? null : session()->setFlashdata('warning', 'Visit Your Email To Verify Your Account...');
        return view("dashboard/index", $data);
    }

    public function profile()
    {
        $userModel = new UsersModel();
        $userId = session()->get('userId');
        $user = $userModel->find($userId);
        $data = [
            'user' => $user
        ];
        return view("dashboard/profile", $data);
    }

    public function save()
    {
        $userModel = new UsersModel();
        $userId = session()->get('userId');
        $user = $userModel->find($userId);
        $data = [
            'user' => $user
        ];
        $validation =  Services::validation();
        $validationResult = $validation->run($this->request->getPost(), 'editProfile');
        if (!$validationResult) {
            $data['validation'] = $validation;
            return view("dashboard/profile", $data);
        }

        if (null !== $this->request->getPost('isImageUploaded')) {
            $file = $this->request->getFile('avatar');
            if (!$file->isValid()) {
                throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
            }
            $fileName = $file->getRandomName();
            $file->move(APPPATH . '..\public\media\avatars', $fileName);
            if (!$file->hasMoved()) {
                return redirect()->back()->with("danger", "Server Error, Please Contact The Support..")->withInput();
            }
        }
        $email = $this->request->getPost("email");
        $name = $this->request->getPost("name");
        $fileName = isset($fileName) ? $fileName : $user['avatar'];
        $password = $this->request->getPost("password");
        $check = Hash::check($password, $user["password"]);
        if (!$check) {
            return redirect()->back()->with("danger", "Invalid Password")->withInput();
        }

        $data = [
            'name' => $name,
            'avatar' => $fileName,
            'email' => $email,
        ];

        if (!$userModel->update($userId, $data)) {
            return redirect()->back()->with("danger", "Error Happened : " . $userModel->errors())->withInput();
        }

        return redirect()->to("/dashboard")->with("success", "Your Profile Information Has Been Updated Successfuly!");
    }

    public function password()
    {
        $userModel = new UsersModel();
        $userId = session()->get('userId');
        $user = $userModel->find($userId);
        $data = [
            'user' => $user
        ];
        return view("dashboard/password", $data);
    }

    public function savepassword()
    {
        $validation =  Services::validation();
        $validationResult = $validation->run($this->request->getPost(), 'savePassword');
        if (!$validationResult) {
            $data['validation'] = $validation;
            return view("dashboard/password");
        }

        $userModel = new UsersModel();
        $userId = session()->get('userId');
        $user = $userModel->find($userId);
        $password = $this->request->getPost('password');
        $newPassword = $this->request->getPost('newpassword');

        $check = Hash::check($password, $user['password']);
        if (!$check) {
            return redirect()->back()->with("danger", "Invalid Password")->withInput();
        }

        $HashedPassword = Hash::make($newPassword);

        if (!$userModel->update($userId, ['password' => $HashedPassword])) {
            return redirect()->back()->with("danger", "Error Happened : " . $userModel->errors())->withInput();
        }
        return redirect()->to("/dashboard")->with("success", "Your Password Has Been Updated Successfuly!");
    }
}
