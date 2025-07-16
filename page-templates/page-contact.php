<?php
/**
 * Template Name: Kontakt
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Contact Hero -->
<section class="contact-hero" aria-labelledby="contact-hero-title">
    <div class="container">
        <h1 id="contact-hero-title">
            <?php echo esc_html(get_theme_mod('safe_cologne_contact_hero_title', 'Kontakt')); ?>
        </h1>
        <p>
            <?php echo esc_html(get_theme_mod('safe_cologne_contact_hero_subtitle', 'Nehmen Sie Kontakt mit uns auf - wir sind für Sie da')); ?>
        </p>
    </div>
</section>

<!-- Contact Main -->
<section class="contact-main" aria-labelledby="contact-main-title">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2 id="contact-main-title"><?php esc_html_e('Kontaktieren Sie uns', 'safe-cologne'); ?></h2>
                
                <?php
                $contact_methods = safe_cologne_get_contact_methods();
                foreach ($contact_methods as $method) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="<?php echo esc_attr($method['icon']); ?>"></i>
                        </div>
                        <div class="contact-details">
                            <h3><?php echo esc_html($method['title']); ?></h3>
                            <p><?php echo esc_html($method['description']); ?></p>
                            <a href="<?php echo esc_url($method['link']); ?>" target="_blank" rel="noopener">
                                <?php echo esc_html($method['value']); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Business Hours -->
                <div class="business-hours">
                    <h3><?php esc_html_e('Geschäftszeiten', 'safe-cologne'); ?></h3>
                    <ul class="hours-list">
                        <?php
                        $business_hours = safe_cologne_get_business_hours();
                        foreach ($business_hours as $index => $hour) : ?>
                            <li class="hours-item" data-day="<?php echo esc_attr($index); ?>">
                                <span class="hours-day"><?php echo esc_html($hour['day']); ?></span>
                                <span class="hours-time <?php echo (strpos($hour['time'], 'Geschlossen') !== false) ? 'hours-closed' : ''; ?>">
                                    <?php echo esc_html($hour['time']); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form">
                <h2><?php esc_html_e('Nachricht senden', 'safe-cologne'); ?></h2>
                
                <form id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                    <div class="form-status" style="display: none;"></div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name"><?php esc_html_e('Name', 'safe-cologne'); ?> *</label>
                            <input type="text" id="contact-name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email"><?php esc_html_e('E-Mail', 'safe-cologne'); ?> *</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-phone"><?php esc_html_e('Telefon', 'safe-cologne'); ?></label>
                            <input type="tel" id="contact-phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-company"><?php esc_html_e('Unternehmen', 'safe-cologne'); ?></label>
                            <input type="text" id="contact-company" name="company">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact-service"><?php esc_html_e('Gewünschter Service', 'safe-cologne'); ?></label>
                        <select id="contact-service" name="service">
                            <option value=""><?php esc_html_e('Bitte wählen...', 'safe-cologne'); ?></option>
                            <option value="Objektschutz"><?php esc_html_e('Objektschutz', 'safe-cologne'); ?></option>
                            <option value="Veranstaltungsschutz"><?php esc_html_e('Veranstaltungsschutz', 'safe-cologne'); ?></option>
                            <option value="Revierdienst"><?php esc_html_e('Revierdienst', 'safe-cologne'); ?></option>
                            <option value="Sicherheitsberatung"><?php esc_html_e('Sicherheitsberatung', 'safe-cologne'); ?></option>
                            <option value="Personenschutz"><?php esc_html_e('Personenschutz', 'safe-cologne'); ?></option>
                            <option value="Preisanfrage"><?php esc_html_e('Preisanfrage', 'safe-cologne'); ?></option>
                            <option value="Sonstiges"><?php esc_html_e('Sonstiges', 'safe-cologne'); ?></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact-message"><?php esc_html_e('Nachricht', 'safe-cologne'); ?> *</label>
                        <textarea id="contact-message" name="message" rows="5" maxlength="1000" required></textarea>
                    </div>
                    
                    <button type="submit" class="form-submit">
                        <?php esc_html_e('Nachricht senden', 'safe-cologne'); ?>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section" aria-labelledby="map-title">
    <div class="container">
        <h2 id="map-title" class="section-title"><?php esc_html_e('Unser Standort', 'safe-cologne'); ?></h2>
        <div class="map-container">
            <?php
            $google_maps_embed = get_theme_mod('safe_cologne_google_maps_embed', '');
            if ($google_maps_embed) : ?>
                <?php echo wp_kses_post($google_maps_embed); ?>
            <?php else : ?>
                <div class="map-placeholder">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3><?php esc_html_e('Standort anzeigen', 'safe-cologne'); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln')); ?></p>
                    <p><small><?php esc_html_e('Klicken Sie hier, um die Karte zu öffnen', 'safe-cologne'); ?></small></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section" aria-labelledby="faq-title">
    <div class="container">
        <h2 id="faq-title" class="section-title"><?php esc_html_e('Häufig gestellte Fragen', 'safe-cologne'); ?></h2>
        <div class="faq-list">
            <?php
            $faq_items = safe_cologne_get_contact_faq();
            foreach ($faq_items as $item) : ?>
                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <?php echo esc_html($item['question']); ?>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo esc_html($item['answer']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
                                <a href="mailto:info@safecologne.de" class="contact-link">
                                    info@safecologne.de
                                </a>
                                <p>Antwort innerhalb von 24 Stunden</p>
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div class="kontakt-method">
                            <div class="icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div class="method-content">
                                <h3>Firmensitz</h3>
                                <address>
                                    Subbelrather Str. 15A, 50823 Köln
                                </address>
                                <a href="https://goo.gl/maps/YOUR_MAP_LINK" target="_blank" class="map-link">
                                    Route planen <span class="arrow">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trust Elements -->
                    <div class="trust-elements">
                        <h3>Ihre Vorteile</h3>
                        <ul class="advantages-list">
                            <li><span class="check-icon">✓</span> Kostenlose Erstberatung</li>
                            <li><span class="check-icon">✓</span> Individuelle Sicherheitskonzepte</li>
                            <li><span class="check-icon">✓</span> Transparente Preisgestaltung</li>
                            <li><span class="check-icon">✓</span> Zertifizierte Sicherheitskräfte</li>
                            <li><span class="check-icon">✓</span> Flexible Vertragslaufzeiten</li>
                        </ul>
                        
                        <div class="certification-badges">
                            <span class="badge">DIN 77200 zertifiziert</span>
                            <span class="badge">IHK geprüft</span>
                            <span class="badge">500+ Kunden</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Contact Form -->
                <div class="kontakt-form">
                    <div class="form-card">
                        <h2>Anfrage stellen</h2>
                        <p>Füllen Sie das Formular aus und wir erstellen Ihnen ein maßgeschneidertes Angebot.</p>
                        
                        <div class="form-steps">
                            <div class="form-step active" data-step="1">
                                <span class="step-number">1</span>
                                <span class="step-text">Kontaktdaten</span>
                            </div>
                            <div class="form-step" data-step="2">
                                <span class="step-number">2</span>
                                <span class="step-text">Projektdetails</span>
                            </div>
                            <div class="form-step" data-step="3">
                                <span class="step-number">3</span>
                                <span class="step-text">Absenden</span>
                            </div>
                        </div>
                        
                        <!-- Contact Form 7 Integration -->
                        <div class="form-wrapper">
                            <?php echo do_shortcode('[contact-form-7 id="b4c3340" title="Kundenanfragen"]'); ?>
                        </div>
                        
                        <div class="form-security">
                            <div class="security-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span>Ihre Daten werden verschlüsselt übertragen</span>
                            </div>
                            <div class="response-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <span>Antwort innerhalb von 24 Stunden</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2>Unser Einsatzgebiet</h2>
            <p>Wir sind in ganz Köln und Umgebung für Sie im Einsatz</p>
        </div>
        
        <div class="map-container">
            <div class="location-card">
                <h3>Safe Cologne GmbH</h3>
                <p>Subbelrather Str. 15A, 50823 Köln</p>
                <ul class="facility-list">
                    <li><span class="emoji">🅿️</span> Kostenlose Parkplätze</li>
                    <li><span class="emoji">🚌</span> Gute Anbindung</li>
                    <li><span class="emoji">♿</span> Barrierefrei</li>
                </ul>
            </div>
            
            <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2514.2336235907776!2d6.920603877526283!3d50.95128805405915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bf25111e5f6897%3A0x3f8cddf5ebd94b2e!2sSubbelrather%20Str.%2015A%2C%2050823%20K%C3%B6ln!5e0!3m2!1sde!2sde!4v1720788940307!5m2!1sde!2sde" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

</main>

<!-- Inline CSS -->
<style>
/* SafeCologne Kontakt Page Styles */
:root {
    --primary-color: #E30613; /* SafeCologne Red */
    --secondary-color: #1A1A1A; /* Dark Gray */
    --accent-color: #0055A5; /* Professional Blue */
    --text-dark: #2D2D2D;
    --text-light: #6A6A6A;
    --background-light: #F9F9F9;
    --background-white: #FFFFFF;
    --border-color: #EEEEEE;
    --border-radius: 8px;
    --box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    --transition: all 0.3s ease;
}

