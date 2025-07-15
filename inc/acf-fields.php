<?php
/**
 * Advanced Custom Fields Integration
 * 
 * @package Safe_Cologne
 */

// Check if ACF is active
if (!function_exists('acf_add_local_field_group')) {
    // Show admin notice if ACF is not installed
    add_action('admin_notices', 'safe_cologne_acf_notice');
    function safe_cologne_acf_notice() {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php _e('Das Safe Cologne Theme benötigt das Advanced Custom Fields Plugin für die volle Funktionalität.', 'safe-cologne'); ?></p>
        </div>
        <?php
    }
    return;
}

// Add ACF JSON save point
add_filter('acf/settings/save_json', 'safe_cologne_acf_json_save_point');
function safe_cologne_acf_json_save_point($path) {
    return SAFE_COLOGNE_PATH . '/acf-json';
}

// Add ACF JSON load point
add_filter('acf/settings/load_json', 'safe_cologne_acf_json_load_point');
function safe_cologne_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = SAFE_COLOGNE_PATH . '/acf-json';
    return $paths;
}

// Homepage ACF Fields
acf_add_local_field_group(array(
    'key' => 'group_homepage',
    'title' => 'Homepage Einstellungen',
    'fields' => array(
        array(
            'key' => 'field_hero_title',
            'label' => 'Hero Titel',
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'Safe Cologne',
            'placeholder' => 'Ihr Haupttitel',
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Hero Untertitel',
            'name' => 'hero_subtitle',
            'type' => 'text',
            'default_value' => 'Ihr Sicherheitsdienst mit Herz & System',
            'placeholder' => 'Ihr Untertitel',
        ),
        array(
            'key' => 'field_hero_description',
            'label' => 'Hero Beschreibung',
            'name' => 'hero_description',
            'type' => 'textarea',
            'default_value' => 'Sicherheit beginnt mit Vertrauen. Bei Safe Cologne steht Ihre Sicherheit an erster Stelle – zuverlässig, empathisch und professionell.',
            'placeholder' => 'Ihre Beschreibung',
        ),
        array(
            'key' => 'field_hero_buttons',
            'label' => 'Hero Buttons',
            'name' => 'hero_buttons',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_button_text',
                    'label' => 'Button Text',
                    'name' => 'button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_button_link',
                    'label' => 'Button Link',
                    'name' => 'button_link',
                    'type' => 'link',
                ),
                array(
                    'key' => 'field_button_style',
                    'label' => 'Button Style',
                    'name' => 'button_style',
                    'type' => 'select',
                    'choices' => array(
                        'primary' => 'Primär',
                        'secondary' => 'Sekundär',
                        'outline' => 'Outline',
                    ),
                    'default_value' => 'primary',
                ),
            ),
            'min' => 0,
            'max' => 3,
            'layout' => 'table',
        ),
        array(
            'key' => 'field_features',
            'label' => 'Features',
            'name' => 'features',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_icon',
                    'label' => 'Icon',
                    'name' => 'feature_icon',
                    'type' => 'text',
                    'instructions' => 'FontAwesome Icon Class (z.B. fas fa-shield-alt)',
                ),
                array(
                    'key' => 'field_feature_title',
                    'label' => 'Titel',
                    'name' => 'feature_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_description',
                    'label' => 'Beschreibung',
                    'name' => 'feature_description',
                    'type' => 'textarea',
                ),
            ),
            'min' => 0,
            'max' => 6,
            'layout' => 'row',
        ),
        array(
            'key' => 'field_services_section',
            'label' => 'Services Bereich',
            'name' => 'services_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_services_title',
                    'label' => 'Titel',
                    'name' => 'services_title',
                    'type' => 'text',
                    'default_value' => 'Unsere Dienstleistungen',
                ),
                array(
                    'key' => 'field_services_subtitle',
                    'label' => 'Untertitel',
                    'name' => 'services_subtitle',
                    'type' => 'text',
                    'default_value' => 'Professionelle Sicherheitslösungen',
                ),
                array(
                    'key' => 'field_services_display',
                    'label' => 'Services Anzeige',
                    'name' => 'services_display',
                    'type' => 'select',
                    'choices' => array(
                        'manual' => 'Manuell auswählen',
                        'latest' => 'Neueste anzeigen',
                        'featured' => 'Nur Featured',
                    ),
                    'default_value' => 'latest',
                ),
                array(
                    'key' => 'field_services_count',
                    'label' => 'Anzahl Services',
                    'name' => 'services_count',
                    'type' => 'number',
                    'default_value' => 6,
                    'min' => 1,
                    'max' => 12,
                ),
            ),
        ),
        array(
            'key' => 'field_testimonials_section',
            'label' => 'Testimonials Bereich',
            'name' => 'testimonials_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_testimonials_title',
                    'label' => 'Titel',
                    'name' => 'testimonials_title',
                    'type' => 'text',
                    'default_value' => 'Was unsere Kunden sagen',
                ),
                array(
                    'key' => 'field_testimonials_display',
                    'label' => 'Testimonials Anzeige',
                    'name' => 'testimonials_display',
                    'type' => 'select',
                    'choices' => array(
                        'latest' => 'Neueste anzeigen',
                        'random' => 'Zufällig auswählen',
                        'featured' => 'Nur Featured',
                    ),
                    'default_value' => 'latest',
                ),
                array(
                    'key' => 'field_testimonials_count',
                    'label' => 'Anzahl Testimonials',
                    'name' => 'testimonials_count',
                    'type' => 'number',
                    'default_value' => 3,
                    'min' => 1,
                    'max' => 9,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'front-page.php',
            ),
        ),
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Services Page ACF Fields
acf_add_local_field_group(array(
    'key' => 'group_services_page',
    'title' => 'Services Seite Einstellungen',
    'fields' => array(
        array(
            'key' => 'field_services_hero',
            'label' => 'Hero Bereich',
            'name' => 'services_hero',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_services_hero_title',
                    'label' => 'Titel',
                    'name' => 'services_hero_title',
                    'type' => 'text',
                    'default_value' => 'Unsere Sicherheitsdienstleistungen',
                ),
                array(
                    'key' => 'field_services_hero_subtitle',
                    'label' => 'Untertitel',
                    'name' => 'services_hero_subtitle',
                    'type' => 'text',
                    'default_value' => 'Professionelle Sicherheit für jeden Bedarf',
                ),
                array(
                    'key' => 'field_services_hero_image',
                    'label' => 'Hintergrundbild',
                    'name' => 'services_hero_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
        ),
        array(
            'key' => 'field_services_categories',
            'label' => 'Service Kategorien',
            'name' => 'services_categories',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_category_name',
                    'label' => 'Kategorie Name',
                    'name' => 'category_name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_category_icon',
                    'label' => 'Kategorie Icon',
                    'name' => 'category_icon',
                    'type' => 'text',
                    'instructions' => 'FontAwesome Icon Class oder Emoji',
                ),
                array(
                    'key' => 'field_category_slug',
                    'label' => 'Kategorie Slug',
                    'name' => 'category_slug',
                    'type' => 'text',
                    'instructions' => 'Für Filterung (z.B. events, object, personal)',
                ),
            ),
            'min' => 1,
            'max' => 10,
            'layout' => 'table',
        ),
        array(
            'key' => 'field_services_featured',
            'label' => 'Featured Services',
            'name' => 'services_featured',
            'type' => 'relationship',
            'post_type' => array('security_services'),
            'return_format' => 'object',
            'max' => 3,
        ),
        array(
            'key' => 'field_services_cta',
            'label' => 'Call-to-Action Bereich',
            'name' => 'services_cta',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_cta_title',
                    'label' => 'CTA Titel',
                    'name' => 'cta_title',
                    'type' => 'text',
                    'default_value' => 'Haben wir Sie überzeugt?',
                ),
                array(
                    'key' => 'field_cta_subtitle',
                    'label' => 'CTA Untertitel',
                    'name' => 'cta_subtitle',
                    'type' => 'textarea',
                    'default_value' => 'Dann lassen Sie uns gemeinsam Ihr persönliches Sicherheitskonzept entwickeln.',
                ),
                array(
                    'key' => 'field_cta_background',
                    'label' => 'CTA Hintergrund',
                    'name' => 'cta_background',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/page-services.php',
            ),
        ),
    ),
));

