/* Contact Page JavaScript */

(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // Contact form handling
        const initContactForm = () => {
            const form = document.querySelector('.contact-form');
            if (!form) return;
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate form
                if (!validateForm(this)) {
                    return;
                }
                
                // Show loading state
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Wird gesendet...';
                submitButton.disabled = true;
                
                // Simulate form submission (replace with actual AJAX call)
                setTimeout(() => {
                    showMessage('Vielen Dank für Ihre Nachricht! Wir werden uns in Kürze bei Ihnen melden.', 'success');
                    this.reset();
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }, 2000);
            });
        };
        
        // Form validation
        const validateForm = (form) => {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });
            
            return isValid;
        };
        
        // Individual field validation
        const validateField = (field) => {
            let isValid = true;
            const errorClass = 'error';
            
            // Remove existing error styling
            field.classList.remove(errorClass);
            
            // Check if field is required and empty
            if (field.hasAttribute('required') && !field.value.trim()) {
                isValid = false;
            }
            
            // Email validation
            if (field.type === 'email' && field.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                    isValid = false;
                }
            }
            
            // Phone validation
            if (field.type === 'tel' && field.value) {
                const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                if (!phoneRegex.test(field.value)) {
                    isValid = false;
                }
            }
            
            // Apply error styling
            if (!isValid) {
                field.classList.add(errorClass);
                field.style.borderColor = '#dc3545';
            } else {
                field.style.borderColor = '#28a745';
            }
            
            return isValid;
        };
        
        // Real-time validation
        const initRealTimeValidation = () => {
            const form = document.querySelector('.contact-form');
            if (!form) return;
            
            const inputs = form.querySelectorAll('input, textarea');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateField(this);
                    }
                });
            });
        };
        
        // Show messages
        const showMessage = (text, type) => {
            const messageDiv = document.createElement('div');
            messageDiv.className = `${type}-message`;
            messageDiv.textContent = text;
            messageDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 1rem 1.5rem;
                border-radius: 6px;
                font-weight: 500;
                z-index: 1000;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                animation: slideIn 0.3s ease-out;
            `;
            
            if (type === 'error') {
                messageDiv.style.background = '#f8d7da';
                messageDiv.style.color = '#721c24';
                messageDiv.style.border = '1px solid #f5c6cb';
            } else {
                messageDiv.style.background = '#d4edda';
                messageDiv.style.color = '#155724';
                messageDiv.style.border = '1px solid #c3e6cb';
            }
            
            document.body.appendChild(messageDiv);
            
            setTimeout(() => {
                messageDiv.style.animation = 'slideOut 0.3s ease-in';
                setTimeout(() => {
                    messageDiv.remove();
                }, 300);
            }, 5000);
        };
        
        // Phone number formatting
        const initPhoneFormatting = () => {
            const phoneInput = document.querySelector('input[type="tel"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 4) {
                            value = value;
                        } else if (value.length <= 8) {
                            value = value.slice(0, 4) + ' ' + value.slice(4);
                        } else {
                            value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12);
                        }
                    }
                    e.target.value = value;
                });
            }
        };
        
        // Contact info cards animation
        const initContactInfoAnimations = () => {
            const contactCards = document.querySelectorAll('.contact-info-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            contactCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        };
        
        // Certification cards animation
        const initCertificationAnimations = () => {
            const certificationCards = document.querySelectorAll('.certification-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'scale(1)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            certificationCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.8)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        };
        
        // Click-to-call and email functionality
        const initClickToContact = () => {
            const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
            const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
            
            phoneLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Track phone clicks
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'phone_call', {
                            'event_category': 'contact',
                            'event_label': this.href
                        });
                    }
                });
            });
            
            emailLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Track email clicks
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'email_click', {
                            'event_category': 'contact',
                            'event_label': this.href
                        });
                    }
                });
            });
        };
        
        // Map initialization (placeholder)
        const initMap = () => {
            const mapContainer = document.querySelector('.map-container');
            if (mapContainer) {
                const mapPlaceholder = document.createElement('div');
                mapPlaceholder.className = 'map-placeholder';
                mapPlaceholder.innerHTML = `
                    <div style="text-align: center;">
                        <i class="fas fa-map-marker-alt" style="font-size: 3rem; color: var(--primary-gold); margin-bottom: 1rem;"></i>
                        <p>August-Borsig-Straße 8<br>50126 Bergheim</p>
                        <p><small>Karte wird geladen...</small></p>
                    </div>
                `;
                mapContainer.appendChild(mapPlaceholder);
                
                // Here you would initialize Google Maps or another map service
                // For demo purposes, we'll show a placeholder
            }
        };
        
        // Add CSS animations
        const addCSS = () => {
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                
                @keyframes slideOut {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
                
                .contact-form input.error,
                .contact-form textarea.error {
                    animation: shake 0.5s ease-in-out;
                }
                
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }
            `;
            document.head.appendChild(style);
        };
        
        // Initialize all functionality
        addCSS();
        initContactForm();
        initRealTimeValidation();
        initPhoneFormatting();
        initContactInfoAnimations();
        initCertificationAnimations();
        initClickToContact();
        initMap();
        
    });
    
})();