/**
 * Homepage JavaScript - Safe Cologne
 * Version: 2.0.0
 * 
 * Interactive functionality for the homepage template
 */

(function($) {
    'use strict';
    
    // Wait for DOM ready
    $(document).ready(function() {
        
        // Initialize all homepage functionality
        initCounterAnimation();
        initScrollAnimations();
        initSmoothScrolling();
        initHeroParallax();
        initServiceCards();
        
        // Performance optimization
        lazyLoadImages();
        preloadCriticalAssets();
    });
    
    /**
     * Animated Counter for Statistics
     */
    function initCounterAnimation() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        const animateCounter = (counter) => {
            const target = parseFloat(counter.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const updateCounter = () => {
                current += increment;
                
                if (current < target) {
                    // Format number based on target
                    if (target >= 100) {
                        counter.textContent = Math.floor(current);
                    } else {
                        counter.textContent = current.toFixed(1);
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    // Final value
                    if (target >= 100) {
                        counter.textContent = Math.floor(target);
                    } else {
                        counter.textContent = target.toFixed(1);
                    }
                }
            };
            
            updateCounter();
        };
        
        // Intersection Observer for triggering animations
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    animateCounter(entry.target);
                }
            });
        }, {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
    
    /**
     * Scroll-triggered animations
     */
    function initScrollAnimations() {
        // Elements to animate
        const animateElements = document.querySelectorAll('.service-card, .why-card, .stat-item');
        
        // Intersection Observer for scroll animations
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
     * Smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                
                if (target) {
                    const headerHeight = 80; // Adjust based on header height
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Track scroll event
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'scroll_to_section', {
                            'section_name': this.getAttribute('href').substring(1)
                        });
                    }
                }
            });
        });
        
        // Hero scroll indicator
        const heroScroll = document.querySelector('.hero-scroll');
        if (heroScroll) {
            heroScroll.addEventListener('click', function() {
                const nextSection = document.querySelector('.company-intro');
                if (nextSection) {
                    nextSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }
    }
    
    /**
     * Parallax effect for hero section
     */
    function initHeroParallax() {
        const hero = document.querySelector('.hero-section');
        const heroImage = document.querySelector('.hero-bg-image');
        
        if (!hero || !heroImage) return;
        
        let ticking = false;
        
        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            heroImage.style.transform = `translateY(${rate}px)`;
            ticking = false;
        };
        
        const requestParallax = () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        };
        
        // Only enable parallax on larger screens for performance
        if (window.innerWidth > 768) {
            window.addEventListener('scroll', requestParallax);
        }
    }
    
    /**
     * Service card interactions
     */
    function initServiceCards() {
        const serviceCards = document.querySelectorAll('.service-card');
        
        serviceCards.forEach(card => {
            // Track card interactions
            card.addEventListener('mouseenter', function() {
                const serviceTitle = this.querySelector('.service-title')?.textContent;
                
                // Analytics tracking
                if (typeof gtag !== 'undefined' && serviceTitle) {
                    gtag('event', 'service_card_hover', {
                        'service_name': serviceTitle,
                        'event_category': 'engagement'
                    });
                }
            });
            
            // Track clicks on service links
            const serviceLink = card.querySelector('.service-link');
            if (serviceLink) {
                serviceLink.addEventListener('click', function() {
                    const serviceTitle = card.querySelector('.service-title')?.textContent;
                    
                    if (typeof gtag !== 'undefined' && serviceTitle) {
                        gtag('event', 'service_link_click', {
                            'service_name': serviceTitle,
                            'event_category': 'conversion'
                        });
                    }
                });
            }
        });
    }
    
    /**
     * Lazy loading for images
     */
    function lazyLoadImages() {
        const images = document.querySelectorAll('img[loading="lazy"]');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            images.forEach(img => {
                imageObserver.observe(img);
            });
        }
    }
    
    /**
     * Preload critical assets
     */
    function preloadCriticalAssets() {
        const criticalImages = [
            // Add paths to critical images that should be preloaded
        ];
        
        criticalImages.forEach(src => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = src;
            document.head.appendChild(link);
        });
    }
    
    /**
     * CTA Button tracking
     */
    $(document).on('click', '.btn', function() {
        const buttonText = $(this).text().trim();
        const buttonType = $(this).hasClass('btn-primary') ? 'primary' : 'secondary';
        
        // Track button clicks
        if (typeof gtag !== 'undefined') {
            gtag('event', 'cta_click', {
                'button_text': buttonText,
                'button_type': buttonType,
                'page_location': window.location.pathname
            });
        }
    });
    
    /**
     * Phone number clicks tracking
     */
    $(document).on('click', 'a[href^="tel:"]', function() {
        const phoneNumber = $(this).attr('href').replace('tel:', '');
        
        if (typeof gtag !== 'undefined') {
            gtag('event', 'phone_click', {
                'phone_number': phoneNumber,
                'event_category': 'conversion'
            });
        }
    });
    
    /**
     * Scroll depth tracking
     */
    let scrollDepthMarks = {
        25: false,
        50: false,
        75: false,
        100: false
    };
    
    $(window).on('scroll', function() {
        const scrollTop = $(window).scrollTop();
        const docHeight = $(document).height() - $(window).height();
        const scrollPercent = Math.round(scrollTop / docHeight * 100);
        
        // Track scroll depth milestones
        Object.keys(scrollDepthMarks).forEach(mark => {
            if (scrollPercent >= mark && !scrollDepthMarks[mark]) {
                scrollDepthMarks[mark] = true;
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'scroll_depth', {
                        'percent_scrolled': mark,
                        'event_category': 'engagement'
                    });
                }
            }
        });
    });
    
    /**
     * Page performance tracking
     */
    window.addEventListener('load', function() {
        // Track page load time
        setTimeout(function() {
            const perfData = performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'page_load_time', {
                    'value': pageLoadTime,
                    'event_category': 'performance'
                });
            }
        }, 0);
    });
    
    /**
     * Error handling
     */
    window.addEventListener('error', function(e) {
        console.error('Homepage error:', e.error);
        
        if (typeof gtag !== 'undefined') {
            gtag('event', 'javascript_error', {
                'error_message': e.message,
                'event_category': 'error'
            });
        }
    });
    
    /**
     * Responsive breakpoint detection
     */
    const checkBreakpoint = () => {
        const width = window.innerWidth;
        let breakpoint = 'mobile';
        
        if (width >= 1024) breakpoint = 'desktop';
        else if (width >= 768) breakpoint = 'tablet';
        
        document.body.setAttribute('data-breakpoint', breakpoint);
    };
    
    // Initial check
    checkBreakpoint();
    
    // Update on resize
    let resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(checkBreakpoint, 250);
    });
    
})(jQuery);