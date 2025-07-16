/**
 * Home Page Specific JavaScript
 * Safe Cologne Theme - Home Page
 */

(function($) {
    'use strict';

    // Home page functionality
    const SafeCologneHome = {
        init() {
            this.bindEvents();
            this.initHeroAnimation();
            this.initCounterAnimation();
            this.initFeaturesAnimation();
            this.initScrollEffects();
        },

        bindEvents() {
            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', this.smoothScroll);
            
            // CTA button interactions
            $('.hero-cta, .cta-button').on('click', this.handleCTAClick);
            
            // Service card hover effects
            $('.service-card').on('mouseenter', this.handleServiceHover);
            $('.service-card').on('mouseleave', this.handleServiceLeave);
            
            // Feature card interactions
            $('.feature-card').on('click', this.handleFeatureClick);
        },

        smoothScroll(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        },

        handleCTAClick(e) {
            // Add click animation
            const $button = $(this);
            $button.addClass('clicked');
            
            setTimeout(() => {
                $button.removeClass('clicked');
            }, 300);
            
            // Track analytics if available
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'CTA',
                    event_label: $button.text().trim()
                });
            }
        },

        handleServiceHover() {
            $(this).find('.service-content').addClass('hovered');
        },

        handleServiceLeave() {
            $(this).find('.service-content').removeClass('hovered');
        },

        handleFeatureClick() {
            const $card = $(this);
            const title = $card.find('h3').text();
            
            // Show feature modal if implemented
            if (typeof SafeCologneModals !== 'undefined') {
                SafeCologneModals.showFeatureModal(title);
            }
        },

        initHeroAnimation() {
            const $hero = $('.hero-section');
            if ($hero.length) {
                // Animate hero content on load
                setTimeout(() => {
                    $hero.find('.hero-title').addClass('animate-in');
                }, 300);
                
                setTimeout(() => {
                    $hero.find('.hero-subtitle').addClass('animate-in');
                }, 600);
                
                setTimeout(() => {
                    $hero.find('.hero-cta').addClass('animate-in');
                }, 900);
            }
        },

        initCounterAnimation() {
            const $counters = $('.stat-number');
            
            if ($counters.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $counters.each(function() {
                    observer.observe(this);
                });
            }
        },

        animateCounter(element) {
            const $element = $(element);
            const target = parseInt($element.data('target') || $element.text());
            const duration = 2000;
            let start = 0;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    start = target;
                    clearInterval(timer);
                }
                $element.text(Math.floor(start));
            }, 16);
        },

        initFeaturesAnimation() {
            const $features = $('.feature-card');
            
            if ($features.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add('animate-in');
                            }, index * 100);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $features.each(function() {
                    observer.observe(this);
                });
            }
        },

        initScrollEffects() {
            let ticking = false;
            
            const updateScrollEffects = () => {
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                
                // Hero parallax effect
                const $hero = $('.hero-section');
                if ($hero.length) {
                    const heroOffset = $hero.offset().top;
                    const heroHeight = $hero.height();
                    
                    if (scrollTop < heroHeight) {
                        const parallaxSpeed = 0.5;
                        $hero.css('transform', `translateY(${scrollTop * parallaxSpeed}px)`);
                    }
                }
                
                // Section animations
                $('.section').each(function() {
                    const $section = $(this);
                    const sectionTop = $section.offset().top;
                    const sectionHeight = $section.height();
                    
                    if (scrollTop + windowHeight > sectionTop + 100) {
                        $section.addClass('in-view');
                    }
                });
                
                ticking = false;
            };
            
            $(window).on('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateScrollEffects);
                    ticking = true;
                }
            });
        },

        // Service cards interaction
        initServiceCards() {
            $('.service-card').each(function(index) {
                const $card = $(this);
                
                // Stagger animation
                setTimeout(() => {
                    $card.addClass('animate-in');
                }, index * 200);
                
                // Add hover effects
                $card.on('mouseenter', function() {
                    $(this).find('.service-image').addClass('hovered');
                });
                
                $card.on('mouseleave', function() {
                    $(this).find('.service-image').removeClass('hovered');
                });
            });
        },

        // Utility functions
        utils: {
            debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            },

            throttle(func, limit) {
                let inThrottle;
                return function() {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                };
            }
        }
    };

    // Initialize when DOM is ready
    $(document).ready(() => {
        SafeCologneHome.init();
    });

    // Add CSS for animations
    const animationStyles = `
        <style>
        .hero-title, .hero-subtitle, .hero-cta {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .hero-title.animate-in,
        .hero-subtitle.animate-in,
        .hero-cta.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .feature-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .feature-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .section {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }
        
        .section.in-view {
            opacity: 1;
            transform: translateY(0);
        }
        
        .service-image.hovered {
            transform: scale(1.1);
        }
        
        .service-content.hovered {
            background: var(--bg-light);
        }
        
        .clicked {
            transform: scale(0.95);
        }
        </style>
    `;
    
    $('head').append(animationStyles);

    // Export for global access
    window.SafeCologneHome = SafeCologneHome;

})(jQuery);