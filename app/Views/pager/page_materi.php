<?php $pager->setSurroundCount(2) ?>

<?= $this->include('layouts/head') ?>

<style>
    /* Styling untuk tombol pagination */
    .pagination .page-item .page-link {
        color: blue;
        /* Background default putih */
        border: 2px solid transparent;
        /* Border transparan sebagai dasar */
        border-radius: 30px;
        /* Membuat sudut tombol lebih bulat */
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .pagination .page-item .page-link:hover {
        color: white;
        background: white;
        border: 2px solid rgb(39, 117, 190);
        /* Menggunakan border yang akan diwarnai */
        background-image: linear-gradient(45deg, rgb(89, 132, 182), rgb(27, 78, 154));
        /* Gradient pada border saat hover */
    }

    .pagination .page-item.active .page-link {
        /* color: white; */
        background: white;
        color: rgb(52, 98, 196);
        /* Warna teks aktif */
        border: 2px solid rgb(39, 117, 190);
        /* Border berwarna ungu pada tombol aktif */
    }

    .pagination .page-item.disabled .page-link {
        background: rgb(190, 213, 231);
        color: rgb(157, 179, 219);
        border: 2px solid transparent;
        /* Tidak ada border untuk tombol yang disabled */
    }

    /* Menambahkan padding untuk tombol pagination agar lebih lebar */
    .pagination .page-item .page-link {
        padding: 8px 20px;
        border: 2px solid rgb(209, 233, 255);
    }
</style>

<div class="pagination">
    <ul class=" pagination justify-content-center gap-2">
        <!-- Previous Page Link -->
        <?php if ($pager->hasPreviousPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        <?php endif; ?>

        <!-- Pagination Links -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Next Page Link -->
        <?php if ($pager->hasNextPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        <?php endif; ?>
    </ul>
</div>

<!-- Vendor JS -->
<?= $this->include('layouts/scripts') ?>

<script>
    AOS.init({
        once: true,
        duration: 1000,
    });
</script>