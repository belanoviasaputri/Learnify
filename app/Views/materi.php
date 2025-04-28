<?= $this->include('layouts/header') ?>

<!-- Tambahkan preload untuk stylesheet utama -->
<link rel="preload" href="<?= base_url('assets/css/styles.css'); ?>" as="style" />

<?= $this->include('layouts/head') ?>

<section class="section-title text-center">
    <div class="container">
        <h2 class="fw-bold" style="font-size: 2.5rem;">Materi Pembelajaran</h2>
        <p class="mt-2 text-muted">Selamat datang! Pelajari materi yang sudah kami siapkan untuk kamu.</p>
    </div>
</section>

<section class="section-materi" style="padding: 80px 0; background: #f8f9fc;">
    <div class="container" style="max-width: 1200px;">
        <div class="row justify-content-center">
            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
            <?php
            $materi = array_reverse($materi);
            foreach ($materi as $m): ?>
                <div class="col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card" style="border-radius: 15px; box-shadow: 0 6px 20px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <img src="<?= base_url('assets/img/' . $m['gambar']); ?>" class="card-img-top" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="<?= $m['judul']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary" style="font-weight: 700;"><?= $m['judul']; ?></h5>
                            <p class="card-text" style="flex-grow: 1; color: #5a5c69;"><?= word_limiter(strip_tags($m['deskripsi']), 20); ?></p>
                            <a href="<?= base_url('materi-detail/' . $m['slug']); ?>" class="btn btn-success mt-3" style="border-radius: 30px; font-weight: 600;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('materi', 'page_materi'); ?>
        </div>
    </div>
</section>

<?= $this->include('layouts/footer') ?>

<!-- Tambahkan efek hover -->
<style>
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }
</style>