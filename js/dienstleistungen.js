/**
 * Dienstleistungen Page JavaScript - SafeCologne
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Service filtering
        function initServiceFiltering() {
            const $filterButtons = $('.category-filter');
            const $serviceCards = $('.service-card');
            
            $filterButtons.on('click', function(e) {
                e.preventDefault();
                
                const category = $(this).data('category');
                
                // Update active filter
                $filterButtons.removeClass('active');
                $(this).addClass('active');
                
                // Filter services
                if (category === 'all') {
                    $serviceCards.removeClass('hidden').addClass('visible');
                } else {
                    $serviceCards.each(function() {
                        const $card = $(this);
                        const serviceCategory = $card.data('category');
                        
                        if (serviceCategory === category) {
                            $card.removeClass('hidden').addClass('visible');
                        } else {
                            $card.removeClass('visible').addClass('hidden');
                        }
                    });
                }
                
                // Animate filtered results
                animateServiceCards();
                
                // Analytics tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'service_filter', {
                        event_category: 'services',
                        event_label: category
                    });
                }
            });
        }
        
        // Animate service cards
        function animateServiceCards() {
            $('.service-card.visible').each(function(index) {
                const $card = $(this);
                $card.removeClass('animate-in');
                setTimeout(function() {
                    $card.addClass('animate-in');
                }, index * 100);
            });
        }
        
        // Service comparison table toggle
        function initComparisonTable() {
            $('.comparison-toggle').on('click', function() {
                const $table = $('.comparison-table');
                const $toggle = $(this);
                
                if ($table.hasClass('table-visible')) {
                    $table.removeClass('table-visible');
                    $toggle.text('Vergleichstabelle anzeigen');
                } else {
                    $table.addClass('table-visible');
                    $toggle.text('Vergleichstabelle verbergen');
                    
                    // Scroll to table
                    $('html, body').animate({
                        scrollTop: $table.offset().top - 100
                    }, 500);
                }
            });
        }
        
        // Service detail modal
        function initServiceModal() {
            $('.btn-service-details, .service-card').on('click', function(e) {
                if ($(e.target).hasClass('btn-service-primary')) return;
                
                e.preventDefault();
                
                const serviceId = $(this).data('service-id') || $(this).closest('.service-card').data('service-id');
                if (!serviceId) return;
                
                loadServiceDetails(serviceId);
            });
        }
        
        // Load service details
        function loadServiceDetails(serviceId) {
            const $modal = createServiceModal();
            $('body').append($modal);
            
            // Show loading state
            $modal.find('.modal-body').html('<div class="loading-content"><i class="fas fa-spinner fa-spin"></i> Laden...</div>');
            $modal.addClass('modal-open');
            $('body').addClass('modal-open');
            
            // Load service data
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'safe_cologne_get_service_details',
                    service_id: serviceId,
                    nonce: safeCologne.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $modal.find('.modal-body').html(response.data.html);
                        
                        // Analytics tracking
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'service_detail_view', {
                                event_category: 'services',
                                event_label: response.data.title
                            });
                        }
                    } else {
                        $modal.find('.modal-body').html('<div class="error-content">Fehler beim Laden der Details.</div>');
                    }
                },
                error: function() {
                    $modal.find('.modal-body').html('<div class="error-content">Technischer Fehler. Bitte versuchen Sie es später erneut.</div>');
                }
            });
        }
        
        // Create service modal
        function createServiceModal() {
            return $(`
                <div class="service-modal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="modal-close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!-- Content will be loaded here -->
                        </div>
                    </div>
                </div>
            `);
        }
        
        // Modal event handlers
        $(document).on('click', '.modal-close, .modal-overlay', function() {
            $('.service-modal').remove();
            $('body').removeClass('modal-open');
        });
        
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.service-modal').remove();
                $('body').removeClass('modal-open');
            }
        });
        
        // Quote request functionality
        function initQuoteRequest() {
            $('.btn-quote-request').on('click', function(e) {
                e.preventDefault();
                
                const serviceName = $(this).closest('.service-card').find('.service-title').text();
                openQuoteForm(serviceName);
            });
        }
        
        // Open quote request form
        function openQuoteForm(serviceName) {
            const $modal = createQuoteModal(serviceName);
            $('body').append($modal);
            $modal.addClass('modal-open');
            $('body').addClass('modal-open');
        }
        
        // Create quote modal
        function createQuoteModal(serviceName) {
            return $(`
                <div class="quote-modal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Angebot anfordern: ${serviceName}</h3>
                            <button class="modal-close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="quote-form">
                                <input type="hidden" name="service_name" value="${serviceName}">
                                <input type="hidden" name="action" value="safe_cologne_quote_request">
                                <input type="hidden" name="nonce" value="${safeCologne.nonce}">
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="quote_name">Name *</label>
                                        <input type="text" id="quote_name" name="quote_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quote_company">Unternehmen</label>
                                        <input type="text" id="quote_company" name="quote_company">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="quote_email">E-Mail *</label>
                                        <input type="email" id="quote_email" name="quote_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quote_phone">Telefon</label>
                                        <input type="tel" id="quote_phone" name="quote_phone">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="quote_requirements">Anforderungen</label>
                                    <textarea id="quote_requirements" name="quote_requirements" rows="4" placeholder="Beschreiben Sie Ihre Anforderungen..."></textarea>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="quote_location">Standort</label>
                                        <input type="text" id="quote_location" name="quote_location" placeholder="z.B. Köln-Innenstadt">
                                    </div>
                                    <div class="form-group">
                                        <label for="quote_timing">Gewünschter Zeitraum</label>
                                        <input type="text" id="quote_timing" name="quote_timing" placeholder="z.B. ab sofort, täglich 20-06 Uhr">
                                    </div>
                                </div>
                                
                                <div class="dsgvo-checkbox">
                                    <input type="checkbox" id="quote_dsgvo" name="quote_dsgvo" required>
                                    <label for="quote_dsgvo">
                                        Ich stimme der Verarbeitung meiner Daten gemäß der 
                                        <a href="/datenschutz/" target="_blank">Datenschutzerklärung</a> zu. *
                                    </label>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-secondary modal-close">Abbrechen</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="btn-text">Angebot anfordern</span>
                                        <span class="loading-spinner" style="display: none;">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            `);
        }
        
        // Quote form submission
        $(document).on('submit', '.quote-form', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $submitBtn = $form.find('button[type="submit"]');
            
            // Show loading state
            $submitBtn.prop('disabled', true);
            $submitBtn.find('.btn-text').hide();
            $submitBtn.find('.loading-spinner').show();
            
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    if (response.success) {
                        showQuoteSuccess();
                        
                        // Analytics tracking
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'quote_request', {
                                event_category: 'services',
                                event_label: $form.find('input[name="service_name"]').val()
                            });
                        }
                    } else {
                        alert(response.data.message || 'Ein Fehler ist aufgetreten.');
                    }
                },
                error: function() {
                    alert('Ein technischer Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.');
                },
                complete: function() {
                    $submitBtn.prop('disabled', false);
                    $submitBtn.find('.btn-text').show();
                    $submitBtn.find('.loading-spinner').hide();
                }
            });
        });
        
        // Quote success message
        function showQuoteSuccess() {
            $('.quote-modal .modal-body').html(`
                <div class="quote-success">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Anfrage erfolgreich gesendet!</h3>
                    <p>Vielen Dank für Ihre Anfrage. Wir erstellen Ihnen ein individuelles Angebot und melden uns innerhalb von 24 Stunden bei Ihnen.</p>
                    <button class="btn btn-primary modal-close">Schließen</button>
                </div>
            `);
        }
        
        // Service card hover effects
        $('.service-card').on('mouseenter', function() {
            $(this).addClass('card-elevated');
        }).on('mouseleave', function() {
            $(this).removeClass('card-elevated');
        });
        
        // Scroll animations
        function initScrollAnimations() {
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                document.querySelectorAll('.service-card, .value-card').forEach(function(el) {
                    observer.observe(el);
                });
            }
        }
        
        // Contact CTA tracking
        $('.consultation-buttons a').on('click', function() {
            const buttonText = $(this).text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'consultation_cta', {
                    event_category: 'services',
                    event_label: buttonText
                });
            }
        });
        
        // Initialize all functions
        initServiceFiltering();
        initComparisonTable();
        initServiceModal();
        initQuoteRequest();
        initScrollAnimations();
        
        // Auto-initialize based on data attributes
        if ($('.services-grid').data('auto-filter')) {
            $('.category-filter[data-category="security"]').trigger('click');
        }
    });
    
})(jQuery);