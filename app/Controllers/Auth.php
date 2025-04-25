<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        return view('login'); // Nunjuk ke file: app/Views/login.php
    }

    public function doLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek dummy user (nanti bisa diganti pakai database)
        if ($email === 'admin@example.com' && $password === 'admin123') {
            // Simpan session login (opsional dulu)
            session()->set('logged_in', true);
            session()->set('user_email', $email);

            return redirect()->to('/')->with('success', 'Berhasil login!');
        }

        return redirect()->to('/login')->with('error', 'Email atau password salah!');
    }

    public function doRegister()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->to('/login')->with('error', 'Password tidak cocok!');
        }

        // Simulasi berhasil daftar (belum pakai database)
        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
