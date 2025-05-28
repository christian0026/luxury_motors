<?= view('admin/templates/header', ['title' => $title ?? 'Edit Car']) ?>
<?= view('admin/templates/sidebar') ?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2 class="mt-4 mb-4">Edit Car</h2>
    <form action="/admin/cars/update/<?= esc($car['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <!-- Car Details -->
        <div class="row g-3">
            <div class="col-md-6">
                <label for="make" class="form-label">Make</label>
                <input type="text" class="form-control" id="make" name="make" value="<?= esc($car['make']) ?>" required>
            </div>
            <div class="col-md-6">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="<?= esc($car['model']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="<?= esc($car['year']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= esc($car['price']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="mileage" class="form-label">Mileage</label>
                <input type="number" class="form-control" id="mileage" name="mileage" value="<?= esc($car['mileage']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="transmission" class="form-label">Transmission</label>
                <input type="text" class="form-control" id="transmission" name="transmission" value="<?= esc($car['transmission']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="body_type" class="form-label">Body Type</label>
                <input type="text" class="form-control" id="body_type" name="body_type" value="<?= esc($car['body_type']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="<?= esc($car['color']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="engine" class="form-label">Engine</label>
                <input type="text" class="form-control" id="engine" name="engine" value="<?= esc($car['engine']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="horsepower" class="form-label">Horsepower</label>
                <input type="number" class="form-control" id="horsepower" name="horsepower" value="<?= esc($car['horsepower']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="torque" class="form-label">Torque</label>
                <input type="number" class="form-control" id="torque" name="torque" value="<?= esc($car['torque']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="top_speed" class="form-label">Top Speed (km/h)</label>
                <input type="number" class="form-control" id="top_speed" name="top_speed" value="<?= esc($car['top_speed']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="acceleration" class="form-label">0-100 km/h (s)</label>
                <input type="text" class="form-control" id="acceleration" name="acceleration" value="<?= esc($car['acceleration']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="fuel_type" class="form-label">Fuel Type</label>
                <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="<?= esc($car['fuel_type']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="doors" class="form-label">Doors</label>
                <input type="number" class="form-control" id="doors" name="doors" value="<?= esc($car['doors']) ?>" required>
            </div>
            <div class="col-md-4">
                <label for="seats" class="form-label">Seats</label>
                <input type="number" class="form-control" id="seats" name="seats" value="<?= esc($car['seats']) ?>" required>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($car['description']) ?></textarea>
            </div>
            <div class="col-12">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" <?= $car['featured'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="featured">Featured Car</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="sold" name="sold" value="1" <?= $car['sold'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="sold">Mark as Sold</label>
                </div>
            </div>
        </div>
        <!-- Image Uploads -->
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <label for="featured_image" class="form-label">Featured Image</label>
                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                <?php if (!empty($featuredImage)): ?>
                    <div class="position-relative d-inline-block mt-2">
                        <img src="<?= esc($featuredImage) ?>" alt="Current Featured" class="img-fluid" style="max-height:150px;">
                        <a href="/admin/cars/delete-image/<?= $car['id'] ?>/featured" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="return confirm('Remove featured image?')">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <img id="featuredPreview" src="#" alt="Featured Preview" class="img-fluid mt-2 d-none" style="max-height:150px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="gallery_images" class="form-label">Gallery Images (up to 6)</label>
                <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                <div id="galleryPreview" class="d-flex flex-wrap gap-2 mt-2">
                    <?php if (!empty($galleryImages)): ?>
                        <?php foreach ($galleryImages as $i => $img): ?>
                            <div class="position-relative d-inline-block" data-existing>
                                <img src="<?= esc($img) ?>" class="img-thumbnail" style="width:80px;height:60px;object-fit:cover;">
                                <a href="/admin/cars/delete-image/<?= $car['id'] ?>/gallery/<?= $i+1 ?>" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="return confirm('Remove this image?')">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Car</button>
    </form>
</div>
<script>
const featuredInput = document.getElementById('featured_image');
featuredInput.onchange = function(evt) {
    const [file] = this.files;
    if (file) {
        const preview = document.getElementById('featuredPreview');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    }
};
// Gallery images preview and remove (for new uploads)
const galleryInput = document.getElementById('gallery_images');
const galleryPreview = document.getElementById('galleryPreview');
let galleryFiles = [];

galleryInput.addEventListener('change', function(evt) {
    galleryFiles = Array.from(this.files).slice(0, 6);
    renderGalleryPreview();
});

function renderGalleryPreview() {
    // Keep existing images (from server) in preview
    const existing = Array.from(galleryPreview.querySelectorAll('.position-relative.d-inline-block[data-existing]'));
    galleryPreview.innerHTML = '';
    existing.forEach(el => galleryPreview.appendChild(el));
    // Add new previews
    galleryFiles.forEach((file, idx) => {
        const wrapper = document.createElement('div');
        wrapper.className = 'position-relative d-inline-block';
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'img-thumbnail';
        img.style = 'width:80px;height:60px;object-fit:cover;';
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0';
        btn.innerHTML = '<i class="fas fa-times"></i>';
        btn.onclick = function() {
            galleryFiles.splice(idx, 1);
            updateGalleryInput();
            renderGalleryPreview();
        };
        wrapper.appendChild(img);
        wrapper.appendChild(btn);
        galleryPreview.appendChild(wrapper);
    });
}

function updateGalleryInput() {
    const dt = new DataTransfer();
    galleryFiles.forEach(f => dt.items.add(f));
    galleryInput.files = dt.files;
}

window.addEventListener('beforeunload', function (e) {
            navigator.sendBeacon('/admin/logout');
        });
</script>
<?= view('admin/templates/footer') ?>