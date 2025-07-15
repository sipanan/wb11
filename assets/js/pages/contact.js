/**
 * Contact Page JavaScript
 * Enhanced functionality for the contact page
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Form Steps Enhancement =====
        const initFormSteps = () => {
            const form = document.querySelector('.wpcf7-form');
            if (!form) return;
            
            const steps = document.querySelectorAll('.form-step');
            const requiredFields = {
                1: ['your-name', 'your-email'],
                2: ['your-subject', 'your-message'],
                3: ['acceptance-privacy']
            };
            
            // Update steps based on form completion
            const updateSteps = () => {
                let currentStep = 0;
                
                // Check step 1
                if (requiredFields[1].every(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    return input && input.value.trim() !== '';
                })) {
                    currentStep = 1;
                }
                
                // Check step 2
                if (currentStep >= 1 && requiredFields[2].every(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    return input && input.value.trim() !== '';
                })) {
                    currentStep = 2;
                }
                
                // Check step 3
                if (currentStep >= 2 && requiredFields[3].every(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    return input && input.checked;
                })) {
                    currentStep = 3;
                }
                
                // Update visual indicators
                steps.forEach((step, index) => {
                    if (index <= currentStep) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });
            };
            
            // Listen for form changes
            form.addEventListener('input', updateSteps);
            form.addEventListener('change', updateSteps);
            
            // Initial update
            updateSteps();
        };
        
        // ===== Form Field Enhancements =====
        const initFormFieldEnhancements = () => {
            const formInputs = document.querySelectorAll('.wpcf7 input, .wpcf7 textarea, .wpcf7 select');
            
            formInputs.forEach(input => {
                // Add floating label effect
                const updateFieldState = () => {
                    if (input.value || input === document.activeElement) {
                        input.classList.add('has-value');
                    } else {
                        input.classList.remove('has-value');
                    }
                };
                
                input.addEventListener('focus', () => {
                    input.classList.add('is-focused');
                    updateFieldState();
                });
                
                input.addEventListener('blur', () => {
                    input.classList.remove('is-focused');
                    updateFieldState();
                });
                
                input.addEventListener('input', updateFieldState);
                
                // Initial state
                updateFieldState();
            });
        };
        
        // ===== Character Counter =====
        const initCharacterCounter = () => {
            const textareas = document.querySelectorAll('.wpcf7-textarea');
            
            textareas.forEach(textarea => {
                const maxLength = textarea.getAttribute('maxlength') || 1000;
                
                // Create counter element
                const counter = document.createElement('div');
                counter.className = 'character-counter';
                counter.textContent = `0 / ${maxLength}`;
                
                textarea.parentNode.appendChild(counter);
                
                // Update counter
                const updateCounter = () => {
                    const currentLength = textarea.value.length;
                    counter.textContent = `${currentLength} / ${maxLength}`;
                    
                    // Add warning class when approaching limit
                    if (currentLength >= maxLength * 0.8) {
                        counter.classList.add('warning');
                    } else {
                        counter.classList.remove('warning');
                    }
                };
                
                textarea.addEventListener('input', updateCounter);
                updateCounter();
            });
        };
        
        // ===== File Upload Enhancement =====
        const initFileUpload = () => {
            const fileInputs = document.querySelectorAll('.wpcf7-file');
            
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Remove existing preview
                    const existingPreview = this.parentNode.querySelector('.file-preview');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    
                    if (this.files && this.files.length > 0) {
                        const file = this.files[0];
                        const preview = document.createElement('div');
                        preview.className = 'file-preview';
                        
                        const fileSize = (file.size / 1024 / 1024).toFixed(2);
                        const fileIcon = getFileIcon(file.type);
                        
                        preview.innerHTML = `
                            <div class="file-info">
                                <span class="file-icon">${fileIcon}</span>
                                <div class="file-details">
                                    <strong>${file.name}</strong>
                                    <span class="file-size">${fileSize} MB</span>
                                </div>
                            </div>
                            <button type="button" class="remove-file" onclick="this.parentNode.parentNode.removeChild(this.parentNode); this.parentNode.parentNode.querySelector('input[type=file]').value = '';">&times;</button>
                        `;
                        
                        this.parentNode.appendChild(preview);
                    }
                });
            });
            
            const getFileIcon = (mimeType) => {
                if (mimeType.includes('pdf')) return '📄';
                if (mimeType.includes('word')) return '📝';
                if (mimeType.includes('image')) return '🖼️';
                return '📎';
            };
        };
        
        // ===== Form Validation Enhancement =====
        const initFormValidation = () => {
            const form = document.querySelector('.wpcf7-form');
            if (!form) return;
            
            // Email validation
            const emailInput = form.querySelector('input[type="email"]');
            if (emailInput) {
                emailInput.addEventListener('blur', function() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (this.value && !emailRegex.test(this.value)) {
                        this.classList.add('invalid');
                        showFieldError(this, 'Bitte geben Sie eine gültige E-Mail-Adresse ein.');
                    } else {
                        this.classList.remove('invalid');
                        hideFieldError(this);
                    }
                });
            }
            
            // Phone validation
            const phoneInput = form.querySelector('input[type="tel"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function() {
                    // Format phone number
                    let value = this.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 4) {
                            value = value;
                        } else if (value.length <= 8) {
                            value = value.slice(0, 4) + ' ' + value.slice(4);
                        } else {
                            value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12);
                        }
                    }
                    this.value = value;
                });
                
                phoneInput.addEventListener('blur', function() {
                    const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                    if (this.value && !phoneRegex.test(this.value)) {
                        this.classList.add('invalid');
                        showFieldError(this, 'Bitte geben Sie eine gültige Telefonnummer ein.');
                    } else {
                        this.classList.remove('invalid');
                        hideFieldError(this);
                    }
                });
            }
            
            // Show/hide field errors
            const showFieldError = (field, message) => {
                hideFieldError(field);
                const error = document.createElement('div');
                error.className = 'form-error';
                error.textContent = message;
                field.parentNode.appendChild(error);
            };
            
            const hideFieldError = (field) => {
                const error = field.parentNode.querySelector('.form-error');
                if (error) {
                    error.remove();
                }
            };
        };
        
        // ===== Form Submission Enhancement =====
        const initFormSubmission = () => {
            const form = document.querySelector('.wpcf7-form');
            if (!form) return;
            
            // Handle form submission
            form.addEventListener('wpcf7submit', function(event) {
                const steps = document.querySelectorAll('.form-step');
                const submitBtn = form.querySelector('input[type="submit"]');
                
                // Update all steps to complete
                steps.forEach(step => step.classList.add('active'));
                
                // Track form submission
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'form_submission', {
                        'form_name': 'contact_form',
                        'event_category': 'conversion',
                        'event_label': 'contact_page'
                    });
                }
            });
            
            // Handle successful submission
            form.addEventListener('wpcf7mailsent', function(event) {
                // Show success animation
                const formWrapper = form.closest('.form-wrapper');
                if (formWrapper) {
                    formWrapper.innerHTML = `
                        <div class="form-success-message">
                            <div class="success-icon">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <h3>Vielen Dank für Ihre Nachricht!</h3>
                            <p>Wir werden uns innerhalb von 24 Stunden bei Ihnen melden.</p>
                        </div>
                    `;
                    
                    // Scroll to success message
                    setTimeout(() => {
                        formWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
                
                // Show confetti if available
                if (typeof confetti !== 'undefined') {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 }
                    });
                }
            });
            
            // Handle form errors
            form.addEventListener('wpcf7invalid', function(event) {
                const firstInvalidField = form.querySelector('.wpcf7-not-valid');
                if (firstInvalidField) {
                    setTimeout(() => {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstInvalidField.focus();
                    }, 100);
                }
            });
        };
        
        // ===== Contact Method Enhancements =====
        const initContactMethods = () => {
            // Phone number click tracking
            const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
            phoneLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const phoneNumber = this.getAttribute('href').replace('tel:', '');
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'phone_click', {
                            'phone_number': phoneNumber,
                            'event_category': 'contact',
                            'event_label': 'contact_page'
                        });
                    }
                });
            });
            
            // Email click tracking
            const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
            emailLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const email = this.getAttribute('href').replace('mailto:', '');
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'email_click', {
                            'email': email,
                            'event_category': 'contact',
                            'event_label': 'contact_page'
                        });
                    }
                });
            });
            
            // Map link tracking
            const mapLinks = document.querySelectorAll('.map-link');
            mapLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'map_click', {
                            'event_category': 'contact',
                            'event_label': 'contact_page'
                        });
                    }
                });
            });
        };
        
        // ===== Map Enhancement =====
        const initMapEnhancements = () => {
            const mapIframe = document.querySelector('.map-wrapper iframe');
            if (!mapIframe) return;
            
            // Add click tracking to map
            mapIframe.addEventListener('load', function() {
                this.addEventListener('click', function() {
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'map_interaction', {
                            'event_category': 'contact',
                            'event_label': 'contact_page'
                        });
                    }
                });
            });
            
            // Add hover effect to map
            const mapWrapper = mapIframe.closest('.map-wrapper');
            if (mapWrapper) {
                mapWrapper.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.02)';
                });
                
                mapWrapper.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
        };
        
        // ===== Smooth Scrolling =====
        const initSmoothScroll = () => {
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
        };
        
        // ===== Animation on Scroll =====
        const initScrollAnimations = () => {
            const animateElements = document.querySelectorAll('.kontakt-info, .kontakt-form, .kontakt-method');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });
            
            animateElements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.8s ease-out';
                observer.observe(el);
            });
        };
        
        // ===== Contact Method Hover Effects =====
        const initContactMethodHovers = () => {
            const contactMethods = document.querySelectorAll('.kontakt-method');
            
            contactMethods.forEach(method => {
                method.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    
                    const icon = this.querySelector('.icon-wrapper');
                    if (icon) {
                        icon.style.transform = 'scale(1.1)';
                    }
                });
                
                method.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    
                    const icon = this.querySelector('.icon-wrapper');
                    if (icon) {
                        icon.style.transform = 'scale(1)';
                    }
                });
            });
        };
        
        // ===== Business Hours Display =====
        const initBusinessHours = () => {
            const businessHoursElement = document.querySelector('.business-hours');
            if (!businessHoursElement) return;
            
            const now = new Date();
            const currentHour = now.getHours();
            const currentDay = now.getDay(); // 0 = Sunday, 1 = Monday, etc.
            
            // Business hours: Monday-Friday 8:00-18:00, Saturday 9:00-14:00
            let isOpen = false;
            
            if (currentDay >= 1 && currentDay <= 5) { // Monday-Friday
                isOpen = currentHour >= 8 && currentHour < 18;
            } else if (currentDay === 6) { // Saturday
                isOpen = currentHour >= 9 && currentHour < 14;
            }
            
            const statusElement = businessHoursElement.querySelector('.status');
            if (statusElement) {
                statusElement.textContent = isOpen ? 'Geöffnet' : 'Geschlossen';
                statusElement.className = `status ${isOpen ? 'open' : 'closed'}`;
            }
        };
        
        // ===== Dynamic Content Loading =====
        const initDynamicContent = () => {
            // Load additional contact information if needed
            const loadContactInfo = async () => {
                try {
                    // This could load additional contact information from an API
                    // For now, we'll just enhance the existing content
                    
                    // Add emergency contact notice
                    const emergencyNotice = document.createElement('div');
                    emergencyNotice.className = 'emergency-notice';
                    emergencyNotice.innerHTML = `
                        <div class="emergency-content">
                            <h4>🚨 Notfall?</h4>
                            <p>Bei Sicherheitsnotfällen erreichen Sie uns 24/7 unter:</p>
                            <a href="tel:+4922165058801" class="emergency-phone">0221 6505 8801</a>
                        </div>
                    `;
                    
                    const contactInfo = document.querySelector('.kontakt-info');
                    if (contactInfo) {
                        contactInfo.appendChild(emergencyNotice);
                    }
                    
                } catch (error) {
                    console.log('Could not load additional contact info:', error);
                }
            };
            
            loadContactInfo();
        };
        
        // ===== Add Custom Styles =====
        const addCustomStyles = () => {
            const style = document.createElement('style');
            style.textContent = `
                .form-error {
                    color: var(--primary-red);
                    font-size: 0.75rem;
                    margin-top: 0.25rem;
                    display: block;
                    animation: fadeIn 0.3s ease-out;
                }
                
                .wpcf7 input.invalid,
                .wpcf7 textarea.invalid {
                    border-color: var(--primary-red);
                    box-shadow: 0 0 0 3px rgba(227,6,19,0.1);
                }
                
                .emergency-notice {
                    background: linear-gradient(135deg, #fee2e2, #fecaca);
                    border: 1px solid #f87171;
                    border-radius: 8px;
                    padding: 1.5rem;
                    margin-top: 2rem;
                    text-align: center;
                }
                
                .emergency-content h4 {
                    margin: 0 0 0.5rem;
                    color: #dc2626;
                }
                
                .emergency-content p {
                    margin: 0 0 1rem;
                    color: #7f1d1d;
                }
                
                .emergency-phone {
                    display: inline-block;
                    padding: 0.75rem 1.5rem;
                    background: #dc2626;
                    color: white;
                    text-decoration: none;
                    border-radius: 6px;
                    font-weight: 600;
                    transition: all 0.3s ease;
                }
                
                .emergency-phone:hover {
                    background: #b91c1c;
                    transform: translateY(-2px);
                }
                
                .file-preview {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 0.5rem;
                    padding: 0.75rem;
                    background: #f3f4f6;
                    border-radius: 6px;
                    border: 1px solid #e5e7eb;
                }
                
                .file-info {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    flex: 1;
                }
                
                .file-icon {
                    font-size: 1.5rem;
                }
                
                .file-details strong {
                    display: block;
                    font-size: 0.875rem;
                    color: #374151;
                }
                
                .file-size {
                    font-size: 0.75rem;
                    color: #6b7280;
                }
                
                .remove-file {
                    background: #ef4444;
                    color: white;
                    border: none;
                    width: 24px;
                    height: 24px;
                    border-radius: 50%;
                    cursor: pointer;
                    font-size: 1rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                .status.open {
                    color: #059669;
                    font-weight: 600;
                }
                
                .status.closed {
                    color: #dc2626;
                    font-weight: 600;
                }
                
                .map-wrapper {
                    transition: transform 0.3s ease;
                }
                
                .icon-wrapper {
                    transition: transform 0.3s ease;
                }
                
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(-10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);
        };
        
        // ===== Initialize Everything =====
        const init = () => {
            addCustomStyles();
            initFormSteps();
            initFormFieldEnhancements();
            initCharacterCounter();
            initFileUpload();
            initFormValidation();
            initFormSubmission();
            initContactMethods();
            initMapEnhancements();
            initSmoothScroll();
            initScrollAnimations();
            initContactMethodHovers();
            initBusinessHours();
            initDynamicContent();
        };
        
        // Start initialization
        init();
        
        // Reinitialize on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                initScrollAnimations();
                initMapEnhancements();
            }, 250);
        });
    });
})();