/* General Styles */
.kontakt-page {
    color: var(--text-dark);
    font-family: 'Roboto', 'Open Sans', sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

h1, h2, h3, h4 {
    font-weight: 700;
    line-height: 1.2;
}

/* Hero Section */
.kontakt-hero {
    background: linear-gradient(to right, rgba(0,0,0,0.85), rgba(0,0,0,0.7)), url('/wp-content/uploads/2025/04/security-hero-bg.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    color: #fff;
    position: relative;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.kontakt-hero h1 {
    font-size: 3.5rem;
    margin-bottom: 20px;
    position: relative;
}

.kontakt-hero h1:after {
    content: "";
    display: block;
    width: 80px;
    height: 3px;
    background-color: var(--primary-color);
    margin: 20px auto 0;
}

.kontakt-hero .subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
}

/* Contact Grid Section */
.kontakt-grid-section {
    padding: 80px 0;
    background-color: var(--background-light);
}

.kontakt-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
}

/* Contact Info Styles */
.kontakt-info {
    animation: fadeIn 0.8s ease;
}

.kontakt-info h2 {
    font-size: 2.2rem;
    margin-bottom: 15px;
    color: var(--secondary-color);
}

.kontakt-info > p {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 40px;
}

.kontakt-methods {
    display: flex;
    flex-direction: column;
    gap: 30px;
    margin-bottom: 50px;
}

.kontakt-method {
    display: flex;
    background: var(--background-white);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 25px;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.kontakt-method:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.kontakt-method:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: var(--primary-color);
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background-color: rgba(227, 6, 19, 0.1);
    margin-right: 20px;
    color: var(--primary-color);
}

.icon-wrapper svg {
    width: 24px;
    height: 24px;
    stroke: var(--primary-color);
}

.method-content h3 {
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.primary-link, .contact-link {
    color: var(--secondary-color);
    font-size: 1.2rem;
    font-weight: 600;
    text-decoration: none;
    display: block;
    margin-bottom: 5px;
    transition: var(--transition);
}

.primary-link {
    color: var(--primary-color);
}

.primary-link:hover, .contact-link:hover {
    color: var(--primary-color);
}

.method-content p {
    color: var(--text-light);
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

.map-link {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    margin-top: 8px;
    transition: var(--transition);
}

.map-link:hover {
    color: var(--primary-color);
}

.map-link .arrow {
    margin-left: 5px;
    transition: transform 0.2s ease;
}

.map-link:hover .arrow {
    transform: translateX(3px);
}

address {
    font-style: normal;
    line-height: 1.5;
    margin-bottom: 5px;
}

/* Trust Elements */
.trust-elements {
    background: var(--background-white);
    border-radius: var(--border-radius);
    padding: 30px;
    box-shadow: var(--box-shadow);
}

.trust-elements h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.trust-elements h3:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background-color: var(--primary-color);
}

.advantages-list {
    list-style: none;
    padding: 0;
    margin: 0 0 30px;
}

.advantages-list li {
    display: flex;
    align-items: center;
    padding: 10px 0;
    font-size: 1.05rem;
}

.check-icon {
    color: var(--primary-color);
    margin-right: 10px;
    font-weight: bold;
}

.certification-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.badge {
    display: inline-block;
    padding: 8px 16px;
    background: rgba(0,0,0,0.05);
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Contact Form Styles */
.kontakt-form {
    animation: fadeIn 0.8s ease 0.2s both;
}

.form-card {
    background: var(--background-white);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    padding: 40px;
    position: relative;
    overflow: hidden;
}

.form-card:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-color);
}

.form-card h2 {
    font-size: 2.2rem;
    margin-bottom: 10px;
    color: var(--secondary-color);
}

.form-card > p {
    color: var(--text-light);
    margin-bottom: 30px;
}

/* Form Steps */
.form-steps {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.form-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
}

.form-step:not(:last-child):after {
    content: "";
    position: absolute;
    top: 15px;
    left: 60%;
    width: 80%;
    height: 2px;
    background-color: #eee;
    z-index: 1;
}

.step-number {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #eee;
    color: #999;
    font-weight: 600;
    margin-bottom: 8px;
    position: relative;
    z-index: 2;
    transition: var(--transition);
}

.form-step.active .step-number {
    background: var(--primary-color);
    color: white;
}

.step-text {
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--text-light);
    transition: var(--transition);
}

