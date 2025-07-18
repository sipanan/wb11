<?php
/**
 * Template Name: Dienstleistungen
 * 
 * The services page template for Safe Cologne
 * Showcasing all security services offered
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main dienstleistungen-page" role="main">
    
    <!-- Hero Section -->
    <section class="services-hero bg-secondary" aria-labelledby="services-hero-title">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php 
            $hero_image = get_theme_mod('services_hero_image', get_template_directory_uri() . '/assets/images/services-hero.jpg');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Safe Cologne Sicherheitsdienstleistungen" class="hero-bg-image" loading="eager">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content text-center text-white">
                <div class="hero-badge">
                    <span><?php esc_html_e('Professionelle Sicherheitslösungen', 'safe-cologne'); ?></span>
                </div>
                
                <h1 id="services-hero-title" class="hero-title">
                    <?php echo get_theme_mod('services_hero_title', 'Unsere Sicherheitsdienstleistungen'); ?>
                </h1>
                
                <p class="hero-description">
                    <?php echo get_theme_mod('services_hero_description', 'Von Veranstaltungsschutz bis Objektsicherung – wir bieten maßgeschneiderte Sicherheitslösungen für jeden Bedarf. Professionell, zuverlässig und mit menschlichem Ansatz.'); ?>
                </p>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label"><?php esc_html_e('Geschützte Objekte', 'safe-cologne'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label"><?php esc_html_e('Jahre Erfahrung', 'safe-cologne'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label"><?php esc_html_e('Verfügbarkeit', 'safe-cologne'); ?></div>
                    </div>
                </div>
                
                <div class="hero-cta">
                    <a href="#services" class="btn btn-primary btn-lg">
                        <?php esc_html_e('Services entdecken', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Navigation -->
    <section class="services-nav-section bg-white sticky-nav" aria-label="Services Navigation">
        <div class="container">
            <nav class="services-nav">
                <button class="nav-item active" data-category="all">
                    <span class="nav-icon">🛡️</span>
                    <span class="nav-text"><?php esc_html_e('Alle Services', 'safe-cologne'); ?></span>
                </button>
                <button class="nav-item" data-category="event">
                    <span class="nav-icon">🎭</span>
                    <span class="nav-text"><?php esc_html_e('Veranstaltungen', 'safe-cologne'); ?></span>
                </button>
                <button class="nav-item" data-category="object">
                    <span class="nav-icon">🏢</span>
                    <span class="nav-text"><?php esc_html_e('Objektschutz', 'safe-cologne'); ?></span>
                </button>
                <button class="nav-item" data-category="personal">
                    <span class="nav-icon">👤</span>
                    <span class="nav-text"><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></span>
                </button>
                <button class="nav-item" data-category="special">
                    <span class="nav-icon">🔍</span>
                    <span class="nav-text"><?php esc_html_e('Spezialservices', 'safe-cologne'); ?></span>
                </button>
            </nav>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services" class="services-section section bg-gray-50" aria-labelledby="services-title">
        <div class="container">
            <h2 id="services-title" class="section-title">
                <?php echo get_theme_mod('services_grid_title', 'Alle Sicherheitsdienstleistungen im Überblick'); ?>
            </h2>
            
            <div class="services-grid">
                <?php
                // Get all security services
                $services = new WP_Query(array(
                    'post_type' => 'security_services',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post();
                        $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                        $features = get_post_meta(get_the_ID(), '_service_features', true);
                        $features_array = $features ? explode("\n", $features) : array();
                        $service_category = get_post_meta(get_the_ID(), '_service_category', true) ?: 'general';
                        $is_featured = get_post_meta(get_the_ID(), '_featured_service', true);
                ?>
                <article class="service-card <?php echo $is_featured ? 'featured' : ''; ?>" data-category="<?php echo esc_attr($service_category); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('service-thumb', array('loading' => 'lazy')); ?>
                            <?php if ($is_featured) : ?>
                                <div class="service-badge">
                                    <span><?php esc_html_e('Bestseller', 'safe-cologne'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-content">
                        <div class="service-header">
                            <h3 class="service-title"><?php the_title(); ?></h3>
                            <?php if ($price_range) : ?>
                                <div class="service-price"><?php echo esc_html($price_range); ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php if (!empty($features_array)) : ?>
                            <ul class="service-features">
                                <?php foreach (array_slice($features_array, 0, 4) as $feature) : ?>
                                    <li><?php echo esc_html(trim($feature)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        
                        <div class="service-footer">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary service-btn">
                                <?php esc_html_e('Details & Angebot', 'safe-cologne'); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                            <button class="quick-contact-btn" data-service="<?php echo esc_attr(get_the_title()); ?>">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                                <?php esc_html_e('Sofort anrufen', 'safe-cologne'); ?>
                            </button>
                        </div>
                    </div>
                </article>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <div class="no-services">
                        <h3><?php esc_html_e('Derzeit keine Services verfügbar', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Kontaktieren Sie uns für individuelle Anfragen.', 'safe-cologne'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Quick Service Comparison -->
    <section class="service-comparison section bg-white" aria-labelledby="comparison-title">
        <div class="container">
            <h2 id="comparison-title" class="section-title">
                <?php echo get_theme_mod('comparison_title', 'Service-Vergleich auf einen Blick'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('comparison_subtitle', 'Finden Sie den passenden Service für Ihre Anforderungen'); ?>
            </p>
            
            <div class="comparison-table-wrapper">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th><?php esc_html_e('Service', 'safe-cologne'); ?></th>
                            <th><?php esc_html_e('Einsatzbereich', 'safe-cologne'); ?></th>
                            <th><?php esc_html_e('Verfügbarkeit', 'safe-cologne'); ?></th>
                            <th><?php esc_html_e('Preis ab', 'safe-cologne'); ?></th>
                            <th><?php esc_html_e('Aktion', 'safe-cologne'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong><?php esc_html_e('Veranstaltungsschutz', 'safe-cologne'); ?></strong>
                                <br><small><?php esc_html_e('Events, Messen, Konzerte', 'safe-cologne'); ?></small>
                            </td>
                            <td><?php esc_html_e('Temporäre Events', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('Nach Bedarf', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('25€/Std', 'safe-cologne'); ?></td>
                            <td>
                                <a href="#contact" class="btn btn-sm btn-primary">
                                    <?php esc_html_e('Angebot anfordern', 'safe-cologne'); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php esc_html_e('Objektschutz', 'safe-cologne'); ?></strong>
                                <br><small><?php esc_html_e('Gebäude, Anlagen, Baustellen', 'safe-cologne'); ?></small>
                            </td>
                            <td><?php esc_html_e('Dauerhaft', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('24/7 möglich', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('22€/Std', 'safe-cologne'); ?></td>
                            <td>
                                <a href="#contact" class="btn btn-sm btn-primary">
                                    <?php esc_html_e('Kostenlos beraten', 'safe-cologne'); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></strong>
                                <br><small><?php esc_html_e('VIP, Prominente, Geschäftsleute', 'safe-cologne'); ?></small>
                            </td>
                            <td><?php esc_html_e('Individual', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('24/7', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('Auf Anfrage', 'safe-cologne'); ?></td>
                            <td>
                                <a href="#contact" class="btn btn-sm btn-primary">
                                    <?php esc_html_e('Diskret anfragen', 'safe-cologne'); ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php esc_html_e('Ladendetektiv', 'safe-cologne'); ?></strong>
                                <br><small><?php esc_html_e('Einzelhandel, Supermärkte', 'safe-cologne'); ?></small>
                            </td>
                            <td><?php esc_html_e('Geschäftszeiten', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('Mo-Sa', 'safe-cologne'); ?></td>
                            <td><?php esc_html_e('180€/Tag', 'safe-cologne'); ?></td>
                            <td>
                                <a href="#contact" class="btn btn-sm btn-primary">
                                    <?php esc_html_e('Testweise buchen', 'safe-cologne'); ?>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-section section bg-gray-50" aria-labelledby="why-choose-title">
        <div class="container">
            <h2 id="why-choose-title" class="section-title">
                <?php echo get_theme_mod('why_choose_title', 'Warum Safe Cologne für Ihre Sicherheit?'); ?>
            </h2>
            
            <div class="why-choose-grid">
                <div class="why-item">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Zertifizierte Qualität', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('Alle Mitarbeiter sind nach §34a GewO geschult und zertifiziert. Regelmäßige Weiterbildungen gewährleisten höchste Standards.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-item">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 6L12 10.5 8.5 8 12 5.5 15.5 8zM12 17.5L8.5 15 12 12.5 15.5 15 12 17.5z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Moderne Technologie', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('GPS-Tracking, digitale Berichterstattung und moderne Kommunikationstechnik für lückenlose Überwachung und Dokumentation.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-item">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Erfahrenes Team', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('Über 100 qualifizierte Mitarbeiter mit langjähriger Erfahrung in der Sicherheitsbranche. Jeder ein Profi in seinem Bereich.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="why-item">
                    <div class="why-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="why-title"><?php esc_html_e('Kundenorientierung', 'safe-cologne'); ?></h3>
                    <p class="why-description">
                        <?php esc_html_e('Individuelle Beratung, maßgeschneiderte Lösungen und persönlicher Ansprechpartner für jeden Kunden. Ihre Zufriedenheit ist unser Erfolg.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section id="contact" class="contact-cta section bg-primary" aria-labelledby="contact-title">
        <div class="container">
            <div class="contact-content text-center text-white">
                <h2 id="contact-title" class="cta-title">
                    <?php echo get_theme_mod('services_cta_title', 'Bereit für professionelle Sicherheit?'); ?>
                </h2>
                <p class="cta-description">
                    <?php echo get_theme_mod('services_cta_description', 'Kontaktieren Sie uns für eine kostenlose Beratung und ein unverbindliches Angebot. Unsere Experten entwickeln die perfekte Sicherheitslösung für Sie.'); ?>
                </p>
                
                <div class="contact-options">
                    <div class="contact-option">
                        <h3><?php esc_html_e('Sofort sprechen', 'safe-cologne'); ?></h3>
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '0221 65058801'))); ?>" 
                           class="btn btn-white btn-lg">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <?php echo get_theme_mod('contact_phone', '0221 65058801'); ?>
                        </a>
                        <p><?php esc_html_e('Mo-Fr 8-18 Uhr, Sa 9-14 Uhr', 'safe-cologne'); ?></p>
                    </div>
                    
                    <div class="contact-option">
                        <h3><?php esc_html_e('Schriftlich anfragen', 'safe-cologne'); ?></h3>
                        <a href="/kontakt" class="btn btn-secondary btn-lg">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <?php esc_html_e('Kontaktformular', 'safe-cologne'); ?>
                        </a>
                        <p><?php esc_html_e('Antwort binnen 2 Stunden', 'safe-cologne'); ?></p>
                    </div>
                    
                    <div class="contact-option">
                        <h3><?php esc_html_e('WhatsApp Chat', 'safe-cologne'); ?></h3>
                        <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '491701234567')); ?>" 
                           class="btn btn-white btn-lg" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.525 3.687"/>
                            </svg>
                            <?php esc_html_e('WhatsApp öffnen', 'safe-cologne'); ?>
                        </a>
                        <p><?php esc_html_e('Schnell und unkompliziert', 'safe-cologne'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Modal (will be triggered by quick-contact-btn) -->
    <div id="quick-contact-modal" class="modal hidden" aria-hidden="true">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3><?php esc_html_e('Schnellanfrage', 'safe-cologne'); ?></h3>
                <button class="modal-close" aria-label="<?php esc_attr_e('Schließen', 'safe-cologne'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form class="quick-contact-form">
                    <div class="form-group">
                        <label for="quick-service"><?php esc_html_e('Gewünschter Service:', 'safe-cologne'); ?></label>
                        <input type="text" id="quick-service" name="service" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quick-name"><?php esc_html_e('Ihr Name:', 'safe-cologne'); ?></label>
                        <input type="text" id="quick-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="quick-phone"><?php esc_html_e('Telefonnummer:', 'safe-cologne'); ?></label>
                        <input type="tel" id="quick-phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="quick-message"><?php esc_html_e('Kurze Nachricht:', 'safe-cologne'); ?></label>
                        <textarea id="quick-message" name="message" rows="3"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <?php esc_html_e('Rückruf anfordern', 'safe-cologne'); ?>
                        </button>
                        <button type="button" class="btn btn-secondary modal-close">
                            <?php esc_html_e('Abbrechen', 'safe-cologne'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>