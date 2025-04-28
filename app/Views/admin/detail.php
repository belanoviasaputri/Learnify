<?= $this->include('layouts/head') ?>

<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top shadow-lg" style="background: linear-gradient(90deg, #4facfe, #00f2fe); padding: 20px 0;">
  <div class="container d-flex justify-content-between align-items-center">
    <a href="/" class="logo d-flex align-items-center text-decoration-none">
      <img src="/assets/img/logo.png" alt="Learnify Logo" style="height: 45px;">
      <h1 class="ms-2 mb-0 fs-3 fw-bold text-white">Learnify</h1>
    </a>
    <a href="/logout" class="btn btn-light btn-sm rounded-pill shadow-sm custom-hover-danger px-4 py-2">
      Logout
    </a>
  </div>
</header>

<main id="main" style="margin-top: 100px; min-height: 80vh;">
  <section class="detail-section py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-9">

          <div class="card border-0 shadow rounded-5 animate__animated animate__fadeInUp" style="overflow: hidden; background: #ffffff;">
            <!-- Card Header -->
            <div class="card-header text-center py-4" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border-bottom: 0;">
              <h2 class="fw-bold mb-0" style="color:rgb(255, 255, 255);">
                <?= htmlspecialchars($materi['judul']); ?>
              </h2>
            </div>


            <!-- Gambar Materi -->
            <?php if (!empty($materi['gambar'])) : ?>
              <div class="text-center my-4">
                <img src="/assets/img/<?= $materi['gambar']; ?>"
                  alt="Gambar Materi"
                  class="img-fluid rounded-4 shadow-sm"
                  style="max-width: 90%; height: auto; max-height: 300px; object-fit: cover;">
              </div>
            <?php endif; ?>

            <!-- Detail Materi -->
            <div class="p-5">
              <div class="mb-4">
                <h5 class="fw-semibold text-gradient">Slug Materi</h5>
                <p class="text-muted"><?= $materi['slug']; ?></p>
              </div>

              <div class="mb-4">
                <h5 class="fw-semibold text-gradient">Deskripsi</h5>
                <div class="text-muted text-justify fs-6">
                  <?= nl2br($materi['deskripsi']); ?>
                </div>
              </div>

              <div class="mb-5">
                <h5 class="fw-semibold text-gradient">Video Pembelajaran</h5>
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                  <iframe src="https://www.youtube.com/embed/<?= $materi['video_url']; ?>"
                    title="Video Materi" allowfullscreen></iframe>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="d-flex justify-content-center gap-3 flex-wrap">
                <div>
                  <a href="/admin" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm custom-hover-primary uniform-btn">
                    <i class="bi bi-arrow-left"></i> Kembali
                  </a>
                </div>

                <div>
                  <a href="/admin/edit/<?= $materi['slug']; ?>" class="btn btn-outline-success btn-lg rounded-pill shadow-sm custom-hover-success uniform-btn">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                </div>

                <div>
                  <form action="/admin/delete/<?= $materi['id']; ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline-danger btn-lg rounded-pill shadow-sm custom-hover-danger uniform-btn">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </div>

              <!-- Card Footer -->
              <div class=" text-center small text-muted py-3">
                Terakhir diperbarui: <?= date('d M Y', strtotime($materi['updated_at'])); ?>
              </div>

            </div> <!-- End Card -->

          </div>
        </div>
      </div>
  </section>
</main>

<?= $this->include('layouts/footer') ?>
<?= $this->include('layouts/scripts') ?>

<script>
  AOS.init({
    once: true,
    duration: 800,
  });
</script>

<style>
  .text-gradient {
    background: linear-gradient(90deg, #6a11cb, #2575fc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
</style>