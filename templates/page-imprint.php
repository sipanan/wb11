<?php
/**
 * Template Name: Impressum
 * 
 * Elite-tier legal page for SafeCologne
 * Compliant with German law, GDPR, and optimized for trust
 * 
 * @package SafeCologne
 * @version 5.0.0
 */

get_header(); ?>

<main id="impressum-main" class="legal-page impressum-page">
    
    <!-- Hero Section -->
    <section class="legal-hero">
        <div class="container">
            <div class="legal-hero-content">
                <h1 class="legal-title">Impressum</h1>
                <p class="legal-subtitle">Rechtliche Informationen gemäß § 5 TMG</p>
                <nav class="legal-breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><span aria-current="page">Impressum</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="legal-nav-section">
        <div class="container">
            <div class="legal-nav-wrapper">
                <h2 class="sr-only">Schnellnavigation</h2>
                <nav class="legal-nav">
                    <a href="#unternehmen" class="nav-link">Unternehmen</a>
                    <a href="#kontakt" class="nav-link">Kontakt</a>
                    <a href="#register" class="nav-link">Registerdaten</a>
                    <a href="#erlaubnisse" class="nav-link">Erlaubnisse</a>
                    <a href="#haftung" class="nav-link">Haftung</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="legal-content">
        <div class="container">
            <div class="content-grid">
                <!-- Main Column -->
                <div class="main-content">
                    
                    <!-- Company Information -->
                    <section id="unternehmen" class="content-section">
                        <h2 class="section-title">Angaben gemäß § 5 TMG</h2>
                        <div class="info-card">
                            <div class="company-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/safe-cologne-logo.svg" 
                                     alt="Safe Cologne Logo" 
                                     width="200" 
                                     height="60">
                            </div>
                            <div class="company-info">
                                <h3>Safe Cologne SecUG (haftungsbeschränkt)</h3>
                                <p class="company-type">Sicherheitsdienste</p>
                                <address>
                                    <span class="address-line">Subbelrather Str. 15A</span>
                                    <span class="address-line">50823 Köln</span>
                                    <span class="address-line">Deutschland</span>
                                </address>
                            </div>
                        </div>
                        
                        <div class="representative-info">
                            <h3>Vertreten durch</h3>
                            <div class="person-card">
                                <div class="person-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                </div>
                                <div class="person-details">
                                    <p class="person-title">Geschäftsführer</p>
                                    <p class="person-name">Sipan Nadir Askar</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Contact Information -->
                    <section id="kontakt" class="content-section">
                        <h2 class="section-title">Kontakt</h2>
                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <p class="contact-label">Telefon</p>
                                    <a href="tel:+4922165058801" class="contact-link">0221 65058801</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14.4 6L14 4H5v17h2v-7h5.6l.4 2h7V6z"/>
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <p class="contact-label">Telefax</p>
                                    <a href="tel:+4922165058802" class="contact-link">0221 65058802</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <p class="contact-label">E-Mail</p>
                                    <a href="mailto:info@safecologne.de" class="contact-link">info@safecologne.de</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <p class="contact-label">Website</p>
                                    <a href="https://www.safecologne.de" class="contact-link">www.safecologne.de</a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Registration & Legal -->
                    <section id="register" class="content-section">
                        <h2 class="section-title">Registereintrag & Steuernummer</h2>
                        <div class="legal-grid">
                            <div class="legal-item">
                                <h3>Handelsregister</h3>
                                <dl>
                                    <dt>Registergericht:</dt>
                                    <dd>Amtsgericht Köln</dd>
                                    <dt>Registernummer:</dt>
                                    <dd>HRB 999999</dd>
                                </dl>
                            </div>
                            
                            <div class="legal-item">
                                <h3>Umsatzsteuer-ID</h3>
                                <p>Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz:</p>
                                <p class="highlight-text">DE999999999</p>
                            </div>
                        </div>
                    </section>

                    <!-- Licenses & Permissions -->
                    <section id="erlaubnisse" class="content-section">
                        <h2 class="section-title">Erlaubnisse & Genehmigungen</h2>
                        
                        <div class="license-card">
                            <div class="license-header">
                                <svg width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                                <h3>Bewachungserlaubnis</h3>
                            </div>
                            <div class="license-content">
                                <p>Erlaubnis nach § 34a GewO erteilt durch:</p>
                                <address>
                                    <strong>Stadt Köln – Ordnungsamt</strong><br>
                                    Ottoplatz 1<br>
                                    50679 Köln
                                </address>
                                <p class="license-number">Erlaubnisnummer: KÖ-34a-2023-001</p>
                            </div>
                        </div>

                        <div class="regulations-section">
                            <h3>Berufsrechtliche Regelungen</h3>
                            <div class="info-box">
                                <p><strong>Berufsbezeichnung:</strong> Sicherheitsfachkraft</p>
                                <p><strong>Zuständige Kammer:</strong> IHK Köln</p>
                                <p><strong>Verliehen in:</strong> Deutschland</p>
                            </div>
                            
                            <h4>Es gelten folgende berufsrechtliche Regelungen:</h4>
                            <ul class="regulations-list">
                                <li>
                                    <span class="regulation-icon">§</span>
                                    <div>
                                        <strong>§ 34a Gewerbeordnung (GewO)</strong>
                                        <p>Bewachungsgewerbe</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="regulation-icon">§</span>
                                    <div>
                                        <strong>Bewachungsverordnung (BewachV)</strong>
                                        <p>Verordnung über das Bewachungsgewerbe</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="regulation-icon">§</span>
                                    <div>
                                        <strong>DGUV Vorschrift 23</strong>
                                        <p>Wach- und Sicherungsdienste</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <!-- Insurance -->
                    <section class="content-section">
                        <h2 class="section-title">Betriebshaftpflichtversicherung</h2>
                        <div class="insurance-card">
                            <div class="insurance-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                                </svg>
                            </div>
                            <div class="insurance-details">
                                <p class="insurance-label">Versicherungsschutz besteht bei:</p>
                                <p class="insurance-company">[Name der Versicherung]</p>
                                <p class="insurance-address">[Adresse der Versicherung]</p>
                                <p class="insurance-coverage">
                                    <strong>Geltungsbereich:</strong> Deutschland<br>
                                    <strong>Deckungssumme:</strong> 10 Mio. EUR
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Dispute Resolution -->
                    <section class="content-section">
                        <h2 class="section-title">Streitschlichtung</h2>
                        <div class="dispute-info">
                            <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:</p>
                            <a href="https://ec.europa.eu/consumers/odr/" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="external-link">
                                https://ec.europa.eu/consumers/odr/
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                </svg>
                            </a>
                            <p>Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>
                            <div class="notice-box">
                                <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
                            </div>
                        </div>
                    </section>

                    <!-- Liability -->
                    <section id="haftung" class="content-section">
                        <h2 class="section-title">Haftungsausschluss</h2>
                        
                        <div class="liability-section">
                            <h3>Haftung für Inhalte</h3>
                            <p>Als Diensteanbieter sind wir gemäß § 7 Abs. 1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
                            <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>
                        </div>
                        
                        <div class="liability-section">
                            <h3>Haftung für Links</h3>
                            <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p>
                            <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>
                        </div>
                        
                        <div class="liability-section">
                            <h3>Urheberrecht</h3>
                            <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.</p>
                            <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>
                        </div>
                    </section>

                    <!-- Additional Info -->
                    <section class="content-section">
                        <h2 class="section-title">Weitere Informationen</h2>
                        <div class="info-grid">
                            <div class="info-card-small">
                                <h3>Datenschutz</h3>
                                <p>Informationen zum Datenschutz finden Sie in unserer</p>
                                <a href="<?php echo home_url('/datenschutz'); ?>" class="link-button">
                                    Datenschutzerklärung
                                    <svg width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/>
                                    </svg>
                                </a>
                            </div>
                            
                            <div class="info-card-small">
                                <h3>AGB</h3>
                                <p>Unsere Allgemeinen Geschäftsbedingungen</p>
                                <a href="<?php echo home_url('/agb'); ?>" class="link-button">
                                    Zu den AGB
                                    <svg width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>

                    <!-- Last Updated -->
                    <div class="last-updated">
                        <p>Stand: <?php echo date_i18n('d. F Y'); ?></p>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="sidebar">
                    <!-- Trust Badge -->
                    <div class="trust-widget">
                        <div class="trust-header">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"/>
                            </svg>
                            <h3>Ihre Sicherheit</h3>
                        </div>
                        <ul class="trust-list">
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/>
                                </svg>
                                <span>Lizenziertes Unternehmen</span>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/>
                                </svg>
                                <span>Geprüfte Mitarbeiter</span>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/>
                                </svg>
                                <span>Versichert bis 10 Mio. €</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Contact -->
                    <div class="quick-contact-widget">
                        <h3>Schnellkontakt</h3>
                        <p>Bei Fragen zum Impressum:</p>
                        <a href="tel:+4922165058801" class="contact-button">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            0221 65058801
                        </a>
                        <a href="mailto:info@safecologne.de" class="contact-button secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            E-Mail senden
                        </a>
                    </div>

                    <!-- Download -->
                    <div class="download-widget">
                        <h3>Download</h3>
                        <p>Impressum als PDF</p>
                        <button class="download-button" onclick="window.print()">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                            </svg>
                            PDF herunterladen
                        </button>
                    </div>

                    <!-- Certificate Preview -->
                    <div class="certificate-widget">
                        <h3>Zertifikate</h3>
                        <div class="certificate-preview">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/34a-certificate-thumb.jpg" 
                                 alt="§34a Zertifikat" 
                                 loading="lazy">
                            <p>§34a Bewachungserlaubnis</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

