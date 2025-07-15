<?php
/**
 * Template Name: Über Uns
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if (function_exists('bcn_display')) : ?>
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php bcn_display(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="ueber-uns-page">
    <!-- Company Story Section -->
    <section class="section">
        <div class="container">
            <div class="company-story">
                <div class="story-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    
                    <div class="company-stats">
                        <div class="stat-item">
                            <strong><?php echo esc_html(get_theme_mod('safe_cologne_founding_year', '2023')); ?></strong>
                            <span><?php esc_html_e('Gegründet', 'safe-cologne'); ?></span>
                        </div>
                        <div class="stat-item">
                            <strong><?php echo esc_html(get_theme_mod('safe_cologne_clients_count', '50')); ?>+</strong>
                            <span><?php esc_html_e('Zufriedene Kunden', 'safe-cologne'); ?></span>
                        </div>
                        <div class="stat-item">
                            <strong><?php echo esc_html(get_theme_mod('safe_cologne_experience_years', '20')); ?>+</strong>
                            <span><?php esc_html_e('Jahre Erfahrung', 'safe-cologne'); ?></span>
                        </div>
                        <div class="stat-item">
                            <strong>24/7</strong>
                            <span><?php esc_html_e('Verfügbarkeit', 'safe-cologne'); ?></span>
                        </div>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="story-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <!-- Team Section -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Unser Expertenteam', 'safe-cologne'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Professionell, erfahren und zuverlässig', 'safe-cologne'); ?></p>
            
            <div class="team-grid">
                <?php
                $team_members = get_posts(array(
                    'post_type' => 'team_members',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                foreach ($team_members as $member) : ?>
                    <div class="team-member-card">
                        <?php if (has_post_thumbnail($member->ID)) : ?>
                            <div class="member-photo">
                                <?php echo get_the_post_thumbnail($member->ID, 'team-member'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="member-info">
                            <h4><?php echo esc_html($member->post_title); ?></h4>
                            <p class="member-position">
                                <?php echo esc_html(get_post_meta($member->ID, '_member_position', true)); ?>
                            </p>
                            
                            <?php $experience = get_post_meta($member->ID, '_member_experience', true); ?>
                            <?php if ($experience) : ?>
                                <p class="member-experience">
                                    <?php printf(esc_html__('%d Jahre Erfahrung', 'safe-cologne'), $experience); ?>
                                </p>
                            <?php endif; ?>
                            
                            <?php $certifications = get_post_meta($member->ID, '_member_certifications', true); ?>
                            <?php if ($certifications) : ?>
                                <div class="member-certifications">
                                    <strong><?php esc_html_e('Zertifizierungen:', 'safe-cologne'); ?></strong>
                                    <p><?php echo esc_html($certifications); ?></p>
                                </div>
                            <?php endif; ?>
                            
                            <?php $specialization = get_post_meta($member->ID, '_member_specialization', true); ?>
                            <?php if ($specialization) : ?>
                                <p class="member-specialization">
                                    <strong><?php esc_html_e('Spezialisierung:', 'safe-cologne'); ?></strong> 
                                    <?php echo esc_html($specialization); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <!-- Values Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Unsere Werte', 'safe-cologne'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Was uns antreibt und auszeichnet', 'safe-cologne'); ?></p>
            
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3><?php esc_html_e('Sicherheit', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Höchste Sicherheitsstandards und kontinuierliche Weiterbildung unserer Mitarbeiter.', 'safe-cologne'); ?></p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3><?php esc_html_e('Vertrauen', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Langfristige Partnerschaften basierend auf Zuverlässigkeit und Transparenz.', 'safe-cologne'); ?></p>
                </div>                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3><?php esc_html_e('Teamwork', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Gemeinsam stark - wir arbeiten Hand in Hand für Ihre Sicherheit.', 'safe-cologne'); ?></p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3><?php esc_html_e('Innovation', 'safe-cologne'); ?></h3>
                    <p><?php esc_html_e('Moderne Technologien und innovative Lösungen für optimale Sicherheit.', 'safe-cologne'); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <?php get_template_part('template-parts/testimonials'); ?>
    
    <!-- CTA Section -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <h2><?php esc_html_e('Lernen Sie uns persönlich kennen', 'safe-cologne'); ?></h2>
                <p><?php esc_html_e('Überzeugen Sie sich selbst von unserer Kompetenz und Zuverlässigkeit.', 'safe-cologne'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>" class="btn btn-white btn-lg">
                        <i class="fas fa-calendar-check"></i>
                        <?php esc_html_e('Termin vereinbaren', 'safe-cologne'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_option('safe_cologne_settings')['phone'] ?? '022165058801')); ?>" class="btn btn-white btn-lg">
                        <i class="fas fa-phone-alt"></i>
                        <?php esc_html_e('Direkt anrufen', 'safe-cologne'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
