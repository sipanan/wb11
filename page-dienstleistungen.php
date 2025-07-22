<?php
/**
 * Template Name: Dienstleistungen (Services)
 * 
 * Elite-tier services page for SafeCologne
 * Designed for maximum conversion and trust
 * 
 * @package SafeCologne
 * @version 6.0.0
 */

get_header(); ?>

<main id="services-main" class="services-page">
    
    <!-- Hero Section -->
    <section class="services-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <video autoplay muted loop playsinline class="hero-video">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/security-hero.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container">
            <div class="hero-content">
                <span class="hero-badge">Seit 2023 in Köln</span>
                <h1 class="hero-title">
                    <span class="title-line">Unsere</span>
                    <span class="title-highlight">Sicherheitsdienstleistungen</span>
                </h1>
                <p class="hero-lead">
                    Bei Safe Cologne verstehen wir Sicherheit nicht nur als Maßnahme, sondern als Haltung. 
                    Wir schützen nicht einfach nur – wir geben Menschen das Gefühl, in jeder Situation 
                    sicher, betreut und wertgeschätzt zu sein.
                </p>
                <div class="hero-features">
                    <div class="feature-item">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                        <span>Höchste Professionalität</span>
                    </div>
                    <div class="feature-item">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <span>Menschliche Intelligenz</span>
                    </div>
                    <div class="feature-item">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span>Vorausschauendes Handeln</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-scroll">
            <span>Entdecken Sie unsere Services</span>
            <svg width="24" height="24" viewBox="0 0 24 24" class="scroll-icon">
                <path fill="currentColor" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
            </svg>
        </div>
    </section>

    <!-- Services Navigation -->
    <section class="services-nav-section">
        <div class="container">
            <nav class="services-nav" aria-label="Services Navigation">
                <button class="nav-item active" data-service="all">
                    <span class="nav-icon">✦</span>
                    <span class="nav-text">Alle Services</span>
                </button>
                <button class="nav-item" data-service="events">
                    <span class="nav-icon">🎭</span>
                    <span class="nav-text">Events</span>
                </button>
                <button class="nav-item" data-service="object">
                    <span class="nav-icon">🏢</span>
                    <span class="nav-text">Objektschutz</span>
                </button>
                <button class="nav-item" data-service="personal">
                    <span class="nav-icon">🛡️</span>
                    <span class="nav-text">Personenschutz</span>
                </button>
                <button class="nav-item" data-service="special">
                    <span class="nav-icon">🔍</span>
                    <span class="nav-text">Spezial</span>
                </button>
            </nav>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-section">
        <div class="container">
            <div class="services-grid">
                
                <!-- Veranstaltungsordner -->
                <article class="service-card" data-category="events" data-aos="fade-up">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/event-security.jpg" 
                             alt="Veranstaltungsordner" 
                             loading="lazy">
                        <div class="service-overlay">
                            <span class="service-badge">Meistgebucht</span>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Veranstaltungsordner</h3>
                        <p class="service-subtitle">Präsenz, die Vertrauen schafft</p>
                        <p class="service-description">
                            Großveranstaltungen sind hochkomplexe Systeme mit vielen Risiken – unsere Veranstaltungsordner 
                            sorgen dafür, dass aus potenziellen Gefahren keine echten Probleme entstehen.
                        </p>
                        <ul class="service-features">
                            <li>Einlasskontrollen & Besucherlenkung</li>
                            <li>§34a GewO geschultes Personal</li>
                            <li>Deeskalation & Erste Hilfe</li>
                            <li>Für Messen, Konzerte, Stadtfeste</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Angebot anfordern</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Sicherheitskräfte für Events -->
                <article class="service-card" data-category="events" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/event-team.jpg" 
                             alt="Sicherheitskräfte für Events" 
                             loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Sicherheitskräfte für Events</h3>
                        <p class="service-subtitle">Sicherheit, die man spürt, aber nicht stört</p>
                        <p class="service-description">
                            Mit hohem taktischem Verständnis und klarer Kommunikationsstruktur übernehmen wir 
                            die komplette Sicherheitskoordination Ihrer Veranstaltung.
                        </p>
                        <ul class="service-features">
                            <li>Personenkontrollen & Backstage-Security</li>
                            <li>VIP-Begleitung & Künstlerschutz</li>
                            <li>Digitale Einsatzplanung & Funkkoordination</li>
                            <li>Professioneller Bereitschaftsdienst</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Beratung vereinbaren</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Parkplatzordner -->
                <article class="service-card" data-category="events" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/parking-security.jpg" 
                             alt="Parkplatzordner" 
                             loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Parkplatzordner</h3>
                        <p class="service-subtitle">Struktur von Anfang an</p>
                        <p class="service-description">
                            Der erste Eindruck entsteht oft bereits auf dem Parkplatz. Unsere Parkplatzordner 
                            sorgen für eine stressfreie Ankunft und geordnete Abreise.
                        </p>
                        <ul class="service-features">
                            <li>Effiziente Verkehrslenkung</li>
                            <li>Schutz vor Vandalismus</li>
                            <li>Freundliche Besucherbetreuung</li>
                            <li>Optimale Flächennutzung</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Jetzt anfragen</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Objekt- & Werkschutz -->
                <article class="service-card featured" data-category="object" data-aos="fade-up">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/object-protection.jpg" 
                             alt="Objekt- & Werkschutz" 
                             loading="lazy">
                        <div class="service-overlay">
                            <span class="service-badge">Rund um die Uhr</span>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Objekt- & Werkschutz</h3>
                        <p class="service-subtitle">Vertrauen durch Präsenz und Technik</p>
                        <p class="service-description">
                            Ob Industrieanlage, Bürokomplex oder Baustelle – unser Objekt- und Werkschutz 
                            bietet rund um die Uhr Sicherheit für Sachwerte, Informationen und Personen.
                        </p>
                        <ul class="service-features">
                            <li>Zutrittskontrollen & Kontrollgänge</li>
                            <li>Schließdienste & Alarmverfolgung</li>
                            <li>Bodycams & GPS-Tracking</li>
                            <li>Digitale Dokumentation</li>
                        </ul>
                        <div class="service-stats">
                            <div class="stat">
                                <span class="stat-number">500+</span>
                                <span class="stat-label">Objekte geschützt</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">99.9%</span>
                                <span class="stat-label">Verfügbarkeit</span>
                            </div>
                        </div>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta primary">
                                <span>Kostenloses Sicherheitsaudit</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- VIP Shuttleservice -->
                <article class="service-card premium" data-category="personal" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/vip-shuttle.jpg" 
                             alt="VIP Shuttleservice" 
                             loading="lazy">
                        <div class="service-overlay">
                            <span class="service-badge gold">Premium Service</span>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">VIP Shuttleservice</h3>
                        <p class="service-subtitle">Exklusivität trifft Sicherheit</p>
                        <p class="service-description">
                            Wenn Diskretion, Komfort und Schutz oberste Priorität haben. Individuelle 
                            Transportlösungen für Prominente, Politiker und Geschäftsleute.
                        </p>
                        <ul class="service-features">
                            <li>Gepanzerte Fahrzeuge verfügbar</li>
                            <li>Geschulte Sicherheitsfahrer</li>
                            <li>Defensives & taktisches Fahren</li>
                            <li>Absolute Diskretion garantiert</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta gold">
                                                                <span>Exklusiv anfragen</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Privatermittlungen -->
                <article class="service-card" data-category="special" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/private-investigation.jpg" 
                             alt="Privatermittlungen" 
                             loading="lazy">
                        <div class="service-overlay">
                            <span class="service-badge">Diskret & Legal</span>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Privatermittlungen</h3>
                        <p class="service-subtitle">Klarheit in sensiblen Fragen</p>
                        <p class="service-description">
                            Es gibt Momente im Leben, in denen Fakten wichtiger sind als Vermutungen. 
                            Wir observieren diskret und sichern Beweise rechtssicher.
                        </p>
                        <ul class="service-features">
                            <li>Betrugsaufklärung & Observation</li>
                            <li>Rechtssichere Beweissicherung</li>
                            <li>Höchste Vertraulichkeit</li>
                            <li>DSGVO-konforme Dokumentation</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Vertraulich anfragen</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Doormen / Türsteher -->
                <article class="service-card" data-category="events" data-aos="fade-up">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/doorman.jpg" 
                             alt="Doormen / Türsteher" 
                             loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Doormen / Türsteher</h3>
                        <p class="service-subtitle">Stilvolle Autorität für Ihre Location</p>
                        <p class="service-description">
                            Ein guter Doorman ist Gastgeber, Schutz und Filter zugleich. 
                            Unsere Türsteher agieren mit Stil, Respekt und klarer Haltung.
                        </p>
                        <ul class="service-features">
                            <li>Professionelle Einlasskontrolle</li>
                            <li>Deeskalation & Konfliktmanagement</li>
                            <li>Hausrecht durchsetzen</li>
                            <li>Gastfreundlich & bestimmt</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Team buchen</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Ladendetektive -->
                <article class="service-card" data-category="special" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/store-detective.jpg" 
                             alt="Ladendetektive" 
                             loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Ladendetektive</h3>
                        <p class="service-subtitle">Sicherheit im Einzelhandel</p>
                        <p class="service-description">
                            Diebstahl verursacht jedes Jahr Millionenverluste. Unsere erfahrenen 
                            Ladendetektive arbeiten verdeckt, professionell und rechtssicher.
                        </p>
                        <ul class="service-features">
                            <li>Verdeckte Observation</li>
                            <li>Rechtssichere Dokumentation</li>
                            <li>Enge Abstimmung mit Personal</li>
                            <li>Präventive Wirkung</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta">
                                <span>Verluste reduzieren</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Personenschutz -->
                <article class="service-card premium" data-category="personal" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/personal-protection.jpg" 
                             alt="Personenschutz" 
                             loading="lazy">
                        <div class="service-overlay">
                            <span class="service-badge gold">Elite Service</span>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Personenschutz</h3>
                        <p class="service-subtitle">Schutz auf höchstem Niveau</p>
                        <p class="service-description">
                            Für gefährdete Personen entwickeln wir individuelle Schutzkonzepte, 
                            die auf Analyse, Prävention und operative Präsenz setzen.
                        </p>
                        <ul class="service-features">
                            <li>Individuelle Schutzkonzepte</li>
                            <li>Speziell ausgebildete Teams</li>
                            <li>Taktik & Krisenkommunikation</li>
                            <li>International einsetzbar</li>
                        </ul>
                        <div class="service-footer">
                            <a href="#contact" class="service-cta gold">
                                <span>Persönliche Beratung</span>
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="container">
            <div class="trust-content">
                <h2 class="trust-title">Warum Safe Cologne?</h2>
                <div class="trust-grid">
                    <div class="trust-item" data-aos="fade-up">
                        <div class="trust-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                            </svg>
                        </div>
                        <h3>15+ Jahre Erfahrung</h3>
                        <p>Seit 2009 schützen wir Menschen, Objekte und Veranstaltungen in Köln und Umgebung</p>
                    </div>
                    <div class="trust-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="trust-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3>Zertifizierte Qualität</h3>
                        <p>Alle Mitarbeiter nach §34a GewO geschult, regelmäßige Fortbildungen garantiert</p>
                    </div>
                    <div class="trust-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="trust-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </div>
                        <h3>500+ Mitarbeiter</h3>
                        <p>Großes Team ermöglicht flexible Einsatzplanung und kurzfristige Verfügbarkeit</p>
                    </div>
                    <div class="trust-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="trust-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <h3>Top Bewertungen</h3>
                        <p>4.9/5 Sterne bei Google, 98% Kundenzufriedenheit, 95% Weiterempfehlungsrate</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title" data-aos="fade-up">Haben wir Sie überzeugt?</h2>
                <p class="cta-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Dann lassen Sie uns gemeinsam Ihr persönliches Sicherheitskonzept entwickeln – 
                    individuell, diskret und effektiv.
                </p>
                <div class="cta-form" data-aos="fade-up" data-aos-delay="200">
                    <form class="quick-contact-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
                        <input type="hidden" name="action" value="quick_service_inquiry">
                        <?php wp_nonce_field('service_inquiry_nonce', 'security'); ?>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Ihr Name *" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Ihre E-Mail *" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="Telefonnummer">
                            </div>
                            <div class="form-group">
                                <select name="service" required>
                                    <option value="">Service wählen *</option>
                                    <option value="event">Veranstaltungssicherheit</option>
                                    <option value="object">Objektschutz</option>
                                    <option value="personal">Personenschutz</option>
                                    <option value="special">Spezialservice</option>
                                    <option value="other">Individuelle Anfrage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group full-width">
                            <textarea name="message" placeholder="Ihre Nachricht" rows="4"></textarea>
                        </div>
                        <div class="form-footer">
                            <div class="form-consent">
                                <label>
                                    <input type="checkbox" name="consent" required>
                                    <span>Ich stimme der Verarbeitung meiner Daten gemäß <a href="/datenschutz" target="_blank">Datenschutzerklärung</a> zu.</span>
                                </label>
                            </div>
                            <button type="submit" class="submit-btn">
                                <span>Anfrage senden</span>
								                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</main>

