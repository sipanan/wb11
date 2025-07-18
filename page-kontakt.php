<?php
/**
 * Template Name: Kontakt
 * 
 * The contact page template for Safe Cologne
 * Comprehensive contact information and form
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main kontakt-page" role="main">
    
    <!-- Hero Section -->
    <section class="contact-hero bg-secondary" aria-labelledby="contact-hero-title">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php 
            $hero_image = get_theme_mod('contact_hero_image', get_template_directory_uri() . '/assets/images/contact-hero.jpg');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Safe Cologne Kontakt" class="hero-bg-image" loading="eager">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content text-center text-white">
                <h1 id="contact-hero-title" class="hero-title">
                    <?php echo get_theme_mod('contact_hero_title', 'Kontaktieren Sie uns'); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo get_theme_mod('contact_hero_subtitle', 'Ihr direkter Weg zu professioneller Sicherheit'); ?>
                </p>
                <p class="hero-description">
                    <?php echo get_theme_mod('contact_hero_description', 'Wir sind 24/7 für Sie erreichbar und beraten Sie gerne persönlich zu allen Fragen rund um Ihre Sicherheit.'); ?>
                </p>
                
                <div class="hero-contact-info">
                    <div class="contact-highlight">
                        <div class="contact-method">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <div>
                                <strong><?php echo get_theme_mod('contact_phone', '0221 65058801'); ?></strong>
                                <span><?php esc_html_e('24/7 Hotline', 'safe-cologne'); ?></span>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <div>
                                <strong><?php echo get_theme_mod('contact_email', 'info@safecologne.de'); ?></strong>
                                <span><?php esc_html_e('Antwort in 2h', 'safe-cologne'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Methods Section -->
    <section class="contact-methods section bg-white" aria-labelledby="methods-title">
        <div class="container">
            <h2 id="methods-title" class="section-title">
                <?php echo get_theme_mod('methods_title', 'Wie möchten Sie uns erreichen?'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('methods_subtitle', 'Wählen Sie den für Sie passenden Kontaktweg'); ?>
            </p>
            
            <div class="methods-grid">
                <div class="method-card urgent">
                    <div class="method-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <h3 class="method-title"><?php esc_html_e('Notfall & Eilanfragen', 'safe-cologne'); ?></h3>
                    <p class="method-description">
                        <?php esc_html_e('Bei dringenden Sicherheitsfragen oder Notfällen erreichen Sie uns rund um die Uhr telefonisch.', 'safe-cologne'); ?>
                    </p>
                    <div class="method-details">
                        <div class="detail-item">
                            <strong><?php echo get_theme_mod('contact_phone', '0221 65058801'); ?></strong>
                            <span><?php esc_html_e('24/7 verfügbar', 'safe-cologne'); ?></span>
                        </div>
                    </div>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '0221 65058801'))); ?>" 
                       class="btn btn-primary btn-lg method-btn">
                        <?php esc_html_e('Jetzt anrufen', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </a>
                </div>
                
                <div class="method-card standard">
                    <div class="method-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <h3 class="method-title"><?php esc_html_e('Beratung & Angebote', 'safe-cologne'); ?></h3>
                    <p class="method-description">
                        <?php esc_html_e('Für ausführliche Beratungen, Angebotserstellungen und allgemeine Anfragen nutzen Sie unser Kontaktformular.', 'safe-cologne'); ?>
                    </p>
                    <div class="method-details">
                        <div class="detail-item">
                            <strong><?php esc_html_e('Antwort innerhalb von 2 Stunden', 'safe-cologne'); ?></strong>
                            <span><?php esc_html_e('Mo-Fr 8-18 Uhr, Sa 9-14 Uhr', 'safe-cologne'); ?></span>
                        </div>
                    </div>
                    <a href="#contact-form" class="btn btn-primary btn-lg method-btn">
                        <?php esc_html_e('Formular ausfüllen', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </a>
                </div>
                
                <div class="method-card instant">
                    <div class="method-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.525 3.687"/>
                        </svg>
                    </div>
                    <h3 class="method-title"><?php esc_html_e('WhatsApp Chat', 'safe-cologne'); ?></h3>
                    <p class="method-description">
                        <?php esc_html_e('Schnelle Fragen, Terminvereinbarungen oder erste Informationen erhalten Sie unkompliziert per WhatsApp.', 'safe-cologne'); ?>
                    </p>
                    <div class="method-details">
                        <div class="detail-item">
                            <strong><?php esc_html_e('Sofortige Antwort', 'safe-cologne'); ?></strong>
                            <span><?php esc_html_e('Täglich 8-20 Uhr', 'safe-cologne'); ?></span>
                        </div>
                    </div>
                    <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '491701234567')); ?>?text=Hallo%20Safe%20Cologne%2C%20ich%20hätte%20eine%20Frage%20zu%20Ihren%20Sicherheitsdienstleistungen." 
                       class="btn btn-primary btn-lg method-btn" target="_blank">
                        <?php esc_html_e('WhatsApp öffnen', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.525 3.687"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form" class="contact-form-section section bg-gray-50" aria-labelledby="form-title">
        <div class="container">
            <h2 id="form-title" class="section-title">
                <?php echo get_theme_mod('form_title', 'Schreiben Sie uns'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('form_subtitle', 'Teilen Sie uns Ihre Anfrage mit – wir melden uns schnellstmöglich bei Ihnen'); ?>
            </p>
            
            <div class="form-container">
                <form class="contact-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
                    <input type="hidden" name="action" value="contact_form_submission">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="contact-name"><?php esc_html_e('Ihr Name *', 'safe-cologne'); ?></label>
                            <input type="text" id="contact-name" name="name" required 
                                   placeholder="<?php esc_attr_e('Max Mustermann', 'safe-cologne'); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-company"><?php esc_html_e('Unternehmen', 'safe-cologne'); ?></label>
                            <input type="text" id="contact-company" name="company" 
                                   placeholder="<?php esc_attr_e('Musterunternehmen GmbH', 'safe-cologne'); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email"><?php esc_html_e('E-Mail-Adresse *', 'safe-cologne'); ?></label>
                            <input type="email" id="contact-email" name="email" required 
                                   placeholder="<?php esc_attr_e('max@beispiel.de', 'safe-cologne'); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-phone"><?php esc_html_e('Telefonnummer', 'safe-cologne'); ?></label>
                            <input type="tel" id="contact-phone" name="phone" 
                                   placeholder="<?php esc_attr_e('0221 1234567', 'safe-cologne'); ?>">
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="contact-service"><?php esc_html_e('Gewünschter Service', 'safe-cologne'); ?></label>
                            <select id="contact-service" name="service">
                                <option value=""><?php esc_html_e('Bitte wählen...', 'safe-cologne'); ?></option>
                                <option value="veranstaltungsschutz"><?php esc_html_e('Veranstaltungsschutz', 'safe-cologne'); ?></option>
                                <option value="objektschutz"><?php esc_html_e('Objekt- & Werkschutz', 'safe-cologne'); ?></option>
                                <option value="personenschutz"><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></option>
                                <option value="ladendetektiv"><?php esc_html_e('Ladendetektiv', 'safe-cologne'); ?></option>
                                <option value="tuersteher"><?php esc_html_e('Türsteher / Doorman', 'safe-cologne'); ?></option>
                                <option value="vip-shuttle"><?php esc_html_e('VIP Shuttle Service', 'safe-cologne'); ?></option>
                                <option value="ermittlungen"><?php esc_html_e('Privatermittlungen', 'safe-cologne'); ?></option>
                                <option value="beratung"><?php esc_html_e('Sicherheitsberatung', 'safe-cologne'); ?></option>
                                <option value="andere"><?php esc_html_e('Andere / Individuelle Anfrage', 'safe-cologne'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="contact-urgency"><?php esc_html_e('Wann benötigen Sie den Service?', 'safe-cologne'); ?></label>
                            <select id="contact-urgency" name="urgency">
                                <option value="sofort"><?php esc_html_e('Sofort / Notfall', 'safe-cologne'); ?></option>
                                <option value="diese-woche"><?php esc_html_e('Diese Woche', 'safe-cologne'); ?></option>
                                <option value="naechste-woche"><?php esc_html_e('Nächste Woche', 'safe-cologne'); ?></option>
                                <option value="diesen-monat"><?php esc_html_e('Diesen Monat', 'safe-cologne'); ?></option>
                                <option value="planung" selected><?php esc_html_e('Langfristige Planung', 'safe-cologne'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="contact-message"><?php esc_html_e('Ihre Nachricht *', 'safe-cologne'); ?></label>
                            <textarea id="contact-message" name="message" rows="6" required 
                                      placeholder="<?php esc_attr_e('Beschreiben Sie uns Ihre Anfrage. Je detaillierter Sie sind, desto besser können wir Ihnen helfen...', 'safe-cologne'); ?>"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-footer">
                        <div class="privacy-consent">
                            <label class="checkbox-label">
                                <input type="checkbox" name="privacy_consent" required>
                                <span class="checkmark"></span>
                                <span class="consent-text">
                                    <?php esc_html_e('Ich stimme der Verarbeitung meiner Daten gemäß der', 'safe-cologne'); ?>
                                    <a href="/datenschutz" target="_blank"><?php esc_html_e('Datenschutzerklärung', 'safe-cologne'); ?></a>
                                    <?php esc_html_e('zu. *', 'safe-cologne'); ?>
                                </span>
                            </label>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span><?php esc_html_e('Nachricht senden', 'safe-cologne'); ?></span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                
                <div class="form-sidebar">
                    <div class="response-time">
                        <h3><?php esc_html_e('Unsere Antwortzeiten', 'safe-cologne'); ?></h3>
                        <ul>
                            <li>
                                <strong><?php esc_html_e('Notfälle:', 'safe-cologne'); ?></strong>
                                <?php esc_html_e('Sofortiger Rückruf', 'safe-cologne'); ?>
                            </li>
                            <li>
                                <strong><?php esc_html_e('Eilanfragen:', 'safe-cologne'); ?></strong>
                                <?php esc_html_e('Innerhalb 30 Minuten', 'safe-cologne'); ?>
                            </li>
                            <li>
                                <strong><?php esc_html_e('Standardanfragen:', 'safe-cologne'); ?></strong>
                                <?php esc_html_e('Innerhalb 2 Stunden', 'safe-cologne'); ?>
                            </li>
                            <li>
                                <strong><?php esc_html_e('Planungsanfragen:', 'safe-cologne'); ?></strong>
                                <?php esc_html_e('Innerhalb 24 Stunden', 'safe-cologne'); ?>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="contact-guarantee">
                        <h3><?php esc_html_e('Unser Versprechen', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Wir behandeln jede Anfrage vertraulich und professionell. Ihre Daten werden ausschließlich zur Bearbeitung Ihrer Anfrage verwendet.', 'safe-cologne'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info section bg-white" aria-labelledby="info-title">
        <div class="container">
            <h2 id="info-title" class="section-title">
                <?php echo get_theme_mod('info_title', 'Weitere Kontaktmöglichkeiten'); ?>
            </h2>
            
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="info-title"><?php esc_html_e('Unser Büro', 'safe-cologne'); ?></h3>
                    <div class="info-content">
                        <address>
                            <?php echo nl2br(esc_html(get_theme_mod('company_address', 'Musterstraße 123\n50667 Köln'))); ?>
                        </address>
                        <div class="info-details">
                            <p><strong><?php esc_html_e('Öffnungszeiten:', 'safe-cologne'); ?></strong></p>
                            <p>Mo-Fr: 8:00 - 18:00 Uhr<br>Sa: 9:00 - 14:00 Uhr<br>So: Nur Notfälle</p>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=<?php echo urlencode(get_theme_mod('company_address', 'Musterstraße 123, 50667 Köln')); ?>" 
                       class="btn btn-secondary" target="_blank">
                        <?php esc_html_e('Route planen', 'safe-cologne'); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </a>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <h3 class="info-title"><?php esc_html_e('E-Mail Kontakt', 'safe-cologne'); ?></h3>
                    <div class="info-content">
                        <div class="email-list">
                            <div class="email-item">
                                <strong><?php esc_html_e('Allgemeine Anfragen:', 'safe-cologne'); ?></strong>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@safecologne.de')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'info@safecologne.de')); ?>
                                </a>
                            </div>
                            <div class="email-item">
                                <strong><?php esc_html_e('Bewerbungen:', 'safe-cologne'); ?></strong>
                                <a href="mailto:bewerbung@safecologne.de">bewerbung@safecologne.de</a>
                            </div>
                            <div class="email-item">
                                <strong><?php esc_html_e('Buchhaltung:', 'safe-cologne'); ?></strong>
                                <a href="mailto:buchhaltung@safecologne.de">buchhaltung@safecologne.de</a>
                            </div>
                        </div>
                    </div>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@safecologne.de')); ?>" 
                       class="btn btn-secondary">
                        <?php esc_html_e('E-Mail schreiben', 'safe-cologne'); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <h3 class="info-title"><?php esc_html_e('Telefonische Beratung', 'safe-cologne'); ?></h3>
                    <div class="info-content">
                        <div class="phone-list">
                            <div class="phone-item">
                                <strong><?php esc_html_e('Hauptnummer:', 'safe-cologne'); ?></strong>
                                <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '0221 65058801'))); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '0221 65058801')); ?>
                                </a>
                            </div>
                            <div class="phone-item">
                                <strong><?php esc_html_e('Notfall-Hotline:', 'safe-cologne'); ?></strong>
                                <a href="tel:+4922165058801">0221 65058801</a>
                            </div>
                        </div>
                        <div class="info-details">
                            <p><strong><?php esc_html_e('Verfügbarkeit:', 'safe-cologne'); ?></strong></p>
                            <p><?php esc_html_e('24/7 für Notfälle', 'safe-cologne'); ?><br>
                               <?php esc_html_e('Mo-Sa 8-20 Uhr für Beratung', 'safe-cologne'); ?></p>
                        </div>
                    </div>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '0221 65058801'))); ?>" 
                       class="btn btn-secondary">
                        <?php esc_html_e('Jetzt anrufen', 'safe-cologne'); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section section bg-gray-50" aria-labelledby="faq-title">
        <div class="container">
            <h2 id="faq-title" class="section-title">
                <?php echo get_theme_mod('faq_title', 'Häufig gestellte Fragen'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('faq_subtitle', 'Schnelle Antworten auf die wichtigsten Fragen'); ?>
            </p>
            
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php esc_html_e('Wie schnell können Sie bei einem Notfall vor Ort sein?', 'safe-cologne'); ?></span>
                        <svg class="faq-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p><?php esc_html_e('Bei echten Notfällen sind wir in der Regel innerhalb von 15-30 Minuten vor Ort, abhängig von der aktuellen Verkehrslage und dem Standort. Unsere Einsatzzentrale koordiniert rund um die Uhr verfügbare Teams in ganz Köln.', 'safe-cologne'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php esc_html_e('Welche Qualifikationen haben Ihre Mitarbeiter?', 'safe-cologne'); ?></span>
                        <svg class="faq-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p><?php esc_html_e('Alle unsere Mitarbeiter sind nach §34a GewO zertifiziert und durchlaufen regelmäßige Schulungen. Zusätzlich verfügen viele über Spezialisierungen in Bereichen wie Erste Hilfe, Deeskalation oder technische Sicherheitssysteme.', 'safe-cologne'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php esc_html_e('Wie erstellen Sie ein individuelles Angebot?', 'safe-cologne'); ?></span>
                        <svg class="faq-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p><?php esc_html_e('Nach Ihrer Anfrage führen wir zunächst eine kostenlose Bedarfsanalyse durch. Dabei besichtigen wir das Objekt oder besprechen die Veranstaltung im Detail, um ein maßgeschneidertes Sicherheitskonzept zu entwickeln. Das Angebot erhalten Sie innerhalb von 24 Stunden.', 'safe-cologne'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php esc_html_e('Sind Sie auch kurzfristig verfügbar?', 'safe-cologne'); ?></span>
                        <svg class="faq-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p><?php esc_html_e('Ja, durch unser großes Team können wir auch kurzfristige Anfragen bedienen. Bei Notfällen sofort, bei geplanten Einsätzen meist innerhalb von 24-48 Stunden. Je früher Sie uns kontaktieren, desto besser können wir planen.', 'safe-cologne'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php esc_html_e('Welche Versicherungen haben Sie?', 'safe-cologne'); ?></span>
                        <svg class="faq-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p><?php esc_html_e('Wir verfügen über eine umfassende Betriebs- und Berufshaftpflichtversicherung mit hohen Deckungssummen. Zusätzlich sind alle Mitarbeiter unfallversichert. Gerne senden wir Ihnen die entsprechenden Nachweise zu.', 'safe-cologne'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>