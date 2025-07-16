<?php
/**
 * Template Name: Über Uns
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- About Hero -->
<section class="about-hero" aria-labelledby="about-hero-title">
    <div class="container">
        <h1 id="about-hero-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_about_hero_title', 'Über Safe Cologne')); ?>
        </h1>
        <p>
            <?php echo esc_html(get_theme_mod('safe_cologne_about_hero_subtitle', 'Ihr vertrauensvoller Partner für Sicherheit in Köln')); ?>
        </p>
    </div>
</section>

<!-- Company Story -->
<section class="company-story" aria-labelledby="story-title">
    <div class="container">
        <div class="story-content">
            <div class="story-text">
                <h2 id="story-title"><?php esc_html_e('Unsere Geschichte', 'safe-cologne'); ?></h2>
                <p><?php echo esc_html(get_theme_mod('safe_cologne_company_story', 'Seit über 15 Jahren stehen wir für Sicherheit und Vertrauen in Köln.')); ?></p>
                
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                
                <p><?php echo esc_html(get_theme_mod('safe_cologne_mission', 'Unsere Mission ist es, höchste Sicherheitsstandards mit menschlicher Wärme zu verbinden.')); ?></p>
            </div>
            
            <div class="story-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-story.jpg'); ?>" alt="<?php esc_attr_e('Über Safe Cologne', 'safe-cologne'); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section" aria-labelledby="values-title">
    <div class="container">
        <h2 id="values-title" class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_values_title', 'Unsere Werte')); ?>
        </h2>
        <p class="section-subtitle"><?php esc_html_e('Was uns antreibt und leitet', 'safe-cologne'); ?></p>
        
        <div class="values-grid">
            <?php
            $values = safe_cologne_get_company_values();
            foreach ($values as $value) : ?>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($value['title']); ?></h3>
                    <p><?php echo esc_html($value['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section" aria-labelledby="team-title">
    <div class="container">
        <h2 id="team-title" class="section-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_team_title', 'Unser Team')); ?>
        </h2>
        <p class="section-subtitle"><?php esc_html_e('Lernen Sie die Menschen hinter Safe Cologne kennen', 'safe-cologne'); ?></p>
        
        <div class="team-grid">
            <?php
            $team_members = safe_cologne_get_team_members();
            foreach ($team_members as $member) : ?>
                <div class="team-member">
                    <div class="member-image">
                        <?php if (isset($member['image']) && $member['image']) : ?>
                            <img src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>">
                        <?php else : ?>
                            <i class="fas fa-user"></i>
                        <?php endif; ?>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name"><?php echo esc_html($member['name']); ?></h3>
                        <p class="member-role"><?php echo esc_html($member['role']); ?></p>
                        <p class="member-description"><?php echo esc_html($member['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="timeline-section" aria-labelledby="timeline-title">
    <div class="container">
        <h2 id="timeline-title" class="section-title"><?php esc_html_e('Unsere Entwicklung', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Wichtige Meilensteine unserer Firmengeschichte', 'safe-cologne'); ?></p>
        
        <div class="timeline">
            <?php
            $timeline = safe_cologne_get_company_timeline();
            foreach ($timeline as $item) : ?>
                <div class="timeline-item">
                    <div class="timeline-date"><?php echo esc_html($item['year']); ?></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"><?php echo esc_html($item['title']); ?></h3>
                        <p class="timeline-description"><?php echo esc_html($item['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Certifications Section -->
<section class="certifications-section" aria-labelledby="certifications-title">
    <div class="container">
        <h2 id="certifications-title" class="section-title"><?php esc_html_e('Zertifikate & Qualifikationen', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Unsere Qualifikationen und Zertifizierungen', 'safe-cologne'); ?></p>
        
        <div class="certifications-grid">
            <?php
            $certifications = safe_cologne_get_certifications();
            foreach ($certifications as $certification) : ?>
                <div class="certification-card">
                    <div class="certification-icon">
                        <i class="<?php echo esc_attr($certification['icon']); ?>"></i>
                    </div>
                    <h4><?php echo esc_html($certification['title']); ?></h4>
                    <p><?php echo esc_html($certification['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
                
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
