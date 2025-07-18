<?php
/**
 * Custom Blocks for Safe Cologne Theme
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom block categories
 */
add_filter('block_categories_all', 'safe_cologne_block_categories', 10, 2);
function safe_cologne_block_categories($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'safe-cologne',
                'title' => __('Safe Cologne Blocks', 'safe-cologne'),
                'icon'  => 'shield',
            ),
        ),
        $categories
    );
}

/**
 * Register custom blocks
 */
add_action('init', 'safe_cologne_register_blocks');
function safe_cologne_register_blocks() {
    // Check if Gutenberg is active
    if (!function_exists('register_block_type')) {
        return;
    }
    
    // Register Hero Block
    register_block_type('safe-cologne/hero-block', array(
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => 'Professionelle Sicherheit für Köln'
            ),
            'subtitle' => array(
                'type' => 'string',
                'default' => 'Sicherheitsdienst mit Herz & System'
            ),
            'description' => array(
                'type' => 'string',
                'default' => 'Wir schützen Menschen, Objekte und Veranstaltungen mit modernster Technik und geschulten Profis.'
            ),
            'backgroundImage' => array(
                'type' => 'string',
                'default' => ''
            ),
            'primaryButton' => array(
                'type' => 'object',
                'default' => array(
                    'text' => 'Jetzt anrufen',
                    'url' => 'tel:022165058801'
                )
            ),
            'secondaryButton' => array(
                'type' => 'object',
                'default' => array(
                    'text' => 'Mehr erfahren',
                    'url' => '#services'
                )
            )
        ),
        'render_callback' => 'safe_cologne_render_hero_block',
        'editor_script' => 'safe-cologne-blocks-editor',
        'editor_style' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks'
    ));
    
    // Register Service Card Block
    register_block_type('safe-cologne/service-card', array(
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => 'Sicherheitsdienst'
            ),
            'description' => array(
                'type' => 'string',
                'default' => 'Professionelle Sicherheitslösungen für Ihr Unternehmen.'
            ),
            'image' => array(
                'type' => 'object',
                'default' => array('url' => '', 'alt' => '')
            ),
            'features' => array(
                'type' => 'array',
                'default' => array()
            ),
            'price' => array(
                'type' => 'string',
                'default' => ''
            ),
            'buttonText' => array(
                'type' => 'string',
                'default' => 'Mehr erfahren'
            ),
            'buttonUrl' => array(
                'type' => 'string',
                'default' => ''
            )
        ),
        'render_callback' => 'safe_cologne_render_service_card_block',
        'editor_script' => 'safe-cologne-blocks-editor',
        'editor_style' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks'
    ));
    
    // Register CTA Block
    register_block_type('safe-cologne/cta-block', array(
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => 'Bereit für professionelle Sicherheit?'
            ),
            'description' => array(
                'type' => 'string',
                'default' => 'Kontaktieren Sie uns für eine kostenlose Beratung.'
            ),
            'backgroundColor' => array(
                'type' => 'string',
                'default' => 'primary'
            ),
            'buttons' => array(
                'type' => 'array',
                'default' => array(
                    array(
                        'text' => 'Jetzt kontaktieren',
                        'url' => '/kontakt',
                        'style' => 'primary'
                    )
                )
            )
        ),
        'render_callback' => 'safe_cologne_render_cta_block',
        'editor_script' => 'safe-cologne-blocks-editor',
        'editor_style' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks'
    ));
    
    // Register Team Member Block
    register_block_type('safe-cologne/team-member', array(
        'attributes' => array(
            'name' => array(
                'type' => 'string',
                'default' => 'Team Mitglied'
            ),
            'position' => array(
                'type' => 'string',
                'default' => 'Sicherheitsmitarbeiter'
            ),
            'image' => array(
                'type' => 'object',
                'default' => array('url' => '', 'alt' => '')
            ),
            'experience' => array(
                'type' => 'string',
                'default' => ''
            ),
            'certifications' => array(
                'type' => 'array',
                'default' => array()
            ),
            'description' => array(
                'type' => 'string',
                'default' => ''
            )
        ),
        'render_callback' => 'safe_cologne_render_team_member_block',
        'editor_script' => 'safe-cologne-blocks-editor',
        'editor_style' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks'
    ));
}

