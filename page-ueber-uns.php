<?php
/**
 * Template Name: Über uns
 * Simple About Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Über uns</h1>
        <p class="hero-subtitle">Lernen Sie SafeCologne kennen - Ihr Partner für Sicherheit</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <h2 class="section-title">Sicherheit mit Herz & System</h2>
            <p class="section-subtitle">
                SafeCologne ist Ihr vertrauensvoller Partner für professionelle Sicherheitsdienstleistungen 
                in Köln und Umgebung. Mit jahrelanger Erfahrung und einem hochqualifizierten Team bieten 
                wir umfassende Sicherheitslösungen für Unternehmen und Privatpersonen.
            </p>
        </div>
    </div>
</section>

<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="about-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; max-width: 1000px; margin: 0 auto;">
            <div>
                <h2>Unsere Mission</h2>
                <p>
                    Wir verstehen Sicherheit nicht nur als Schutz vor Gefahren, sondern als Grundlage 
                    für Vertrauen und Wohlbefinden. Unser Ziel ist es, durch professionelle 
                    Sicherheitsdienstleistungen ein Umfeld zu schaffen, in dem sich Menschen 
                    sicher und wohl fühlen können.
                </p>
                <p>
                    Dabei setzen wir auf modernste Technik, fundierte Ausbildung und vor allem 
                    auf den menschlichen Faktor - denn Sicherheit ist Vertrauenssache.
                </p>
            </div>
            <div style="text-align: center;">
                <div style="width: 200px; height: 200px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 4rem;">
                    <i class="fas fa-shield-alt"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Unsere Werte</h2>
        <div class="values-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="value-card" style="text-align: center; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 2rem;">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Menschlichkeit</h3>
                <p>Wir behandeln jeden Menschen mit Respekt und Würde. Sicherheit bedeutet für uns, ein Umfeld zu schaffen, in dem sich alle wohlfühlen.</p>
            </div>
            
            <div class="value-card" style="text-align: center; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 2rem;">
                    <i class="fas fa-award"></i>
                </div>
                <h3>Qualität</h3>
                <p>Höchste professionelle Standards in Ausbildung, Ausrüstung und Dienstleistung sind für uns selbstverständlich.</p>
            </div>
            
            <div class="value-card" style="text-align: center; padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="width: 80px; height: 80px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 2rem;">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Vertrauen</h3>
                <p>Transparenz und Zuverlässigkeit bilden das Fundament unserer Kundenbeziehungen. Auf uns können Sie sich verlassen.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Warum SafeCologne?</h2>
        <div class="reasons-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="reason-item" style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h3>24/7 Erreichbar</h3>
                    <p>Rund um die Uhr für Sie da</p>
                </div>
            </div>
            
            <div class="reason-item" style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h3>Qualifiziertes Personal</h3>
                    <p>Professionell ausgebildete Mitarbeiter</p>
                </div>
            </div>
            
            <div class="reason-item" style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h3>Lokale Expertise</h3>
                    <p>Köln und Umgebung - wir kennen die Region</p>
                </div>
            </div>
            
            <div class="reason-item" style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                    <i class="fas fa-cogs"></i>
                </div>
                <div>
                    <h3>Moderne Technik</h3>
                    <p>Neueste Sicherheitstechnologie</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2 class="section-title">Bereit für eine Zusammenarbeit?</h2>
            <p class="section-subtitle">
                Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln. 
                Kontaktieren Sie uns für eine unverbindliche Beratung.
            </p>
            <a href="/kontakt/" class="btn" style="margin-right: 1rem;">Jetzt Kontakt aufnehmen</a>
            <a href="tel:022165058801" class="btn btn-outline">0221 6505 8801</a>
        </div>
    </div>
</section>

<style>
.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    max-width: 1000px;
    margin: 0 auto;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.value-card {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: var(--transition);
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.reasons-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.reason-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.reason-item h3 {
    margin: 0 0 0.25rem 0;
    color: var(--text-dark);
}

.reason-item p {
    margin: 0;
    color: var(--text-light);
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .reasons-grid {
        grid-template-columns: 1fr;
    }
    
    .reason-item {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>