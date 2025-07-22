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
