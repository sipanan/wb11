<?php
/**
 * Elite SafeCologne Header - Production Grade
 * Current Date: 2025-07-14 09:43:54 UTC
 * Current User: sipanan
 * 
 * Built for conversion, performance, and scalability
 * @package Safe_Cologne
 * @version 3.0.0
 */

// Performance: Cache theme options
$phone_number = get_theme_mod('safe_cologne_phone', '0221 6505 8801');
$emergency_text = get_theme_mod('safe_cologne_emergency', '24/7 Notdienst');
$cta_text = get_theme_mod('safe_cologne_cta_text', 'Kontakt aufnehmen');
$cta_url = get_theme_mod('safe_cologne_cta_url', '/kontakt/');
$show_topbar = get_theme_mod('safe_cologne_show_topbar', true);
$current_datetime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/SecurityCompany">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- DNS Prefetch for Performance -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Preconnect Critical Resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Favicon Package -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/site.webmanifest'); ?>">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="theme-color" content="#ffffff">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Accessibility Skip Link -->
<a href="#main-content" class="skip-link screen-reader-text"><?php esc_html_e('Zum Hauptinhalt springen', 'safe-cologne'); ?></a>

<?php if ($show_topbar) : ?>
<!-- Elite Top Bar -->
<div class="sc-topbar" role="banner">
    <div class="sc-container">
        <div class="sc-topbar-left">
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_number)); ?>" class="sc-emergency-call">
                <svg class="sc-icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1z"/>
                </svg>
                <span><?php echo esc_html($phone_number); ?></span>
                <strong><?php echo esc_html($emergency_text); ?></strong>
            </a>
            
            <div class="sc-datetime">
                <svg class="sc-icon" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                    <path fill="currentColor" d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                </svg>
                <span><?php echo esc_html($current_datetime); ?></span>
            </div>
        </div>
        
        <div class="sc-topbar-right">
            <!-- Social Proof -->
            <?php if ($facebook = get_theme_mod('safe_cologne_facebook')) : ?>
                <a href="<?php echo esc_url($facebook); ?>" class="sc-social-link" aria-label="Facebook" rel="noopener noreferrer" target="_blank">
                    <svg class="sc-icon" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.514c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.738-.9 10.126-5.864 10.126-11.854z"/>
                    </svg>
                </a>
            <?php endif; ?>
            
            <?php if ($instagram = get_theme_mod('safe_cologne_instagram')) : ?>
                <a href="<?php echo esc_url($instagram); ?>" class="sc-social-link" aria-label="Instagram" rel="noopener noreferrer" target="_blank">
                    <svg class="sc-icon" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
            <?php endif; ?>
            
            <?php if ($linkedin = get_theme_mod('safe_cologne_linkedin')) : ?>
                <a href="<?php echo esc_url($linkedin); ?>" class="sc-social-link" aria-label="LinkedIn" rel="noopener noreferrer" target="_blank">
                    <svg class="sc-icon" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667h-3.554v-11.452h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zm-15.11-13.019c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019h-3.564v-11.452h3.564v11.452zm15.106-20.452h-20.454c-.979 0-1.771.774-1.771 1.729v20.542c0 .956.792 1.729 1.771 1.729h20.451c.978 0 1.778-.773 1.778-1.729v-20.542c0-.955-.8-1.729-1.778-1.729z"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Elite Main Header -->
<header class="sc-header" id="masthead" role="banner">
    <div class="sc-container">
        <div class="sc-header-inner">
            <!-- Logo Section -->
            <div class="sc-logo-section">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="sc-logo" aria-label="<?php esc_attr(bloginfo('name')); ?> - <?php esc_attr_e('Startseite', 'safe-cologne'); ?>">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="sc-logo-fallback">
                            <div class="sc-logo-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="sc-logo-text">
                                <span class="sc-brand-name"><?php bloginfo('name'); ?></span>
                                <span class="sc-brand-tagline"><?php bloginfo('description'); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
            
            <!-- Navigation Section -->
            <nav class="sc-nav-section" role="navigation" aria-label="<?php esc_attr_e('Hauptnavigation', 'safe-cologne'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'sc-nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'sc_nav_fallback',
                    'depth'          => 2,
                ));
                ?>
            </nav>
            
            <!-- CTA Section -->
            <div class="sc-cta-section">
                <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="sc-cta-button">
                    <span><?php echo esc_html($cta_text); ?></span>
                    <svg class="sc-cta-icon" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </a>
            </div>
            
            <!-- Mobile Toggle -->
            <button class="sc-mobile-toggle" id="mobile-toggle" aria-label="<?php esc_attr_e('Menü öffnen', 'safe-cologne'); ?>" aria-expanded="false" aria-controls="mobile-nav">
                <span class="sc-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
