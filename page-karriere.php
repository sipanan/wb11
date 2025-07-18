<?php
/**
 * Template Name: Jobportal
 * 
 * Enterprise-grade jobportal template for SafeCologne
 * Optimized for conversion, UX, and performance
 * 
 * @package SafeCologne
 * @version 3.0.0
 *
 */

get_header(); 

// Get header height for proper spacing
$header_height = 80; // Adjust based on your actual header
?>

<main id="karriere-main" class="karriere-page" data-header-height="<?php echo esc_attr($header_height); ?>">
    
    <!-- Hero Section with Parallax -->
    <section class="hero-section" data-aos="fade">
        <div class="hero-overlay"></div>
        <div class="hero-content container">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="text-gradient">Ihre Karriere</span><br>
                    bei SafeCologne
                </h1>
                <p class="hero-subtitle">
                    Werden Sie Teil des führenden Sicherheitsunternehmens in Köln
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-count="500">0</span>
                        <span class="stat-label">Mitarbeiter</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="15">0</span>
                        <span class="stat-label">Jahre Erfahrung</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="98">0</span>
                        <span class="stat-label">% Zufriedenheit</span>
                    </div>
                </div>
                <a href="#bewerbung" class="hero-cta smooth-scroll">
                    Jetzt bewerben
                    <svg class="cta-arrow" width="20" height="20" viewBox="0 0 20 20">
                        <path d="M10 3L17 10L10 17" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                </a>
            </div>
            <div class="hero-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/security-team.jpg" 
                     alt="SafeCologne Team" 
                     loading="eager"
                     width="600"
                     height="400">
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Warum SafeCologne?</h2>
                <p class="section-subtitle">Ihre Vorteile auf einen Blick</p>
            </div>
            
            <div class="benefits-grid">
                <?php
                $benefits = [
                    [
                        'icon' => 'shield-check',
                        'title' => 'Sichere Zukunft',
                        'description' => 'Unbefristete Verträge und langfristige Perspektiven in einer krisensicheren Branche',
                        'color' => '#E30613'
                    ],
                    [
                        'icon' => 'currency-euro',
                        'title' => 'Top Vergütung',
                        'description' => 'Überdurchschnittliche Bezahlung plus attraktive Zusatzleistungen und Boni',
                        'color' => '#0066CC'
                    ],
                    [
                        'icon' => 'academic-cap',
                        'title' => 'Weiterbildung',
                        'description' => 'Kostenlose Schulungen, Zertifizierungen und Aufstiegschancen',
                        'color' => '#00AA55'
                    ],
                    [
                        'icon' => 'users',
                        'title' => 'Starkes Team',
                        'description' => 'Kollegialer Zusammenhalt und professionelle Arbeitsatmosphäre',
                        'color' => '#FF6600'
                    ],
                    [
                        'icon' => 'clock',
                        'title' => 'Flexible Zeiten',
                        'description' => 'Work-Life-Balance durch flexible Arbeitszeitmodelle',
                        'color' => '#9333EA'
                    ],
                    [
                        'icon' => 'heart',
                        'title' => 'Benefits',
                        'description' => 'Firmenwagen, Gesundheitsvorsorge und weitere Extras',
                        'color' => '#EC4899'
                    ]
                ];
                
                foreach ($benefits as $index => $benefit) : ?>
                    <div class="benefit-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="benefit-icon" style="background-color: <?php echo $benefit['color']; ?>20; color: <?php echo $benefit['color']; ?>">
                            <svg class="icon-<?php echo $benefit['icon']; ?>" width="32" height="32">
                                <!-- Add your SVG paths here -->
                            </svg>
                        </div>
                        <h3 class="benefit-title"><?php echo $benefit['title']; ?></h3>
                        <p class="benefit-description"><?php echo $benefit['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section class="positions-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Offene Stellen</h2>
                <p class="section-subtitle">Finden Sie Ihre Traumposition</p>
            </div>
            
            <div class="positions-filters">
                <button class="filter-btn active" data-filter="all">Alle Stellen</button>
                <button class="filter-btn" data-filter="security">Sicherheitsdienst</button>
                <button class="filter-btn" data-filter="admin">Verwaltung</button>
                <button class="filter-btn" data-filter="management">Führungskräfte</button>
            </div>
            
            <div class="positions-grid">
                <?php
                $positions = [
                    [
                        'title' => 'Sicherheitsmitarbeiter (m/w/d)',
                        'category' => 'security',
                        'type' => 'Vollzeit',
                        'location' => 'Köln',
                        'highlight' => true
                    ],
                    [
                        'title' => 'Objektleiter Sicherheit (m/w/d)',
                        'category' => 'security',
                        'type' => 'Vollzeit',
                        'location' => 'Köln',
                        'highlight' => false
                    ],
                    [
                        'title' => 'Personaldisponent (m/w/d)',
                        'category' => 'admin',
                        'type' => 'Vollzeit',
                        'location' => 'Köln',
                        'highlight' => false
                    ],
                    [
                        'title' => 'Bereichsleiter Security (m/w/d)',
                        'category' => 'management',
                        'type' => 'Vollzeit',
                        'location' => 'Köln',
                        'highlight' => true
                    ]
                ];
                
                foreach ($positions as $position) : ?>
                    <div class="position-card <?php echo $position['highlight'] ? 'highlighted' : ''; ?>" 
                         data-category="<?php echo $position['category']; ?>">
                        <?php if ($position['highlight']) : ?>
                            <span class="position-badge">Top Position</span>
                        <?php endif; ?>
                        <h3 class="position-title"><?php echo $position['title']; ?></h3>
                        <div class="position-meta">
                            <span class="meta-item">
                                <svg width="16" height="16"><use href="#icon-briefcase"/></svg>
                                <?php echo $position['type']; ?>
                            </span>
                            <span class="meta-item">
                                <svg width="16" height="16"><use href="#icon-location"/></svg>
                                <?php echo $position['location']; ?>
                            </span>
                        </div>
                        <a href="#bewerbung" class="position-apply smooth-scroll">
                            Jetzt bewerben →
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section id="bewerbung" class="application-section">
        <div class="container">
            <div class="application-wrapper">
                <div class="application-info">
                    <h2 class="section-title">Bewerbung in 2 Minuten</h2>
                    <p class="section-lead">
                        Starten Sie Ihre Karriere bei SafeCologne mit nur wenigen Klicks
                    </p>
                    
                    <div class="process-steps">
                        <div class="process-step active">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Formular ausfüllen</h4>
                                <p>Grunddaten eingeben</p>
                            </div>
                        </div>
                        <div class="process-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Lebenslauf hochladen</h4>
                                <p>PDF oder Word Format</p>
                            </div>
                        </div>
                        <div class="process-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Absenden & Zurücklehnen</h4>
                                <p>Antwort in 48h</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="trust-indicators">
                        <div class="trust-item">
                            <svg width="20" height="20"><use href="#icon-shield"/></svg>
                            <span>SSL-verschlüsselt</span>
                        </div>
                        <div class="trust-item">
                            <svg width="20" height="20"><use href="#icon-lock"/></svg>
                            <span>DSGVO-konform</span>
                        </div>
                        <div class="trust-item">
                            <svg width="20" height="20"><use href="#icon-check"/></svg>
                            <span>Keine Weitergabe</span>
                        </div>
                    </div>
                </div>
                
                <div class="application-form-wrapper">
                    <div class="form-card">
                        <?php 
                        // Use your Contact Form 7 shortcode
                        echo do_shortcode('[contact-form-7 id="7363e46" title="Bewerber - Formular"]'); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Das sagen unsere Mitarbeiter</h2>
            </div>
            
            <div class="testimonials-slider">
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <p>"Bei SafeCologne habe ich nicht nur einen Job gefunden, sondern eine berufliche Heimat. Die Aufstiegschancen sind real und die Kollegen wie eine zweite Familie."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial-1.jpg" alt="Michael S.">
                        <div>
                            <strong>Michael S.</strong>
                            <span>Objektleiter, seit 2019</span>
                        </div>
                    </div>
                </div>
                <!-- Add more testimonials -->
            </div>
        </div>
    </section>



</main>

<!-- SVG Sprite continued -->
        </symbol>
        <symbol id="icon-shield" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 24 24">
            <path fill="currentColor" d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
        </symbol>
        <symbol id="icon-check" viewBox="0 0 24 24">
            <path fill="currentColor" d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
        </symbol>
        <symbol id="icon-phone" viewBox="0 0 24 24">
            <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </symbol>
        <symbol id="icon-email" viewBox="0 0 24 24">
            <path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
        </symbol>
    </defs>
</svg>

<style>
/* ===== KARRIERE PAGE MASTER STYLES ===== */

/* CSS Variables */
:root {
    --primary: #E30613;
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
    
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.12), 0 2px 4px rgba(0,0,0,0.24);
    --shadow-lg: 0 10px 20px rgba(0,0,0,0.12), 0 4px 8px rgba(0,0,0,0.24);
    --shadow-xl: 0 15px 30px rgba(0,0,0,0.12), 0 5px 15px rgba(0,0,0,0.24);
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-fast: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
    
    --header-height: 80px;
}

