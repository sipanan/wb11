<?php
/**
 * SafeCologne Header - Clean & Professional
 * 
 * @package Safe_Cologne
 * @version 4.0.0
 */

// Simple theme options
$cta_text = get_theme_mod('safe_cologne_cta_text', 'Kontakt aufnehmen');
$cta_url = get_theme_mod('safe_cologne_cta_url', '/kontakt/');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-32x32.png'); ?>">
    <meta name="theme-color" content="#E30613">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link for Accessibility -->
<a href="#main-content" class="skip-link screen-reader-text"><?php esc_html_e('Zum Hauptinhalt springen', 'safe-cologne'); ?></a>

<!-- Main Header -->
<header class="site-header" role="banner">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="logo-fallback">
                            <div class="logo-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div class="logo-text">
                                <span class="brand-name"><?php bloginfo('name'); ?></span>
                                <span class="tagline"><?php bloginfo('description'); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
            
            <!-- Navigation -->
            <nav class="main-nav" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => '__return_false',
                ));
                ?>
            </nav>
            
            <!-- Single CTA -->
            <div class="header-cta">
                <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="btn-primary">
                    <?php echo esc_html($cta_text); ?>
                </a>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" aria-label="Menü öffnen" aria-expanded="false">
                <span class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation -->
<div class="mobile-nav" aria-hidden="true">
    <div class="mobile-nav-content">
        <div class="mobile-header">
            <div class="mobile-logo">
                <span><?php bloginfo('name'); ?></span>
            </div>
            <button class="mobile-close" aria-label="Menü schließen">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </div>
        
        <div class="mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'mobile-menu-list',
                'container'      => false,
                'fallback_cb'    => '__return_false',
            ));
            ?>
        </div>
        
        <div class="mobile-cta">
            <a href="<?php echo esc_url(home_url($cta_url)); ?>" class="btn-primary btn-block">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</div>

<!-- Clean Header Styles -->
<style>
/* CSS Variables */
:root {
    --primary-color: #E30613;
    --primary-dark: #C2050F;
    --text-color: #1A1A1A;
    --text-muted: #6C757D;
    --bg-white: #FFFFFF;
    --bg-light: #F8F9FA;
    --border-color: #DEE2E6;
    --header-height: 70px;
    --container-width: 1200px;
    --border-radius: 6px;
    --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
}

/* Reset */
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background: var(--bg-white);
    padding-top: var(--header-height);
}

/* Container */
.container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 20px;
}

/* Skip Link */
.skip-link {
    position: absolute;
    top: -100px;
    left: 0;
    background: var(--primary-color);
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    z-index: 10000;
}

.skip-link:focus {
    top: 0;
}

/* Header */
.site-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: var(--header-height);
    background: var(--bg-white);
    box-shadow: var(--shadow);
    z-index: 1000;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
}

/* Logo */
.site-logo a {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-fallback {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-icon {
    width: 32px;
    height: 32px;
    background: var(--primary-color);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.brand-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-color);
}

.tagline {
    font-size: 0.75rem;
    color: var(--text-muted);
    display: block;
}

/* Navigation */
.main-nav {
    flex: 1;
    display: flex;
    justify-content: center;
    margin: 0 40px;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 5px;
}

.nav-menu a {
    display: block;
    padding: 8px 16px;
    color: var(--text-color);
    text-decoration: none;
    font-weight: 500;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.nav-menu a:hover {
    color: var(--primary-color);
    background: rgba(227, 6, 19, 0.05);
}

.nav-menu .current-menu-item > a {
    color: var(--primary-color);
    background: rgba(227, 6, 19, 0.1);
}

/* CTA Button */
.btn-primary {
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    background: var(--primary-color);
    color: white;
    text-decoration: none;
    font-weight: 600;
    border-radius: 50px;
    transition: var(--transition);
    white-space: nowrap;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    color: white;
}

.btn-block {
    width: 100%;
    justify-content: center;
}

/* Mobile Toggle */
.mobile-toggle {
    display: none;
    background: none;
    border: none;
    padding: 8px;
    cursor: pointer;
}

.hamburger {
    width: 20px;
    height: 15px;
    position: relative;
}

.hamburger span {
    display: block;
    position: absolute;
    width: 100%;
    height: 2px;
    background: var(--text-color);
    border-radius: 1px;
    transition: var(--transition);
}

.hamburger span:nth-child(1) { top: 0; }
.hamburger span:nth-child(2) { top: 50%; transform: translateY(-50%); }
.hamburger span:nth-child(3) { bottom: 0; }

/* Mobile Navigation */
.mobile-nav {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    max-width: 320px;
    height: 100vh;
    background: var(--bg-white);
    transform: translateX(100%);
    transition: transform 0.3s ease;
    z-index: 1001;
    box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
}

.mobile-nav[aria-hidden="false"] {
    transform: translateX(0);
}

.mobile-nav-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 20px;
}

.mobile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.mobile-logo {
    font-weight: 700;
    color: var(--text-color);
}

.mobile-close {
    background: none;
    border: none;
    padding: 5px;
    cursor: pointer;
}

.mobile-menu {
    flex: 1;
}

.mobile-menu-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-menu-list li {
    margin-bottom: 5px;
}

.mobile-menu-list a {
    display: block;
    padding: 12px 15px;
    color: var(--text-color);
    text-decoration: none;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.mobile-menu-list a:hover {
    background: var(--bg-light);
    color: var(--primary-color);
}

.mobile-cta {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

/* Responsive */
@media (max-width: 1024px) {
    .main-nav {
        display: none;
    }
    
    .header-cta {
        display: none;
    }
    
    .mobile-toggle {
        display: block;
    }
}

@media (max-width: 768px) {
    .tagline {
        display: none;
    }
    
    .logo-icon {
        width: 28px;
        height: 28px;
    }
    
    .brand-name {
        font-size: 1.1rem;
    }
    
    .mobile-nav {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }
}

/* Focus States */
a:focus,
button:focus {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
}

/* Screen Reader */
.screen-reader-text {
    position: absolute !important;
    clip: rect(1px, 1px, 1px, 1px);
    padding: 0 !important;
    border: 0 !important;
    height: 1px !important;
    width: 1px !important;
    overflow: hidden;
}
</style>

<!-- Simple Mobile Navigation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    const mobileClose = document.querySelector('.mobile-close');
    const body = document.body;
    
    function toggleMobileMenu(show) {
        if (mobileToggle && mobileNav) {
            mobileToggle.setAttribute('aria-expanded', show);
            mobileNav.setAttribute('aria-hidden', !show);
            body.classList.toggle('mobile-menu-open', show);
            
            if (show) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }
        }
    }
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            const isOpen = this.getAttribute('aria-expanded') === 'true';
            toggleMobileMenu(!isOpen);
        });
    }
    
    if (mobileClose) {
        mobileClose.addEventListener('click', function() {
            toggleMobileMenu(false);
        });
    }
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileToggle && mobileToggle.getAttribute('aria-expanded') === 'true') {
            toggleMobileMenu(false);
        }
    });
    
    // Close on outside click
    document.addEventListener('click', function(e) {
        if (mobileToggle && mobileNav && 
            mobileToggle.getAttribute('aria-expanded') === 'true' && 
            !mobileNav.contains(e.target) && 
            !mobileToggle.contains(e.target)) {
            toggleMobileMenu(false);
        }
    });
    
    // Close on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1024 && mobileToggle && mobileToggle.getAttribute('aria-expanded') === 'true') {
            toggleMobileMenu(false);
        }
    });
});
</script>

<main id="main-content" class="site-main" role="main">