<style>
/* ===== GOD-TIER SERVICES PAGE STYLES ===== */

/* Variables */
:root {
    --primary: #E2001A;
    --primary-dark: #C2050F;
    --primary-light: #FF1A27;
    --secondary: #1A1A1A;
    --white: #FFFFFF;
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
    --gold: #F59E0B;
    
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.12);
    --shadow-lg: 0 10px 20px rgba(0,0,0,0.12);
    --shadow-xl: 0 20px 40px rgba(0,0,0,0.12);
    
    --radius: 8px;
    --radius-lg: 12px;
    --radius-xl: 16px;
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Base */
.services-page {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--gray-900);
    line-height: 1.6;
    background: var(--gray-50);
}

/* Hero Section */
.services-hero {
    position: relative;
    min-height: 80vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: var(--secondary);
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(227,6,19,0.9) 0%, rgba(26,26,26,0.95) 100%);
}

.hero-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: var(--white);
    max-width: 900px;
    margin: 0 auto;
}

.hero-badge {
    display: inline-block;
    padding: 0.5rem 1.5rem;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 999px;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 2rem;
    backdrop-filter: blur(10px);
}

.hero-title {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 800;
    margin: 0 0 2rem;
    line-height: 1.1;
}

.title-line {
    display: block;
    font-size: 0.7em;
    font-weight: 400;
    opacity: 0.8;
}

