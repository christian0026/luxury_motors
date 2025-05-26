document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Back to top button
    const backToTopButton = document.createElement('a');
    backToTopButton.href = '#';
    backToTopButton.className = 'back-to-top';
    backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
    document.body.appendChild(backToTopButton);
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopButton.classList.add('active');
        } else {
            backToTopButton.classList.remove('active');
        }
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Initialize carousels
    const heroCarouselEl = document.getElementById('heroCarousel');
    if (heroCarouselEl) {
        new bootstrap.Carousel(heroCarouselEl, {
            interval: 5000,
            pause: false
        });
    }
    
    const testimonialCarouselEl = document.getElementById('testimonialCarousel');
    if (testimonialCarouselEl) {
        new bootstrap.Carousel(testimonialCarouselEl, {
            interval: 8000
        });
    }
    
    // Add fade-in animation to sections as they come into view
    const animateOnScroll = function() {
        const sections = document.querySelectorAll('section');
        
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (sectionTop < windowHeight - 100) {
                section.classList.add('fade-in');
            }
        });
    };
    
    // Run once on page load
    animateOnScroll();
    
    // Run on scroll
    window.addEventListener('scroll', animateOnScroll);

    // EmailJS integration for contact form
    if (typeof emailjs !== 'undefined') {
        emailjs.init('CpKQhsOMcXhaH8yX2'); 
    }
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formMessage = document.getElementById('formMessage');
            formMessage.innerHTML = '';
            formMessage.className = '';
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;
            // Show loading
            formMessage.innerHTML = '<span class="text-info">Sending...</span>';
            emailjs.send('service_qspbvdm', 'template_a5ts1p4', {
                from_name: name,
                from_email: email,
                from_phone: phone,
                message: message
            })
            .then(function(response) {
                formMessage.innerHTML = '<span class="text-success">Thank you! Your message has been sent.</span>';
                contactForm.reset();
            }, function(error) {
                console.log('EmailJS error:', error);
                formMessage.innerHTML = '<span class="text-danger">Sorry, there was an error sending your message. Please try again later.</span>';
            });
        });
    }
});

// Inventory Filter Form Submission
document.getElementById('inventoryFilter')?.addEventListener('submit', function(e) {
    // Reset pagination to page 1 when filters change
    if (this.page) {
        this.page.value = 1;
    }
});

// Price Range Slider (if you want to implement sliders instead of dropdowns)
function initPriceSlider() {
    const priceSlider = document.getElementById('priceSlider');
    if (!priceSlider) return;
    
    noUiSlider.create(priceSlider, {
        start: [minPrice, maxPrice],
        connect: true,
        range: {
            'min': minPrice,
            'max': maxPrice
        },
        format: {
            to: function(value) {
                return '$' + Math.round(value).toLocaleString();
            },
            from: function(value) {
                return Number(value.replace(/\D/g, ''));
            }
        }
    });
    
    priceSlider.noUiSlider.on('update', function(values, handle) {
        const value = values[handle];
        if (handle) {
            document.getElementById('max_price').value = value.replace(/\D/g, '');
        } else {
            document.getElementById('min_price').value = value.replace(/\D/g, '');
        }
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initPriceSlider();
});