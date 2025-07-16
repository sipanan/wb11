/**
 * Services Page Specific JavaScript
 * Safe Cologne Theme - Services Page
 */

(function($) {
    'use strict';

    const SafeCologneServices = {
        init() {
            this.bindEvents();
            this.initServiceCards();
            this.initServiceModal();
            this.initPricingCards();
            this.initProcessAnimation();
            this.initFilterSystem();
        },

        bindEvents() {
            // Service card interactions
            $('.service-card').on('click', this.handleServiceCardClick.bind(this));
            $('.service-cta').on('click', this.handleServiceCTAClick);
            
            // Pricing card interactions
            $('.pricing-card').on('click', this.handlePricingCardClick);
            $('.pricing-cta').on('click', this.handlePricingCTAClick);
            
            // Process step interactions
            $('.process-step').on('click', this.handleProcessStepClick);
            
            // Filter buttons
            $('.service-filter').on('click', this.handleFilterClick.bind(this));
            
            // Modal close events
            $(document).on('click', '.modal-close, .modal-overlay', this.closeModal);
            $(document).on('keydown', this.handleKeydown);
        },

        handleServiceCardClick(e) {
            if ($(e.target).closest('.service-cta').length) {
                return; // Don't handle card click if CTA was clicked
            }
            
            const $card = $(e.currentTarget);
            const serviceTitle = $card.find('h3').text();
            const serviceDescription = $card.find('.service-description').text();
            const serviceFeatures = [];
            
            $card.find('.service-features li').each(function() {
                serviceFeatures.push($(this).text());
            });
            
            this.showServiceModal(serviceTitle, serviceDescription, serviceFeatures);
        },

        handleServiceCTAClick(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $cta = $(e.currentTarget);
            const serviceName = $cta.closest('.service-card').find('h3').text();
            
            // Track analytics
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'Service CTA',
                    event_label: serviceName
                });
            }
            
            // Redirect to contact page with service pre-selected
            window.location.href = '/kontakt/?service=' + encodeURIComponent(serviceName);
        },

        handlePricingCardClick(e) {
            if ($(e.target).closest('.pricing-cta').length) {
                return; // Don't handle card click if CTA was clicked
            }
            
            const $card = $(e.currentTarget);
            $card.addClass('selected');
            
            // Remove selected class from other cards
            $('.pricing-card').not($card).removeClass('selected');
            
            // Show pricing details
            const pricingTitle = $card.find('.pricing-title').text();
            const pricingPrice = $card.find('.pricing-price').text();
            const pricingFeatures = [];
            
            $card.find('.pricing-features li').each(function() {
                pricingFeatures.push($(this).text());
            });
            
            this.showPricingModal(pricingTitle, pricingPrice, pricingFeatures);
        },

        handlePricingCTAClick(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $cta = $(e.currentTarget);
            const pricingPlan = $cta.closest('.pricing-card').find('.pricing-title').text();
            
            // Track analytics
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'Pricing CTA',
                    event_label: pricingPlan
                });
            }
            
            // Redirect to contact page with pricing plan pre-selected
            window.location.href = '/kontakt/?plan=' + encodeURIComponent(pricingPlan);
        },

        handleProcessStepClick() {
            const $step = $(this);
            const stepNumber = $step.find('.step-number').text();
            const stepTitle = $step.find('.step-title').text();
            const stepDescription = $step.find('.step-description').text();
            
            this.showProcessModal(stepNumber, stepTitle, stepDescription);
        },

        handleFilterClick(e) {
            e.preventDefault();
            
            const $filter = $(e.currentTarget);
            const filterValue = $filter.data('filter');
            
            // Update active filter
            $('.service-filter').removeClass('active');
            $filter.addClass('active');
            
            // Filter services
            this.filterServices(filterValue);
        },

        handleKeydown(e) {
            if (e.key === 'Escape') {
                this.closeModal();
            }
        },

        showServiceModal(title, description, features) {
            const featuresHTML = features.map(feature => `<li>${feature}</li>`).join('');
            
            const modalHTML = `
                <div class="service-modal" id="serviceModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <h2>${title}</h2>
                        </div>
                        <div class="modal-body">
                            <p>${description}</p>
                            <h4>Leistungen im Detail:</h4>
                            <ul class="modal-features">
                                ${featuresHTML}
                            </ul>
                            <div class="modal-actions">
                                <a href="/kontakt/?service=${encodeURIComponent(title)}" class="modal-cta">
                                    Angebot anfragen
                                </a>
                                <button class="modal-secondary" onclick="SafeCologneServices.closeModal()">
                                    Schließen
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#serviceModal').fadeIn();
            
            // Focus management for accessibility
            $('#serviceModal .modal-close').focus();
        },

        showPricingModal(title, price, features) {
            const featuresHTML = features.map(feature => `<li>${feature}</li>`).join('');
            
            const modalHTML = `
                <div class="pricing-modal" id="pricingModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <h2>${title}</h2>
                            <div class="modal-price">${price}</div>
                        </div>
                        <div class="modal-body">
                            <h4>Enthaltene Leistungen:</h4>
                            <ul class="modal-features">
                                ${featuresHTML}
                            </ul>
                            <div class="modal-info">
                                <p><strong>Wichtige Hinweise:</strong></p>
                                <ul>
                                    <li>Alle Preise verstehen sich zzgl. MwSt.</li>
                                    <li>Individuelle Anpassungen möglich</li>
                                    <li>Langzeitverträge erhalten Rabatte</li>
                                </ul>
                            </div>
                            <div class="modal-actions">
                                <a href="/kontakt/?plan=${encodeURIComponent(title)}" class="modal-cta">
                                    Paket buchen
                                </a>
                                <button class="modal-secondary" onclick="SafeCologneServices.closeModal()">
                                    Schließen
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#pricingModal').fadeIn();
            
            // Focus management for accessibility
            $('#pricingModal .modal-close').focus();
        },

        showProcessModal(number, title, description) {
            const modalHTML = `
                <div class="process-modal" id="processModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <div class="modal-step-number">${number}</div>
                            <h2>${title}</h2>
                        </div>
                        <div class="modal-body">
                            <p>${description}</p>
                            <div class="process-details">
                                <h4>Detaillierter Ablauf:</h4>
                                <ol>
                                    <li>Erstberatung und Bedarfsanalyse</li>
                                    <li>Individuelles Angebot erstellen</li>
                                    <li>Vertragsabschluss und Planung</li>
                                    <li>Umsetzung mit erfahrenen Profis</li>
                                    <li>Kontinuierliche Überwachung</li>
                                </ol>
                            </div>
                            <div class="modal-actions">
                                <a href="/kontakt/" class="modal-cta">
                                    Beratung anfragen
                                </a>
                                <button class="modal-secondary" onclick="SafeCologneServices.closeModal()">
                                    Schließen
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#processModal').fadeIn();
            
            // Focus management for accessibility
            $('#processModal .modal-close').focus();
        },

        closeModal() {
            $('.service-modal, .pricing-modal, .process-modal').fadeOut(300, function() {
                $(this).remove();
            });
        },

        filterServices(filter) {
            const $services = $('.service-card');
            
            if (filter === 'all') {
                $services.show().addClass('animate-in');
            } else {
                $services.each(function() {
                    const $service = $(this);
                    const serviceCategory = $service.data('category');
                    
                    if (serviceCategory === filter) {
                        $service.show().addClass('animate-in');
                    } else {
                        $service.hide().removeClass('animate-in');
                    }
                });
            }
        },

        initServiceCards() {
            const $serviceCards = $('.service-card');
            
            if ($serviceCards.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add('animate-in');
                            }, index * 150);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $serviceCards.each(function() {
                    observer.observe(this);
                });
            }
        },

        initServiceModal() {
            // Pre-populate modal content based on URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const serviceParam = urlParams.get('service');
            
            if (serviceParam) {
                const $serviceCard = $('.service-card').filter(function() {
                    return $(this).find('h3').text() === serviceParam;
                });
                
                if ($serviceCard.length) {
                    setTimeout(() => {
                        $serviceCard.click();
                    }, 1000);
                }
            }
        },

        initPricingCards() {
            const $pricingCards = $('.pricing-card');
            
            if ($pricingCards.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add('animate-in');
                            }, index * 200);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $pricingCards.each(function() {
                    observer.observe(this);
                });
            }
        },

        initProcessAnimation() {
            const $processSteps = $('.process-step');
            
            if ($processSteps.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add('animate-in');
                            }, index * 300);
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $processSteps.each(function() {
                    observer.observe(this);
                });
            }
        },

        initFilterSystem() {
            // Add filter buttons if they don't exist
            if (!$('.service-filters').length) {
                const filterHTML = `
                    <div class="service-filters">
                        <button class="service-filter active" data-filter="all">Alle Services</button>
                        <button class="service-filter" data-filter="security">Sicherheitsdienst</button>
                        <button class="service-filter" data-filter="events">Veranstaltungen</button>
                        <button class="service-filter" data-filter="consulting">Beratung</button>
                    </div>
                `;
                
                $('.services-main .container').prepend(filterHTML);
            }
        },

        // Utility functions
        utils: {
            formatPrice(price) {
                return new Intl.NumberFormat('de-DE', {
                    style: 'currency',
                    currency: 'EUR'
                }).format(price);
            },

            slugify(text) {
                return text.toLowerCase()
                    .replace(/ä/g, 'ae')
                    .replace(/ö/g, 'oe')
                    .replace(/ü/g, 'ue')
                    .replace(/ß/g, 'ss')
                    .replace(/[^a-z0-9]/g, '-')
                    .replace(/--+/g, '-')
                    .replace(/^-|-$/g, '');
            }
        }
    };

    // Initialize when DOM is ready
    $(document).ready(() => {
        SafeCologneServices.init();
    });

    // Add CSS for animations and modals
    const servicesStyles = `
        <style>
        .service-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .service-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .pricing-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .pricing-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .process-step {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .process-step.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .service-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .service-filter {
            padding: 0.75rem 1.5rem;
            background: var(--bg-light);
            border: 2px solid var(--bg-light);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
        }
        
        .service-filter.active,
        .service-filter:hover {
            background: var(--primary-red);
            color: var(--white);
            border-color: var(--primary-red);
        }
        
        .pricing-card.selected {
            border-color: var(--primary-red);
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px);
        }
        
        .modal-step-number {
            width: 40px;
            height: 40px;
            background: var(--primary-red);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .modal-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-red);
            margin-bottom: 1rem;
        }
        
        .modal-features {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }
        
        .modal-features li {
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--bg-light);
        }
        
        .modal-features li:before {
            content: "✓";
            color: var(--primary-red);
            font-weight: bold;
            margin-right: 0.5rem;
        }
        
        .modal-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .modal-cta {
            background: var(--primary-red);
            color: var(--white);
            padding: 1rem 2rem;
            border-radius: var(--radius-sm);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .modal-cta:hover {
            background: var(--dark-red);
            color: var(--white);
        }
        
        .modal-secondary {
            background: var(--bg-light);
            color: var(--dark-gray);
            padding: 1rem 2rem;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .modal-secondary:hover {
            background: var(--light-gray);
            color: var(--white);
        }
        
        .modal-info {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: var(--radius-sm);
            margin: 1rem 0;
        }
        
        .process-details ol {
            padding-left: 1.5rem;
        }
        
        .process-details li {
            margin-bottom: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .service-filters {
                justify-content: center;
            }
            
            .modal-actions {
                flex-direction: column;
            }
        }
        </style>
    `;
    
    $('head').append(servicesStyles);

    // Export for global access
    window.SafeCologneServices = SafeCologneServices;

})(jQuery);