.title-highlight {
    display: block;
    background: linear-gradient(135deg, var(--white) 0%, var(--gray-300) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-lead {
    font-size: clamp(1.125rem, 2vw, 1.375rem);
    margin: 0 0 3rem;
    opacity: 0.9;
    line-height: 1.7;
}

.hero-features {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.875rem;
    opacity: 0.8;
}

.hero-scroll {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: var(--white);
    opacity: 0.6;
    font-size: 0.875rem;
}

.scroll-icon {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

/* Services Navigation */
.services-nav-section {
    background: var(--white);
    position: sticky;
    top: 80px;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.services-nav {
    display: flex;
    gap: 0;
    padding: 0;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1.25rem 1.5rem;
    background: none;
    border: none;
    color: var(--gray-600);
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition);
    white-space: nowrap;
    border-bottom: 3px solid transparent;
}

.nav-item:hover {
    background: var(--gray-50);
    color: var(--primary);
}

.nav-item.active {
    color: var(--primary);
    border-bottom-color: var(--primary);
}

.nav-icon {
    font-size: 1.25rem;
}

/* Services Grid */
.services-section {
    padding: 80px 0;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

/* Service Card */
.service-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
}

.service-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.service-card.featured {
    grid-column: span 2;
    background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
    color: var(--white);
}

.service-card.premium {
    border: 2px solid var(--gold);
}

.service-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.service-card:hover .service-image img {
    transform: scale(1.05);
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.6) 100%);
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
}

.service-badge {
    display: inline-block;
    padding: 0.375rem 1rem;
    background: var(--primary);
    color: var(--white);
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.service-badge.gold {
    background: var(--gold);
}

.service-content {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.service-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--gray-900);
}

.service-card.featured .service-title {
    color: var(--white);
}

.service-subtitle {
    font-size: 1rem;
    color: var(--primary);
    margin: 0 0 1rem;
    font-weight: 500;
}

.service-card.featured .service-subtitle {
    color: var(--gold);
}

.service-description {
    color: var(--gray-600);
    margin: 0 0 1.5rem;
    line-height: 1.7;
}

.service-card.featured .service-description {
    color: var(--gray-300);
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 auto;
}

.service-features li {
    position: relative;
    padding-left: 1.75rem;
    margin-bottom: 0.75rem;
    color: var(--gray-700);
}

.service-card.featured .service-features li {
    color: var(--gray-200);
}

.service-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: bold;
}