/* Reset & Base */
.karriere-page * {
    box-sizing: border-box;
}

.karriere-page {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    color: var(--gray-900);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-top: var(--header-height);
}

/* Container */
.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.hero-section {
    position: relative;
    min-height: 600px;
    background: linear-gradient(135deg, rgba(227,6,19,0.95) 0%, rgba(26,26,26,0.95) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23111" width="1200" height="600"/></svg>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    overflow: hidden;
    margin-top: calc(var(--header-height) * -1);
    padding-top: var(--header-height);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(ellipse at center, transparent 0%, rgba(0,0,0,0.4) 100%);
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    padding: 80px 0;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    line-height: 1.1;
    margin: 0 0 1.5rem;
    color: var(--white);
    letter-spacing: -0.02em;
}

.text-gradient {
    background: linear-gradient(135deg, var(--white) 0%, var(--gray-200) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: clamp(1.125rem, 2vw, 1.5rem);
    color: rgba(255,255,255,0.9);
    margin: 0 0 2rem;
    font-weight: 400;
}

.hero-stats {
    display: flex;
    gap: 3rem;
    margin: 0 0 3rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--white);
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.875rem;
    color: rgba(255,255,255,0.7);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.hero-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: var(--white);
    color: var(--primary);
    padding: 1rem 2rem;
    font-size: 1.125rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: var(--transition);
    box-shadow: var(--shadow-lg);
}

.hero-cta:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    gap: 1rem;
}

