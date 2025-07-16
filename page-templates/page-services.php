<?php
/**
 * Template Name: Dienstleistungen (Services)
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Services Hero -->
<section class="services-hero" aria-labelledby="services-hero-title">
    <div class="container">
        <h1 id="services-hero-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_services_hero_title', 'Unsere Sicherheitslösungen')); ?>
        </h1>
        <p>
            <?php echo esc_html(get_theme_mod('safe_cologne_services_hero_subtitle', 'Professionelle Sicherheitsdienste für jeden Bedarf')); ?>
        </p>
    </div>
</section>

<!-- Services Main -->
<section class="services-main" aria-labelledby="services-main-title">
    <div class="container">
        <h2 id="services-main-title" class="section-title"><?php esc_html_e('Unsere Dienstleistungen', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Professionelle Sicherheitslösungen für alle Bereiche', 'safe-cologne'); ?></p>
        
        <div class="services-grid">
            <?php
            $services = safe_cologne_get_services();
            foreach ($services as $service) : ?>
                <article class="service-card" data-category="<?php echo esc_attr($service['category']); ?>">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                        </div>
                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p class="service-subtitle"><?php echo esc_html($service['subtitle']); ?></p>
                    </div>
                    
                    <div class="service-content">
                        <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                        
                        <ul class="service-features">
                            <?php foreach ($service['features'] as $feature) : ?>
                                <li><?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <a href="<?php echo esc_url(home_url('/kontakt/?service=' . urlencode($service['title']))); ?>" class="service-cta">
                            <?php esc_html_e('Angebot anfragen', 'safe-cologne'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section" aria-labelledby="process-title">
    <div class="container">
        <h2 id="process-title" class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_process_title', 'Unser Prozess')); ?>
        </h2>
        <p class="section-subtitle"><?php esc_html_e('So arbeiten wir für Ihre Sicherheit', 'safe-cologne'); ?></p>
        
        <div class="process-steps">
            <?php
            $process_steps = safe_cologne_get_process_steps();
            foreach ($process_steps as $step) : ?>
                <div class="process-step">
                    <div class="step-number"><?php echo esc_html($step['number']); ?></div>
                    <h3 class="step-title"><?php echo esc_html($step['title']); ?></h3>
                    <p class="step-description"><?php echo esc_html($step['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section" aria-labelledby="pricing-title">
    <div class="container">
        <h2 id="pricing-title" class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_pricing_title', 'Unsere Preise')); ?>
        </h2>
        <p class="section-subtitle"><?php esc_html_e('Transparente Preisgestaltung für professionelle Sicherheit', 'safe-cologne'); ?></p>
        
        <div class="pricing-grid">
            <?php
            $pricing_plans = safe_cologne_get_pricing_plans();
            foreach ($pricing_plans as $plan) : ?>
                <div class="pricing-card <?php echo $plan['featured'] ? 'featured' : ''; ?>">
                    <h3 class="pricing-title"><?php echo esc_html($plan['title']); ?></h3>
                    <div class="pricing-price"><?php echo esc_html($plan['price']); ?></div>
                    <div class="pricing-period"><?php echo esc_html($plan['period']); ?></div>
                    
                    <ul class="pricing-features">
                        <?php foreach ($plan['features'] as $feature) : ?>
                            <li><?php echo esc_html($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="<?php echo esc_url(home_url('/kontakt/?plan=' . urlencode($plan['title']))); ?>" class="pricing-cta">
                        <?php esc_html_e('Paket wählen', 'safe-cologne'); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="contact-cta" aria-labelledby="services-cta-title">
    <div class="container">
        <h2 id="services-cta-title"><?php esc_html_e('Individuelle Beratung gewünscht?', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Lassen Sie uns gemeinsam die optimale Sicherheitslösung für Sie entwickeln.', 'safe-cologne'); ?></p>
        <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="cta-button">
            <?php esc_html_e('Kostenlose Beratung', 'safe-cologne'); ?>
            <i class="fas fa-phone"></i>
        </a>
    </div>
</section>

<?php get_footer(); ?>