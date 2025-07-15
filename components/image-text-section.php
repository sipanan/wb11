<?php
/**
 * Image Text Section Component
 * 
 * @package Safe_Cologne
 */

// Default values
$title = $title ?? '';
$content = $content ?? '';
$image = $image ?? '';
$layout = $layout ?? 'left';
$class = $class ?? '';
$style = $style ?? '';

// Generate unique ID
$component_id = 'image-text-section-' . uniqid();

// Component debug
safe_cologne_component_debug('image-text-section');
?>

<section id="<?php echo esc_attr($component_id); ?>" class="image-text-section layout-<?php echo esc_attr($layout); ?> <?php echo esc_attr($class); ?>" 
         <?php if ($style) echo 'style="' . esc_attr($style) . '"'; ?>>
    
    <div class="container">
        <div class="image-text-content">
            
            <?php if ($image) : 
                $image_src = is_array($image) ? $image['url'] : $image;
                $image_alt = is_array($image) ? $image['alt'] : '';
                $image_width = is_array($image) ? $image['width'] : 600;
                $image_height = is_array($image) ? $image['height'] : 400;
            ?>
                <div class="image-container">
                    <img src="<?php echo esc_url($image_src); ?>" 
                         alt="<?php echo esc_attr($image_alt); ?>"
                         width="<?php echo esc_attr($image_width); ?>"
                         height="<?php echo esc_attr($image_height); ?>"
                         loading="lazy">
                </div>
            <?php endif; ?>
            
            <div class="text-container">
                
                <?php if ($title) : ?>
                    <h2 class="image-text-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($content) : ?>
                    <div class="image-text-body">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </div>
    </div>
    
</section>

<style>
.image-text-section {
    padding: 5rem 0;
    background: var(--white);
}

.image-text-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.image-container {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
}

.image-container img {
    width: 100%;
    height: auto;
    transition: var(--transition);
}

.image-container:hover img {
    transform: scale(1.05);
}

.text-container {
    padding: 2rem 0;
}

.image-text-title {
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    color: var(--dark-gray);
    line-height: 1.2;
}

.image-text-body {
    font-size: 1.125rem;
    line-height: 1.7;
    color: var(--medium-gray);
}

.image-text-body p {
    margin-bottom: 1.5rem;
}

.image-text-body h3 {
    font-size: 1.5rem;
    margin: 2rem 0 1rem;
    color: var(--dark-gray);
}

.image-text-body h4 {
    font-size: 1.25rem;
    margin: 1.5rem 0 0.75rem;
    color: var(--dark-gray);
}

.image-text-body ul,
.image-text-body ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.image-text-body li {
    margin-bottom: 0.5rem;
}

.image-text-body a {
    color: var(--primary-red);
    text-decoration: underline;
    transition: var(--transition);
}

.image-text-body a:hover {
    color: var(--dark-red);
}

/* Layout variations */
.layout-right .image-text-content {
    grid-template-columns: 1fr 1fr;
}

.layout-right .image-container {
    order: 2;
}

.layout-right .text-container {
    order: 1;
}

.layout-top .image-text-content {
    grid-template-columns: 1fr;
    gap: 2rem;
    text-align: center;
}

.layout-top .image-container {
    order: 1;
    max-width: 600px;
    margin: 0 auto;
}

.layout-top .text-container {
    order: 2;
}

.layout-bottom .image-text-content {
    grid-template-columns: 1fr;
    gap: 2rem;
    text-align: center;
}

.layout-bottom .image-container {
    order: 2;
    max-width: 600px;
    margin: 0 auto;
}

.layout-bottom .text-container {
    order: 1;
}

/* Responsive */
@media (max-width: 1024px) {
    .image-text-content {
        gap: 3rem;
    }
    
    .text-container {
        padding: 1rem 0;
    }
}

@media (max-width: 768px) {
    .image-text-section {
        padding: 3rem 0;
    }
    
    .image-text-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .layout-right .image-container,
    .layout-right .text-container {
        order: unset;
    }
    
    .image-text-body {
        font-size: 1rem;
    }
    
    .image-container {
        max-width: 500px;
        margin: 0 auto;
    }
}
</style>

<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const imageTextSection = document.getElementById('<?php echo esc_js($component_id); ?>');
        if (!imageTextSection) return;
        
        // Add intersection observer for animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const imageContainer = entry.target.querySelector('.image-container');
                    const textContainer = entry.target.querySelector('.text-container');
                    
                    if (imageContainer) {
                        imageContainer.style.opacity = '1';
                        imageContainer.style.transform = 'translateX(0)';
                    }
                    
                    if (textContainer) {
                        setTimeout(() => {
                            textContainer.style.opacity = '1';
                            textContainer.style.transform = 'translateX(0)';
                        }, 200);
                    }
                    
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        // Set initial states
        const imageContainer = imageTextSection.querySelector('.image-container');
        const textContainer = imageTextSection.querySelector('.text-container');
        const layout = imageTextSection.classList.contains('layout-right') ? 'right' : 'left';
        
        if (imageContainer) {
            imageContainer.style.opacity = '0';
            imageContainer.style.transform = layout === 'right' ? 'translateX(50px)' : 'translateX(-50px)';
            imageContainer.style.transition = 'all 0.8s ease-out';
        }
        
        if (textContainer) {
            textContainer.style.opacity = '0';
            textContainer.style.transform = layout === 'right' ? 'translateX(-50px)' : 'translateX(50px)';
            textContainer.style.transition = 'all 0.8s ease-out';
        }
        
        observer.observe(imageTextSection);
        
        // Track link clicks in text
        const links = imageTextSection.querySelectorAll('.image-text-body a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'image_text_link_click', {
                        'link_url': this.getAttribute('href'),
                        'link_text': this.textContent.trim(),
                        'event_category': 'engagement',
                        'event_label': 'image_text_component'
                    });
                }
            });
        });
    });
})();
</script>