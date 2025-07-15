<?php
/**
 * Testimonials Template Part
 *
 * @package Safe_Cologne
 */

$testimonials = get_posts(array(
    'post_type' => 'testimonials',
    'posts_per_page' => 3,
    'meta_key' => '_security_rating',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
));
?>

<section class="section testimonials" aria-labelledby="testimonials-title">
    <div class="container">
        <h2 id="testimonials-title" class="section-title"><?php esc_html_e('Unsere Kunden vertrauen uns', 'safe-cologne'); ?></h2>
        
        <div class="testimonials-slider">
            <?php if ($testimonials) : ?>
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <?php
                            $rating = get_post_meta($testimonial->ID, '_security_rating', true);
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <blockquote>
                            "<?php echo esc_html($testimonial->post_content); ?>"
                        </blockquote>
                        <cite>
                            <strong><?php echo esc_html(get_post_meta($testimonial->ID, '_client_name', true)); ?></strong>
                            <span><?php echo esc_html(get_post_meta($testimonial->ID, '_client_position', true)); ?></span>
                            <span><?php echo esc_html(get_post_meta($testimonial->ID, '_client_company', true)); ?></span>
                        </cite>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Default testimonials if no custom ones exist -->
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote>
                        "Safe Cologne hat unsere Großveranstaltung perfekt abgesichert. Professionell, zuverlässig und immer freundlich!"
                    </blockquote>
                    <cite>
                        <strong>Michael K.</strong>
                        <span>Eventmanager, Köln</span>
                    </cite>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote>
                        "Seit 5 Jahren arbeiten wir mit Safe Cologne zusammen. Absolut verlässlich und kompetent!"
                    </blockquote>
                    <cite>
                        <strong>Sarah M.</strong>
                        <span>Geschäftsführerin, Retail</span>
                    </cite>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote>
                        "Der Personenschutz war erstklassig. Diskret, professionell und immer einen Schritt voraus."
                    </blockquote>
                    <cite>
                        <strong>Dr. Thomas L.</strong>
                        <span>Unternehmer</span>
                    </cite>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
