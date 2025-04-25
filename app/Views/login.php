<?= $this->include('header') ?>
<?= $this->include('head') ?>

<section class="login-register-area" style="padding: 50px 0;">
    <div class="container d-flex justify-content-around flex-wrap">
        <!-- LOGIN FORM -->
        <div class="login-box" style="width: 400px;">

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('auth/doLogin') ?>">
                <input type="email" name="email" placeholder="Email" required class="form-control mb-3">
                <input type="password" name="password" placeholder="Password" required class="form-control mb-3">
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>

            <p class="mt-3 text-center">Belum punya akun? <a href="#register" onclick="showRegister()">Daftar di sini</a></p>
        </div>

        <!-- REGISTER FORM -->
        <div class="register-box" id="registerBox" style="width: 400px; display: none;">
            <form method="post" action="<?= site_url('auth/doRegister') ?>">
                <input type="text" name="name" placeholder="Nama Lengkap" required class="form-control mb-3">
                <input type="email" name="email" placeholder="Email" required class="form-control mb-3">
                <input type="password" name="password" placeholder="Password" required class="form-control mb-3">
                <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required class="form-control mb-3">
                <button type="submit" class="btn btn-success w-100">Sign Up</button>
            </form>

            <p class="mt-3 text-center">Sudah punya akun? <a href="#login" onclick="showLogin()">Masuk di sini</a></p>
        </div>
    </div>
</section>

<script>
    function showRegister() {
        document.querySelector('.login-box').style.display = 'none';
        document.getElementById('registerBox').style.display = 'block';
    }

    function showLogin() {
        document.querySelector('.login-box').style.display = 'block';
        document.getElementById('registerBox').style.display = 'none';
    }
</script>

<?= $this->include('footer') ?>