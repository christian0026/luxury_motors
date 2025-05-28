<?= view('templates/header', ['title' => $title ?? 'Car Details']) ?>

<!-- Hero Gallery Section -->
<section class="car-hero position-relative" style="margin-top: 80px; background-color: black;">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Bootstrap Carousel for Gallery -->
                <div id="carGallery" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($images as $idx => $img): ?>
                        <div class="carousel-item <?= $idx === 0 ? 'active' : '' ?>">
                            <img src="<?= esc($img) ?>" class="d-block w-100" style="object-fit:cover; max-height:500px;" alt="Car Image <?= $idx+1 ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($images) > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carGallery" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carGallery" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    <?php endif; ?>
                </div>
                <!-- Thumbnails -->
                <?php if (count($images) > 1): ?>
                <div class="d-flex mt-3 gap-2">
                    <?php foreach ($images as $idx => $img): ?>
                    <img src="<?= esc($img) ?>" class="img-thumbnail" style="width:80px; height:60px; object-fit:cover; cursor:pointer;" onclick="document.querySelector('#carGallery .carousel-item.active').classList.remove('active');document.querySelectorAll('#carGallery .carousel-item')[<?= $idx ?>].classList.add('active');">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <h2 class="mb-3"><?= esc($car['make']) ?> <?= esc($car['model']) ?> (<?= esc($car['year']) ?>)</h2>
                <h4 class="mb-3 text-primary">$<?= number_format($car['price']) ?></h4>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Engine:</strong> <?= esc($car['engine']) ?></li>
                    <li class="list-group-item"><strong>Horsepower:</strong> <?= esc($car['horsepower']) ?> hp</li>
                    <li class="list-group-item"><strong>Torque:</strong> <?= esc($car['torque']) ?> Nm</li>
                    <li class="list-group-item"><strong>Top Speed:</strong> <?= esc($car['top_speed']) ?> km/h</li>
                    <li class="list-group-item"><strong>0-100 km/h:</strong> <?= esc($car['acceleration']) ?> s</li>
                    <li class="list-group-item"><strong>Fuel Type:</strong> <?= esc($car['fuel_type']) ?></li>
                    <li class="list-group-item"><strong>Doors:</strong> <?= esc($car['doors']) ?></li>
                    <li class="list-group-item"><strong>Seats:</strong> <?= esc($car['seats']) ?></li>
                </ul>
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                    <i class="fas fa-envelope me-2"></i>Make an Inquiry
                </button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8">
                <h5>Overview</h5>
                <p class="lead"><?= esc($car['description']) ?></p>
                <div>
                    <span class="badge bg-dark me-2">Mileage: <?= number_format($car['mileage']) ?> mi</span>
                    <span class="badge bg-secondary me-2">Body: <?= esc($car['body_type']) ?></span>
                    <span class="badge bg-secondary me-2">Color: <?= esc($car['color']) ?></span>
                    <span class="badge bg-secondary me-2">Transmission: <?= esc($car['transmission']) ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inquiry Modal (same as before, update EmailJS IDs as needed) -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inquiryModalLabel">Make an Inquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-2 fw-bold">Car: <?= esc($car['make']) ?> <?= esc($car['model']) ?> (<?= esc($car['year']) ?>)</div>
        <form id="inquiryForm">
          <div class="mb-3">
            <label for="inq_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="inq_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="inq_phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>
          <div class="mb-3">
            <label for="inq_message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Send</button>
        </form>
        <div id="inquirySuccess" class="alert alert-success mt-3 d-none">Your inquiry has been sent!</div>
        <div id="inquiryError" class="alert alert-danger mt-3 d-none">There was an error sending your inquiry. Please try again.</div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
<script>
(function(){
  emailjs.init('CpKQhsOMcXhaH8yX2');
})();

document.getElementById('inquiryForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const form = this;
  const carName = "<?= esc($car['make']) ?> <?= esc($car['model']) ?> (<?= esc($car['year']) ?>)";
  const data = {
    name: form.name.value,
    email: form.email.value,
    phone: form.phone.value,
    message: form.message.value,
    car: carName
  };
  emailjs.send('service_qspbvdm', 'template_a5ts1p4', data)
    .then(function(response) {
      document.getElementById('inquirySuccess').classList.remove('d-none');
      document.getElementById('inquiryError').classList.add('d-none');
      form.reset();
    }, function(error) {
      document.getElementById('inquirySuccess').classList.add('d-none');
      document.getElementById('inquiryError').classList.remove('d-none');
    });
});
</script>

<?= view('templates/footer') ?> 