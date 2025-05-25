<?= view('admin/templates/header', ['title' => 'Add New Car']) ?>

<div class="container-fluid">
    <div class="row">
        <?= view('admin/templates/sidebar') ?>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add New Car</h1>
            </div>
            
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session('errors') as $error): ?>
                        <p class="mb-1"><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <form action="/admin/cars/save" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="make" class="form-label">Make</label>
                            <input type="text" class="form-control" id="make" name="make" value="<?= old('make') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="<?= old('model') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" name="year" min="1900" max="<?= date('Y')+1 ?>" value="<?= old('year') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price ($)</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= old('price') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mileage" class="form-label">Mileage</label>
                            <input type="number" class="form-control" id="mileage" name="mileage" value="<?= old('mileage') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="transmission" class="form-label">Transmission</label>
                            <select class="form-select" id="transmission" name="transmission" required>
                                <option value="">Select Transmission</option>
                                <option value="Automatic" <?= old('transmission') == 'Automatic' ? 'selected' : '' ?>>Automatic</option>
                                <option value="Manual" <?= old('transmission') == 'Manual' ? 'selected' : '' ?>>Manual</option>
                                <option value="Semi-Automatic" <?= old('transmission') == 'Semi-Automatic' ? 'selected' : '' ?>>Semi-Automatic</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="body_type" class="form-label">Body Type</label>
                            <select class="form-select" id="body_type" name="body_type" required>
                                <option value="">Select Body Type</option>
                                <option value="Coupe" <?= old('body_type') == 'Coupe' ? 'selected' : '' ?>>Coupe</option>
                                <option value="Sedan" <?= old('body_type') == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                <option value="SUV" <?= old('body_type') == 'SUV' ? 'selected' : '' ?>>SUV</option>
                                <option value="Convertible" <?= old('body_type') == 'Convertible' ? 'selected' : '' ?>>Convertible</option>
                                <option value="Wagon" <?= old('body_type') == 'Wagon' ? 'selected' : '' ?>>Wagon</option>
                                <option value="Hatchback" <?= old('body_type') == 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?= old('color') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="engine" class="form-label">Engine</label>
                            <input type="text" class="form-control" id="engine" name="engine" value="<?= old('engine') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="horsepower" class="form-label">Horsepower</label>
                            <input type="number" class="form-control" id="horsepower" name="horsepower" value="<?= old('horsepower') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="torque" class="form-label">Torque (lb-ft)</label>
                            <input type="number" class="form-control" id="torque" name="torque" value="<?= old('torque') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="top_speed" class="form-label">Top Speed (mph)</label>
                            <input type="number" class="form-control" id="top_speed" name="top_speed" value="<?= old('top_speed') ?>" required>
                        </div>