<?php
/**
 * Clean Footer Template for SafeCologne
 * Professional, minimal, and WordPress-compliant
 * 
 * @package Safe_Cologne
 * @version 2.1.0
 */

// Get theme options
$phone = get_theme_mod('safe_cologne_phone', '0221 6505 8801');
$email = get_theme_mod('safe_cologne_email', 'info@safecologne.de');
$address = get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln');
?>

    </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #content -->

<footer id="colophon" class="safecologne-footer" role="contentinfo">
    
    <!-- Footer Main -->
    <div class="sc-footer-main">
        <div class="sc-container">
            <div class="sc-footer-grid">
                
                <!-- Company Info -->
                <div class="sc-footer-column sc-footer-company">
                    <div class="sc-footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="SafeCologne" height="40">
                        </a>
                    </div>
                    <p class="sc-footer-tagline">
                        Ihr Sicherheitsdienst mit Herz & System
                    </p>
                    <div class="sc-footer-social">
                        <?php if ($fb = get_theme_mod('safe_cologne_facebook')) : ?>
                            <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($ig = get_theme_mod('safe_cologne_instagram')) : ?>
                            <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="sc-footer-column">
                    <h3 class="sc-footer-title">Schnellzugriff</h3>
                    <ul class="sc-footer-menu">
                        <li><a href="<?php echo home_url('/'); ?>">Startseite</a></li>
                        <li><a href="<?php echo home_url('/ueber-uns'); ?>">Über uns</a></li>
                        <li><a href="<?php echo home_url('/karriere'); ?>">Karriere</a></li>
                        <li><a href="<?php echo home_url('/kontakt'); ?>">Kontakt</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div class="sc-footer-column">
                    <h3 class="sc-footer-title">Leistungen</h3>
                    <ul class="sc-footer-menu">
                        <li><a href="<?php echo home_url('/dienstleistungen#objektschutz'); ?>">Objektschutz</a></li>
                        <li><a href="<?php echo home_url('/dienstleistungen#veranstaltungen'); ?>">Veranstaltungssicherheit</a></li>
                        <li><a href="<?php echo home_url('/dienstleistungen#personenschutz'); ?>">Personenschutz</a></li>
                        <li><a href="<?php echo home_url('/dienstleistungen'); ?>">Alle Leistungen →</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="sc-footer-column sc-footer-contact">
                    <h3 class="sc-footer-title">Kontakt</h3>
                    <div class="sc-contact-info">
                        <div class="sc-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24">
                                <path fill="#E30613" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                        <div class="sc-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24">
                                <path fill="#E30613" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </div>
                        <div class="sc-contact-item">
                            <svg width="16" height="16" viewBox="0 0 24 24">
                                <path fill="#E30613" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <address><?php echo esc_html($address); ?></address>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(home_url('/kontakt')); ?>" class="sc-footer-cta">
                        Kontakt aufnehmen →
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="sc-footer-bottom">
        <div class="sc-container">
            <div class="sc-footer-bottom-content">
                <div class="sc-copyright">
                    &copy; <?php echo date('Y'); ?> SafeCologne. Alle Rechte vorbehalten.
                </div>
                <nav class="sc-footer-legal">
                    <a href="<?php echo home_url('/impressum'); ?>">Impressum</a>
                    <a href="<?php echo home_url('/datenschutz'); ?>">Datenschutz</a>
                    <a href="<?php echo home_url('/agb'); ?>">AGB</a>
                </nav>
            </div>
        </div>
    </div>
    
</footer>

<!-- 24/7 Emergency Button -->
<a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="sc-emergency-button" aria-label="24/7 Notdienst">
    <svg width="24" height="24" viewBox="0 0 24 24">
        <path fill="#fff" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
    </svg>
    <span>24/7 Notdienst</span>
</a>

<style>
/* SafeCologne Footer Styles - Clean & Professional */

.safecologne-footer {
    background: #1a1a1a;
    color: #e0e0e0;
    margin-top: 80px;
    clear: both;
    position: relative;
    width: 100%;
}

.sc-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Footer Main */
.sc-footer-main {
    padding: 60px 0 40px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.sc-footer-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1.5fr;
    gap: 40px;
}

.sc-footer-column {
    margin: 0;
}

.sc-footer-title {
    font-size: 1.125rem;
    font-weight: 600;
    margin: 0 0 1.5rem;
    color: #fff;
}

/* Company Column */
.sc-footer-logo {
    margin-bottom: 1rem;
}

.sc-footer-logo a {
    display: inline-block;
}

.sc-footer-logo img {
    height: 40px;
    width: auto;
}

.sc-footer-tagline {
    margin: 0 0 1.5rem;
    opacity: 0.8;
    font-size: 0.95rem;
    line-height: 1.6;
}

.sc-footer-social {
    display: flex;
    gap: 1rem;
}

.sc-footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.sc-footer-social a:hover {
    background: #E30613;
    transform: translateY(-2px);
}

.sc-footer-social svg {
    fill: #fff;
}

/* Footer Menu */
.sc-footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sc-footer-menu li {
    margin-bottom: 0.75rem;
}

.sc-footer-menu a {
    color: #e0e0e0;
    text-decoration: none;
    transition: color 0.3s ease;
    display: inline-block;
}

.sc-footer-menu a:hover {
    color: #E30613;
}

/* Contact Info */
.sc-contact-info {
    margin-bottom: 1.5rem;
}

.sc-contact-item {
    display: flex;
    align-items: start;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.sc-contact-item svg {
    flex-shrink: 0;
    margin-top: 2px;
}

.sc-contact-item a {
    color: #e0e0e0;
    text-decoration: none;
    transition: color 0.3s ease;
}

.sc-contact-item a:hover {
    color: #E30613;
}

.sc-contact-item address {
    font-style: normal;
    line-height: 1.6;
}

.sc-footer-cta {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: #E30613;
    color: #fff !important;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.sc-footer-cta:hover {
    background: #C2050F;
    transform: translateY(-2px);
}

/* Footer Bottom */
.sc-footer-bottom {
    background: #111;
    padding: 20px 0;
}

.sc-footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sc-copyright {
    font-size: 0.875rem;
    opacity: 0.8;
}

.sc-footer-legal {
    display: flex;
    gap: 2rem;
}

.sc-footer-legal a {
    color: #e0e0e0;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.sc-footer-legal a:hover {
    color: #E30613;
}

/* Emergency Button */
.sc-emergency-button {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
        background: #E30613;
    color: #fff !important;
    text-decoration: none;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(227, 6, 19, 0.3);
    transition: all 0.3s ease;
    z-index: 100;
    font-weight: 600;
}

.sc-emergency-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(227, 6, 19, 0.4);
    background: #C2050F;
}

.sc-emergency-button svg {
    fill: #fff;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .sc-footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 3rem;
    }
    
    .sc-footer-company {
        grid-column: 1 / -1;
        text-align: center;
    }
    
    .sc-footer-social {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .sc-footer-main {
        padding: 40px 0 30px;
    }
    
    .sc-footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .sc-footer-bottom-content {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .sc-footer-legal {
        gap: 1rem;
    }
    
    .sc-emergency-button {
        bottom: 1rem;
        right: 1rem;
        padding: 0.875rem 1.25rem;
    }
    
    .sc-emergency-button span {
        display: none;
    }
}

/* Fix for theme conflicts */
.safecologne-footer * {
    box-sizing: border-box;
}

.safecologne-footer a {
    text-decoration: none;
}

.safecologne-footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
</style>

<?php wp_footer(); ?>

</body>
</html>