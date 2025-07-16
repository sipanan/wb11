/**
 * Safe Cologne Main JavaScript
 * Global functionality for Safe Cologne Security Services
 * @package Safe_Cologne
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initNavigation();
        initScrollEffects();
        initAnimations();
        initAccessibility();
        initPerformanceOptimizations();
        initGlobalEventHandlers();
    });

    /**
     * Initialize navigation functionality
     */
    function initNavigation() {
        const $navbar = $('.navbar');
        const $mobileToggle = $('.mobile-toggle');
        const $navMenu = $('.nav-menu, #primary-menu');
        
        // Mobile menu toggle
        $mobileToggle.on('click', function() {
            $(this).toggleClass('active');
            $navMenu.toggleClass('active');
            $('body').toggleClass('menu-open');
            
            // Update ARIA attributes
            const expanded = $(this).hasClass('active');
            $(this).attr('aria-expanded', expanded);
            $navMenu.attr('aria-hidden', !expanded);
        });
        
        // Close mobile menu on link click
        $navMenu.find('a').on('click', function() {
            $mobileToggle.removeClass('active');
            $navMenu.removeClass('active');
            $('body').removeClass('menu-open');
            
            // Update ARIA attributes
            $mobileToggle.attr('aria-expanded', false);
            $navMenu.attr('aria-hidden', true);
        });
        
        // Close mobile menu on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $navMenu.hasClass('active')) {
                $mobileToggle.trigger('click');
            }
        });
        
        // Navbar scroll effect
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 50) {
                $navbar.addClass('scrolled');
            } else {
                $navbar.removeClass('scrolled');
            }
        });
    }

    /**
     * Initialize scroll effects
     */
    function initScrollEffects() {
        // Back to top button
        const $backToTop = $('<button>')
            .addClass('back-to-top')
            .html('<i class="fas fa-arrow-up"></i>')
            .attr('aria-label', 'Zurück nach oben')
            .appendTo('body');
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.addClass('visible');
            } else {
                $backToTop.removeClass('visible');
            }
        });
        
        $backToTop.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });
    }

    /**
     * Initialize animations
     */
    function initAnimations() {
        // Intersection Observer for scroll animations
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);
            
            // Observe elements with animation classes
            document.querySelectorAll('.feature-card, .service-card, .team-member, .value-card').forEach(el => {
                observer.observe(el);
            });
        }
        
        // Fallback for browsers without Intersection Observer
        else {
            $(window).on('scroll', function() {
                $('.feature-card, .service-card, .team-member, .value-card').each(function() {
                    const elementTop = $(this).offset().top;
                    const elementBottom = elementTop + $(this).outerHeight();
                    const viewportTop = $(window).scrollTop();
                    const viewportBottom = viewportTop + $(window).height();
                    
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate-in');
                    }
                });
            });
        }
    }

    /**
     * Initialize accessibility features
     */
    function initAccessibility() {
        // Skip to main content
        const $skipLink = $('<a>')
            .addClass('skip-link')
            .attr('href', '#main-content')
            .text('Zum Hauptinhalt springen')
            .prependTo('body');
        
        // Focus management for mobile menu
        const $mobileToggle = $('.mobile-toggle');
        const $navMenu = $('.nav-menu, #primary-menu');
        
        $mobileToggle.on('click', function() {
            if ($navMenu.hasClass('active')) {
                // Focus first menu item when menu opens
                setTimeout(() => {
                    $navMenu.find('a').first().focus();
                }, 100);
            }
        });
        
        // Trap focus in mobile menu
        $navMenu.on('keydown', function(e) {
            if (e.key === 'Tab' && $(this).hasClass('active')) {
                const focusableElements = $(this).find('a, button').filter(':visible');
                const firstElement = focusableElements.first();
                const lastElement = focusableElements.last();
                
                if (e.shiftKey) {
                    if (document.activeElement === firstElement[0]) {
                        e.preventDefault();
                        lastElement.focus();
                    }
                } else {
                    if (document.activeElement === lastElement[0]) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            }
        });
        
        // Announce dynamic content changes
        const $announcer = $('<div>')
            .attr('aria-live', 'polite')
            .attr('aria-atomic', 'true')
            .addClass('sr-only')
            .appendTo('body');
        
        window.announceToScreenReader = function(message) {
            $announcer.text(message);
        };
    }

    /**
     * Initialize performance optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // Debounce scroll events
        let scrollTimeout;
        const originalScrollHandlers = [];
        
        $(window).on('scroll.debounced', function() {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                originalScrollHandlers.forEach(handler => handler());
            }, 16); // ~60fps
        });
        
        // Preload critical resources
        const preloadLink = document.createElement('link');
        preloadLink.rel = 'preload';
        preloadLink.as = 'style';
        preloadLink.href = safeCologne.themeUrl + '/assets/css/main.css';
        document.head.appendChild(preloadLink);
    }

    /**
     * Initialize global event handlers
     */
    function initGlobalEventHandlers() {
        // Form submission tracking
        $('form').on('submit', function() {
            const formName = $(this).attr('id') || 'unknown';
            
            // Track form submission
            if (typeof gtag !== 'undefined') {
                gtag('event', 'form_submit', {
                    'form_name': formName,
                    'page_location': window.location.href
                });
            }
        });
        
        // External link tracking
        $('a[href^="http"]').not('[href*="' + window.location.hostname + '"]').on('click', function() {
            const url = $(this).attr('href');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'external_link_click', {
                    'link_url': url,
                    'page_location': window.location.href
                });
            }
        });
        
        // Phone number click tracking
        $('a[href^="tel:"]').on('click', function() {
            const phoneNumber = $(this).attr('href').replace('tel:', '');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'phone_call', {
                    'phone_number': phoneNumber,
                    'page_location': window.location.href
                });
            }
        });
        
        // Email click tracking
        $('a[href^="mailto:"]').on('click', function() {
            const email = $(this).attr('href').replace('mailto:', '');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'email_click', {
                    'email_address': email,
                    'page_location': window.location.href
                });
            }
        });
    }

    // Initialize on window load
    $(window).on('load', function() {
        // Remove loading states
        $('.loading').removeClass('loading');
        
        // Initialize animations after everything is loaded
        setTimeout(() => {
            $(window).trigger('scroll');
        }, 100);
    });

    // Error handling
    window.addEventListener('error', function(e) {
        console.error('JavaScript Error:', e.error);
        
        // Track errors if analytics is available
        if (typeof gtag !== 'undefined') {
            gtag('event', 'javascript_error', {
                'error_message': e.message,
                'error_filename': e.filename,
                'error_lineno': e.lineno,
                'page_location': window.location.href
            });
        }
    });

})(jQuery);
        const $backToTop = $('#backToTop');
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.addClass('show');
            } else {
                $backToTop.removeClass('show');
            }
        });
        
        $backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 600);
            }
        });
    }

    // Contact Form
    function initContactForm() {
        $('.contact-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $submitBtn = $form.find('button[type="submit"]');
            const originalBtnText = $submitBtn.html();
            
            // Remove previous errors
            $form.find('.error').removeClass('error');
            $form.find('.form-error').remove();
            
            // Basic validation
            let isValid = true;
            
            // Required fields
            $form.find('[required]').each(function() {
                if (!$(this).val().trim()) {
                                        isValid = false;
                    $(this).addClass('error');
                    $(this).after('<span class="form-error">' + safeCologne.translations.required + '</span>');
                }
            });
            
            // Email validation
            const $email = $form.find('input[type="email"]');
            if ($email.length && $email.val()) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test($email.val())) {
                    isValid = false;
                    $email.addClass('error');
                    $email.after('<span class="form-error">Bitte geben Sie eine gültige E-Mail-Adresse ein.</span>');
                }
            }
            
            if (!isValid) {
                return false;
            }
            
            // Show loading state
            $submitBtn.prop('disabled', true).addClass('loading');
            $submitBtn.html('<span class="spinner"></span> ' + safeCologne.translations.loading);
            
            // Prepare form data
            const formData = $form.serialize();
            
            // AJAX submission
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'safe_cologne_contact_form',
                    nonce: safeCologne.nonce,
                    ...Object.fromEntries(new FormData(this))
                },
                success: function(response) {
                    const data = JSON.parse(response);
                    
                    if (data.success) {
                        $submitBtn.removeClass('loading').html('<i class="fas fa-check"></i> ' + safeCologne.translations.success);
                        $submitBtn.css('background-color', '#28a745');
                        
                        // Show success message
                        $form.prepend('<div class="alert alert-success">' + data.message + '</div>');
                        
                        // Reset form after 3 seconds
                        setTimeout(function() {
                            $form[0].reset();
                            $submitBtn.html(originalBtnText).prop('disabled', false);
                            $submitBtn.css('background-color', '');
                            $('.alert').fadeOut();
                        }, 3000);
                    } else {
                        $submitBtn.removeClass('loading').html(originalBtnText).prop('disabled', false);
                        $form.prepend('<div class="alert alert-error">' + data.message + '</div>');
                    }
                },
                error: function() {
                    $submitBtn.removeClass('loading').html(originalBtnText).prop('disabled', false);
                    $form.prepend('<div class="alert alert-error">' + safeCologne.translations.error + '</div>');
                }
            });
        });
    }

    // Cookie Banner
    function initCookieBanner() {
        const $cookieBanner = $('#cookieBanner');
        
        // Check if cookies were already accepted
        if (!localStorage.getItem('cookiesAccepted')) {
            setTimeout(function() {
                $cookieBanner.addClass('show');
            }, 2000);
        }
        
        window.acceptAllCookies = function() {
            localStorage.setItem('cookiesAccepted', 'all');
            $cookieBanner.removeClass('show');
            // Initialize analytics
            initializeAnalytics();
        };
        
        window.acceptEssentialCookies = function() {
            localStorage.setItem('cookiesAccepted', 'essential');
            $cookieBanner.removeClass('show');
        };
    }

    // Animations
    function initAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe animatable elements
        $('.feature-card, .service-card, .why-card, .benefit-card, .testimonial-card').each(function() {
            $(this).addClass('animate-on-scroll');
            observer.observe(this);
        });
    }

    // Emergency Button
    function initEmergencyButton() {
        $('.emergency-btn').on('click', function(e) {
            // Optional: Track emergency button clicks
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'Emergency',
                    'event_label': 'Emergency Button Click'
                });
            }
        });
    }

    // Analytics
    function initializeAnalytics() {
        // Google Analytics or other tracking code
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
        }
    }

    // Helper Functions
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Lazy Loading
    function initLazyLoading() {
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // Load More Posts
    $(document).on('click', '.load-more-btn', function(e) {
        e.preventDefault();
        
        const $btn = $(this);
        const page = $btn.data('page');
        const postType = $btn.data('post-type') || 'post';
        
        $btn.addClass('loading').text(safeCologne.translations.loading);
        
        $.ajax({
            url: safeCologne.ajaxUrl,
            type: 'POST',
            data: {
                action: 'safe_cologne_load_more_posts',
                page: page,
                post_type: postType
            },
            success: function(response) {
                const data = JSON.parse(response);
                
                if (data.success) {
                    $('.blog-grid').append(data.content);
                    
                    if (page >= data.max_pages) {
                        $btn.hide();
                    } else {
                        $btn.data('page', page + 1);
                        $btn.removeClass('loading').text('Mehr laden');
                    }
                }
            }
        });
    });

    // Window Load
    $(window).on('load', function() {
        // Remove preloader if exists
        $('.preloader').fadeOut();
        
        // Initialize lazy loading
        initLazyLoading();
    });

})(jQuery);
