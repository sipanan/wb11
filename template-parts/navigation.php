<?php
/**
 * Navigation Template Part
 *
 * @package Safe_Cologne
 */
?>

<nav class="navbar" role="navigation" aria-label="<?php esc_attr_e('Hauptnavigation', 'safe-cologne'); ?>">
    <div class="container">
        <div class="nav-wrapper">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="<?php esc_attr_e('Safe Cologne Startseite', 'safe-cologne'); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="logo-container">
                        <div class="logo-icon">
                            <i class="fas fa-shield-alt"></i>
                            <div class="logo-cathedral"></div>
                        </div>
                        <div class="logo-text">
                            <span class="logo-name"><?php bloginfo('name'); ?></span>
                            <span class="logo-tagline"><?php bloginfo('description'); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </a>
            
            <!-- Mobile Toggle -->
            <button class="mobile-toggle" aria-label="<?php esc_attr_e('Menü öffnen', 'safe-cologne'); ?>" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
            
            <!-- Navigation Menu -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'safe_cologne_fallback_menu',
            ));
            ?>
            
            <!-- Emergency Contact -->
            <?php
            $options = get_option('safe_cologne_settings');
            $phone = isset($options['phone']) ? $options['phone'] : '0221 65058801';
            ?>
            <div class="emergency-contact">
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="phone-link">
                    <i class="fas fa-phone-alt"></i>
                    <span><?php esc_html_e('
                </a>
            </div>
        </div>
    </div>
</nav>

<?php
// Fallback menu function
function safe_cologne_fallback_menu() {
    ?>
    <ul id="primary-menu" class="nav-menu">
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Startseite', 'safe-cologne'); ?></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('dienstleistungen'))); ?>"><?php esc_html_e('Dienstleistungen', 'safe-cologne'); ?></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('ueber-uns'))); ?>"><?php esc_html_e('Über uns', 'safe-cologne'); ?></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('jobportal'))); ?>"><?php esc_html_e('Karriere', 'safe-cologne'); ?></a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>" class="nav-cta"><?php esc_html_e('Kontakt', 'safe-cologne'); ?></a></li>
    </ul>
    <?php
}
?>
