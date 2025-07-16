/* Team Page JavaScript */

(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // Team member search and filter
        const initTeamSearch = () => {
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'Team-Mitglied suchen...';
            searchInput.className = 'team-search';
            searchInput.style.cssText = `
                width: 100%;
                max-width: 400px;
                padding: 12px;
                border: 2px solid var(--primary-gold);
                border-radius: 6px;
                font-size: 16px;
                margin-bottom: 2rem;
                display: block;
                margin-left: auto;
                margin-right: auto;
            `;
            
            const teamGrid = document.querySelector('.team-grid');
            if (teamGrid) {
                teamGrid.parentNode.insertBefore(searchInput, teamGrid);
                
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const teamMembers = document.querySelectorAll('.team-member');
                    
                    teamMembers.forEach(member => {
                        const name = member.querySelector('.team-member-name').textContent.toLowerCase();
                        if (name.includes(searchTerm)) {
                            member.style.display = 'block';
                        } else {
                            member.style.display = 'none';
                        }
                    });
                });
            }
        };
        
        // Animate team members on scroll
        const initTeamAnimations = () => {
            const teamMembers = document.querySelectorAll('.team-member');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            teamMembers.forEach((member, index) => {
                member.style.opacity = '0';
                member.style.transform = 'translateY(30px)';
                member.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(member);
            });
        };
        
        // Service details accordion
        const initServiceAccordion = () => {
            const serviceCards = document.querySelectorAll('.service-detail');
            
            serviceCards.forEach(card => {
                const title = card.querySelector('h3');
                if (title) {
                    title.style.cursor = 'pointer';
                    title.addEventListener('click', function() {
                        const content = card.querySelector('p');
                        if (content) {
                            if (content.style.display === 'none') {
                                content.style.display = 'block';
                                title.style.color = 'var(--primary-gold)';
                            } else {
                                content.style.display = 'none';
                                title.style.color = 'var(--accent-dark)';
                            }
                        }
                    });
                }
            });
        };
        
        // Project card hover effects
        const initProjectCards = () => {
            const projectCards = document.querySelectorAll('.project-card');
            
            projectCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.05)';
                    this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.2)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
                });
            });
        };
        
        // Certification badges animation
        const initCertificationAnimations = () => {
            const certificationItems = document.querySelectorAll('.certification-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'scale(1)';
                    }
                });
            }, {
                threshold: 0.5
            });
            
            certificationItems.forEach(item => {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(item);
            });
        };
        
        // Smooth reveal for sections
        const initSectionReveals = () => {
            const sections = document.querySelectorAll('.team-services, .research-projects, .team-gallery, .committee-work');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(50px)';
                section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(section);
            });
        };
        
        // Initialize all functionality
        initTeamSearch();
        initTeamAnimations();
        initServiceAccordion();
        initProjectCards();
        initCertificationAnimations();
        initSectionReveals();
        
    });
    
})();