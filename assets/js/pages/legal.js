/**
 * Legal Pages Specific JavaScript
 * Safe Cologne Theme - Legal Pages
 */

(function($) {
    'use strict';

    const SafeCologneLegal = {
        init() {
            this.bindEvents();
            this.initBackToTop();
            this.initTableOfContents();
            this.initSmoothScroll();
            this.initPrintFunctionality();
        },

        bindEvents() {
            // Table of contents links
            $('.legal-toc a').on('click', this.handleTOCClick);
            
            // Back to top button
            $('.back-to-top').on('click', this.scrollToTop);
            
            // Print functionality
            $(document).on('keydown', this.handleKeydown);
        },

        handleTOCClick(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        },

        scrollToTop() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        },

        handleKeydown(e) {
            // Ctrl+P for print
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                window.print();
            }
        },

        initBackToTop() {
            const $backToTop = $('.back-to-top');
            
            if ($backToTop.length) {
                $(window).on('scroll', function() {
                    if ($(window).scrollTop() > 300) {
                        $backToTop.addClass('show');
                    } else {
                        $backToTop.removeClass('show');
                    }
                });
            }
        },

        initTableOfContents() {
            const $toc = $('.legal-toc');
            const $tocLinks = $toc.find('a');
            
            if ($tocLinks.length) {
                // Make TOC sticky on scroll
                $(window).on('scroll', function() {
                    const scrollTop = $(window).scrollTop();
                    const tocTop = $toc.offset().top - 100;
                    
                    if (scrollTop > tocTop) {
                        $toc.addClass('sticky');
                    } else {
                        $toc.removeClass('sticky');
                    }
                });
                
                // Highlight active section
                const sections = $tocLinks.map(function() {
                    const href = $(this).attr('href');
                    if (href.indexOf('#') > -1) {
                        return $(href);
                    }
                }).get();
                
                $(window).on('scroll', function() {
                    const scrollTop = $(window).scrollTop();
                    const windowHeight = $(window).height();
                    
                    // Find the current section
                    let currentSection = null;
                    sections.forEach(function(section) {
                        if (section.offset().top <= scrollTop + 150) {
                            currentSection = section;
                        }
                    });
                    
                    // Update active link
                    $tocLinks.removeClass('active');
                    if (currentSection) {
                        const activeLink = $tocLinks.filter('[href="#' + currentSection.attr('id') + '"]');
                        activeLink.addClass('active');
                    }
                });
            }
        },

        initSmoothScroll() {
            // Smooth scrolling for all anchor links
            $('a[href^="#"]').on('click', function(e) {
                const target = $(this.getAttribute('href'));
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                }
            });
        },

        initPrintFunctionality() {
            // Add print styles dynamically
            const printStyles = `
                @media print {
                    .legal-hero {
                        background: none !important;
                        color: #000 !important;
                    }
                    
                    .back-to-top {
                        display: none !important;
                    }
                    
                    .legal-toc {
                        page-break-after: always;
                    }
                    
                    .legal-contact-box {
                        border: 1px solid #ccc;
                        page-break-inside: avoid;
                    }
                    
                    .legal-notice {
                        border: 1px solid #ccc;
                        page-break-inside: avoid;
                    }
                    
                    a {
                        color: #000 !important;
                        text-decoration: underline;
                    }
                }
            `;
            
            $('<style>').text(printStyles).appendTo('head');
        },

        // Utility functions
        utils: {
            // Check if element is in viewport
            isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            },

            // Debounce function
            debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }
        }
    };

    // Initialize when DOM is ready
    $(document).ready(() => {
        SafeCologneLegal.init();
    });

    // Add CSS for legal page enhancements
    const legalStyles = `
        <style>
        .legal-toc.sticky {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--white);
            border: 1px solid var(--primary-red);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            z-index: 100;
            max-width: 300px;
        }
        
        .legal-toc a.active {
            color: var(--primary-red);
            font-weight: 600;
        }
        
        .back-to-top {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .back-to-top.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .legal-content h2 {
            scroll-margin-top: 120px;
        }
        
        .legal-content h3,
        .legal-content h4 {
            scroll-margin-top: 100px;
        }
        
        @media (max-width: 768px) {
            .legal-toc.sticky {
                position: static;
                max-width: none;
            }
        }
        </style>
    `;
    
    $('head').append(legalStyles);

    // Export for global access
    window.SafeCologneLegal = SafeCologneLegal;

})(jQuery);