</header>

<!-- Elite Mobile Navigation -->
<div class="sc-mobile-nav" id="mobile-nav" aria-hidden="true" role="navigation" aria-label="<?php esc_attr_e('Mobile Navigation', 'safe-cologne'); ?>">
    <div class="sc-mobile-nav-inner">
        <div class="sc-mobile-header">
            <div class="sc-mobile-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="sc-mobile-brand"><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </div>
            <button class="sc-mobile-close" id="mobile-close" aria-label="<?php esc_attr_e('Menü schließen', 'safe-cologne'); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </div>
        
        <div class="sc-mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'sc-mobile-menu-list',
                'container'      => false,
                'fallback_cb'    => 'sc_mobile_nav_fallback',
                'depth'          => 2,
            ));
            ?>
        </div>
        
        <div class="sc-mobile-cta">
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_number)); ?>" class="sc-mobile-phone">
                <svg class="sc-icon" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1z"/>
                </svg>
                <span><?php echo esc_html($phone_number); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="sc-mobile-cta-button">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</div>

<!-- Production-Grade CSS -->
<style>
/* === CRITICAL CSS - ABOVE THE FOLD === */
:root {
    --sc-primary: #E30613;
    --sc-primary-dark: #C2050F;
    --sc-white: #FFFFFF;
    --sc-black: #1A1A1A;
    --sc-gray-100: #F8F9FA;
    --sc-gray-200: #E9ECEF;
    --sc-gray-300: #DEE2E6;
    --sc-gray-600: #6C757D;
    --sc-gray-900: #212529;
    --sc-topbar-height: 40px;
    --sc-header-height: 80px;
    --sc-header-mobile-height: 70px;
    --sc-container-width: 1200px;
    --sc-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --sc-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    --sc-border-radius: 8px;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    line-height: 1.6;
    color: var(--sc-black);
    background: var(--sc-white);
}

/* === CONTAINER SYSTEM === */
.sc-container {
    max-width: var(--sc-container-width);
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
}

/* === SKIP LINK === */
.skip-link {
    position: absolute;
    top: -100px;
    left: 0;
    background: var(--sc-primary);
    color: var(--sc-white);
    padding: 10px 20px;
    text-decoration: none;
    font-weight: 600;
    z-index: 100000;
    transition: top 0.3s ease;
    border-radius: 0 0 var(--sc-border-radius) 0;
}

.skip-link:focus {
    top: 0;
}

/* === TOP BAR === */
.sc-topbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: var(--sc-topbar-height);
    background: var(--sc-primary);
    color: var(--sc-white);
    z-index: 10001;
    font-size: 0.875rem;
}

.sc-topbar .sc-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
}

.sc-topbar-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.sc-emergency-call {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--sc-white);
    text-decoration: none;
    font-weight: 500;
    transition: var(--sc-transition);
}

.sc-emergency-call:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.sc-emergency-call strong {
    margin-left: 8px;
    padding: 2px 8px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 4px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sc-datetime {
    display: flex;
    align-items: center;
    gap: 6px;
    opacity: 0.9;
    font-size: 0.8125rem;
}

.sc-topbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.sc-social-link {
    color: var(--sc-white);
    opacity: 0.9;
    transition: var(--sc-transition);
    padding: 5px;
}

.sc-social-link:hover {
    opacity: 1;
    transform: translateY(-2px);
}

.sc-icon {
    display: inline-block;
    vertical-align: middle;
    flex-shrink: 0;
}

/* === MAIN HEADER === */
.sc-header {
    position: fixed;
    top: var(--sc-topbar-height);
    left: 0;
    right: 0;
    height: var(--sc-header-height);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: var(--sc-shadow);
    z-index: 10000;
    transition: var(--sc-transition);
}

.sc-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
}

/* === LOGO SECTION === */
.sc-logo-section {
    flex: 0 0 auto;
}

.sc-logo {
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: var(--sc-transition);
}

.sc-logo:hover {
    opacity: 0.9;
}

.sc-logo-fallback {
    display: flex;
    align-items: center;
    gap: 12px;
}

.sc-logo-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--sc-primary) 0%, var(--sc-primary-dark) 100%);
    border-radius: var(--sc-border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--sc-white);
    box-shadow: 0 4px 12px rgba(227, 6, 19, 0.2);
}

.sc-logo-text {
    display: flex;
    flex-direction: column;
}

