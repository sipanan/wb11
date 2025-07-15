<?php
/**
 * CTA Section Component
 * 
 * @package Safe_Cologne
 */

// Default values
$title = $title ?? 'Bereit für den nächsten Schritt?';
$description = $description ?? 'Kontaktieren Sie uns für eine unverbindliche Beratung.';
$background = $background ?? '';
$buttons = $buttons ?? array();
$class = $class ?? '';
$style = $style ?? '';

// Generate unique ID
$component_id = 'cta-section-' . uniqid();

// Enqueue component assets
safe_cologne_enqueue_component_assets('cta-section');

// Component debug
safe_cologne_component_debug('cta-section');
?>

<section id="<?php echo esc_attr($component_id); ?>" class="cta-section <?php echo esc_attr($class); ?>" 
         <?php if ($style) echo 'style="' . esc_attr($style) . '"'; ?>>
    
    <?php if ($background) : ?>
        <div class="cta-background">
            <img src="<?php echo esc_url($background); ?>" alt="" loading="lazy">
            <div class="cta-overlay"></div>
        </div>
    <?php endif; ?>
    
    <div class="container">
        <div class="cta-content">
            
            <?php if ($title) : ?>
                <h2 class="cta-title"><?php echo wp_kses_post($title); ?></h2>
            <?php endif; ?>
            
            <?php if ($description) : ?>
                <p class="cta-description"><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
            
            <?php if ($buttons && is_array($buttons)) : ?>
                <div class="cta-buttons">
                    <?php foreach ($buttons as $button) : 
                        $button_text = $button['cta_button_text'] ?? '';
                        $button_link = $button['cta_button_link'] ?? '';
                        $button_style = $button['cta_button_style'] ?? 'primary';
                        
                        if ($button_text && $button_link) :
                            $link_url = is_array($button_link) ? $button_link['url'] : $button_link;
                            $link_target = is_array($button_link) ? $button_link['target'] : '_self';
                            $link_title = is_array($button_link) ? $button_link['title'] : $button_text;
                        ?>
                            <a href="<?php echo esc_url($link_url); ?>" 
                               target="<?php echo esc_attr($link_target); ?>"
                               class="cta-button cta-button-<?php echo esc_attr($button_style); ?>"
                               title="<?php echo esc_attr($link_title); ?>">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
    
</section>

<style>
.cta-section {
    position: relative;
    padding: 5rem 0;
    background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
    color: var(--white);
    overflow: hidden;
}

.cta-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.cta-background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cta-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(227,6,19,0.9), rgba(26,26,26,0.9));
}

.cta-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    margin-bottom: 1rem;
    color: var(--white);
}

.cta-description {
    font-size: clamp(1.125rem, 2vw, 1.5rem);
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    font-size: 1.125rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    min-width: 200px;
    justify-content: center;
}

.cta-button-primary {
    background: var(--white);
    color: var(--primary-red);
    border: 2px solid var(--white);
}

.cta-button-primary:hover {
    background: transparent;
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.cta-button-secondary {
    background: transparent;
    color: var(--white);
    border: 2px solid var(--white);
}

.cta-button-secondary:hover {
    background: var(--white);
    color: var(--primary-red);
    transform: translateY(-2px);
}

.cta-button-outline {
    background: transparent;
    color: var(--white);
    border: 2px solid rgba(255,255,255,0.5);
}

.cta-button-outline:hover {
    background: rgba(255,255,255,0.1);
    border-color: var(--white);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .cta-section {
        padding: 3rem 0;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-button {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const ctaSection = document.getElementById('<?php echo esc_js($component_id); ?>');
        if (!ctaSection) return;
        
        // Add intersection observer for animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        observer.observe(ctaSection);
        
        // Track button clicks
        const buttons = ctaSection.querySelectorAll('.cta-button');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'cta_click', {
                        'button_text': this.textContent.trim(),
                        'event_category': 'engagement',
                        'event_label': 'cta_component'
                    });
                }
            });
        });
    });
})();
</script>