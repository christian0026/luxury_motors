<?= view('admin/templates/header', ['title' => 'Admin Dashboard']) ?>

<div class="container-fluid">
    <div class="row">
        <?= view('admin/templates/sidebar') ?>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            
            <?php if (session()->has('message')): ?>
                <div class="alert alert-success"><?= session('message') ?></div>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Cars</h5>
                            <p class="card-text display-4"><?= $total_cars ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Featured Cars</h5>
                            <p class="card-text display-4"><?= $featured_cars ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Sold Cars</h5>
                            <p class="card-text display-4"><?= $sold_cars ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?= view('admin/templates/footer') ?>