<?php
/**
 * Clean Footer Template for SafeCologne
 * Professional and minimal design
 * 
 * @package Safe_Cologne
 * @version 4.0.0
 */

// Get theme options
$phone = get_theme_mod('safe_cologne_phone', '0221 6505 8801');
$email = get_theme_mod('safe_cologne_email', 'info@safecologne.de');
$address = get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln');
?>

    </main>

<footer class="site-footer bg-gray section">
    <div class="container">
        <div class="grid grid-4 gap-8">
            
            <!-- Company Info -->
            <div>
                <h3>SafeCologne</h3>
                <p class="text-muted">Ihr Sicherheitsdienst mit Herz & System</p>
                <div class="d-flex gap-3" style="margin-top: 1rem;">
                    <?php if ($fb = get_theme_mod('safe_cologne_facebook')) : ?>
                        <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="text-muted">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($ig = get_theme_mod('safe_cologne_instagram')) : ?>
                        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="text-muted">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4>Navigation</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/'); ?>" class="text-muted">Startseite</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/ueber-uns'); ?>" class="text-muted">Über uns</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/dienstleistungen'); ?>" class="text-muted">Dienstleistungen</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/karriere'); ?>" class="text-muted">Karriere</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/kontakt'); ?>" class="text-muted">Kontakt</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4>Leistungen</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/dienstleistungen'); ?>" class="text-muted">Objektschutz</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/dienstleistungen'); ?>" class="text-muted">Veranstaltungssicherheit</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/dienstleistungen'); ?>" class="text-muted">Personenschutz</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="<?php echo home_url('/dienstleistungen'); ?>" class="text-muted">VIP Shuttleservice</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4>Kontakt</h4>
                <div style="margin-bottom: 1rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="text-muted">
                            <?php echo esc_html($phone); ?>
                        </a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-muted">
                            <?php echo esc_html($email); ?>
                        </a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: var(--primary-color);">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <span class="text-muted"><?php echo esc_html($address); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-color); text-align: center;">
            <p class="text-muted text-sm">
                &copy; <?php echo date('Y'); ?> Safe Cologne. Alle Rechte vorbehalten.
                <span style="margin: 0 1rem;">|</span>
                <a href="<?php echo home_url('/datenschutz'); ?>" class="text-muted">Datenschutz</a>
                <span style="margin: 0 1rem;">|</span>
                <a href="<?php echo home_url('/impressum'); ?>" class="text-muted">Impressum</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>