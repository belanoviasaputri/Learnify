<?= $this->include('layouts/head') ?>

<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top shadow" style="background: linear-gradient(135deg, #00c6ff, #0072ff); padding: 10px 0;">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="/" class="logo d-flex align-items-center text-decoration-none">
            <img src="/assets/img/logo.png" alt="Learnify Logo" style="height: 45px;">
            <h1 class="ms-2 mb-0 fs-4 fw-bold text-white">Learnify</h1>
        </a>
        <a href="/admin" class="btn btn-light rounded-pill shadow-sm px-4 py-2">Dashboard</a>
    </div>
</header>

<main id="main" class="pt-5" style="background: #f0f4ff; min-height: 90vh;">
    <section class="dashboard-section py-5">
        <div class="container">

            <h1 class="section-title text-center mb-5 animate__animated animate__fadeInDown"
                style="font-family: 'Poppins', sans-serif; font-size: 2.5rem; font-weight: 700; color: #0072ff;">
                <span style="color: #00c6ff;">Tambah</span> Materi
            </h1>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg rounded-4 border-0">
                        <div class="card-body p-5">

                            <form id="materiForm" action="/admin/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <div class="mb-4">
                                    <label for="judul" class="form-label fw-semibold text-primary">Judul Materi</label>
                                    <input type="text" id="judul" name="judul"
                                        class="form-control rounded-pill <?= session('errors.judul') ? 'is-invalid' : ''; ?>"
                                        placeholder="Masukkan Judul" value="<?= old('judul'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.judul'); ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold text-primary">Deskripsi Materi</label>
                                    <textarea id="deskripsi" name="deskripsi"
                                        class="form-control rounded-4 <?= session('errors.deskripsi') ? 'is-invalid' : ''; ?>"
                                        rows="5" placeholder="Tulis deskripsi materi..."><?= old('deskripsi'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= session('errors.deskripsi'); ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="video_url" class="form-label fw-semibold text-primary">Video URL (YouTube ID)</label>
                                    <input type="text" id="video_url" name="video_url"
                                        class="form-control rounded-pill <?= session('errors.video_url') ? 'is-invalid' : ''; ?>"
                                        placeholder="Contoh: dQw4w9WgXcQ" value="<?= old('video_url'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.video_url'); ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="gambar" class="form-label fw-semibold text-primary">Upload Gambar Materi</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <img id="preview-img" src="/assets/img/default.jpg"
                                            class="rounded-4 shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                                        <input type="file" id="gambar" name="gambar"
                                            class="form-control <?= session('errors.gambar') ? 'is-invalid' : ''; ?>" onchange="previewImg()">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session('errors.gambar'); ?>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-5">
                                    <a href="/admin" class="btn btn-outline-primary rounded-pill px-4">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-success rounded-pill px-5 shadow-sm">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<!-- Footer -->
<?= $this->include('layouts/footer') ?>

<!-- Vendor JS -->
<?= $this->include('layouts/scripts') ?>

<script>
    AOS.init({
        once: true,
        duration: 1000,
    });

    function previewImg() {
        const gambar = document.getElementById('gambar');
        const preview = document.getElementById('preview-img');

        if (gambar.files.length > 0) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(gambar.files[0]);
            fileReader.onload = function(e) {
                preview.src = e.target.result;
            };
        }
    }
</script>