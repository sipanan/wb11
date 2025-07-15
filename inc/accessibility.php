<?php
/**
 * Accessibility Enhancements for Safe Cologne Theme
 * WCAG 2.1 Compliance Features
 *
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add accessibility features
add_action('wp_head', 'safe_cologne_accessibility_head');
function safe_cologne_accessibility_head() {
    ?>
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#E30613">
    <meta name="msapplication-navbutton-color" content="#E30613">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php
}

// Add accessibility toolbar
add_action('wp_footer', 'safe_cologne_accessibility_toolbar');
function safe_cologne_accessibility_toolbar() {
    if (get_theme_mod('safe_cologne_accessibility_toolbar', false)) {
        ?>
        <div id="accessibility-toolbar" class="accessibility-toolbar" role="toolbar" aria-label="Accessibility Options">
            <button id="toggle-high-contrast" class="accessibility-btn" aria-label="Toggle High Contrast">
                <i class="fas fa-adjust"></i>
            </button>
            <button id="increase-font-size" class="accessibility-btn" aria-label="Increase Font Size">
                <i class="fas fa-plus"></i>
            </button>
            <button id="decrease-font-size" class="accessibility-btn" aria-label="Decrease Font Size">
                <i class="fas fa-minus"></i>
            </button>
            <button id="toggle-dyslexia-font" class="accessibility-btn" aria-label="Toggle Dyslexia Friendly Font">
                <i class="fas fa-font"></i>
            </button>
            <button id="toggle-animations" class="accessibility-btn" aria-label="Toggle Animations">
                <i class="fas fa-play"></i>
            </button>
        </div>
        
        <script>
        (function() {
            const toolbar = document.getElementById('accessibility-toolbar');
            const body = document.body;
            
            // High contrast toggle
            document.getElementById('toggle-high-contrast').addEventListener('click', function() {
                body.classList.toggle('high-contrast');
                localStorage.setItem('accessibility-high-contrast', body.classList.contains('high-contrast'));
            });
            
            // Font size controls
            let currentFontSize = 16;
            document.getElementById('increase-font-size').addEventListener('click', function() {
                if (currentFontSize < 24) {
                    currentFontSize += 2;
                    document.documentElement.style.fontSize = currentFontSize + 'px';
                    localStorage.setItem('accessibility-font-size', currentFontSize);
                }
            });
            
            document.getElementById('decrease-font-size').addEventListener('click', function() {
                if (currentFontSize > 12) {
                    currentFontSize -= 2;
                    document.documentElement.style.fontSize = currentFontSize + 'px';
                    localStorage.setItem('accessibility-font-size', currentFontSize);
                }
            });
            
            // Dyslexia friendly font
            document.getElementById('toggle-dyslexia-font').addEventListener('click', function() {
                body.classList.toggle('dyslexia-font');
                localStorage.setItem('accessibility-dyslexia-font', body.classList.contains('dyslexia-font'));
            });
            
            // Animation toggle
            document.getElementById('toggle-animations').addEventListener('click', function() {
                body.classList.toggle('reduce-motion');
                localStorage.setItem('accessibility-reduce-motion', body.classList.contains('reduce-motion'));
            });
            
            // Restore saved preferences
            if (localStorage.getItem('accessibility-high-contrast') === 'true') {
                body.classList.add('high-contrast');
            }
            
            if (localStorage.getItem('accessibility-dyslexia-font') === 'true') {
                body.classList.add('dyslexia-font');
            }
            
            if (localStorage.getItem('accessibility-reduce-motion') === 'true') {
                body.classList.add('reduce-motion');
            }
            
            const savedFontSize = localStorage.getItem('accessibility-font-size');
            if (savedFontSize) {
                currentFontSize = parseInt(savedFontSize);
                document.documentElement.style.fontSize = currentFontSize + 'px';
            }
        })();
        </script>
        
        <style>
        .accessibility-toolbar {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            background: #fff;
            border: 2px solid #E30613;
            border-right: none;
            border-radius: 8px 0 0 8px;
            padding: 10px 5px;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        .accessibility-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: #E30613;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .accessibility-btn:hover {
            background: #B20510;
            transform: scale(1.1);
        }
        
        .accessibility-btn:focus {
            outline: 2px solid #E30613;
            outline-offset: 2px;
        }
        
        /* High contrast mode */
        .high-contrast {
            filter: contrast(150%) brightness(120%);
        }
        
        .high-contrast * {
            border-color: #000 !important;
        }
        
        .high-contrast a {
            color: #0000FF !important;
        }
        
        .high-contrast a:visited {
            color: #800080 !important;
        }
        
        /* Dyslexia friendly font */
        .dyslexia-font * {
            font-family: 'OpenDyslexic', Arial, sans-serif !important;
        }
        
        /* Reduced motion */
        .reduce-motion *,
        .reduce-motion *::before,
        .reduce-motion *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
        
        @media (max-width: 768px) {
            .accessibility-toolbar {
                bottom: 80px;
                top: auto;
                right: 10px;
                transform: none;
                flex-direction: row;
                border-radius: 8px;
                border: 2px solid #E30613;
                padding: 5px;
            }
        }
        </style>
        <?php
    }
}

