<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= current_url() == base_url('admin/cars') ? 'active' : '' ?>" href="<?= base_url('admin/cars') ?>">
                    <i class="fas fa-car me-2"></i>
                    Manage Cars
                </a>
            </li>
        </ul>
    </div>

    <div class="position-fixed bottom-0" style="width: inherit; max-width: inherit;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-danger" href="#" onclick="confirmLogout(event)">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
function confirmLogout(event) {
    event.preventDefault();
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = '<?= base_url('admin/logout') ?>';
    }
}
</script>

<style>
.sidebar {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    position: relative;
}

.sidebar .nav-link {
    color: rgba(255, 255, 255, 0.8);
}

.sidebar .nav-link:hover {
    color: #fff;
}

.sidebar .nav-link.active {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
}

.sidebar .nav-link.text-danger {
    color: #dc3545 !important;
}

.sidebar .nav-link.text-danger:hover {
    color: #ff4d5d !important;
    background: rgba(220, 53, 69, 0.1);
}

/* Fix for logout button container */
#sidebarMenu .position-fixed {
    left: 0;
    right: auto;
    width: inherit;
    max-width: inherit;
}

/* Ensure the nav items stay within the sidebar */
#sidebarMenu .nav-item {
    width: 100%;
}

#sidebarMenu .nav-link {
    width: 100%;
    display: block;
}
</style>