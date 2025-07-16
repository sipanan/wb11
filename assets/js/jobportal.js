/* Job Portal JavaScript */

(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // Form validation
        const initFormValidation = () => {
            const form = document.querySelector('.job-application-form');
            if (!form) return;
            
            const inputs = form.querySelectorAll('input[required], select[required]');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateField(this);
                    }
                });
            });
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    showMessage('Bitte füllen Sie alle erforderlichen Felder aus.', 'error');
                }
            });
        };
        
        // Field validation function
        const validateField = (field) => {
            let isValid = true;
            const errorClass = 'error';
            
            // Remove existing error styling
            field.classList.remove(errorClass);
            
            // Check if field is required and empty
            if (field.hasAttribute('required') && !field.value.trim()) {
                isValid = false;
            }
            
            // Email validation
            if (field.type === 'email' && field.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                    isValid = false;
                }
            }
            
            // Phone validation
            if (field.type === 'tel' && field.value) {
                const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                if (!phoneRegex.test(field.value)) {
                    isValid = false;
                }
            }
            
            // Apply error styling
            if (!isValid) {
                field.classList.add(errorClass);
                field.style.borderColor = '#dc3545';
            } else {
                field.style.borderColor = '#28a745';
            }
            
            return isValid;
        };
        
        // File upload validation
        const initFileUpload = () => {
            const fileInputs = document.querySelectorAll('input[type="file"]');
            
            fileInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const maxSize = 5 * 1024 * 1024; // 5MB
                        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
                        
                        if (file.size > maxSize) {
                            showMessage('Die Datei ist zu groß. Maximale Größe: 5MB', 'error');
                            e.target.value = '';
                            return;
                        }
                        
                        if (!allowedTypes.includes(file.type)) {
                            showMessage('Ungültiger Dateityp. Erlaubt: PDF, DOC, DOCX, JPG, PNG', 'error');
                            e.target.value = '';
                            return;
                        }
                        
                        // Show file info
                        const fileInfo = document.createElement('div');
                        fileInfo.className = 'file-info';
                        fileInfo.innerHTML = `
                            <i class="fas fa-file"></i>
                            <span>${file.name}</span>
                            <span>(${formatFileSize(file.size)})</span>
                        `;
                        fileInfo.style.cssText = `
                            margin-top: 0.5rem;
                            padding: 0.5rem;
                            background: #e8f5e8;
                            border-radius: 4px;
                            color: #155724;
                            font-size: 0.875rem;
                        `;
                        
                        // Remove existing file info
                        const existingInfo = e.target.parentNode.querySelector('.file-info');
                        if (existingInfo) {
                            existingInfo.remove();
                        }
                        
                        e.target.parentNode.appendChild(fileInfo);
                    }
                });
            });
        };
        
        // Format file size
        const formatFileSize = (bytes) => {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        };
        
        // Show messages
        const showMessage = (text, type) => {
            const messageDiv = document.createElement('div');
            messageDiv.className = `${type}-message`;
            messageDiv.textContent = text;
            messageDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 1rem 1.5rem;
                border-radius: 6px;
                font-weight: 500;
                z-index: 1000;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            `;
            
            if (type === 'error') {
                messageDiv.style.background = '#f8d7da';
                messageDiv.style.color = '#721c24';
                messageDiv.style.border = '1px solid #f5c6cb';
            } else {
                messageDiv.style.background = '#d4edda';
                messageDiv.style.color = '#155724';
                messageDiv.style.border = '1px solid #c3e6cb';
            }
            
            document.body.appendChild(messageDiv);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        };
        
        // Phone number formatting
        const initPhoneFormatting = () => {
            const phoneInput = document.querySelector('input[type="tel"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 4) {
                            value = value;
                        } else if (value.length <= 8) {
                            value = value.slice(0, 4) + ' ' + value.slice(4);
                        } else {
                            value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12);
                        }
                    }
                    e.target.value = value;
                });
            }
        };
        
        // Benefit cards animation
        const initBenefitAnimations = () => {
            const benefitCards = document.querySelectorAll('.benefit-card');
            
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
            
            benefitCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        };
        
        // Job card hover effects
        const initJobCardEffects = () => {
            const jobCards = document.querySelectorAll('.job-card');
            
            jobCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                    this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.15)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
                });
            });
        };
        
        // Initialize all functionality
        initFormValidation();
        initFileUpload();
        initPhoneFormatting();
        initBenefitAnimations();
        initJobCardEffects();
        
    });
    
})();