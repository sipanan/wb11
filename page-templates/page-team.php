<?php
/**
 * Template Name: Team SpecSec
 *
 * @package SpecSec
 */

get_header(); ?>

<div class="team-page">
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Team SpecSec', 'specsec'); ?></h1>
            <p class="page-subtitle"><?php esc_html_e('Unser professionelles Team mit über 41 Jahren Erfahrung', 'specsec'); ?></p>
        </div>
    </section>

    <!-- Team Services Section -->
    <section class="team-services">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Unsere Expertise', 'specsec'); ?></h2>
            
            <div class="services-detailed">
                <div class="service-detail">
                    <h3><?php esc_html_e('Veranstaltungssicherheitsdienste (VSD)', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Umfassende Risikoanalyse und maßgeschneiderte Personalkonzepte für reibungslose Veranstaltungsabläufe. Unser erfahrenes Team sorgt für die Sicherheit Ihrer Gäste und einen professionellen Ablauf.', 'specsec'); ?></p>
                </div>
                
                <div class="service-detail">
                    <h3><?php esc_html_e('Veranstaltungsordnungsdienste (VOD)', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Professioneller Besucherservice mit hohem Engagement und expertiellem Crowd Management. Wir schaffen eine angenehme Atmosphäre für alle Beteiligten.', 'specsec'); ?></p>
                </div>
                
                <div class="service-detail">
                    <h3><?php esc_html_e('Projektierung', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Detaillierte Anforderungsanalyse, strategische Flächenplanung und individuell abgestimmte Personalkonzepte für Ihre spezifischen Bedürfnisse.', 'specsec'); ?></p>
                </div>
                
                <div class="service-detail">
                    <h3><?php esc_html_e('Crowd Management', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Professionelle Besucherstromsteuerung und Crowd-Control-Strategien für sichere und angenehme Veranstaltungen jeder Größe.', 'specsec'); ?></p>
                </div>
                
                <div class="service-detail">
                    <h3><?php esc_html_e('Künstlerbetreuung', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Diskreter und professioneller Schutz für Künstler und VIPs mit jahrzehntelanger Erfahrung im Umgang mit prominenten Persönlichkeiten.', 'specsec'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Projects Section -->
    <section class="research-projects">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Forschung & Entwicklung', 'specsec'); ?></h2>
            
            <div class="projects-grid">
                <div class="project-card">
                    <h3><?php esc_html_e('Hermes Projekt', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Innovative Sicherheitslösungen für moderne Veranstaltungen.', 'specsec'); ?></p>
                </div>
                
                <div class="project-card">
                    <h3><?php esc_html_e('BaSiGo', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Basis-Sicherheits-Governance für optimierte Abläufe.', 'specsec'); ?></p>
                </div>
                
                <div class="project-card">
                    <h3><?php esc_html_e('ProVOD', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Professionelle Veranstaltungsordnungsdienste der Zukunft.', 'specsec'); ?></p>
                </div>
                
                <div class="project-card">
                    <h3><?php esc_html_e('CroMa', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Crowd Management Algorithmen für bessere Sicherheit.', 'specsec'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Gallery Section -->
    <section class="team-gallery">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Unser Team', 'specsec'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Über 70 erfahrene Mitarbeiter für Ihre Sicherheit', 'specsec'); ?></p>
            
            <div class="team-grid">
                <?php
                // Sample team members - in a real implementation, these would come from a custom post type or customizer
                $team_members = array(
                    'Max Mustermann', 'Anna Schmidt', 'Thomas Weber', 'Lisa Müller', 'Michael Klein',
                    'Sandra Wagner', 'Peter Bauer', 'Julia Fischer', 'Stefan Richter', 'Martina Hoffmann',
                    'Daniel Schmitz', 'Claudia Braun', 'Wolfgang Zimmermann', 'Petra Krüger', 'Andreas Hartmann',
                    'Sabine Lange', 'Markus Schmid', 'Monika Wolf', 'Jürgen Neumann', 'Birgit Schwarz',
                    'Rainer Köhler', 'Anja Weiß', 'Thorsten Stein', 'Karin Vogel', 'Uwe Schulz',
                    'Susanne Krause', 'Frank Lehmann', 'Ingrid Huber', 'Bernd Mayer', 'Gabriele Fuchs',
                    'Dieter Herrmann', 'Renate König', 'Holger Roth', 'Silke Berger', 'Jochen Pohl',
                    'Katrin Jäger', 'Norbert Sommer', 'Doris Franke', 'Gerald Scholz', 'Bettina Wenzel',
                    'Carsten Lorenz', 'Heike Baum', 'Volker Günther', 'Manuela Keller', 'Helmut Böhm',
                    'Christine Knoll', 'Torsten Gross', 'Brigitte Haas', 'Lothar Schuster', 'Margot Lutz',
                    'Ralf Hahn', 'Ulrike Graf', 'Reinhold Dietrich', 'Cornelia Seidel', 'Joachim Horn',
                    'Elke Busch', 'Günter Kramer', 'Irene Zimmermann', 'Siegfried Keller', 'Ursula Vogel',
                    'Rüdiger Scholz', 'Hannelore Berger', 'Manfred Pohl', 'Christa Jäger', 'Bernhard Sommer',
                    'Gisela Franke', 'Heinz Scholz', 'Waltraud Wenzel', 'Erwin Lorenz', 'Heidrun Baum'
                );
                
                foreach ($team_members as $member) {
                    echo '<div class="team-member">';
                    echo '<div class="team-member-image">';
                    echo '<i class="fas fa-user"></i>';
                    echo '</div>';
                    echo '<div class="team-member-name">' . esc_html($member) . '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Gremienarbeit Section -->
    <section class="committee-work">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Gremienarbeit & Zertifizierungen', 'specsec'); ?></h2>
            
            <div class="certifications-grid">
                <div class="certification-item">
                    <h3><?php esc_html_e('Bundesverband der Sicherheitswirtschaft', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Aktives Mitglied im führenden Branchenverband', 'specsec'); ?></p>
                </div>
                
                <div class="certification-item">
                    <h3><?php esc_html_e('ISO 9001', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Qualitätsmanagement-System zertifiziert', 'specsec'); ?></p>
                </div>
                
                <div class="certification-item">
                    <h3><?php esc_html_e('DIN 77200-1', 'specsec'); ?></h3>
                    <p><?php esc_html_e('Sicherheitsdienstleistungen nach DIN-Norm', 'specsec'); ?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>