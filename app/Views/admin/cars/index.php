<?= view('admin/templates/header', ['title' => 'Manage Cars']) ?>

<div class="container-fluid">
    <div class="row">
        <?= view('admin/templates/sidebar') ?>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Cars</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/admin/cars/add" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus"></i> Add New Car
                    </a>
                </div>
            </div>
            
            <?php if (session()->has('message')): ?>
                <div class="alert alert-success"><?= session('message') ?></div>
            <?php endif; ?>
            
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Make & Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cars as $car): ?>
                        <tr>
                            <td><?= $car['id'] ?></td>
                            <td><?= $car['make'] ?> <?= $car['model'] ?></td>
                            <td><?= $car['year'] ?></td>
                            <td>$<?= number_format($car['price']) ?></td>
                            <td>
                                <?php if ($car['featured']): ?>
                                    <span class="badge bg-success">Yes</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">No</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($car['sold']): ?>
                                    <span class="badge bg-danger">Sold</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Available</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/cars/edit/<?= $car['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/admin/cars/delete/<?= $car['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script>
    window.addEventListener('beforeunload', function (e) {
        navigator.sendBeacon('/admin/logout');
    });
</script>

<?= view('admin/templates/footer') ?>