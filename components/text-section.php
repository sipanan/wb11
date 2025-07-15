<?php
/**
 * Text Section Component
 * 
 * @package Safe_Cologne
 */

// Default values
$title = $title ?? '';
$content = $content ?? '';
$columns = $columns ?? '1';
$class = $class ?? '';
$style = $style ?? '';

// Generate unique ID
$component_id = 'text-section-' . uniqid();

// Component debug
safe_cologne_component_debug('text-section');
?>

<section id="<?php echo esc_attr($component_id); ?>" class="text-section text-columns-<?php echo esc_attr($columns); ?> <?php echo esc_attr($class); ?>" 
         <?php if ($style) echo 'style="' . esc_attr($style) . '"'; ?>>
    
    <div class="container">
        <div class="text-content">
            
            <?php if ($title) : ?>
                <h2 class="text-title"><?php echo wp_kses_post($title); ?></h2>
            <?php endif; ?>
            
            <?php if ($content) : ?>
                <div class="text-body">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
    
</section>

<style>
.text-section {
    padding: 5rem 0;
    background: var(--white);
}

.text-content {
    max-width: 1000px;
    margin: 0 auto;
}

.text-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    margin-bottom: 2rem;
    color: var(--dark-gray);
    text-align: center;
}

.text-body {
    font-size: 1.125rem;
    line-height: 1.7;
    color: var(--medium-gray);
}

.text-body p {
    margin-bottom: 1.5rem;
}

.text-body h3 {
    font-size: 1.5rem;
    margin: 2rem 0 1rem;
    color: var(--dark-gray);
}

.text-body h4 {
    font-size: 1.25rem;
    margin: 1.5rem 0 0.75rem;
    color: var(--dark-gray);
}

.text-body ul,
.text-body ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.text-body li {
    margin-bottom: 0.5rem;
}

.text-body a {
    color: var(--primary-red);
    text-decoration: underline;
    transition: var(--transition);
}

.text-body a:hover {
    color: var(--dark-red);
}

.text-body blockquote {
    margin: 2rem 0;
    padding: 1.5rem;
    border-left: 4px solid var(--primary-red);
    background: var(--bg-light);
    font-style: italic;
    font-size: 1.2rem;
}

.text-body blockquote p {
    margin: 0;
}

.text-body img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    margin: 1rem 0;
}

/* Column layouts */
.text-columns-2 .text-body {
    columns: 2;
    column-gap: 3rem;
    column-rule: 1px solid var(--border-color);
}

.text-columns-3 .text-body {
    columns: 3;
    column-gap: 2rem;
    column-rule: 1px solid var(--border-color);
}

.text-columns-2 .text-body h3,
.text-columns-2 .text-body h4,
.text-columns-3 .text-body h3,
.text-columns-3 .text-body h4 {
    break-after: avoid;
}

.text-columns-2 .text-body p,
.text-columns-3 .text-body p {
    break-inside: avoid;
}

/* Responsive */
@media (max-width: 1024px) {
    .text-columns-3 .text-body {
        columns: 2;
    }
}

@media (max-width: 768px) {
    .text-section {
        padding: 3rem 0;
    }
    
    .text-columns-2 .text-body,
    .text-columns-3 .text-body {
        columns: 1;
    }
    
    .text-body {
        font-size: 1rem;
    }
}
</style>

<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const textSection = document.getElementById('<?php echo esc_js($component_id); ?>');
        if (!textSection) return;
        
        // Add intersection observer for animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        // Set initial state
        textSection.style.opacity = '0';
        textSection.style.transform = 'translateY(30px)';
        textSection.style.transition = 'all 0.8s ease-out';
        
        observer.observe(textSection);
        
        // Track link clicks
        const links = textSection.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'text_link_click', {
                        'link_url': this.getAttribute('href'),
                        'link_text': this.textContent.trim(),
                        'event_category': 'engagement',
                        'event_label': 'text_component'
                    });
                }
            });
        });
    });
})();
</script>