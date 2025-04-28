<?= $this->include('layouts/head') ?>

<style>
  body {
    background: linear-gradient(135deg, #f0f4ff, #e0f7fa);
    font-family: 'Poppins', sans-serif;
    color: #333;
  }

  .header {
    background: linear-gradient(90deg, #4d9fef, #66bb6a);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 1rem 0;
  }

  .logo h1 {
    font-weight: 800;
    color: #fff;
    letter-spacing: 1px;
  }

  .custom-hover-danger:hover {
    background: #ef5350;
    color: #fff;
    border-color: #ef5350;
  }

  .dashboard-section {
    padding-top: 120px;
  }

  .dashboard-section h1 {
    font-weight: 800;
    color: #333;
    margin-bottom: 2rem;
  }

  .btn-primary {
    background: linear-gradient(90deg, #4d9fef, #66bb6a);
    border: none;
    border-radius: 50px;
    padding: 0.6rem 1.5rem;
    font-weight: 600;
    transition: background 0.3s ease;
  }

  .btn-primary:hover {
    background: linear-gradient(90deg, #357bd8, #4caf50);
  }

  .table {
    border-radius: 1rem;
    overflow: hidden;
  }

  .table th,
  .table td {
    vertical-align: middle;
    text-align: center;
  }

  .table-hover tbody tr:hover {
    background-color: #e3f2fd;
  }

  .table img {
    border-radius: 0.75rem;
    height: 60px;
    object-fit: cover;
  }

  .alert-success {
    border-radius: 1rem;
    background-color: #d4edda;
    color: #155724;
  }

  .btn-outline-primary {
    border-color: #4d9fef;
    color: #4d9fef;
    border-radius: 50px;
    transition: 0.3s;
  }

  .btn-outline-primary:hover {
    background: #4d9fef;
    color: #fff;
  }
</style>

<section>
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
      <a href="/admin" class="logo d-flex align-items-center text-decoration-none">
        <img src="/assets/img/favicon.png" alt="Learnify Logo" style="height: 45px;">
        <h1 class="ms-2 mb-0 fs-3">Learnify</h1>
      </a>

      <a href="/logout" class="btn btn-outline-danger shadow-sm custom-hover-danger px-4 py-2 rounded-pill">
        Logout
      </a>
    </div>
  </header>

  <!-- Main -->
  <main id="main">
    <section class="dashboard-section py-5">
      <div class="container">
        <h1 class="text-center">Dashboard Materi</h1>

        <div class="d-flex justify-content-start mb-4">
          <a href="/admin/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Materi Baru
          </a>
        </div>

        <?php if (session()->getFlashdata('pesan')): ?>
          <div class="alert alert-success text-center shadow-sm">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>

        <div class="table-responsive rounded shadow-sm mt-4">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
              <?php
              $materi = array_reverse($materi);
              foreach ($materi as $m): ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $m['judul']; ?></td>
                  <td><?= strlen(strip_tags($m['deskripsi'])) > 100 ? substr(strip_tags($m['deskripsi']), 0, 100) . '...' : strip_tags($m['deskripsi']); ?></td>
                  <td>
                    <?php if (!empty($m['gambar'])): ?>
                      <img src="/assets/img/<?= $m['gambar']; ?>" alt="Gambar Materi">
                    <?php else: ?>
                      <span class="badge bg-secondary rounded-pill">Tidak Ada</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="/admin/detail/<?= $m['slug']; ?>" class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-eye"></i> Detail
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>

              <?php if (empty($materi)): ?>
                <tr>
                  <td colspan="5" class="text-center">Belum ada materi tersedia.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>

          <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('materi', 'page_materi'); ?>
          </div>
        </div>
      </div>
    </section>
  </main>
</section>

<?= $this->include('layouts/footer') ?>
<?= $this->include('layouts/scripts') ?>

<script>
  AOS.init({
    once: true,
    duration: 1000,
  });
</script>