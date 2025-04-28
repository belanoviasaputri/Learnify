<?php

namespace App\Controllers;

use App\Models\MateriModel;

class Home extends BaseController
{
    protected $materiModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel(); // Inisialisasi model materi
    }

    // Halaman utama
    public function index(): string
    {
        return view('home');
    }

    // Menampilkan semua materi
    public function materi()
    {
        helper('text');

        // Ambil halaman saat ini dari URL, default ke 1 jika tidak ada
        $currentPage = $this->request->getVar('page_materi') ?: 1;

        // Tentukan jumlah materi yang ditampilkan per halaman
        $materiPerPage = 5;

        // Ambil data materi dengan pagination
        $materi = $this->materiModel->paginate($materiPerPage, 'materi', $currentPage);

        // Ambil pager untuk menampilkan link pagination
        $pager = $this->materiModel->pager;

        // Kirim data materi dan pager ke view
        $data = [
            'materi' => $materi,
            'pager' => $pager,
            'currentPage' => $currentPage
        ];

        return view('materi', $data);
    }


    // public function materi_detail()
    // {

    //     return view('materi-detail');
    // }

    // Menampilkan detail materi berdasarkan slug atau id
    public function materi_detail($slug = null)
    {
        if ($slug === null) {
            return redirect()->to('/materi');
        }

        $materi = $this->materiModel->getMateri($slug);

        if (empty($materi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Materi dengan slug '$slug' tidak ditemukan");
        }

        $data = [
            'materi' => $materi,
        ];

        return view('materi-detail', $data);
    }
}
