<!-- Inventory Header -->
<section class="inventory-header py-5 bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold mb-3">OUR INVENTORY</h1>
                <p class="lead">Explore our curated collection of the world's finest luxury, super, and sports cars.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="inventory-count mb-0">
                    <span class="count-number"><?= count($cars) ?></span> Vehicles Available
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section py-4 bg-secondary">
    <div class="container">
        <form id="inventoryFilter" method="get" action="/cars">
            <div class="row g-3">
                <div class="col-md-2">
                    <label for="make" class="form-label">Make</label>
                    <select class="form-select" id="make" name="make">
                        <option value="">All Makes</option>
                        <?php foreach ($filterOptions['makes'] as $make): ?>
                        <option value="<?= $make['make'] ?>" <?= ($filters['make'] == $make['make']) ? 'selected' : '' ?>>
                            <?= $make['make'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Any model" value="<?= $filters['model'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="min_price" class="form-label">Min Price</label>
                    <select class="form-select" id="min_price" name="min_price">
                        <option value="">No Min</option>
                        <option value="100000" <?= ($filters['min_price'] == '100000') ? 'selected' : '' ?>>$100,000</option>
                        <option value="250000" <?= ($filters['min_price'] == '250000') ? 'selected' : '' ?>>$250,000</option>
                        <option value="500000" <?= ($filters['min_price'] == '500000') ? 'selected' : '' ?>>$500,000</option>
                        <option value="1000000" <?= ($filters['min_price'] == '1000000') ? 'selected' : '' ?>>$1,000,000</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="max_price" class="form-label">Max Price</label>
                    <select class="form-select" id="max_price" name="max_price">
                        <option value="">No Max</option>
                        <option value="250000" <?= ($filters['max_price'] == '250000') ? 'selected' : '' ?>>$250,000</option>
                        <option value="500000" <?= ($filters['max_price'] == '500000') ? 'selected' : '' ?>>$500,000</option>
                        <option value="1000000" <?= ($filters['max_price'] == '1000000') ? 'selected' : '' ?>>$1,000,000</option>
                        <option value="2000000" <?= ($filters['max_price'] == '2000000') ? 'selected' : '' ?>>$2,000,000</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="body_type" class="form-label">Body Type</label>
                    <select class="form-select" id="body_type" name="body_type">
                        <option value="">All Types</option>
                        <?php foreach ($filterOptions['body_types'] as $type): ?>
                        <option value="<?= $type['body_type'] ?>" <?= ($filters['body_type'] == $type['body_type']) ? 'selected' : '' ?>>
                            <?= $type['body_type'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i> Filter
                    </button>
                </div>
            </div>
            
            <!-- Advanced Filters Toggle -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <a href="#advancedFilters" class="text-white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="advancedFilters">
                        <i class="fas fa-sliders-h me-2"></i> Advanced Filters
                    </a>
                </div>
            </div>
            
            <!-- Advanced Filters -->
            <div class="collapse mt-3" id="advancedFilters">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="min_year" class="form-label">Min Year</label>
                        <select class="form-select" id="min_year" name="min_year">
                            <option value="">No Min</option>
                            <?php for ($year = $filterOptions['max_year']; $year >= $filterOptions['min_year']; $year--): ?>
                            <option value="<?= $year ?>" <?= ($filters['min_year'] == $year) ? 'selected' : '' ?>>
                                <?= $year ?>
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="max_year" class="form-label">Max Year</label>
                        <select class="form-select" id="max_year" name="max_year">
                            <option value="">No Max</option>
                            <?php for ($year = $filterOptions['max_year']; $year >= $filterOptions['min_year']; $year--): ?>
                            <option value="<?= $year ?>" <?= ($filters['max_year'] == $year) ? 'selected' : '' ?>>
                                <?= $year ?>
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="transmission" class="form-label">Transmission</label>
                        <select class="form-select" id="transmission" name="transmission">
                            <option value="">All</option>
                            <?php foreach ($filterOptions['transmissions'] as $transmission): ?>
                            <option value="<?= $transmission['transmission'] ?>" <?= ($filters['transmission'] == $transmission['transmission']) ? 'selected' : '' ?>>
                                <?= $transmission['transmission'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="color" class="form-label">Color</label>
                        <select class="form-select" id="color" name="color">
                            <option value="">All Colors</option>
                            <?php foreach ($filterOptions['colors'] as $color): ?>
                            <option value="<?= $color['color'] ?>" <?= ($filters['color'] == $color['color']) ? 'selected' : '' ?>>
                                <?= $color['color'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Inventory Grid -->
<section class="inventory-grid py-5 bg-dark">
    <div class="container">
        <?php if (empty($cars)): ?>
            <div class="text-center py-5">
                <h3 class="text-muted">No vehicles match your search criteria</h3>
                <p class="mt-3">
                    <a href="/cars" class="btn btn-outline-primary">Reset Filters</a>
                </p>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($cars as $car): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card car-card h-100">
                        <?php if ($car['featured']): ?>
                        <div class="badge bg-primary position-absolute top-0 end-0 m-2">Featured</div>
                        <?php endif; ?>
                        
                        <div class="car-image-container">
                            <img src="/assets/images/cars/<?= $car['id'] ?>/1.jpg" class="card-img-top" alt="<?= $car['make'] ?> <?= $car['model'] ?>">
                            <div class="car-overlay">
                                <a href="/cars/<?= $car['id'] ?>" class="btn btn-primary btn-sm">View Details</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0"><?= $car['make'] ?> <?= $car['model'] ?></h5>
                                <span class="badge bg-dark"><?= $car['year'] ?></span>
                            </div>
                            
                            <div class="car-specs mb-3">
                                <div class="spec-item">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span><?= number_format($car['mileage']) ?> mi</span>
                                </div>
                                <div class="spec-item">
                                    <i class="fas fa-car"></i>
                                    <span><?= $car['body_type'] ?></span>
                                </div>
                                <div class="spec-item">
                                    <i class="fas fa-cog"></i>
                                    <span><?= $car['transmission'] ?></span>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-primary mb-0">$<?= number_format($car['price']) ?></h4>
                                <a href="/cars/<?= $car['id'] ?>" class="btn btn-outline-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="display-5 mb-4">CAN'T FIND WHAT YOU'RE LOOKING FOR?</h2>
        <p class="lead mb-4">We have access to exclusive vehicles not listed online. Contact us to locate your dream car.</p>
        <a href="/contact" class="btn btn-light btn-lg">Request a Vehicle</a>
    </div>
</section>

<script>
    const minPrice = <?= $filterOptions['min_price'] ?? 0 ?>;
    const maxPrice = <?= $filterOptions['max_price'] ?? 1000000 ?>;
</script>
<script src="path/to/js_custom.js"></script>
