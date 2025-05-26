<!-- Hero Section -->
<section class="bg-dark text-white py-5" style="background: url('/assets/images/backgrounds/contact-hero.jpg') center/cover no-repeat; min-height: 350px;">
    <div class="container text-center py-5">
        <h1 class="display-3 fw-bold" style="text-shadow: 2px 2px 8px #000;">Contact Us</h1>
        <p class="lead mt-3">Get in touch with Luxury Motors</p>
    </div>
</section>

<!-- Contact Form & Info Section -->
<section class="py-5" style="background-color: #393E46;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <h2 class="fw-bold mb-4 text-dark">Send Us a Message</h2>
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div id="formMessage" class="mb-3"></div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                        <!--
                        EmailJS Setup:
                        1. Sign up at https://www.emailjs.com/
                        2. Create a service (e.g., Gmail)
                        3. Create a template with variables: from_name, from_email, from_phone, message
                        4. Get your Service ID, Template ID, and Public Key
                        5. Add them to the JS below
                        -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    <h3 class="fw-bold text-white mb-3">Our Showroom</h3>
                    <p class="text-white mb-2"><i class="fas fa-map-marker-alt text-warning me-2"></i>Biga 1, Silang, Cavite, Philippines</p>
                    <p class="text-white mb-2"><i class="fas fa-phone text-warning me-2"></i>(+63) 123-4567</p>
                    <p class="text-white mb-4"><i class="fas fa-envelope text-warning me-2"></i>luxurymotorssilang2025@gmail.com</p>
                    <div class="ratio ratio-16x9 rounded shadow">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.206624910052!2d120.9764342760355!3d14.24116558577364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7e7d0744eafd%3A0xf25bff0f1b1deb7b!2sCavite%20State%20University%2C%20Silang%20Campus!5e0!3m2!1sen!2sph!4v1748272234495!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-dark text-center" style="background-color: #c9a227;">
    <div class="container">
        <h2 class="display-5 mb-4">READY TO DRIVE YOUR DREAM CAR?</h2>
        <p class="lead mb-4">Contact our team of specialists today</p>
        <a href="tel:+631234567" class="btn btn-light btn-lg">Call Us Now</a>
    </div>
</section>