// Contact Page ACF Fields
acf_add_local_field_group(array(
    'key' => 'group_contact_page',
    'title' => 'Kontakt Seite Einstellungen',
    'fields' => array(
        array(
            'key' => 'field_contact_methods',
            'label' => 'Kontaktmethoden',
            'name' => 'contact_methods',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_method_icon',
                    'label' => 'Icon',
                    'name' => 'method_icon',
                    'type' => 'text',
                    'instructions' => 'FontAwesome Icon Class',
                ),
                array(
                    'key' => 'field_method_title',
                    'label' => 'Titel',
                    'name' => 'method_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_method_value',
                    'label' => 'Wert',
                    'name' => 'method_value',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_method_link',
                    'label' => 'Link',
                    'name' => 'method_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_method_description',
                    'label' => 'Beschreibung',
                    'name' => 'method_description',
                    'type' => 'textarea',
                ),
            ),
            'min' => 1,
            'max' => 5,
            'layout' => 'row',
        ),
        array(
            'key' => 'field_office_hours',
            'label' => 'Bürozeiten',
            'name' => 'office_hours',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_day',
                    'label' => 'Tag',
                    'name' => 'day',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_hours',
                    'label' => 'Zeiten',
                    'name' => 'hours',
                    'type' => 'text',
                ),
            ),
            'min' => 1,
            'max' => 7,
            'layout' => 'table',
        ),
        array(
            'key' => 'field_map_settings',
            'label' => 'Karten Einstellungen',
            'name' => 'map_settings',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_map_embed',
                    'label' => 'Map Embed Code',
                    'name' => 'map_embed',
                    'type' => 'textarea',
                    'instructions' => 'Google Maps Embed Code',
                ),
                array(
                    'key' => 'field_map_address',
                    'label' => 'Adresse',
                    'name' => 'map_address',
                    'type' => 'textarea',
                    'default_value' => 'Subbelrather Str. 15A, 50823 Köln',
                ),
                array(
                    'key' => 'field_map_facilities',
                    'label' => 'Ausstattung',
                    'name' => 'map_facilities',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_facility_icon',
                            'label' => 'Icon',
                            'name' => 'facility_icon',
                            'type' => 'text',
                            'instructions' => 'Emoji oder FontAwesome',
                        ),
                        array(
                            'key' => 'field_facility_text',
                            'label' => 'Text',
                            'name' => 'facility_text',
                            'type' => 'text',
                        ),
                    ),
                    'min' => 0,
                    'max' => 5,
                    'layout' => 'table',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/page-contact.php',
            ),
        ),
    ),
));