/**
 * Hero Block Render Callback
 */
function safe_cologne_render_hero_block($attributes) {
    $title = $attributes['title'] ?? 'Professionelle Sicherheit für Köln';
    $subtitle = $attributes['subtitle'] ?? 'Sicherheitsdienst mit Herz & System';
    $description = $attributes['description'] ?? 'Wir schützen Menschen, Objekte und Veranstaltungen.';
    $background_image = $attributes['backgroundImage'] ?? '';
    $primary_button = $attributes['primaryButton'] ?? array();
    $secondary_button = $attributes['secondaryButton'] ?? array();
    
    ob_start();
    ?>
    <section class="hero-block bg-secondary">
        <?php if ($background_image): ?>
            <div class="hero-background">
                <div class="hero-overlay"></div>
                <img src="<?php echo esc_url($background_image); ?>" alt="Hero Background" class="hero-bg-image">
            </div>
        <?php endif; ?>
        
        <div class="container">
            <div class="hero-content text-center text-white">
                <div class="hero-badge">
                    <span><?php echo esc_html($subtitle); ?></span>
                </div>
                
                <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
                <p class="hero-description"><?php echo esc_html($description); ?></p>
                
                <div class="hero-cta">
                    <?php if (!empty($primary_button['text']) && !empty($primary_button['url'])): ?>
                        <a href="<?php echo esc_url($primary_button['url']); ?>" class="btn btn-primary btn-lg">
                            <?php echo esc_html($primary_button['text']); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($secondary_button['text']) && !empty($secondary_button['url'])): ?>
                        <a href="<?php echo esc_url($secondary_button['url']); ?>" class="btn btn-white btn-lg">
                            <?php echo esc_html($secondary_button['text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Service Card Block Render Callback
 */
function safe_cologne_render_service_card_block($attributes) {
    $title = $attributes['title'] ?? 'Sicherheitsdienst';
    $description = $attributes['description'] ?? '';
    $image = $attributes['image'] ?? array();
    $features = $attributes['features'] ?? array();
    $price = $attributes['price'] ?? '';
    $button_text = $attributes['buttonText'] ?? 'Mehr erfahren';
    $button_url = $attributes['buttonUrl'] ?? '';
    
    ob_start();
    ?>
    <article class="service-card bg-white rounded-xl shadow">
        <?php if (!empty($image['url'])): ?>
            <div class="service-image">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $title); ?>" loading="lazy">
            </div>
        <?php endif; ?>
        
        <div class="service-content p-6">
            <h3 class="service-title text-xl font-bold mb-3"><?php echo esc_html($title); ?></h3>
            
            <?php if ($description): ?>
                <p class="service-description text-gray-600 mb-4"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($features)): ?>
                <ul class="service-features mb-6">
                    <?php foreach ($features as $feature): ?>
                        <li><?php echo esc_html($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            
            <div class="service-footer flex justify-between items-center">
                <?php if ($price): ?>
                    <div class="service-price text-primary font-semibold"><?php echo esc_html($price); ?></div>
                <?php endif; ?>
                
                <?php if ($button_text && $button_url): ?>
                    <a href="<?php echo esc_url($button_url); ?>" class="service-link text-primary font-medium">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * CTA Block Render Callback
 */
function safe_cologne_render_cta_block($attributes) {
    $title = $attributes['title'] ?? 'Bereit für professionelle Sicherheit?';
    $description = $attributes['description'] ?? 'Kontaktieren Sie uns für eine kostenlose Beratung.';
    $background_color = $attributes['backgroundColor'] ?? 'primary';
    $buttons = $attributes['buttons'] ?? array();
    
    $bg_class = $background_color === 'primary' ? 'bg-primary' : 'bg-secondary';
    
    ob_start();
    ?>
    <section class="cta-block section <?php echo esc_attr($bg_class); ?>">
        <div class="container">
            <div class="cta-content text-center text-white">
                <h2 class="cta-title text-3xl font-bold mb-6"><?php echo esc_html($title); ?></h2>
                <p class="cta-description text-lg mb-8"><?php echo esc_html($description); ?></p>
                
                <?php if (!empty($buttons)): ?>
                    <div class="cta-buttons flex justify-center gap-4 flex-wrap">
                        <?php foreach ($buttons as $button): ?>
                            <?php if (!empty($button['text']) && !empty($button['url'])): ?>
                                <a href="<?php echo esc_url($button['url']); ?>" 
                                   class="btn <?php echo esc_attr($button['style'] === 'primary' ? 'btn-white' : 'btn-secondary'); ?> btn-lg">
                                    <?php echo esc_html($button['text']); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Team Member Block Render Callback
 */
function safe_cologne_render_team_member_block($attributes) {
    $name = $attributes['name'] ?? 'Team Mitglied';
    $position = $attributes['position'] ?? 'Sicherheitsmitarbeiter';
    $image = $attributes['image'] ?? array();
    $experience = $attributes['experience'] ?? '';
    $certifications = $attributes['certifications'] ?? array();
    $description = $attributes['description'] ?? '';
    
    ob_start();
    ?>
    <article class="team-member-card bg-white rounded-xl shadow p-6 text-center">
        <?php if (!empty($image['url'])): ?>
            <div class="team-member-image mb-4">
                <img src="<?php echo esc_url($image['url']); ?>" 
                     alt="<?php echo esc_attr($image['alt'] ?? $name); ?>" 
                     class="team-member-photo w-24 h-24 rounded-full mx-auto object-cover"
                     loading="lazy">
            </div>
        <?php endif; ?>
        
        <h3 class="team-member-name text-xl font-bold mb-2"><?php echo esc_html($name); ?></h3>
        <p class="team-member-position text-primary font-medium mb-3"><?php echo esc_html($position); ?></p>
        
        <?php if ($experience): ?>
            <p class="team-member-experience text-sm text-gray-600 mb-3">
                <?php echo esc_html($experience); ?> Jahre Erfahrung
            </p>
        <?php endif; ?>
        
        <?php if ($description): ?>
            <p class="team-member-description text-gray-600 mb-4"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($certifications)): ?>
            <div class="team-member-certifications">
                <h4 class="text-sm font-semibold mb-2">Zertifizierungen:</h4>
                <ul class="text-sm text-gray-600">
                    <?php foreach ($certifications as $cert): ?>
                        <li><?php echo esc_html($cert); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * Enqueue block assets
 */
add_action('enqueue_block_editor_assets', 'safe_cologne_enqueue_block_editor_assets');
function safe_cologne_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'safe-cologne-blocks-editor',
        SAFE_COLOGNE_URI . '/assets/js/blocks-editor.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'),
        SAFE_COLOGNE_VERSION,
        true
    );
    
    wp_enqueue_style(
        'safe-cologne-blocks-editor',
        SAFE_COLOGNE_URI . '/assets/css/blocks-editor.css',
        array('wp-edit-blocks'),
        SAFE_COLOGNE_VERSION
    );
}

