/**
 * About Page JavaScript
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Initialize about page functionality
        initStorySection();
        initTeamSection();
        initValuesSection();
        initCertificationsSection();
        initScrollAnimations();
        
        /**
         * Initialize company story section
         */
        function initStorySection() {
            const storyContent = $('.story-content');
            
            // Animate story content on scroll
            $(window).on('scroll', function() {
                storyContent.each(function() {
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
        
        /**
         * Initialize team section
         */
        function initTeamSection() {
            const teamMembers = $('.team-member');
            
            // Add hover effects
            teamMembers.hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
            
            // Stagger animation on scroll
            $(window).on('scroll', function() {
                teamMembers.each(function(index) {
                    const member = $(this);
                    const memberTop = member.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (memberTop < windowBottom - 100) {
                        setTimeout(function() {
                            member.addClass('animate-in');
                        }, index * 150);
                    }
                });
            });
            
            // Team member modal/detail view
            teamMembers.on('click', function() {
                const member = $(this);
                const memberName = member.find('.member-name').text();
                const memberRole = member.find('.member-role').text();
                const memberDescription = member.find('.member-description').text();
                
                // Track team member clicks
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'team_member_click', {
                        'member_name': memberName,
                        'member_role': memberRole,
                        'page_location': window.location.href
                    });
                }
                
                // Add active state
                teamMembers.removeClass('active');
                member.addClass('active');
            });
        }
        
        /**
         * Initialize values section
         */
        function initValuesSection() {
            const valueCards = $('.value-card');
            
            // Add hover effects
            valueCards.hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
            
            // Animate on scroll with stagger
            $(window).on('scroll', function() {
                valueCards.each(function(index) {
                    const card = $(this);
                    const cardTop = card.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (cardTop < windowBottom - 100) {
                        setTimeout(function() {
                            card.addClass('animate-in');
                        }, index * 200);
                    }
                });
            });
        }
        
        /**
         * Initialize certifications section
         */
        function initCertificationsSection() {
            const certificationCards = $('.certification-card');
            
            // Add hover effects
            certificationCards.hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
            
            // Animate on scroll
            $(window).on('scroll', function() {
                certificationCards.each(function(index) {
                    const card = $(this);
                    const cardTop = card.offset().top;
                    const windowTop = $(window).scrollTop();
                    const windowBottom = windowTop + $(window).height();
                    
                    if (cardTop < windowBottom - 100) {
                        setTimeout(function() {
                            card.addClass('animate-in');
                        }, index * 100);
                    }
                });
            });
        }
        
        /**
         * Initialize scroll animations
         */
        function initScrollAnimations() {
            const animatedElements = $('.about-hero, .company-story, .values, .team, .certifications');
            
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
        
        // Image lazy loading
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
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
                    
                    .team-member.animate-in {
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