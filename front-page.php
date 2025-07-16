<?php
/**
 * The front page template
 *
 * @package SpecSec
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section" id="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container">
            <div class="hero-text">
                <h1 class="hero-title"><?php echo esc_html(specsec_get_customizer_option('specsec_hero_title', 'Werde Teil unseres Teams!')); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html(specsec_get_customizer_option('specsec_hero_subtitle', 'Gemeinsam zum Erfolg')); ?></p>
                <p class="hero-description"><?php echo esc_html(specsec_get_customizer_option('specsec_hero_description', 'Professionelle Veranstaltungssicherheit und Ordnungsdienste mit über 41 Jahren Erfahrung. Wir bieten Ihnen umfassende Lösungen für Ihre Veranstaltung.')); ?></p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('karriere'))); ?>" class="btn btn-primary">
                        <?php esc_html_e('Alle Jobs', 'specsec'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>" class="btn btn-secondary">
                        <?php esc_html_e('Mehr erfahren', 'specsec'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="services">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Unsere Leistungen', 'specsec'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Professionelle Sicherheit für Ihre Veranstaltung', 'specsec'); ?></p>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3><?php echo esc_html(specsec_get_customizer_option('specsec_vsd_title', 'Veranstaltungssicherheitsdienste (VSD)')); ?></h3>
                <p><?php echo esc_html(specsec_get_customizer_option('specsec_vsd_description', 'Risikoanalyse, Personal-Konzepte und reibungslose Abläufe für Ihre Veranstaltung.')); ?></p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3><?php echo esc_html(specsec_get_customizer_option('specsec_vod_title', 'Veranstaltungsordnungsdienste (VOD)')); ?></h3>
                <p><?php echo esc_html(specsec_get_customizer_option('specsec_vod_description', 'Besucherservice, Engagement und professionelles Crowd Management.')); ?></p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h3><?php echo esc_html(specsec_get_customizer_option('specsec_projektierung_title', 'Projektierung')); ?></h3>
                <p><?php echo esc_html(specsec_get_customizer_option('specsec_projektierung_description', 'Anforderungsanalyse, Flächenplanung und maßgeschneiderte Personalkonzepte.')); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="statistics-section" id="statistics">
    <div class="container">
        <div class="statistics-grid">
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(specsec_get_customizer_option('specsec_employees', '780')); ?></div>
                <div class="stat-label"><?php esc_html_e('Mitarbeiter', 'specsec'); ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(specsec_get_customizer_option('specsec_events', '2000+')); ?></div>
                <div class="stat-label"><?php esc_html_e('Veranstaltungen/Jahr', 'specsec'); ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html(specsec_get_customizer_option('specsec_experience', '41')); ?></div>
                <div class="stat-label"><?php esc_html_e('Jahre Erfahrung', 'specsec'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Was unsere Kunden sagen', 'specsec'); ?></h2>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text"><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial1_text', 'Das hohe Maß an Vertrauen, das ich in die Arbeit von SpecSec habe, führt dazu, dass ich ausschließlich mit ihnen arbeite - und das seit 1990.')); ?></p>
                    <div class="testimonial-author">
                        <strong><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial1_name', 'Marek Lieberberg')); ?></strong>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text"><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial2_text', 'Ich hatte sofort das Gefühl, dass meine Sicherheit in guten Händen ist. Professionell und menschlich zugleich.')); ?></p>
                    <div class="testimonial-author">
                        <strong><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial2_name', 'Herbert Grönemeyer')); ?></strong>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text"><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial3_text', 'Exzellente Arbeit und höchste Professionalität. Ich fühle mich sicher und gut betreut.')); ?></p>
                    <div class="testimonial-author">
                        <strong><?php echo esc_html(specsec_get_customizer_option('specsec_testimonial3_name', 'Luciano Pavarotti')); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="cta">
    <div class="container">
        <div class="cta-content">
            <h2><?php esc_html_e('Du willst Karriere machen?', 'specsec'); ?></h2>
            <p><?php esc_html_e('Werde Teil unseres professionellen Teams und gestalte die Zukunft der Veranstaltungssicherheit mit.', 'specsec'); ?></p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('karriere'))); ?>" class="btn btn-primary">
                    <?php esc_html_e('Jetzt bewerben', 'specsec'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>" class="btn btn-secondary">
                    <?php esc_html_e('Kontakt aufnehmen', 'specsec'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3><?php esc_html_e('Geschulte Profis', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Vorausschauend und souverän - alle Mitarbeiter durchlaufen kontinuierliche Schulungen.', 'safe-cologne'); ?></p>
            </article>
            
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-satellite-dish"></i>
                </div>
                <h3><?php esc_html_e('Moderne Technik', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('GPS-Tracking, Funk und Echtzeit-Kommunikation für kluge Koordination.', 'safe-cologne'); ?></p>
            </article>
            
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3><?php esc_html_e('Verlässliche Planung', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Detaillierte Dokumentation für nachvollziehbare Sicherheit.', 'safe-cologne'); ?></p>
            </article>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php get_template_part('template-parts/services', 'grid'); ?>

<!-- Why Choose Us Section -->
<section class="section why-us" aria-labelledby="why-title">
    <div class="container">
        <h2 id="why-title" class="section-title"><?php esc_html_e('Warum Safe Cologne?', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Ihre Sicherheit ist unsere Mission', 'safe-cologne'); ?></p>
        
        <div class="why-grid">
            <div class="why-card">
                <div class="why-number">01</div>
                <h3><?php esc_html_e('Erfahrung & Expertise', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Über 15 Jahre Erfahrung in der Sicherheitsbranche mit einem Team von über 100 qualifizierten Mitarbeitern.', 'safe-cologne'); ?></p>
            </div>
            
            <div class="why-card">
                <div class="why-number">02</div>
                <h3><?php esc_html_e('24/7 Verfügbarkeit', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Rund um die Uhr für Sie erreichbar - 365 Tage im Jahr. Schnelle Reaktionszeiten garantiert.', 'safe-cologne'); ?></p>
            </div>
            
            <div class="why-card">
                <div class="why-number">03</div>
                <h3><?php esc_html_e('Individuelle Konzepte', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Maßgeschneiderte Sicherheitslösungen, die perfekt auf Ihre Bedürfnisse abgestimmt sind.', 'safe-cologne'); ?></p>
            </div>
            
            <div class="why-card">
                <div class="why-number">04</div>
                <h3><?php esc_html_e('Faire Preise', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Transparente Preisgestaltung ohne versteckte Kosten. Beste Qualität zu fairen Konditionen.', 'safe-cologne'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner">
    <div class="container">
        <div class="cta-content">
            <h2><?php esc_html_e('Sicherheit beginnt mit einem Gespräch', 'safe-cologne'); ?></h2>
            <p><?php esc_html_e('Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln.', 'safe-cologne'); ?></p>
            <div class="cta-buttons">
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
