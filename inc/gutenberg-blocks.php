<?php
/**
 * Custom Gutenberg Blocks for Safe Cologne
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
    
    // Register Service Showcase Block
    register_block_type('safe-cologne/service-showcase', array(
        'editor_script' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks-style',
        'render_callback' => 'safe_cologne_render_service_showcase_block',
        'attributes' => array(
            'services' => array(
                'type' => 'array',
                'default' => array(),
            ),
            'columns' => array(
                'type' => 'number',
                'default' => 3,
            ),
            'showPricing' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'showDescription' => array(
                'type' => 'boolean',
                'default' => true,
            ),
        ),
    ));
    
    // Register Team Member Block
    register_block_type('safe-cologne/team-member', array(
        'editor_script' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks-style',
        'render_callback' => 'safe_cologne_render_team_member_block',
        'attributes' => array(
            'memberId' => array(
                'type' => 'number',
                'default' => 0,
            ),
            'showBio' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'showCertifications' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'style' => array(
                'type' => 'string',
                'default' => 'card',
            ),
        ),
    ));
    
    // Register Testimonial Block
    register_block_type('safe-cologne/testimonial', array(
        'editor_script' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks-style',
        'render_callback' => 'safe_cologne_render_testimonial_block',
        'attributes' => array(
            'testimonialId' => array(
                'type' => 'number',
                'default' => 0,
            ),
            'showRating' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'showCompany' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'style' => array(
                'type' => 'string',
                'default' => 'quote',
            ),
        ),
    ));
    
    // Register Security Features Comparison Block
    register_block_type('safe-cologne/security-features', array(
        'editor_script' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks-style',
        'render_callback' => 'safe_cologne_render_security_features_block',
        'attributes' => array(
            'features' => array(
                'type' => 'array',
                'default' => array(),
            ),
            'columns' => array(
                'type' => 'number',
                'default' => 2,
            ),
            'showIcons' => array(
                'type' => 'boolean',
                'default' => true,
            ),
        ),
    ));
    
    // Register Call to Action Block
    register_block_type('safe-cologne/call-to-action', array(
        'editor_script' => 'safe-cologne-blocks-editor',
        'style' => 'safe-cologne-blocks-style',
        'render_callback' => 'safe_cologne_render_cta_block',
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => '',
            ),
            'description' => array(
                'type' => 'string',
                'default' => '',
            ),
            'buttonText' => array(
                'type' => 'string',
                'default' => 'Jetzt Kontakt aufnehmen',
            ),
            'buttonUrl' => array(
                'type' => 'string',
                'default' => '/kontakt',
            ),
            'backgroundColor' => array(
                'type' => 'string',
                'default' => '#E30613',
            ),
            'textColor' => array(
                'type' => 'string',
                'default' => '#ffffff',
            ),
            'style' => array(
                'type' => 'string',
                'default' => 'default',
            ),
        ),
    ));
}

// Enqueue block editor assets
add_action('enqueue_block_editor_assets', 'safe_cologne_enqueue_block_editor_assets');
function safe_cologne_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'safe-cologne-blocks-editor',
        get_template_directory_uri() . '/assets/js/blocks-editor.js',
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
        SAFE_COLOGNE_VERSION,
        true
    );
    
    wp_localize_script('safe-cologne-blocks-editor', 'safeCologneBlocks', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('safe-cologne-blocks-nonce'),
        'services' => safe_cologne_get_services_for_blocks(),
        'teamMembers' => safe_cologne_get_team_members_for_blocks(),
        'testimonials' => safe_cologne_get_testimonials_for_blocks(),
    ));
}

// Enqueue block styles
add_action('enqueue_block_assets', 'safe_cologne_enqueue_block_assets');
function safe_cologne_enqueue_block_assets() {
    wp_enqueue_style(
        'safe-cologne-blocks-style',
        get_template_directory_uri() . '/assets/css/blocks.css',
        array(),
        SAFE_COLOGNE_VERSION
    );
}

// Block render functions
function safe_cologne_render_service_showcase_block($attributes) {
    $services = $attributes['services'];
    $columns = $attributes['columns'];
    $show_pricing = $attributes['showPricing'];
    $show_description = $attributes['showDescription'];
    
    if (empty($services)) {
        // Get all services if none specified
        $services_query = new WP_Query(array(
            'post_type' => 'security_services',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ));
        
        if (!$services_query->have_posts()) {
            return '<p>' . __('Keine Sicherheitsdienste gefunden.', 'safe-cologne') . '</p>';
        }
        
        $services = array();
        while ($services_query->have_posts()) {
            $services_query->the_post();
            $services[] = get_the_ID();
        }
        wp_reset_postdata();
    }
    
    ob_start();
    ?>
    <div class="sc-service-showcase sc-columns-<?php echo esc_attr($columns); ?>">
        <div class="sc-service-grid">
            <?php foreach ($services as $service_id): ?>
                <?php $service = get_post($service_id); ?>
                <?php if ($service && $service->post_status === 'publish'): ?>
                    <div class="sc-service-card">
                        <?php if (has_post_thumbnail($service_id)): ?>
                            <div class="sc-service-image">
                                <?php echo get_the_post_thumbnail($service_id, 'service-thumb'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="sc-service-content">
                            <h3 class="sc-service-title"><?php echo esc_html($service->post_title); ?></h3>
                            <?php if ($show_description): ?>
                                <div class="sc-service-description">
                                    <?php echo wp_kses_post($service->post_excerpt ?: wp_trim_words($service->post_content, 20)); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_pricing): ?>
                                <?php $price_range = get_post_meta($service_id, '_service_price_range', true); ?>
                                <?php if ($price_range): ?>
                                    <div class="sc-service-price"><?php echo esc_html($price_range); ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(get_permalink($service_id)); ?>" class="sc-service-link">
                                <?php _e('Mehr erfahren', 'safe-cologne'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function safe_cologne_render_team_member_block($attributes) {
    $member_id = $attributes['memberId'];
    $show_bio = $attributes['showBio'];
    $show_certifications = $attributes['showCertifications'];
    $style = $attributes['style'];
    
    if (!$member_id) {
        return '<p>' . __('Bitte wählen Sie ein Teammitglied aus.', 'safe-cologne') . '</p>';
    }
    
    $member = get_post($member_id);
    if (!$member || $member->post_type !== 'team_members') {
        return '<p>' . __('Teammitglied nicht gefunden.', 'safe-cologne') . '</p>';
    }
    
    $position = get_post_meta($member_id, '_member_position', true);
    $experience = get_post_meta($member_id, '_member_experience', true);
    $certifications = get_post_meta($member_id, '_member_certifications', true);
    
    ob_start();
    ?>
    <div class="sc-team-member sc-team-<?php echo esc_attr($style); ?>">
        <?php if (has_post_thumbnail($member_id)): ?>
            <div class="sc-member-image">
                <?php echo get_the_post_thumbnail($member_id, 'team-member'); ?>
            </div>
        <?php endif; ?>
        <div class="sc-member-content">
            <h3 class="sc-member-name"><?php echo esc_html($member->post_title); ?></h3>
            <?php if ($position): ?>
                <div class="sc-member-position"><?php echo esc_html($position); ?></div>
            <?php endif; ?>
            <?php if ($experience): ?>
                <div class="sc-member-experience">
                    <?php printf(__('%d Jahre Erfahrung', 'safe-cologne'), $experience); ?>
                </div>
            <?php endif; ?>
            <?php if ($show_bio && $member->post_content): ?>
                <div class="sc-member-bio">
                    <?php echo wp_kses_post($member->post_content); ?>
                </div>
            <?php endif; ?>
            <?php if ($show_certifications && $certifications): ?>
                <div class="sc-member-certifications">
                    <strong><?php _e('Zertifizierungen:', 'safe-cologne'); ?></strong>
                    <?php echo wp_kses_post(nl2br($certifications)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function safe_cologne_render_testimonial_block($attributes) {
    $testimonial_id = $attributes['testimonialId'];
    $show_rating = $attributes['showRating'];
    $show_company = $attributes['showCompany'];
    $style = $attributes['style'];
    
    if (!$testimonial_id) {
        return '<p>' . __('Bitte wählen Sie eine Referenz aus.', 'safe-cologne') . '</p>';
    }
    
    $testimonial = get_post($testimonial_id);
    if (!$testimonial || $testimonial->post_type !== 'testimonials') {
        return '<p>' . __('Referenz nicht gefunden.', 'safe-cologne') . '</p>';
    }
    
    $client_name = get_post_meta($testimonial_id, '_client_name', true);
    $client_company = get_post_meta($testimonial_id, '_client_company', true);
    $client_position = get_post_meta($testimonial_id, '_client_position', true);
    $rating = get_post_meta($testimonial_id, '_security_rating', true);
    
    ob_start();
    ?>
    <div class="sc-testimonial sc-testimonial-<?php echo esc_attr($style); ?>">
        <?php if ($show_rating && $rating): ?>
            <div class="sc-testimonial-rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span class="sc-star<?php echo $i <= $rating ? ' filled' : ''; ?>">★</span>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
        <div class="sc-testimonial-content">
            <?php if ($style === 'quote'): ?>
                <blockquote><?php echo wp_kses_post($testimonial->post_content); ?></blockquote>
            <?php else: ?>
                <p><?php echo wp_kses_post($testimonial->post_content); ?></p>
            <?php endif; ?>
        </div>
        <div class="sc-testimonial-author">
            <div class="sc-author-name"><?php echo esc_html($client_name); ?></div>
            <?php if ($show_company && ($client_position || $client_company)): ?>
                <div class="sc-author-details">
                    <?php if ($client_position): ?>
                        <span class="sc-author-position"><?php echo esc_html($client_position); ?></span>
                    <?php endif; ?>
                    <?php if ($client_company): ?>
                        <span class="sc-author-company"><?php echo esc_html($client_company); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function safe_cologne_render_security_features_block($attributes) {
    $features = $attributes['features'];
    $columns = $attributes['columns'];
    $show_icons = $attributes['showIcons'];
    
    if (empty($features)) {
        return '<p>' . __('Keine Features konfiguriert.', 'safe-cologne') . '</p>';
    }
    
    ob_start();
    ?>
    <div class="sc-security-features sc-columns-<?php echo esc_attr($columns); ?>">
        <div class="sc-features-grid">
            <?php foreach ($features as $feature): ?>
                <div class="sc-feature-item">
                    <?php if ($show_icons && !empty($feature['icon'])): ?>
                        <div class="sc-feature-icon">
                            <i class="<?php echo esc_attr($feature['icon']); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <div class="sc-feature-content">
                        <h4 class="sc-feature-title"><?php echo esc_html($feature['title']); ?></h4>
                        <p class="sc-feature-description"><?php echo esc_html($feature['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function safe_cologne_render_cta_block($attributes) {
    $title = $attributes['title'];
    $description = $attributes['description'];
    $button_text = $attributes['buttonText'];
    $button_url = $attributes['buttonUrl'];
    $bg_color = $attributes['backgroundColor'];
    $text_color = $attributes['textColor'];
    $style = $attributes['style'];
    
    ob_start();
    ?>
    <div class="sc-cta-block sc-cta-<?php echo esc_attr($style); ?>" style="background-color: <?php echo esc_attr($bg_color); ?>; color: <?php echo esc_attr($text_color); ?>;">
        <div class="sc-cta-content">
            <?php if ($title): ?>
                <h3 class="sc-cta-title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($description): ?>
                <p class="sc-cta-description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            <?php if ($button_text && $button_url): ?>
                <a href="<?php echo esc_url($button_url); ?>" class="sc-cta-button">
                    <?php echo esc_html($button_text); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// Helper functions for block data
function safe_cologne_get_services_for_blocks() {
    $services = array();
    $query = new WP_Query(array(
        'post_type' => 'security_services',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));
    
    while ($query->have_posts()) {
        $query->the_post();
        $services[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
        );
    }
    wp_reset_postdata();
    
    return $services;
}

function safe_cologne_get_team_members_for_blocks() {
    $members = array();
    $query = new WP_Query(array(
        'post_type' => 'team_members',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));
    
    while ($query->have_posts()) {
        $query->the_post();
        $members[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'position' => get_post_meta(get_the_ID(), '_member_position', true),
        );
    }
    wp_reset_postdata();
    
    return $members;
}

function safe_cologne_get_testimonials_for_blocks() {
    $testimonials = array();
    $query = new WP_Query(array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));
    
    while ($query->have_posts()) {
        $query->the_post();
        $client_name = get_post_meta(get_the_ID(), '_client_name', true);
        $testimonials[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'client' => $client_name,
        );
    }
    wp_reset_postdata();
    
    return $testimonials;
}