.form-step.active .step-text {
    color: var(--primary-color);
    font-weight: 600;
}

/* Contact Form 7 Styling */
.form-wrapper {
    margin-bottom: 20px;
}

.wpcf7 form p {
    margin-bottom: 20px;
}

.wpcf7 label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    font-size: 0.95rem;
}

.wpcf7 .wpcf7-form-control-wrap {
    display: block;
}

.wpcf7 input[type="text"],
.wpcf7 input[type="email"],
.wpcf7 input[type="tel"],
.wpcf7 input[type="date"],
.wpcf7 select,
.wpcf7 textarea {
    width: 100%;
    padding: 14px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    background-color: var(--background-light);
    font-size: 16px;
    transition: all 0.3s;
}

.wpcf7 input:focus,
.wpcf7 select:focus,
.wpcf7 textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(227,6,19,0.1);
    background: white;
}

.wpcf7 select {
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>');
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 16px;
    padding-right: 40px;
}

.wpcf7 textarea {
    min-height: 120px;
    resize: vertical;
}

.wpcf7 input[type="file"] {
    padding: 10px;
    font-size: 0.9rem;
}

.wpcf7 input[type="submit"] {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 16px 30px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    margin-top: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.wpcf7 input[type="submit"]:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(227,6,19,0.3);
}

