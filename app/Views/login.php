<?= $this->include('layouts/head') ?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, rgb(26, 108, 114), rgb(26, 100, 204));
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .login-card {
        background: #ffffff;
        padding: 3rem 2rem;
        border-radius: 1.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .login-card img {
        height: 60px;
        margin-bottom: 1rem;
    }

    .login-card h1 {
        font-weight: 700;
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .login-card p {
        font-size: 1rem;
        color: #666;
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #444;
        font-size: 0.95rem;
    }

    .form-control {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
    }

    .btn-learnify {
        background-color: #4d9fef;
        border: none;
        border-radius: 0.75rem;
        padding: 0.75rem;
        font-weight: 600;
        font-size: 1rem;
        transition: background 0.3s;
    }

    .btn-learnify:hover {
        background-color: #2b8ae4;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .small-text {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #555;
    }
</style>

<section>
    <div class="login-card" data-aos="zoom-in">
        <h1 class="sitename">Learnify</h1>
        <h4>Welcome Back!</h4>
        <p>Platform Pembelajaran SMK RPL — Praktis & Seru!</p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger text-center">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/login/auth">
            <div class="mb-3 text-start">
                <label for="identifier" class="form-label">Username atau Email</label>
                <input type="text" class="form-control" id="identifier" name="username" placeholder="Masukkan username atau email" required>
            </div>
            <div class="mb-3 text-start position-relative">
                <label for="password" class="form-label">Password</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    <button type="button" id="togglePassword" class="toggle-password">
                        <i class="bi bi-eye-slash" id="toggleIcon" style="font-size: 1.2rem;"></i>
                    </button>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-learnify">Masuk</button>
            </div>
        </form>
    </div>
</section>

<?= $this->include('layouts/scripts') ?>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleIcon = document.querySelector('#toggleIcon');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        if (type === 'text') {
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        } else {
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        }
    });

    AOS.init({
        once: true,
        duration: 800,
    });
</script>