// Careers Page ACF Fields
acf_add_local_field_group(array(
    'key' => 'group_careers_page',
    'title' => 'Karriere Seite Einstellungen',
    'fields' => array(
        array(
            'key' => 'field_careers_hero',
            'label' => 'Hero Bereich',
            'name' => 'careers_hero',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_careers_hero_title',
                    'label' => 'Titel',
                    'name' => 'careers_hero_title',
                    'type' => 'text',
                    'default_value' => 'Ihre Karriere bei SafeCologne',
                ),
                array(
                    'key' => 'field_careers_hero_subtitle',
                    'label' => 'Untertitel',
                    'name' => 'careers_hero_subtitle',
                    'type' => 'text',
                    'default_value' => 'Werden Sie Teil des führenden Sicherheitsunternehmens in Köln',
                ),
                array(
                    'key' => 'field_careers_stats',
                    'label' => 'Statistiken',
                    'name' => 'careers_stats',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_stat_number',
                            'label' => 'Zahl',
                            'name' => 'stat_number',
                            'type' => 'number',
                        ),
                        array(
                            'key' => 'field_stat_label',
                            'label' => 'Beschriftung',
                            'name' => 'stat_label',
                            'type' => 'text',
                        ),
                    ),
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'table',
                ),
            ),
        ),
        array(
            'key' => 'field_career_benefits',
            'label' => 'Karriere Benefits',
            'name' => 'career_benefits',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_benefit_icon',
                    'label' => 'Icon',
                    'name' => 'benefit_icon',
                    'type' => 'text',
                    'instructions' => 'FontAwesome Icon Class',
                ),
                array(
                    'key' => 'field_benefit_title',
                    'label' => 'Titel',
                    'name' => 'benefit_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_benefit_description',
                    'label' => 'Beschreibung',
                    'name' => 'benefit_description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_benefit_color',
                    'label' => 'Farbe',
                    'name' => 'benefit_color',
                    'type' => 'color_picker',
                    'default_value' => '#E30613',
                ),
            ),
            'min' => 1,
            'max' => 8,
            'layout' => 'row',
        ),
        array(
            'key' => 'field_application_process',
            'label' => 'Bewerbungsprozess',
            'name' => 'application_process',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_process_step',
                    'label' => 'Schritt',
                    'name' => 'process_step',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_process_title',
                    'label' => 'Titel',
                    'name' => 'process_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_process_description',
                    'label' => 'Beschreibung',
                    'name' => 'process_description',
                    'type' => 'text',
                ),
            ),
            'min' => 1,
            'max' => 5,
            'layout' => 'table',
        ),
        array(
            'key' => 'field_employee_testimonials',
            'label' => 'Mitarbeiter Testimonials',
            'name' => 'employee_testimonials',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_testimonial_text',
                    'label' => 'Text',
                    'name' => 'testimonial_text',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_testimonial_author',
                    'label' => 'Autor',
                    'name' => 'testimonial_author',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_position',
                    'label' => 'Position',
                    'name' => 'testimonial_position',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_image',
                    'label' => 'Bild',
                    'name' => 'testimonial_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
            'min' => 1,
            'max' => 6,
            'layout' => 'row',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/page-jobportal.php',
            ),
        ),
    ),
));

