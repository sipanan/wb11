<?php
/**
 * The front page template - Clean & Simple
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_hero_title', 'Sicherheit mit Herz & System')); ?>
        </h1>
        <p class="hero-subtitle">
            <?php echo esc_html(get_theme_mod('safe_cologne_hero_subtitle', 'Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln')); ?>
        </p>
        <a href="<?php echo esc_url(get_theme_mod('safe_cologne_hero_button_url', '/kontakt/')); ?>" class="hero-cta">
            <?php echo esc_html(get_theme_mod('safe_cologne_hero_button_text', 'Jetzt Kontakt aufnehmen')); ?>
        </a>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_features_title', 'Was uns besonders macht')); ?>
        </h2>
        <p class="section-subtitle">
            <?php echo esc_html(get_theme_mod('safe_cologne_features_subtitle', 'Professionelle Sicherheit mit menschlichem Ansatz')); ?>
        </p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">24/7 Sicherheit</h3>
                <p class="feature-description">
                    Rund um die Uhr professionelle Sicherheitsdienstleistungen für Ihr Unternehmen.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Erfahrenes Team</h3>
                <p class="feature-description">
                    Hochqualifizierte Sicherheitsfachkräfte mit langjähriger Erfahrung.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="feature-title">Menschlicher Ansatz</h3>
                <p class="feature-description">
                    Sicherheit mit Herz - wir behandeln jeden Kunden individuell und persönlich.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Unsere Dienstleistungen</h2>
        <p class="section-subtitle">Professionelle Sicherheitslösungen für jeden Bedarf</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="feature-title">Objektschutz</h3>
                <p class="feature-description">
                    Professioneller Schutz für Ihre Gebäude und Anlagen.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="feature-title">Sicherheitsdienst</h3>
                <p class="feature-description">
                    Umfassende Sicherheitsdienstleistungen für Events und Veranstaltungen.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3 class="feature-title">Videoüberwachung</h3>
                <p class="feature-description">
                    Moderne Überwachungstechnik für maximale Sicherheit.
                </p>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 3rem;">
            <a href="/dienstleistungen/" class="btn">Alle Dienstleistungen ansehen</a>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2 class="section-title">Bereit für mehr Sicherheit?</h2>
            <p class="section-subtitle">
                Kontaktieren Sie uns für eine individuelle Beratung und ein maßgeschneidertes Sicherheitskonzept.
            </p>
            <a href="/kontakt/" class="btn" style="margin-right: 1rem;">Jetzt Kontakt aufnehmen</a>
            <a href="tel:022165058801" class="btn btn-outline">0221 6505 8801</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