/**
 * Enqueue block frontend assets
 */
add_action('wp_enqueue_scripts', 'safe_cologne_enqueue_block_assets');
function safe_cologne_enqueue_block_assets() {
    wp_enqueue_style(
        'safe-cologne-blocks',
        SAFE_COLOGNE_URI . '/assets/css/blocks.css',
        array(),
        SAFE_COLOGNE_VERSION
    );
}

/**
 * Add block patterns
 */
add_action('init', 'safe_cologne_register_block_patterns');
function safe_cologne_register_block_patterns() {
    // Hero section pattern
    register_block_pattern(
        'safe-cologne/hero-section',
        array(
            'title'       => __('Safe Cologne Hero Section', 'safe-cologne'),
            'description' => __('A hero section with background image, title, description and buttons', 'safe-cologne'),
            'content'     => '<!-- wp:safe-cologne/hero-block {"title":"Professionelle Sicherheit für Köln","subtitle":"Sicherheitsdienst mit Herz & System","description":"Wir schützen Menschen, Objekte und Veranstaltungen mit modernster Technik und geschulten Profis."} /-->',
            'categories'  => array('safe-cologne')
        )
    );
    
    // Services grid pattern
    register_block_pattern(
        'safe-cologne/services-grid',
        array(
            'title'       => __('Services Grid', 'safe-cologne'),
            'description' => __('A grid of service cards', 'safe-cologne'),
            'content'     => '<!-- wp:group {"className":"services-section"} -->
            <div class="wp-block-group services-section">
                <!-- wp:heading {"textAlign":"center","level":2} -->
                <h2 class="has-text-align-center">Unsere Sicherheitsdienstleistungen</h2>
                <!-- /wp:heading -->
                
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:safe-cologne/service-card {"title":"Veranstaltungsschutz","description":"Professionelle Sicherheit für Events aller Art"} /-->
                    </div>
                    <!-- /wp:column -->
                    
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:safe-cologne/service-card {"title":"Objektschutz","description":"24/7 Schutz für Ihre Immobilien"} /-->
                    </div>
                    <!-- /wp:column -->
                    
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:safe-cologne/service-card {"title":"Personenschutz","description":"Individueller Schutz für Personen"} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->',
            'categories'  => array('safe-cologne')
        )
    );
}

