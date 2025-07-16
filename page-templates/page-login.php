<?php
/**
 * Template Name: Login Portal
 *
 * @package SpecSec
 */

get_header(); ?>

<div class="login-portal-page">
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Login Portal', 'specsec'); ?></h1>
            <p class="page-subtitle"><?php esc_html_e('Zugang für Mitarbeiter und Partner', 'specsec'); ?></p>
        </div>
    </section>

    <!-- Login Options -->
    <section class="login-options">
        <div class="container">
            <div class="login-grid">
                <div class="login-card">
                    <div class="login-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3><?php esc_html_e('Mitarbeiter Login', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Zugang für SpecSec Mitarbeiter zu internen Bereichen, Schichtplänen und Dokumenten.', 'specsec'); ?></p>
                    <a href="#employee-login" class="btn btn-primary"><?php esc_html_e('Mitarbeiter Login', 'specsec'); ?></a>
                </div>
                
                <div class="login-card">
                    <div class="login-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3><?php esc_html_e('Partner Login', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Zugang für Kunden und Partner zu Projektdokumenten, Berichten und Kommunikation.', 'specsec'); ?></p>
                    <a href="#partner-login" class="btn btn-secondary"><?php esc_html_e('Partner Login', 'specsec'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Employee Login Form -->
    <section class="login-form-section" id="employee-login">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Mitarbeiter Login', 'specsec'); ?></h2>
            
            <div class="login-form-container">
                <form class="login-form" method="post">
                    <?php wp_nonce_field('specsec_employee_login', 'employee_login_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="employee_id"><?php esc_html_e('Mitarbeiter ID', 'specsec'); ?></label>
                        <input type="text" id="employee_id" name="employee_id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="employee_password"><?php esc_html_e('Passwort', 'specsec'); ?></label>
                        <input type="password" id="employee_password" name="employee_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember_me">
                            <?php esc_html_e('Angemeldet bleiben', 'specsec'); ?>
                        </label>
                    </div>
                    
                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary" name="employee_login">
                            <?php esc_html_e('Anmelden', 'specsec'); ?>
                        </button>
                    </div>
                    
                    <div class="login-links">
                        <a href="#forgot-password"><?php esc_html_e('Passwort vergessen?', 'specsec'); ?></a>
                    </div>
                </form>
                
                <div class="login-info">
                    <h3><?php esc_html_e('Mitarbeiter Bereich', 'specsec'); ?></h3>
                    <ul>
                        <li><?php esc_html_e('Aktuelle Schichtpläne', 'specsec'); ?></li>
                        <li><?php esc_html_e('Einsatzdetails und Briefings', 'specsec'); ?></li>
                        <li><?php esc_html_e('Interne Dokumente', 'specsec'); ?></li>
                        <li><?php esc_html_e('Schulungsunterlagen', 'specsec'); ?></li>
                        <li><?php esc_html_e('Urlaubsantrag und Zeiterfassung', 'specsec'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Login Form -->
    <section class="login-form-section" id="partner-login">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Partner Login', 'specsec'); ?></h2>
            
            <div class="login-form-container">
                <form class="login-form" method="post">
                    <?php wp_nonce_field('specsec_partner_login', 'partner_login_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="partner_email"><?php esc_html_e('E-Mail Adresse', 'specsec'); ?></label>
                        <input type="email" id="partner_email" name="partner_email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="partner_password"><?php esc_html_e('Passwort', 'specsec'); ?></label>
                        <input type="password" id="partner_password" name="partner_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember_me">
                            <?php esc_html_e('Angemeldet bleiben', 'specsec'); ?>
                        </label>
                    </div>
                    
                    <div class="form-submit">
                        <button type="submit" class="btn btn-secondary" name="partner_login">
                            <?php esc_html_e('Anmelden', 'specsec'); ?>
                        </button>
                    </div>
                    
                    <div class="login-links">
                        <a href="#forgot-password"><?php esc_html_e('Passwort vergessen?', 'specsec'); ?></a>
                        <a href="#request-access"><?php esc_html_e('Zugang beantragen', 'specsec'); ?></a>
                    </div>
                </form>
                
                <div class="login-info">
                    <h3><?php esc_html_e('Partner Bereich', 'specsec'); ?></h3>
                    <ul>
                        <li><?php esc_html_e('Projektdokumente und Berichte', 'specsec'); ?></li>
                        <li><?php esc_html_e('Einsatzplanung und Koordination', 'specsec'); ?></li>
                        <li><?php esc_html_e('Kommunikation und Updates', 'specsec'); ?></li>
                        <li><?php esc_html_e('Rechnungen und Abrechnungen', 'specsec'); ?></li>
                        <li><?php esc_html_e('Feedback und Bewertungen', 'specsec'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Section -->
    <section class="support-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Benötigen Sie Hilfe?', 'specsec'); ?></h2>
            
            <div class="support-grid">
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3><?php esc_html_e('Technischer Support', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Bei technischen Problemen mit dem Login-System.', 'specsec'); ?></p>
                    <p><strong><?php esc_html_e('Tel:', 'specsec'); ?></strong> <a href="tel:<?php echo esc_attr(specsec_get_phone()); ?>"><?php echo esc_html(specsec_get_phone()); ?></a></p>
                </div>
                
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3><?php esc_html_e('E-Mail Support', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Für Fragen zu Zugangsdaten und Berechtigungen.', 'specsec'); ?></p>
                    <p><strong><?php esc_html_e('E-Mail:', 'specsec'); ?></strong> <a href="mailto:support@specsec.de">support@specsec.de</a></p>
                </div>
                
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3><?php esc_html_e('Support Zeiten', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Montag bis Freitag: 08:00 - 18:00 Uhr', 'specsec'); ?></p>
                    <p><?php esc_html_e('Samstag: 09:00 - 14:00 Uhr', 'specsec'); ?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
// Handle login form submissions
if (isset($_POST['employee_login']) && wp_verify_nonce($_POST['employee_login_nonce'], 'specsec_employee_login')) {
    // Handle employee login
    $employee_id = sanitize_text_field($_POST['employee_id']);
    $password = $_POST['employee_password'];
    
    // In a real implementation, you would validate credentials against a database
    // For demo purposes, we'll show a message
    echo '<div class="login-message">Login-Funktionalität wird implementiert. Bitte wenden Sie sich an den Administrator.</div>';
}

if (isset($_POST['partner_login']) && wp_verify_nonce($_POST['partner_login_nonce'], 'specsec_partner_login')) {
    // Handle partner login
    $partner_email = sanitize_email($_POST['partner_email']);
    $password = $_POST['partner_password'];
    
    // In a real implementation, you would validate credentials against a database
    // For demo purposes, we'll show a message
    echo '<div class="login-message">Login-Funktionalität wird implementiert. Bitte wenden Sie sich an den Administrator.</div>';
}

get_footer(); ?>