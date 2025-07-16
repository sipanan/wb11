<?php
/**
 * Template Name: Datenschutz
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<!-- Legal Hero -->
<section class="legal-hero" aria-labelledby="legal-hero-title">
    <div class="container">
        <h1 id="legal-hero-title"><?php the_title(); ?></h1>
        <p><?php esc_html_e('Ihre Daten sind bei uns sicher und geschützt', 'safe-cologne'); ?></p>
    </div>
</section>

<!-- Legal Content -->
<section class="legal-content" aria-labelledby="legal-content-title">
    <div class="container">
        
        <!-- Table of Contents -->
        <div class="legal-toc">
            <h3><?php esc_html_e('Inhalt', 'safe-cologne'); ?></h3>
            <ul>
                <li><a href="#verantwortlicher"><?php esc_html_e('Verantwortlicher', 'safe-cologne'); ?></a></li>
                <li><a href="#datenarten"><?php esc_html_e('Erhobene Datenarten', 'safe-cologne'); ?></a></li>
                <li><a href="#zwecke"><?php esc_html_e('Zwecke der Verarbeitung', 'safe-cologne'); ?></a></li>
                <li><a href="#rechtsgrundlagen"><?php esc_html_e('Rechtsgrundlagen', 'safe-cologne'); ?></a></li>
                <li><a href="#weitergabe"><?php esc_html_e('Weitergabe von Daten', 'safe-cologne'); ?></a></li>
                <li><a href="#speicherdauer"><?php esc_html_e('Speicherdauer', 'safe-cologne'); ?></a></li>
                <li><a href="#rechte"><?php esc_html_e('Ihre Rechte', 'safe-cologne'); ?></a></li>
            </ul>
        </div>
        
        <!-- Contact Info -->
        <div class="legal-contact-box" id="verantwortlicher">
            <h4><?php esc_html_e('Verantwortlicher', 'safe-cologne'); ?></h4>
            <p>
                <?php echo esc_html(get_bloginfo('name')); ?><br>
                <?php echo esc_html(get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln')); ?><br>
                <?php esc_html_e('Telefon:', 'safe-cologne'); ?> 
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('safe_cologne_phone', '0221 6505 8801'))); ?>">
                    <?php echo esc_html(get_theme_mod('safe_cologne_phone', '0221 6505 8801')); ?>
                </a><br>
                <?php esc_html_e('E-Mail:', 'safe-cologne'); ?> 
                <a href="mailto:<?php echo esc_attr(get_theme_mod('safe_cologne_email', 'info@safecologne.de')); ?>">
                    <?php echo esc_html(get_theme_mod('safe_cologne_email', 'info@safecologne.de')); ?>
                </a>
            </p>
        </div>
        
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        
        <h2 id="datenarten"><?php esc_html_e('Erhobene Datenarten', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Wir erheben und verarbeiten folgende Kategorien von personenbezogenen Daten:', 'safe-cologne'); ?></p>
        <ul>
            <li><?php esc_html_e('Kontaktdaten (Name, E-Mail-Adresse, Telefonnummer)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Technische Daten (IP-Adresse, Browser-Informationen)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Nutzungsdaten (Besuchszeit, aufgerufene Seiten)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Kommunikationsdaten (Nachrichten über Kontaktformular)', 'safe-cologne'); ?></li>
        </ul>
        
        <h2 id="zwecke"><?php esc_html_e('Zwecke der Verarbeitung', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Wir verarbeiten Ihre personenbezogenen Daten zu folgenden Zwecken:', 'safe-cologne'); ?></p>
        <ul>
            <li><?php esc_html_e('Bereitstellung und Verbesserung unserer Website', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Bearbeitung von Anfragen und Kontaktaufnahmen', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Durchführung von Sicherheitsdienstleistungen', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Erfüllung rechtlicher Verpflichtungen', 'safe-cologne'); ?></li>
        </ul>
        
        <h2 id="rechtsgrundlagen"><?php esc_html_e('Rechtsgrundlagen', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Die Verarbeitung Ihrer personenbezogenen Daten erfolgt auf Grundlage von:', 'safe-cologne'); ?></p>
        <ul>
            <li><?php esc_html_e('Art. 6 Abs. 1 lit. b DSGVO (Vertragserfüllung)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Art. 6 Abs. 1 lit. c DSGVO (Rechtliche Verpflichtung)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Art. 6 Abs. 1 lit. f DSGVO (Berechtigtes Interesse)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Art. 6 Abs. 1 lit. a DSGVO (Einwilligung)', 'safe-cologne'); ?></li>
        </ul>
        
        <h2 id="weitergabe"><?php esc_html_e('Weitergabe von Daten', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Wir geben Ihre personenbezogenen Daten nur in folgenden Fällen weiter:', 'safe-cologne'); ?></p>
        <ul>
            <li><?php esc_html_e('An Dienstleister zur Vertragserfüllung', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Bei gesetzlicher Verpflichtung', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Mit Ihrer ausdrücklichen Einwilligung', 'safe-cologne'); ?></li>
        </ul>
        
        <h2 id="speicherdauer"><?php esc_html_e('Speicherdauer', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Wir speichern Ihre personenbezogenen Daten nur so lange, wie es für die Erfüllung der Zwecke erforderlich ist oder gesetzliche Aufbewahrungsfristen bestehen.', 'safe-cologne'); ?></p>
        
        <h2 id="rechte"><?php esc_html_e('Ihre Rechte', 'safe-cologne'); ?></h2>
        <p><?php esc_html_e('Sie haben folgende Rechte bezüglich Ihrer personenbezogenen Daten:', 'safe-cologne'); ?></p>
        <ul>
            <li><?php esc_html_e('Recht auf Auskunft (Art. 15 DSGVO)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Recht auf Berichtigung (Art. 16 DSGVO)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Recht auf Löschung (Art. 17 DSGVO)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Recht auf Einschränkung (Art. 18 DSGVO)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Recht auf Datenübertragbarkeit (Art. 20 DSGVO)', 'safe-cologne'); ?></li>
            <li><?php esc_html_e('Recht auf Widerspruch (Art. 21 DSGVO)', 'safe-cologne'); ?></li>
        </ul>
        
        <div class="legal-notice">
            <h4><?php esc_html_e('Wichtiger Hinweis', 'safe-cologne'); ?></h4>
            <p><?php esc_html_e('Bei Fragen zum Datenschutz können Sie sich jederzeit an uns wenden. Wir nehmen den Schutz Ihrer personenbezogenen Daten sehr ernst.', 'safe-cologne'); ?></p>
        </div>
        
        <p><strong><?php esc_html_e('Stand:', 'safe-cologne'); ?></strong> <?php echo date('d.m.Y'); ?></p>
    </div>
</section>

<!-- Back to Top -->
<div class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</div>

<?php get_footer(); ?>
    
    <!-- Hero Section -->
    <section class="privacy-hero">
        <div class="container">
            <div class="privacy-hero-content">
                <div class="hero-badge">
                    <svg width="48" height="48" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                </div>
                <h1 class="hero-title">Datenschutzerklärung</h1>
                <p class="hero-subtitle">Ihre Daten sind bei uns sicher – DSGVO-konform und transparent</p>
                <div class="hero-meta">
                    <span class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m.5-13H11v6l5.2 3.2.8-1.3-4.5-2.7V7Z"/>
                        </svg>
                        Zuletzt aktualisiert: <?php echo date_i18n('d. F Y'); ?>
                    </span>
                    <span class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15h-2v-6h2zm0-8h-2V7h2z"/>
                        </svg>
                        DSGVO & BDSG-neu konform
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="privacy-nav-section">
        <div class="container">
            <nav class="privacy-nav" aria-label="Datenschutz Navigation">
                <a href="#overview" class="nav-link active">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2Z"/>
                    </svg>
                    Überblick
                </a>
                <a href="#responsible" class="nav-link">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z"/>
                    </svg>
                    Verantwortlicher
                </a>
                <a href="#data-collection" class="nav-link">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3H9m3 2h3v1h-3V5M7 6h10v13H7V6Z"/>
                    </svg>
                    Datenerfassung
                </a>
                <a href="#cookies" class="nav-link">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12 6.5 2 12 2m0 2c-1.9 0-3.6.6-4.9 1.7l2.8 2.8C10.6 8.2 11.3 8 12 8s1.4.2 2.1.5l2.8-2.8C15.6 4.6 13.9 4 12 4m-6.3 2.8C4.6 8.2 4 9.9 4 12s.6 3.8 1.7 5.1l2.8-2.8C8.2 13.4 8 12.7 8 12s.2-1.4.5-2.1l-2.8-2.8m12.6 0l-2.8 2.8c.3.7.5 1.4.5 2.1s-.2 1.4-.5 2.1l2.8 2.8C19.4 15.6 20 13.9 20 12s-.6-3.6-1.7-4.9M12 16c-.7 0-1.4-.2-2.1-.5l-2.8 2.8C8.4 19.4 10.1 20 12 20s3.6-.6 4.9-1.7l-2.8-2.8c-.7.3-1.4.5-2.1.5Z"/>
                    </svg>
                    Cookies
                </a>
                <a href="#rights" class="nav-link">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2L1 7v10c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V7l-11-5Z"/>
                    </svg>
                    Ihre Rechte
                </a>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="privacy-content">
        <div class="container">
            <div class="content-wrapper">
                
                <!-- Overview Section -->
                <section id="overview" class="privacy-section">
                    <div class="section-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2v6Z"/>
                        </svg>
                    </div>
                    <h2 class="section-title">1. Datenschutz auf einen Blick</h2>
                    
                    <div class="info-box primary">
                        <h3>Allgemeine Hinweise</h3>
                        <p>Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren personenbezogenen Daten passiert, wenn Sie diese Website besuchen. Personenbezogene Daten sind alle Daten, mit denen Sie persönlich identifiziert werden können.</p>
                    </div>

                    <div class="quick-facts">
                        <div class="fact-card">
                            <div class="fact-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9 11H7v2h2v-2m4 0h-2v2h2v-2m4 0h-2v2h2v-2m2-7h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2m0 16H5V9h14v11Z"/>
                                </svg>
                            </div>
                            <h4>Datenerfassung</h4>
                            <p>Wir erfassen nur notwendige Daten für den Betrieb unserer Sicherheitsdienste</p>
                        </div>
                        
                        <div class="fact-card">
                            <div class="fact-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <h4>Datensicherheit</h4>
                            <p>SSL-Verschlüsselung und modernste Sicherheitsstandards schützen Ihre Daten</p>
                        </div>
                        
                        <div class="fact-card">
                            <div class="fact-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9 5a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c2.67 0 8 1.34 8 4v2H1v-2c0-2.66 5.33-4 8-4m7.76-9.64c2.02 2.2 2.02 5.25 0 7.27l-1.68-1.69c.84-1.18.84-2.71 0-3.89l1.68-1.69M20.07 2c3.93 4.05 3.9 10.11 0 14l-1.63-1.63c2.77-3.18 2.77-7.72 0-10.74L20.07 2Z"/>
                                </svg>
                            </div>
                            <h4>Transparenz</h4>
                            <p>Vollständige Kontrolle über Ihre Daten mit jederzeitigem Auskunftsrecht</p>
                        </div>
                    </div>

                    <div class="summary-table">
                        <table>
                            <tbody>
                                <tr>
                                    <td><strong>Datenerfassung auf dieser Website</strong></td>
                                    <td>Server-Log-Dateien, Kontaktformular, Bewerbungen, Cookies</td>
                                </tr>
                                <tr>
                                    <td><strong>Verantwortlich für Datenerfassung</strong></td>
                                    <td>Safe Cologne SecUG (siehe Abschnitt "Verantwortlicher")</td>
                                </tr>
                                <tr>
                                    <td><strong>Wie erfassen wir Ihre Daten?</strong></td>
                                    <td>Automatisch beim Websitebesuch und durch Ihre Eingaben</td>
                                </tr>
                                <tr>
                                    <td><strong>Wofür nutzen wir Ihre Daten?</strong></td>
                                    <td>Websitebetrieb, Kontaktaufnahme, Bewerbungsverfahren</td>
                                </tr>
                                <tr>
                                    <td><strong>Welche Rechte haben Sie?</strong></td>
                                    <td>Auskunft, Berichtigung, Löschung, Einschränkung, Widerspruch</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Responsible Party -->
                <section id="responsible" class="privacy-section">
                    <h2 class="section-title">2. Verantwortlicher</h2>
                    
                    <div class="responsible-card">
                        <div class="company-header">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/safe-cologne-logo.svg" 
                                 alt="Safe Cologne Logo" 
                                 width="200" 
                                 height="60">
                        </div>
                        <div class="company-details">
                            <h3>Safe Cologne SecUG (haftungsbeschränkt)</h3>
                            <address>
                                <p>
                                    Subbelrather Str. 15A<br>
                                    50823 Köln<br>
                                    Deutschland
                                </p>
                            </address>
                            <div class="contact-details">
                                <p><strong>Telefon:</strong> <a href="tel:+4922165058801">0221 65058801</a></p>
                                <p><strong>E-Mail:</strong> <a href="mailto:datenschutz@safecologne.de">datenschutz@safecologne.de</a></p>
                                <p><strong>Website:</strong> <a href="https://www.safecologne.de">www.safecologne.de</a></p>
                            </div>
                        </div>
                    </div>
					                    <div class="data-officer-card">
                        <h3>Datenschutzbeauftragter</h3>
                        <div class="officer-info">
                            <div class="officer-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z"/>
                                </svg>
                            </div>
                            <div class="officer-details">
                                <p class="officer-name">[Name des Datenschutzbeauftragten]</p>
                                <p class="officer-contact">
                                    <strong>E-Mail:</strong> <a href="mailto:datenschutz@safecologne.de">datenschutz@safecologne.de</a><br>
                                    <strong>Telefon:</strong> <a href="tel:+4922165058801">0221 65058801</a>
                                </p>
                                <p class="officer-note">
                                    Sie können sich jederzeit bei allen Fragen und Anregungen zum Datenschutz direkt an unseren Datenschutzbeauftragten wenden.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Data Collection -->
                <section id="data-collection" class="privacy-section">
                    <h2 class="section-title">3. Datenerfassung auf dieser Website</h2>
                    
                    <!-- Server Logs -->
                    <div class="data-category">
                        <h3>3.1 Server-Log-Dateien</h3>
                        <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log-Dateien, die Ihr Browser automatisch an uns übermittelt. Dies sind:</p>
                        
                        <ul class="data-list">
                            <li>Browsertyp und Browserversion</li>
                            <li>Verwendetes Betriebssystem</li>
                            <li>Referrer URL</li>
                            <li>Hostname des zugreifenden Rechners</li>
                            <li>Uhrzeit der Serveranfrage</li>
                            <li>IP-Adresse</li>
                        </ul>
                        
                        <div class="legal-basis">
                            <h4>Rechtsgrundlage</h4>
                            <p>Die Erfassung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein berechtigtes Interesse an der technisch fehlerfreien Darstellung und der Optimierung seiner Website.</p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="data-category">
                        <h3>3.2 Kontaktformular</h3>
                        <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der Anfrage und für den Fall von Anschlussfragen bei uns gespeichert.</p>
                        
                        <div class="data-flow">
                            <div class="flow-step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h5>Datenerhebung</h5>
                                    <p>Name, E-Mail, Telefon, Nachricht</p>
                                </div>
                            </div>
                            <div class="flow-arrow">→</div>
                            <div class="flow-step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h5>Verarbeitung</h5>
                                    <p>Bearbeitung Ihrer Anfrage</p>
                                </div>
                            </div>
                            <div class="flow-arrow">→</div>
                            <div class="flow-step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h5>Speicherdauer</h5>
                                    <p>6 Monate nach Abschluss</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="legal-basis">
                            <h4>Rechtsgrundlage</h4>
                            <p>Die Verarbeitung der Daten erfolgt auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Sie können diese Einwilligung jederzeit widerrufen.</p>
                        </div>
                    </div>

                    <!-- Job Applications -->
                    <div class="data-category">
                        <h3>3.3 Bewerberdaten</h3>
                        <div class="application-info">
                            <p>Wir erheben und verarbeiten die personenbezogenen Daten von Bewerbern zum Zwecke der Abwicklung des Bewerbungsverfahrens. Die Verarbeitung kann auch auf elektronischem Wege erfolgen.</p>
                            
                            <div class="data-types">
                                <h4>Folgende Daten werden verarbeitet:</h4>
                                <div class="data-grid">
                                    <div class="data-type">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z"/>
                                        </svg>
                                        <span>Persönliche Daten</span>
                                    </div>
                                    <div class="data-type">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-5 14v-2h-4v2h4m2-4v-2h-6v2h6m2-4V7H6v2h12Z"/>
                                        </svg>
                                        <span>Bewerbungsunterlagen</span>
                                    </div>
                                    <div class="data-type">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                        </svg>
                                        <span>Kontaktdaten</span>
                                    </div>
                                    <div class="data-type">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7z"/>
                                        </svg>
                                        <span>Qualifikationen</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="retention-policy">
                                <h4>Speicherdauer:</h4>
                                <ul>
                                    <li><strong>Bei Einstellung:</strong> Überführung in die Personalakte</li>
                                    <li><strong>Bei Absage:</strong> Löschung nach 6 Monaten</li>
                                    <li><strong>Talent-Pool:</strong> Mit Ihrer Einwilligung bis zu 2 Jahre</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Cookies Section -->
                <section id="cookies" class="privacy-section">
                    <h2 class="section-title">4. Cookies und Tracking</h2>
                    
                    <div class="cookie-intro">
                        <div class="cookie-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12 6.5 2 12 2m0 2c-1.9 0-3.6.6-4.9 1.7l2.8 2.8C10.6 8.2 11.3 8 12 8s1.4.2 2.1.5l2.8-2.8C15.6 4.6 13.9 4 12 4m-6.3 2.8C4.6 8.2 4 9.9 4 12s.6 3.8 1.7 5.1l2.8-2.8C8.2 13.4 8 12.7 8 12s.2-1.4.5-2.1l-2.8-2.8m12.6 0l-2.8 2.8c.3.7.5 1.4.5 2.1s-.2 1.4-.5 2.1l2.8 2.8C19.4 15.6 20 13.9 20 12s-.6-3.6-1.7-4.9M12 16c-.7 0-1.4-.2-2.1-.5l-2.8 2.8C8.4 19.4 10.1 20 12 20s3.6-.6 4.9-1.7l-2.8-2.8c-.7.3-1.4.5-2.1.5Z"/>
                            </svg>
                        </div>
                        <p>Unsere Website verwendet Cookies. Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert. Cookies helfen uns dabei, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen.</p>
                    </div>

                    <div class="cookie-categories">
                        <div class="cookie-category essential">
                            <div class="category-header">
                                <div class="category-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                    </svg>
                                </div>
                                <div class="category-info">
                                    <h3>Notwendige Cookies</h3>
                                    <span class="badge">Immer aktiv</span>
                                </div>
                            </div>
                            <p>Diese Cookies sind für die Grundfunktionen der Website erforderlich.</p>
                            <ul>
                                <li><strong>Session-Cookie:</strong> Speichert Ihre Sitzung während des Besuchs</li>
                                <li><strong>Cookie-Einstellungen:</strong> Speichert Ihre Cookie-Präferenzen</li>
                                <li><strong>CSRF-Token:</strong> Sicherheit bei Formularübertragungen</li>
                            </ul>
                        </div>

                        <div class="cookie-category analytics">
                            <div class="category-header">
                                <div class="category-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M22 7h-9v2h9v-.2M16 11h6v2h-6v-2m0 4h7v2h-7v-1m-4-6v8c0 4.08-4.03 8-9 8H1s1 .2 1-2c2.96 0 6-2 6-6.03V5c0-.56.45-1 1-1h5c.56 0 1 .45 1 1v4Z"/>
                                    </svg>
                                </div>
                                <div class="category-info">
                                    <h3>Analyse-Cookies</h3>
                                    <span class="badge optional">Optional</span>
                                </div>
                            </div>
                            <p>Diese Cookies helfen uns zu verstehen, wie Besucher mit unserer Website interagieren.</p>
                            <ul>
                                <li><strong>Google Analytics:</strong> Anonymisierte Nutzungsstatistiken</li>
                                <li><strong>Matomo:</strong> Datenschutzfreundliche Analyse</li>
                            </ul>
                        </div>

                        <div class="cookie-category marketing">
                            <div class="category-header">
                                <div class="category-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4m8.94 3A8.994 8.994 0 0 0 13 3.06V1h-2v2.06A8.994 8.994 0 0 0 3.06 11H1v2h2.06A8.994 8.994 0 0 0 11 20.94V23h2v-2.06A8.994 8.994 0 0 0 20.94 13H23v-2h-2.06M12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7"/>
                                    </svg>
                                </div>
                                <div class="category-info">
                                                                        <h3>Marketing-Cookies</h3>
                                    <span class="badge optional">Optional</span>
                                </div>
                            </div>
                            <p>Diese Cookies werden verwendet, um Werbung relevanter für Sie und Ihre Interessen zu gestalten.</p>
                            <ul>
                                <li><strong>Facebook Pixel:</strong> Conversion-Tracking für Facebook-Anzeigen</li>
                                <li><strong>Google Ads:</strong> Remarketing und Conversion-Tracking</li>
                            </ul>
                        </div>
                    </div>

                    <div class="cookie-management">
                        <h3>Cookie-Einstellungen verwalten</h3>
                        <p>Sie können Ihre Cookie-Einstellungen jederzeit ändern:</p>
                        <button class="cookie-settings-btn" onclick="openCookieSettings()">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 15.5A3.5 3.5 0 0 1 8.5 12A3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5a3.5 3.5 0 0 1-3.5 3.5m7.43-2.53c.04-.32.07-.64.07-.97c0-.33-.03-.66-.07-1l2.11-1.63c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.31-.61-.22l-2.49 1c-.52-.39-1.06-.73-1.69-.98l-.37-2.65A.506.506 0 0 0 14 2h-4c-.25 0-.46.18-.5.42l-.37 2.65c-.63.25-1.17.59-1.69.98l-2.49-1c-.22-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64L4.57 11c-.04.34-.07.67-.07 1c0 .33.03.65.07.97l-2.11 1.66c-.19.15-.25.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1.01c.52.4 1.06.74 1.69.99l.37 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.37-2.65c.63-.26 1.17-.59 1.69-.99l2.49 1.01c.22.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.66Z"/>
                            </svg>
                            Cookie-Einstellungen
                        </button>
                    </div>
                </section>

                <!-- Third Party Services -->
                <section class="privacy-section">
                    <h2 class="section-title">5. Dienste von Drittanbietern</h2>
                    
                    <div class="service-grid">
                        <div class="service-card">
                            <div class="service-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/google-analytics-logo.svg" alt="Google Analytics" width="48" height="48">
                            </div>
                            <h3>Google Analytics</h3>
                            <p>Wir nutzen Google Analytics zur Analyse des Nutzerverhaltens.</p>
                            <ul>
                                <li>IP-Anonymisierung aktiviert</li>
                                <li>Keine Weitergabe an Dritte</li>
                                <li>Auftragsverarbeitungsvertrag vorhanden</li>
                            </ul>
                            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="service-link">
                                Datenschutzerklärung von Google
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="service-card">
                            <div class="service-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cf7-logo.svg" alt="Contact Form 7" width="48" height="48">
                            </div>
                            <h3>Contact Form 7</h3>
                            <p>Für die Verarbeitung von Kontaktanfragen und Bewerbungen.</p>
                            <ul>
                                <li>Lokale Datenverarbeitung</li>
                                <li>SSL-verschlüsselte Übertragung</li>
                                <li>Keine externen Server</li>
                            </ul>
                        </div>

                        <div class="service-card">
                            <div class="service-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cloudflare-logo.svg" alt="Cloudflare" width="48" height="48">
                            </div>
                            <h3>Cloudflare</h3>
                            <p>Content Delivery Network für schnelle und sichere Auslieferung.</p>
                            <ul>
                                <li>DDoS-Schutz</li>
                                <li>SSL-Verschlüsselung</li>
                                <li>Standort: EU-Server</li>
                            </ul>
                            <a href="https://www.cloudflare.com/privacypolicy/" target="_blank" rel="noopener" class="service-link">
                                Datenschutzerklärung von Cloudflare
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Your Rights -->
                <section id="rights" class="privacy-section">
                    <h2 class="section-title">6. Ihre Rechte als betroffene Person</h2>
                    
                    <div class="rights-intro">
                        <p>Nach der DSGVO stehen Ihnen folgende Rechte zu:</p>
                    </div>

                    <div class="rights-grid">
                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2v6Z"/>
                                </svg>
                            </div>
                            <h3>Auskunftsrecht</h3>
                            <p>Sie haben das Recht, eine Bestätigung darüber zu verlangen, ob wir personenbezogene Daten von Ihnen verarbeiten.</p>
                            <button class="right-action" onclick="requestInfo()">Auskunft anfordern</button>
                        </div>

                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21.7 13.35l-1 .79-2.77-3.54c-.3-.39-.84-.45-1.22-.16-.38.3-.45.84-.16 1.22l2.77 3.54-.8 1.03-5.01-6.4c-.3-.39-.84-.45-1.22-.16-.38.3-.45.84-.16 1.22l5.01 6.4-.93 1.19-4.96-6.34c-.3-.39-.84-.45-1.22-.16-.38.3-.45.84-.16 1.22l4.96 6.34-.96 1.23L8.8 12.82c-.3-.39-.84-.45-1.22-.16-.38.3-.45.84-.16 1.22l5.93 7.57c1.32 1.69 3.78 2 5.47.68l5.23-4.09c1.32-1.03 1.55-2.94.52-4.26l-1.84-2.35c-.3-.39-.84-.45-1.22-.16-.38.3-.45.84-.16 1.22l1.35 1.73M7.4 9.89l1.73-1.35 2.16 2.76 1.35-1.05L10.47 7.5 12 6.32l2.47 3.15 1.41-1.1c-.22-.88-.84-1.62-1.72-2-1.49-.64-3.22.05-3.86 1.54L6.79 15.3l1.74.48 2.32-5.03-3.45-1.3"/>
                                </svg>
                            </div>
                            <h3>Berichtigungsrecht</h3>
                            <p>Sie haben das Recht, die Berichtigung unrichtiger personenbezogener Daten zu verlangen.</p>
                            <button class="right-action" onclick="requestCorrection()">Berichtigung anfordern</button>
                        </div>

                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3H9m3 2h3v1h-3V5M7 6h10v13H7V6Z"/>
                                </svg>
                            </div>
                            <h3>Löschungsrecht</h3>
                            <p>Sie haben das Recht, die Löschung Ihrer personenbezogenen Daten zu verlangen ("Recht auf Vergessenwerden").</p>
                            <button class="right-action" onclick="requestDeletion()">Löschung anfordern</button>
                        </div>

                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11 21c0 .6.4 1 1 1s1-.4 1-1v-1a1 1 0 0 0-2 0v1m0-4c0 .6.4 1 1 1s1-.4 1-1v-1a1 1 0 0 0-2 0v1m0-4c0 .6.4 1 1 1s1-.4 1-1v-1a1 1 0 0 0-2 0v1m0-4c0 .6.4 1 1 1s1-.4 1-1V8a1 1 0 0 0-2 0v1m0-4c0 .6.4 1 1 1s1-.4 1-1V4a1 1 0 0 0-2 0v1M3 12c0 2.2 1.2 4.2 3 5.2a1 1 0 0 0 1-1.7A3.5 3.5 0 0 1 4.5 12A3.5 3.5 0 0 1 8 8.5a1 1 0 0 0 0-2A5.5 5.5 0 0 0 3 12m13 0a1 1 0 0 0 0 2 3.5 3.5 0 0 1 3.5 3.5 3.5 3.5 0 0 1-1.5 2.9a1 1 0 0 0 1 1.7c1.8-1 3-3 3-5.2a5.5 5.5 0 0 0-5.5-5.5a1 1 0 0 0-.5.1z"/>
                                </svg>
                            </div>
                            <h3>Einschränkungsrecht</h3>
                            <p>Sie haben das Recht, die Einschränkung der Verarbeitung Ihrer Daten zu verlangen.</p>
                            <button class="right-action" onclick="requestRestriction()">Einschränkung anfordern</button>
                        </div>

                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M12 2.5L8.5 8.7L2 9.8l4.6 5.5L5.5 22L12 19l6.5 3l-1.1-6.7L22 9.8l-6.5-1.1L12 2.5z"/>
                                </svg>
                            </div>
                            <h3>Datenübertragbarkeit</h3>
                            <p>Sie haben das Recht, Ihre Daten in einem strukturierten, maschinenlesbaren Format zu erhalten.</p>
                            <button class="right-action" onclick="requestPortability()">Daten exportieren</button>
                        </div>

                        <div class="right-card">
                            <div class="right-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19 3H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 2v14H5V5h14m-2.5 4a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 16.5 6A1.5 1.5 0 0 1 18 7.5A1.5 1.5 0 0 1 16.5 9m-2 2a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 14.5 8a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5m-5 0A1.5 1.5 0 0 1 8 9.5A1.5 1.5 0 0 1 9.5 8A1.5 1.5 0 0 1 11 9.5A1.5 1.5 0 0 1 9.5 11m-2 2A1.5 1.5 0 0 1 6 11.5A1.5 1.5 0 0 1 7.5 10A1.5 1.5 0 0 1 9 11.5A1.5 1.5 0 0 1 7.5 13m9 1.5L6.5 16L8 14.5L16.5 6L18 7.5l-3 5z"/>
                                </svg>
                            </div>
                            <h3>Widerspruchsrecht</h3>
                            <p>Sie haben das Recht, der Verarbeitung Ihrer Daten zu widersprechen.</p>
                            <button class="right-action" onclick="requestObjection()">Widerspruch einlegen</button>
                        </div>
                    </div>

                    <div class="rights-contact">
                        <h3>So erreichen Sie uns</h3>
                        <p>Zur Ausübung Ihrer Rechte können Sie sich jederzeit an uns wenden:</p>
                        <div class="contact-box">
                            <p>
                                <strong>E-Mail:</strong> <a href="mailto:datenschutz@safecologne.de">datenschutz@safecologne.de</a><br>
                                <strong>Telefon:</strong> <a href="tel:+4922165058801">0221 65058801</a><br>
                                <strong>Post:</strong> Safe Cologne SecUG, Subbelrather Str. 15A, 50823 Köln
                            </p>
                        </div>
                    </div>

                    <div class="supervisory-authority">
                        <h3>Beschwerderecht bei der Aufsichtsbehörde</h3>
                        <p>Wenn Sie der Ansicht sind, dass die Verarbeitung Ihrer personenbezogenen Daten gegen die DSGVO verstößt, haben Sie das Recht, sich bei einer Aufsichtsbehörde zu beschweren.</p>
                        <div class="authority-info">
                            <h4>Zuständige Aufsichtsbehörde:</h4>
                            <address>
                                <strong>Landesbeauftragte für Datenschutz und Informationsfreiheit Nordrhein-Westfalen</strong><br>
                                Postfach 20 04 44<br>
                                40102 Düsseldorf<br>
                                Tel.: 0211 38424-0<br>
                                E-Mail: poststelle@ldi.nrw.de<br>
                                <a href="https://www.ldi.nrw.de" target="_blank" rel="noopener">www.ldi.nrw.de</a>
                            </address>
                        </div>
                    </div>
                </section>

                <!-- SSL Encryption -->
                <section class="privacy-section">
                    <h2 class="section-title">7. SSL- bzw. TLS-Verschlüsselung</h2>
                    <div class="ssl-info">
                        <div class="ssl-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                            </svg>
                        </div>
                        <div class="ssl-content">
                            <p>Diese Seite nutzt aus Sicherheitsgründen und zum Schutz der Übertragung vertraulicher Inhalte eine SSL-bzw. TLS-Verschlüsselung.</p>
                            <div class="ssl-check">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#10B981" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/>
                                </svg>
                                <span>Ihre Verbindung ist verschlüsselt</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Updates -->
                <section class="privacy-section">
                    <h2 class="section-title">8. Aktualität und Änderung dieser Datenschutzerklärung</h2>
                    <p>Diese Datenschutzerklärung ist aktuell gültig und hat den Stand: <strong><?php echo date_i18n('F Y'); ?></strong></p>
                    <p>Durch die Weiterentwicklung unserer Website und Angebote darüber oder aufgrund geänderter gesetzlicher beziehungsweise behördlicher Vorgaben kann es notwendig werden, diese Datenschutzerklärung zu ändern.</p>
                    <div class="update-notification">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M10 20h4v-1h-4v1m-2-19v1h8V1h-8m4 2c4.42 0 8 3.58 8 8 0 1.57-.46 3.03-1.24 4.26L19 17.5l-1.41 1.41-2.24-2.24A7.954 7.954 0 0 1 12 18c-4.42 0-8-3.58-8-8s3.58-8 8-8m0 2c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6m1 1v5l3.61 2.16-.72 1.2L11 12.72V6h2Z"/>
                        </svg>
                        <p>Die jeweils aktuelle Datenschutzerklärung kann jederzeit auf der Website unter <a href="<?php echo home_url('/datenschutz'); ?>">www.safecologne.de/datenschutz</a> von Ihnen abgerufen und ausgedruckt werden.</p>
                    </div>
                </section>

            </div>
        </div>
    </section>

    <!-- Floating Actions -->
    <div class="privacy-actions">
        <button class="action-btn print" onclick="window.print()" title="Datenschutzerklärung drucken">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zM16 19H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/>
            </svg>
        </button>
        <button class="action-btn download" onclick="downloadPDF()" title="Als PDF herunterladen">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
            </svg>
        </button>
        <button class="action-btn top" onclick="scrollToTop()" title="Nach oben">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z"/>
            </svg>
        </button>
    </div>

</main>

<style>
/* ===== GOD-TIER DATENSCHUTZ STYLES ===== */

