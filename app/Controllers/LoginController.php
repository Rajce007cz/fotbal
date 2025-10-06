<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function show()
    {
        return view('auth/login', $this->data);
    }

    public function login()
    {
        session()->set('is_admin', true);
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->remove('is_admin');
        return redirect()->to('/');
    }
}