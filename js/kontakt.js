/**
 * Kontakt Page JavaScript - Safe Cologne
 * Version: 2.0.0
 * 
 * Interactive functionality for the contact page template
 */

(function($) {
    'use strict';
    
    // Wait for DOM ready
    $(document).ready(function() {
        
        // Initialize all contact page functionality
        initContactForm();
        initFAQ();
        initScrollAnimations();
        initFormValidation();
        
        // Phone number formatting
        initPhoneFormatting();
        
        // Analytics tracking
        initContactTracking();
    });
    
    /**
     * Contact Form Handling
     */
    function initContactForm() {
        const form = document.querySelector('.contact-form');
        if (!form) return;
        
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            // Validate form
            if (!validateForm(this)) {
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<span>Wird gesendet...</span>';
            
            try {
                const formData = new FormData(this);
                
                // Add additional data
                formData.append('timestamp', new Date().toISOString());
                formData.append('user_agent', navigator.userAgent);
                formData.append('page_url', window.location.href);
                
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Show success message
                    showSuccessMessage();
                    
                    // Reset form
                    this.reset();
                    
                    // Track conversion
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'form_submit', {
                            'form_type': 'contact',
                            'service_type': formData.get('service'),
                            'urgency': formData.get('urgency')
                        });
                    }
                    
                    // Scroll to success message
                    document.querySelector('.success-message')?.scrollIntoView({ 
                        behavior: 'smooth' 
                    });
                    
                } else {
                    throw new Error(result.message || 'Fehler beim Senden');
                }
                
            } catch (error) {
                console.error('Form submission error:', error);
                showErrorMessage(error.message);
            } finally {
                // Reset button
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
                submitBtn.innerHTML = originalText;
            }
        });
    }
    
    /**
     * Form Validation
     */
    function initFormValidation() {
        const form = document.querySelector('.contact-form');
        if (!form) return;
        
        // Real-time validation
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                // Clear error state on input
                this.classList.remove('error');
                const errorMsg = this.parentNode.querySelector('.error-message');
                if (errorMsg) {
                    errorMsg.remove();
                }
            });
        });
    }
    
    /**
     * Validate individual field
     */
    function validateField(field) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        let isValid = true;
        let errorMessage = '';
        
        // Clear previous error
        field.classList.remove('error');
        const existingError = field.parentNode.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
        
        // Required field validation
        if (isRequired && !value) {
            isValid = false;
            errorMessage = 'Dieses Feld ist erforderlich.';
        }
        
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
            }
        }
        
        // Phone validation
        if (field.type === 'tel' && value) {
            const phoneRegex = /^[\d\s\-\+\(\)]+$/;
            if (!phoneRegex.test(value) || value.length < 6) {
                isValid = false;
                errorMessage = 'Bitte geben Sie eine gültige Telefonnummer ein.';
            }
        }
        
        // Show error if invalid
        if (!isValid) {
            field.classList.add('error');
            const errorElement = document.createElement('div');
            errorElement.className = 'error-message';
            errorElement.textContent = errorMessage;
            field.parentNode.appendChild(errorElement);
        }
        
        return isValid;
    }
    
    /**
     * Validate entire form
     */
    function validateForm(form) {
        const fields = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isFormValid = true;
        
        fields.forEach(field => {
            if (!validateField(field)) {
                isFormValid = false;
            }
        });
        
        // Privacy consent validation
        const consentCheckbox = form.querySelector('input[name="privacy_consent"]');
        if (consentCheckbox && !consentCheckbox.checked) {
            isFormValid = false;
            showErrorMessage('Bitte stimmen Sie der Datenschutzerklärung zu.');
        }
        
        return isFormValid;
    }
    
    /**
     * Phone Number Formatting
     */
    function initPhoneFormatting() {
        const phoneInputs = document.querySelectorAll('input[type="tel"]');
        
        phoneInputs.forEach(input => {
            input.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                
                // German phone number formatting
                if (value.length > 0) {
                    if (value.startsWith('49')) {
                        // International format
                        value = '+49 ' + value.slice(2);
                    } else if (value.startsWith('0')) {
                        // National format
                        if (value.length <= 4) {
                            value = value;
                        } else if (value.length <= 8) {
                            value = value.slice(0, 4) + ' ' + value.slice(4);
                        } else {
                            value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12);
                        }
                    }
                }
                
                e.target.value = value;
            });
        });
    }
    
    /**
     * FAQ Functionality
     */
    function initFAQ() {
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            
            if (question && answer) {
                question.addEventListener('click', function() {
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';
                    
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        const otherQuestion = otherItem.querySelector('.faq-question');
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        
                        if (otherItem !== item) {
                            otherQuestion.setAttribute('aria-expanded', 'false');
                            otherItem.classList.remove('active');
                            otherAnswer.style.maxHeight = '0';
                        }
                    });
                    
                    // Toggle current item
                    if (!isExpanded) {
                        this.setAttribute('aria-expanded', 'true');
                        item.classList.add('active');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        
                        // Track FAQ interaction
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'faq_expand', {
                                'faq_question': question.textContent.trim(),
                                'event_category': 'engagement'
                            });
                        }
                    } else {
                        this.setAttribute('aria-expanded', 'false');
                        item.classList.remove('active');
                        answer.style.maxHeight = '0';
                    }
                });
            }
        });
    }
    
    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        const animateElements = document.querySelectorAll('.method-card, .info-card, .faq-item');
        
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animateElements.forEach(element => {
            scrollObserver.observe(element);
        });
    }
    
    /**
     * Contact Tracking
     */
    function initContactTracking() {
        // Track contact method clicks
        document.querySelectorAll('.method-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const methodCard = this.closest('.method-card');
                const methodTitle = methodCard.querySelector('.method-title')?.textContent;
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'contact_method_click', {
                        'method': methodTitle,
                        'button_text': this.textContent.trim(),
                        'event_category': 'contact'
                    });
                }
            });
        });
        
        // Track phone number clicks
        document.querySelectorAll('a[href^="tel:"]').forEach(link => {
            link.addEventListener('click', function() {
                const phoneNumber = this.getAttribute('href').replace('tel:', '');
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'phone_click', {
                        'phone_number': phoneNumber,
                        'event_category': 'conversion'
                    });
                }
            });
        });
        
        // Track email clicks
        document.querySelectorAll('a[href^="mailto:"]').forEach(link => {
            link.addEventListener('click', function() {
                const email = this.getAttribute('href').replace('mailto:', '');
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'email_click', {
                        'email_address': email,
                        'event_category': 'conversion'
                    });
                }
            });
        });
        
        // Track WhatsApp clicks
        document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
            link.addEventListener('click', function() {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'whatsapp_click', {
                        'event_category': 'conversion'
                    });
                }
            });
        });
    }
    
    /**
     * Show Success Message
     */
    function showSuccessMessage() {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.success-message, .error-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create success message
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <div>
                <strong>Vielen Dank für Ihre Nachricht!</strong><br>
                Wir haben Ihre Anfrage erhalten und melden uns innerhalb der angegebenen Zeit bei Ihnen.
            </div>
        `;
        
        // Insert before form
        const form = document.querySelector('.contact-form');
        form.parentNode.insertBefore(successDiv, form);
        
        // Auto-remove after 10 seconds
        setTimeout(() => {
            successDiv.remove();
        }, 10000);
    }
    
    /**
     * Show Error Message
     */
    function showErrorMessage(message) {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.success-message, .error-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.style.cssText = `
            background: #f8d7da;
            color: #721c24;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #f5c6cb;
            display: flex;
            align-items: center;
        `;
        errorDiv.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
            </svg>
            <div>
                <strong>Fehler beim Senden:</strong><br>
                ${message}
            </div>
        `;
        
        // Insert before form
        const form = document.querySelector('.contact-form');
        form.parentNode.insertBefore(errorDiv, form);
        
        // Auto-remove after 10 seconds
        setTimeout(() => {
            errorDiv.remove();
        }, 10000);
    }
    
    /**
     * Smooth scrolling for anchor links
     */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                const headerHeight = 80;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    /**
     * Form field auto-completion suggestions
     */
    function initAutoComplete() {
        const companyInput = document.querySelector('input[name="company"]');
        const serviceSelect = document.querySelector('select[name="service"]');
        
        // Auto-suggest service based on company name
        if (companyInput && serviceSelect) {
            companyInput.addEventListener('input', function() {
                const company = this.value.toLowerCase();
                
                // Smart service suggestions based on company name
                if (company.includes('hotel') || company.includes('restaurant')) {
                    serviceSelect.value = 'objektschutz';
                } else if (company.includes('event') || company.includes('messe')) {
                    serviceSelect.value = 'veranstaltungsschutz';
                } else if (company.includes('shop') || company.includes('laden')) {
                    serviceSelect.value = 'ladendetektiv';
                }
            });
        }
    }
    
    // Initialize auto-completion
    initAutoComplete();
    
    /**
     * Emergency contact handling
     */
    document.querySelectorAll('.method-card.urgent .method-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Add urgent tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'emergency_contact', {
                    'contact_method': 'phone',
                    'event_category': 'emergency'
                });
            }
        });
    });
    
    /**
     * Page performance tracking
     */
    window.addEventListener('load', function() {
        setTimeout(function() {
            const perfData = performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'page_load_time', {
                    'value': pageLoadTime,
                    'page': 'contact',
                    'event_category': 'performance'
                });
            }
        }, 0);
    });
    
})(jQuery);