.cta-arrow {
    transition: var(--transition);
}

.hero-image {
    position: relative;
}

.hero-image img {
    width: 100%;
    height: auto;
    border-radius: 20px;
    box-shadow: var(--shadow-xl);
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.5);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.scroll-line {
    width: 1px;
    height: 40px;
    background: linear-gradient(to bottom, rgba(255,255,255,0.5), transparent);
    animation: scrollIndicator 2s infinite;
}

@keyframes scrollIndicator {
    0% { transform: scaleY(0); transform-origin: top; }
    50% { transform: scaleY(1); transform-origin: top; }
    51% { transform-origin: bottom; }
    100% { transform: scaleY(0); transform-origin: bottom; }
}

/* Section Styles */
section {
    padding: 80px 0;
    position: relative;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    margin: 0 0 1rem;
    color: var(--gray-900);
    letter-spacing: -0.02em;
}

.section-subtitle {
    font-size: 1.25rem;
    color: var(--gray-600);
    margin: 0;
}

/* Benefits Section */
.benefits-section {
    background: var(--gray-50);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
}

.benefit-card {
    background: var(--white);
    padding: 2rem;
    border-radius: 16px;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    text-align: center;
}

.benefit-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.benefit-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    font-size: 2rem;
}

.benefit-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0 0 0.75rem;
    color: var(--gray-900);
}

.benefit-description {
    color: var(--gray-600);
    margin: 0;
    line-height: 1.7;
}

/* Positions Section */
.positions-section {
    background: var(--white);
}

.positions-filters {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.75rem 1.5rem;
    background: var(--gray-100);
    border: 2px solid transparent;
    border-radius: 50px;
    font-weight: 600;
    color: var(--gray-700);
    cursor: pointer;
    transition: var(--transition);
}

.filter-btn:hover {
    background: var(--gray-200);
}

.filter-btn.active {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}

.positions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
}

.position-card {
    position: relative;
    background: var(--white);
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 2rem;
    transition: var(--transition);
}

