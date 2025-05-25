<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/logos/logo.png" alt="Luxury Motors" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= url_is('/') ? 'active' : '' ?>" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('cars') || url_is('cars/*') ? 'active' : '' ?>" href="/cars">
                        Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('about') ? 'active' : '' ?>" href="/about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('contact') ? 'active' : '' ?>" href="/contact">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
                    <?php if (session()->get('logged_in')): ?>
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    <?php else: ?>
                        <a class="nav-link <?= url_is('login') ? 'active' : '' ?>" href="/login">
                            <i class="fas fa-user"></i> Login
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>