<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // echo password_hash('bela0000', PASSWORD_DEFAULT);
        // Cek jika user sudah login, langsung arahkan ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/admin');
        }

        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session untuk pengguna yang berhasil login
            $session->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'username' => $user['username'],
                'logged_in' => true
            ]);
            // Redirect ke dashboard setelah login berhasil
            return redirect()->to('/admin');
        } else {
            // Menampilkan pesan error jika login gagal
            $session->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();  // Hapus session pengguna yang sedang login
        return redirect()->to('/login');  // Redirect kembali ke halaman login
    }

    // Fungsi untuk menampilkan dashboard setelah login
    public function dashboard()
    {
        // Cek apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil nama pengguna dari session
        $user = session()->get('nama'); // Nama pengguna

        // Kirim data nama pengguna ke view dashboard
        return view('admin/dashboard', ['user' => $user]);
    }
}
