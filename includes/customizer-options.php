<?php
/**
 * Customizer Options
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get customizer option with fallback
 */
function safe_cologne_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

/**
 * Company Information Options
 */
function safe_cologne_get_company_info() {
    return array(
        'name' => safe_cologne_get_option('safe_cologne_company_name', 'Safe Cologne Security Services'),
        'tagline' => safe_cologne_get_option('safe_cologne_company_tagline', 'Sicherheitsdienst mit Herz & System'),
        'description' => safe_cologne_get_option('safe_cologne_company_description', 'Professioneller Sicherheitsdienst in Köln und Umgebung.'),
        'phone' => safe_cologne_get_option('safe_cologne_phone', '0221 6505 8801'),
        'email' => safe_cologne_get_option('safe_cologne_email', 'info@safecologne.de'),
        'address' => safe_cologne_get_option('safe_cologne_address', 'Musterstraße 123, 50667 Köln'),
    );
}

/**
 * Hero Section Options
 */
function safe_cologne_get_hero_options() {
    return array(
        'title' => safe_cologne_get_option('safe_cologne_hero_title', 'Professioneller Sicherheitsdienst in Köln'),
        'subtitle' => safe_cologne_get_option('safe_cologne_hero_subtitle', 'Vertrauen Sie auf unsere Erfahrung und Kompetenz für Ihre Sicherheit.'),
        'cta_text' => safe_cologne_get_option('safe_cologne_hero_cta_text', 'Jetzt Kontakt aufnehmen'),
        'cta_url' => safe_cologne_get_option('safe_cologne_hero_cta_url', '/kontakt/'),
    );
}

/**
 * Services Options
 */
function safe_cologne_get_services_options() {
    return array(
        'title' => safe_cologne_get_option('safe_cologne_services_title', 'Unsere Sicherheitsdienste'),
        'subtitle' => safe_cologne_get_option('safe_cologne_services_subtitle', 'Umfassende Sicherheitslösungen für jeden Bedarf'),
        'services' => array(
            array(
                'title' => safe_cologne_get_option('safe_cologne_service_1_title', 'Objektschutz'),
                'description' => safe_cologne_get_option('safe_cologne_service_1_description', 'Professioneller Schutz Ihrer Objekte und Immobilien.'),
                'icon' => 'fas fa-shield-alt',
            ),
            array(
                'title' => safe_cologne_get_option('safe_cologne_service_2_title', 'Personenschutz'),
                'description' => safe_cologne_get_option('safe_cologne_service_2_description', 'Diskreter und professioneller Schutz für Personen.'),
                'icon' => 'fas fa-user-shield',
            ),
            array(
                'title' => safe_cologne_get_option('safe_cologne_service_3_title', 'Veranstaltungsschutz'),
                'description' => safe_cologne_get_option('safe_cologne_service_3_description', 'Sicherheit für Events und Veranstaltungen aller Art.'),
                'icon' => 'fas fa-calendar-check',
            ),
        ),
    );
}

/**
 * Team Options
 */
function safe_cologne_get_team_options() {
    return array(
        'title' => safe_cologne_get_option('safe_cologne_team_title', 'Unser Team'),
        'members' => array(
            array(
                'name' => safe_cologne_get_option('safe_cologne_team_member_1_name', 'Max Mustermann'),
                'role' => safe_cologne_get_option('safe_cologne_team_member_1_role', 'Geschäftsführer'),
                'description' => safe_cologne_get_option('safe_cologne_team_member_1_description', 'Über 20 Jahre Erfahrung im Sicherheitsbereich.'),
            ),
        ),
    );
}

/**
 * Social Media Options
 */
function safe_cologne_get_social_options() {
    return array(
        'facebook' => safe_cologne_get_option('safe_cologne_facebook_url', ''),
        'instagram' => safe_cologne_get_option('safe_cologne_instagram_url', ''),
        'linkedin' => safe_cologne_get_option('safe_cologne_linkedin_url', ''),
    );
}

/**
 * Business Hours Options
 */
function safe_cologne_get_business_hours() {
    return array(
        'weekdays' => safe_cologne_get_option('safe_cologne_hours_weekdays', '08:00 - 18:00'),
        'saturday' => safe_cologne_get_option('safe_cologne_hours_saturday', '09:00 - 16:00'),
        'sunday' => safe_cologne_get_option('safe_cologne_hours_sunday', 'Geschlossen'),
        'emergency' => safe_cologne_get_option('safe_cologne_emergency_hours', 'Notfälle: Nach Vereinbarung'),
    );
}

/**
 * Color Options
 */
function safe_cologne_get_color_options() {
    return array(
        'primary' => safe_cologne_get_option('safe_cologne_primary_color', '#E30613'),
        'dark_gray' => safe_cologne_get_option('safe_cologne_dark_gray', '#333333'),
        'light_gray' => safe_cologne_get_option('safe_cologne_light_gray', '#F8F9FA'),
    );
}