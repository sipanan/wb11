/**
 * Contact Page JavaScript
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Initialize contact page functionality
        initContactForm();
        initFormValidation();
        initMapIntegration();
        initContactAnimations();
        initScrollAnimations();
        
        /**
         * Initialize contact form
         */
        function initContactForm() {
            const contactForm = $('#contact-form');
            
            if (contactForm.length) {
                contactForm.on('submit', function(e) {
                    e.preventDefault();
                    
                    // Validate form
                    if (validateForm()) {
                        submitForm();
                    }
                });
            }
        }
        
        /**
         * Validate contact form
         */
        function validateForm() {
            let isValid = true;
            const requiredFields = ['name', 'email', 'message'];
            
            // Clear previous errors
            $('.form-error').remove();
            $('.form-group').removeClass('error');
            
            // Check required fields
            requiredFields.forEach(function(field) {
                const input = $(`#${field}`);
                const value = input.val().trim();
                
                if (!value) {
                    showFieldError(input, 'Dieses Feld ist erforderlich.');
                    isValid = false;
                }
            });
            
            // Validate email
            const emailInput = $('#email');
            const emailValue = emailInput.val().trim();
            if (emailValue && !isValidEmail(emailValue)) {
                showFieldError(emailInput, 'Bitte geben Sie eine gültige E-Mail-Adresse ein.');
                isValid = false;
            }
            
            // Validate phone (if provided)
            const phoneInput = $('#phone');
            const phoneValue = phoneInput.val().trim();
            if (phoneValue && !isValidPhone(phoneValue)) {
                showFieldError(phoneInput, 'Bitte geben Sie eine gültige Telefonnummer ein.');
                isValid = false;
            }
            
            return isValid;
        }
        
        /**
         * Show field error
         */
        function showFieldError(input, message) {
            const formGroup = input.closest('.form-group');
            formGroup.addClass('error');
            formGroup.append(`<div class="form-error">${message}</div>`);
        }
        
        /**
         * Validate email format
         */
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        /**
         * Validate phone format
         */
        function isValidPhone(phone) {
            const phoneRegex = /^[\+]?[0-9\s\-\(\)]{6,}$/;
            return phoneRegex.test(phone);
        }
        
        /**
         * Submit contact form
         */
        function submitForm() {
            const form = $('#contact-form');
            const submitButton = form.find('.form-submit');
            const originalText = submitButton.text();
            
            // Show loading state
            submitButton.prop('disabled', true).text('Wird gesendet...');
            
            // Prepare form data
            const formData = {
                action: 'safe_cologne_contact_form',
                nonce: safeCologne.nonce,
                name: $('#name').val().trim(),
                email: $('#email').val().trim(),
                phone: $('#phone').val().trim(),
                subject: $('#subject').val().trim(),
                message: $('#message').val().trim()
            };
            
            // Submit via AJAX
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage('Ihre Nachricht wurde erfolgreich gesendet. Wir werden uns bald bei Ihnen melden.');
                        form[0].reset();
                        
                        // Track successful submission
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'contact_form_submit', {
                                'event_category': 'Contact',
                                'event_label': 'Success'
                            });
                        }
                    } else {
                        showErrorMessage(response.data || 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
                    }
                },
                error: function() {
                    showErrorMessage('Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
                },
                complete: function() {
                    // Reset button
                    submitButton.prop('disabled', false).text(originalText);
                }
            });
        }
        
        /**
         * Show success message
         */
        function showSuccessMessage(message) {
            const messageHtml = `
                <div class="form-message success">
                    <i class="fas fa-check-circle"></i>
                    <span>${message}</span>
                </div>
            `;
            
            $('#contact-form').prepend(messageHtml);
            
            // Remove after 5 seconds
            setTimeout(function() {
                $('.form-message').fadeOut(function() {
                    $(this).remove();
                });
            }, 5000);
        }
        
        /**
         * Show error message
         */
        function showErrorMessage(message) {
            const messageHtml = `
                <div class="form-message error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>${message}</span>
                </div>
            `;
            
            $('#contact-form').prepend(messageHtml);
            
            // Remove after 5 seconds
            setTimeout(function() {
                $('.form-message').fadeOut(function() {
                    $(this).remove();
                });
            }, 5000);
        }
        
        /**
         * Initialize form validation
         */
        function initFormValidation() {
            // Real-time validation
            $('#contact-form input, #contact-form textarea').on('blur', function() {
                const input = $(this);
                const value = input.val().trim();
                const fieldName = input.attr('id');
                
                // Clear previous errors
                input.closest('.form-group').removeClass('error').find('.form-error').remove();
                
                // Validate specific fields
                if (fieldName === 'email' && value && !isValidEmail(value)) {
                    showFieldError(input, 'Bitte geben Sie eine gültige E-Mail-Adresse ein.');
                } else if (fieldName === 'phone' && value && !isValidPhone(value)) {
                    showFieldError(input, 'Bitte geben Sie eine gültige Telefonnummer ein.');
                } else if (input.attr('required') && !value) {
                    showFieldError(input, 'Dieses Feld ist erforderlich.');
                }
            });
        }
        
        /**
         * Initialize map integration
         */
        function initMapIntegration() {
            const mapContainer = $('.map-container');
            
            if (mapContainer.length) {
                // Initialize Google Maps if available
                if (typeof google !== 'undefined' && google.maps) {
                    const mapOptions = {
                        center: { lat: 50.9375, lng: 6.9603 }, // Cologne coordinates
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    
                    const map = new google.maps.Map(mapContainer[0], mapOptions);
                    
                    // Add marker
                    const marker = new google.maps.Marker({
                        position: mapOptions.center,
                        map: map,
                        title: 'Safe Cologne Security Services'
                    });
                    
                    // Add info window
                    const infoWindow = new google.maps.InfoWindow({
                        content: `
                            <div class="map-info">
                                <h3>Safe Cologne Security Services</h3>
                                <p>Ihr Sicherheitsdienst in Köln</p>
                                <p><strong>Adresse:</strong><br>
                                Musterstraße 123<br>
                                50667 Köln</p>
                            </div>
                        `
                    });
                    
                    marker.addListener('click', function() {
                        infoWindow.open(map, marker);
                    });
                } else {
                    // Fallback for when Google Maps is not available
                    mapContainer.html(`
                        <div class="map-placeholder">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Karte lädt...</h3>
                            <p>Bitte aktivieren Sie JavaScript für die Kartenansicht.</p>
                        </div>
                    `);
                }
            }
        }
        
        /**
         * Initialize contact animations
         */
        function initContactAnimations() {
            const contactItems = $('.contact-item');
            
            // Animate contact items on scroll
            $(window).on('scroll', function() {
                contactItems.each(function(index) {
                    const item = $(this);
                    const itemTop = item.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (itemTop < windowBottom - 100) {
                        setTimeout(function() {
                            item.addClass('animate-in');
                        }, index * 100);
                    }
                });
            });
            
            // Add click effects
            contactItems.on('click', function() {
                const item = $(this);
                const contactInfo = item.find('.contact-text strong').text();
                
                // Copy to clipboard if it's a phone number or email
                if (contactInfo.includes('@') || contactInfo.includes('+')) {
                    navigator.clipboard.writeText(contactInfo).then(function() {
                        showTooltip(item, 'Kopiert!');
                    });
                }
            });
        }
        
        /**
         * Show tooltip
         */
        function showTooltip(element, message) {
            const tooltip = $(`<div class="tooltip">${message}</div>`);
            element.append(tooltip);
            
            setTimeout(function() {
                tooltip.fadeOut(function() {
                    $(this).remove();
                });
            }, 2000);
        }
        
        /**
         * Initialize scroll animations
         */
        function initScrollAnimations() {
            const animatedElements = $('.contact-hero, .contact-main, .business-hours, .map-section, .emergency-contact');
            
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
        
        // Initialize animations
        function initAnimations() {
            // Add CSS classes for animations
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .animate-in {
                        animation: fadeInUp 0.8s ease forwards;
                    }
                    
                    @keyframes fadeInUp {
                        from {
                            opacity: 0;
                            transform: translateY(30px);
                        }
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
                    
                    .form-message {
                        padding: 1rem;
                        border-radius: var(--radius-md);
                        margin-bottom: 1rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    }
                    
                    .form-message.success {
                        background: #d4edda;
                        color: #155724;
                        border: 1px solid #c3e6cb;
                    }
                    
                    .form-message.error {
                        background: #f8d7da;
                        color: #721c24;
                        border: 1px solid #f5c6cb;
                    }
                    
                    .form-error {
                        color: var(--primary-red);
                        font-size: 0.9rem;
                        margin-top: 0.25rem;
                    }
                    
                    .form-group.error input,
                    .form-group.error textarea {
                        border-color: var(--primary-red);
                    }
                    
                    .tooltip {
                        position: absolute;
                        background: var(--dark-gray);
                        color: var(--white);
                        padding: 0.5rem;
                        border-radius: var(--radius-sm);
                        font-size: 0.8rem;
                        top: -30px;
                        left: 50%;
                        transform: translateX(-50%);
                        z-index: 1000;
                    }
                    
                    .tooltip::after {
                        content: '';
                        position: absolute;
                        top: 100%;
                        left: 50%;
                        transform: translateX(-50%);
                        border: 5px solid transparent;
                        border-top-color: var(--dark-gray);
                    }
                `)
                .appendTo('head');
        }
        
        // Initialize on window load
        $(window).on('load', function() {
            initAnimations();
            
            // Remove loading states
            $('.loading').removeClass('loading');
            
            // Trigger initial scroll animations
            $(window).trigger('scroll');
        });
    });
    
})(jQuery);