.service-card.featured .service-features li::before {
    color: var(--gold);
}

.service-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin: 1.5rem 0;
}

.stat {
    text-align: center;
    padding: 1rem;
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius);
}

.stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 800;
    color: var(--gold);
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-400);
}

.service-footer {
    margin-top: auto;
    padding-top: 1.5rem;
}

.service-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.service-cta:hover {
    gap: 0.75rem;
}

.service-cta.primary {
    display: flex;
    justify-content: center;
    padding: 1rem 2rem;
    background: var(--gold);
    color: var(--gray-900);
    border-radius: var(--radius);
}

.service-cta.primary:hover {
    background: var(--gold);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.service-cta.gold {
    color: var(--gold);
}

/* Trust Section */
.trust-section {
    background: var(--white);
    padding: 80px 0;
}

.trust-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    text-align: center;
    margin: 0 0 3rem;
    color: var(--gray-900);
}

/* Trust Grid continued */
.trust-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.trust-item {
    text-align: center;
    padding: 2rem;
}

.trust-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    box-shadow: var(--shadow-lg);
}

.trust-item h3 {
    font-size: 1.25rem;
    margin: 0 0 0.75rem;
    color: var(--gray-900);
}

.trust-item p {
    color: var(--gray-600);
    margin: 0;
    line-height: 1.7;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--gray-900) 0%, var(--secondary) 100%);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
    opacity: 0.3;
}

