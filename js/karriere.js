/**
 * Karriere Page JavaScript - SafeCologne
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Job filtering functionality
        function initJobFiltering() {
            const $filterButtons = $('.job-filter-btn');
            const $jobCards = $('.job-card');
            
            $filterButtons.on('click', function(e) {
                e.preventDefault();
                
                const filterValue = $(this).data('filter');
                
                // Update active button
                $filterButtons.removeClass('active');
                $(this).addClass('active');
                
                // Filter jobs
                if (filterValue === 'all') {
                    $jobCards.removeClass('hidden').addClass('visible');
                } else {
                    $jobCards.each(function() {
                        const $card = $(this);
                        const jobType = $card.data('job-type');
                        
                        if (jobType === filterValue) {
                            $card.removeClass('hidden').addClass('visible');
                        } else {
                            $card.removeClass('visible').addClass('hidden');
                        }
                    });
                }
                
                // Animate filtered results
                setTimeout(function() {
                    $jobCards.filter('.visible').each(function(index) {
                        const $card = $(this);
                        setTimeout(function() {
                            $card.addClass('animate-in');
                        }, index * 100);
                    });
                }, 50);
            });
        }
        
        // Job application modal/form
        function initJobApplication() {
            $('.btn-apply').on('click', function(e) {
                e.preventDefault();
                
                const jobTitle = $(this).closest('.job-card').find('.job-title').text();
                const jobId = $(this).data('job-id');
                
                // Analytics tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'job_application_start', {
                        event_category: 'career',
                        event_label: jobTitle,
                        job_id: jobId
                    });
                }
                
                // Open application form or redirect
                const applicationUrl = $(this).attr('href');
                if (applicationUrl && applicationUrl !== '#') {
                    window.open(applicationUrl, '_blank');
                } else {
                    openApplicationModal(jobTitle, jobId);
                }
            });
        }
        
        // Application modal functionality
        function openApplicationModal(jobTitle, jobId) {
            // Create modal if it doesn't exist
            let $modal = $('#application-modal');
            if (!$modal.length) {
                $modal = createApplicationModal();
                $('body').append($modal);
            }
            
            // Update modal content
            $modal.find('.modal-job-title').text(jobTitle);
            $modal.find('input[name="job_id"]').val(jobId);
            $modal.find('input[name="job_title"]').val(jobTitle);
            
            // Show modal
            $modal.addClass('modal-open');
            $('body').addClass('modal-open');
        }
        
        // Create application modal
        function createApplicationModal() {
            return $(`
                <div id="application-modal" class="job-application-modal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Bewerbung für: <span class="modal-job-title"></span></h3>
                            <button class="modal-close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="application-form" enctype="multipart/form-data">
                                <input type="hidden" name="job_id" value="">
                                <input type="hidden" name="job_title" value="">
                                <input type="hidden" name="action" value="safe_cologne_job_application">
                                <input type="hidden" name="nonce" value="${safeCologne.nonce}">
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="applicant_name">Name *</label>
                                        <input type="text" id="applicant_name" name="applicant_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_email">E-Mail *</label>
                                        <input type="email" id="applicant_email" name="applicant_email" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="applicant_phone">Telefon</label>
                                        <input type="tel" id="applicant_phone" name="applicant_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="available_from">Verfügbar ab</label>
                                        <input type="date" id="available_from" name="available_from">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="motivation">Motivationsschreiben</label>
                                    <textarea id="motivation" name="motivation" rows="4" placeholder="Warum möchten Sie bei SafeCologne arbeiten?"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cv_upload">Lebenslauf (PDF) *</label>
                                    <input type="file" id="cv_upload" name="cv_upload" accept=".pdf" required>
                                    <small>Max. 5MB, nur PDF-Dateien</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cover_letter">Anschreiben (PDF)</label>
                                    <input type="file" id="cover_letter" name="cover_letter" accept=".pdf">
                                    <small>Optional, max. 5MB</small>
                                </div>
                                
                                <div class="dsgvo-checkbox">
                                    <input type="checkbox" id="dsgvo_consent" name="dsgvo_consent" required>
                                    <label for="dsgvo_consent">
                                        Ich stimme der Verarbeitung meiner Daten gemäß der 
                                        <a href="/datenschutz/" target="_blank">Datenschutzerklärung</a> zu. *
                                    </label>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-secondary modal-close">Abbrechen</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="btn-text">Bewerbung senden</span>
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
        
        // Modal event handlers
        $(document).on('click', '.modal-close, .modal-overlay', function() {
            $('.job-application-modal').removeClass('modal-open');
            $('body').removeClass('modal-open');
        });
        
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.job-application-modal').removeClass('modal-open');
                $('body').removeClass('modal-open');
            }
        });
        
        // Application form submission
        $(document).on('submit', '.application-form', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $submitBtn = $form.find('button[type="submit"]');
            const formData = new FormData(this);
            
            // Validate files
            const cvFile = $form.find('input[name="cv_upload"]')[0].files[0];
            if (!cvFile) {
                alert('Bitte laden Sie Ihren Lebenslauf hoch.');
                return;
            }
            
            if (cvFile.size > 5 * 1024 * 1024) { // 5MB
                alert('Der Lebenslauf ist zu groß. Maximal 5MB erlaubt.');
                return;
            }
            
            // Show loading state
            $submitBtn.prop('disabled', true);
            $submitBtn.find('.btn-text').hide();
            $submitBtn.find('.loading-spinner').show();
            
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                timeout: 30000,
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        showApplicationSuccess();
                        
                        // Analytics tracking
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'job_application_submit', {
                                event_category: 'career',
                                event_label: formData.get('job_title')
                            });
                        }
                    } else {
                        alert(response.data.message || 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut.');
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
        
        // Success message
        function showApplicationSuccess() {
            const $modal = $('.job-application-modal');
            $modal.find('.modal-body').html(`
                <div class="application-success">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Bewerbung erfolgreich gesendet!</h3>
                    <p>Vielen Dank für Ihre Bewerbung. Wir werden uns schnellstmöglich bei Ihnen melden.</p>
                    <button class="btn btn-primary modal-close">Schließen</button>
                </div>
            `);
        }
        
        // Job card animations
        function initCardAnimations() {
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                document.querySelectorAll('.job-card, .testimonial-card').forEach(function(el) {
                    observer.observe(el);
                });
            }
        }
        
        // Enhanced hover effects
        $('.job-card').on('mouseenter', function() {
            $(this).addClass('card-hover');
        }).on('mouseleave', function() {
            $(this).removeClass('card-hover');
        });
        
        // Contact button tracking
        $('.contact-item a').on('click', function() {
            const contactType = $(this).closest('.contact-item').find('h4').text().toLowerCase();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'contact_click', {
                    event_category: 'career',
                    event_label: contactType
                });
            }
        });
        
        // Initialize all functions
        initJobFiltering();
        initJobApplication();
        initCardAnimations();
        
        // Load jobs via AJAX if needed
        if ($('.jobs-container').data('load-ajax')) {
            loadJobsAjax();
        }
    });
    
    // Load jobs via AJAX
    function loadJobsAjax() {
        $.ajax({
            url: safeCologne.ajaxUrl,
            type: 'POST',
            data: {
                action: 'safe_cologne_load_jobs',
                nonce: safeCologne.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('.jobs-container').html(response.data.html);
                    // Re-initialize after loading
                    setTimeout(function() {
                        $('.job-card').addClass('animate-in');
                    }, 100);
                }
            },
            error: function() {
                $('.jobs-container').html('<p>Fehler beim Laden der Stellenangebote.</p>');
            }
        });
    }
    
})(jQuery);