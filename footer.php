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

<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h4>SafeCologne</h4>
                <p>Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln.</p>
            </div>
            
            <div class="footer-section">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="<?php echo home_url('/'); ?>">Startseite</a></li>
                    <li><a href="<?php echo home_url('/ueber-uns'); ?>">Über uns</a></li>
                    <li><a href="<?php echo home_url('/dienstleistungen'); ?>">Dienstleistungen</a></li>
                    <li><a href="<?php echo home_url('/kontakt'); ?>">Kontakt</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Kontakt</h4>
                <p>
                    <i class="fas fa-phone"></i>
                    <a href="tel:022165058801">0221 6505 8801</a>
                </p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@safecologne.de">info@safecologne.de</a>
                </p>
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    Subbelrather Str. 15A, 50823 Köln
                </p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> SafeCologne. Alle Rechte vorbehalten.</p>
            <nav>
                <a href="<?php echo home_url('/impressum'); ?>">Impressum</a>
                <a href="<?php echo home_url('/datenschutz'); ?>">Datenschutz</a>
                <a href="<?php echo home_url('/agb'); ?>">AGB</a>
            </nav>
        </div>
    </div>
</footer>

<!-- Emergency Button -->
<div class="emergency-button">
    <a href="tel:022165058801">
        <i class="fas fa-phone"></i>
        <span>Notruf</span>
    </a>
</div>

<?php wp_footer(); ?>

</body>
</html>