</main>

<style>
/* ===== GOD-TIER IMPRESSUM STYLES ===== */

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
    
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.12);
    --shadow-lg: 0 10px 20px rgba(0,0,0,0.12);
    
    --radius: 8px;
    --radius-lg: 12px;
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Base Styles */
.legal-page {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--gray-900);
    line-height: 1.7;
    background: var(--gray-50);
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.legal-hero {
    background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
    color: var(--white);
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.legal-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
    pointer-events: none;
}

.legal-hero-content {
    position: relative;
    z-index: 1;
}

.legal-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin: 0 0 1rem;
    letter-spacing: -0.02em;
}

.legal-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin: 0 0 2rem;
}

.legal-breadcrumb ol {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.875rem;
}

.legal-breadcrumb li:not(:last-child)::after {
    content: '/';
    margin: 0 0.75rem;
    opacity: 0.5;
}

.legal-breadcrumb a {
    color: var(--white);
    text-decoration: none;
    opacity: 0.7;
    transition: var(--transition);
}

.legal-breadcrumb a:hover {
    opacity: 1;
}

/* Navigation Section */
.legal-nav-section {
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
    position: sticky;
    top: 80px;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.legal-nav {
    display: flex;
    gap: 2rem;
    padding: 1.5rem 0;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.nav-link {
    color: var(--gray-600);
    text-decoration: none;
    font-weight: 500;
    white-space: nowrap;
    padding: 0.5rem 0;
    border-bottom: 2px solid transparent;
    transition: var(--transition);
}

.nav-link:hover,
.nav-link:focus {
    color: var(--primary);
    border-bottom-color: var(--primary);
}

/* Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3rem;
    padding: 3rem 0;
}

/* Main Content */
.content-section {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 2.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
}

.section-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin: 0 0 1.5rem;
    color: var(--gray-900);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.section-title::before {
    content: '';
    width: 4px;
    height: 1.5rem;
    background: var(--primary);
    border-radius: 2px;
}

/* Info Card */
.info-card {
    display: flex;
    gap: 2rem;
    align-items: start;
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    margin-bottom: 2rem;
}

.company-logo img {
    max-width: 200px;
    height: auto;
}

.company-info h3 {
    font-size: 1.5rem;
    margin: 0 0 0.5rem;
    color: var(--gray-900);
}

.company-type {
    color: var(--primary);
    font-weight: 500;
    margin: 0 0 1rem;
}

address {
    font-style: normal;
}

.address-line {
    display: block;
    color: var(--gray-700);
}

/* Person Card */
.person-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    border-left: 4px solid var(--primary);
}

.person-icon {
    width: 48px;
    height: 48px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.person-title {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0;
}

.person-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0;
    color: var(--gray-900);
}

/* Contact Grid */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.contact-item {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    transition: var(--transition);
}

.contact-item:hover {
    background: var(--gray-100);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.contact-icon {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: var(--white);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0 0 0.25rem;
}

.contact-link {
    color: var(--gray-900);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.contact-link:hover {
    color: var(--primary);
}

/* Legal Grid */
.legal-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.legal-item {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
}

.legal-item h3 {
    font-size: 1.125rem;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.legal-item dl {
    margin: 0;
}

.legal-item dt {
    font-weight: 600;
    color: var(--gray-700);
    margin: 0.5rem 0 0.25rem;
}

.legal-item dd {
    margin: 0 0 0.5rem;
    color: var(--gray-600);
}

.highlight-text {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary);
    font-family: 'Courier New', monospace;
}

/* License Card */
.license-card {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: var(--white);
    border-radius: var(--radius-lg);
    padding: 2rem;
    margin-bottom: 2rem;
}

.license-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.license-header svg {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.license-header h3 {
    font-size: 1.5rem;
    margin: 0;
}

.license-content {
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius);
    padding: 1.5rem;
    backdrop-filter: blur(10px);
}

.license-content address {
    margin: 1rem 0;
}

.license-number {
    font-weight: 700;
    font-size: 1.125rem;
    margin-top: 1rem;
}

/* Regulations */
.regulations-section {
    margin-top: 2rem;
}

.info-box {
    background: var(--gray-50);
    padding: 1.5rem;
    border-radius: var(--radius);
    margin-bottom: 1.5rem;
}

.info-box p {
    margin: 0.5rem 0;
}

.regulations-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.regulations-list li {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    margin-bottom: 1rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    transition: var(--transition);
}

.regulations-list li:hover {
    background: var(--gray-100);
    transform: translateX(4px);
}

.regulation-icon {
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    flex-shrink: 0;
}

.regulations-list strong {
    display: block;
    color: var(--gray-900);
    margin-bottom: 0.25rem;
}

.regulations-list p {
    margin: 0;
    color: var(--gray-600);
    font-size: 0.875rem;
}

/* Insurance Card */
.insurance-card {
    display: flex;
    gap: 2rem;
    align-items: center;
    padding: 2rem;
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
    border-radius: var(--radius-lg);
    border: 2px solid var(--gray-200);
}

.insurance-icon {
    width: 80px;
    height: 80px;
    background: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    box-shadow: var(--shadow-md);
    flex-shrink: 0;
}

.insurance-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0 0 0.5rem;
}

.insurance-company {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 0.5rem;
}

.insurance-coverage {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-300);
}

/* Dispute Section */
.dispute-info {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
}

.external-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    background: var(--white);
    border-radius: var(--radius);
    margin: 1rem 0;
    transition: var(--transition);
}

