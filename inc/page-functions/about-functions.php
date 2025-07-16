<?php
/**
 * About Page Specific Functions
 * Safe Cologne Theme - About Page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * About page specific enqueue scripts and styles
 */
function safe_cologne_about_enqueue_scripts() {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        // Enqueue about-specific CSS
        wp_enqueue_style(
            'safe-cologne-about', 
            get_template_directory_uri() . '/assets/css/pages/about.css', 
            array('safe-cologne-main'), 
            SAFE_COLOGNE_VERSION
        );
        
        // Enqueue about-specific JavaScript
        wp_enqueue_script(
            'safe-cologne-about', 
            get_template_directory_uri() . '/assets/js/pages/about.js', 
            array('jquery', 'safe-cologne-main'), 
            SAFE_COLOGNE_VERSION, 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_about_enqueue_scripts');

/**
 * About page customizer settings
 */
function safe_cologne_about_customizer_settings($wp_customize) {
    // About Section
    $wp_customize->add_section('safe_cologne_about', array(
        'title'    => __('Über uns Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 50,
    ));
    
    // About Hero Title
    $wp_customize->add_setting('safe_cologne_about_hero_title', array(
        'default'           => 'Über Safe Cologne',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_about_hero_title', array(
        'label'    => __('Hero Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'text',
    ));
    
    // About Hero Subtitle
    $wp_customize->add_setting('safe_cologne_about_hero_subtitle', array(
        'default'           => 'Ihr vertrauensvoller Partner für Sicherheit in Köln',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_about_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'textarea',
    ));
    
    // Company Story
    $wp_customize->add_setting('safe_cologne_company_story', array(
        'default'           => 'Seit über 15 Jahren stehen wir für Sicherheit und Vertrauen in Köln. Unsere Geschichte begann mit einer klaren Vision: professionelle Sicherheitslösungen mit menschlichem Ansatz zu verbinden.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_company_story', array(
        'label'    => __('Unternehmensgeschichte', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'textarea',
    ));
    
    // Mission Statement
    $wp_customize->add_setting('safe_cologne_mission', array(
        'default'           => 'Unsere Mission ist es, höchste Sicherheitsstandards mit menschlicher Wärme zu verbinden.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_mission', array(
        'label'    => __('Mission Statement', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'textarea',
    ));
    
    // Team Section Title
    $wp_customize->add_setting('safe_cologne_team_title', array(
        'default'           => 'Unser Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_team_title', array(
        'label'    => __('Team Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'text',
    ));
    
    // Values Section Title
    $wp_customize->add_setting('safe_cologne_values_title', array(
        'default'           => 'Unsere Werte',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_values_title', array(
        'label'    => __('Werte Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_about',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'safe_cologne_about_customizer_settings');

/**
 * Get company values
 */
function safe_cologne_get_company_values() {
    $values = array(
        array(
            'icon' => 'fas fa-shield-alt',
            'title' => __('Sicherheit', 'safe-cologne'),
            'description' => __('Höchste Sicherheitsstandards in allen Bereichen unserer Dienstleistungen.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-heart',
            'title' => __('Menschlichkeit', 'safe-cologne'),
            'description' => __('Respektvoller Umgang mit allen Beteiligten und deeskalierende Arbeitsweise.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-handshake',
            'title' => __('Vertrauen', 'safe-cologne'),
            'description' => __('Langfristige Partnerschaften basierend auf Zuverlässigkeit und Transparenz.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-cogs',
            'title' => __('Professionalität', 'safe-cologne'),
            'description' => __('Kontinuierliche Weiterbildung und Einsatz modernster Technologien.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-clock',
            'title' => __('Zuverlässigkeit', 'safe-cologne'),
            'description' => __('Pünktlichkeit und Verlässlichkeit in allen Einsätzen und Terminen.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-lightbulb',
            'title' => __('Innovation', 'safe-cologne'),
            'description' => __('Moderne Lösungen und innovative Ansätze für effektive Sicherheit.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_company_values', $values);
}

/**
 * Get team members
 */
function safe_cologne_get_team_members() {
    $team_members = array(
        array(
            'name' => 'Max Mustermann',
            'role' => __('Geschäftsführer', 'safe-cologne'),
            'description' => __('Über 20 Jahre Erfahrung in der Sicherheitsbranche. Spezialist für Objektschutz und Veranstaltungssicherheit.', 'safe-cologne'),
            'image' => get_template_directory_uri() . '/assets/images/team/team-1.jpg'
        ),
        array(
            'name' => 'Anna Schmidt',
            'role' => __('Leiterin Personalwesen', 'safe-cologne'),
            'description' => __('Verantwortlich für die Rekrutierung und Schulung unserer Sicherheitskräfte.', 'safe-cologne'),
            'image' => get_template_directory_uri() . '/assets/images/team/team-2.jpg'
        ),
        array(
            'name' => 'Michael Weber',
            'role' => __('Einsatzleiter', 'safe-cologne'),
            'description' => __('Koordiniert alle Sicherheitseinsätze und sorgt für optimale Abläufe.', 'safe-cologne'),
            'image' => get_template_directory_uri() . '/assets/images/team/team-3.jpg'
        ),
        array(
            'name' => 'Sarah Johnson',
            'role' => __('Kundenbetreuung', 'safe-cologne'),
            'description' => __('Erste Ansprechpartnerin für alle Kundenanfragen und individuellen Lösungen.', 'safe-cologne'),
            'image' => get_template_directory_uri() . '/assets/images/team/team-4.jpg'
        )
    );
    
    return apply_filters('safe_cologne_team_members', $team_members);
}

/**
 * Get company timeline
 */
function safe_cologne_get_company_timeline() {
    $timeline = array(
        array(
            'year' => '2008',
            'title' => __('Firmengründung', 'safe-cologne'),
            'description' => __('Gründung der Safe Cologne mit dem Fokus auf professionelle Sicherheitslösungen.', 'safe-cologne')
        ),
        array(
            'year' => '2012',
            'title' => __('Expansion', 'safe-cologne'),
            'description' => __('Erweiterung des Serviceportfolios um Veranstaltungsschutz und Revierdienst.', 'safe-cologne')
        ),
        array(
            'year' => '2016',
            'title' => __('Technologie-Upgrade', 'safe-cologne'),
            'description' => __('Einführung modernster GPS-Tracking und Kommunikationssysteme.', 'safe-cologne')
        ),
        array(
            'year' => '2020',
            'title' => __('Zertifizierung', 'safe-cologne'),
            'description' => __('Erhalt wichtiger Branchenzertifikate und Qualitätsauszeichnungen.', 'safe-cologne')
        ),
        array(
            'year' => '2023',
            'title' => __('Heute', 'safe-cologne'),
            'description' => __('Marktführer für Sicherheitslösungen in Köln mit über 50 qualifizierten Mitarbeitern.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_company_timeline', $timeline);
}

/**
 * Get certifications
 */
function safe_cologne_get_certifications() {
    $certifications = array(
        array(
            'icon' => 'fas fa-certificate',
            'title' => __('§ 34a GewO', 'safe-cologne'),
            'description' => __('Alle Mitarbeiter sind nach § 34a GewO geschult und zertifiziert.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-shield-alt',
            'title' => __('ISO 9001', 'safe-cologne'),
            'description' => __('Qualitätsmanagementsystem nach ISO 9001 Standard.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-first-aid',
            'title' => __('Erste Hilfe', 'safe-cologne'),
            'description' => __('Regelmäßige Erste-Hilfe-Schulungen für alle Mitarbeiter.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-fire-extinguisher',
            'title' => __('Brandschutz', 'safe-cologne'),
            'description' => __('Spezialisierte Brandschutzhelfer-Ausbildung.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-users',
            'title' => __('Deeskalation', 'safe-cologne'),
            'description' => __('Professionelle Deeskalationstrainings für alle Einsatzkräfte.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-laptop',
            'title' => __('Datenschutz', 'safe-cologne'),
            'description' => __('DSGVO-konforme Arbeitsweise und Datenschutzschulungen.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_certifications', $certifications);
}

/**
 * About page meta description
 */
function safe_cologne_about_meta_description() {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        $meta_description = get_theme_mod('safe_cologne_about_hero_subtitle', 'Ihr vertrauensvoller Partner für Sicherheit in Köln');
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_about_meta_description');

/**
 * Add structured data for about page
 */
function safe_cologne_about_structured_data() {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        $company_name = get_bloginfo('name');
        $company_story = get_theme_mod('safe_cologne_company_story', 'Seit über 15 Jahren stehen wir für Sicherheit und Vertrauen in Köln.');
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => $company_name . ' - ' . __('Über uns', 'safe-cologne'),
            'description' => $company_story,
            'mainEntity' => array(
                '@type' => 'Organization',
                'name' => $company_name,
                'description' => $company_story,
                'foundingDate' => '2008',
                'numberOfEmployees' => get_theme_mod('safe_cologne_stat_officers', '50'),
                'address' => array(
                    '@type' => 'PostalAddress',
                    'streetAddress' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A'),
                    'addressLocality' => 'Köln',
                    'postalCode' => '50823',
                    'addressCountry' => 'DE'
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_about_structured_data');

/**
 * About page specific body classes
 */
function safe_cologne_about_body_classes($classes) {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        $classes[] = 'about-page';
        $classes[] = 'has-hero';
        $classes[] = 'has-timeline';
        $classes[] = 'has-team';
        $classes[] = 'has-values';
    }
    
    return $classes;
}
add_filter('body_class', 'safe_cologne_about_body_classes');

/**
 * Generate team member schema
 */
function safe_cologne_generate_team_schema() {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        $team_members = safe_cologne_get_team_members();
        $team_schema = array();
        
        foreach ($team_members as $member) {
            $team_schema[] = array(
                '@type' => 'Person',
                'name' => $member['name'],
                'jobTitle' => $member['role'],
                'description' => $member['description'],
                'image' => $member['image'],
                'worksFor' => array(
                    '@type' => 'Organization',
                    'name' => get_bloginfo('name')
                )
            );
        }
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => __('Team Mitglieder', 'safe-cologne'),
            'itemListElement' => $team_schema
        );
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_generate_team_schema');

/**
 * Custom CSS for about page
 */
function safe_cologne_about_custom_css() {
    if (is_page_template('page-templates/page-about.php') || is_page('about') || is_page('ueber-uns')) {
        $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
        $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
        
        $custom_css = "
        .about-hero {
            background: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        }
        
        .value-icon {
            background: linear-gradient(135deg, {$primary_color}, {$secondary_color});
        }
        
        .timeline-date {
            background: {$primary_color};
        }
        
        .certification-icon {
            background: {$primary_color};
        }
        
        .timeline::before {
            background: {$primary_color};
        }
        ";
        
        wp_add_inline_style('safe-cologne-about', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_about_custom_css');

/**
 * Get company achievements
 */
function safe_cologne_get_company_achievements() {
    $achievements = array(
        array(
            'year' => '2023',
            'title' => __('Beste Sicherheitsfirma Köln', 'safe-cologne'),
            'description' => __('Auszeichnung der Handelskammer Köln für hervorragende Serviceleistung.', 'safe-cologne')
        ),
        array(
            'year' => '2022',
            'title' => __('Kundenzufriedenheit 98%', 'safe-cologne'),
            'description' => __('Erreichen einer Kundenzufriedenheitsrate von über 98% in unabhängigen Umfragen.', 'safe-cologne')
        ),
        array(
            'year' => '2021',
            'title' => __('Zertifizierung ISO 9001', 'safe-cologne'),
            'description' => __('Erfolgreiche Zertifizierung nach ISO 9001 Qualitätsmanagement-Standard.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_company_achievements', $achievements);
}