<?php
/**
 * Hero Section Template Part
 *
 * @package Safe_Cologne
 */

$hero_title = get_theme_mod('safe_cologne_hero_title', 'Safe Cologne');
$hero_subtitle = get_theme_mod('safe_cologne_hero_subtitle', 'Ihr Sicherheitsdienst mit Herz & System');
$hero_description = get_theme_mod('safe_cologne_hero_description', 'Sicherheit beginnt mit Vertrauen. Bei Safe Cologne steht Ihre Sicherheit an erster Stelle – zuverlässig, empathisch und professionell.');
$hero_bg = get_theme_mod('safe_cologne_hero_bg');
$cta_text = get_theme_mod('safe_cologne_cta_text', 'Kostenlose Beratung');
$cta_url = get_theme_mod('safe_cologne_cta_url', '/kontakt/');
?>

<header class="hero" role="banner">
    <div class="hero-pattern"></div>
    <?php if ($hero_bg) : ?>
        <img src="<?php echo esc_url($hero_bg); ?>" alt="<?php echo esc_attr($hero_title); ?>" class="hero-bg" loading="eager">
    <?php endif; ?>
    
    <div class="hero-content">
        <div class="trust-badge">
            <i class="fas fa-shield-alt"></i>
            <span><?php esc_html_e('Zertifizierter Sicherheitsdienst', 'safe-cologne'); ?></span>
        </div>
        
        <h1 class="hero-title">
            <?php echo esc_html($hero_title); ?>
            <span class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></span>
        </h1>
        
        <p class="hero-description">
            <?php echo esc_html($hero_description); ?>
        </p>
        
        <div class="hero-cta">
            <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-shield-alt"></i>
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
        
        <!-- Trust Indicators -->
        <div class="trust-indicators">
            <div class="indicator">
                <i class="fas fa-clock"></i>
                <strong><?php esc_html_e('Rund um die Uhr', 'safe-cologne'); ?></strong>
                <span><?php esc_html_e('Verfügbar', 'safe-cologne'); ?></span>
            </div>
            <div class="indicator">
                <i class="fas fa-users"></i>
                <strong>100+</strong>
                <span><?php esc_html_e('Mitarbeiter', 'safe-cologne'); ?></span>
            </div>
            <div class="indicator">
                <i class="fas fa-award"></i>
                <strong>15+</strong>
                <span><?php esc_html_e('Jahre Erfahrung', 'safe-cologne'); ?></span>
            </div>
            <div class="indicator">
                <i class="fas fa-star"></i>
                <strong>5.0</strong>
                <span><?php esc_html_e('Bewertung', 'safe-cologne'); ?></span>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator" aria-hidden="true">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
    </div>
</header>
