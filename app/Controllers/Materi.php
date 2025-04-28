<?php

namespace App\Controllers;

use App\Models\MateriModel;

class Materi extends BaseController
{
    protected $materiModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login'); // Cek apakah sudah login
        }

        $currentPage = $this->request->getVar('page_materi') ?: 1;

        // Ambil data materi dengan pagination
        $materi = $this->materiModel->paginate(5, 'materi', $currentPage);

        $data = [
            'materi' => $materi,
            'pager' => $this->materiModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/dashboard', $data);
    }

    public function detail($slug)
    {
        $materi = $this->materiModel->where('slug', $slug)->first();

        if (!$materi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Materi tidak ditemukan.');
        }

        $data = [
            'title' => $materi['judul'],
            'materi' => $materi
        ];

        return view('admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Materi Baru',
            'validation' => session('validation') ?? \Config\Services::validation()
        ];

        return view('admin/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[materi.judul]',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah terdaftar.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar && $gambar->isValid() ? $gambar->getRandomName() : 'default.jpg';

        if ($gambar && $gambar->isValid()) {
            $gambar->move(FCPATH . 'assets/img/', $namaGambar);
        }

        $this->materiModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'video_url' => $this->request->getVar('video_url'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Materi berhasil ditambahkan.');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $materi = $this->materiModel->find($id);

        if ($materi && $materi['gambar'] != 'default.jpg') {
            $path = FCPATH . 'assets/img/' . $materi['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->materiModel->delete($id);

        session()->setFlashdata('pesan', 'Materi berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $materi = $this->materiModel->asArray()->where('slug', $slug)->first();

        if (!$materi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Materi tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Materi',
            'validation' => session('validation') ?? \Config\Services::validation(),
            'materi' => $materi
        ];

        return view('admin/edit', $data);
    }

    public function update($id)
    {
        $materiLama = $this->materiModel->find($id);

        if (!$materiLama) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Materi tidak ditemukan.');
        }

        $rule_judul = ($materiLama['judul'] == $this->request->getVar('judul'))
            ? 'required'
            : 'required|is_unique[materi.judul]';

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah terdaftar.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $materiLama['gambar'];

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'assets/img/', $namaGambar);

            if ($materiLama['gambar'] != 'default.jpg' && file_exists(FCPATH . 'assets/img/' . $materiLama['gambar'])) {
                unlink(FCPATH . 'assets/img/' . $materiLama['gambar']);
            }
        }

        $slugBaru = url_title($this->request->getVar('judul'), '-', true);

        // Ambil data baru dari request
        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug' => $slugBaru,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'video_url' => $this->request->getVar('video_url'),
            'gambar' => $namaGambar
        ];

        // Cek perubahan
        $adaPerubahan = false;
        foreach ($data as $key => $value) {
            if ($materiLama[$key] != $value) {
                $adaPerubahan = true;
                break;
            }
        }

        if ($adaPerubahan) {
            $this->materiModel->update($id, $data);
            session()->setFlashdata('pesan', 'Materi berhasil diperbarui');
        } else {
            session()->setFlashdata('pesan', 'Tidak ada perubahan data');
        }
        return redirect()->to('/admin');
    }
}