/* Variables */
:root {
    --primary: #E30613;
    --primary-dark: #C2050F;
    --primary-light: #FF1A27;
    --secondary: #1A1A1A;
    --gray-50: #F9FAFB;
    --gray-100: #F3F4F6;
    --gray-200: #E5E7EB;
    --gray-300: #D1D5DB;
    --gray-400: #9CA3AF;
    --gray-500: #6B7280;
    --gray-600: #4B5563;
    --gray-700: #374151;
    --gray-800: #1F2937;
    --gray-900: #111827;
    --white: #FFFFFF;
    --success: #10B981;
    --warning: #F59E0B;
    --error: #EF4444;
    
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.12);
    --shadow-lg: 0 10px 20px rgba(0,0,0,0.12);
    --shadow-xl: 0 20px 40px rgba(0,0,0,0.12);
    
    --radius: 8px;
    --radius-lg: 12px;
    --radius-xl: 16px;
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Base Styles */
.privacy-page {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--gray-900);
    line-height: 1.7;
    background: var(--gray-50);
}

/* Hero Section */
.privacy-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: var(--white);
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.privacy-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M50 30c-11.046 0-20 8.954-20 20s8.954 20 20 20 20-8.954 20-20-8.954-20-20-20zm0 35c-8.284 0-15-6.716-15-15s6.716-15 15-15 15 6.716 15 15-6.716 15-15 15z" fill="%23ffffff" fill-opacity="0.05"/%3E%3C/svg%3E');
    background-size: 100px 100px;
}

