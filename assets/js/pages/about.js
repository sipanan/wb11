/**
 * About Page Specific JavaScript
 * Safe Cologne Theme - About Page
 */

(function($) {
    'use strict';

    const SafeCologneAbout = {
        init() {
            this.bindEvents();
            this.initTimelineAnimation();
            this.initTeamSection();
            this.initValuesAnimation();
            this.initScrollEffects();
        },

        bindEvents() {
            // Timeline item clicks
            $('.timeline-item').on('click', this.handleTimelineClick);
            
            // Team member interactions
            $('.team-member').on('click', this.handleTeamMemberClick);
            $('.team-member').on('mouseenter', this.handleTeamMemberHover);
            $('.team-member').on('mouseleave', this.handleTeamMemberLeave);
            
            // Value card interactions
            $('.value-card').on('click', this.handleValueCardClick);
            
            // Certification card interactions
            $('.certification-card').on('click', this.handleCertificationClick);
        },

        handleTimelineClick() {
            const $item = $(this);
            const $content = $item.find('.timeline-content');
            
            // Toggle active state
            $item.toggleClass('active');
            
            // Animate content
            if ($item.hasClass('active')) {
                $content.css('transform', 'scale(1.05)');
            } else {
                $content.css('transform', 'scale(1)');
            }
            
            setTimeout(() => {
                $content.css('transform', 'scale(1)');
            }, 200);
        },

        handleTeamMemberClick() {
            const $member = $(this);
            const memberName = $member.find('.member-name').text();
            const memberRole = $member.find('.member-role').text();
            const memberDescription = $member.find('.member-description').text();
            
            // Show team member modal
            this.showTeamMemberModal(memberName, memberRole, memberDescription);
        },

        handleTeamMemberHover() {
            const $member = $(this);
            $member.find('.member-image').addClass('hovered');
            $member.find('.member-info').addClass('hovered');
        },

        handleTeamMemberLeave() {
            const $member = $(this);
            $member.find('.member-image').removeClass('hovered');
            $member.find('.member-info').removeClass('hovered');
        },

        handleValueCardClick() {
            const $card = $(this);
            const title = $card.find('h3').text();
            const description = $card.find('p').text();
            
            // Show value details modal
            this.showValueModal(title, description);
        },

        handleCertificationClick() {
            const $card = $(this);
            const title = $card.find('h4').text();
            const description = $card.find('p').text();
            
            // Show certification details
            this.showCertificationModal(title, description);
        },

        showTeamMemberModal(name, role, description) {
            const modalHTML = `
                <div class="team-modal" id="teamModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <h2>${name}</h2>
                            <p class="modal-role">${role}</p>
                        </div>
                        <div class="modal-body">
                            <p>${description}</p>
                            <div class="modal-contact">
                                <h4>Kontakt</h4>
                                <p>Für weitere Informationen über ${name} kontaktieren Sie uns gerne.</p>
                                <a href="#contact" class="modal-cta">Kontakt aufnehmen</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#teamModal').fadeIn();
            
            // Bind close events
            $('.modal-close, .modal-overlay').on('click', () => {
                $('#teamModal').fadeOut(() => {
                    $('#teamModal').remove();
                });
            });
        },

        showValueModal(title, description) {
            const modalHTML = `
                <div class="value-modal" id="valueModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <h2>${title}</h2>
                        </div>
                        <div class="modal-body">
                            <p>${description}</p>
                            <div class="value-examples">
                                <h4>Unsere Umsetzung:</h4>
                                <ul>
                                    <li>Kontinuierliche Schulungen und Weiterbildungen</li>
                                    <li>Regelmäßige Qualitätskontrollen</li>
                                    <li>Offene Kommunikation mit unseren Kunden</li>
                                    <li>Transparente Arbeitsweise</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#valueModal').fadeIn();
            
            // Bind close events
            $('.modal-close, .modal-overlay').on('click', () => {
                $('#valueModal').fadeOut(() => {
                    $('#valueModal').remove();
                });
            });
        },

        showCertificationModal(title, description) {
            const modalHTML = `
                <div class="certification-modal" id="certificationModal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <button class="modal-close" aria-label="Schließen">&times;</button>
                        <div class="modal-header">
                            <h2>${title}</h2>
                        </div>
                        <div class="modal-body">
                            <p>${description}</p>
                            <div class="certification-details">
                                <h4>Zertifizierungsdetails:</h4>
                                <p>Alle unsere Zertifizierungen werden regelmäßig überprüft und erneuert, um höchste Qualitätsstandards zu gewährleisten.</p>
                                <a href="#contact" class="modal-cta">Weitere Informationen</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('body').append(modalHTML);
            $('#certificationModal').fadeIn();
            
            // Bind close events
            $('.modal-close, .modal-overlay').on('click', () => {
                $('#certificationModal').fadeOut(() => {
                    $('#certificationModal').remove();
                });
            });
        },

        initTimelineAnimation() {
            const $timelineItems = $('.timeline-item');
            
            if ($timelineItems.length && typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                $timelineItems.each(function() {
                    observer.observe(this);
                });
            }
        },

        initTeamSection() {
            const $teamMembers = $('.team-member');
            
            if ($teamMembers.length && typeof IntersectionObserver !== 'undefined') {
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
                
                $teamMembers.each(function() {
                    observer.observe(this);
                });
            }
        },

        initValuesAnimation() {
            const $valueCards = $('.value-card');
            
            if ($valueCards.length && typeof IntersectionObserver !== 'undefined') {
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
                
                $valueCards.each(function() {
                    observer.observe(this);
                });
            }
        },

        initScrollEffects() {
            let ticking = false;
            
            const updateScrollEffects = () => {
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                
                // Timeline progress
                const $timeline = $('.timeline');
                if ($timeline.length) {
                    const timelineTop = $timeline.offset().top;
                    const timelineHeight = $timeline.height();
                    const progress = Math.min(100, Math.max(0, 
                        ((scrollTop + windowHeight - timelineTop) / timelineHeight) * 100
                    ));
                    
                    $timeline.css('--progress', `${progress}%`);
                }
                
                // Story section parallax
                const $storyImage = $('.story-image img');
                if ($storyImage.length) {
                    const imageOffset = $storyImage.offset().top;
                    const imageHeight = $storyImage.height();
                    
                    if (scrollTop + windowHeight > imageOffset && scrollTop < imageOffset + imageHeight) {
                        const parallaxSpeed = 0.3;
                        const yPos = (scrollTop - imageOffset) * parallaxSpeed;
                        $storyImage.css('transform', `translateY(${yPos}px)`);
                    }
                }
                
                ticking = false;
            };
            
            $(window).on('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateScrollEffects);
                    ticking = true;
                }
            });
        },

        // Company story interactive elements
        initStoryInteraction() {
            const $storyText = $('.story-text');
            const $storyImage = $('.story-image');
            
            if ($storyText.length && $storyImage.length) {
                // Highlight text sections on scroll
                const $paragraphs = $storyText.find('p');
                
                $paragraphs.each(function(index) {
                    const $p = $(this);
                    
                    if (typeof IntersectionObserver !== 'undefined') {
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    $p.addClass('highlighted');
                                    // Change image based on paragraph
                                    $storyImage.removeClass('state-1 state-2 state-3')
                                              .addClass(`state-${index + 1}`);
                                }
                            });
                        }, { threshold: 0.7 });
                        
                        observer.observe(this);
                    }
                });
            }
        },

        // Utility functions
        utils: {
            animateValue(element, start, end, duration) {
                const range = end - start;
                const increment = end > start ? 1 : -1;
                const stepTime = Math.abs(Math.floor(duration / range));
                let current = start;
                
                const timer = setInterval(() => {
                    current += increment;
                    element.textContent = current;
                    
                    if (current === end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            },

            formatDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleDateString('de-DE', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }
        }
    };

    // Initialize when DOM is ready
    $(document).ready(() => {
        SafeCologneAbout.init();
    });

    // Add CSS for animations and modals
    const aboutStyles = `
        <style>
        .timeline-item {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }
        
        .timeline-item.animate-in {
            opacity: 1;
            transform: translateX(0);
        }
        
        .timeline-item:nth-child(even) {
            transform: translateX(50px);
        }
        
        .timeline-item:nth-child(even).animate-in {
            transform: translateX(0);
        }
        
        .team-member {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .team-member.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .value-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .value-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .member-image.hovered {
            transform: scale(1.05);
        }
        
        .member-info.hovered {
            background: var(--bg-light);
        }
        
        .team-modal, .value-modal, .certification-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            display: none;
        }
        
        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
        }
        
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--white);
            padding: 2rem;
            border-radius: var(--radius-md);
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--light-gray);
        }
        
        .modal-close:hover {
            color: var(--primary-red);
        }
        
        .modal-role {
            color: var(--primary-red);
            font-weight: 600;
        }
        
        .modal-cta {
            display: inline-block;
            background: var(--primary-red);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-sm);
            text-decoration: none;
            font-weight: 600;
            margin-top: 1rem;
        }
        
        .modal-cta:hover {
            background: var(--dark-red);
            color: var(--white);
        }
        
        .story-text p.highlighted {
            background: rgba(227, 6, 19, 0.1);
            padding: 0.5rem;
            border-radius: var(--radius-sm);
        }
        
        .story-image.state-1 img { filter: hue-rotate(0deg); }
        .story-image.state-2 img { filter: hue-rotate(120deg); }
        .story-image.state-3 img { filter: hue-rotate(240deg); }
        </style>
    `;
    
    $('head').append(aboutStyles);

    // Export for global access
    window.SafeCologneAbout = SafeCologneAbout;

})(jQuery);