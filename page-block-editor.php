<?php
/**
 * Template Name: Block Editor Page
 * 
 * Full block editor compatible page template
 * Use this template for pages that should be editable with blocks
 * 
 * @package Safe_Cologne
 */

get_header(); ?>

<main id="primary" class="site-main block-editor-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'safe-cologne' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<style>
.block-editor-page {
    padding: 2rem 0;
    min-height: 60vh;
}

.block-editor-page .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.entry-header {
    text-align: center;
    margin-bottom: 3rem;
}

.entry-title {
    font-size: clamp(2rem, 4vw, 3rem);
    color: #111827;
    margin: 0;
    font-weight: 800;
}

.entry-content {
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.7;
}

.entry-content > * {
    margin-bottom: 1.5rem;
}

.entry-content h2,
.entry-content h3,
.entry-content h4 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #111827;
}

.entry-content p {
    color: #4B5563;
}

.page-links {
    margin-top: 2rem;
    text-align: center;
}

/* Ensure block editor styles work */
.wp-block-button .wp-block-button__link {
    border-radius: 4px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
}

.wp-block-button.is-style-outline .wp-block-button__link {
    border-width: 2px;
}

@media (max-width: 768px) {
    .block-editor-page {
        padding: 1rem 0;
    }
    
    .entry-header {
        margin-bottom: 2rem;
    }
}
</style>

<?php get_footer(); ?>