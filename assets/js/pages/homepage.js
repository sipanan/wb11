/**
 * Homepage JavaScript
 * Enhanced functionality for the homepage
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Smooth Scrolling =====
        const initSmoothScroll = () => {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const headerHeight = document.querySelector('header')?.offsetHeight || 80;
                        const targetPosition = target.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        };
        
        // ===== Scroll Animations =====
        const initScrollAnimations = () => {
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });
            
            animateElements.forEach(el => {
                observer.observe(el);
            });
        };
        
        // ===== Hero Button Animations =====
        const initHeroAnimations = () => {
            const heroButtons = document.querySelectorAll('.hero-btn');
            
            heroButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        };
        
        // ===== Service Cards Enhancement =====
        const initServiceCards = () => {
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                // Add hover effects
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
                
                // Track card interactions
                const serviceLink = card.querySelector('.service-link');
                if (serviceLink) {
                    serviceLink.addEventListener('click', function() {
                        const serviceTitle = card.querySelector('.service-title')?.textContent;
                        
                        // Track with Google Analytics if available
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'service_click', {
                                'service_name': serviceTitle,
                                'event_category': 'engagement',
                                'event_label': 'homepage_services'
                            });
                        }
                    });
                }
            });
        };
        
        // ===== Testimonials Slider =====
        const initTestimonialsSlider = () => {
            const testimonialCards = document.querySelectorAll('.testimonial-card');
            let currentTestimonial = 0;
            
            // Auto-rotate testimonials
            const rotateTestimonials = () => {
                testimonialCards.forEach((card, index) => {
                    card.style.opacity = index === currentTestimonial ? '1' : '0.5';
                    card.style.transform = index === currentTestimonial ? 'scale(1)' : 'scale(0.95)';
                });
                
                currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
            };
            
            if (testimonialCards.length > 0) {
                setInterval(rotateTestimonials, 5000);
                rotateTestimonials(); // Initial call
            }
        };
        
        // ===== Feature Cards Animation =====
        const initFeatureCards = () => {
            const featureCards = document.querySelectorAll('.feature-card');
            
            featureCards.forEach((card, index) => {
                // Stagger animation
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
                
                // Add hover effects
                card.addEventListener('mouseenter', function() {
                    this.querySelector('.feature-icon').style.transform = 'scale(1.1)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.querySelector('.feature-icon').style.transform = 'scale(1)';
                });
            });
        };
        
        // ===== CTA Buttons Enhancement =====
        const initCTAButtons = () => {
            const ctaButtons = document.querySelectorAll('.hero-btn, .btn');
            
            ctaButtons.forEach(btn => {
                // Add ripple effect
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('div');
                    ripple.className = 'ripple';
                    
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        };
        
        // ===== Phone Number Tracking =====
        const initPhoneTracking = () => {
            const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
            
            phoneLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const phoneNumber = this.getAttribute('href').replace('tel:', '');
                    
                    // Track with Google Analytics if available
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'phone_click', {
                            'phone_number': phoneNumber,
                            'event_category': 'contact',
                            'event_label': 'homepage_phone'
                        });
                    }
                });
            });
        };
        
        // ===== WhatsApp Integration =====
        const initWhatsApp = () => {
            const whatsappLinks = document.querySelectorAll('a[href*="wa.me"]');
            
            whatsappLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Track with Google Analytics if available
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'whatsapp_click', {
                            'event_category': 'contact',
                            'event_label': 'homepage_whatsapp'
                        });
                    }
                });
            });
        };
        
        // ===== Lazy Loading Images =====
        const initLazyLoading = () => {
            const images = document.querySelectorAll('img[data-src]');
            
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.add('loaded');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                images.forEach(img => imageObserver.observe(img));
            } else {
                // Fallback for older browsers
                images.forEach(img => {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                });
            }
        };
        
        // ===== Hero Background Animation =====
        const initHeroBackground = () => {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) return;
            
            let mouseX = 0;
            let mouseY = 0;
            
            heroSection.addEventListener('mousemove', (e) => {
                mouseX = e.clientX / window.innerWidth;
                mouseY = e.clientY / window.innerHeight;
                
                const moveX = (mouseX - 0.5) * 20;
                const moveY = (mouseY - 0.5) * 20;
                
                heroSection.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
            
            heroSection.addEventListener('mouseleave', () => {
                heroSection.style.transform = 'translate(0, 0)';
            });
        };
        
        // ===== Testimonial Auto-update =====
        const initTestimonialUpdates = () => {
            const testimonialSection = document.querySelector('.testimonials-section');
            if (!testimonialSection) return;
            
            // Add dynamic testimonials if needed
            const testimonials = [
                {
                    text: "Safe Cologne hat unser Firmenevent perfekt abgesichert. Professionell und diskret.",
                    author: "Michael S.",
                    position: "Event Manager"
                },
                {
                    text: "Zuverlässiger Service rund um die Uhr. Wir vertrauen Safe Cologne seit Jahren.",
                    author: "Anna K.",
                    position: "Geschäftsführerin"
                },
                {
                    text: "Hervorragende Objektsicherung. Das Team ist immer pünktlich und kompetent.",
                    author: "Thomas R.",
                    position: "Facility Manager"
                }
            ];
            
            // This could be expanded to dynamically load testimonials
        };
        
        // ===== Contact Form Enhancement =====
        const initContactForm = () => {
            const contactForms = document.querySelectorAll('form');
            
            contactForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = this.querySelector('input[type="submit"], button[type="submit"]');
                    
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Wird gesendet...';
                        
                        // Re-enable after 5 seconds to prevent indefinite disable
                        setTimeout(() => {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Absenden';
                        }, 5000);
                    }
                });
            });
        };
        
        // ===== Performance Monitoring =====
        const initPerformanceMonitoring = () => {
            // Monitor page load performance
            window.addEventListener('load', () => {
                if ('performance' in window) {
                    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                    
                    // Track with Google Analytics if available
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'page_load_time', {
                            'event_category': 'performance',
                            'event_label': 'homepage',
                            'value': Math.round(loadTime)
                        });
                    }
                }
            });
        };
        
        // ===== Add Ripple Effect CSS =====
        const addRippleCSS = () => {
            const style = document.createElement('style');
            style.textContent = `
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    pointer-events: none;
                    transform: scale(0);
                    animation: ripple-animation 0.6s ease-out;
                }
                
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
                
                .hero-btn,
                .btn {
                    position: relative;
                    overflow: hidden;
                }
                
                .feature-card {
                    opacity: 0;
                    transform: translateY(30px);
                    transition: all 0.6s ease-out;
                }
                
                .feature-icon {
                    transition: transform 0.3s ease;
                }
                
                img.loaded {
                    opacity: 1;
                    transition: opacity 0.3s ease;
                }
                
                img[data-src] {
                    opacity: 0;
                }
            `;
            document.head.appendChild(style);
        };
        
        // ===== Initialize Everything =====
        const init = () => {
            addRippleCSS();
            initSmoothScroll();
            initScrollAnimations();
            initHeroAnimations();
            initServiceCards();
            initTestimonialsSlider();
            initFeatureCards();
            initCTAButtons();
            initPhoneTracking();
            initWhatsApp();
            initLazyLoading();
            initHeroBackground();
            initTestimonialUpdates();
            initContactForm();
            initPerformanceMonitoring();
        };
        
        // Start initialization
        init();
        
        // Reinitialize on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Reinitialize responsive elements
                initScrollAnimations();
                initLazyLoading();
            }, 250);
        });
    });
})();