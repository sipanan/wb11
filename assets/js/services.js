/**
 * Services Page JavaScript
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Initialize services page functionality
        initServicesGrid();
        initServiceCards();
        initServiceFiltering();
        initServiceSearch();
        initScrollAnimations();
        
        /**
         * Initialize services grid
         */
        function initServicesGrid() {
            const servicesGrid = $('.services-grid');
            
            // Masonry layout for services if available
            if (typeof Masonry !== 'undefined') {
                servicesGrid.masonry({
                    itemSelector: '.service-card',
                    columnWidth: '.service-card',
                    percentPosition: true
                });
            }
            
            // Animate services on scroll
            $(window).on('scroll', function() {
                const serviceCards = $('.service-card');
                serviceCards.each(function(index) {
                    const card = $(this);
                    const cardTop = card.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (cardTop < windowBottom - 100) {
                        setTimeout(function() {
                            card.addClass('animate-in');
                        }, index * 150);
                    }
                });
            });
        }
        
        /**
         * Initialize service cards
         */
        function initServiceCards() {
            const serviceCards = $('.service-card');
            
            // Add hover effects
            serviceCards.hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
            
            // Track service clicks
            serviceCards.on('click', '.service-link', function(e) {
                const serviceName = $(this).closest('.service-card').find('h3').text();
                
                // Track service click
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'service_click', {
                        'service_name': serviceName,
                        'page_location': window.location.href
                    });
                }
                
                // Add clicked effect
                $(this).addClass('clicked');
                setTimeout(() => {
                    $(this).removeClass('clicked');
                }, 300);
            });
        }
        
        /**
         * Initialize service filtering
         */
        function initServiceFiltering() {
            // Create filter buttons if they don't exist
            if ($('.service-filters').length === 0) {
                const filterHtml = `
                    <div class="service-filters">
                        <button class="filter-btn active" data-filter="*">Alle Services</button>
                        <button class="filter-btn" data-filter=".security">Sicherheitsdienst</button>
                        <button class="filter-btn" data-filter=".event">Veranstaltungsschutz</button>
                        <button class="filter-btn" data-filter=".consulting">Beratung</button>
                        <button class="filter-btn" data-filter=".technology">Technik</button>
                    </div>
                `;
                $('.services-main .container').prepend(filterHtml);
            }
            
            // Filter functionality
            $('.filter-btn').on('click', function() {
                const filterValue = $(this).attr('data-filter');
                
                // Update active state
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                // Filter services
                if (filterValue === '*') {
                    $('.service-card').show().addClass('animate-in');
                } else {
                    $('.service-card').hide().removeClass('animate-in');
                    $(filterValue).show().addClass('animate-in');
                }
                
                // Track filter usage
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'service_filter', {
                        'filter_value': filterValue,
                        'page_location': window.location.href
                    });
                }
            });
        }
        
        /**
         * Initialize service search
         */
        function initServiceSearch() {
            // Create search box if it doesn't exist
            if ($('.service-search').length === 0) {
                const searchHtml = `
                    <div class="service-search">
                        <input type="text" id="serviceSearch" placeholder="Service suchen...">
                        <i class="fas fa-search"></i>
                    </div>
                `;
                $('.service-filters').after(searchHtml);
            }
            
            // Search functionality
            $('#serviceSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                
                $('.service-card').each(function() {
                    const card = $(this);
                    const serviceName = card.find('h3').text().toLowerCase();
                    const serviceDesc = card.find('p').text().toLowerCase();
                    
                    if (serviceName.includes(searchTerm) || serviceDesc.includes(searchTerm)) {
                        card.show().addClass('animate-in');
                    } else {
                        card.hide().removeClass('animate-in');
                    }
                });
                
                // Track search usage
                if (typeof gtag !== 'undefined' && searchTerm.length > 2) {
                    gtag('event', 'service_search', {
                        'search_term': searchTerm,
                        'page_location': window.location.href
                    });
                }
            });
        }
        
        /**
         * Initialize scroll animations
         */
        function initScrollAnimations() {
            const animatedElements = $('.services-hero, .services-main, .service-categories, .services-cta');
            
            $(window).on('scroll', function() {
                animatedElements.each(function() {
                    const element = $(this);
                    const elementTop = element.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (elementTop < windowBottom - 100) {
                        element.addClass('animate-in');
                    }
                });
            });
        }
        
        // Service comparison functionality
        function initServiceComparison() {
            const compareButtons = `
                <div class="service-compare">
                    <button class="compare-btn">Vergleichen</button>
                    <div class="compare-panel">
                        <h3>Service Vergleich</h3>
                        <div class="compare-items"></div>
                        <button class="compare-clear">Auswahl löschen</button>
                    </div>
                </div>
            `;
            
            $('body').append(compareButtons);
            
            let compareList = [];
            
            // Add compare checkbox to each service card
            $('.service-card').each(function() {
                $(this).append('<label class="compare-checkbox"><input type="checkbox" class="compare-service"> <span>Vergleichen</span></label>');
            });
            
            // Handle compare selection
            $('.compare-service').on('change', function() {
                const serviceCard = $(this).closest('.service-card');
                const serviceName = serviceCard.find('h3').text();
                
                if ($(this).is(':checked')) {
                    if (compareList.length < 3) {
                        compareList.push({
                            name: serviceName,
                            element: serviceCard
                        });
                    } else {
                        $(this).prop('checked', false);
                        alert('Sie können maximal 3 Services vergleichen.');
                    }
                } else {
                    compareList = compareList.filter(item => item.name !== serviceName);
                }
                
                // Update compare panel
                updateComparePanel();
            });
            
            function updateComparePanel() {
                const comparePanel = $('.compare-panel');
                const compareItems = $('.compare-items');
                
                if (compareList.length > 0) {
                    $('.service-compare').addClass('active');
                    compareItems.empty();
                    
                    compareList.forEach(item => {
                        compareItems.append(`<div class="compare-item">${item.name}</div>`);
                    });
                } else {
                    $('.service-compare').removeClass('active');
                }
            }
            
            // Clear comparison
            $('.compare-clear').on('click', function() {
                compareList = [];
                $('.compare-service').prop('checked', false);
                updateComparePanel();
            });
        }
        
        // Initialize service comparison
        initServiceComparison();
        
        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
        
        // Initialize animations
        function initAnimations() {
            // Add CSS classes for animations
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .animate-in {
                        animation: fadeInUp 0.8s ease forwards;
                    }
                    
                    @keyframes fadeInUp {
                        from {
                            opacity: 0;
                            transform: translateY(30px);
                        }
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
                    
                    .service-card.animate-in {
                        animation: slideInUp 0.6s ease forwards;
                    }
                    
                    @keyframes slideInUp {
                        from {
                            opacity: 0;
                            transform: translateY(50px);
                        }
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
                    
                    .service-filters {
                        margin-bottom: 2rem;
                        text-align: center;
                    }
                    
                    .filter-btn {
                        background: var(--bg-light);
                        border: 1px solid #ddd;
                        padding: 10px 20px;
                        margin: 0 5px;
                        border-radius: var(--radius-md);
                        cursor: pointer;
                        transition: var(--transition);
                    }
                    
                    .filter-btn.active,
                    .filter-btn:hover {
                        background: var(--primary-red);
                        color: var(--white);
                        border-color: var(--primary-red);
                    }
                    
                    .service-search {
                        position: relative;
                        max-width: 300px;
                        margin: 1rem auto;
                    }
                    
                    .service-search input {
                        width: 100%;
                        padding: 10px 40px 10px 15px;
                        border: 1px solid #ddd;
                        border-radius: var(--radius-md);
                    }
                    
                    .service-search i {
                        position: absolute;
                        right: 15px;
                        top: 50%;
                        transform: translateY(-50%);
                        color: var(--light-gray);
                    }
                `)
                .appendTo('head');
        }
        
        // Initialize on window load
        $(window).on('load', function() {
            initAnimations();
            
            // Remove loading states
            $('.loading').removeClass('loading');
            
            // Trigger initial scroll animations
            $(window).trigger('scroll');
        });
    });
    
})(jQuery);