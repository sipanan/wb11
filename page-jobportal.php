<?php
/**
 * Template Name: Jobportal
 * Simple Job Portal Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Karriere bei SafeCologne</h1>
        <p class="hero-subtitle">Werden Sie Teil des führenden Sicherheitsunternehmens in Köln</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h2 class="section-title">Warum SafeCologne?</h2>
            <p class="section-subtitle">
                Bei SafeCologne finden Sie mehr als nur einen Job - Sie finden eine Karriere mit Sinn. 
                Wir bieten Ihnen die Möglichkeit, in einem dynamischen Umfeld zu arbeiten und dabei 
                einen wichtigen Beitrag zur Sicherheit in unserer Gesellschaft zu leisten.
            </p>
        </div>
        
        <div class="benefits-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="benefit-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <h3>Faire Bezahlung</h3>
                <p>Übertarifliche Vergütung und attraktive Zuschläge für Nacht-, Sonn- und Feiertagsarbeit.</p>
            </div>
            
            <div class="benefit-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Weiterbildung</h3>
                <p>Kontinuierliche Schulungen und Zertifizierungen für Ihre berufliche Entwicklung.</p>
            </div>
            
            <div class="benefit-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Teamgeist</h3>
                <p>Arbeiten Sie in einem kollegialen Umfeld mit erfahrenen Kollegen und Vorgesetzten.</p>
            </div>
            
            <div class="benefit-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem;">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Flexible Arbeitszeiten</h3>
                <p>Verschiedene Schichtmodelle und Teilzeitmöglichkeiten für eine bessere Work-Life-Balance.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Aktuelle Stellenangebote</h2>
        <div class="job-listings" style="max-width: 800px; margin: 0 auto;">
            
            <div class="job-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                    <div>
                        <h3 style="margin: 0 0 0.5rem 0; color: var(--text-dark);">Sicherheitsmitarbeiter (m/w/d)</h3>
                        <p style="margin: 0; color: var(--text-light);">Vollzeit • Köln</p>
                    </div>
                    <span style="background: var(--primary-red); color: white; padding: 0.25rem 0.75rem; border-radius: 15px; font-size: 0.8rem;">Neu</span>
                </div>
                <p style="margin-bottom: 1rem; color: var(--text-light);">
                    Wir suchen engagierte Sicherheitsmitarbeiter für verschiedene Objekte in Köln. 
                    Einarbeitung und Schulung werden von uns übernommen.
                </p>
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">Objektschutz</span>
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">Keine Vorerfahrung</span>
                </div>
                <a href="/kontakt/" class="btn" style="display: inline-block;">Jetzt bewerben</a>
            </div>
            
            <div class="job-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                    <div>
                        <h3 style="margin: 0 0 0.5rem 0; color: var(--text-dark);">Teamleiter Sicherheit (m/w/d)</h3>
                        <p style="margin: 0; color: var(--text-light);">Vollzeit • Köln</p>
                    </div>
                </div>
                <p style="margin-bottom: 1rem; color: var(--text-light);">
                    Erfahrener Sicherheitsprofi gesucht für die Leitung unserer Objektschutz-Teams. 
                    Führungserfahrung und Sachkunde nach § 34a erforderlich.
                </p>
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">Führungsposition</span>
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">§ 34a erforderlich</span>
                </div>
                <a href="/kontakt/" class="btn" style="display: inline-block;">Jetzt bewerben</a>
            </div>
            
            <div class="job-card" style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                    <div>
                        <h3 style="margin: 0 0 0.5rem 0; color: var(--text-dark);">Sicherheitsmitarbeiter Veranstaltungen (m/w/d)</h3>
                        <p style="margin: 0; color: var(--text-light);">Teilzeit/Aushilfe • Köln</p>
                    </div>
                </div>
                <p style="margin-bottom: 1rem; color: var(--text-light);">
                    Für Events, Konzerte und Messen suchen wir flexible Sicherheitsmitarbeiter. 
                    Ideal als Nebentätigkeit oder für Studenten.
                </p>
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">Events</span>
                    <span style="background: #f8f9fa; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.9rem;">Flexible Zeiten</span>
                </div>
                <a href="/kontakt/" class="btn" style="display: inline-block;">Jetzt bewerben</a>
            </div>
            
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Bewerbungsprozess</h2>
        <div class="process-steps" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="step" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 1.5rem; font-weight: bold;">1</div>
                <h3>Bewerbung senden</h3>
                <p>Senden Sie uns Ihre aussagekräftige Bewerbung per E-Mail oder über unser Kontaktformular.</p>
            </div>
            
            <div class="step" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 1.5rem; font-weight: bold;">2</div>
                <h3>Gespräch</h3>
                <p>Bei passender Qualifikation laden wir Sie zu einem persönlichen Gespräch ein.</p>
            </div>
            
            <div class="step" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 1.5rem; font-weight: bold;">3</div>
                <h3>Einarbeitung</h3>
                <p>Nach erfolgreicher Einstellung erhalten Sie eine umfassende Einarbeitung und Schulung.</p>
            </div>
            
            <div class="step" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 1.5rem; font-weight: bold;">4</div>
                <h3>Start</h3>
                <p>Willkommen im Team! Starten Sie Ihre Karriere bei SafeCologne.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2 class="section-title">Bereit für den nächsten Karriereschritt?</h2>
            <p class="section-subtitle">
                Werden Sie Teil unseres erfolgreichen Teams und gestalten Sie die Zukunft der Sicherheit mit. 
                Wir freuen uns auf Ihre Bewerbung!
            </p>
            <a href="/kontakt/" class="btn" style="margin-right: 1rem;">Jetzt bewerben</a>
            <a href="mailto:karriere@safecologne.de" class="btn btn-outline">karriere@safecologne.de</a>
        </div>
    </div>
</section>

<style>
.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.benefit-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    text-align: center;
    transition: var(--transition);
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.job-listings {
    max-width: 800px;
    margin: 0 auto;
}

.job-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
    transition: var(--transition);
}

.job-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.step {
    text-align: center;
}

.step h3 {
    margin: 0 0 1rem 0;
    color: var(--text-dark);
}

.step p {
    margin: 0;
    color: var(--text-light);
}

@media (max-width: 768px) {
    .benefits-grid {
        grid-template-columns: 1fr;
    }
    
    .process-steps {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>