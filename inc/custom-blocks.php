<?php
/**
 * Custom Blocks for SafeCologne Theme
 * 
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register custom blocks
add_action('init', 'safe_cologne_register_blocks');
function safe_cologne_register_blocks() {
    // Check if Gutenberg is active
    if (!function_exists('register_block_type')) {
        return;
    }
    
    // Register custom block patterns
    safe_cologne_register_block_patterns();
    
    // Register custom block styles
    safe_cologne_register_block_styles();
}

// Custom Block Patterns
function safe_cologne_register_block_patterns() {
    // Hero Section Pattern
    register_block_pattern(
        'safe-cologne/hero-section',
        array(
            'title'       => __('SafeCologne Hero Section', 'safe-cologne'),
            'description' => __('Hero section with call-to-action for security services', 'safe-cologne'),
            'content'     => '<!-- wp:group {"align":"full","style":{"color":{"background":"#e2001a"},"spacing":{"padding":{"top":"4rem","bottom":"4rem"}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background-color:#e2001a;padding-top:4rem;padding-bottom:4rem"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size">Sicherheit mit Herz &amp; System</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Professionelle Sicherheitsdienste in Köln und Umgebung</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary-red","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-red-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:6px">Jetzt Kontakt aufnehmen</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
            'categories'  => array('safe-cologne'),
        )
    );
    
    // Services Grid Pattern
    register_block_pattern(
        'safe-cologne/services-grid',
        array(
            'title'       => __('Services Grid', 'safe-cologne'),
            'description' => __('Grid layout for displaying security services', 'safe-cologne'),
            'content'     => '<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">Unsere Dienstleistungen</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:html -->
<div class="service-icon" style="width: 80px; height: 80px; background: #e2001a; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
<i class="fas fa-shield-alt"></i>
</div>
<!-- /wp:html -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Objektschutz</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Professioneller Schutz für Ihre Immobilien und Anlagen</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:html -->
<div class="service-icon" style="width: 80px; height: 80px; background: #e2001a; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
<i class="fas fa-users"></i>
</div>
<!-- /wp:html -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Veranstaltungsschutz</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Sicherheit für Events, Konzerte und Veranstaltungen</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:html -->
<div class="service-icon" style="width: 80px; height: 80px; background: #e2001a; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
<i class="fas fa-car"></i>
</div>
<!-- /wp:html -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Sicherheitsdienst</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Mobile Streifen und Revierdienst rund um die Uhr</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
            'categories'  => array('safe-cologne'),
        )
    );
    
    // Testimonials Pattern
    register_block_pattern(
        'safe-cologne/testimonials',
        array(
            'title'       => __('Customer Testimonials', 'safe-cologne'),
            'description' => __('Customer testimonials section', 'safe-cologne'),
            'content'     => '<!-- wp:group {"style":{"color":{"background":"#f5f5f5"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f5f5f5"><!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">Was unsere Kunden sagen</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}}} -->
<p style="font-style:italic">"Sehr professionelle und zuverlässige Arbeit. Das Team von SafeCologne sorgt für absolute Sicherheit."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary-red","fontSize":"small"} -->
<p class="has-primary-red-color has-text-color has-small-font-size" style="font-weight:600">— Max Mustermann, Geschäftsführer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}}} -->
<p style="font-style:italic">"Kompetente Beratung und exzellente Umsetzung. Wir fühlen uns rundherum sicher betreut."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary-red","fontSize":"small"} -->
<p class="has-primary-red-color has-text-color has-small-font-size" style="font-weight:600">— Maria Schmidt, Eventmanagerin</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
            'categories'  => array('safe-cologne'),
        )
    );
}

// Custom Block Styles
function safe_cologne_register_block_styles() {
    // Button styles
    register_block_style(
        'core/button',
        array(
            'name'         => 'safe-cologne-primary',
            'label'        => __('SafeCologne Primary', 'safe-cologne'),
            'style_handle' => 'safe-cologne-blocks',
        )
    );
    
    register_block_style(
        'core/button',
        array(
            'name'         => 'safe-cologne-outline',
            'label'        => __('SafeCologne Outline', 'safe-cologne'),
            'style_handle' => 'safe-cologne-blocks',
        )
    );
    
    // Heading styles
    register_block_style(
        'core/heading',
        array(
            'name'         => 'safe-cologne-highlight',
            'label'        => __('SafeCologne Highlight', 'safe-cologne'),
            'style_handle' => 'safe-cologne-blocks',
        )
    );
    
    // Group styles
    register_block_style(
        'core/group',
        array(
            'name'         => 'safe-cologne-card',
            'label'        => __('SafeCologne Card', 'safe-cologne'),
            'style_handle' => 'safe-cologne-blocks',
        )
    );
    
    register_block_style(
        'core/group',
        array(
            'name'         => 'safe-cologne-gradient',
            'label'        => __('SafeCologne Gradient', 'safe-cologne'),
            'style_handle' => 'safe-cologne-blocks',
        )
    );
}

// Register block categories
add_filter('block_categories_all', 'safe_cologne_block_categories');
function safe_cologne_block_categories($categories) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'safe-cologne',
                'title' => __('SafeCologne Blocks', 'safe-cologne'),
                'icon'  => 'shield-alt',
            ),
        )
    );
}

// Enqueue block editor styles
add_action('enqueue_block_editor_assets', 'safe_cologne_block_editor_styles');
function safe_cologne_block_editor_styles() {
    wp_enqueue_style(
        'safe-cologne-block-editor',
        SAFE_COLOGNE_URI . '/assets/css/block-editor.css',
        array(),
        SAFE_COLOGNE_VERSION
    );
}

// Block styles CSS
add_action('wp_enqueue_scripts', 'safe_cologne_block_styles');
function safe_cologne_block_styles() {
    wp_register_style(
        'safe-cologne-blocks',
        SAFE_COLOGNE_URI . '/assets/css/blocks.css',
        array(),
        SAFE_COLOGNE_VERSION
    );
}

// Allow additional block supports
add_action('after_setup_theme', 'safe_cologne_block_supports');
function safe_cologne_block_supports() {
    // Add support for experimental link color control
    add_theme_support('experimental-link-color');
    
    // Add support for experimental block spacing
    add_theme_support('custom-spacing');
    
    // Add support for custom line height
    add_theme_support('custom-line-height');
    
    // Add support for custom units
    add_theme_support('custom-units', 'rem', 'em', 'px', '%', 'vh', 'vw');
}

// Disable certain blocks for better UX
add_filter('allowed_block_types_all', 'safe_cologne_allowed_blocks');
function safe_cologne_allowed_blocks($allowed_blocks, $editor_context) {
    // Only apply to posts and pages
    if (!isset($editor_context->post)) {
        return $allowed_blocks;
    }
    
    // Get all registered blocks
    $all_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
    $block_names = array_keys($all_blocks);
    
    // Remove blocks that we don't want to allow
    $disallowed_blocks = array(
        'core/more',
        'core/nextpage',
        'core/calendar',
        'core/tag-cloud',
        'core/rss',
        'core/latest-comments',
        'core/archives',
        'core/categories',
    );
    
    return array_diff($block_names, $disallowed_blocks);
}

// Add custom block templates for specific pages
add_action('init', 'safe_cologne_register_block_templates');
function safe_cologne_register_block_templates() {
    // Get post types that support editor
    $post_types = get_post_types(array('show_in_rest' => true), 'names');
    
    foreach ($post_types as $post_type) {
        // Skip if post type doesn't support editor
        if (!post_type_supports($post_type, 'editor')) {
            continue;
        }
        
        // Add template for specific post types
        if ($post_type === 'jobs') {
            add_filter("rest_pre_insert_{$post_type}", function($post) {
                if (empty($post->post_content)) {
                    $post->post_content = '<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Stellenbeschreibung</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Beschreiben Sie hier die Stelle...</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Anforderungen</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->
<li>Anforderung 1</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Anforderung 2</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Was wir bieten</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->
<li>Benefit 1</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Benefit 2</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->';
                }
                return $post;
            });
        }
    }
}
?>