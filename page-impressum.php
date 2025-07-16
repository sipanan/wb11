<?php
/**
 * Template Name: Impressum
 * Simple Impressum Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Impressum</h1>
        <p class="hero-subtitle">Angaben gemäß § 5 TMG</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="legal-content">
                <h2>Angaben gemäß § 5 TMG</h2>
                <p>
                    <strong>SafeCologne GmbH</strong><br>
                    Subbelrather Str. 15A<br>
                    50823 Köln<br>
                    Deutschland
                </p>
                
                <h3>Vertreten durch:</h3>
                <p>Geschäftsführer: [Name des Geschäftsführers]</p>
                
                <h3>Kontakt:</h3>
                <p>
                    Telefon: 0221 6505 8801<br>
                    E-Mail: info@safecologne.de
                </p>
                
                <h3>Registereintrag:</h3>
                <p>
                    Eintragung im Handelsregister<br>
                    Registergericht: [Registergericht]<br>
                    Registernummer: [Registernummer]
                </p>
                
                <h3>Umsatzsteuer-ID:</h3>
                <p>
                    Umsatzsteuer-Identifikationsnummer gemäß § 27a Umsatzsteuergesetz:<br>
                    [USt-IdNr.]
                </p>
                
                <h3>Aufsichtsbehörde:</h3>
                <p>
                    [Name der Aufsichtsbehörde]<br>
                    [Adresse der Aufsichtsbehörde]
                </p>
                
                <h3>Berufsbezeichnung und berufsrechtliche Regelungen:</h3>
                <p>
                    Berufsbezeichnung: Sicherheitsdienst<br>
                    Zuständige Kammer: [Name der Kammer]<br>
                    Verliehen in: Deutschland
                </p>
                
                <h3>Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:</h3>
                <p>
                    [Name]<br>
                    [Adresse]
                </p>
                
                <h3>Streitschlichtung:</h3>
                <p>
                    Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: 
                    <a href="https://ec.europa.eu/consumers/odr/" target="_blank">https://ec.europa.eu/consumers/odr/</a>
                </p>
                <p>
                    Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer 
                    Verbraucherschlichtungsstelle teilzunehmen.
                </p>
                
                <h3>Haftung für Inhalte:</h3>
                <p>
                    Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten 
                    nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als 
                    Diensteanbieter jedoch nicht unter der Verpflichtung, übermittelte oder gespeicherte 
                    fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine 
                    rechtswidrige Tätigkeit hinweisen.
                </p>
                
                <h3>Haftung für Links:</h3>
                <p>
                    Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen 
                    Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. 
                    Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber 
                    der Seiten verantwortlich.
                </p>
                
                <h3>Urheberrecht:</h3>
                <p>
                    Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen 
                    dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art 
                    der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen 
                    Zustimmung des jeweiligen Autors bzw. Erstellers.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
.legal-content {
    line-height: 1.8;
    font-size: 1rem;
}

.legal-content h2 {
    color: var(--primary-red);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.legal-content h3 {
    color: var(--text-dark);
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.legal-content p {
    margin-bottom: 1rem;
}

.legal-content a {
    color: var(--primary-red);
    text-decoration: underline;
}

.legal-content a:hover {
    text-decoration: none;
}
</style>

<?php get_footer(); ?>