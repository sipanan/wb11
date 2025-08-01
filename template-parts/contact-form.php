<?php
/**
 * Contact Form Template Part
 *
 * @package Safe_Cologne
 */

$phone = get_option('safe_cologne_settings')['phone'] ?? '0221 65058801';
$email = get_option('safe_cologne_settings')['email'] ?? 'info@safecologne.de';
?>

<section id="kontakt" class="section contact" aria-labelledby="contact-title">
    <div class="container">
        <h2 id="contact-title" class="section-title"><?php esc_html_e('Beratung gewünscht?', 'safe-cologne'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Wir sind für Sie da - 24/7', 'safe-cologne'); ?></p>
        
        <div class="contact-wrapper">
            <div class="contact-info">
                <div class="contact-card primary-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3><?php esc_html_e('24/7 Notdienst', 'safe-cologne'); ?></h3>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="contact-link"><?php echo esc_html($phone); ?></a>
                    <p><?php esc_html_e('Rund um die Uhr erreichbar', 'safe-cologne'); ?></p>
                </div>
                
                <div class="contact-card">
                    <i class="fas fa-envelope"></i>
                    <h3><?php esc_html_e('E-Mail', 'safe-cologne'); ?></h3>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-link"><?php echo esc_html($email); ?></a>
                    <p><?php esc_html_e('Antwort innerhalb 24h', 'safe-cologne'); ?></p>
                </div>
                
                <div class="contact-card">
                    <i class="fab fa-whatsapp"></i>
                    <h3><?php esc_html_e('WhatsApp', 'safe-cologne'); ?></h3>
                    <a href="https://wa.me/491701234567" class="contact-link">+49 170 1234567</a>
                    <p><?php esc_html_e('Schnelle Kommunikation', 'safe-cologne'); ?></p>
                </div>
                
                <div class="contact-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3><?php esc_html_e('Adresse', 'safe-cologne'); ?></h3>
                    <address>
                        Subbelrather Str. 15A<br>
                        50823 Köln
                    </address>
                </div>
            </div>
            
            <!-- Contact Form -->
            <form class="contact-form" method="POST">
                <h3><?php esc_html_e('Schnellanfrage', 'safe-cologne'); ?></h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name"><?php esc_html_e('Name *', 'safe-cologne'); ?></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="company"><?php esc_html_e('Unternehmen', 'safe-cologne'); ?></label>
                        <input type="text" id="company" name="company">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email"><?php esc_html_e('E-Mail *', 'safe-cologne'); ?></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php esc_html_e('Telefon *', 'safe-cologne'); ?></label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="service"><?php esc_html_e('Gewünschte Leistung', 'safe-cologne'); ?></label>
                    <select id="service" name="service">
                        <option value=""><?php esc_html_e('Bitte wählen', 'safe-cologne'); ?></option>
                        <option value="veranstaltungsordner"><?php esc_html_e('Veranstaltungsordner', 'safe-cologne'); ?></option>
                        <option value="objektschutz"><?php esc_html_e('Objektschutz', 'safe-cologne'); ?></option>
                        <option value="personenschutz"><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></option>
                        <option value="andere"><?php esc_html_e('Andere', 'safe-cologne'); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message"><?php esc_html_e('Ihre Nachricht *', 'safe-cologne'); ?></label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="privacy" required>
                        <span><?php printf(
                            esc_html__('Ich habe die %s gelesen und stimme zu. *', 'safe-cologne'),
                            '<a href="' . esc_url(get_privacy_policy_url()) . '" target="_blank">' . esc_html__('Datenschutzerklärung', 'safe-cologne') . '</a>'
                        ); ?></span>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fas fa-paper-plane"></i>
                    <?php esc_html_e('Anfrage senden', 'safe-cologne'); ?>
                </button>
            </form>
        </div>
    </div>
</section>
