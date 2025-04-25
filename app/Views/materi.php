<?= $this->include('header') ?>
<?= $this->include('head') ?>

<section class="content-section">
    <div class="container">
        <h2>Materi PDF</h2>
        <iframe src="<?= base_url('assets/materi/BAB 1 PENDAHULUAN.pdf') ?>" width="100%" height="600px" style="border:1px solid #ccc;">
            PDF tidak bisa ditampilkan. <a href="<?= base_url('assets/materi/BAB 1 PENDAHULUAN.pdf') ?>">Download Materi</a>
        </iframe>
    </div>
</section>

<?= $this->include('footer') ?>