.privacy-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    margin-bottom: 2rem;
    backdrop-filter: blur(10px);
}

/* Hero Title continued */
.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin: 0 0 1rem;
    letter-spacing: -0.02em;
}

.hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin: 0 0 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.hero-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    opacity: 0.8;
}

/* Navigation Section */
.privacy-nav-section {
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
    position: sticky;
    top: 80px;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.privacy-nav {
    display: flex;
    gap: 0;
    padding: 0;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.privacy-nav .nav-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1.25rem 1.5rem;
    color: var(--gray-600);
    text-decoration: none;
    font-weight: 500;
    white-space: nowrap;
    border-bottom: 3px solid transparent;
    transition: var(--transition);
}

.privacy-nav .nav-link:hover {
    color: var(--primary);
    background: var(--gray-50);
}

.privacy-nav .nav-link.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
}

/* Content Wrapper */
.content-wrapper {
    max-width: 1000px;
    margin: 0 auto;
    padding: 3rem 0;
}

/* Privacy Sections */
.privacy-section {
    background: var(--white);
    border-radius: var(--radius-xl);
    padding: 3rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
    scroll-margin-top: 120px;
}

.section-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: var(--gray-100);
    border-radius: 50%;
    margin-bottom: 1.5rem;
    color: var(--primary);
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 2rem;
    color: var(--gray-900);
}

