/**
 * Services Page JavaScript
 * Enhanced functionality for the services page
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Service Filtering =====
        const initServiceFiltering = () => {
            const filterBtns = document.querySelectorAll('.nav-item');
            const serviceCards = document.querySelectorAll('.service-card');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.dataset.service;
                    
                    // Update active state
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter services
                    serviceCards.forEach(card => {
                        const category = card.dataset.category;
                        
                        if (filter === 'all' || category === filter) {
                            card.style.display = 'block';
                            card.style.animation = 'fadeInUp 0.5s ease-out';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    
                    // Update URL without reload
                    const url = new URL(window.location);
                    url.searchParams.set('filter', filter);
                    window.history.pushState({}, '', url);
                    
                    // Track filtering
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'service_filter', {
                            'filter_category': filter,
                            'event_category': 'engagement',
                            'event_label': 'services_page'
                        });
                    }
                });
            });
            
            // Check URL for initial filter
            const urlParams = new URLSearchParams(window.location.search);
            const initialFilter = urlParams.get('filter');
            if (initialFilter) {
                const targetBtn = document.querySelector(`[data-service="${initialFilter}"]`);
                if (targetBtn) {
                    targetBtn.click();
                }
            }
        };
        
        // ===== Service Card Enhancements =====
        const initServiceCards = () => {
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                // Add intersection observer for view tracking
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const serviceTitle = entry.target.querySelector('.service-title')?.textContent;
                            
                            // Track service view
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'service_view', {
                                    'service_name': serviceTitle,
                                    'event_category': 'engagement',
                                    'event_label': 'services_page'
                                });
                            }
                            
                            // Add animation
                            entry.target.style.animation = 'fadeInUp 0.6s ease-out';
                            
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                
                observer.observe(card);
                
                // Enhanced hover effects
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                    
                    const image = this.querySelector('.service-image img');
                    if (image) {
                        image.style.transform = 'scale(1.05)';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    
                    const image = this.querySelector('.service-image img');
                    if (image) {
                        image.style.transform = 'scale(1)';
                    }
                });
                
                // CTA click tracking
                const cta = card.querySelector('.service-cta');
                if (cta) {
                    cta.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        const serviceTitle = card.querySelector('.service-title')?.textContent;
                        
                        // Track CTA click
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'service_cta_click', {
                                'service_name': serviceTitle,
                                'event_category': 'conversion',
                                'event_label': 'services_page'
                            });
                        }
                        
                        // Scroll to contact form
                        const contactSection = document.querySelector('#contact');
                        if (contactSection) {
                            contactSection.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                }
            });
        };
        
        // ===== Quick Contact Form =====
        const initQuickContactForm = () => {
            const form = document.querySelector('.quick-contact-form');
            if (!form) return;
            
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('.submit-btn');
                const originalText = submitBtn.innerHTML;
                
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Wird gesendet...</span>';
                
                try {
                    const formData = new FormData(this);
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        // Show success message
                        this.innerHTML = `
                            <div class="form-success">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <h3>Vielen Dank für Ihre Anfrage!</h3>
                                <p>Wir melden uns innerhalb von 24 Stunden bei Ihnen.</p>
                            </div>
                        `;
                        
                        // Track conversion
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'form_submission', {
                                'form_name': 'quick_contact',
                                'event_category': 'conversion',
                                'event_label': 'services_page'
                            });
                        }
                        
                        // Optional: Show confetti
                        if (typeof confetti !== 'undefined') {
                            confetti({
                                particleCount: 100,
                                spread: 70,
                                origin: { y: 0.6 }
                            });
                        }
                        
                    } else {
                        throw new Error(result.message || 'Fehler beim Senden');
                    }
                } catch (error) {
                    // Show error state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                    
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'form-error';
                    errorDiv.innerHTML = `
                        <p>Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut oder rufen Sie uns direkt an: <a href="tel:+4922165058801">0221 6505 8801</a></p>
                    `;
                    
                    this.appendChild(errorDiv);
                    
                    setTimeout(() => {
                        errorDiv.remove();
                    }, 5000);
                }
            });
            
            // Enhanced form field interactions
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                    if (this.value) {
                        this.parentElement.classList.add('filled');
                    } else {
                        this.parentElement.classList.remove('filled');
                    }
                });
            });
            
            // Phone number formatting
            const phoneInput = form.querySelector('input[type="tel"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function() {
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
            }
        };
        
        // ===== Emergency Button =====
        const initEmergencyButton = () => {
            const emergencyFloat = document.querySelector('.emergency-float');
            if (!emergencyFloat) return;
            
            // Show/hide based on scroll position
            const toggleEmergencyButton = () => {
                const scrollY = window.scrollY;
                const threshold = 500;
                
                if (scrollY > threshold) {
                    emergencyFloat.classList.add('show');
                } else {
                    emergencyFloat.classList.remove('show');
                }
            };
            
            window.addEventListener('scroll', toggleEmergencyButton);
            
            // Track emergency button clicks
            const emergencyBtn = emergencyFloat.querySelector('.emergency-btn');
            if (emergencyBtn) {
                emergencyBtn.addEventListener('click', function() {
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'emergency_click', {
                            'event_category': 'contact',
                            'event_label': 'services_page'
                        });
                    }
                });
            }
        };
        
        // ===== Service Recommendations =====
        const initServiceRecommendations = () => {
            const viewedServices = new Set();
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const category = this.dataset.category;
                    viewedServices.add(category);
                    
                    // Show recommendation after viewing 3 different services
                    if (viewedServices.size >= 3) {
                        showPersonalizedRecommendation();
                    }
                });
            });
            
            const showPersonalizedRecommendation = () => {
                if (document.querySelector('.recommendation-popup')) return;
                
                const popup = document.createElement('div');
                popup.className = 'recommendation-popup';
                popup.innerHTML = `
                    <div class="recommendation-content">
                        <button class="recommendation-close">&times;</button>
                        <h4>Persönliche Beratung gewünscht?</h4>
                        <p>Basierend auf Ihrem Interesse können wir Ihnen ein maßgeschneidertes Sicherheitskonzept erstellen.</p>
                        <div class="recommendation-actions">
                            <button class="recommendation-call">Jetzt anrufen</button>
                            <button class="recommendation-contact">Kontakt aufnehmen</button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(popup);
                
                // Add styles
                const style = document.createElement('style');
                style.textContent = `
                    .recommendation-popup {
                        position: fixed;
                        bottom: 2rem;
                        right: 2rem;
                        background: white;
                        border-radius: 12px;
                        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                        padding: 1.5rem;
                        max-width: 300px;
                        z-index: 1000;
                        animation: slideInRight 0.5s ease-out;
                        border: 1px solid #e5e7eb;
                    }
                    
                    @keyframes slideInRight {
                        from { transform: translateX(100%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                    
                    .recommendation-close {
                        position: absolute;
                        top: 0.5rem;
                        right: 0.5rem;
                        background: none;
                        border: none;
                        font-size: 1.5rem;
                        cursor: pointer;
                        color: #9ca3af;
                    }
                    
                    .recommendation-content h4 {
                        margin: 0 0 0.5rem;
                        color: #1f2937;
                    }
                    
                    .recommendation-content p {
                        margin: 0 0 1rem;
                        color: #6b7280;
                        font-size: 0.875rem;
                    }
                    
                    .recommendation-actions {
                        display: flex;
                        gap: 0.5rem;
                        flex-direction: column;
                    }
                    
                    .recommendation-call,
                    .recommendation-contact {
                        padding: 0.5rem 1rem;
                        border-radius: 6px;
                        border: none;
                        font-weight: 500;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }
                    
                    .recommendation-call {
                        background: #e30613;
                        color: white;
                    }
                    
                    .recommendation-contact {
                        background: #f3f4f6;
                        color: #374151;
                    }
                `;
                document.head.appendChild(style);
                
                // Handle close
                popup.querySelector('.recommendation-close').addEventListener('click', () => {
                    popup.remove();
                });
                
                // Handle call
                popup.querySelector('.recommendation-call').addEventListener('click', () => {
                    window.location.href = 'tel:+4922165058801';
                    popup.remove();
                });
                
                // Handle contact
                popup.querySelector('.recommendation-contact').addEventListener('click', () => {
                    document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
                    popup.remove();
                });
                
                // Auto-remove after 10 seconds
                setTimeout(() => {
                    if (popup.parentNode) {
                        popup.remove();
                    }
                }, 10000);
            };
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
        
        // ===== Trust Indicators Animation =====
        const initTrustIndicators = () => {
            const trustItems = document.querySelectorAll('.trust-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 200);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            trustItems.forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(30px)';
                item.style.transition = 'all 0.6s ease-out';
                observer.observe(item);
            });
        };
        
        // ===== Exit Intent =====
        const initExitIntent = () => {
            let shown = false;
            
            document.addEventListener('mouseleave', function(e) {
                if (e.clientY <= 0 && !shown && window.innerWidth > 768) {
                    shown = true;
                    showExitPopup();
                }
            });
            
            const showExitPopup = () => {
                const popup = document.createElement('div');
                popup.className = 'exit-popup';
                popup.innerHTML = `
                    <div class="exit-overlay"></div>
                    <div class="exit-content">
                        <button class="exit-close">&times;</button>
                        <h2>Warten Sie!</h2>
                        <p>Sichern Sie sich jetzt Ihr kostenloses Sicherheitsaudit im Wert von 500€</p>
                        <div class="exit-actions">
                            <button class="exit-call">Jetzt anrufen</button>
                            <button class="exit-email">E-Mail senden</button>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(popup);
                
                // Add styles
                const style = document.createElement('style');
                style.textContent = `
                    .exit-popup {
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 9999;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        animation: fadeIn 0.3s ease-out;
                    }
                    
                    .exit-overlay {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: rgba(0,0,0,0.7);
                        cursor: pointer;
                    }
                    
                    .exit-content {
                        position: relative;
                        background: white;
                        padding: 3rem;
                        border-radius: 16px;
                        max-width: 500px;
                        width: 90%;
                        text-align: center;
                        box-shadow: 0 25px 50px rgba(0,0,0,0.25);
                    }
                    
                    .exit-close {
                        position: absolute;
                        top: 1rem;
                        right: 1rem;
                        background: none;
                        border: none;
                        font-size: 2rem;
                        cursor: pointer;
                        color: #9ca3af;
                    }
                    
                    .exit-actions {
                        display: flex;
                        gap: 1rem;
                        margin-top: 2rem;
                        justify-content: center;
                    }
                    
                    .exit-call,
                    .exit-email {
                        padding: 0.875rem 2rem;
                        border: none;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }
                    
                    .exit-call {
                        background: #e30613;
                        color: white;
                    }
                    
                    .exit-email {
                        background: #f3f4f6;
                        color: #374151;
                    }
                `;
                document.head.appendChild(style);
                
                // Handle close
                popup.querySelector('.exit-close').addEventListener('click', () => {
                    popup.remove();
                });
                
                popup.querySelector('.exit-overlay').addEventListener('click', () => {
                    popup.remove();
                });
                
                // Handle actions
                popup.querySelector('.exit-call').addEventListener('click', () => {
                    window.location.href = 'tel:+4922165058801';
                    popup.remove();
                });
                
                popup.querySelector('.exit-email').addEventListener('click', () => {
                    window.location.href = 'mailto:info@safecologne.de';
                    popup.remove();
                });
            };
        };
        
        // ===== Initialize Everything =====
        const init = () => {
            initServiceFiltering();
            initServiceCards();
            initQuickContactForm();
            initEmergencyButton();
            initServiceRecommendations();
            initSmoothScroll();
            initTrustIndicators();
            initExitIntent();
        };
        
        // Start initialization
        init();
        
        // Reinitialize on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                initServiceCards();
                initTrustIndicators();
            }, 250);
        });
    });
})();