.external-link:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.notice-box {
    background: var(--yellow-50, #FFFBEB);
    border: 1px solid var(--yellow-200, #FDE68A);
    border-radius: var(--radius);
    padding: 1rem;
    margin-top: 1rem;
}

.notice-box p {
    margin: 0;
    color: var(--yellow-800, #92400E);
}

/* Liability Sections */
.liability-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.liability-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.liability-section h3 {
    font-size: 1.25rem;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.liability-section p {
    color: var(--gray-700);
    margin: 0 0 1rem;
}

/* Info Grid */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.info-card-small {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius);
    text-align: center;
}

.info-card-small h3 {
    font-size: 1.125rem;
    margin: 0 0 0.5rem;
}

.info-card-small p {
    color: var(--gray-600);
    margin: 0 0 1rem;
}

.link-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    background: var(--white);
    border: 2px solid var(--primary);
    border-radius: var(--radius);
    transition: var(--transition);
}

.link-button:hover {
    background: var(--primary);
    color: var(--white);
}

/* Last Updated */
.last-updated {
    text-align: center;
    padding: 2rem;
    color: var(--gray-500);
    font-size: 0.875rem;
}

/* Sidebar Widgets */
.sidebar {
    position: sticky;
    top: 180px;
    height: fit-content;
}

.sidebar > div {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-sm);
}

/* Trust Widget */
.trust-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.trust-header svg {
    color: var(--primary);
}

.trust-header h3 {
    font-size: 1.125rem;
    margin: 0;
}

.trust-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.trust-list li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0;
    color: var(--gray-700);
}

