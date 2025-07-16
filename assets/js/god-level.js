/**
 * God-Level Professional Animations & Interactions
 * Safe Cologne Theme - Premium JavaScript
 * Version: 2.0.0
 */

(function() {
    'use strict';

    // ============================================
    // PREMIUM SCROLL ANIMATIONS
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                // Add staggered animation for grid items
                if (entry.target.classList.contains('features-grid') || 
                    entry.target.classList.contains('services-grid') || 
                    entry.target.classList.contains('stats-grid')) {
                    animateGridItems(entry.target);
                }
            }
        });
    }, observerOptions);

    function animateGridItems(grid) {
        const items = grid.querySelectorAll('.feature-card, .service-card, .stat-card');
        items.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('animate-in');
            }, index * 150);
        });
    }

    // ============================================
    // PREMIUM COUNTER ANIMATIONS
    // ============================================
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent);
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += step;
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Start animation when element is visible
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        counterObserver.unobserve(entry.target);
                    }
                });
            });
            
            counterObserver.observe(counter);
        });
    }

    // ============================================
    // PREMIUM PARALLAX EFFECTS
    // ============================================
    function initParallax() {
        const parallaxElements = document.querySelectorAll('.hero-section, .services-preview, .cta-section');
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const rate = scrolled * -0.5;
                element.style.transform = `translateY(${rate}px)`;
            });
        });
    }

    // ============================================
    // PREMIUM SMOOTH SCROLL
    // ============================================
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const target = document.querySelector(link.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // ============================================
    // PREMIUM HEADER SCROLL EFFECTS
    // ============================================
    function initHeaderEffects() {
        const header = document.querySelector('.sc-header');
        let lastScrollY = 0;
        
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            
            if (scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Hide header on scroll down, show on scroll up
            if (scrollY > lastScrollY && scrollY > 200) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            lastScrollY = scrollY;
        });
    }

    // ============================================
    // PREMIUM FORM ENHANCEMENTS
    // ============================================
    function initFormEnhancements() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(input => {
                // Add floating label effect
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', () => {
                    if (!input.value) {
                        input.parentElement.classList.remove('focused');
                    }
                });
                
                // Add ripple effect
                input.addEventListener('click', (e) => {
                    createRipple(e, input);
                });
            });
        });
    }

    function createRipple(e, element) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');
        
        element.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    // ============================================
    // PREMIUM CURSOR EFFECTS
    // ============================================
    function initCursorEffects() {
        const cursor = document.createElement('div');
        cursor.classList.add('custom-cursor');
        document.body.appendChild(cursor);
        
        const cursorDot = document.createElement('div');
        cursorDot.classList.add('cursor-dot');
        document.body.appendChild(cursorDot);
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            setTimeout(() => {
                cursorDot.style.left = e.clientX + 'px';
                cursorDot.style.top = e.clientY + 'px';
            }, 50);
        });
        
        // Add hover effects
        const hoverElements = document.querySelectorAll('a, button, .feature-card, .service-card');
        hoverElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                cursor.classList.add('cursor-hover');
            });
            
            element.addEventListener('mouseleave', () => {
                cursor.classList.remove('cursor-hover');
            });
        });
    }

    // ============================================
    // PREMIUM LOADING ANIMATIONS
    // ============================================
    function initLoadingAnimations() {
        // Add loading class to body initially
        document.body.classList.add('loading');
        
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.body.classList.remove('loading');
                document.body.classList.add('loaded');
                
                // Animate elements on page load
                const animateElements = document.querySelectorAll('.hero-title, .hero-subtitle, .hero-cta');
                animateElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.classList.add('animate-in');
                    }, index * 200);
                });
            }, 500);
        });
    }

    // ============================================
    // PREMIUM CONTACT FORM AJAX
    // ============================================
    function initContactForm() {
        const form = document.getElementById('contact-form');
        if (!form) return;
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');
            const statusDiv = form.querySelector('.form-status');
            
            // Add loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Wird gesendet...';
            
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    statusDiv.innerHTML = '<div class="success-message"><i class="fas fa-check-circle"></i> Nachricht erfolgreich gesendet!</div>';
                    form.reset();
                } else {
                    statusDiv.innerHTML = '<div class="error-message"><i class="fas fa-exclamation-triangle"></i> Fehler beim Senden. Bitte versuchen Sie es erneut.</div>';
                }
                
                statusDiv.style.display = 'block';
                
            } catch (error) {
                statusDiv.innerHTML = '<div class="error-message"><i class="fas fa-exclamation-triangle"></i> Fehler beim Senden. Bitte versuchen Sie es erneut.</div>';
                statusDiv.style.display = 'block';
            }
            
            // Reset button
            submitButton.disabled = false;
            submitButton.innerHTML = 'Nachricht senden <i class="fas fa-arrow-right"></i>';
        });
    }

    // ============================================
    // PREMIUM MOBILE MENU
    // ============================================
    function initMobileMenu() {
        const menuToggle = document.createElement('button');
        menuToggle.classList.add('mobile-menu-toggle');
        menuToggle.innerHTML = '<span></span><span></span><span></span>';
        
        const nav = document.querySelector('.sc-nav-section');
        if (nav) {
            nav.appendChild(menuToggle);
            
            menuToggle.addEventListener('click', () => {
                nav.classList.toggle('mobile-menu-open');
                menuToggle.classList.toggle('active');
            });
        }
    }

    // ============================================
    // INITIALIZE ALL FEATURES
    // ============================================
    function init() {
        // Initialize basic animations
        const animatedElements = document.querySelectorAll('.features-grid, .services-grid, .stats-grid, .feature-card, .service-card, .stat-card');
        animatedElements.forEach(element => {
            observer.observe(element);
        });
        
        // Initialize all premium features
        animateCounters();
        initParallax();
        initSmoothScroll();
        initHeaderEffects();
        initFormEnhancements();
        initCursorEffects();
        initLoadingAnimations();
        initContactForm();
        initMobileMenu();
        
        // Add CSS animations
        addAnimationStyles();
    }

    // ============================================
    // ADD ANIMATION STYLES
    // ============================================
    function addAnimationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            /* Premium Animation Styles */
            .animate-in {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
            
            .feature-card, .service-card, .stat-card {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }
            
            .hero-title, .hero-subtitle, .hero-cta {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }
            
            .loading .hero-title, .loading .hero-subtitle, .loading .hero-cta {
                opacity: 0;
                transform: translateY(30px);
            }
            
            .sc-header {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .sc-header.scrolled {
                background: rgba(255,255,255,0.98);
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            }
            
            .sc-header.header-hidden {
                transform: translateY(-100%);
            }
            
            .form-group {
                position: relative;
                overflow: hidden;
            }
            
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(227,6,19,0.3);
                transform: scale(0);
                animation: rippleAnimation 0.6s ease-out;
                pointer-events: none;
            }
            
            @keyframes rippleAnimation {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
            
            .custom-cursor {
                position: fixed;
                width: 20px;
                height: 20px;
                border: 2px solid #E30613;
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                transition: all 0.3s ease;
            }
            
            .cursor-dot {
                position: fixed;
                width: 4px;
                height: 4px;
                background: #E30613;
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                transition: all 0.1s ease;
            }
            
            .cursor-hover {
                transform: scale(1.5);
                background: rgba(227,6,19,0.1);
            }
            
            .mobile-menu-toggle {
                display: none;
                flex-direction: column;
                width: 30px;
                height: 24px;
                background: none;
                border: none;
                cursor: pointer;
                position: relative;
            }
            
            .mobile-menu-toggle span {
                width: 100%;
                height: 2px;
                background: #E30613;
                transition: all 0.3s ease;
            }
            
            .mobile-menu-toggle span:nth-child(2) {
                margin: 6px 0;
            }
            
            .mobile-menu-toggle.active span:nth-child(1) {
                transform: rotate(45deg) translate(6px, 6px);
            }
            
            .mobile-menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }
            
            .mobile-menu-toggle.active span:nth-child(3) {
                transform: rotate(-45deg) translate(6px, -6px);
            }
            
            .success-message {
                color: #28a745;
                background: rgba(40,167,69,0.1);
                padding: 1rem;
                border-radius: 8px;
                border: 1px solid #28a745;
            }
            
            .error-message {
                color: #dc3545;
                background: rgba(220,53,69,0.1);
                padding: 1rem;
                border-radius: 8px;
                border: 1px solid #dc3545;
            }
            
            @media (max-width: 768px) {
                .mobile-menu-toggle {
                    display: flex;
                }
                
                .sc-nav-menu {
                    position: fixed;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: white;
                    flex-direction: column;
                    padding: 2rem;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                    transform: translateY(-100%);
                    opacity: 0;
                    pointer-events: none;
                    transition: all 0.3s ease;
                }
                
                .mobile-menu-open .sc-nav-menu {
                    transform: translateY(0);
                    opacity: 1;
                    pointer-events: auto;
                }
                
                .custom-cursor, .cursor-dot {
                    display: none;
                }
            }
        `;
        
        document.head.appendChild(style);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();