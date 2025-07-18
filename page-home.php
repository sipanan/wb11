<?php
/**
 * Template Name: Startseite
 * 
 * The homepage template for Safe Cologne
 * Optimized for conversion and user experience
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main homepage" role="main">
    
    <!-- Hero Section -->
    <section class="hero-section bg-secondary" aria-labelledby="hero-title">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php 
            $hero_image = get_theme_mod('hero_background_image', get_template_directory_uri() . '/assets/images/hero-security.jpg');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Safe Cologne Sicherheitsdienst" class="hero-bg-image" loading="eager">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span><?php esc_html_e('Sicherheitsdienst mit Herz & System', 'safe-cologne'); ?></span>
                </div>
                
                <h1 id="hero-title" class="hero-title">
                    <span class="title-line"><?php echo get_theme_mod('hero_title_line1', 'Professionelle'); ?></span>
                    <span class="title-highlight"><?php echo get_theme_mod('hero_title_line2', 'Sicherheit für Köln'); ?></span>
                </h1>
                
                <p class="hero-description">
                    <?php echo get_theme_mod('hero_description', 'Wir schützen Menschen, Objekte und Veranstaltungen mit modernster Technik, geschulten Profis und einem menschlichen Ansatz. Ihre Sicherheit ist unsere Mission.'); ?>
                </p>
                
                <div class="hero-features">
                    <div class="feature-item">
                        <svg class="feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                        <span><?php esc_html_e('24/7 Verfügbar', 'safe-cologne'); ?></span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><?php esc_html_e('Zertifizierte Qualität', 'safe-cologne'); ?></span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 7a4 4 0 108 0 4 4 0 00-8 0zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                        </svg>
                        <span><?php esc_html_e('Erfahrenes Team', 'safe-cologne'); ?></span>
                    </div>
                </div>
                
                <div class="hero-cta">
                    <?php 
                    $phone = get_theme_mod('contact_phone', '0221 65058801');
                    $whatsapp = get_theme_mod('contact_whatsapp', '491701234567');
                    ?>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="btn btn-primary btn-lg hero-btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <?php esc_html_e('Jetzt anrufen', 'safe-cologne'); ?>
                    </a>
                    <a href="#services" class="btn btn-white btn-lg hero-btn-secondary">
                        <?php esc_html_e('Unsere Services', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="hero-scroll">
            <span><?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?></span>
            <svg class="scroll-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
            </svg>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="company-intro section bg-white" aria-labelledby="intro-title">
        <div class="container">
            <div class="intro-content">
                <div class="intro-text">
                    <h2 id="intro-title" class="section-title">
                        <?php echo get_theme_mod('intro_title', 'Safe Cologne – Sicherheit, die Sie spüren können'); ?>
                    </h2>
                    <div class="intro-description">
                        <?php 
                        $intro_content = get_theme_mod('intro_content', 'Seit 2023 sind wir Ihr verlässlicher Partner für professionelle Sicherheitsdienstleistungen in Köln und Umgebung. Mit modernster Technik, geschulten Mitarbeitern und einem menschlichen Ansatz sorgen wir dafür, dass Sie sich sicher fühlen können. Unsere Mission ist es, nicht nur zu schützen, sondern Vertrauen zu schaffen.');
                        echo wp_kses_post(wpautop($intro_content));
                        ?>
                    </div>
                </div>
                <div class="intro-stats">
                    <div class="stat-item">
                        <div class="stat-number" data-count="500">0</div>
                        <div class="stat-label"><?php esc_html_e('Geschützte Objekte', 'safe-cologne'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="100">0</div>
                        <div class="stat-label"><?php esc_html_e('Team-Mitglieder', 'safe-cologne'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="99.9">0</div>
                        <div class="stat-label"><?php esc_html_e('% Zuverlässigkeit', 'safe-cologne'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section section bg-gray-50" aria-labelledby="services-title">
        <div class="container">
            <h2 id="services-title" class="section-title">
                <?php echo get_theme_mod('services_title', 'Unsere Sicherheitsdienstleistungen'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('services_subtitle', 'Maßgeschneiderte Sicherheitslösungen für jeden Bedarf'); ?>
            </p>
            
            <div class="services-grid">
                <?php
                // Get featured services
                $services = new WP_Query(array(
                    'post_type' => 'security_services',
                    'posts_per_page' => 4,
                    'meta_query' => array(
                        array(
                            'key' => '_featured_on_homepage',
                            'value' => '1',
                            'compare' => '='
                        )
                    )
                ));

                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post();
                        $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                        $features = get_post_meta(get_the_ID(), '_service_features', true);
                        $features_array = $features ? explode("\n", $features) : array();
                ?>
                <article class="service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('service-thumb', array('loading' => 'lazy')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-content">
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <div class="service-excerpt"><?php the_excerpt(); ?></div>
                        
                        <?php if (!empty($features_array) && count($features_array) > 0) : ?>
                            <ul class="service-features">
                                <?php foreach (array_slice($features_array, 0, 3) as $feature) : ?>
                                    <li><?php echo esc_html(trim($feature)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        
                        <div class="service-footer">
                            <?php if ($price_range) : ?>
                                <div class="service-price"><?php echo esc_html($price_range); ?></div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="service-link">
                                <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
            
            <div class="services-cta">
                <a href="/dienstleistungen" class="btn btn-primary btn-lg">
                    <?php esc_html_e('Alle Services ansehen', 'safe-cologne'); ?>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-section section bg-white" aria-labelledby="why-title">
        <div class="container">
            <h2 id="why-title" class="section-title">
                <?php echo get_theme_mod('why_title', 'Warum Safe Cologne?'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('why_subtitle', 'Diese Werte machen uns zu Ihrem idealen Sicherheitspartner'); ?>
            </p>
            
            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('15+ Jahre Erfahrung', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('Langjährige Expertise in der Sicherheitsbranche mit einem Team von über 100 qualifizierten Mitarbeitern.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Zertifizierte Qualität', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('Alle Mitarbeiter nach §34a GewO geschult, regelmäßige Fortbildungen und kontinuierliche Qualitätskontrolle.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 6V9l4 2-4 2-4-2 4-2z M2 17h20v2H2z M2 7h20v2H2z M2 12h20v2H2z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Moderne Technik', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('GPS-Tracking, Funk und Echtzeit-Kommunikation für kluge Koordination und lückenlose Dokumentation.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Beste Bewertungen', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('4.9/5 Sterne bei Google, 98% Kundenzufriedenheit und 95% Weiterempfehlungsrate unserer Kunden.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section section bg-primary" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta-content">
                <h2 id="cta-title" class="cta-title text-white">
                    <?php echo get_theme_mod('cta_title', 'Sicherheit beginnt mit einem Gespräch'); ?>
                </h2>
                <p class="cta-description text-white">
                    <?php echo get_theme_mod('cta_description', 'Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln. Kostenlose Beratung und maßgeschneiderte Lösungen.'); ?>
                </p>
                
                <div class="cta-buttons">
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="btn btn-white btn-lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <?php echo esc_html($phone); ?>
                    </a>
                    <a href="/kontakt" class="btn btn-secondary btn-lg">
                        <?php esc_html_e('Kontakt aufnehmen', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>