/* Info Box */
.info-box {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    margin-bottom: 2rem;
    border-left: 4px solid var(--primary);
}

.info-box.primary {
    background: rgba(227, 6, 19, 0.05);
    border-left-color: var(--primary);
}

.info-box h3 {
    font-size: 1.25rem;
    margin: 0 0 0.75rem;
    color: var(--gray-900);
}

.info-box p {
    margin: 0;
    color: var(--gray-700);
}

/* Quick Facts */
.quick-facts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.fact-card {
    text-align: center;
    padding: 2rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.fact-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.fact-icon {
    width: 48px;
    height: 48px;
    margin: 0 auto 1rem;
    color: var(--primary);
}

.fact-card h4 {
    font-size: 1.125rem;
    margin: 0 0 0.5rem;
    color: var(--gray-900);
}

.fact-card p {
    margin: 0;
    color: var(--gray-600);
    font-size: 0.875rem;
}

/* Summary Table */
.summary-table {
    width: 100%;
    margin: 2rem 0;
    border-collapse: collapse;
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.summary-table td {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-200);
}

.summary-table tr:last-child td {
    border-bottom: none;
}

.summary-table td:first-child {
    font-weight: 600;
    color: var(--gray-700);
    background: var(--gray-50);
    width: 40%;
}

/* Responsible Card */
.responsible-card {
    display: flex;
    gap: 2rem;
    padding: 2rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    margin-bottom: 2rem;
}

.company-header img {
    max-width: 200px;
    height: auto;
}

.company-details h3 {
    font-size: 1.5rem;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.company-details address {
    font-style: normal;
    color: var(--gray-700);
    margin-bottom: 1rem;
}

.contact-details p {
    margin: 0.5rem 0;
}

.contact-details a {
    color: var(--primary);
    text-decoration: none;
    transition: var(--transition);
}

.contact-details a:hover {
    text-decoration: underline;
}

/* Data Officer Card */
.data-officer-card {
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
    border-radius: var(--radius-lg);
    padding: 2rem;
    border: 1px solid var(--gray-200);
}

.officer-info {
    display: flex;
    gap: 1.5rem;
    align-items: start;
}

.officer-icon {
    width: 64px;
    height: 64px;
    background: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    box-shadow: var(--shadow-sm);
    flex-shrink: 0;
}

.officer-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0 0 0.5rem;
    color: var(--gray-900);
}

.officer-note {
    margin-top: 1rem;
    padding: 1rem;
    background: var(--white);
    border-radius: var(--radius);
    font-size: 0.875rem;
    color: var(--gray-600);
}

/* Data Categories */
.data-category {
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.data-category:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.data-category h3 {
    font-size: 1.5rem;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.data-list {
    list-style: none;
    padding: 0;
    margin: 1rem 0;
}

.data-list li {
    position: relative;
    padding-left: 2rem;
    margin-bottom: 0.5rem;
    color: var(--gray-700);
}

.data-list li::before {
    content: '•';
    position: absolute;
    left: 0.5rem;
    color: var(--primary);
    font-weight: bold;
}

/* Data Flow */
.data-flow {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 2rem 0;
    padding: 2rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    overflow-x: auto;
}

.flow-step {
    flex: 1;
    min-width: 150px;
    text-align: center;
}

.step-number {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    margin: 0 auto 1rem;
}

.step-content h5 {
    font-size: 1rem;
    margin: 0 0 0.5rem;
    color: var(--gray-900);
}

.step-content p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0;
}

.flow-arrow {
    color: var(--gray-400);
    font-size: 1.5rem;
    flex-shrink: 0;
}

/* Legal Basis */
.legal-basis {
    background: var(--blue-50, #EFF6FF);
    border: 1px solid var(--blue-200, #BFDBFE);
    border-radius: var(--radius);
    padding: 1.5rem;
    margin-top: 1.5rem;
}

.legal-basis h4 {
    font-size: 1rem;
    margin: 0 0 0.5rem;
    color: var(--blue-800, #1E40AF);
}

.legal-basis p {
    margin: 0;
    color: var(--blue-700, #1D4ED8);
    font-size: 0.875rem;
}

/* Data Types Grid */
.data-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
    margin: 1rem 0;
}

.data-type {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 1rem;
    background: var(--white);
    border-radius: var(--radius);
    border: 1px solid var(--gray-200);
}

.data-type svg {
    width: 32px;
    height: 32px;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.data-type span {
    font-size: 0.875rem;
    color: var(--gray-700);
}

/* Cookie Categories */
.cookie-intro {
    display: flex;
    gap: 2rem;
    align-items: center;
    margin-bottom: 2rem;
}

.cookie-icon {
    flex-shrink: 0;
}

.cookie-categories {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.cookie-category {
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    transition: var(--transition);
}

.cookie-category.essential {
    border-color: var(--success);
    background: rgba(16, 185, 129, 0.05);
}

.cookie-category.analytics {
    border-color: var(--warning);
    background: rgba(245, 158, 11, 0.05);
}

.cookie-category.marketing {
    border-color: var(--primary);
    background: rgba(227, 6, 19, 0.05);
}

.category-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.category-icon {
    width: 48px;
    height: 48px;
    background: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-sm);
}

.category-info h3 {
    font-size: 1.25rem;
    margin: 0;
}

.badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--gray-200);
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.badge.optional {
    background: var(--warning);
    color: var(--white);
}

.cookie-management {
    margin-top: 2rem;
    padding: 2rem;
    background: var(--gray-50);
    border-radius: var(--radius);
}

.cookie-settings-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1.5rem;
    background: var(--gray-900);
    color: var(--white);
    border: none;
    border-radius: var(--radius);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.cookie-settings-btn:hover {
    background: var(--gray-800);
    transform: translateY(-2px);
}

/* Service Grid */
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.service-card {
    padding: 2rem;
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.service-card:hover {
    border-color: var(--primary);
    box-shadow: var(--shadow-md);
}

.service-logo {
    width: 64px;
    height: 64px;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-logo img {
    max-width: 100%;
    height: auto;
}

.service-card h3 {
    font-size: 1.25rem;
    margin: 0 0 0.75rem;
}

.service-card p {
    color: var(--gray-600);
    margin: 0 0 1rem;
    font-size: 0.875rem;
}

.service-card ul {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem;
}

.service-card li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    color: var(--gray-700);
}

.service-card li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--success);
    font-weight: bold;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: var(--transition);
}

.service-link:hover {
    gap: 0.75rem;
}

/* Rights Grid continued */
.rights-intro {
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
}

.rights-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.right-card {
    text-align: center;
    padding: 2rem;
    background: var(--white);
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.right-card:hover {
    border-color: var(--primary);
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.right-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1.5rem;
    color: var(--primary);
}

.right-card h3 {
    font-size: 1.25rem;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.right-card p {
    color: var(--gray-600);
    margin: 0 0 1.5rem;
    font-size: 0.875rem;
}

.right-action {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.right-action:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* Rights Contact */
.rights-contact {
    margin-bottom: 3rem;
}

.rights-contact h3 {
    font-size: 1.5rem;
    margin: 0 0 1rem;
}

.contact-box {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    border-left: 4px solid var(--primary);
}

.contact-box a {
    color: var(--primary);
    text-decoration: none;
}

.contact-box a:hover {
    text-decoration: underline;
}

/* Supervisory Authority */
.supervisory-authority {
    padding: 2rem;
    background: linear-gradient(135deg, var(--yellow-50, #FFFBEB) 0%, var(--yellow-100, #FEF3C7) 100%);
    border-radius: var(--radius-lg);
    border: 1px solid var(--yellow-300, #FCD34D);
}

.authority-info {
    margin-top: 1.5rem;
}

.authority-info h4 {
    font-size: 1.125rem;
    margin: 0 0 1rem;
    color: var(--yellow-900, #78350F);
}

.authority-info address {
    font-style: normal;
    color: var(--yellow-800, #92400E);
}

.authority-info a {
    color: var(--yellow-700, #B45309);
}

/* SSL Info */
.ssl-info {
    display: flex;
    gap: 2rem;
    align-items: center;
    padding: 2rem;
    background: linear-gradient(135deg, var(--green-50, #ECFDF5) 0%, var(--green-100, #D1FAE5) 100%);
    border-radius: var(--radius-lg);
    border: 1px solid var(--green-300, #6EE7B7);
}

.ssl-icon {
    flex-shrink: 0;
    color: var(--green-600, #059669);
}

.ssl-check {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: 1rem;
    padding: 0.75rem 1rem;
    background: var(--white);
    border-radius: var(--radius);
    color: var(--green-700, #047857);
    font-weight: 600;
}

/* Update Notification */
.update-notification {
    display: flex;
    gap: 1rem;
    align-items: start;
    padding: 1.5rem;
    background: var(--blue-50, #EFF6FF);
    border-radius: var(--radius);
    border: 1px solid var(--blue-200, #BFDBFE);
    margin-top: 1rem;
}

.update-notification svg {
    flex-shrink: 0;
    color: var(--blue-600, #2563EB);
}

.update-notification p {
    margin: 0;
    color: var(--blue-800, #1E40AF);
}

.update-notification a {
    color: var(--blue-600, #2563EB);
    text-decoration: underline;
}

/* Floating Actions */
.privacy-actions {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    z-index: 50;
}

.action-btn {
    width: 48px;
    height: 48px;
    background: var(--white);
    border: 2px solid var(--gray-200);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: var(--shadow-md);
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.action-btn.print {
    color: var(--primary);
}

.action-btn.download {
    color: var(--green-600, #059669);
}

.action-btn.top {
    color: var(--gray-600);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .responsible-card {
        flex-direction: column;
    }
    
    .officer-info {
        flex-direction: column;
        text-align: center;
    }
    
    .cookie-intro {
        flex-direction: column;
        text-align: center;
    }
    
    .ssl-info {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .privacy-hero {
        padding: 100px 0 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .privacy-nav {
        gap: 0;
    }
    
    .privacy-nav .nav-link {
        padding: 1rem;
        font-size: 0.875rem;
    }
    
    .privacy-nav .nav-link svg {
        display: none;
    }
    
    .privacy-section {
        padding: 2rem 1.5rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .quick-facts {
        grid-template-columns: 1fr;
    }
    
    .data-flow {
        flex-direction: column;
    }
    
    .flow-arrow {
        transform: rotate(90deg);
    }
    
    .rights-grid {
        grid-template-columns: 1fr;
    }
    
    .service-grid {
        grid-template-columns: 1fr;
    }
    
    .privacy-actions {
        bottom: 1rem;
        right: 1rem;
    }
}

/* Print Styles */
@media print {
    body {
        font-size: 11pt;
        line-height: 1.6;
    }
    
    .privacy-hero {
        background: none;
        color: #000;
        padding: 20px 0;
        text-align: left;
    }
    
    .privacy-nav-section,
    .privacy-actions,
    .cookie-settings-btn,
    .right-action {
        display: none;
    }
    
    .privacy-section {
        box-shadow: none;
        border: 1px solid #ddd;
        page-break-inside: avoid;
        margin-bottom: 20px;
    }
    
    .section-title {
        page-break-after: avoid;
    }
    
    a {
        color: #000;
        text-decoration: underline;
    }
    
    .service-link::after,
    .external-link::after {
        content: " (" attr(href) ")";
        font-size: 0.9em;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.privacy-section {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}

/* Focus Visible */
a:focus-visible,
button:focus-visible {
    outline: 2px solid var(--primary);
    outline-offset: 2px;
}

/* Selection */
::selection {
    background: var(--primary);
    color: var(--white);
}
</style>

<script>
/**
 * Privacy Page JavaScript
 * Enhanced functionality for GDPR compliance
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Smooth Navigation =====
        const initNavigation = () => {
            const navLinks = document.querySelectorAll('.privacy-nav .nav-link');
            const sections = document.querySelectorAll('.privacy-section[id]');
            const navHeight = document.querySelector('.privacy-nav-section').offsetHeight;
            const headerHeight = 80; // Adjust based on your header
            
            // Click handler
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    
                    if (targetSection) {
                        const targetPosition = targetSection.offsetTop - navHeight - headerHeight - 20;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Active section tracking
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }, {
                rootMargin: `-${navHeight + headerHeight + 50}px 0px -70% 0px`
            });
            
            sections.forEach(section => observer.observe(section));
        };
        
        // ===== Rights Actions =====
        window.requestInfo = () => {
            showModal('Auskunftsanfrage', 'Ihre Anfrage wird bearbeitet. Wir werden uns innerhalb von 30 Tagen bei Ihnen melden.');
        };
        
        window.requestCorrection = () => {
            showModal('Berichtigungsanfrage', 'Bitte senden Sie uns die zu berichtigenden Daten an datenschutz@safecologne.de');
        };
        
        window.requestDeletion = () => {
            showModal('Löschungsanfrage', 'Ihre Löschungsanfrage wird geprüft. Beachten Sie, dass gesetzliche Aufbewahrungsfristen gelten können.');
        };
        
        window.requestRestriction = () => {
            showModal('Einschränkungsanfrage', 'Die Verarbeitung Ihrer Daten wird eingeschränkt, bis Ihre Anfrage vollständig bearbeitet wurde.');
        };
        
        window.requestPortability = () => {
            showModal('Datenübertragbarkeit', 'Ihre Daten werden in einem maschinenlesbaren Format bereitgestellt.');
        };
        
        window.requestObjection = () => {
            showModal('Widerspruch', 'Ihr Widerspruch wurde registriert. Wir werden die Verarbeitung Ihrer Daten überprüfen.');
        };
        
        // ===== Modal Function =====
        const showModal = (title, message) => {
            const modal = document.createElement('div');
            modal.className = 'privacy-modal';
            modal.innerHTML = `
                <div class="modal-overlay" onclick="closeModal()"></div>
                <div class="modal-content">
                    <h3>${title}</h3>
                    <p>${message}</p>
                    <button class="modal-close" onclick="closeModal()">Verstanden</button>
                </div>
            `;
            document.body.appendChild(modal);
            
            setTimeout(() => modal.classList.add('show'), 10);
        };
        
        window.closeModal = () => {
            const modal = document.querySelector('.privacy-modal');
            if (modal) {
                modal.classList.remove('show');
                setTimeout(() => modal.remove(), 300);
            }
        };
        
        // ===== Cookie Settings =====
        window.openCookieSettings = () => {
            // Trigger your cookie consent manager
            if (typeof window.cookieConsent !== 'undefined') {
                window.cookieConsent.show();
            } else {
                showModal('Cookie-Einstellungen', 'Cookie-Einstellungen werden geladen...');
            }
        };
        
        // ===== Print Function =====
        window.printPrivacy = () => {
            window.print();
        };
        
        // ===== PDF Download =====
        window.downloadPDF = () => {
            // In production, you'd generate a real PDF
            showModal('PDF-Download', 'Die PDF-Version wird generiert und heruntergeladen...');
            
            // Simulate download
            setTimeout(() => {
                const link = document.createElement('a');
                link.href = '/datenschutz-safecologne.pdf';
                link.download = 'Datenschut