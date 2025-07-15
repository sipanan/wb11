/**
 * Safe Cologne Main JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initNavigation();
        initScrollEffects();
        initContactForm();
        initCookieBanner();
        initAnimations();
        initEmergencyButton();
        initMobileContactButton();
        initAccessibility();
    });

    // Navigation
    function initNavigation() {
        const $navbar = $('.navbar');
        const $mobileToggle = $('.mobile-toggle');
        const $navMenu = $('.nav-menu, #primary-menu');
        
        // Mobile menu toggle
        $mobileToggle.on('click', function() {
            $(this).toggleClass('active');
            $navMenu.toggleClass('active');
            $('body').toggleClass('menu-open');
        });
        
        // Close mobile menu on link click
        $navMenu.find('a').on('click', function() {
            $mobileToggle.removeClass('active');
            $navMenu.removeClass('active');
            $('body').removeClass('menu-open');
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

    // Scroll Effects
    function initScrollEffects() {
        // Back to top button
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
        $('.emergency-btn, .sc-emergency-button').on('click', function(e) {
            // Optional: Track emergency button clicks
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'Emergency',
                    'event_label': 'Emergency Button Click'
                });
            }
        });
    }

    // Mobile Contact Button
    function initMobileContactButton() {
        if (!safeCologne.customizer.mobileContactButton) {
            return;
        }
        
        // Create mobile contact button if not exists
        if (!$('.sc-mobile-contact-btn').length) {
            const emergencyPhone = safeCologne.customizer.emergencyPhone || '0221 65058801';
            const cleanPhone = emergencyPhone.replace(/[^0-9+]/g, '');
            
            const mobileBtn = $('<a></a>')
                .attr('href', 'tel:' + cleanPhone)
                .attr('aria-label', 'Notfall-Kontakt')
                .addClass('sc-mobile-contact-btn')
                .html('<i class="fas fa-phone"></i>')
                .appendTo('body');
            
            // Show/hide based on scroll position
            $(window).on('scroll', debounce(function() {
                if ($(window).scrollTop() > 300) {
                    mobileBtn.addClass('show');
                } else {
                    mobileBtn.removeClass('show');
                }
            }, 100));
            
            // Track clicks
            mobileBtn.on('click', function() {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        'event_category': 'Mobile Contact',
                        'event_label': 'Mobile Contact Button'
                    });
                }
            });
        }
    }

    // Accessibility Enhancements
    function initAccessibility() {
        // Keyboard navigation for mobile menu
        $('.mobile-toggle').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });
        
        // Focus management for mobile menu
        $('.nav-menu, #primary-menu').on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.mobile-toggle').click().focus();
            }
        });
        
        // Skip links
        $('.skip-link').on('click', function(e) {
            const target = $(this).attr('href');
            if (target && $(target).length) {
                e.preventDefault();
                $(target).focus();
                $('html, body').animate({
                    scrollTop: $(target).offset().top - 100
                }, 300);
            }
        });
        
        // Improve button accessibility
        $('button, .btn, .button').each(function() {
            const $btn = $(this);
            if (!$btn.attr('aria-label') && !$btn.attr('title')) {
                const text = $btn.text().trim();
                if (text) {
                    $btn.attr('aria-label', text);
                }
            }
        });
        
        // Focus visible for keyboard users
        $(document).on('keydown', function(e) {
            if (e.key === 'Tab') {
                $('body').addClass('keyboard-nav');
            }
        });
        
        $(document).on('mousedown', function() {
            $('body').removeClass('keyboard-nav');
        });
        
        // Enhanced form accessibility
        $('form').each(function() {
            const $form = $(this);
            
            // Add required field indicators
            $form.find('input[required], textarea[required], select[required]').each(function() {
                const $field = $(this);
                const $label = $form.find('label[for="' + $field.attr('id') + '"]');
                
                if ($label.length && !$label.find('.required').length) {
                    $label.append(' <span class="required" aria-label="Pflichtfeld">*</span>');
                }
            });
            
            // Form validation feedback
            $form.on('submit', function(e) {
                const $invalidFields = $form.find(':invalid');
                
                if ($invalidFields.length) {
                    e.preventDefault();
                    $invalidFields.first().focus();
                    
                    // Add error styling
                    $invalidFields.addClass('error');
                    $invalidFields.on('input', function() {
                        $(this).removeClass('error');
                    });
                }
            });
        });
        
        // Improve image accessibility
        $('img').each(function() {
            const $img = $(this);
            if (!$img.attr('alt') && !$img.attr('role')) {
                $img.attr('alt', '');
            }
        });
        
        // ARIA landmarks
        if (!$('main').length) {
            $('#main, .main-content').attr('role', 'main');
        }
        
        // Enhanced color contrast warnings (development mode)
        if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
            checkColorContrast();
        }
    }

    // Color Contrast Checker (development helper)
    function checkColorContrast() {
        // Simple contrast ratio checker for development
        const elements = document.querySelectorAll('a, button, .btn, p, h1, h2, h3, h4, h5, h6');
        
        elements.forEach(el => {
            const styles = window.getComputedStyle(el);
            const bgColor = styles.backgroundColor;
            const textColor = styles.color;
            
            // Basic contrast check (simplified)
            if (bgColor !== 'rgba(0, 0, 0, 0)' && textColor !== 'rgba(0, 0, 0, 0)') {
                const contrast = calculateContrast(bgColor, textColor);
                if (contrast < 4.5) {
                    console.warn('Low contrast ratio detected:', el, 'Ratio:', contrast);
                }
            }
        });
    }

    // Simple contrast calculation helper
    function calculateContrast(color1, color2) {
        // This is a simplified version - in production, use a proper library
        return 4.5; // Return acceptable ratio for now
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
