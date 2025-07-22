<?php
/**
 * Template Name: Startseite
 * 
 * Clean, professional homepage for Safe Cologne
 * 
 * @package Safe_Cologne
 * @version 4.0.0
 */

get_header(); ?>

<main class="homepage">
    
    <!-- Hero Section -->
    <section class="hero section-lg bg-light text-center">
        <div class="container">
            <h1 class="fw-bold">
                Professionelle <span class="text-primary">Sicherheit für Köln</span>
            </h1>
            <p class="text-lg text-muted">
                Wir schützen Menschen, Objekte und Veranstaltungen mit modernster Technik, geschulten Profis und einem menschlichen Ansatz. Ihre Sicherheit ist unsere Mission.
            </p>
            
            <div class="grid grid-3 gap-8" style="margin: 3rem 0;">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="flex-center" style="margin-bottom: 1rem;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                            </svg>
                        </div>
                        <h3>24/7 Verfügbar</h3>
                        <p class="text-muted">Rund um die Uhr für Ihre Sicherheit im Einsatz</p>
                    </div>
                </div>
                
                <div class="card text-center">
                    <div class="card-body">
                        <div class="flex-center" style="margin-bottom: 1rem;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3>Zertifizierte Qualität</h3>
                        <p class="text-muted">Höchste Standards und regelmäßige Schulungen</p>
                    </div>
                </div>
                
                <div class="card text-center">
                    <div class="card-body">
                        <div class="flex-center" style="margin-bottom: 1rem;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 7a4 4 0 108 0 4 4 0 00-8 0zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                            </svg>
                        </div>
                        <h3>Erfahrenes Team</h3>
                        <p class="text-muted">Professionelle und vertrauensvolle Mitarbeiter</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="section bg-white">
        <div class="container">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2>Unsere Leistungen</h2>
                <p class="text-lg text-muted">Umfassende Sicherheitslösungen für jeden Bedarf</p>
            </div>
            
            <div class="grid grid-2 gap-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-primary">Objektschutz</h3>
                        <p>Professioneller Schutz für Industrieanlagen, Bürokomplexe und Baustellen. Unsere geschulten Sicherheitskräfte sorgen für die Sicherheit Ihrer Immobilien.</p>
                        <ul style="margin: 1rem 0; list-style: none; padding: 0;">
                            <li>✓ Zutrittskontrolle & Kontrollgänge</li>
                            <li>✓ Schließdienste & Alarmverfolgung</li>
                            <li>✓ Bodycams & GPS-Tracking</li>
                        </ul>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-primary">VIP Shuttleservice</h3>
                        <p>Diskreter und sicherer Transport für Prominente, Politiker und Geschäftsleute. Höchste Sicherheitsstandards und absolute Vertraulichkeit.</p>
                        <ul style="margin: 1rem 0; list-style: none; padding: 0;">
                            <li>✓ Gepanzerte Fahrzeuge verfügbar</li>
                            <li>✓ Geschulte Sicherheitsfahrer</li>
                            <li>✓ Defensives & taktisches Fahren</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Info -->
    <section class="section bg-light">
        <div class="container">
            <div class="grid grid-2 gap-8" style="align-items: center;">
                <div>
                    <h2>Safe Cologne – Sicherheit, die Sie spüren können</h2>
                    <p>Seit 2023 sind wir Ihr verlässlicher Partner für professionelle Sicherheitsdienstleistungen in Köln und Umgebung. Mit modernster Technik, geschulten Mitarbeitern und einem menschlichen Ansatz sorgen wir dafür, dass Sie sich sicher fühlen können.</p>
                    <p>Unsere Mission ist es, nicht nur zu schützen, sondern Vertrauen zu schaffen.</p>
                </div>
                
                <div class="grid grid-3 gap-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-primary fw-bold" style="font-size: 2rem;">500+</div>
                            <div class="text-sm text-muted">Geschützte Objekte</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-primary fw-bold" style="font-size: 2rem;">99.9%</div>
                            <div class="text-sm text-muted">Zuverlässigkeit</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-primary fw-bold" style="font-size: 2rem;">24/7</div>
                            <div class="text-sm text-muted">Verfügbar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
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