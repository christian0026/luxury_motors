<?= view('admin/templates/header', ['title' => 'Edit Car']) ?>

<div class="container-fluid">
    <div class="row">
        <?= view('admin/templates/sidebar') ?>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Car: <?= $car['make'] ?> <?= $car['model'] ?></h1>
            </div>
            
            <?php if (session()->has('message')): ?>
                <div class="alert alert-success"><?= session('message') ?></div>
            <?php endif; ?>
            
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session('errors') as $error): ?>
                        <p class="mb-1"><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <form action="/admin/cars/update/<?= $car['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="make" class="form-label">Make</label>
                            <input type="text" class="form-control" id="make" name="make" value="<?= old('make', $car['make']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="<?= old('model', $car['model']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" name="year" min="1900" max="<?= date('Y')+1 ?>" value="<?= old('year', $car['year']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price ($)</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= old('price', $car['price']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mileage" class="form-label">Mileage</label>
                            <input type="number" class="form-control" id="mileage" name="mileage" value="<?= old('mileage', $car['mileage']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="transmission" class="form-label">Transmission</label>
                            <select class="form-select" id="transmission" name="transmission" required>
                                <option value="Automatic" <?= old('transmission', $car['transmission']) == 'Automatic' ? 'selected' : '' ?>>Automatic</option>
                                <option value="Manual" <?= old('transmission', $car['transmission']) == 'Manual' ? 'selected' : '' ?>>Manual</option>
                                <option value="Semi-Automatic" <?= old('transmission', $car['transmission']) == 'Semi-Automatic' ? 'selected' : '' ?>>Semi-Automatic</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="body_type" class="form-label">Body Type</label>
                            <select class="form-select" id="body_type" name="body_type" required>
                                <option value="Coupe" <?= old('body_type', $car['body_type']) == 'Coupe' ? 'selected' : '' ?>>Coupe</option>
                                <option value="Sedan" <?= old('body_type', $car['body_type']) == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                <option value="SUV" <?= old('body_type', $car['body_type']) == 'SUV' ? 'selected' : '' ?>>SUV</option>
                                <option value="Convertible" <?= old('body_type', $car['body_type']) == 'Convertible' ? 'selected' : '' ?>>Convertible</option>
                                <option value="Wagon" <?= old('body_type', $car['body_type']) == 'Wagon' ? 'selected' : '' ?>>Wagon</option>
                                <option value="Hatchback" <?= old('body_type', $car['body_type']) == 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?= old('color', $car['color']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="engine" class="form-label">Engine</label>
                            <input type="text" class="form-control" id="engine" name="engine" value="<?= old('engine', $car['engine']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="horsepower" class="form-label">Horsepower</label>
                            <input type="number" class="form-control" id="horsepower" name="horsepower" value="<?= old('horsepower', $car['horsepower']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="torque" class="form-label">Torque (lb-ft)</label>
                            <input type="number" class="form-control" id="torque" name="torque" value="<?= old('torque', $car['torque']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="top_speed" class="form-label">Top Speed (mph)</label>
                            <input type="number" class="form-control" id="top_speed" name="top_speed" value="<?= old('top_speed', $car['top_speed']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="acceleration" class="form-label">0-60 mph (seconds)</label>
                            <input type="number" class="form-control" id="acceleration" name="acceleration" step="0.1" value="<?= old('acceleration', $car['acceleration']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="fuel_type" class="form-label">Fuel Type</label>
                            <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="<?= old('fuel_type', $car['fuel_type']) ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="doors" class="form-label">Doors</label>
                            <input type="number" class="form-control" id="doors" name="doors" min="1" max="6" value="<?= old('doors', $car['doors']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="seats" class="form-label">Seats</label>
                            <input type="number" class="form-control" id="seats" name="seats" min="1" max="10" value="<?= old('seats', $car['seats']) ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required><?= old('description', $car['description']) ?></textarea>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1" <?= old('featured', $car['featured']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="featured">Featured Car</label>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Current Images</label>
                    <div class="row">
                        <?php foreach ($images as $image): ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="/<?= $image['image_path'] ?>" class="card-img-top" alt="Car Image">
                                <div class="card-body text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="primary_image" id="primary_<?= $image['id'] ?>" value="<?= $image['id'] ?>" <?= $image['is_primary'] ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="primary_<?= $image['id'] ?>">
                                            Primary
                                        </label>
                                    </div>
                                    <a href="/admin/cars/delete-image/<?= $image['id'] ?>" class="btn btn-sm btn-outline-danger mt-2" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="images" class="form-label">Add More Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                    <div class="form-text">Upload additional images (max 10MB each)</div>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Car</button>
                <a href="/admin/cars" class="btn btn-secondary">Cancel</a>
            </form>
        </main>
    </div>
</div>

<?= view('admin/templates/footer') ?>