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
                <h3><?php esc_html_e('Rund um die Uhr Verfügbarkeit', 'safe-cologne'); ?></h3>
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

<!-- Trust & Quality Section -->
<section class="trust-quality-section">
    <div class="container">
        <div class="trust-content">
            <h2><?php esc_html_e('Vertrauen durch Qualität', 'safe-cologne'); ?></h2>
            <p><?php esc_html_e('Seit über 15 Jahren stehen wir für höchste Sicherheitsstandards in Köln und Umgebung.', 'safe-cologne'); ?></p>
            <div class="trust-stats">
                <div class="trust-stat">
                    <strong>98%</strong>
                    <span>Kundenzufriedenheit</span>
                </div>
                <div class="trust-stat">
                    <strong>500+</strong>
                    <span>Projekte erfolgreich</span>
                </div>
                <div class="trust-stat">
                    <strong>15+</strong>
                    <span>Jahre Erfahrung</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.trust-quality-section {
    background: linear-gradient(135deg, #E30613 0%, #C2050F 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.trust-content h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 800;
}

.trust-content p {
    font-size: 1.25rem;
    margin-bottom: 3rem;
    opacity: 0.9;
}

.trust-stats {
    display: flex;
    justify-content: center;
    gap: 4rem;
    flex-wrap: wrap;
}

.trust-stat {
    text-align: center;
}

.trust-stat strong {
    display: block;
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.trust-stat span {
    font-size: 1rem;
    opacity: 0.8;
}

.values-section {
    background: #F9FAFB;
    padding: 80px 0;
}

.values-section h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 3rem;
    color: #111827;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.value-item {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.value-item:hover {
    transform: translateY(-4px);
}

.value-item h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: #E30613;
}

.value-item p {
    color: #6B7280;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .trust-stats {
        gap: 2rem;
    }
    
    .trust-stat strong {
        font-size: 2.5rem;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
}
</style>

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

<!-- Company Values Section -->
<section class="values-section">
    <div class="container">
        <h2><?php esc_html_e('Unsere Werte', 'safe-cologne'); ?></h2>
        <div class="values-grid">
            <div class="value-item">
                <h3><?php esc_html_e('Zuverlässigkeit', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Pünktlich, präzise und verlässlich - darauf können Sie sich verlassen.', 'safe-cologne'); ?></p>
            </div>
            <div class="value-item">
                <h3><?php esc_html_e('Professionalität', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Geschulte Mitarbeiter mit jahrelanger Erfahrung im Sicherheitsdienst.', 'safe-cologne'); ?></p>
            </div>
            <div class="value-item">
                <h3><?php esc_html_e('Transparenz', 'safe-cologne'); ?></h3>
                <p><?php esc_html_e('Klare Kommunikation und nachvollziehbare Preisgestaltung.', 'safe-cologne'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