// Add structured data
add_action('wp_head', 'safe_cologne_structured_data');
function safe_cologne_structured_data() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'SecurityCompany',
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'url' => home_url(),
            'logo' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
            'telephone' => get_theme_mod('safe_cologne_emergency_phone', '0221 65058801'),
            'email' => get_theme_mod('safe_cologne_email', 'info@safecologne.de'),
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A'),
                'addressLocality' => 'Köln',
                'postalCode' => '50823',
                'addressCountry' => 'DE'
            ),
            'serviceArea' => array(
                '@type' => 'GeoCircle',
                'geoMidpoint' => array(
                    '@type' => 'GeoCoordinates',
                    'latitude' => '50.9375',
                    'longitude' => '6.9603'
                ),
                'geoRadius' => '50'
            ),
            'priceRange' => '€€',
            'openingHours' => 'Mo-Su 00:00-24:00',
            'hasOfferCatalog' => array(
                '@type' => 'OfferCatalog',
                'name' => 'Sicherheitsdienste',
                'itemListElement' => array(
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Objektschutz',
                            'description' => 'Professioneller Schutz für Ihr Eigentum'
                        )
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Veranstaltungssicherheit',
                            'description' => 'Umfassende Sicherheit für Ihre Veranstaltung'
                        )
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => 'Personenschutz',
                            'description' => 'Diskreter und professioneller Personenschutz'
                        )
                    )
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}

// Add breadcrumb structured data
add_action('wp_head', 'safe_cologne_breadcrumb_schema');
function safe_cologne_breadcrumb_schema() {
    if (!is_front_page()) {
        $breadcrumbs = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array()
        );
        
        // Add home
        $breadcrumbs['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Startseite',
            'item' => home_url()
        );
        
        if (is_page()) {
            $breadcrumbs['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => 2,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        } elseif (is_single()) {
            $post_type = get_post_type();
            if ($post_type === 'security_services') {
                $breadcrumbs['itemListElement'][] = array(
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Dienstleistungen',
                    'item' => home_url('/dienstleistungen')
                );
            }
            
            $breadcrumbs['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => count($breadcrumbs['itemListElement']) + 1,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        }
        
        echo '<script type="application/ld+json">' . json_encode($breadcrumbs) . '</script>';
    }
}

// Add ARIA landmarks
add_filter('wp_nav_menu_args', 'safe_cologne_nav_menu_args');
function safe_cologne_nav_menu_args($args) {
    if ($args['theme_location'] === 'primary') {
        $args['menu_id'] = 'primary-navigation';
        $args['container'] = 'nav';
        $args['container_class'] = 'primary-navigation';
        $args['container_id'] = 'primary-nav';
    }
    return $args;
}

// Improve image accessibility
add_filter('wp_get_attachment_image_attributes', 'safe_cologne_image_attributes', 10, 2);
function safe_cologne_image_attributes($attributes, $attachment) {
    if (empty($attributes['alt'])) {
        $attributes['alt'] = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
        
        if (empty($attributes['alt'])) {
            $attributes['alt'] = wp_strip_all_tags($attachment->post_title);
        }
    }
    
    return $attributes;
}

// Add focus management for modal dialogs
add_action('wp_footer', 'safe_cologne_focus_management');
function safe_cologne_focus_management() {
    ?>
    <script>
    // Focus trap for modal dialogs
    function trapFocus(element) {
        const focusableElements = element.querySelectorAll(
            'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select, [tabindex]:not([tabindex="-1"])'
        );
        
        const firstFocusableElement = focusableElements[0];
        const lastFocusableElement = focusableElements[focusableElements.length - 1];
        
        element.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    if (document.activeElement === firstFocusableElement) {
                        lastFocusableElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastFocusableElement) {
                        firstFocusableElement.focus();
                        e.preventDefault();
                    }
                }
            }
            
            if (e.key === 'Escape') {
                element.style.display = 'none';
                // Return focus to trigger element
                if (element.dataset.trigger) {
                    document.getElementById(element.dataset.trigger).focus();
                }
            }
        });
    }
    
    // Initialize focus traps for existing modals
    document.querySelectorAll('[role="dialog"]').forEach(trapFocus);
    </script>
    <?php
}

// Add keyboard navigation helpers
add_action('wp_footer', 'safe_cologne_keyboard_navigation');
function safe_cologne_keyboard_navigation() {
    ?>
    <script>
    // Enhanced keyboard navigation
    document.addEventListener('keydown', function(e) {
        // Alt + 1: Skip to main content
        if (e.altKey && e.key === '1') {
            e.preventDefault();
            const main = document.querySelector('main, #main, .main-content');
            if (main) {
                main.focus();
                main.scrollIntoView();
            }
        }
        
        // Alt + 2: Skip to navigation
        if (e.altKey && e.key === '2') {
            e.preventDefault();
            const nav = document.querySelector('nav, #primary-navigation');
            if (nav) {
                nav.focus();
                nav.scrollIntoView();
            }
        }
        
        // Alt + 3: Skip to footer
        if (e.altKey && e.key === '3') {
            e.preventDefault();
            const footer = document.querySelector('footer, #footer');
            if (footer) {
                footer.focus();
                footer.scrollIntoView();
            }
        }
    });
    </script>
    <?php
}

// Add customizer option for accessibility toolbar
add_action('customize_register', 'safe_cologne_accessibility_customizer');
function safe_cologne_accessibility_customizer($wp_customize) {
    $wp_customize->add_setting('safe_cologne_accessibility_toolbar', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_accessibility_toolbar', array(
        'label' => __('Accessibility Toolbar anzeigen', 'safe-cologne'),
        'section' => 'safe_cologne_advanced',
        'type' => 'checkbox',
    ));
}