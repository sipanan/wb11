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
$phone = get_option('safe_cologne_settings')['phone'] ?? '0221 65058801';
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
            <a href="#kontakt" class="btn btn-primary btn-lg">
                <i class="fas fa-shield-alt"></i>
                <?php esc_html_e('Kostenlose Beratung', 'safe-cologne'); ?>
            </a>
            <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="btn btn-white btn-lg">
                <i class="fas fa-phone-alt"></i>
                <?php echo esc_html($phone); ?>
            </a>
        </div>
        
        <!-- Trust Indicators -->
        <div class="trust-indicators">
            <div class="indicator">
                <i class="fas fa-clock"></i>
                <strong>24/7</strong>
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