.cta-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.cta-title {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    color: var(--white);
    margin: 0 0 1rem;
}

.cta-subtitle {
    font-size: 1.25rem;
    color: var(--gray-300);
    margin: 0 0 3rem;
    line-height: 1.7;
}

/* Quick Contact Form */
.cta-form {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: var(--radius-xl);
    padding: 3rem;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    position: relative;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 1rem 1.25rem;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--radius);
    color: var(--white);
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: rgba(255,255,255,0.5);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    background: rgba(255,255,255,0.15);
    border-color: var(--primary);
}

.form-group select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill='%23ffffff' d='M10.293 3.293L6 7.586 1.707 3.293A1 1 0 00.293 4.707l5 5a1 1 0 001.414 0l5-5a1 1 0 10-1.414-1.414z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    margin-top: 2rem;
}

.form-consent {
    flex: 1;
}

.form-consent label {
    display: flex;
    align-items: start;
    gap: 0.75rem;
    color: var(--gray-400);
    font-size: 0.875rem;
    cursor: pointer;
}

.form-consent input[type="checkbox"] {
    width: 18px;
    height: 18px;
    margin-top: 2px;
    cursor: pointer;
}

.form-consent a {
    color: var(--primary);
    text-decoration: underline;
}

.submit-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.submit-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Contact Alternatives */
.cta-alternatives {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.cta-alternatives p {
    color: var(--gray-400);
    margin: 0 0 1.5rem;
}

.contact-options {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.contact-option {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--radius);
    color: var(--white);
    text-decoration: none;
    transition: var(--transition);
}

.contact-option:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
}



