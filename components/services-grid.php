<?php
/**
 * Services Grid Component
 * 
 * @package Safe_Cologne
 */

// Default values
$title = $title ?? 'Unsere Dienstleistungen';
$subtitle = $subtitle ?? 'Professionelle Sicherheitslösungen';
$services_display = $services_display ?? 'latest';
$services_count = $services_count ?? 6;
$featured_services = $featured_services ?? array();
$class = $class ?? '';
$style = $style ?? '';

// Generate unique ID
$component_id = 'services-grid-' . uniqid();

// Get services based on display type
$services = array();

switch ($services_display) {
    case 'manual':
        $services = $featured_services;
        break;
        
    case 'latest':
        $services = get_posts(array(
            'post_type' => 'security_services',
            'posts_per_page' => $services_count,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ));
        break;
        
    case 'featured':
        $services = get_posts(array(
            'post_type' => 'security_services',
            'posts_per_page' => $services_count,
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key' => '_featured_service',
                    'value' => '1',
                    'compare' => '='
                )
            ),
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));
        break;
}

// Component debug
safe_cologne_component_debug('services-grid');
?>

<section id="<?php echo esc_attr($component_id); ?>" class="services-grid-section <?php echo esc_attr($class); ?>" 
         <?php if ($style) echo 'style="' . esc_attr($style) . '"'; ?>>
    
    <div class="container">
        
        <?php if ($title || $subtitle) : ?>
            <div class="section-header">
                <?php if ($title) : ?>
                    <h2 class="section-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($subtitle) : ?>
                    <p class="section-subtitle"><?php echo wp_kses_post($subtitle); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($services) : ?>
            <div class="services-grid">
                <?php foreach ($services as $service) : 
                    $service_id = is_object($service) ? $service->ID : $service;
                    $service_title = is_object($service) ? $service->post_title : get_the_title($service_id);
                    $service_excerpt = is_object($service) ? $service->post_excerpt : get_the_excerpt($service_id);
                    $service_link = get_permalink($service_id);
                    $service_image = get_the_post_thumbnail_url($service_id, 'service-thumb');
                    $service_features = get_post_meta($service_id, '_service_features', true);
                    $service_price = get_post_meta($service_id, '_service_price_range', true);
                    $is_featured = get_post_meta($service_id, '_featured_service', true);
                ?>
                    <article class="service-card <?php echo $is_featured ? 'featured' : ''; ?>">
                        
                        <?php if ($service_image) : ?>
                            <div class="service-image">
                                <img src="<?php echo esc_url($service_image); ?>" 
                                     alt="<?php echo esc_attr($service_title); ?>"
                                     loading="lazy">
                                <?php if ($is_featured) : ?>
                                    <span class="service-badge"><?php _e('Featured', 'safe-cologne'); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <h3 class="service-title"><?php echo esc_html($service_title); ?></h3>
                            
                            <?php if ($service_excerpt) : ?>
                                <p class="service-excerpt"><?php echo wp_kses_post($service_excerpt); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($service_features) : 
                                $features = explode("\n", $service_features);
                                $features = array_filter(array_map('trim', $features));
                                
                                if ($features) : ?>
                                    <ul class="service-features">
                                        <?php foreach (array_slice($features, 0, 3) as $feature) : ?>
                                            <li><?php echo esc_html($feature); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <div class="service-footer">
                                <?php if ($service_price) : ?>
                                    <span class="service-price"><?php echo esc_html($service_price); ?></span>
                                <?php endif; ?>
                                
                                <a href="<?php echo esc_url($service_link); ?>" class="service-link">
                                    <?php _e('Mehr erfahren', 'safe-cologne'); ?>
                                    <span class="arrow">→</span>
                                </a>
                            </div>
                        </div>
                        
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="no-services">
                <p><?php _e('Keine Services verfügbar.', 'safe-cologne'); ?></p>
            </div>
        <?php endif; ?>
        
    </div>
    
</section>

<style>
.services-grid-section {
    padding: 5rem 0;
    background: var(--bg-light);
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    margin-bottom: 1rem;
    color: var(--dark-gray);
}

.section-subtitle {
    font-size: 1.25rem;
    color: var(--light-gray);
    margin: 0;
    max-width: 600px;
    margin: 0 auto;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.service-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    position: relative;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.service-card.featured {
    border: 2px solid var(--primary-red);
}

.service-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.service-card:hover .service-image img {
    transform: scale(1.05);
}

.service-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary-red);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.service-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.service-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--dark-gray);
    line-height: 1.3;
}

.service-excerpt {
    color: var(--light-gray);
    margin-bottom: 1rem;
    line-height: 1.6;
    flex: 1;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem;
}

.service-features li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    color: var(--medium-gray);
    font-size: 0.875rem;
}

.service-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary-red);
    font-weight: bold;
}

.service-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.service-price {
    font-weight: 600;
    color: var(--primary-red);
    font-size: 0.875rem;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-red);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.service-link:hover {
    gap: 0.75rem;
}

.service-link .arrow {
    transition: var(--transition);
}

.no-services {
    text-align: center;
    padding: 3rem;
    color: var(--light-gray);
}

/* Responsive */
@media (max-width: 1024px) {
    .services-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
}

@media (max-width: 768px) {
    .services-grid-section {
        padding: 3rem 0;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .service-card {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .service-content {
        padding: 1rem;
    }
    
    .service-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
}
</style>

<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const servicesGrid = document.getElementById('<?php echo esc_js($component_id); ?>');
        if (!servicesGrid) return;
        
        // Add intersection observer for staggered animation
        const serviceCards = servicesGrid.querySelectorAll('.service-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        serviceCards.forEach(card => {
            // Set initial state
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease-out';
            
            observer.observe(card);
            
            // Track service clicks
            const serviceLink = card.querySelector('.service-link');
            if (serviceLink) {
                serviceLink.addEventListener('click', function() {
                    const serviceTitle = card.querySelector('.service-title')?.textContent;
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'service_click', {
                            'service_name': serviceTitle,
                            'event_category': 'engagement',
                            'event_label': 'services_grid_component'
                        });
                    }
                });
            }
        });
    });
})();
</script>