/**
 * Kontakt Page JavaScript - SafeCologne
 * DSGVO-compliant contact form with validation
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        const $form = $('.contact-form');
        const $submitBtn = $('.submit-btn');
        const $message = $('.form-message');
        
        // Form validation rules
        const validationRules = {
            name: {
                required: true,
                minLength: 2,
                message: 'Bitte geben Sie Ihren Namen ein (mindestens 2 Zeichen).'
            },
            email: {
                required: true,
                pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                message: 'Bitte geben Sie eine gültige E-Mail-Adresse ein.'
            },
            phone: {
                required: false,
                pattern: /^[\d\s\-\+\(\)]+$/,
                message: 'Bitte geben Sie eine gültige Telefonnummer ein.'
            },
            subject: {
                required: true,
                minLength: 5,
                message: 'Bitte geben Sie einen Betreff ein (mindestens 5 Zeichen).'
            },
            message: {
                required: true,
                minLength: 10,
                message: 'Bitte geben Sie eine Nachricht ein (mindestens 10 Zeichen).'
            },
            dsgvo: {
                required: true,
                message: 'Bitte akzeptieren Sie die Datenschutzerklärung.'
            }
        };
        
        // Real-time validation
        $form.find('input, textarea, select').on('blur', function() {
            validateField($(this));
        });
        
        // Form submission
        $form.on('submit', function(e) {
            e.preventDefault();
            
            if (validateForm()) {
                submitForm();
            }
        });
        
        // Validate individual field
        function validateField($field) {
            const fieldName = $field.attr('name');
            const fieldValue = $field.val().trim();
            const rules = validationRules[fieldName];
            
            if (!rules) return true;
            
            let isValid = true;
            let errorMessage = '';
            
            // Required validation
            if (rules.required && !fieldValue) {
                isValid = false;
                errorMessage = rules.message;
            }
            
            // Checkbox validation (for DSGVO)
            if (fieldName === 'dsgvo' && rules.required && !$field.is(':checked')) {
                isValid = false;
                errorMessage = rules.message;
            }
            
            // Min length validation
            if (isValid && rules.minLength && fieldValue.length < rules.minLength) {
                isValid = false;
                errorMessage = rules.message;
            }
            
            // Pattern validation
            if (isValid && rules.pattern && fieldValue && !rules.pattern.test(fieldValue)) {
                isValid = false;
                errorMessage = rules.message;
            }
            
            // Update field appearance
            updateFieldValidation($field, isValid, errorMessage);
            
            return isValid;
        }
        
        // Update field validation appearance
        function updateFieldValidation($field, isValid, errorMessage) {
            const $formGroup = $field.closest('.form-group, .dsgvo-checkbox');
            const $errorEl = $formGroup.find('.field-error');
            
            // Remove existing error
            $errorEl.remove();
            $field.removeClass('field-invalid field-valid');
            
            if (!isValid && errorMessage) {
                $field.addClass('field-invalid');
                $formGroup.append(`<div class="field-error">${errorMessage}</div>`);
            } else if ($field.val().trim()) {
                $field.addClass('field-valid');
            }
        }
        
        // Validate entire form
        function validateForm() {
            let isFormValid = true;
            
            $form.find('input, textarea, select').each(function() {
                if (!validateField($(this))) {
                    isFormValid = false;
                }
            });
            
            return isFormValid;
        }
        
        // Submit form via AJAX
        function submitForm() {
            const formData = new FormData($form[0]);
            formData.append('action', 'safe_cologne_contact_form');
            formData.append('nonce', safeCologne.nonce);
            
            // Show loading state
            $submitBtn.prop('disabled', true).addClass('loading');
            $submitBtn.find('.loading-spinner').show();
            
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                timeout: 30000,
                success: function(response) {
                    if (response.success) {
                        showMessage('success', response.data.message);
                        $form[0].reset();
                        $form.find('.field-valid, .field-invalid').removeClass('field-valid field-invalid');
                        
                        // Analytics tracking
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'form_submit', {
                                event_category: 'contact',
                                event_label: 'contact_form'
                            });
                        }
                    } else {
                        showMessage('error', response.data.message || 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Ein technischer Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.';
                    
                    if (status === 'timeout') {
                        errorMessage = 'Die Anfrage dauerte zu lange. Bitte versuchen Sie es erneut.';
                    }
                    
                    showMessage('error', errorMessage);
                    console.error('Contact form error:', error);
                },
                complete: function() {
                    // Hide loading state
                    $submitBtn.prop('disabled', false).removeClass('loading');
                    $submitBtn.find('.loading-spinner').hide();
                }
            });
        }
        
        // Show form message
        function showMessage(type, text) {
            $message
                .removeClass('success error')
                .addClass(type + ' show')
                .text(text);
            
            // Auto-hide after 5 seconds
            setTimeout(function() {
                $message.removeClass('show');
            }, 5000);
            
            // Scroll to message
            $('html, body').animate({
                scrollTop: $message.offset().top - 100
            }, 500);
        }
        
        // Phone number formatting
        $('input[name="phone"]').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            let formattedValue = '';
            
            if (value.length > 0) {
                if (value.startsWith('49')) {
                    // German international format
                    formattedValue = '+49 ' + value.substring(2).replace(/(\d{3})(\d{3})(\d+)/, '$1 $2 $3');
                } else if (value.startsWith('0')) {
                    // German national format
                    formattedValue = value.replace(/(\d{4})(\d{3})(\d+)/, '$1 $2 $3');
                } else {
                    formattedValue = value;
                }
            }
            
            $(this).val(formattedValue);
        });
        
        // Character counter for message textarea
        const $messageField = $('textarea[name="message"]');
        const maxLength = 1000;
        
        if ($messageField.length) {
            const $counter = $('<div class="character-counter"></div>');
            $messageField.after($counter);
            
            $messageField.on('input', function() {
                const currentLength = $(this).val().length;
                const remaining = maxLength - currentLength;
                
                $counter.text(`${currentLength}/${maxLength} Zeichen`);
                
                if (remaining < 50) {
                    $counter.addClass('counter-warning');
                } else {
                    $counter.removeClass('counter-warning');
                }
            });
            
            // Initialize counter
            $messageField.trigger('input');
        }
        
        // Enhanced DSGVO checkbox styling
        $('.dsgvo-checkbox input[type="checkbox"]').on('change', function() {
            const $label = $(this).siblings('label');
            if ($(this).is(':checked')) {
                $label.addClass('accepted');
            } else {
                $label.removeClass('accepted');
            }
        });
        
        // Emergency contact click tracking
        $('.emergency-phone').on('click', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'emergency_call', {
                    event_category: 'contact',
                    event_label: 'emergency_contact'
                });
            }
        });
        
        // Contact item hover effects
        $('.contact-item').on('mouseenter', function() {
            $(this).find('.contact-icon').addClass('icon-bounce');
        }).on('mouseleave', function() {
            $(this).find('.contact-icon').removeClass('icon-bounce');
        });
        
        // Initialize map if element exists
        const mapContainer = document.getElementById('contact-map');
        if (mapContainer) {
            // Placeholder for map initialization
            // In a real implementation, you would integrate with a DSGVO-compliant map service
            mapContainer.innerHTML = '<div class="map-placeholder">Karte wird nach Ihrer Zustimmung geladen</div>';
        }
    });
    
})(jQuery);