// Global Components Field Group
acf_add_local_field_group(array(
    'key' => 'group_global_components',
    'title' => 'Globale Komponenten',
    'fields' => array(
        array(
            'key' => 'field_page_components',
            'label' => 'Seitenkomponenten',
            'name' => 'page_components',
            'type' => 'flexible_content',
            'layouts' => array(
                'cta_section' => array(
                    'key' => 'layout_cta_section',
                    'name' => 'cta_section',
                    'label' => 'CTA Bereich',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_cta_title',
                            'label' => 'Titel',
                            'name' => 'cta_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_cta_description',
                            'label' => 'Beschreibung',
                            'name' => 'cta_description',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_cta_buttons',
                            'label' => 'Buttons',
                            'name' => 'cta_buttons',
                            'type' => 'repeater',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_cta_button_text',
                                    'label' => 'Text',
                                    'name' => 'cta_button_text',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_cta_button_link',
                                    'label' => 'Link',
                                    'name' => 'cta_button_link',
                                    'type' => 'link',
                                ),
                                array(
                                    'key' => 'field_cta_button_style',
                                    'label' => 'Style',
                                    'name' => 'cta_button_style',
                                    'type' => 'select',
                                    'choices' => array(
                                        'primary' => 'Primär',
                                        'secondary' => 'Sekundär',
                                        'outline' => 'Outline',
                                    ),
                                ),
                            ),
                            'min' => 1,
                            'max' => 3,
                        ),
                        array(
                            'key' => 'field_cta_background',
                            'label' => 'Hintergrund',
                            'name' => 'cta_background',
                            'type' => 'image',
                            'return_format' => 'url',
                        ),
                    ),
                ),
                'text_section' => array(
                    'key' => 'layout_text_section',
                    'name' => 'text_section',
                    'label' => 'Text Bereich',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_text_title',
                            'label' => 'Titel',
                            'name' => 'text_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_text_content',
                            'label' => 'Inhalt',
                            'name' => 'text_content',
                            'type' => 'wysiwyg',
                        ),
                        array(
                            'key' => 'field_text_columns',
                            'label' => 'Spalten',
                            'name' => 'text_columns',
                            'type' => 'select',
                            'choices' => array(
                                '1' => '1 Spalte',
                                '2' => '2 Spalten',
                                '3' => '3 Spalten',
                            ),
                            'default_value' => '1',
                        ),
                    ),
                ),
                'image_text_section' => array(
                    'key' => 'layout_image_text_section',
                    'name' => 'image_text_section',
                    'label' => 'Bild & Text Bereich',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_image_text_title',
                            'label' => 'Titel',
                            'name' => 'image_text_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_image_text_content',
                            'label' => 'Text',
                            'name' => 'image_text_content',
                            'type' => 'wysiwyg',
                        ),
                        array(
                            'key' => 'field_image_text_image',
                            'label' => 'Bild',
                            'name' => 'image_text_image',
                            'type' => 'image',
                            'return_format' => 'array',
                        ),
                        array(
                            'key' => 'field_image_text_layout',
                            'label' => 'Layout',
                            'name' => 'image_text_layout',
                            'type' => 'select',
                            'choices' => array(
                                'left' => 'Bild links',
                                'right' => 'Bild rechts',
                                'top' => 'Bild oben',
                                'bottom' => 'Bild unten',
                            ),
                            'default_value' => 'left',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),
));

// Helper function to get ACF field with fallback
function safe_cologne_get_field($field_name, $post_id = null, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id);
        return $value !== false ? $value : $default;
    }
    return $default;
}

// Helper function to check if ACF field has value
function safe_cologne_has_field($field_name, $post_id = null) {
    if (function_exists('have_rows')) {
        return have_rows($field_name, $post_id);
    }
    return false;
}

// Helper function for ACF repeater fields
function safe_cologne_get_repeater($field_name, $post_id = null) {
    if (function_exists('get_field')) {
        return get_field($field_name, $post_id) ?: array();
    }
    return array();
}