.trust-list svg {
    color: var(--green-500, #10B981);
    flex-shrink: 0;
}

/* Quick Contact Widget */
.quick-contact-widget h3 {
    font-size: 1.125rem;
    margin: 0 0 0.5rem;
}

.quick-contact-widget p {
    color: var(--gray-600);
    margin: 0 0 1rem;
    font-size: 0.875rem;
}

.contact-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    width: 100%;
    padding: 0.875rem;
    background: var(--primary);
    color: var(--white);
    text-decoration: none;
    font-weight: 600;
    border-radius: var(--radius);
    margin-bottom: 0.75rem;
    transition: var(--transition);
}

.contact-button:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.contact-button.secondary {
    background: var(--gray-100);
    color: var(--gray-900);
}

.contact-button.secondary:hover {
    background: var(--gray-200);
}

/* Download Widget */
.download-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    width: 100%;
    padding: 0.875rem;
    background: var(--gray-900);
    color: var(--white);
    border: none;
    font-weight: 600;
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
}

.download-button:hover {
    background: var(--gray-800);
    transform: translateY(-2px);
}

/* Certificate Widget */
.certificate-preview {
    background: var(--gray-50);
    border-radius: var(--radius);
    padding: 1rem;
    text-align: center;
}

.certificate-preview img {
    width: 100%;
    height: auto;
    border-radius: var(--radius);
    margin-bottom: 0.5rem;
}

