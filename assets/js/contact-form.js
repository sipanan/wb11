/**
 * Contact Form JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Contact Form Handler
        $('.contact-form, #contactForm').on('submit', handleFormSubmit);
        
        // Job Application Form Handler
        $('#job-application-form').on('submit', handleJobApplication);
        
        // Real-time validation
        $('input[required], textarea[required]').on('blur', validateField);
        $('input[type="email"]').on('blur', validateEmail);
        $('input[type="tel"]').on('blur', validatePhone);
        
        // Service selection from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const service = urlParams.get('service');
        if (service) {
            $('#service').val(service);
        }
        
        // Auto-fill job position from button click
        $('[data-job]').on('click', function(e) {
            e.preventDefault();
            const jobTitle = $(this).data('job');
            $('#position_applied').val(jobTitle);
            
            // Smooth scroll to form
            $('html, body').animate({
                scrollTop: $('#bewerbung').offset().top - 100
            }, 600);
        });
    });

    function handleFormSubmit(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const originalBtnText = $submitBtn.html();
        
        // Clear previous errors
        clearErrors($form);
        
        // Validate form
        if (!validateForm($form)) {
            return false;
        }
        
        // Show loading state
        setLoadingState($submitBtn, true);
        
        // Prepare form data
        const formData = new FormData(this);
        formData.append('action', 'safe_cologne_contact_form');
        formData.append('nonce', safeCologne.nonce);
        
        // Send AJAX request
        $.ajax({
            url: safeCologne.ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const data = typeof response === 'string' ? JSON.parse(response) : response;
                
                if (data.success) {
                    // Show success message
                    showMessage($form, 'success', data.message);
                    
                    // Update button
                    $submitBtn.html('<i class="fas fa-check"></i> ' + safeCologne.translations.success);
                    $submitBtn.addClass('btn-success');
                    
                    // Reset form after delay
                    setTimeout(function() {
                        $form[0].reset();
                        $submitBtn.html(originalBtnText);
                        $submitBtn.removeClass('btn-success');
                        $('.alert').fadeOut();
                    }, 3000);
                    
                    // Track conversion
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'form_submit', {
                            'event_category': 'Contact',
                            'event_label': 'Contact Form'
                        });
                    }
                } else {
                    showMessage($form, 'error', data.message);
                    setLoadingState($submitBtn, false, originalBtnText);
                }
            },
            error: function() {
                showMessage($form, 'error', safeCologne.translations.error);
                setLoadingState($submitBtn, false, originalBtnText);
            }
        });
    }

    function handleJobApplication(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const originalBtnText = $submitBtn.html();
        
        // Clear previous errors
        clearErrors($form);
        
        // Validate form
        if (!validateForm($form)) {
            return false;
        }
        
        // Check file size
        const fileInput = $form.find('#cv_upload')[0];
        if (fileInput.files[0] && fileInput.files[0].size > 5 * 1024 * 1024) {
            showFieldError($(fileInput), 'Die Datei darf maximal 5MB groß sein.');
            return false;
        }
        
        // Show loading state
        setLoadingState($submitBtn, true);
        
        // Prepare form data
        const formData = new FormData(this);
        formData.append('action', 'safe_cologne_job_application');
        formData.append('nonce', safeCologne.nonce);
        
        // Send AJAX request
        $.ajax({
            url: safeCologne.ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                const xhr = new window.XMLHttpRequest();
                
                // Upload progress
                xhr.upload.addEventListener('progress', function(evt) {
                    if (evt.lengthComputable) {
                        const percentComplete = (evt.loaded / evt.total) * 100;
                        $submitBtn.html('<span class="spinner"></span> Uploading... ' + Math.round(percentComplete) + '%');
                    }
                }, false);
                
                return xhr;
            },
            success: function(response) {
                const data = typeof response === 'string' ? JSON.parse(response) : response;
                
                if (data.success) {
                    showMessage($form, 'success', 'Ihre Bewerbung wurde erfolgreich übermittelt. Wir melden uns schnellstmöglich bei Ihnen!');
                    
                    // Update button
                    $submitBtn.html('<i class="fas fa-check"></i> Erfolgreich gesendet!');
                    $submitBtn.addClass('btn-success');
                    
                    // Reset form after delay
                    setTimeout(function() {
                        $form[0].reset();
                        $submitBtn.html(originalBtnText);
                        $submitBtn.removeClass('btn-success');
                        $('.alert').fadeOut();
                    }, 5000);
                } else {
                    showMessage($form, 'error', data.message);
                    setLoadingState($submitBtn, false, originalBtnText);
                }
            },
            error: function() {
                showMessage($form, 'error', 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.');
                setLoadingState($submitBtn, false, originalBtnText);
            }
        });
    }

    function validateForm($form) {
        let isValid = true;
        
        // Check required fields
        $form.find('[required]').each(function() {
            if (!validateField.call(this)) {
                isValid = false;
            }
        });
        
        // Check email fields
        $form.find('input[type="email"]').each(function() {
            if (!validateEmail.call(this)) {
                isValid = false;
            }
        });
        
        // Check phone fields
        $form.find('input[type="tel"]').each(function() {
            if (!validatePhone.call(this)) {
                isValid = false;
            }
        });
        
        // Check privacy consent
        const $privacy = $form.find('input[name="privacy"]');
        if ($privacy.length && !$privacy.is(':checked')) {
            showFieldError($privacy.parent(), 'Bitte stimmen Sie der Datenschutzerklärung zu.');
            isValid = false;
        }
        
        return isValid;
    }

    function validateField() {
        const $field = $(this);
        const value = $field.val().trim();
        
        if ($field.prop('required') && !value) {
            showFieldError($field, 'Dieses Feld ist erforderlich.');
            return false;
        }
        
        clearFieldError($field);
        return true;
    }

    function validateEmail() {
        const $field = $(this);
        const value = $field.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (value && !emailRegex.test(value)) {
            showFieldError($field, 'Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            return false;
        }
        
        clearFieldError($field);
        return true;
    }

    function validatePhone() {
        const $field = $(this);
        const value = $field.val().trim();
        const phoneRegex = /^[\d\s\-\+$$$$]+$/;
        
        if (value && !phoneRegex.test(value)) {
            showFieldError($field, 'Bitte geben Sie eine gültige Telefonnummer ein.');
            return false;
        }
        
        clearFieldError($field);
        return true;
    }

    function showFieldError($field, message) {
        $field.addClass('error');
        
        // Remove existing error message
        $field.siblings('.form-error').remove();
        
        // Add new error message
        $field.after('<span class="form-error">' + message + '</span>');
    }

    function clearFieldError($field) {
        $field.removeClass('error');
        $field.siblings('.form-error').remove();
    }

    function clearErrors($form) {
        $form.find('.error').removeClass('error');
        $form.find('.form-error').remove();
        $form.find('.alert').remove();
    }

    function showMessage($form, type, message) {
        // Remove existing alerts
        $form.find('.alert').remove();
        
        const alertClass = type === 'success' ? 'alert-success' : 'alert-error';
                const icon = type === 'success' ? 'check-circle' : 'exclamation-circle';
        
        const $alert = $('<div class="alert ' + alertClass + '"><i class="fas fa-' + icon + '"></i> ' + message + '</div>');
        $form.prepend($alert);
        
        // Scroll to alert
        $('html, body').animate({
            scrollTop: $alert.offset().top - 100
        }, 300);
    }

    function setLoadingState($button, isLoading, originalText) {
        if (isLoading) {
            $button.prop('disabled', true).addClass('loading');
            $button.html('<span class="spinner"></span> ' + safeCologne.translations.loading);
        } else {
            $button.prop('disabled', false).removeClass('loading');
            $button.html(originalText);
        }
    }

    // Character counter for textareas
    $('textarea[maxlength]').each(function() {
        const $textarea = $(this);
        const maxLength = $textarea.attr('maxlength');
        
        const $counter = $('<div class="character-counter">0 / ' + maxLength + '</div>');
        $textarea.after($counter);
        
        $textarea.on('input', function() {
            const currentLength = this.value.length;
            $counter.text(currentLength + ' / ' + maxLength);
            
            if (currentLength > maxLength * 0.9) {
                $counter.addClass('warning');
            } else {
                $counter.removeClass('warning');
            }
        });
    });

    // File input preview
    $('input[type="file"]').on('change', function() {
        const $input = $(this);
        const file = this.files[0];
        
        if (file) {
            const fileName = file.name;
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            
            // Remove existing preview
            $input.siblings('.file-preview').remove();
            
            // Add file preview
            const $preview = $('<div class="file-preview"><i class="fas fa-file-pdf"></i> ' + fileName + ' (' + fileSize + ' MB)</div>');
            $input.after($preview);
        }
    });

})(jQuery);

// Standalone form styles
const formStyles = `
<style>
.alert {
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: slideInDown 0.3s ease;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-error {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.character-counter {
    text-align: right;
    font-size: 0.875rem;
    color: var(--light-gray);
    margin-top: 0.25rem;
}

.character-counter.warning {
    color: #dc3545;
}

.file-preview {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
    padding: 0.5rem;
    background: var(--bg-light);
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
}

.file-preview i {
    color: var(--primary-red);
}

.btn-success {
    background: #28a745 !important;
    border-color: #28a745 !important;
}

.form-section {
    opacity: 0;
    animation: fadeInUp 0.5s ease forwards;
}

.form-section:nth-child(1) { animation-delay: 0.1s; }
.form-section:nth-child(2) { animation-delay: 0.2s; }
.form-section:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
`;

// Inject styles
document.head.insertAdjacentHTML('beforeend', formStyles);