.position-card:hover {
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.position-card.highlighted {
    border-color: var(--primary);
    background: linear-gradient(135deg, rgba(227,6,19,0.05) 0%, rgba(227,6,19,0.02) 100%);
}

.position-badge {
    position: absolute;
    top: -12px;
    right: 20px;
    background: var(--primary);
    color: var(--white);
    padding: 0.25rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.position-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 1rem;
    color: var(--gray-900);
}

.position-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--gray-600);
    font-size: 0.875rem;
}

.position-apply {
    display: inline-flex;
    align-items: center;
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
}

.position-apply:hover {
    gap: 0.5rem;
}

/* Application Section */
.application-section {
    background: linear-gradient(to bottom, var(--gray-50), var(--white));
}

.application-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 4rem;
    align-items: start;
}

.section-lead {
    font-size: 1.25rem;
    color: var(--gray-600);
    margin: 0 0 3rem;
}

.process-steps {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 3rem;
}

/* Application Section continued */
.process-step {
    display: flex;
    align-items: center;
    gap: 1rem;
    opacity: 0.5;
    transition: var(--transition);
}

.process-step.active {
    opacity: 1;
}

.step-number {
    width: 40px;
    height: 40px;
    background: var(--gray-200);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--gray-600);
    flex-shrink: 0;
    transition: var(--transition);
}

.process-step.active .step-number {
    background: var(--primary);
    color: var(--white);
}

.step-content h4 {
    margin: 0 0 0.25rem;
    font-size: 1rem;
    color: var(--gray-900);
}

.step-content p {
    margin: 0;
    font-size: 0.875rem;
    color: var(--gray-600);
}

.trust-indicators {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--gray-600);
    font-size: 0.875rem;
}

.trust-item svg {
    color: var(--primary);
}

/* Form Card */
.form-card {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-xl);
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--primary-light));
}

/* Contact Form 7 Styling */
.form-card .wpcf7-form {
    display: grid;
    gap: 1.5rem;
}

.form-card .wpcf7-form p {
    margin: 0;
}

.form-card .wpcf7-form-control-wrap {
    display: block;
    width: 100%;
}

