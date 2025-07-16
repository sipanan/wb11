<?php
/**
 * Simple Clean Header
 * @package Safe_Cologne
 */

$phone_number = get_theme_mod('safe_cologne_phone', '0221 6505 8801');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="header-top">
    <div class="container">
        <div class="header-top-left">
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_number)); ?>">
                <i class="fas fa-phone"></i>
                <?php echo esc_html($phone_number); ?>
            </a>
            <span>NOTRUF</span>
        </div>
        <div class="header-top-right">
            <span><?php echo date('Y-m-d H:i:s'); ?></span>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <i class="fas fa-shield-alt"></i>
                    <span><?php bloginfo('name'); ?></span>
                </a>
            </div>
            
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>
            
            <div class="header-cta">
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_number)); ?>" class="emergency-button">
                    <i class="fas fa-phone"></i>
                    Notruf
                </a>
            </div>
        </div>
    </div>
</header>

<main id="main-content" class="site-main"><?php