<?php
/**
 * Call to Action Section Pattern
 * 
 * @package Safe_Cologne
 */

return array(
	'title'      => __( 'Call to Action Section', 'safe-cologne' ),
	'categories' => array( 'safe-cologne' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}}},"gradient":"primary-gradient","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-gradient-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)">
	<!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"xx-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-xx-large-font-size">' . __( 'Bereit für mehr Sicherheit?', 'safe-cologne' ) . '</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}},"textColor":"white","fontSize":"large"} -->
	<p class="has-text-align-center has-white-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--large)">' . __( 'Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln. Kostenlose Beratung und maßgeschneiderte Lösungen.', 'safe-cologne' ) . '</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"border":{"radius":"50px"},"spacing":{"padding":{"left":"var:preset|spacing|large","right":"var:preset|spacing|large","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:50px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large)">' . __( 'Kostenlose Beratung', 'safe-cologne' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->'
);