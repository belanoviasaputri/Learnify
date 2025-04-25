<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:learnify@gmail.com">learnify@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 822-6997-5082</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Learnify</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="<?= base_url('materi') ?>">Materi</a></li>
                            <li><a href="#">Kuis</a></li>
                            <li><a href="#">Video Pembelajaran</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="cta-btn d-none d-sm-block" href="/login">Log in</a>
        </div>
    </div>
</header>