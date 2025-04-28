<!DOCTYPE html>
<html lang="en">

<?= $this->include('layouts/head') ?>

<body class="index-page">

  <?= $this->include('layouts/header') ?>
  <?= $this->include('layouts/hero') ?>
  <?= $this->include('layouts/about') ?>
  <?= $this->include('layouts/faq') ?>
  <?= $this->include('layouts/contact') ?>
  <?= $this->include('layouts/footer') ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <?= $this->include('layouts/scripts') ?>

</body>

</html>