.wpcf7 .wpcf7-acceptance label {
    display: flex;
    align-items: flex-start;
}

.wpcf7 .wpcf7-acceptance input {
    margin-top: 5px;
    margin-right: 10px;
}

.wpcf7 .wpcf7-acceptance .wpcf7-list-item {
    margin: 0;
}

.wpcf7 .ajax-loader {
    margin-left: 10px;
}

/* Form Response Messages */
.wpcf7 .wpcf7-response-output {
    margin: 20px 0 0;
    padding: 15px;
    border-radius: var(--border-radius);
    font-weight: 500;
    text-align: center;
}

.wpcf7 .wpcf7-validation-errors,
.wpcf7 .wpcf7-aborted {
    background-color: #fff3cd;
    border: 1px solid #ffeeba;
    color: #856404;
}

.wpcf7 .wpcf7-mail-sent-ok {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.wpcf7 .wpcf7-not-valid-tip {
    color: var(--primary-color);
    font-size: 0.8rem;
    margin-top: 5px;
}

/* Form Security Info */
.form-security {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.security-info,
.response-info {
    display: flex;
    align-items: center;
    color: var(--text-light);
    font-size: 0.85rem;
}

.security-info svg,
.response-info svg {
    margin-right: 8px;
    color: var(--text-light);
}

/* Map Section */
.map-section {
    padding: 80px 0;
    background-color: var(--background-white);
    text-align: center;
}

.map-section h2 {
    font-size: 2.2rem;
    margin-bottom: 10px;
}

.map-section > .container > p {
    color: var(--text-light);
    margin-bottom: 40px;
    font-size: 1.1rem;
}

.map-container {
    position: relative;
    margin-top: 20px;
}

.location-card {
    position: absolute;
    top: 30px;
    left: 30px;
    background: white;
    padding: 25px;
    border-radius: var(--border-radius);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    text-align: left;
    max-width: 280px;
    z-index: 10;
}

.location-card h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: var(--secondary-color);
}

.location-card p {
    color: var(--text-dark);
    margin-bottom: 15px;
}

.facility-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.facility-list li {
    display: flex;
    align-items: center;
    padding: 5px 0;
    font-size: 0.95rem;
}

.facility-list .emoji {
    margin-right: 10px;
}

.map-wrapper {
    width: 100%;
    height: 450px;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--box-shadow);
}

