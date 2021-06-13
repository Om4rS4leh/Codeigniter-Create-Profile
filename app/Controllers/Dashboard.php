<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper('form', 'url');
    }

    public function index()
    {
        $userModel = new \App\Models\UsersModel();
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
        return view("dashboard/profile");
    }

    public function save()
    {
        $file = $this->request->getFile('avatar');

        if (!$file->isValid()) {
            throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
        }

        $newName = $file->getRandomName();

        $file->move(WRITEPATH . 'uploads', $newName);

        if ($file->hasMoved()) {
            echo "file has moved successfuly";
        }
    }
}
