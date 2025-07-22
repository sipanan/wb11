<?php
/**
 * SafeCologne Header - Clean Professional Design
 * @package Safe_Cologne
 * @version 4.0.0
 */

// Theme options
$cta_text = get_theme_mod('safe_cologne_cta_text', 'Kontakt aufnehmen');
$cta_url = get_theme_mod('safe_cologne_cta_url', '/kontakt/');
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/SecurityCompany">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Favicon Package -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/site.webmanifest'); ?>">
    <meta name="msapplication-TileColor" content="#E2001A">
    <meta name="theme-color" content="#ffffff">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Accessibility Skip Link -->
<a href="#main-content" class="skip-link screen-reader-text"><?php esc_html_e('Zum Hauptinhalt springen', 'safe-cologne'); ?></a>

<!-- Clean Professional Header -->
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
            
            <!-- Single CTA Section -->
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

<!-- Clean Mobile Navigation -->
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
            <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="sc-mobile-cta-button">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</div>

<!-- Clean Professional CSS -->
<style>
/* === SAFECOLOGNE PROFESSIONAL THEME === */
:root {
    --sc-primary: #E2001A;
    --sc-primary-dark: #C2050F;
    --sc-white: #FFFFFF;
    --sc-black: #1A1A1A;
    --sc-gray-100: #F8F9FA;
    --sc-gray-200: #E9ECEF;
    --sc-gray-300: #DEE2E6;
    --sc-gray-600: #6C757D;
    --sc-gray-900: #212529;
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
    font-family: 'Montserrat', system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    line-height: 1.6;
    color: var(--sc-black);
    background: var(--sc-white);
    padding-top: var(--sc-header-height);
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

/* === MAIN HEADER === */
.sc-header {
    position: fixed;
    top: 0;
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
    box-shadow: 0 4px 12px rgba(226, 0, 26, 0.2);
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
    background: rgba(226, 0, 26, 0.08);
}

.sc-nav-menu .current-menu-item > a,
.sc-nav-menu .current_page_item > a {
    color: var(--sc-primary);
    background: rgba(226, 0, 26, 0.1);
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
    box-shadow: 0 4px 15px rgba(226, 0, 26, 0.25);
    transition: var(--sc-transition);
    white-space: nowrap;
}

.sc-cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(226, 0, 26, 0.35);
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
    background: rgba(226, 0, 26, 0.1);
    color: var(--sc-primary);
    font-weight: 600;
}

.sc-mobile-cta {
    padding-top: 20px;
    border-top: 1px solid var(--sc-gray-200);
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
    box-shadow: 0 4px 15px rgba(226, 0, 26, 0.2);
    transition: var(--sc-transition);
}

.sc-mobile-cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(226, 0, 26, 0.3);
    color: var(--sc-white);
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
}

/* === FOCUS STATES === */
.sc-logo:focus,
.sc-nav-menu a:focus,
.sc-cta-button:focus,
.sc-mobile-toggle:focus,
.sc-mobile-close:focus,
.sc-mobile-menu-list a:focus,
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
    .sc-header {
        position: relative;
        top: 0;
        box-shadow: none;
    }
    
    body {
        padding-top: 0 !important;
    }
    
    .sc-mobile-toggle,
    .sc-cta-section {
        display: none !important;
    }
}
</style>

<!-- Clean Professional JavaScript -->
<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        const mobileToggle = document.getElementById('mobile-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        const mobileClose = document.getElementById('mobile-close');
        const body = document.body;
        
        function toggleMobileMenu(show) {
            if (!mobileToggle || !mobileNav) return;
            
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
            if (window.innerWidth > 1024 && mobileToggle && mobileToggle.getAttribute('aria-expanded') === 'true') {
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