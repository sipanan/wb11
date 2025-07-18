<?php
/**
 * The front page template
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Hero Section -->
<?php get_template_part('template-parts/hero', 'section'); ?>

<!-- Features Section -->
<section class="section features" aria-labelledby="features-title">
    <div class="container">
        <h2 id="features-title" class="section-title"><?php esc_html_e('Was uns besonders macht', 'safe-cologne'); ?></h2>
        <p class="section-subtitle">
            <?php esc_html_e('Professionelle Sicherheit mit menschlichem Ansatz', 'safe-cologne'); ?>
        </p>
        
        <div class="features-grid">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3><?php esc_html_e('Diskretion & Menschenkenntnis', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Wir handeln respektvoll und deeskalierend. Unsere Profis arbeiten mit Fingerspitzengefühl.', 'safe-cologne'); ?></p>
            </article>
            
            <article class="feature-card">
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
                <h3><?php esc_html_e('Höchste Qualität', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Kontinuierliche Schulungen und modernste Ausrüstung für optimale Ergebnisse.', 'safe-cologne'); ?></p>
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
        
        <div class="career-info">
            <p><?php esc_html_e('Bei uns bist du mehr als ein Ordnungsdienst – du bist Sicherheitsgastgeber!', 'safe-cologne'); ?></p>
            <p><a href="<?php echo esc_url(get_permalink(get_page_by_path('karriere'))); ?>" class="text-link"><?php esc_html_e('Mehr über Karrieremöglichkeiten erfahren', 'safe-cologne'); ?></a></p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<?php get_template_part('template-parts/contact', 'form'); ?>

<?php get_footer(); ?>
