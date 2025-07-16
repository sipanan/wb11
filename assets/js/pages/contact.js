/**
 * Contact Page Specific JavaScript
 * Safe Cologne Theme - Contact Page
 */

(function($) {
    'use strict';

    const SafeCologneContact = {
        init() {
            this.bindEvents();
            this.initContactForm();
            this.initFAQ();
            this.initMap();
            this.initFormValidation();
            this.prePopulateForm();
        },

        bindEvents() {
            // Form submission
            $('.contact-form').on('submit', this.handleFormSubmit.bind(this));
            
            // FAQ interactions
            $('.faq-question').on('click', this.handleFAQClick);
            
            // Contact item interactions
            $('.contact-item').on('click', this.handleContactItemClick);
            
            // Emergency contact
            $('.emergency-contact a').on('click', this.handleEmergencyClick);
            
            // Form field interactions
            $('.form-group input, .form-group textarea, .form-group select').on('blur', this.validateField);
            $('.form-group input, .form-group textarea, .form-group select').on('focus', this.clearFieldError);
        },

        handleFormSubmit(e) {
            e.preventDefault();
            
            const $form = $(e.target);
            const formData = new FormData($form[0]);
            
            // Show loading state
            this.showFormStatus('loading', 'Nachricht wird gesendet...');
            $form.find('.form-submit').prop('disabled', true);
            
            // Validate form
            if (!this.validateForm($form)) {
                this.showFormStatus('error', 'Bitte korrigieren Sie die Fehler im Formular.');
                $form.find('.form-submit').prop('disabled', false);
                return;
            }
            
            // Submit form via AJAX
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'safe_cologne_contact_form',
                    nonce: safeCologne.nonce,
                    form_data: Object.fromEntries(formData)
                },
                success: (response) => {
                    if (response.success) {
                        this.showFormStatus('success', 'Ihre Nachricht wurde erfolgreich gesendet!');
                        $form[0].reset();
                        
                        // Track successful submission
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'form_submit', {
                                event_category: 'Contact Form',
                                event_label: 'Success'
                            });
                        }
                    } else {
                        this.showFormStatus('error', response.data || 'Ein Fehler ist aufgetreten.');
                    }
                },
                error: () => {
                    this.showFormStatus('error', 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
                },
                complete: () => {
                    $form.find('.form-submit').prop('disabled', false);
                }
            });
        },

        handleFAQClick() {
            const $faqItem = $(this).closest('.faq-item');
            const isActive = $faqItem.hasClass('active');
            
            // Close all FAQ items
            $('.faq-item').removeClass('active');
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                $faqItem.addClass('active');
            }
            
            // Track FAQ interaction
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'FAQ',
                    event_label: $(this).text().trim()
                });
            }
        },

        handleContactItemClick() {
            const $item = $(this);
            const $link = $item.find('a');
            
            if ($link.length) {
                // Add visual feedback
                $item.addClass('clicked');
                setTimeout(() => {
                    $item.removeClass('clicked');
                }, 200);
                
                // Track contact method usage
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        event_category: 'Contact Method',
                        event_label: $link.attr('href').startsWith('tel:') ? 'Phone' : 'Email'
                    });
                }
            }
        },

        handleEmergencyClick() {
            // Track emergency contact usage
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'Emergency Contact',
                    event_label: 'Emergency Phone'
                });
            }
            
            // Add visual feedback
            $(this).closest('.emergency-contact').addClass('clicked');
            setTimeout(() => {
                $('.emergency-contact').removeClass('clicked');
            }, 300);
        },

        validateField() {
            const $field = $(this);
            const $group = $field.closest('.form-group');
            const value = $field.val().trim();
            const fieldName = $field.attr('name');
            
            // Remove existing error
            $group.removeClass('error');
            $group.find('.error-message').remove();
            
            // Validate based on field type
            let isValid = true;
            let errorMessage = '';
            
            switch (fieldName) {
                case 'name':
                    if (value.length < 2) {
                        isValid = false;
                        errorMessage = 'Name muss mindestens 2 Zeichen lang sein.';
                    }
                    break;
                    
                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
                    }
                    break;
                    
                case 'phone':
                    const phoneRegex = /^[\d\s\+\-\(\)]+$/;
                    if (value && !phoneRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Bitte geben Sie eine gültige Telefonnummer ein.';
                    }
                    break;
                    
                case 'message':
                    if (value.length < 10) {
                        isValid = false;
                        errorMessage = 'Nachricht muss mindestens 10 Zeichen lang sein.';
                    }
                    break;
            }
            
            if (!isValid) {
                $group.addClass('error');
                $group.append(`<div class="error-message">${errorMessage}</div>`);
            }
            
            return isValid;
        },

        clearFieldError() {
            const $field = $(this);
            const $group = $field.closest('.form-group');
            
            $group.removeClass('error');
            $group.find('.error-message').remove();
        },

        validateForm($form) {
            let isValid = true;
            
            // Validate all required fields
            $form.find('[required]').each(function() {
                if (!SafeCologneContact.validateField.call(this)) {
                    isValid = false;
                }
            });
            
            return isValid;
        },

        showFormStatus(type, message) {
            const $status = $('.form-status');
            
            $status.removeClass('success error loading')
                   .addClass(type)
                   .text(message)
                   .fadeIn();
            
            // Auto-hide success messages
            if (type === 'success') {
                setTimeout(() => {
                    $status.fadeOut();
                }, 5000);
            }
        },

        initContactForm() {
            // Add form status element if it doesn't exist
            if (!$('.form-status').length) {
                $('.contact-form').prepend('<div class="form-status"></div>');
            }
            
            // Initialize form enhancements
            this.initFormEnhancements();
        },

        initFormEnhancements() {
            // Add floating labels
            $('.form-group input, .form-group textarea, .form-group select').each(function() {
                const $field = $(this);
                const $group = $field.closest('.form-group');
                const $label = $group.find('label');
                
                // Add floating label behavior
                $field.on('focus blur', function() {
                    $group.toggleClass('focused', this.value.length > 0 || $field.is(':focus'));
                });
                
                // Initial state
                if ($field.val().length > 0) {
                    $group.addClass('focused');
                }
            });
            
            // Add character counter for textarea
            $('.form-group textarea').each(function() {
                const $textarea = $(this);
                const $group = $textarea.closest('.form-group');
                const maxLength = $textarea.attr('maxlength');
                
                if (maxLength) {
                    const $counter = $('<div class="char-counter">0/' + maxLength + '</div>');
                    $group.append($counter);
                    
                    $textarea.on('input', function() {
                        const currentLength = this.value.length;
                        $counter.text(currentLength + '/' + maxLength);
                        
                        if (currentLength > maxLength * 0.9) {
                            $counter.addClass('warning');
                        } else {
                            $counter.removeClass('warning');
                        }
                    });
                }
            });
        },

        initFAQ() {
            // Add FAQ data if not present
            if (!$('.faq-list').length) {
                this.addDefaultFAQ();
            }
            
            // Initialize FAQ animations
            $('.faq-item').each(function() {
                const $item = $(this);
                const $answer = $item.find('.faq-answer');
                
                // Set initial max-height for smooth animation
                if ($item.hasClass('active')) {
                    $answer.css('max-height', $answer[0].scrollHeight + 'px');
                }
            });
        },

        addDefaultFAQ() {
            const faqData = [
                {
                    question: 'Wie schnell können Sie vor Ort sein?',
                    answer: 'In Notfällen sind wir innerhalb von 15-30 Minuten vor Ort, abhängig von Ihrem Standort in Köln und Umgebung.'
                },
                {
                    question: 'Welche Qualifikationen haben Ihre Mitarbeiter?',
                    answer: 'Alle unsere Mitarbeiter sind nach § 34a GewO geschult und verfügen über die erforderlichen Zertifikate für Sicherheitsdienste.'
                },
                {
                    question: 'Bieten Sie auch Langzeitverträge an?',
                    answer: 'Ja, wir bieten sowohl kurzfristige als auch langfristige Sicherheitslösungen an. Langzeitverträge erhalten attraktive Rabatte.'
                },
                {
                    question: 'Wie erfolgt die Abrechnung?',
                    answer: 'Die Abrechnung erfolgt monatlich nach tatsächlich geleisteten Stunden. Wir bieten transparente Preise ohne versteckte Kosten.'
                }
            ];
            
            const faqHTML = `
                <section class="faq-section">
                    <div class="container">
                        <h2 class="section-title">Häufig gestellte Fragen</h2>
                        <div class="faq-list">
                            ${faqData.map(item => `
                                <div class="faq-item">
                                    <button class="faq-question">${item.question}</button>
                                    <div class="faq-answer">
                                        <p>${item.answer}</p>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </section>
            `;
            
            $('.contact-main').after(faqHTML);
        },

        initMap() {
            // Initialize map placeholder or actual map integration
            const $mapContainer = $('.map-container');
            
            if ($mapContainer.length) {
                // Add click handler for map placeholder
                $mapContainer.on('click', function() {
                    const address = 'Subbelrather Str. 15A, 50823 Köln';
                    const mapsUrl = `https://maps.google.com/maps?q=${encodeURIComponent(address)}`;
                    window.open(mapsUrl, '_blank');
                });
                
                // Add map placeholder content
                if ($mapContainer.find('.map-placeholder').length === 0) {
                    $mapContainer.html(`
                        <div class="map-placeholder">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Standort anzeigen</h3>
                            <p>Subbelrather Str. 15A<br>50823 Köln</p>
                            <p><small>Klicken Sie hier, um die Karte zu öffnen</small></p>
                        </div>
                    `);
                }
            }
        },

        prePopulateForm() {
            // Pre-populate form based on URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const service = urlParams.get('service');
            const plan = urlParams.get('plan');
            
            if (service) {
                $('select[name="service"]').val(service);
                $('textarea[name="message"]').val(`Ich interessiere mich für den Service: ${service}\n\n`);
            }
            
            if (plan) {
                $('select[name="service"]').val('Preisanfrage');
                $('textarea[name="message"]').val(`Ich interessiere mich für das Paket: ${plan}\n\n`);
            }
        },

        // Business hours functionality
        updateBusinessHours() {
            const now = new Date();
            const currentDay = now.getDay(); // 0 = Sunday, 1 = Monday, etc.
            const currentHour = now.getHours();
            
            const businessHours = {
                1: { start: 8, end: 18, label: 'Montag' }, // Monday
                2: { start: 8, end: 18, label: 'Dienstag' }, // Tuesday
                3: { start: 8, end: 18, label: 'Mittwoch' }, // Wednesday
                4: { start: 8, end: 18, label: 'Donnerstag' }, // Thursday
                5: { start: 8, end: 18, label: 'Freitag' }, // Friday
                6: { start: 9, end: 14, label: 'Samstag' }, // Saturday
                0: { start: null, end: null, label: 'Sonntag' } // Sunday - closed
            };
            
            // Update current day highlighting
            $('.hours-item').each(function() {
                const $item = $(this);
                const dayIndex = $item.data('day');
                
                if (dayIndex === currentDay) {
                    $item.addClass('current-day');
                    
                    const hours = businessHours[dayIndex];
                    if (hours.start && currentHour >= hours.start && currentHour < hours.end) {
                        $item.addClass('open-now');
                    }
                }
            });
        },

        // Utility functions
        utils: {
            formatPhoneNumber(phone) {
                // Remove all non-digit characters
                const cleaned = phone.replace(/\D/g, '');
                
                // Format German phone number
                if (cleaned.startsWith('49')) {
                    return '+49 ' + cleaned.substring(2, 5) + ' ' + cleaned.substring(5);
                } else if (cleaned.startsWith('0')) {
                    return cleaned.substring(0, 4) + ' ' + cleaned.substring(4);
                }
                
                return phone;
            },

            validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            },

            sanitizeInput(input) {
                return input.trim().replace(/[<>]/g, '');
            }
        }
    };

    // Initialize when DOM is ready
    $(document).ready(() => {
        SafeCologneContact.init();
        SafeCologneContact.updateBusinessHours();
    });

    // Add CSS for contact page enhancements
    const contactStyles = `
        <style>
        .form-group.focused label {
            transform: translateY(-1.5rem) scale(0.9);
            color: var(--primary-red);
        }
        
        .form-group label {
            transition: all 0.3s ease;
            transform-origin: left top;
        }
        
        .char-counter {
            font-size: 0.8rem;
            color: var(--light-gray);
            text-align: right;
            margin-top: 0.5rem;
        }
        
        .char-counter.warning {
            color: var(--primary-red);
        }
        
        .contact-item.clicked {
            transform: scale(0.98);
            transition: transform 0.1s ease;
        }
        
        .emergency-contact.clicked {
            transform: scale(0.98);
            transition: transform 0.1s ease;
        }
        
        .hours-item.current-day {
            background: var(--bg-light);
            border-left: 3px solid var(--primary-red);
            padding-left: 1rem;
        }
        
        .hours-item.open-now {
            background: rgba(227, 6, 19, 0.1);
        }
        
        .hours-item.open-now .hours-day::after {
            content: " (Geöffnet)";
            color: var(--primary-red);
            font-weight: normal;
            font-size: 0.9rem;
        }
        
        .map-container {
            cursor: pointer;
            transition: var(--transition);
        }
        
        .map-container:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .map-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--light-gray);
        }
        
        .map-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-red);
        }
        
        .map-placeholder h3 {
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
        }
        
        .faq-question {
            position: relative;
            padding-right: 2rem;
        }
        
        .faq-question::after {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .form-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .form-submit:disabled:hover {
            transform: none;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 0.5rem;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @media (max-width: 768px) {
            .form-group.focused label {
                transform: translateY(-1.2rem) scale(0.85);
            }
            
            .map-container {
                height: 250px;
            }
        }
        </style>
    `;
    
    $('head').append(contactStyles);

    // Export for global access
    window.SafeCologneContact = SafeCologneContact;

})(jQuery);