.form-card label {
    display: block;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.form-card input[type="text"],
.form-card input[type="email"],
.form-card input[type="tel"],
.form-card input[type="url"],
.form-card select,
.form-card textarea {
    width: 100%;
    padding: 0.875rem 1rem;
    background: var(--gray-50);
    border: 2px solid transparent;
    border-radius: 8px;
    font-size: 1rem;
    color: var(--gray-900);
    transition: var(--transition-fast);
    font-family: inherit;
}

.form-card input:focus,
.form-card select:focus,
.form-card textarea:focus {
    outline: none;
    background: var(--white);
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(227, 6, 19, 0.1);
}

.form-card textarea {
    min-height: 120px;
    resize: vertical;
}

.form-card select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M10.293 3.293L6 7.586 1.707 3.293A1 1 0 00.293 4.707l5 5a1 1 0 001.414 0l5-5a1 1 0 10-1.414-1.414z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.form-card input[type="file"] {
    padding: 0.75rem;
    background: var(--gray-50);
    border: 2px dashed var(--gray-300);
    cursor: pointer;
}

.form-card input[type="file"]:hover {
    border-color: var(--primary);
    background: rgba(227, 6, 19, 0.05);
}

.form-card input[type="submit"] {
    width: 100%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border: none;
    padding: 1rem 2rem;
    font-size: 1.125rem;
    font-weight: 700;
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    box-shadow: var(--shadow-md);
    margin-top: 1rem;
}

.form-card input[type="submit"]:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.form-card input[type="submit"]:active {
    transform: translateY(0);
}

.form-card .wpcf7-spinner {
    margin-left: 1rem;
}

.form-card .wpcf7-not-valid-tip {
    color: #DC2626;
    font-size: 0.75rem;
    margin-top: 0.25rem;
    display: block;
}

.form-card .wpcf7-response-output {
    margin: 1.5rem 0 0;
    padding: 1rem;
    border-radius: 8px;
    text-align: center;
    font-weight: 500;
}

.form-card .wpcf7-mail-sent-ok {
    background: #D1FAE5;
    color: #065F46;
    border: 1px solid #6EE7B7;
}

.form-card .wpcf7-mail-sent-ng,
.form-card .wpcf7-aborted,
.form-card .wpcf7-spam-blocked,
.form-card .wpcf7-validation-errors {
    background: #FEE2E2;
    color: #991B1B;
    border: 1px solid #FCA5A5;
}

/* Testimonials Section */
.testimonials-section {
    background: var(--gray-900);
    color: var(--white);
}

.testimonials-section .section-title {
    color: var(--white);
}

.testimonials-slider {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.testimonial-item {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

.testimonial-content {
    margin-bottom: 1.5rem;
}

.testimonial-content p {
    font-size: 1.125rem;
    line-height: 1.7;
    margin: 0;
    font-style: italic;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.testimonial-author img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.testimonial-author strong {
    display: block;
    margin-bottom: 0.25rem;
}

.testimonial-author span {
    font-size: 0.875rem;
    opacity: 0.7;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    text-align: center;
}

.cta-content h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    margin: 0 0 1rem;
}

.cta-content p {
    font-size: 1.25rem;
    margin: 0 0 2rem;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: var(--transition);
    font-size: 1.125rem;
}

.cta-primary {
    background: var(--white);
    color: var(--primary);
    box-shadow: var(--shadow-md);
}

.cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
}

.cta-secondary {
    background: transparent;
    color: var(--white);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.cta-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: var(--white);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .hero-image {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .hero-stats {
        justify-content: center;
    }
    
    .application-wrapper {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
}

@media (max-width: 768px) {
    section {
        padding: 60px 0;
    }
    
    .hero-section {
        min-height: 500px;
    }
    
    .hero-content {
        padding: 60px 0;
    }
    
    .hero-stats {
        gap: 2rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
    
    .positions-grid {
        grid-template-columns: 1fr;
    }
    
    .form-card {
        padding: 2rem;
    }
    
    .testimonials-slider {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-button {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .form-card {
        padding: 1.5rem;
    }
    
    .trust-indicators {
        gap: 1rem;
        font-size: 0.75rem;
    }
}

/* Print Styles */
@media print {
    .hero-section,
    .cta-section,
    .testimonials-section {
        display: none;
    }
    
    .benefits-section,
    .positions-section,
    .application-section {
        background: white;
        page-break-inside: avoid;
    }
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

[data-aos="fade"] {
    opacity: 0;
    transition: opacity 0.6s ease-out;
}

[data-aos="fade"].aos-animate {
    opacity: 1;
}

[data-aos="fade-up"] {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

[data-aos="fade-up"].aos-animate {
    opacity: 1;
    transform: translateY(0);
}

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
button:focus-visible,
input:focus-visible,
select:focus-visible,
textarea:focus-visible {
    outline: 2px solid var(--primary);
    outline-offset: 2px;
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

<script>
/**
 * Karriere Page JavaScript
 * Production-ready, optimized code
 */
(function() {
    'use strict';
    
    // Wait for DOM
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== Smooth Scrolling =====
        const smoothScroll = () => {
            document.querySelectorAll('.smooth-scroll').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const target = document.querySelector(targetId);
                    
                    if (target) {
                        const headerHeight = document.querySelector('header')?.offsetHeight || 80;
                        const targetPosition = target.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        };
        
        // ===== Number Counter Animation =====
        const animateNumbers = () => {
            const counters = document.querySelectorAll('.stat-number');
            const speed = 200;
            
            const countUp = (counter) => {
                const target = parseInt(counter.getAttribute('data-count'));
                const count = parseInt(counter.innerText);
                const increment = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => countUp(counter), 1);
                } else {
                    counter.innerText = target;
                }
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        countUp(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => observer.observe(counter));
        };
        
        // ===== Position Filtering =====
        const initFilters = () => {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const positionCards = document.querySelectorAll('.position-card');
            
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                                        // Update active state
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter positions
                    positionCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'block';
                            card.style.animation = 'fadeIn 0.5s ease-out';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        };
        
        // ===== Form Enhancement =====
        const enhanceForm = () => {
            const form = document.querySelector('.wpcf7-form');
            if (!form) return;
            
            // Update process steps on input
            const inputs = form.querySelectorAll('input, select, textarea');
            const steps = document.querySelectorAll('.process-step');
            
            const updateSteps = () => {
                const filledInputs = Array.from(inputs).filter(input => input.value.trim() !== '').length;
                const progress = Math.min(Math.floor((filledInputs / inputs.length) * 3) + 1, 3);
                
                steps.forEach((step, index) => {
                    if (index < progress) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });
            };
            
            inputs.forEach(input => {
                input.addEventListener('input', updateSteps);
                input.addEventListener('change', updateSteps);
            });
            
            // File input preview
            const fileInput = form.querySelector('input[type="file"]');
            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const fileName = this.files[0].name;
                        const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2);
                        
                        let preview = this.parentElement.querySelector('.file-preview');
                        if (!preview) {
                            preview = document.createElement('div');
                            preview.className = 'file-preview';
                            preview.style.cssText = 'margin-top: 0.5rem; font-size: 0.875rem; color: var(--gray-600);';
                            this.parentElement.appendChild(preview);
                        }
                        
                        preview.innerHTML = `<strong>${fileName}</strong> (${fileSize} MB)`;
                    }
                });
            }
            
            // Form validation enhancement
            form.addEventListener('wpcf7invalid', function(e) {
                const firstError = form.querySelector('.wpcf7-not-valid');
                if (firstError) {
                    setTimeout(() => {
                        firstError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstError.focus();
                    }, 100);
                }
            });
            
            // Success handling
            form.addEventListener('wpcf7mailsent', function(e) {
                // Update all steps to complete
                steps.forEach(step => step.classList.add('active'));
                
                // Smooth scroll to success message
                setTimeout(() => {
                    const response = form.querySelector('.wpcf7-response-output');
                    if (response) {
                        response.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }, 300);
                
                // Optional: Show confetti or success animation
                if (typeof confetti !== 'undefined') {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 }
                    });
                }
            });
        };
        
        // ===== Header Fix for Fixed Positioning =====
        const fixHeader = () => {
            const header = document.querySelector('header, .site-header, #masthead');
            const main = document.querySelector('.karriere-page');
            
            if (header && main) {
                const headerHeight = header.offsetHeight;
                main.style.marginTop = headerHeight + 'px';
                
                // Update on resize
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        const newHeight = header.offsetHeight;
                        main.style.marginTop = newHeight + 'px';
                    }, 250);
                });
                
                // Handle admin bar
                if (document.body.classList.contains('admin-bar')) {
                    const adminBar = document.querySelector('#wpadminbar');
                    if (adminBar) {
                        const adminBarHeight = adminBar.offsetHeight;
                        header.style.top = adminBarHeight + 'px';
                    }
                }
            }
        };
        
        // ===== Parallax Effect =====
        const initParallax = () => {
            const heroSection = document.querySelector('.hero-section');
            if (!heroSection) return;
            
            let ticking = false;
            const updateParallax = () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                if (heroSection.style.transform !== `translateY(${rate}px)`) {
                    heroSection.style.transform = `translateY(${rate}px)`;
                }
                
                ticking = false;
            };
            
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
        };
        
        // ===== Initialize AOS (Animate on Scroll) =====
        const initAOS = () => {
            const elements = document.querySelectorAll('[data-aos]');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });
            
            elements.forEach(el => observer.observe(el));
        };
        
        // ===== Lazy Loading Images =====
        const lazyLoadImages = () => {
            const images = document.querySelectorAll('img[loading="lazy"]');
            
            if ('loading' in HTMLImageElement.prototype) {
                // Browser supports native lazy loading
                return;
            }
            
            // Fallback for older browsers
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            images.forEach(img => imageObserver.observe(img));
        };
        
        // ===== Performance Monitoring =====
        const monitorPerformance = () => {
            if ('PerformanceObserver' in window) {
                const perfObserver = new PerformanceObserver((list) => {
                    for (const entry of list.getEntries()) {
                        if (entry.entryType === 'largest-contentful-paint') {
                            console.log('LCP:', entry.startTime);
                        }
                    }
                });
                
                perfObserver.observe({ entryTypes: ['largest-contentful-paint'] });
            }
        };
        
        // ===== Initialize Everything =====
        const init = () => {
            fixHeader();
            smoothScroll();
            animateNumbers();
            initFilters();
            enhanceForm();
            initParallax();
            initAOS();
            lazyLoadImages();
            monitorPerformance();
        };
        
        init();
        
        // Re-initialize form after CF7 reload
        document.addEventListener('wpcf7submit', () => {
            setTimeout(enhanceForm, 500);
        });
    });
})();
</script>

<?php get_footer(); ?>