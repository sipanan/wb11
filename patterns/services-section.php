<?php
/**
 * Services Section Pattern
 * 
 * @package Safe_Cologne
 */

return array(
	'title'      => __( 'Services Section', 'safe-cologne' ),
	'categories' => array( 'safe-cologne' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}}},"backgroundColor":"gray-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)">
	<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">' . __( 'Unsere Sicherheitslösungen', 'safe-cologne' ) . '</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}}} -->
	<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--x-large)">' . __( 'Professionelle Sicherheit mit menschlichem Ansatz', 'safe-cologne' ) . '</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Objekt- und Werkschutz', 'safe-cologne' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . __( 'Rund um die Uhr Schutz für Ihre Immobilien, Bürogebäude und Industrieanlagen.', 'safe-cologne' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:list -->
				<ul>
					<li>' . __( 'Pfortendienst', 'safe-cologne' ) . '</li>
					<li>' . __( 'Kontrollgänge', 'safe-cologne' ) . '</li>
					<li>' . __( 'Alarmverfolgung', 'safe-cologne' ) . '</li>
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"50px"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:50px">' . __( 'Mehr erfahren', 'safe-cologne' ) . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Event Security', 'safe-cologne' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . __( 'Professionelle Sicherheit für Veranstaltungen jeder Größe.', 'safe-cologne' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:list -->
				<ul>
					<li>' . __( 'Personenkontrollen', 'safe-cologne' ) . '</li>
					<li>' . __( 'VIP-Begleitung', 'safe-cologne' ) . '</li>
					<li>' . __( 'Crowd Management', 'safe-cologne' ) . '</li>
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"50px"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:50px">' . __( 'Mehr erfahren', 'safe-cologne' ) . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)">
				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Personenschutz', 'safe-cologne' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . __( 'Diskrete und professionelle Begleitung für Ihre Sicherheit.', 'safe-cologne' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:list -->
				<ul>
					<li>' . __( 'VIP-Schutz', 'safe-cologne' ) . '</li>
					<li>' . __( 'Begleitschutz', 'safe-cologne' ) . '</li>
					<li>' . __( 'Bedrohungsanalyse', 'safe-cologne' ) . '</li>
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"border":{"radius":"50px"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:50px">' . __( 'Mehr erfahren', 'safe-cologne' ) . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->'
);