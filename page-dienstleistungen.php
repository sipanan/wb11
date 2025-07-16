<?php
/**
 * Template Name: Dienstleistungen
 * Simple Services Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Unsere Dienstleistungen</h1>
        <p class="hero-subtitle">Professionelle Sicherheitslösungen für jeden Bedarf</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 3rem;">
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Objektschutz</h3>
                <p>Professioneller Schutz für Ihre Gebäude, Anlagen und Betriebsstätten. Wir sichern Ihr Eigentum rund um die Uhr.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Zugangskontrolle</li>
                    <li>Streifendienst</li>
                    <li>Alarmverfolgung</li>
                    <li>Brandschutz</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Personenschutz</h3>
                <p>Diskreter und professioneller Schutz für Personen in besonderen Situationen oder mit erhöhtem Schutzbedarf.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Personenschutz</li>
                    <li>Begleitschutz</li>
                    <li>Gefährdungsanalyse</li>
                    <li>Sicherheitsberatung</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Veranstaltungssicherheit</h3>
                <p>Sicherheit bei Events, Messen, Konzerten und anderen Veranstaltungen. Für einen reibungslosen Ablauf.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Einlasskontrollen</li>
                    <li>Crowd Management</li>
                    <li>Sicherheitskonzepte</li>
                    <li>Notfallmanagement</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-video"></i>
                </div>
                <h3>Videoüberwachung</h3>
                <p>Moderne Überwachungstechnik für maximale Sicherheit. Installation, Wartung und Überwachung aus einer Hand.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Kamerainstallation</li>
                    <li>Live-Überwachung</li>
                    <li>Aufzeichnung</li>
                    <li>Wartung & Service</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-car"></i>
                </div>
                <h3>Werttransport</h3>
                <p>Sicherer Transport von Wertsachen, Geld und anderen schützenswerten Gütern mit gepanzerten Fahrzeugen.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Geldtransport</li>
                    <li>Werttransport</li>
                    <li>Depot-Service</li>
                    <li>Sicherheitsfahrzeuge</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
            <div class="service-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: var(--transition);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3>Sicherheitsberatung</h3>
                <p>Individuelle Beratung und Entwicklung von Sicherheitskonzepten für Ihr Unternehmen oder Ihre Immobilie.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem; color: var(--text-light);">
                    <li>Sicherheitsanalyse</li>
                    <li>Konzepterstellung</li>
                    <li>Risikobewertung</li>
                    <li>Optimierung</li>
                </ul>
                <a href="/kontakt/" class="btn" style="margin-top: 1rem;">Angebot anfordern</a>
            </div>
            
        </div>
    </div>
</section>

<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Warum SafeCologne?</h2>
        <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>24/7 Verfügbarkeit</h3>
                <p>Rund um die Uhr erreichbar und einsatzbereit für Ihre Sicherheit.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Zertifizierte Qualität</h3>
                <p>Alle unsere Mitarbeiter sind professionell ausgebildet und zertifiziert.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Persönlicher Service</h3>
                <p>Individuelle Betreuung und auf Ihre Bedürfnisse zugeschnittene Lösungen.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2 class="section-title">Bereit für mehr Sicherheit?</h2>
            <p class="section-subtitle">
                Lassen Sie uns gemeinsam die beste Sicherheitslösung für Ihre Anforderungen finden. 
                Kontaktieren Sie uns für eine kostenlose Beratung.
            </p>
            <a href="/kontakt/" class="btn" style="margin-right: 1rem;">Kostenlose Beratung</a>
            <a href="tel:022165058801" class="btn btn-outline">0221 6505 8801</a>
        </div>
    </div>
</section>

<style>
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.service-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: var(--transition);
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.service-card h3 {
    margin: 0 0 1rem 0;
    color: var(--text-dark);
}

.service-card p {
    margin-bottom: 1rem;
    color: var(--text-light);
}

.service-card ul {
    margin: 1rem 0;
    padding-left: 1.5rem;
    color: var(--text-light);
}

.service-card li {
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>