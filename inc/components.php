<?php
/**
 * Component System
 * 
 * @package Safe_Cologne
 */

// Component loader function
function safe_cologne_component($component_name, $args = array()) {
    $component_path = SAFE_COLOGNE_PATH . "/components/{$component_name}.php";
    
    if (file_exists($component_path)) {
        // Extract arguments as variables
        extract($args);
        
        // Start output buffering
        ob_start();
        
        // Include the component
        include $component_path;
        
        // Return the output
        return ob_get_clean();
    }
    
    return '';
}

// Component shortcode
function safe_cologne_component_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'name' => '',
        'class' => '',
        'style' => '',
    ), $atts);
    
    if (empty($atts['name'])) {
        return '';
    }
    
    $args = array(
        'class' => $atts['class'],
        'style' => $atts['style'],
        'content' => $content,
    );
    
    return safe_cologne_component($atts['name'], $args);
}
add_shortcode('component', 'safe_cologne_component_shortcode');

// Register component areas
function safe_cologne_register_component_areas() {
    register_sidebar(array(
        'name'          => __('Header Components', 'safe-cologne'),
        'id'            => 'header-components',
        'description'   => __('Components for the header area', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="component-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="component-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Components', 'safe-cologne'),
        'id'            => 'footer-components',
        'description'   => __('Components for the footer area', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="component-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="component-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'safe_cologne_register_component_areas');

// Component widget
class Safe_Cologne_Component_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'safe_cologne_component',
            __('Safe Cologne Component', 'safe-cologne'),
            array('description' => __('Display a reusable component', 'safe-cologne'))
        );
    }
    
    public function widget($args, $instance) {
        if (!empty($instance['component'])) {
            echo $args['before_widget'];
            
            if (!empty($instance['title'])) {
                echo $args['before_title'] . $instance['title'] . $args['after_title'];
            }
            
            echo safe_cologne_component($instance['component'], $instance);
            
            echo $args['after_widget'];
        }
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $component = !empty($instance['component']) ? $instance['component'] : '';
        
        // Get available components
        $components = safe_cologne_get_available_components();
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'safe-cologne'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('component'); ?>"><?php _e('Component:', 'safe-cologne'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('component'); ?>" name="<?php echo $this->get_field_name('component'); ?>">
                <option value=""><?php _e('Select a component', 'safe-cologne'); ?></option>
                <?php foreach ($components as $comp_name => $comp_label) : ?>
                    <option value="<?php echo esc_attr($comp_name); ?>" <?php selected($component, $comp_name); ?>><?php echo esc_html($comp_label); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['component'] = (!empty($new_instance['component'])) ? strip_tags($new_instance['component']) : '';
        
        return $instance;
    }
}

// Register the widget
function safe_cologne_register_component_widget() {
    register_widget('Safe_Cologne_Component_Widget');
}
add_action('widgets_init', 'safe_cologne_register_component_widget');

// Get available components
function safe_cologne_get_available_components() {
    $components_dir = SAFE_COLOGNE_PATH . '/components';
    $components = array();
    
    if (is_dir($components_dir)) {
        $files = scandir($components_dir);
        
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $component_name = pathinfo($file, PATHINFO_FILENAME);
                $components[$component_name] = ucwords(str_replace(['-', '_'], ' ', $component_name));
            }
        }
    }
    
    return $components;
}

// Render ACF flexible content components
function safe_cologne_render_flexible_content($field_name, $post_id = null) {
    if (!function_exists('have_rows')) {
        return;
    }
    
    if (have_rows($field_name, $post_id)) {
        while (have_rows($field_name, $post_id)) {
            the_row();
            $layout = get_row_layout();
            
            // Try to load component based on layout name
            $component_path = SAFE_COLOGNE_PATH . "/components/{$layout}.php";
            
            if (file_exists($component_path)) {
                include $component_path;
            } else {
                // Fallback to default component rendering
                safe_cologne_render_default_component($layout);
            }
        }
    }
}

// Default component rendering
function safe_cologne_render_default_component($layout) {
    switch ($layout) {
        case 'cta_section':
            $title = get_sub_field('cta_title');
            $description = get_sub_field('cta_description');
            $background = get_sub_field('cta_background');
            
            echo safe_cologne_component('cta-section', array(
                'title' => $title,
                'description' => $description,
                'background' => $background,
                'buttons' => get_sub_field('cta_buttons'),
            ));
            break;
            
        case 'text_section':
            $title = get_sub_field('text_title');
            $content = get_sub_field('text_content');
            $columns = get_sub_field('text_columns');
            
            echo safe_cologne_component('text-section', array(
                'title' => $title,
                'content' => $content,
                'columns' => $columns,
            ));
            break;
            
        case 'image_text_section':
            $title = get_sub_field('image_text_title');
            $content = get_sub_field('image_text_content');
            $image = get_sub_field('image_text_image');
            $layout = get_sub_field('image_text_layout');
            
            echo safe_cologne_component('image-text-section', array(
                'title' => $title,
                'content' => $content,
                'image' => $image,
                'layout' => $layout,
            ));
            break;
            
        default:
            // Try to render custom component
            do_action('safe_cologne_render_component', $layout);
            break;
    }
}

// Component CSS and JS enqueuing
function safe_cologne_enqueue_component_assets($component_name) {
    $css_path = SAFE_COLOGNE_PATH . "/components/{$component_name}.css";
    $js_path = SAFE_COLOGNE_PATH . "/components/{$component_name}.js";
    
    if (file_exists($css_path)) {
        wp_enqueue_style(
            "safe-cologne-component-{$component_name}",
            SAFE_COLOGNE_URI . "/components/{$component_name}.css",
            array(),
            SAFE_COLOGNE_VERSION
        );
    }
    
    if (file_exists($js_path)) {
        wp_enqueue_script(
            "safe-cologne-component-{$component_name}",
            SAFE_COLOGNE_URI . "/components/{$component_name}.js",
            array('jquery'),
            SAFE_COLOGNE_VERSION,
            true
        );
    }
}

// Auto-enqueue component assets
function safe_cologne_auto_enqueue_component_assets() {
    // Get all components used on the current page
    $used_components = safe_cologne_get_page_components();
    
    foreach ($used_components as $component) {
        safe_cologne_enqueue_component_assets($component);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_auto_enqueue_component_assets');

// Get components used on current page
function safe_cologne_get_page_components() {
    global $post;
    $components = array();
    
    if (!$post) {
        return $components;
    }
    
    // Check ACF flexible content fields
    if (function_exists('get_field')) {
        $page_components = get_field('page_components', $post->ID);
        
        if ($page_components) {
            foreach ($page_components as $component) {
                if (isset($component['acf_fc_layout'])) {
                    $components[] = $component['acf_fc_layout'];
                }
            }
        }
    }
    
    // Check post content for component shortcodes
    if (has_shortcode($post->post_content, 'component')) {
        preg_match_all('/\[component[^\]]*name="([^"]+)"[^\]]*\]/', $post->post_content, $matches);
        
        if (isset($matches[1])) {
            $components = array_merge($components, $matches[1]);
        }
    }
    
    return array_unique($components);
}

// Component template function
function safe_cologne_template_component($component_name, $args = array()) {
    echo safe_cologne_component($component_name, $args);
}

// Component exists check
function safe_cologne_component_exists($component_name) {
    return file_exists(SAFE_COLOGNE_PATH . "/components/{$component_name}.php");
}

// Component debug info
function safe_cologne_component_debug($component_name) {
    if (WP_DEBUG && current_user_can('manage_options')) {
        echo "<!-- Component: {$component_name} -->";
    }
}