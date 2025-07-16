/**
 * Home Page JavaScript
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Initialize home page functionality
        initHeroAnimations();
        initFeaturesSection();
        initServicesPreview();
        initScrollAnimations();
        
        /**
         * Initialize hero section animations
         */
        function initHeroAnimations() {
            const hero = $('.hero');
            if (hero.length) {
                // Animate hero content on load
                hero.find('.hero-content').addClass('animated');
                
                // Parallax effect on scroll
                $(window).on('scroll', function() {
                    const scrolled = $(window).scrollTop();
                    const parallax = scrolled * 0.5;
                    hero.find('.hero-content').css('transform', 'translateY(' + parallax + 'px)');
                });
            }
        }
        
        /**
         * Initialize features section
         */
        function initFeaturesSection() {
            const featureCards = $('.feature-card');
            
            // Add hover effects
            featureCards.hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
            
            // Animate on scroll
            $(window).on('scroll', function() {
                featureCards.each(function() {
                    const card = $(this);
                    const cardTop = card.offset().top;
                    const cardBottom = cardTop + card.outerHeight();
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (cardBottom > windowTop && cardTop < windowBottom) {
                        card.addClass('in-view');
                    }
                });
            });
        }
        
        /**
         * Initialize services preview section
         */
        function initServicesPreview() {
            const serviceCards = $('.service-card');
            
            // Add click tracking
            serviceCards.on('click', '.service-link', function(e) {
                const serviceName = $(this).closest('.service-card').find('h3').text();
                
                // Track service click (if analytics is available)
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'service_click', {
                        'service_name': serviceName,
                        'page_location': window.location.href
                    });
                }
            });
            
            // Stagger animation on scroll
            $(window).on('scroll', function() {
                serviceCards.each(function(index) {
                    const card = $(this);
                    const cardTop = card.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (cardTop < windowBottom - 100) {
                        setTimeout(function() {
                            card.addClass('animate-in');
                        }, index * 200);
                    }
                });
            });
        }
        
        /**
         * Initialize scroll animations
         */
        function initScrollAnimations() {
            const animatedElements = $('.about-content, .contact-cta');
            
            $(window).on('scroll', function() {
                animatedElements.each(function() {
                    const element = $(this);
                    const elementTop = element.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (elementTop < windowBottom - 100) {
                        element.addClass('animate-in');
                    }
                });
            });
        }
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
        
        // CTA button interactions
        $('.cta-button').on('click', function(e) {
            const button = $(this);
            const buttonText = button.text();
            
            // Track CTA clicks
            if (typeof gtag !== 'undefined') {
                gtag('event', 'cta_click', {
                    'button_text': buttonText,
                    'page_location': window.location.href
                });
            }
            
            // Add ripple effect
            button.addClass('clicked');
            setTimeout(function() {
                button.removeClass('clicked');
            }, 300);
        });
        
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // Initialize on window load
        $(window).on('load', function() {
            // Remove loading states
            $('.loading').removeClass('loading');
            
            // Trigger initial scroll animations
            $(window).trigger('scroll');
        });
    });
    
})(jQuery);