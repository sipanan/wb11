<?php
/**
 * The front page template
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section" aria-labelledby="hero-title">
    <div class="container">
        <div class="hero-content">
            <h1 id="hero-title" class="hero-title">
                <?php echo esc_html(get_theme_mod('safe_cologne_hero_title', 'Sicherheit mit Herz & System')); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('safe_cologne_hero_subtitle', 'Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln')); ?>
            </p>
            <a href="<?php echo esc_url(get_theme_mod('safe_cologne_hero_button_url', '/kontakt/')); ?>" class="hero-cta">
                <?php echo esc_html(get_theme_mod('safe_cologne_hero_button_text', 'Jetzt Kontakt aufnehmen')); ?>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <!-- Premium Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-text">Erfahren Sie mehr</div>
            <div class="scroll-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 16l-6-6h12z"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section features" aria-labelledby="features-title">
    <div class="container">
        <h2 id="features-title" class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_features_title', 'Was uns besonders macht')); ?>
        </h2>
        <p class="section-subtitle">
            <?php echo esc_html(get_theme_mod('safe_cologne_features_subtitle', 'Professionelle Sicherheit mit menschlichem Ansatz')); ?>
        </p>
        
        <div class="features-grid">
            <?php
            $features = safe_cologne_get_home_features();
            foreach ($features as $feature) : ?>
                <article class="feature-card">
                    <div class="feature-icon">
                        <i class="<?php echo esc_attr($feature['icon']); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($feature['title']); ?></h3>
                    <p><?php echo esc_html($feature['description']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="services-preview" aria-labelledby="services-title">
    <div class="container">
        <h2 id="services-title" class="section-title"><?php esc_html_e('Unsere Leistungen', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Umfassende Sicherheitslösungen für jeden Bedarf', 'safe-cologne'); ?></p>
        
        <div class="services-grid">
            <?php
            $services = safe_cologne_get_home_services();
            foreach ($services as $service) : ?>
                <article class="service-card">
                    <div class="service-image">
                        <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                    </div>
                    <div class="service-content">
                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['description']); ?></p>
                        <a href="<?php echo esc_url($service['link']); ?>" class="service-link">
                            <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section" aria-labelledby="stats-title">
    <div class="container">
        <h2 id="stats-title" class="section-title"><?php esc_html_e('Zahlen & Fakten', 'safe-cologne'); ?></h2>
        
        <div class="stats-grid">
            <?php
            $stats = safe_cologne_get_home_stats();
            foreach ($stats as $stat) : ?>
                <div class="stat-item">
                    <span class="stat-number" data-target="<?php echo esc_attr($stat['number']); ?>">
                        <?php echo esc_html($stat['number']); ?><?php echo esc_html($stat['suffix']); ?>
                    </span>
                    <span class="stat-label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="contact-cta" aria-labelledby="cta-title">
    <div class="container">
        <h2 id="cta-title"><?php esc_html_e('Sicherheit beginnt mit einem Gespräch', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln.', 'safe-cologne'); ?></p>
        <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="cta-button">
            <?php esc_html_e('Jetzt Beratung anfragen', 'safe-cologne'); ?>
            <i class="fas fa-phone"></i>
        </a>
    </div>
</section>

<?php get_footer(); ?>
                <?php
                $phone = get_option('safe_cologne_settings')['phone'] ?? '0221 65058801';
                ?>
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="btn btn-white btn-lg">
                    <i class="fas fa-phone-alt"></i>
                                        <?php esc_html_e('Jetzt anrufen', 'safe-cologne'); ?>
                </a>
                <a href="https://wa.me/491701234567" class="btn btn-whatsapp btn-lg">
                    <i class="fab fa-whatsapp"></i>
                    <?php esc_html_e('WhatsApp', 'safe-cologne'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<?php get_template_part('template-parts/testimonials'); ?>

<!-- Career Section -->
<section id="karriere" class="section career" aria-labelledby="career-title">
    <div class="container">
        <h2 id="career-title" class="section-title"><?php esc_html_e('Karriere bei Safe Cologne', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Dein Job mit Sinn - werde Teil unseres Teams', 'safe-cologne'); ?></p>
        
        <div class="career-benefits">
            <div class="benefit-card">
                <i class="fas fa-graduation-cap"></i>
                <h3><?php esc_html_e('Ausbildung & Aufstieg', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Klare Karrierepfade und kontinuierliche Weiterbildung', 'safe-cologne'); ?></p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-euro-sign"></i>
                <h3><?php esc_html_e('Faire Bezahlung', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Übertarifliche Vergütung und attraktive Zuschläge', 'safe-cologne'); ?></p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-users"></i>
                <h3><?php esc_html_e('Echtes Teamgefühl', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Kollegiales Arbeitsumfeld mit Wertschätzung', 'safe-cologne'); ?></p>
            </div>
            
            <div class="benefit-card">
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

<?php get_footer(); ?>
