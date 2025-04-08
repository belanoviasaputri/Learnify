<!DOCTYPE html>
<html lang="en">

<?= view('head'); ?>

<body class="index-page">

  <?= view('header'); ?>
  <?= view('hero'); ?>
  <?= view('about'); ?>
  <?= view('stats'); ?>
  <?= view('services'); ?>
  <?= view('appointment'); ?>
  <?= view('departments'); ?>
  <?= view('doctors'); ?>
  <?= view('faq'); ?>
  <?= view('testimonials'); ?>
  <?= view('gallery'); ?>
  <?= view('contact'); ?>
  <?= view('footer'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <?= view('scripts'); ?>

</body>

</html>