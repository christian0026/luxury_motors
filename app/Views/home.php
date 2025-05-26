<!-- Hero Section -->
<section class="hero-section position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/backgrounds/hero1.jpg" class="d-block w-100" alt="Luxury Car">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 fw-bold">EXCEPTIONAL CARS FOR EXCEPTIONAL PEOPLE</h1>
                    <p class="lead">Discover the world's finest luxury, super, and sports cars</p>
                    <a href="/cars" class="btn btn-primary btn-lg mt-3">View Inventory</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/assets/images/backgrounds/hero2.jpg" class="d-block w-100" alt="Luxury Car">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-3 fw-bold">UNMATCHED COLLECTION</h1>
                    <p class="lead">Curated selection of the world's most desirable automobiles</p>
                    <a href="/cars" class="btn btn-primary btn-lg mt-3">Browse Collection</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Featured Cars Section -->
<section class="py-5 style="background-color: #393E46;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">FEATURED VEHICLES</h2>
            <p class="section-subtitle">A selection of our finest automobiles</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($featuredCars as $car): ?>
            <div class="col-md-4">
                <div class="card car-card h-100">
                    <div class="badge bg-primary position-absolute top-0 end-0 m-2">Featured</div>
                    <img src="/assets/images/cars/<?= $car['image'] ?>" class="card-img-top" alt="<?= $car['model'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $car['model'] ?></h5>
                        <div class="car-specs mb-3">
                            <span class="me-3"><i class="fas fa-calendar-alt me-1"></i> <?= $car['year'] ?></span>
                            <span><i class="fas fa-tachometer-alt me-1"></i> <?= number_format($car['miles']) ?> mi</span>
                        </div>
                        <h4 class="text-primary mb-3"><?= $car['price'] ?></h4>
                        <a href="/cars/<?= $car['id'] ?>" class="btn btn-outline-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/cars" class="btn btn-primary btn-lg">View All Inventory</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">WHY CHOOSE LUXURY MOTORS</h2>
            <p class="section-subtitle">Our commitment to excellence</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-shield-alt fa-3x"></i>
                </div>
                <h4>Certified Quality</h4>
                <p>Every vehicle undergoes a rigorous 200-point inspection process to ensure the highest standards.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-globe-americas fa-3x"></i>
                </div>
                <h4>Global Network</h4>
                <p>Access to exclusive vehicles worldwide through our extensive network of partners.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-user-tie fa-3x"></i>
                </div>
                <h4>White Glove Service</h4>
                <p>Personalized concierge service from initial contact to final delivery.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bstyle="background-color: #393E46;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">CLIENT TESTIMONIALS</h2>
            <p class="section-subtitle">What our clients say about us</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-item text-center p-4">
                                <img src="/assets/images/testimonials/1.jfif" class="rounded-circle mb-3" width="80" alt="Client">
                                <p class="mb-4">"Luxury Motors exceeded all my expectations. Their attention to detail and professionalism made the entire process seamless."</p>
                                <h5>James Wilson</h5>
                                <p class="text-muted">CEO, Tech Innovations</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-item text-center p-4">
                                <img src="/assets/images/testimonials/2.jfif" class="rounded-circle mb-3" width="80" alt="Client">
                                <p class="mb-4">"I've purchased several cars through Luxury Motors and each experience has been exceptional. They truly understand luxury."</p>
                                <h5>Sarah Johnson</h5>
                                <p class="text-muted">Entrepreneur</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-dark text-center" style="background-color: #c9a227;">
    <div class="container">
        <h2 class="display-5 mb-4">READY TO FIND YOUR DREAM CAR?</h2>
        <p class="lead mb-4">Contact our team of specialists today</p>
        <a href="/contact" class="btn btn-light btn-lg">Get in Touch</a>
    </div>
</section>