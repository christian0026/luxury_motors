<?= view('admin/templates/header', ['title' => $title ?? 'Admin Dashboard']) ?>
<?= view('admin/templates/sidebar') ?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Welcome to the Admin Dashboard</h1>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="fas fa-car fa-lg"></i>
                        </span>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Cars</h5>
                        <h3 class="mb-0 fw-bold"><?= $total_cars ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="fas fa-star fa-lg"></i>
                        </span>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Featured Cars</h5>
                        <h3 class="mb-0 fw-bold"><?= $featured_cars ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="fas fa-check-circle fa-lg"></i>
                        </span>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Sold Cars</h5>
                        <h3 class="mb-0 fw-bold"><?= $sold_cars ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Quick Actions</h4>
            <div class="d-flex flex-wrap gap-3">
                <a href="/admin/cars/add" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-plus me-2"></i>Add New Car
                </a>
                <a href="/admin/cars" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-list me-2"></i>Manage Cars
                </a>
            </div>
        </div>
    </div>
</div>

<?= view('admin/templates/footer') ?>