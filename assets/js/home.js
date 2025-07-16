/* Home Page JavaScript */

(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // Animate statistics counters
        const animateCounters = () => {
            const counters = document.querySelectorAll('.stat-number');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.textContent);
                        const increment = target / 100;
                        let current = 0;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            counter.textContent = Math.floor(current);
                        }, 20);
                        
                        observer.unobserve(counter);
                    }
                });
            });
            
            counters.forEach(counter => observer.observe(counter));
        };
        
        // Smooth scroll to sections
        const initSmoothScroll = () => {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const headerHeight = 80;
                        const targetPosition = target.offsetTop - headerHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        };
        
        // Parallax effect for hero section
        const initParallax = () => {
            const hero = document.querySelector('.hero-section');
            if (hero) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const parallax = scrolled * 0.5;
                    hero.style.transform = `translateY(${parallax}px)`;
                });
            }
        };
        
        // Service card animations
        const initServiceAnimations = () => {
            const serviceCards = document.querySelectorAll('.service-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            serviceCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        };
        
        // Testimonial slider
        const initTestimonialSlider = () => {
            const testimonialCards = document.querySelectorAll('.testimonial-card');
            let currentIndex = 0;
            
            if (testimonialCards.length > 1) {
                setInterval(() => {
                    testimonialCards[currentIndex].style.opacity = '0.5';
                    currentIndex = (currentIndex + 1) % testimonialCards.length;
                    testimonialCards[currentIndex].style.opacity = '1';
                }, 5000);
            }
        };
        
        // Initialize all functionality
        animateCounters();
        initSmoothScroll();
        initParallax();
        initServiceAnimations();
        initTestimonialSlider();
        
    });
    
})();