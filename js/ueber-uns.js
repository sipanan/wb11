/**
 * Über Uns Page JavaScript - SafeCologne
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Animated statistics counters
        function initStatCounters() {
            const $stats = $('.stat-item strong');
            
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const $statsContainer = $(entry.target);
                            animateStats($statsContainer.find('.stat-item strong'));
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                
                const statsContainer = document.querySelector('.company-stats');
                if (statsContainer) {
                    observer.observe(statsContainer);
                }
            } else {
                // Fallback for older browsers
                setTimeout(function() {
                    animateStats($stats);
                }, 1000);
            }
        }
        
        // Animate statistics
        function animateStats($elements) {
            $elements.each(function() {
                const $this = $(this);
                const text = $this.text();
                const number = parseInt(text.replace(/\D/g, ''));
                
                if (number && !$this.data('animated')) {
                    $this.data('animated', true);
                    
                    $({ count: 0 }).animate({ count: number }, {
                        duration: 2500,
                        easing: 'easeOutCubic',
                        step: function() {
                            const current = Math.floor(this.count);
                            const suffix = text.includes('+') ? '+' : '';
                            $this.text(current + suffix);
                        },
                        complete: function() {
                            $this.text(text);
                            $this.addClass('stat-completed');
                        }
                    });
                }
            });
        }
        
        // Team member modal
        function initTeamModal() {
            $('.team-member-card').on('click', function() {
                const memberId = $(this).data('member-id');
                if (memberId) {
                    loadTeamMemberDetails(memberId);
                }
            });
        }
        
        // Load team member details
        function loadTeamMemberDetails(memberId) {
            const $modal = createTeamModal();
            $('body').append($modal);
            
            // Show loading state
            $modal.find('.modal-body').html('<div class="loading-content"><i class="fas fa-spinner fa-spin"></i> Laden...</div>');
            $modal.addClass('modal-open');
            $('body').addClass('modal-open');
            
            // Load member data
            $.ajax({
                url: safeCologne.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'safe_cologne_get_team_member',
                    member_id: memberId,
                    nonce: safeCologne.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $modal.find('.modal-body').html(response.data.html);
                        
                        // Analytics tracking
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'team_member_view', {
                                event_category: 'about',
                                event_label: response.data.name
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
        
        // Create team member modal
        function createTeamModal() {
            return $(`
                <div class="team-modal">
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
        
        // Timeline animations
        function initTimelineAnimations() {
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('timeline-animate');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });
                
                document.querySelectorAll('.timeline-item').forEach(function(el, index) {
                    el.style.animationDelay = (index * 0.2) + 's';
                    observer.observe(el);
                });
            }
        }
        
        // Values section animations
        function initValuesAnimations() {
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const $valueCards = $(entry.target).find('.value-card');
                            $valueCards.each(function(index) {
                                const $card = $(this);
                                setTimeout(function() {
                                    $card.addClass('value-animate');
                                }, index * 150);
                            });
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });
                
                const valuesSection = document.querySelector('.values-section');
                if (valuesSection) {
                    observer.observe(valuesSection);
                }
            }
        }
        
        // Team section animations
        function initTeamAnimations() {
            if (window.IntersectionObserver) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const $teamCards = $(entry.target).find('.team-member-card');
                            $teamCards.each(function(index) {
                                const $card = $(this);
                                setTimeout(function() {
                                    $card.addClass('team-animate');
                                }, index * 100);
                            });
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                const teamSection = document.querySelector('.team-section');
                if (teamSection) {
                    observer.observe(teamSection);
                }
            }
        }
        
        // Parallax effect for mission section
        function initParallaxEffect() {
            if (window.innerWidth > 768) {
                $(window).scroll(function() {
                    const scrolled = $(window).scrollTop();
                    const missionSection = $('.mission-section');
                    
                    if (missionSection.length) {
                        const rate = scrolled * -0.5;
                        missionSection.css('transform', 'translateY(' + rate + 'px)');
                    }
                });
            }
        }
        
        // Enhanced hover effects for team cards
        $('.team-member-card').on('mouseenter', function() {
            $(this).addClass('team-hover');
            $(this).siblings().addClass('team-dimmed');
        }).on('mouseleave', function() {
            $(this).removeClass('team-hover');
            $('.team-member-card').removeClass('team-dimmed');
        });
        
        // Enhanced hover effects for value cards
        $('.value-card').on('mouseenter', function() {
            $(this).addClass('value-hover');
            const iconColor = getComputedStyle(this).getPropertyValue('--primary-red');
            $(this).find('.value-icon').css('background', iconColor);
        }).on('mouseleave', function() {
            $(this).removeClass('value-hover');
            $(this).find('.value-icon').css('background', '');
        });
        
        // Modal event handlers
        $(document).on('click', '.modal-close, .modal-overlay', function() {
            $('.team-modal').remove();
            $('body').removeClass('modal-open');
        });
        
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.team-modal').remove();
                $('body').removeClass('modal-open');
            }
        });
        
        // Story section reading progress
        function initReadingProgress() {
            const $storyContent = $('.story-content');
            if ($storyContent.length) {
                $(window).scroll(function() {
                    const scrollTop = $(window).scrollTop();
                    const windowHeight = $(window).height();
                    const contentTop = $storyContent.offset().top;
                    const contentHeight = $storyContent.outerHeight();
                    
                    if (scrollTop + windowHeight > contentTop && scrollTop < contentTop + contentHeight) {
                        const progress = ((scrollTop + windowHeight - contentTop) / contentHeight) * 100;
                        const clampedProgress = Math.min(Math.max(progress, 0), 100);
                        
                        // Update progress if needed (could be used for analytics)
                        if (clampedProgress > 50 && !$storyContent.data('half-read')) {
                            $storyContent.data('half-read', true);
                            
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'story_half_read', {
                                    event_category: 'about',
                                    event_label: 'company_story'
                                });
                            }
                        }
                    }
                });
            }
        }
        
        // Contact CTA tracking
        $('.cta-buttons a').on('click', function() {
            const buttonText = $(this).text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'about_cta_click', {
                    event_category: 'about',
                    event_label: buttonText
                });
            }
        });
        
        // Custom easing functions
        if (typeof $.easing.easeOutCubic === 'undefined') {
            $.easing.easeOutCubic = function(x, t, b, c, d) {
                return c * ((t = t / d - 1) * t * t + 1) + b;
            };
        }
        
        // Initialize all functions
        initStatCounters();
        initTeamModal();
        initTimelineAnimations();
        initValuesAnimations();
        initTeamAnimations();
        initParallaxEffect();
        initReadingProgress();
        
        // Add loading class removal after page load
        $(window).on('load', function() {
            $('body').removeClass('loading');
            $('.team-member-card, .value-card').addClass('loaded');
        });
        
        // Handle window resize
        $(window).on('resize', function() {
            // Recalculate animations on resize if needed
            if (window.innerWidth <= 768) {
                // Disable parallax on mobile
                $('.mission-section').css('transform', 'none');
            }
        });
    });
    
})(jQuery);