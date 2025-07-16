<?php
/**
 * Template Name: AGB
 * Simple AGB Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Allgemeine Geschäftsbedingungen</h1>
        <p class="hero-subtitle">Gültig ab [Datum]</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="legal-content">
                <h2>§ 1 Geltungsbereich</h2>
                <p>
                    Diese Allgemeinen Geschäftsbedingungen (AGB) gelten für alle Verträge zwischen der 
                    SafeCologne GmbH (nachfolgend "Auftragnehmer") und dem Auftraggeber über die 
                    Erbringung von Sicherheitsdienstleistungen.
                </p>
                
                <h2>§ 2 Vertragsschluss</h2>
                <p>
                    Ein Vertrag kommt durch schriftliche Bestätigung des Auftragnehmers oder durch 
                    Beginn der Leistungserbringung zustande. Mündliche Nebenabreden bedürfen der 
                    schriftlichen Bestätigung.
                </p>
                
                <h2>§ 3 Leistungsumfang</h2>
                <p>
                    Der Umfang der zu erbringenden Leistungen ergibt sich aus der jeweiligen 
                    Leistungsbeschreibung bzw. dem Angebot. Änderungen bedürfen der schriftlichen 
                    Vereinbarung.
                </p>
                
                <h2>§ 4 Pflichten des Auftraggebers</h2>
                <p>
                    Der Auftraggeber ist verpflichtet, alle für die Durchführung des Auftrags 
                    erforderlichen Informationen und Unterlagen rechtzeitig zur Verfügung zu stellen. 
                    Er hat den Auftragnehmer über besondere Gefahren und Risiken zu informieren.
                </p>
                
                <h2>§ 5 Vergütung und Zahlung</h2>
                <p>
                    Die Vergütung richtet sich nach der jeweils gültigen Preisliste oder den 
                    individuellen Vereinbarungen. Rechnungen sind binnen 14 Tagen nach Erhalt 
                    ohne Abzug zur Zahlung fällig.
                </p>
                
                <h2>§ 6 Haftung</h2>
                <p>
                    Der Auftragnehmer haftet für Schäden nur bei Vorsatz und grober Fahrlässigkeit. 
                    Bei leichter Fahrlässigkeit haftet er nur für die Verletzung wesentlicher 
                    Vertragspflichten.
                </p>
                
                <h2>§ 7 Datenschutz</h2>
                <p>
                    Der Auftragnehmer verpflichtet sich, alle im Rahmen des Auftrags bekannt 
                    gewordenen personenbezogenen Daten vertraulich zu behandeln und die 
                    datenschutzrechtlichen Bestimmungen einzuhalten.
                </p>
                
                <h2>§ 8 Vertragslaufzeit und Kündigung</h2>
                <p>
                    Die Vertragslaufzeit ergibt sich aus der jeweiligen Vereinbarung. 
                    Dauerverträge können mit einer Frist von 4 Wochen zum Monatsende 
                    gekündigt werden, sofern nicht anders vereinbart.
                </p>
                
                <h2>§ 9 Geheimhaltung</h2>
                <p>
                    Der Auftragnehmer verpflichtet sich, über alle ihm im Zusammenhang mit 
                    der Auftragsausführung zur Kenntnis gelangenden Geschäfts- und 
                    Betriebsgeheimnisse Stillschweigen zu bewahren.
                </p>
                
                <h2>§ 10 Höhere Gewalt</h2>
                <p>
                    Bei höherer Gewalt (z.B. Naturkatastrophen, Krieg, Terroranschläge, 
                    Pandemien) ist der Auftragnehmer von der Leistungspflicht befreit, 
                    ohne dass hierdurch Ansprüche gegen ihn entstehen.
                </p>
                
                <h2>§ 11 Salvatorische Klausel</h2>
                <p>
                    Sollten einzelne Bestimmungen dieser AGB unwirksam sein oder werden, 
                    bleibt die Wirksamkeit der übrigen Bestimmungen davon unberührt.
                </p>
                
                <h2>§ 12 Anwendbares Recht und Gerichtsstand</h2>
                <p>
                    Es gilt deutsches Recht. Gerichtsstand ist, soweit gesetzlich zulässig, 
                    der Sitz des Auftragnehmers.
                </p>
                
                <h2>§ 13 Schlussbestimmungen</h2>
                <p>
                    Änderungen und Ergänzungen dieser AGB bedürfen der Schriftform. 
                    Dies gilt auch für die Änderung dieser Schriftformklausel.
                </p>
                
                <hr style="margin: 2rem 0;">
                
                <p>
                    <strong>SafeCologne GmbH</strong><br>
                    Subbelrather Str. 15A<br>
                    50823 Köln<br>
                    Deutschland
                </p>
                <p>
                    Telefon: 0221 6505 8801<br>
                    E-Mail: info@safecologne.de
                </p>
                
                <p><small>Stand: [Datum]</small></p>
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

.legal-content hr {
    border: none;
    height: 1px;
    background: #ddd;
}
</style>

<?php get_footer(); ?>