.map-wrapper iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

/* Alert styles for form feedback */
.alert {
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: slideInDown 0.3s ease;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form validation styles */
.form-error {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    animation: fadeIn 0.3s ease;
}

.character-counter {
    text-align: right;
    font-size: 0.875rem;
    color: var(--text-light);
    margin-top: 0.25rem;
}

.character-counter.warning {
    color: #dc3545;
}

.file-preview {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
    padding: 0.5rem;
    background: var(--background-light);
    border-radius: var(--border-radius);
    font-size: 0.875rem;
}

/* Success animation */
.form-success-message {
    text-align: center;
    padding: 40px 20px;
    animation: fadeIn 0.5s ease;
}

.success-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 20px;
    color: #28a745;
}

.form-success-message h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.form-success-message p {
    color: var(--text-light);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .kontakt-hero {
        padding: 80px 0;
    }
    
    .kontakt-hero h1 {
        font-size: 3rem;
    }
    
    .kontakt-grid {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    
    .location-card {
        position: relative;
        top: auto;
        left: auto;
        max-width: 100%;
        margin-bottom: 20px;
    }
}

@media (max-width: 768px) {
    .kontakt-hero {
        padding: 60px 0;
    }
    
    .kontakt-hero h1 {
        font-size: 2.5rem;
    }
    
    .kontakt-grid-section {
        padding: 60px 0;
    }
    
    .kontakt-info h2,
    .form-card h2 {
        font-size: 1.8rem;
    }
    
    .form-card {
        padding: 30px 20px;
    }
    
    .form-step:not(:last-child):after {
        width: 60%;
    }
    
    .step-text {
        font-size: 0.7rem;
    }
}

@media (max-width: 480px) {
    .kontakt-hero h1 {
        font-size: 2rem;
    }
    
    .form-steps {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .form-step {
        flex-direction: row;
        width: 100%;
    }
    
    .form-step:not(:last-child):after {
        display: none;
    }
    
    .step-number {
        margin-right: 10px;
        margin-bottom: 0;
    }
    
    .form-security {
        flex-direction: column;
        gap: 10px;
    }
}
</style>

<!-- Inline JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Form Steps Navigation Logic
    function initFormSteps() {
        const form = document.querySelector('.wpcf7-form');
        if (!form) return;
        
        const formSteps = document.querySelectorAll('.form-step');
        const requiredFields = {
            1: ['firma', 'email'],
            2: ['dienstleistung'],
            3: ['acceptance-datenschutz']
        };
        
        // Update steps based on field completion
        function updateFormSteps() {
            // Step 1 validation
            const step1Complete = requiredFields[1].every(field => {
                const input = form.querySelector(`[name="${field}"]`);
                return input && input.value.trim() !== '';
            });
            
            // Step 2 validation
            const step2Complete = requiredFields[2].every(field => {
                const input = form.querySelector(`[name="${field}"]`);
                return input && input.value.trim() !== '';
            });
            
            // Step 3 validation
            const step3Complete = requiredFields[3].every(field => {
                const input = form.querySelector(`[name="${field}"]`);
                return input && input.checked;
            });
            
            // Update step styles
            if (step1Complete) {
                formSteps[0].classList.add('active');
            } else {
                formSteps[0].classList.add('active');
                formSteps[1].classList.remove('active');
                formSteps[2].classList.remove('active');
                return;
            }
            
            if (step2Complete) {
                formSteps[1].classList.add('active');
            } else {
                formSteps[1].classList.remove('active');
                formSteps[2].classList.remove('active');
                return;
            }
            
            if (step3Complete) {
                formSteps[2].classList.add('active');
            } else {
                formSteps[2].classList.remove('active');
            }
        }
        
        // Listen for input changes
        form.addEventListener('input', updateFormSteps);
        form.addEventListener('change', updateFormSteps);
        
        // Initial state
        updateFormSteps();
    }
    
    // Conditional Logic for Sonstiges Field
    function initConditionalFields() {
        const serviceSelect = document.querySelector('select[name="dienstleistung"]');
        if (!serviceSelect) return;
        
        const sonstigesField = document.querySelector('input[name="sonstiges-dienstleistung"]');
        if (!sonstigesField) return;
        
        const sonstigesContainer = sonstigesField.closest('p');
        
        function toggleSonstigesField() {
            if (serviceSelect.value === 'Sonstiges') {
                sonstigesContainer.style.display = 'block';
                sonstigesContainer.classList.add('field-animate');
            } else {
                sonstigesContainer.style.display = 'none';
                sonstigesField.value = '';
            }
        }
        
        // Initial state
        toggleSonstigesField();
        
        // Listen for changes
        serviceSelect.addEventListener('change', toggleSonstigesField);
    }
    
    // Character Counter for Text Areas
    function initCharacterCounters() {
        const textareas = document.querySelectorAll('.wpcf7-textarea');
        
        textareas.forEach(textarea => {
            // Find existing counter or create a new one
            let counter = textarea.parentNode.querySelector('.character-counter');
            if (!counter) {
                counter = document.createElement('div');
                counter.className = 'character-counter';
                textarea.parentNode.appendChild(counter);
            }
            
            function updateCounter() {
                const maxLength = textarea.getAttribute('maxlength');
                const currentLength = textarea.value.length;
                
                counter.textContent = `${currentLength} / ${maxLength}`;
                
                // Visual warning when approaching limit
                if (maxLength && currentLength >= maxLength * 0.8) {
                    counter.classList.add('warning');
                } else {
                    counter.classList.remove('warning');
                }
            }
            
            // Initial count
            updateCounter();
            
            // Update on input
            textarea.addEventListener('input', updateCounter);
        });
    }
    
    // File Upload Preview
    function initFilePreview() {
        const fileInputs = document.querySelectorAll('.wpcf7-file');
        
        fileInputs.forEach(input => {
            // Find existing preview or create a new one
            let container = input.parentNode.querySelector('.file-preview');
            if (!container) {
                container = document.createElement('div');
                container.className = 'file-preview';
                container.style.display = 'none';
                input.parentNode.appendChild(container);
            }
            
            input.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    const file = this.files[0];
                    container.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
                    `;
                    container.style.display = 'flex';
                } else {
                    container.style.display = 'none';
                }
            });
        });
    }
    
    // Form Success Animation
    function initFormSuccessAnimation() {
        document.addEventListener('wpcf7mailsent', function(event) {
            const form = event.target;
            form.classList.add('sent-success');
            
            // Replace form with success message
            const formWrapper = form.closest('.form-wrapper');
            if (formWrapper) {
                const successMessage = document.createElement('div');
                successMessage.className = 'form-success-message';
                successMessage.innerHTML = `
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <h3>Anfrage erfolgreich gesendet!</h3>
                    <p>Vielen Dank für Ihre Kontaktaufnahme. Wir werden uns innerhalb von 24 Stunden bei Ihnen melden.</p>
                `;
                
                formWrapper.innerHTML = '';
                formWrapper.appendChild(successMessage);
                
                // Update form steps
                const formSteps = document.querySelectorAll('.form-step');
                formSteps.forEach(step => step.classList.add('active'));
            }
        });
    }
    
    // Smooth Scroll for Anchor Links
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    // Initialize all functions
    initFormSteps();
    initConditionalFields();
    initCharacterCounters();
    initFilePreview();
    initFormSuccessAnimation();
    initSmoothScroll();
    
    // Form field enhancement - add focus/filled states
    const formInputs = document.querySelectorAll('.wpcf7 input, .wpcf7 textarea, .wpcf7 select');
    formInputs.forEach(input => {
        // Set initial state for fields that already have values
        if (input.value || (input.tagName === 'SELECT' && input.options[input.selectedIndex].value)) {
            input.classList.add('has-value');
        }
        
        // Add event listeners for dynamic states
        input.addEventListener('focus', () => input.classList.add('is-focused'));
        input.addEventListener('blur', () => {
            input.classList.remove('is-focused');
            if (input.value || (input.tagName === 'SELECT' && input.options[input.selectedIndex].value)) {
                input.classList.add('has-value');
            } else {
                input.classList.remove('has-value');
            }
        });
    });
});
</script>

<?php get_footer(); ?>