/* Responsive Design */
@media (max-width: 1024px) {
    .services-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
    
    .service-card.featured {
        grid-column: span 1;
    }
    
    .form-footer {
        flex-direction: column;
        align-items: stretch;
    }
    
    .submit-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .services-hero {
        min-height: 70vh;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .services-nav {
        justify-content: start;
    }
    
    .nav-text {
        display: none;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .service-card {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .trust-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-form {
        padding: 2rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .contact-options {
        flex-direction: column;
    }
    
    .contact-option {
        width: 100%;
        justify-content: center;
    }
}

/* Print Styles */
@media print {
    .services-hero,
    .services-nav-section,
    .cta-section {
        display: none;
    }
    
    .services-section {
        background: white;
    }
    
    .service-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ddd;
    }
}

/* Animations */
[data-aos] {
    opacity: 0;
    transition-property: transform, opacity;
}

[data-aos="fade-up"] {
    transform: translateY(30px);
}

[data-aos].aos-animate {
    opacity: 1;
    transform: translateY(0);
}

/* Loading State */
.submit-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.submit-btn.loading::after {
    content: '';
    display: inline-block;
    width: 16px;
    height: 16px;
    margin-left: 8px;
    border: 2px solid var(--white);
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Success Message */
.form-success {
    text-align: center;
    padding: 3rem;
    animation: fadeIn 0.5s ease-out;
}

.form-success svg {
    width: 64px;
    height: 64px;
    color: var(--success);
    margin-bottom: 1rem;
}

.form-success h3 {
    font-size: 1.5rem;
    color: var(--white);
    margin: 0 0 1rem;
}

.form-success p {
    color: var(--gray-300);
    margin: 0;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
/**
 * Services Page JavaScript
 * Enhanced functionality and conversions
 */
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Service Filtering =====
        const initFiltering = () => {
            const navItems = document.querySelectorAll('.nav-item');
            const serviceCards = document.querySelectorAll('.service-card');
            
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    const filter = this.dataset.service;
                    
                    // Update active state
                    navItems.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter cards
                    serviceCards.forEach(card => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = 'block';
                            card.classList.add('fade-in');
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    
                    // Update URL without reload
                    const url = new URL(window.location);
                    url.searchParams.set('filter', filter);
                    window.history.pushState({}, '', url);
                });
            });
            
            // Check URL for filter on load
            const urlParams = new URLSearchParams(window.location.search);
            const filter = urlParams.get('filter');
            if (filter) {
                const targetNav = document.querySelector(`[data-service="${filter}"]`);
                if (targetNav) targetNav.click();
            }
        };
        
        // ===== Form Handling =====
        const initForm = () => {
            const form = document.querySelector('.quick-contact-form');
            if (!form) return;
            
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('.submit-btn');
                const originalText = submitBtn.innerHTML;
                
                // Disable and show loading
                submitBtn.disabled = true;
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = '<span>Wird gesendet...</span>';
                
                try {
                    const formData = new FormData(this);
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        // Show success
                        this.innerHTML = `
                            <div class="form-success">
                                <svg viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <h3>Vielen Dank für Ihre Anfrage!</h3>
                                <p>Wir melden uns innerhalb von 24 Stunden bei Ihnen.</p>
                            </div>
                        `;
                        
                        // Track conversion
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'conversion', {
                                'send_to': 'AW-CONVERSION_ID/CONVERSION_LABEL',
                                'value': 1.0,
                                'currency': 'EUR'
                            });
                        }
                        
                        // Redirect after 3 seconds
                        setTimeout(() => {
                            window.location.href = '/danke';
                        }, 3000);
                    } else {
                        throw new Error(result.message || 'Fehler beim Senden');
                    }
                } catch (error) {
                    // Show error
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('loading');
                    submitBtn.innerHTML = originalText;
                    
                    alert('Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut oder rufen Sie uns direkt an.');
                }
            });
            
            // Phone number formatting
            const phoneInput = form.querySelector('input[type="tel"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 4) {
                            value = value;
                        } else if (value.length <= 8) {
                            value = value.slice(0, 4) + ' ' + value.slice(4);
                        } else {
                            value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12);
                        }
                    }
                    e.target.value = value;
                });
            }
        };
        
        // ===== Smooth Scroll =====
        const initSmoothScroll = () => {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const headerHeight = 80;
                        const targetPosition = target.offsetTop - headerHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        };
        
        // ===== Service Card Interactions =====
        const enhanceServiceCards = () => {
            const cards = document.querySelectorAll('.service-card');
            
            cards.forEach(card => {
                // Track card views
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const serviceTitle = entry.target.querySelector('.service-title')?.textContent;
                            
                            // Track view
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'view_item', {
                                    'currency': 'EUR',
                                    'value': 0,
                                    'items': [{
                                        'item_id': serviceTitle,
                                        'item_name': serviceTitle,
                                        'item_category': 'Service'
                                    }]
                                });
                            }
                            
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                
                observer.observe(card);
                
                // Track CTA clicks
                const cta = card.querySelector('.service-cta');
                if (cta) {
                    cta.addEventListener('click', function() {
                        const serviceTitle = card.querySelector('.service-title')?.textContent;
                        
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'select_item', {
                                'item_list_name': 'Services',
                                'items': [{
                                    'item_id': serviceTitle,
                                    'item_name': serviceTitle,
                                    'item_category': 'Service'
                                }]
                            });
                        }
                    });
                }
            });
        };
        
        // ===== Initialize AOS =====
        const initAOS = () => {
            const elements = document.querySelectorAll('[data-aos]');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.aosDelay || 0;
                        setTimeout(() => {
                            entry.target.classList.add('aos-animate');
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });
            
            elements.forEach(el => observer.observe(el));
        };
        
        // ===== Preload Critical Images =====
        const preloadImages = () => {
            const criticalImages = [
                '/assets/images/services/event-security.jpg',
                '/assets/images/services/object-protection.jpg'
            ];
            
            criticalImages.forEach(src => {
                const link = document.createElement('link');
                link.rel = 'preload';
                link.as = 'image';
                link.href = src;
                document.head.appendChild(link);
            });
        };
        
        // ===== Service Recommendation Engine =====
        const initRecommendations = () => {
            // Simple recommendation based on viewing patterns
            const viewedServices = [];
            
            document.querySelectorAll('.service-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const category = this.dataset.category;
                    if (!viewedServices.includes(category)) {
                        viewedServices.push(category);
                    }
                    
                    // After viewing 3 services, show personalized CTA
                    if (viewedServices.length >= 3) {
                        showPersonalizedCTA();
                    }
                });
            });
        };
        
        const showPersonalizedCTA = () => {
            // Create floating recommendation
            const recommendation = document.createElement('div');
            recommendation.className = 'personalized-recommendation';
            recommendation.innerHTML = `
                <div class="recommendation-content">
                    <h4>Kostenlose Sicherheitsberatung</h4>
                    <p>Basierend auf Ihrem Interesse erstellen wir gerne ein individuelles Konzept.</p>
                    <button class="recommendation-cta">Jetzt Termin vereinbaren</button>
                    <button class="recommendation-close">×</button>
                </div>
            `;
            
            document.body.appendChild(recommendation);
            
            // Add styles
            const style = document.createElement('style');
            style.textContent = `
                .personalized-recommendation {
                    position: fixed;
                    bottom: 100px;
                    right: 2rem;
                    background: var(--white);
                    border-radius: var(--radius-lg);
                    box-shadow: var(--shadow-xl);
                    padding: 1.5rem;
                    max-width: 300px;
                    z-index: 150;
                    animation: slideIn 0.5s ease-out;
                }
                
                @keyframes slideIn {
                    from { transform: translateX(100%); }
                    to { transform: translateX(0); }
                }
                
                .recommendation-content h4 {
                    margin: 0 0 0.5rem;
                    color: var(--gray-900);
                }
                
                .recommendation-content p {
                    margin: 0 0 1rem;
                    color: var(--gray-600);
                    font-size: 0.875rem;
                }
                
                .recommendation-cta {
                    width: 100%;
                    padding: 0.75rem;
                    background: var(--primary);
                    color: var(--white);
                    border: none;
                    border-radius: var(--radius);
                    font-weight: 600;
                    cursor: pointer;
                }
                
                .recommendation-close {
                    position: absolute;
                    top: 0.5rem;
                    right: 0.5rem;
                    background: none;
                    border: none;
                    font-size: 1.5rem;
                    color: var(--gray-400);
                    cursor: pointer;
                }
            `;
            document.head.appendChild(style);
            
            // Handle close
            recommendation.querySelector('.recommendation-close').addEventListener('click', () => {
                recommendation.remove();
            });
            
            // Handle CTA
            recommendation.querySelector('.recommendation-cta').addEventListener('click', () => {
                document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
                recommendation.remove();
            });
        };
        
        
        // ===== Initialize Everything =====
        initFiltering();
        initForm();
        initSmoothScroll();
        enhanceServiceCards();
        initAOS();
        preloadImages();
        initRecommendations();
    });
})();
</script>

<?php get_footer(); ?>