.certificate-preview p {
    margin: 0;
    font-size: 0.875rem;
    color: var(--gray-600);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
    
    .sidebar {
        position: static;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .legal-hero {
        padding: 100px 0 60px;
    }
    
    .legal-title {
        font-size: 2rem;
    }
    
    .legal-nav {
        gap: 1rem;
    }
    
    .content-section {
        padding: 1.5rem;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
    }
    
    .info-card {
        flex-direction: column;
        text-align: center;
    }
    
    .insurance-card {
        flex-direction: column;
        text-align: center;
    }
}

/* Print Styles */
@media print {
    body {
        font-size: 12pt;
        line-height: 1.5;
    }
    
    .legal-hero {
        background: none;
        color: #000;
        padding: 20px 0;
        page-break-after: avoid;
    }
    
    .legal-nav-section,
    .sidebar,
    .download-button,
    .contact-button {
        display: none;
    }
    
    .content-section {
        box-shadow: none;
        border: 1px solid #ddd;
        page-break-inside: avoid;
    }
    
    .section-title {
        page-break-after: avoid;
    }
    
    a {
        color: #000;
        text-decoration: underline;
    }
    
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

.content-section {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.content-section:nth-child(1) { animation-delay: 0.1s; }
.content-section:nth-child(2) { animation-delay: 0.2s; }
.content-section:nth-child(3) { animation-delay: 0.3s; }
.content-section:nth-child(4) { animation-delay: 0.4s; }

/* Accessibility */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

/* Focus Styles */
a:focus-visible,
button:focus-visible {
    outline: 2px solid var(--primary);
    outline-offset: 2px;
}

/* Scroll Behavior */
html {
    scroll-behavior: smooth;
}

/* Selection */
::selection {
    background: var(--primary);
    color: var(--white);
}

/* Loading State */
.content-section.loading {
    position: relative;
    overflow: hidden;
}

.content-section.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    to {
        left: 100%;
    }
}
</style>

<script>
/**
 * Impressum Page JavaScript
 * Enhanced interactivity and UX
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Smooth Scroll Navigation =====
        const initSmoothScroll = () => {
            const navLinks = document.querySelectorAll('.nav-link');
            const headerHeight = 180; // Adjust based on your sticky nav height
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    
                    if (targetSection) {
                        const targetPosition = targetSection.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Update active state
                        navLinks.forEach(l => l.classList.remove('active'));
                        this.classList.add('active');
                    }
                });
            });
        };
        
        // ===== Active Section Tracking =====
        const trackActiveSection = () => {
            const sections = document.querySelectorAll('.content-section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                            } else {
                                link.classList.remove('active');
                            }
                        });
                    }
                });
            }, {
                rootMargin: '-20% 0px -70% 0px'
            });
            
            sections.forEach(section => observer.observe(section));
        };
        
        // ===== Copy to Clipboard =====
        const addCopyButtons = () => {
            const copyableElements = [
                { selector: '.contact-link[href^="tel:"]', label: 'Telefonnummer' },
                { selector: '.contact-link[href^="mailto:"]', label: 'E-Mail' },
                { selector: '.highlight-text', label: 'Nummer' }
            ];
            
            copyableElements.forEach(({ selector, label }) => {
                document.querySelectorAll(selector).forEach(element => {
                    const wrapper = document.createElement('span');
                    wrapper.style.position = 'relative';
                    wrapper.style.display = 'inline-block';
                    
                    element.parentNode.insertBefore(wrapper, element);
                    wrapper.appendChild(element);
                    
                    const copyBtn = document.createElement('button');
                    copyBtn.className = 'copy-btn';
                    copyBtn.innerHTML = `
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                        </svg>
                    `;
                    copyBtn.title = `${label} kopieren`;
                    copyBtn.style.cssText = `
                        position: absolute;
                        right: -30px;
                        top: 50%;
                        transform: translateY(-50%);
                        background: var(--gray-100);
                        border: none;
                        border-radius: 4px;
                        padding: 4px;
                        cursor: pointer;
                        opacity: 0;
                        transition: opacity 0.2s;
                    `;
                    
                    wrapper.appendChild(copyBtn);
                    
                    wrapper.addEventListener('mouseenter', () => {
                        copyBtn.style.opacity = '1';
                    });
                    
                    wrapper.addEventListener('mouseleave', () => {
                        copyBtn.style.opacity = '0';
                    });
                    
                    copyBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        
                        let textToCopy = element.textContent.trim();
                        if (element.href) {
                            textToCopy = element.href.replace(/^(tel:|mailto:)/, '');
                        }
                        
                        navigator.clipboard.writeText(textToCopy).then(() => {
                            const originalHTML = copyBtn.innerHTML;
                            copyBtn.innerHTML = '✓';
                            copyBtn.style.color = 'var(--green-500)';
                            
                            setTimeout(() => {
                                copyBtn.innerHTML = originalHTML;
                                copyBtn.style.color = '';
                            }, 2000);
                        });
                    });
                });
            });
        };
        
        // ===== Enhanced Print =====
        const enhancePrint = () => {
            const printBtn = document.querySelector('.download-button');
            if (!printBtn) return;
            
            printBtn.addEventListener('click', () => {
                // Add print-specific class
                document.body.classList.add('printing');
                
                // Create print header
                const printHeader = document.createElement('div');
                printHeader.className = 'print-header';
                printHeader.innerHTML = `
                    <h1>Impressum - Safe Cologne SecUG</h1>
                    <p>Ausgedruckt am: ${new Date().toLocaleDateString('de-DE', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })}</p>
                `;
                
                // Window print
                window.print();
                
                // Clean up
                setTimeout(() => {
                    document.body.classList.remove('printing');
                }, 100);
            });
        };
        
        // ===== Collapse/Expand Sections =====
        const makeCollapsible = () => {
            const sections = document.querySelectorAll('.liability-section');
            
            sections.forEach(section => {
                const heading = section.querySelector('h3');
                if (!heading) return;
                
                heading.style.cursor = 'pointer';
                heading.style.userSelect = 'none';
                
                const indicator = document.createElement('span');
                indicator.innerHTML = '▼';
                indicator.style.cssText = `
                    float: right;
                    transition: transform 0.3s;
                    font-size: 0.8em;
                `;
                heading.appendChild(indicator);
                
                let isExpanded = true;
                const content = Array.from(section.children).filter(child => child !== heading);
                
                heading.addEventListener('click', () => {
                    isExpanded = !isExpanded;
                    
                    content.forEach(element => {
                        element.style.display = isExpanded ? 'block' : 'none';
                    });
                    
                    indicator.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(-90deg)';
                });
            });
        };
        
        // ===== Search Functionality =====
        const addSearch = () => {
            const searchBox = document.createElement('div');
            searchBox.className = 'search-widget';
            searchBox.innerHTML = `
                <input type="search" placeholder="Im Impressum suchen..." class="search-input">
                <div class="search-results"></div>
            `;
            
            const sidebar = document.querySelector('.sidebar');
            if (sidebar && sidebar.firstChild) {
                sidebar.insertBefore(searchBox, sidebar.firstChild);
            }
            
            const searchInput = searchBox.querySelector('.search-input');
            const searchResults = searchBox.querySelector('.search-results');
            
            searchInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase();
                if (query.length < 2) {
                    searchResults.innerHTML = '';
                    return;
                }
                
                const contentSections = document.querySelectorAll('.content-section');
                const results = [];
                
                contentSections.forEach(section => {
                    const text = section.textContent.toLowerCase();
                    if (text.includes(query)) {
                        const title = section.querySelector('.section-title, h3')?.textContent || 'Abschnitt';
                        const preview = text.substring(text.indexOf(query) - 20, text.indexOf(query) + 50);
                        results.push({
                            title,
                            preview: `...${preview}...`,
                            element: section
                        });
                    }
                });
                
                if (results.length > 0) {
                    searchResults.innerHTML = results.map(result => `
                        <div class="search-result-item" data-section="${result.title}">
                            <strong>${result.title}</strong>
                            <p>${result.preview}</p>
                        </div>
                    `).join('');
                    
                    searchResults.querySelectorAll('.search-result-item').forEach((item, index) => {
                        item.addEventListener('click', () => {
                            results[index].element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            results[index].element.style.animation = 'highlight 2s ease-out';
                        });
                    });
                } else {
                    searchResults.innerHTML = '<p class="no-results">Keine Ergebnisse gefunden</p>';
                }
            });
        };
        
        // ===== Initialize Everything =====
        initSmoothScroll();
        trackActiveSection();
        addCopyButtons();
        enhancePrint();
        makeCollapsible();
        addSearch();
        
        // Add highlight animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes highlight {
                0%, 100% { background-color: transparent; }
                50% { background-color: rgba(227, 6, 19, 0.1); }
            }
            
            .nav-link.active {
                color: var(--primary);
                border-bottom-color: var(--primary);
            }
            
            .search-widget {
                background: var(--white);
                border-radius: var(--radius-lg);
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                box-shadow: var(--shadow-sm);
            }
            
            .search-input {
                width: 100%;
                padding: 0.75rem;
                border: 2px solid var(--gray-200);
                border-radius: var(--radius);
                font-size: 0.875rem;
            }
            
            .search-results {
                margin-top: 1rem;
            }
            
            .search-result-item {
                padding: 0.75rem;
                background: var(--gray-50);
                border-radius: var(--radius);
                margin-bottom: 0.5rem;
                cursor: pointer;
                transition: var(--transition);
            }
            
            .search-result-item:hover {
                background: var(--gray-100);
            }
            
            .search-result-item p {
                margin: 0.25rem 0 0;
                font-size: 0.75rem;
                color: var(--gray-600);
            }
            
            .no-results {
                text-align: center;
                color: var(--gray-500);
                font-size: 0.875rem;
            }
            
            .print-header {
                display: none;
            }
            
            @media print {
                .print-header {
                    display: block;
                    text-align: center;
                    margin-bottom: 2rem;
                    border-bottom: 2px solid #000;
                    padding-bottom: 1rem;
                }
            }
        `;
        document.head.appendChild(style);
    });
})();
</script>

<?php get_footer(); ?>