<?php
/**
 * Single Service Template
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

get_header(); ?>

<main id="main-content" class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Service Hero -->
        <section class="service-hero">
            <div class="container">
                <div class="service-hero-content">
                    <h1><?php the_title(); ?></h1>
                    <p class="service-subtitle"><?php echo get_post_meta(get_the_ID(), '_service_subtitle', true); ?></p>
                    
                    <div class="service-meta">
                        <span class="service-category">
                            <i class="fas fa-tag"></i>
                            <?php 
                            $categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($categories && !is_wp_error($categories)) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </span>
                        
                        <span class="service-duration">
                            <i class="fas fa-clock"></i>
                            <?php echo get_post_meta(get_the_ID(), '_service_duration', true) ?: 'Nach Vereinbarung'; ?>
                        </span>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-hero-image">
                        <?php the_post_thumbnail('hero-banner', array('alt' => get_the_title())); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
        <!-- Service Content -->
        <section class="service-content">
            <div class="container">
                <div class="service-content-grid">
                    <div class="service-main-content">
                        <div class="service-description">
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Service Features -->
                        <?php 
                        $features = get_post_meta(get_the_ID(), '_service_features', true);
                        if ($features) : ?>
                            <div class="service-features">
                                <h3><?php esc_html_e('Leistungsumfang', 'safe-cologne'); ?></h3>
                                <ul>
                                    <?php foreach ($features as $feature) : ?>
                                        <li><?php echo esc_html($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Service Process -->
                        <?php 
                        $process = get_post_meta(get_the_ID(), '_service_process', true);
                        if ($process) : ?>
                            <div class="service-process">
                                <h3><?php esc_html_e('Ablauf', 'safe-cologne'); ?></h3>
                                <div class="process-steps">
                                    <?php foreach ($process as $index => $step) : ?>
                                        <div class="process-step">
                                            <div class="step-number"><?php echo ($index + 1); ?></div>
                                            <div class="step-content">
                                                <h4><?php echo esc_html($step['title']); ?></h4>
                                                <p><?php echo esc_html($step['description']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="service-sidebar">
                        <!-- Service Info Card -->
                        <div class="service-info-card">
                            <h3><?php esc_html_e('Service Information', 'safe-cologne'); ?></h3>
                            
                            <div class="service-info-item">
                                <strong><?php esc_html_e('Verfügbarkeit:', 'safe-cologne'); ?></strong>
                                <span><?php echo get_post_meta(get_the_ID(), '_service_availability', true) ?: 'Nach Vereinbarung'; ?></span>
                            </div>
                            
                            <div class="service-info-item">
                                <strong><?php esc_html_e('Einsatzgebiet:', 'safe-cologne'); ?></strong>
                                <span><?php echo get_post_meta(get_the_ID(), '_service_area', true) ?: 'Köln und Umgebung'; ?></span>
                            </div>
                            
                            <div class="service-info-item">
                                <strong><?php esc_html_e('Mindestdauer:', 'safe-cologne'); ?></strong>
                                <span><?php echo get_post_meta(get_the_ID(), '_service_min_duration', true) ?: 'Keine Angabe'; ?></span>
                            </div>
                            
                            <div class="service-cta">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-button primary">
                                    <?php esc_html_e('Angebot anfordern', 'safe-cologne'); ?>
                                </a>
                                
                                <a href="tel:<?php echo esc_attr(get_theme_mod('safe_cologne_phone', '0221 6505 8801')); ?>" class="cta-button secondary">
                                    <i class="fas fa-phone"></i>
                                    <?php esc_html_e('Sofort anrufen', 'safe-cologne'); ?>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Related Services -->
                        <?php 
                        $related_services = get_posts(array(
                            'post_type' => 'service',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_category',
                                    'field' => 'term_id',
                                    'terms' => wp_get_post_terms(get_the_ID(), 'service_category', array('fields' => 'ids')),
                                ),
                            ),
                        ));
                        
                        if ($related_services) : ?>
                            <div class="related-services">
                                <h3><?php esc_html_e('Ähnliche Services', 'safe-cologne'); ?></h3>
                                
                                <?php foreach ($related_services as $service) : ?>
                                    <div class="related-service">
                                        <h4><a href="<?php echo get_permalink($service); ?>"><?php echo get_the_title($service); ?></a></h4>
                                        <p><?php echo wp_trim_words(get_post_field('post_content', $service), 15); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Service FAQ -->
        <?php 
        $faqs = get_post_meta(get_the_ID(), '_service_faqs', true);
        if ($faqs) : ?>
            <section class="service-faq">
                <div class="container">
                    <h2><?php esc_html_e('Häufig gestellte Fragen', 'safe-cologne'); ?></h2>
                    
                    <div class="faq-list">
                        <?php foreach ($faqs as $index => $faq) : ?>
                            <div class="faq-item">
                                <button class="faq-question" type="button" data-toggle="collapse" data-target="#faq-<?php echo $index; ?>">
                                    <span><?php echo esc_html($faq['question']); ?></span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div id="faq-<?php echo $index; ?>" class="faq-answer collapse">
                                    <p><?php echo esc_html($faq['answer']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        
        <!-- Service CTA -->
        <section class="service-cta-section">
            <div class="container">
                <div class="service-cta-content">
                    <h2><?php esc_html_e('Benötigen Sie diesen Service?', 'safe-cologne'); ?></h2>
                    <p><?php esc_html_e('Kontaktieren Sie uns für ein unverbindliches Angebot oder eine kostenlose Beratung.', 'safe-cologne'); ?></p>
                    
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-button primary">
                            <?php esc_html_e('Kostenlose Beratung', 'safe-cologne'); ?>
                        </a>
                        
                        <a href="tel:<?php echo esc_attr(get_theme_mod('safe_cologne_phone', '0221 6505 8801')); ?>" class="cta-button secondary">
                            <i class="fas fa-phone"></i>
                            <?php echo esc_html(get_theme_mod('safe_cologne_phone', '0221 6505 8801')); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>