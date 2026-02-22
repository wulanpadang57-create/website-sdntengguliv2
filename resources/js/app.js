import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Animated Counter Component
Alpine.directive('counter', (el, { expression }, { evaluate }) => {
    const target = parseInt(expression);
    let current = 0;
    const increment = target / 100;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            el.textContent = target;
            clearInterval(timer);
        } else {
            el.textContent = Math.floor(current);
        }
    }, 20);
});

// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 120
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slide-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Add animation trigger to elements with data-animate attribute
    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });

    // Form Validation with Feedback
    const forms = document.querySelectorAll('form[data-validate]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const inputs = this.querySelectorAll('input[required], textarea[required], select[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-red-500', 'focus:ring-red-500');
                    input.classList.remove('border-gray-300');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500', 'focus:ring-red-500');
                    input.classList.add('border-gray-300');
                }
            });

            if (isValid) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Form berhasil dikirim',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(() => this.submit(), 2000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Mohon lengkapi semua field yang dibutuhkan'
                });
            }
        });
    });

    // Smooth Scroll Navigation
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Lazy Load Images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Animate Counter on Scroll (for statistics)
    const counters = document.querySelectorAll('[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.count);
                let current = 0;
                const increment = target / 50;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + '+';
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + '+';
                    }
                }, 30);
                
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });

    // Interactive Accordion
    const accordionButtons = document.querySelectorAll('[data-accordion-toggle]');
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-accordion-toggle');
            const content = document.getElementById(targetId);
            
            // Close other accordions
            document.querySelectorAll('[data-accordion-content]').forEach(item => {
                if (item.id !== targetId) {
                    item.classList.add('hidden');
                    item.previousElementSibling?.classList.remove('text-red-600');
                }
            });

            // Toggle current
            content?.classList.toggle('hidden');
            this.classList.toggle('text-red-600');
        });
    });

    // Search Functionality
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const query = this.value.trim();
                if (query.length > 0) {
                    // Trigger search
                    const event = new CustomEvent('search', { detail: { query } });
                    document.dispatchEvent(event);
                }
            }, 300);
        });
    }

    // Smooth page transitions
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a:not([target="_blank"]):not([href^="#"]):not([href^="javascript:"])');
        if (link && link.hostname === window.location.hostname) {
            // Fade out effect
            document.body.style.opacity = '0.8';
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 300);
        }
    });

    // Read Progress Indicator
    const progressBar = document.getElementById('progress-bar');
    if (progressBar) {
        window.addEventListener('scroll', () => {
            const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrolled = (window.scrollY / scrollHeight) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }
});

Alpine.start();