.sc-brand-name {
    font-size: 1.375rem;
    font-weight: 700;
    color: var(--sc-black);
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.sc-brand-tagline {
    font-size: 0.75rem;
    color: var(--sc-gray-600);
    line-height: 1.2;
}

/* === NAVIGATION SECTION === */
.sc-nav-section {
    flex: 1 1 auto;
    display: flex;
    justify-content: center;
    margin: 0 40px;
}

.sc-nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 8px;
}

.sc-nav-menu li {
    position: relative;
}

.sc-nav-menu a {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    color: var(--sc-black);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9375rem;
    border-radius: var(--sc-border-radius);
    transition: var(--sc-transition);
}

.sc-nav-menu a:hover {
    color: var(--sc-primary);
    background: rgba(227, 6, 19, 0.08);
}

.sc-nav-menu .current-menu-item > a,
.sc-nav-menu .current_page_item > a {
    color: var(--sc-primary);
    background: rgba(227, 6, 19, 0.1);
    font-weight: 600;
}

/* === CTA SECTION === */
.sc-cta-section {
    flex: 0 0 auto;
}

.sc-cta-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: linear-gradient(135deg, var(--sc-primary) 0%, var(--sc-primary-dark) 100%);
    color: var(--sc-white);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9375rem;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(227, 6, 19, 0.25);
    transition: var(--sc-transition);
    white-space: nowrap;
}

.sc-cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(227, 6, 19, 0.35);
    color: var(--sc-white);
}

/* === MOBILE TOGGLE === */
.sc-mobile-toggle {
    display: none;
    background: none;
    border: none;
    padding: 8px;
    cursor: pointer;
    -webkit-tap-highlight-color: transparent;
}

.sc-hamburger {
    width: 24px;
    height: 18px;
    position: relative;
    display: block;
}

.sc-hamburger span {
    display: block;
    position: absolute;
    width: 100%;
    height: 2px;
    background: var(--sc-black);
    border-radius: 2px;
    transition: var(--sc-transition);
}

.sc-hamburger span:nth-child(1) { top: 0; }
.sc-hamburger span:nth-child(2) { top: 50%; transform: translateY(-50%); }
.sc-hamburger span:nth-child(3) { bottom: 0; }

/* Active hamburger state */
.sc-mobile-toggle[aria-expanded="true"] .sc-hamburger span:nth-child(1) {
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
}

.sc-mobile-toggle[aria-expanded="true"] .sc-hamburger span:nth-child(2) {
    opacity: 0;
}

.sc-mobile-toggle[aria-expanded="true"] .sc-hamburger span:nth-child(3) {
    bottom: 50%;
    transform: translateY(50%) rotate(-45deg);
}

/* === MOBILE NAVIGATION === */
.sc-mobile-nav {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    max-width: 380px;
    height: 100vh;
    background: var(--sc-white);
    z-index: 10002;
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
    overflow-y: auto;
    box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
}

.sc-mobile-nav[aria-hidden="false"] {
    transform: translateX(0);
}

.sc-mobile-nav-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 20px;
}

.sc-mobile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--sc-gray-200);
}

.sc-mobile-brand {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--sc-black);
}

.sc-mobile-close {
    background: none;
    border: none;
    color: var(--sc-black);
    padding: 8px;
    cursor: pointer;
    border-radius: var(--sc-border-radius);
    transition: var(--sc-transition);
}

.sc-mobile-close:hover {
    background: var(--sc-gray-100);
}

.sc-mobile-menu {
    flex: 1;
    margin-bottom: 30px;
}

.sc-mobile-menu-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.sc-mobile-menu-list li {
    margin-bottom: 5px;
}

.sc-mobile-menu-list a {
    display: block;
    padding: 15px 20px;
    color: var(--sc-black);
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    border-radius: var(--sc-border-radius);
    transition: var(--sc-transition);
}

.sc-mobile-menu-list a:hover {
    background: var(--sc-gray-100);
    color: var(--sc-primary);
}

.sc-mobile-menu-list .current-menu-item > a {
    background: rgba(227, 6, 19, 0.1);
    color: var(--sc-primary);
    font-weight: 600;
}

.sc-mobile-cta {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding-top: 20px;
    border-top: 1px solid var(--sc-gray-200);
}

.sc-mobile-phone {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--sc-black);
    text-decoration: none;
    font-weight: 500;
    padding: 12px 16px;
    background: var(--sc-gray-100);
    border-radius: var(--sc-border-radius);
    transition: var(--sc-transition);
}

.sc-mobile-phone:hover {
    background: var(--sc-gray-200);
}

