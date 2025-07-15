<?php
/**
 * Enhanced Front Page Template
 * Uses ACF fields and component system
 * 
 * @package Safe_Cologne
 */

get_header(); ?>

<main id="main" class="site-main homepage">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <?php 
            $hero_bg = safe_cologne_get_field('hero_background_image');
            if ($hero_bg) : ?>
                <img src="<?php echo esc_url($hero_bg); ?>" alt="" loading="eager">
            <?php endif; ?>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php echo wp_kses_post(safe_cologne_get_field('hero_title', null, get_theme_mod('safe_cologne_hero_title', 'Safe Cologne'))); ?>
                </h1>
                
                <p class="hero-subtitle">
                    <?php echo wp_kses_post(safe_cologne_get_field('hero_subtitle', null, get_theme_mod('safe_cologne_hero_subtitle', 'Ihr Sicherheitsdienst mit Herz & System'))); ?>
                </p>
                
                <div class="hero-description">
                    <?php echo wp_kses_post(safe_cologne_get_field('hero_description', null, get_theme_mod('safe_cologne_hero_description', 'Sicherheit beginnt mit Vertrauen. Bei Safe Cologne steht Ihre Sicherheit an erster Stelle – zuverlässig, empathisch und professionell.'))); ?>
                </div>
                
                <?php 
                $hero_buttons = safe_cologne_get_repeater('hero_buttons');
                if ($hero_buttons) : ?>
                    <div class="hero-buttons">
                        <?php foreach ($hero_buttons as $button) : 
                            $button_text = $button['button_text'] ?? '';
                            $button_link = $button['button_link'] ?? '';
                            $button_style = $button['button_style'] ?? 'primary';
                            
                            if ($button_text && $button_link) :
                                $link_url = is_array($button_link) ? $button_link['url'] : $button_link;
                                $link_target = is_array($button_link) ? $button_link['target'] : '_self';
                                $link_title = is_array($button_link) ? $button_link['title'] : $button_text;
                            ?>
                                <a href="<?php echo esc_url($link_url); ?>" 
                                   target="<?php echo esc_attr($link_target); ?>"
                                   class="hero-btn hero-btn-<?php echo esc_attr($button_style); ?>"
                                   title="<?php echo esc_attr($link_title); ?>">
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <!-- Default buttons -->
                    <div class="hero-buttons">
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('safe_cologne_emergency_phone', '0221 65058801'))); ?>" 
                           class="hero-btn hero-btn-primary">
                            <i class="fas fa-phone-alt"></i>
                            <?php esc_html_e('Jetzt anrufen', 'safe-cologne'); ?>
                        </a>
                        <a href="#services" class="hero-btn hero-btn-secondary">
                            <i class="fas fa-shield-alt"></i>
                            <?php esc_html_e('Unsere Services', 'safe-cologne'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <?php if (safe_cologne_has_field('features')) : ?>
        <section class="features-section" aria-labelledby="features-title">
            <div class="container">
                <h2 id="features-title" class="section-title">
                    <?php esc_html_e('Was uns besonders macht', 'safe-cologne'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Professionelle Sicherheit mit menschlichem Ansatz', 'safe-cologne'); ?>
                </p>
                
                <div class="features-grid">
                    <?php 
                    $features = safe_cologne_get_repeater('features');
                    foreach ($features as $feature) : ?>
                        <article class="feature-card animate-on-scroll">
                            <div class="feature-icon">
                                <i class="<?php echo esc_attr($feature['feature_icon'] ?? 'fas fa-shield-alt'); ?>"></i>
                            </div>
                            <h3><?php echo esc_html($feature['feature_title'] ?? ''); ?></h3>
                            <p><?php echo wp_kses_post($feature['feature_description'] ?? ''); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php else : ?>
        <!-- Default features section -->
        <section class="features-section" aria-labelledby="features-title">
            <div class="container">
                <h2 id="features-title" class="section-title">
                    <?php esc_html_e('Was uns besonders macht', 'safe-cologne'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Professionelle Sicherheit mit menschlichem Ansatz', 'safe-cologne'); ?>
                </p>
                
                <div class="features-grid">
                    <article class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3><?php esc_html_e('Diskretion & Menschenkenntnis', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Wir handeln respektvoll und deeskalierend. Unsere Profis arbeiten mit Fingerspitzengefühl.', 'safe-cologne'); ?></p>
                    </article>
                    
                    <article class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3><?php esc_html_e('Geschulte Profis', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Vorausschauend und souverän - alle Mitarbeiter durchlaufen kontinuierliche Schulungen.', 'safe-cologne'); ?></p>
                    </article>
                    
                    <article class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-satellite-dish"></i>
                        </div>
                        <h3><?php esc_html_e('Moderne Technik', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('GPS-Tracking, Funk und Echtzeit-Kommunikation für kluge Koordination.', 'safe-cologne'); ?></p>
                    </article>
                    
                    <article class="feature-card animate-on-scroll">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h3><?php esc_html_e('Verlässliche Planung', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Detaillierte Dokumentation für nachvollziehbare Sicherheit.', 'safe-cologne'); ?></p>
                    </article>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Services Section -->
    <?php if (get_theme_mod('safe_cologne_show_services', true)) : ?>
        <section id="services" class="services-section">
            <?php 
            $services_section = safe_cologne_get_field('services_section');
            
            echo safe_cologne_component('services-grid', array(
                'title' => $services_section['services_title'] ?? 'Unsere Dienstleistungen',
                'subtitle' => $services_section['services_subtitle'] ?? 'Professionelle Sicherheitslösungen',
                'services_display' => $services_section['services_display'] ?? 'latest',
                'services_count' => $services_section['services_count'] ?? 6,
                'featured_services' => $services_section['featured_services'] ?? array(),
            ));
            ?>
        </section>
    <?php endif; ?>

    <!-- Why Choose Us Section -->
    <section class="why-us-section" aria-labelledby="why-title">
        <div class="container">
            <h2 id="why-title" class="section-title">
                <?php esc_html_e('Warum Safe Cologne?', 'safe-cologne'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Ihre Sicherheit ist unsere Mission', 'safe-cologne'); ?>
            </p>
            
            <div class="why-grid">
                <div class="why-card animate-on-scroll">
                    <div class="why-number">01</div>
                    <h3><?php esc_html_e('Erfahrung & Expertise', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Über 15 Jahre Erfahrung in der Sicherheitsbranche mit einem Team von über 500 qualifizierten Mitarbeitern.', 'safe-cologne'); ?></p>
                </div>
                
                <div class="why-card animate-on-scroll">
                    <div class="why-number">02</div>
                    <h3><?php esc_html_e('24/7 Verfügbarkeit', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Rund um die Uhr für Sie erreichbar - 365 Tage im Jahr. Schnelle Reaktionszeiten garantiert.', 'safe-cologne'); ?></p>
                </div>
                
                <div class="why-card animate-on-scroll">
                    <div class="why-number">03</div>
                    <h3><?php esc_html_e('Individuelle Konzepte', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Maßgeschneiderte Sicherheitslösungen, die perfekt auf Ihre Bedürfnisse abgestimmt sind.', 'safe-cologne'); ?></p>
                </div>
                
                <div class="why-card animate-on-scroll">
                    <div class="why-number">04</div>
                    <h3><?php esc_html_e('Faire Preise', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Transparente Preisgestaltung ohne versteckte Kosten. Beste Qualität zu fairen Konditionen.', 'safe-cologne'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <?php
    echo safe_cologne_component('cta-section', array(
        'title' => 'Sicherheit beginnt mit einem Gespräch',
        'description' => 'Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln.',
        'buttons' => array(
            array(
                'cta_button_text' => 'Jetzt anrufen',
                'cta_button_link' => 'tel:' . str_replace(' ', '', get_theme_mod('safe_cologne_emergency_phone', '0221 65058801')),
                'cta_button_style' => 'primary'
            ),
            array(
                'cta_button_text' => 'WhatsApp',
                'cta_button_link' => get_theme_mod('safe_cologne_whatsapp', 'https://wa.me/491701234567'),
                'cta_button_style' => 'secondary'
            )
        )
    ));
    ?>

    <!-- Testimonials Section -->
    <?php if (get_theme_mod('safe_cologne_show_testimonials', true)) : ?>
        <?php get_template_part('template-parts/testimonials'); ?>
    <?php endif; ?>

    <!-- Career Section -->
    <section id="karriere" class="career-section" aria-labelledby="career-title">
        <div class="container">
            <h2 id="career-title" class="section-title">
                <?php esc_html_e('Karriere bei Safe Cologne', 'safe-cologne'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Dein Job mit Sinn - werde Teil unseres Teams', 'safe-cologne'); ?>
            </p>
            
            <div class="career-benefits">
                <div class="benefit-card animate-on-scroll">
                    <i class="fas fa-graduation-cap"></i>
                    <h3><?php esc_html_e('Ausbildung & Aufstieg', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Klare Karrierepfade und kontinuierliche Weiterbildung', 'safe-cologne'); ?></p>
                </div>
                
                <div class="benefit-card animate-on-scroll">
                    <i class="fas fa-euro-sign"></i>
                    <h3><?php esc_html_e('Faire Bezahlung', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Übertarifliche Vergütung und attraktive Zuschläge', 'safe-cologne'); ?></p>
                </div>
                
                <div class="benefit-card animate-on-scroll">
                    <i class="fas fa-users"></i>
                    <h3><?php esc_html_e('Echtes Teamgefühl', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Kollegiales Arbeitsumfeld mit Wertschätzung', 'safe-cologne'); ?></p>
                </div>
                
                <div class="benefit-card animate-on-scroll">
                    <i class="fas fa-clock"></i>
                    <h3><?php esc_html_e('Flexible Arbeitszeiten', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Familienfreundliche Schichtmodelle', 'safe-cologne'); ?></p>
                </div>
            </div>
            
            <div class="career-cta">
                <p><?php esc_html_e('Bei uns bist du mehr als ein Ordnungsdienst – du bist Sicherheitsgastgeber!', 'safe-cologne'); ?></p>
                <a href="mailto:bewerber@safecologne.de" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope"></i>
                    <?php esc_html_e('Jetzt bewerben', 'safe-cologne'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <?php get_template_part('template-parts/contact', 'form'); ?>

    <!-- Flexible Components -->
    <?php safe_cologne_render_flexible_content('page_components'); ?>

</main>

<?php get_footer(); ?>