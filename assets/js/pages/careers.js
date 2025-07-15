/**
 * Careers Page JavaScript
 * Enhanced functionality for the careers page
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Number Counter Animation =====
        const initNumberCounters = () => {
            const counters = document.querySelectorAll('.stat-number');
            const speed = 200;
            
            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-count') || counter.textContent);
                const increment = target / speed;
                let current = 0;
                
                const updateCount = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCount();
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => {
                observer.observe(counter);
            });
        };
        
        // ===== Position Filtering =====
        const initPositionFiltering = () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const positionCards = document.querySelectorAll('.position-card');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    // Update active state
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter positions
                    positionCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        
                        if (filter === 'all' || category === filter) {
                            card.style.display = 'block';
                            card.style.animation = 'fadeInUp 0.5s ease-out';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    
                    // Update URL
                    const url = new URL(window.location);
                    url.searchParams.set('filter', filter);
                    window.history.pushState({}, '', url);
                    
                    // Track filtering
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'position_filter', {
                            'filter_category': filter,
                            'event_category': 'careers',
                            'event_label': 'careers_page'
                        });
                    }
                });
            });
            
            // Check URL for initial filter
            const urlParams = new URLSearchParams(window.location.search);
            const initialFilter = urlParams.get('filter');
            if (initialFilter) {
                const targetBtn = document.querySelector(`[data-filter="${initialFilter}"]`);
                if (targetBtn) {
                    targetBtn.click();
                }
            }
        };
        
        // ===== Process Steps Animation =====
        const initProcessSteps = () => {
            const steps = document.querySelectorAll('.process-step');
            const form = document.querySelector('.wpcf7-form');
            
            if (!form) return;
            
            // Monitor form completion
            const updateSteps = () => {
                const inputs = form.querySelectorAll('input, select, textarea');
                const filledInputs = Array.from(inputs).filter(input => {
                    if (input.type === 'checkbox' || input.type === 'radio') {
                        return input.checked;
                    }
                    return input.value.trim() !== '';
                }).length;
                
                const totalInputs = inputs.length;
                const progress = Math.min(Math.floor((filledInputs / totalInputs) * 3), 3);
                
                steps.forEach((step, index) => {
                    if (index < progress) {
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
        
        // ===== Form Enhancement =====
        const initFormEnhancements = () => {
            const form = document.querySelector('.wpcf7-form');
            if (!form) return;
            
            // File upload preview
            const fileInput = form.querySelector('input[type="file"]');
            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    const filePreview = this.parentElement.querySelector('.file-preview');
                    if (filePreview) {
                        filePreview.remove();
                    }
                    
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        const fileName = file.name;
                        const fileSize = (file.size / 1024 / 1024).toFixed(2);
                        
                        const preview = document.createElement('div');
                        preview.className = 'file-preview';
                        preview.innerHTML = `
                            <div class="file-info">
                                <span class="file-icon">📄</span>
                                <div class="file-details">
                                    <strong>${fileName}</strong>
                                    <span class="file-size">${fileSize} MB</span>
                                </div>
                            </div>
                            <button type="button" class="remove-file" onclick="this.parentElement.remove(); this.parentElement.parentElement.querySelector('input[type=file]').value = '';">&times;</button>
                        `;
                        
                        this.parentElement.appendChild(preview);
                    }
                });
            }
            
            // Enhanced form validation
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('invalid')) {
                        validateField(this);
                    }
                });
            });
            
            // Form submission handling
            form.addEventListener('wpcf7submit', function(event) {
                const steps = document.querySelectorAll('.process-step');
                steps.forEach(step => step.classList.add('active'));
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'application_submit', {
                        'event_category': 'careers',
                        'event_label': 'careers_page'
                    });
                }
            });
            
            // Success handling
            form.addEventListener('wpcf7mailsent', function(event) {
                // Show success animation
                const formCard = form.closest('.form-card');
                if (formCard) {
                    formCard.innerHTML = `
                        <div class="form-success-message">
                            <div class="success-icon">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <h3>Bewerbung erfolgreich gesendet!</h3>
                            <p>Vielen Dank für Ihr Interesse! Wir werden uns innerhalb von 48 Stunden bei Ihnen melden.</p>
                            <div class="success-actions">
                                <a href="/" class="btn btn-primary">Zur Startseite</a>
                                <a href="/karriere" class="btn btn-secondary">Weitere Stellen</a>
                            </div>
                        </div>
                    `;
                    
                    // Scroll to success message
                    setTimeout(() => {
                        formCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
                
                // Show confetti
                if (typeof confetti !== 'undefined') {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 }
                    });
                }
            });
            
            // Error handling
            form.addEventListener('wpcf7invalid', function(event) {
                const firstError = form.querySelector('.wpcf7-not-valid');
                if (firstError) {
                    setTimeout(() => {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }, 100);
                }
            });
        };
        
        // ===== Field Validation =====
        const validateField = (field) => {
            const value = field.value.trim();
            let isValid = true;
            let errorMessage = '';
            
            // Remove existing error
            const existingError = field.parentElement.querySelector('.field-error');
            if (existingError) {
                existingError.remove();
            }
            
            // Validate based on field type
            switch (field.type) {
                case 'email':
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (value && !emailRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
                    }
                    break;
                    
                case 'tel':
                    const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                    if (value && !phoneRegex.test(value)) {
                        isValid = false;
                        errorMessage = 'Bitte geben Sie eine gültige Telefonnummer ein.';
                    }
                    break;
                    
                case 'url':
                    if (value && !value.startsWith('http')) {
                        isValid = false;
                        errorMessage = 'Bitte geben Sie eine gültige URL ein (mit http:// oder https://).';
                    }
                    break;
            }
            
            // Check required fields
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'Dieses Feld ist erforderlich.';
            }
            
            // Update field state
            if (isValid) {
                field.classList.remove('invalid');
                field.classList.add('valid');
            } else {
                field.classList.remove('valid');
                field.classList.add('invalid');
                
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'field-error';
                errorDiv.textContent = errorMessage;
                field.parentElement.appendChild(errorDiv);
            }
            
            return isValid;
        };
        
        // ===== Position Cards Enhancement =====
        const initPositionCards = () => {
            const positionCards = document.querySelectorAll('.position-card');
            
            positionCards.forEach(card => {
                // Add intersection observer for animation
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease-out';
                observer.observe(card);
                
                // Enhanced hover effects
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 15px 30px rgba(0,0,0,0.15)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '';
                });
                
                // Track position interest
                const applyBtn = card.querySelector('.position-apply');
                if (applyBtn) {
                    applyBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        const positionTitle = card.querySelector('.position-title')?.textContent;
                        
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'position_interest', {
                                'position_title': positionTitle,
                                'event_category': 'careers',
                                'event_label': 'careers_page'
                            });
                        }
                        
                        // Scroll to application form
                        const applicationSection = document.querySelector('#bewerbung');
                        if (applicationSection) {
                            applicationSection.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                }
            });
        };
        
        // ===== Benefit Cards Animation =====
        const initBenefitCards = () => {
            const benefitCards = document.querySelectorAll('.benefit-card');
            
            benefitCards.forEach((card, index) => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.style.opacity = '1';
                                entry.target.style.transform = 'translateY(0)';
                            }, index * 200);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease-out';
                observer.observe(card);
                
                // Add hover effects
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    
                    const icon = this.querySelector('.benefit-icon');
                    if (icon) {
                        icon.style.transform = 'scale(1.1)';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    
                    const icon = this.querySelector('.benefit-icon');
                    if (icon) {
                        icon.style.transform = 'scale(1)';
                    }
                });
            });
        };
        
        // ===== CTA Button Enhancement =====
        const initCTAButtons = () => {
            const ctaButtons = document.querySelectorAll('.cta-button');
            
            ctaButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const buttonText = this.textContent.trim();
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'cta_click', {
                            'button_text': buttonText,
                            'event_category': 'careers',
                            'event_label': 'careers_page'
                        });
                    }
                });
            });
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
        
        // ===== Testimonial Slider =====
        const initTestimonialSlider = () => {
            const testimonials = document.querySelectorAll('.testimonial-item');
            let currentIndex = 0;
            
            if (testimonials.length <= 1) return;
            
            const showTestimonial = (index) => {
                testimonials.forEach((testimonial, i) => {
                    testimonial.style.opacity = i === index ? '1' : '0.7';
                    testimonial.style.transform = i === index ? 'scale(1)' : 'scale(0.95)';
                });
            };
            
            const nextTestimonial = () => {
                currentIndex = (currentIndex + 1) % testimonials.length;
                showTestimonial(currentIndex);
            };
            
            // Auto-advance testimonials
            setInterval(nextTestimonial, 5000);
            
            // Initial display
            showTestimonial(currentIndex);
        };
        
        // ===== Parallax Effect =====
        const initParallaxEffect = () => {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) return;
            
            let ticking = false;
            
            const updateParallax = () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                heroSection.style.transform = `translateY(${rate}px)`;
                ticking = false;
            };
            
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
        };
        
        // ===== Performance Monitoring =====
        const initPerformanceMonitoring = () => {
            // Monitor LCP (Largest Contentful Paint)
            if ('PerformanceObserver' in window) {
                const observer = new PerformanceObserver((list) => {
                    for (const entry of list.getEntries()) {
                        if (entry.entryType === 'largest-contentful-paint') {
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'lcp', {
                                    'event_category': 'performance',
                                    'event_label': 'careers_page',
                                    'value': Math.round(entry.startTime)
                                });
                            }
                        }
                    }
                });
                
                observer.observe({ entryTypes: ['largest-contentful-paint'] });
            }
            
            // Monitor page load time
            window.addEventListener('load', () => {
                if ('performance' in window) {
                    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'page_load_time', {
                            'event_category': 'performance',
                            'event_label': 'careers_page',
                            'value': Math.round(loadTime)
                        });
                    }
                }
            });
        };
        
        // ===== Add Custom Styles =====
        const addCustomStyles = () => {
            const style = document.createElement('style');
            style.textContent = `
                .field-error {
                    color: #dc2626;
                    font-size: 0.75rem;
                    margin-top: 0.25rem;
                    display: block;
                    animation: fadeIn 0.3s ease-out;
                }
                
                .form-card input.invalid,
                .form-card select.invalid,
                .form-card textarea.invalid {
                    border-color: #dc2626;
                    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
                }
                
                .form-card input.valid,
                .form-card select.valid,
                .form-card textarea.valid {
                    border-color: #059669;
                    box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
                }
                
                .file-preview {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 0.5rem;
                    padding: 0.75rem;
                    background: #f3f4f6;
                    border-radius: 8px;
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
                
                .form-success-message {
                    text-align: center;
                    padding: 3rem 2rem;
                    animation: fadeIn 0.5s ease-out;
                }
                
                .success-icon {
                    width: 64px;
                    height: 64px;
                    margin: 0 auto 1.5rem;
                    color: #059669;
                }
                
                .success-actions {
                    display: flex;
                    gap: 1rem;
                    justify-content: center;
                    margin-top: 2rem;
                    flex-wrap: wrap;
                }
                
                .btn {
                    display: inline-block;
                    padding: 0.75rem 1.5rem;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                }
                
                .btn-primary {
                    background: #e30613;
                    color: white;
                }
                
                .btn-secondary {
                    background: #f3f4f6;
                    color: #374151;
                }
                
                .benefit-icon {
                    transition: transform 0.3s ease;
                }
                
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(-10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(30px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                
                .position-card {
                    transition: all 0.3s ease;
                }
                
                .testimonial-item {
                    transition: all 0.5s ease;
                }
                
                /* Responsive adjustments */
                @media (max-width: 768px) {
                    .success-actions {
                        flex-direction: column;
                        align-items: center;
                    }
                    
                    .btn {
                        width: 100%;
                        max-width: 300px;
                        text-align: center;
                    }
                }
            `;
            document.head.appendChild(style);
        };
        
        // ===== Initialize Everything =====
        const init = () => {
            addCustomStyles();
            initNumberCounters();
            initPositionFiltering();
            initProcessSteps();
            initFormEnhancements();
            initPositionCards();
            initBenefitCards();
            initCTAButtons();
            initSmoothScroll();
            initTestimonialSlider();
            initParallaxEffect();
            initPerformanceMonitoring();
        };
        
        // Start initialization
        init();
        
        // Reinitialize on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                initPositionCards();
                initBenefitCards();
                initParallaxEffect();
            }, 250);
        });
    });
})();