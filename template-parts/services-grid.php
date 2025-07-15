<?php
/**
 * Services Grid Template Part
 *
 * @package Safe_Cologne
 */

$services = get_posts(array(
    'post_type' => 'security_services',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));
?>

<section id="leistungen" class="section services" aria-labelledby="services-title">
    <div class="container">
        <h2 id="services-title" class="section-title"><?php esc_html_e('Unsere Sicherheitslösungen', 'safe-cologne'); ?></h2>
        <p class="section-subtitle">
            <?php esc_html_e('Individuell geplant für jeden Bedarf', 'safe-cologne'); ?>
        </p>
        
        <div class="services-grid">
            <?php if ($services) : ?>
                <?php foreach ($services as $service) : ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <?php
                            $icon_class = get_post_meta($service->ID, '_service_icon', true);
                            if ($icon_class) {
                                echo '<i class="' . esc_attr($icon_class) . '"></i>';
                            } else {
                                echo '<i class="fas fa-shield-alt"></i>';
                            }
                            ?>
                        </div>
                        <div class="service-content">
                            <h3><?php echo esc_html($service->post_title); ?></h3>
                            <p><?php echo wp_kses_post($service->post_excerpt); ?></p>
                            <?php
                            $features = get_post_meta($service->ID, '_service_features', true);
                            if ($features) :
                                $features_array = explode("\n", $features);
                                ?>
                                <ul class="service-features">
                                    <?php foreach ($features_array as $feature) : ?>
                                        <?php if (trim($feature)) : ?>
                                            <li><i class="fas fa-check"></i> <?php echo esc_html(trim($feature)); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <a href="#kontakt" class="service-link">
                                <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Default Services if no custom services exist -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('Veranstaltungsordner & Event-Security', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Professionelle Sicherheit für Events jeder Größe - vom Konzert bis zur Firmengala.', 'safe-cologne'); ?></p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Einlasskontrolle', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Besucherstromlenkung', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Notfallmanagement', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('VIP-Betreuung', 'safe-cologne'); ?></li>
                        </ul>
                        <a href="#kontakt" class="service-link">
                            <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-building-shield"></i>
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('Objekt- und Werkschutz', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('24/7 Schutz für Ihre Immobilien, Bürogebäude und Industrieanlagen.', 'safe-cologne'); ?></p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Pfortendienst', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Kontrollgänge', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Alarmverfolgung', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Nachtschichtdienste', 'safe-cologne'); ?></li>
                        </ul>
                        <a href="#kontakt" class="service-link">
                            <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Diskreter VIP-Schutz und Begleitservice für besondere Anlässe.', 'safe-cologne'); ?></p>
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Risikoanalyse', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Begleitschutz', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Vorauskommandos', 'safe-cologne'); ?></li>
                            <li><i class="fas fa-check"></i> <?php esc_html_e('Internationale Einsätze', 'safe-cologne'); ?></li>
                        </ul>
                        <a href="#kontakt" class="service-link">
                            <?php esc_html_e('Mehr erfahren', 'safe-cologne'); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