.sc-mobile-cta-button {
    display: block;
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, var(--sc-primary) 0%, var(--sc-primary-dark) 100%);
    color: var(--sc-white);
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(227, 6, 19, 0.2);
    transition: var(--sc-transition);
}

.sc-mobile-cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(227, 6, 19, 0.3);
    color: var(--sc-white);
}

/* === BODY OFFSET === */
body {
    padding-top: calc(var(--sc-topbar-height) + var(--sc-header-height));
}

body.mobile-menu-open {
    overflow: hidden;
}

/* === RESPONSIVE === */
@media (max-width: 1024px) {
    .sc-nav-section {
        display: none;
    }
    
    .sc-cta-section {
        display: none;
    }
    
    .sc-mobile-toggle {
        display: block;
    }
}

@media (max-width: 768px) {
    :root {
        --sc-header-height: var(--sc-header-mobile-height);
    }
    
    .sc-topbar-right {
        display: none;
    }
    
    .sc-datetime {
        display: none;
    }
    
    .sc-brand-tagline {
        display: none;
    }
    
    .sc-logo-icon {
        width: 36px;
        height: 36px;
    }
    
    .sc-brand-name {
        font-size: 1.25rem;
    }
    
    .sc-mobile-nav {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .sc-container {
        padding: 0 15px;
    }
    
    .sc-topbar-left {
        gap: 15px;
    }
    
    .sc-emergency-call strong {
        display: none;
    }
}

/* === FOCUS STATES === */
.sc-logo:focus,
.sc-nav-menu a:focus,
.sc-cta-button:focus,
.sc-mobile-toggle:focus,
.sc-emergency-call:focus,
.sc-social-link:focus,
.sc-mobile-close:focus,
.sc-mobile-menu-list a:focus,
.sc-mobile-phone:focus,
.sc-mobile-cta-button:focus {
    outline: 2px solid var(--sc-primary);
    outline-offset: 2px;
}

/* === SCREEN READER === */
.screen-reader-text {
    position: absolute !important;
    clip: rect(1px, 1px, 1px, 1px);
    padding: 0 !important;
    border: 0 !important;
    height: 1px !important;
    width: 1px !important;
    overflow: hidden;
}

/* === PRINT === */
@media print {
    .sc-topbar,
    .sc-header {
        position: relative;
        top: 0;
        box-shadow: none;
    }
    
    body {
        padding-top: 0 !important;
    }
    
    .sc-mobile-toggle,
    .sc-cta-section,
    .sc-topbar-right {
        display: none !important;
    }
}
</style>

<!-- Elite JavaScript -->
<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const mobileToggle = document.getElementById('mobile-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        const mobileClose = document.getElementById('mobile-close');
        const body = document.body;
        
        function toggleMobileMenu(show) {
            mobileToggle.setAttribute('aria-expanded', show);
            mobileNav.setAttribute('aria-hidden', !show);
            body.classList.toggle('mobile-menu-open', show);
            
            mobileToggle.setAttribute('aria-label', 
                show ? '<?php esc_attr_e('Menü schließen', 'safe-cologne'); ?>' : '<?php esc_attr_e('Menü öffnen', 'safe-cologne'); ?>'
            );
        }
        
        if (mobileToggle && mobileNav) {
            mobileToggle.addEventListener('click', function() {
                const isOpen = this.getAttribute('aria-expanded') === 'true';
                toggleMobileMenu(!isOpen);
            });
            
            if (mobileClose) {
                mobileClose.addEventListener('click', function() {
                    toggleMobileMenu(false);
                    mobileToggle.focus();
                });
            }
            
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileToggle.getAttribute('aria-expanded') === 'true') {
                    toggleMobileMenu(false);
                    mobileToggle.focus();
                }
            });
            
            document.addEventListener('click', function(e) {
                if (mobileToggle.getAttribute('aria-expanded') === 'true' && 
                    !mobileNav.contains(e.target) && 
                    !mobileToggle.contains(e.target)) {
                    toggleMobileMenu(false);
                }
            });
        }
        
        // Close mobile menu on resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024 && mobileToggle.getAttribute('aria-expanded') === 'true') {
                toggleMobileMenu(false);
            }
        });
    });
})();
</script>

<main id="main-content" class="site-main" role="main">
<?php
// Fallback nav functions
function sc_nav_fallback() {
    echo '<ul class="sc-nav-menu"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'safe-cologne') . '</a></li></ul>';
}

function sc_mobile_nav_fallback() {
    echo '<ul class="sc-mobile-menu-list"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'safe-cologne') . '</a></li></ul>';
}
?>