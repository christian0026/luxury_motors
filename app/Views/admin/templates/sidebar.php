<?php if (session()->get('is_admin')): ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= current_url() == url_to('Admin::dashboard') ? 'active' : '' ?>" href="/admin/dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= strpos(current_url(), '/admin/cars') !== false ? 'active' : '' ?>" href="/admin/cars">
                    <i class="fas fa-car me-2"></i>
                    Cars
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users me-2"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-envelope me-2"></i>
                    Inquiries
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>