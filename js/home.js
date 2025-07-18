/**
 * Home Page JavaScript - SafeCologne
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Animated counters for statistics
        function animateCounters() {
            $('.stat-item strong').each(function() {
                const $this = $(this);
                const text = $this.text();
                const number = parseInt(text.replace(/\D/g, ''));
                
                if (number && !$this.data('animated')) {
                    $this.data('animated', true);
                    
                    $({ count: 0 }).animate({ count: number }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            const suffix = text.includes('+') ? '+' : '';
                            $this.text(Math.floor(this.count) + suffix);
                        },
                        complete: function() {
                            $this.text(text);
                        }
                    });
                }
            });
        }
        
        // Intersection Observer for animations
        if (window.IntersectionObserver) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        
                        // Animate counters when stats section comes into view
                        if (target.classList.contains('company-stats')) {
                            setTimeout(animateCounters, 300);
                        }
                        
                        // Add animation classes
                        target.classList.add('animate-in');
                        observer.unobserve(target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe elements for animation
            document.querySelectorAll('.feature-card, .why-card, .company-stats, .benefit-card').forEach(function(el) {
                observer.observe(el);
            });
        }
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000, 'easeInOutCubic');
            }
        });
        
        // Parallax effect for hero section
        if (window.innerWidth > 768) {
            $(window).scroll(function() {
                const scrolled = $(window).scrollTop();
                const parallaxSpeed = 0.5;
                
                $('.hero-section').css('transform', 'translateY(' + (scrolled * parallaxSpeed) + 'px)');
            });
        }
        
        // Enhanced CTA button interactions
        $('.btn').on('mouseenter', function() {
            $(this).addClass('btn-hover');
        }).on('mouseleave', function() {
            $(this).removeClass('btn-hover');
        });
        
        // WhatsApp button functionality
        $('.btn-whatsapp').on('click', function(e) {
            const message = encodeURIComponent('Hallo! Ich interessiere mich für Ihre Sicherheitsdienste und hätte gerne weitere Informationen.');
            const whatsappUrl = `https://wa.me/491701234567?text=${message}`;
            window.open(whatsappUrl, '_blank');
        });
        
        // Phone number formatting and click tracking
        $('a[href^="tel:"]').on('click', function() {
            // Analytics tracking if available
            if (typeof gtag !== 'undefined') {
                gtag('event', 'phone_call', {
                    event_category: 'contact',
                    event_label: 'header_phone'
                });
            }
        });
        
        // Feature cards hover effect enhancement
        $('.feature-card').on('mouseenter', function() {
            $(this).siblings().addClass('feature-dimmed');
        }).on('mouseleave', function() {
            $('.feature-card').removeClass('feature-dimmed');
        });
        
        // Career section scroll trigger
        const careerSection = document.getElementById('karriere');
        if (careerSection && window.IntersectionObserver) {
            const careerObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $('.benefit-card').each(function(index) {
                            const $this = $(this);
                            setTimeout(function() {
                                $this.addClass('benefit-visible');
                            }, index * 150);
                        });
                        careerObserver.unobserve(careerSection);
                    }
                });
            }, { threshold: 0.2 });
            
            careerObserver.observe(careerSection);
        }
        
        // Initialize tooltips if available
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
        
        // Lazy load images enhancement
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    });
    
    // Custom easing function
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };
    
})(jQuery);