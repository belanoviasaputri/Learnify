<?= $this->include('layouts/head'); ?>
<?= $this->include('layouts/header'); ?>

<section class="section-detail" style="padding: 80px 0; background: #f8f9fc; text-align: center;">

    <!-- Judul -->
    <h1 style="font-size: 36px; font-weight: 700; color: #4e73df;"><?= $materi['judul']; ?></h1>
    <p style="color: #858796; margin-top: 10px;">Dipublikasikan pada <?= $materi['created_at']; ?></p>

    <!-- Gambar Materi -->
    <div style="margin: 40px 0;">
        <img src="/assets/img/<?= $materi['gambar']; ?>" alt="Gambar Materi" style="width: 80%; max-width: 800px; height: auto; border-radius: 12px; object-fit: cover;">
    </div>

    <!-- Deskripsi Materi -->
    <div style="color: #5a5c69; font-size: 18px; line-height: 1.8; max-width: 800px; margin: 0 auto 40px auto; text-align: justify;">
        <?= nl2br($materi['deskripsi']); ?>
    </div>

    <!-- Video Pembelajaran -->
    <h2 style="font-size: 28px; font-weight: 700; color: #1cc88a; margin-bottom: 20px;">Video Pembelajaran</h2>

    <div class="col-lg-6 d-flex justify-content-center mb-4 mx-auto" data-aos="fade" data-aos-delay="200">
        <div class="position-relative" style="width: 100%; max-width: 560px;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= esc($materi['video_url']); ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border: none;" allowfullscreen>
            </iframe>
        </div>
    </div>



    <!-- Tombol Aksi -->
    <a href=" #" class="btn" style="background: #4e73df; color: white; padding: 12px 30px; border-radius: 30px; font-weight: 600; text-decoration: none; transition: background 0.3s;">Mulai Belajar Sekarang</a>

</section>

<?= $this->include('layouts/footer'); ?>
<?= $this->include('layouts/scripts'); ?>