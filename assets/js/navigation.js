/**
 * Navigation JavaScript
 */

(function() {
    'use strict';

    // Mobile Navigation Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu, #primary-menu');
    const body = document.body;

    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function() {
            const isActive = navMenu.classList.contains('active');
            
            // Toggle classes
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            body.classList.toggle('menu-open');
            
            // Update ARIA attributes
            this.setAttribute('aria-expanded', !isActive);
            
            // Prevent body scroll when menu is open
            if (!isActive) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileToggle.contains(e.target) && !navMenu.contains(e.target)) {
                mobileToggle.classList.remove('active');
                navMenu.classList.remove('active');
                body.classList.remove('menu-open');
                body.style.overflow = '';
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menu when clicking on a link
        const menuLinks = navMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileToggle.classList.remove('active');
                navMenu.classList.remove('active');
                body.classList.remove('menu-open');
                body.style.overflow = '';
                mobileToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    const scrollThreshold = 50;

    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add/remove scrolled class
        if (scrollTop > scrollThreshold) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        // Hide/show navbar on scroll
        if (scrollTop > lastScrollTop && scrollTop > navbar.offsetHeight) {
            // Scrolling down
            navbar.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling up
            navbar.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    }

    // Throttle scroll event
    let ticking = false;
    function requestTick() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                handleScroll();
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);

    // Dropdown Menu Support
    const dropdownItems = document.querySelectorAll('.menu-item-has-children');
    
    dropdownItems.forEach(item => {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.sub-menu');
        
        if (link && submenu) {
            // For touch devices
            link.addEventListener('touchstart', function(e) {
                if (!item.classList.contains('open')) {
                    e.preventDefault();
                    
                    // Close other dropdowns
                    dropdownItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('open');
                        }
                    });
                    
                    item.classList.add('open');
                }
            });
            
            // For desktop hover
            item.addEventListener('mouseenter', function() {
                this.classList.add('hover');
            });
            
            item.addEventListener('mouseleave', function() {
                this.classList.remove('hover');
            });
        }
    });

    // Active Menu Item
    function setActiveMenuItem() {
        const currentLocation = location.pathname;
        const menuItems = document.querySelectorAll('.nav-menu a, #primary-menu a');
        
        menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (href && (currentLocation === href || currentLocation.includes(href))) {
                item.classList.add('active');
                
                // Also mark parent items as active
                let parent = item.parentElement;
                while (parent) {
                    if (parent.classList.contains('menu-item')) {
                        parent.classList.add('current-menu-ancestor');
                    }
                    parent = parent.parentElement;
                }
            }
        });
    }

    setActiveMenuItem();

    // Smooth Scroll for Anchor Links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href !== '#0') {
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const offsetTop = target.getBoundingClientRect().top + window.pageYOffset - navbar.offsetHeight - 20;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    // Update URL
                    history.pushState(null, null, href);
                }
            }
        });
    });

    // Accessibility: Keyboard Navigation
    const focusableElements = 'a[href], button, input, select, textarea, [tabindex]:not([tabindex="-1"])';
    const modal = document.querySelector('.nav-menu, #primary-menu');
    
    if (modal) {
        const focusableContent = modal.querySelectorAll(focusableElements);
        const firstFocusableElement = focusableContent[0];
        const lastFocusableElement = focusableContent[focusableContent.length - 1];
        
        document.addEventListener('keydown', function(e) {
            if (body.classList.contains('menu-open')) {
                let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
                
                if (!isTabPressed) {
                    return;
                }
                
                if (e.shiftKey) {
                    if (document.activeElement === firstFocusableElement) {
                        lastFocusableElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastFocusableElement) {
                        firstFocusableElement.focus();
                        e.preventDefault();
                    }
                }
            }
            
            // Close menu on Escape
            if (e.key === 'Escape' && body.classList.contains('menu-open')) {
                mobileToggle.click();
            }
        });
    }

})();