/**
 * Add server-side block rendering support for dynamic content
 */
add_filter('render_block', 'safe_cologne_render_dynamic_blocks', 10, 2);
function safe_cologne_render_dynamic_blocks($block_content, $block) {
    // Add dynamic features count to service cards
    if ($block['blockName'] === 'safe-cologne/service-card') {
        // This could fetch real data from custom post types
        $post_id = get_the_ID();
        if ($post_id && get_post_type($post_id) === 'security_services') {
            $features = get_post_meta($post_id, '_service_features', true);
            if ($features) {
                $features_array = explode("\n", $features);
                // Update block content with real features
                // Implementation would depend on specific requirements
            }
        }
    }
    
    return $block_content;
}

/**
 * Add theme support for block templates
 */
add_action('after_setup_theme', 'safe_cologne_add_block_template_support');
function safe_cologne_add_block_template_support() {
    add_theme_support('block-templates');
    add_theme_support('block-template-parts');
}

/**
 * Register block template parts
 */
add_filter('get_block_templates', 'safe_cologne_add_block_templates', 10, 3);
function safe_cologne_add_block_templates($templates, $query, $template_type) {
    if ($template_type !== 'wp_template_part') {
        return $templates;
    }
    
    // Add custom template parts for blocks
    $theme_templates = array(
        array(
            'slug' => 'safe-cologne-header',
            'title' => __('Safe Cologne Header', 'safe-cologne'),
            'content' => '',
            'area' => 'header'
        ),
        array(
            'slug' => 'safe-cologne-footer',
            'title' => __('Safe Cologne Footer', 'safe-cologne'),
            'content' => '',
            'area' => 'footer'
        )
    );
    
    foreach ($theme_templates as $template_data) {
        $templates[] = (object) array(
            'id' => $template_data['slug'],
            'slug' => $template_data['slug'],
            'title' => $template_data['title'],
            'content' => $template_data['content'],
            'area' => $template_data['area'],
            'source' => 'theme'
        );
    }
    
    return $templates;
}