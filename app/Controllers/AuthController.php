<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function process()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->login($username, $password);

        if ($user) {
            session()->set('login', true);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Login gagal');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}