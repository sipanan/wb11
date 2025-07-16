<?php
/**
 * Template Name: Kontakt
 * Simple Contact Page
 */

get_header(); ?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Kontakt</h1>
        <p class="hero-subtitle">Nehmen Sie Kontakt mit uns auf - wir sind für Sie da</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 1000px; margin: 0 auto;">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Kontaktieren Sie uns</h2>
                
                <div class="contact-item" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div class="contact-icon" style="width: 50px; height: 50px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h3>Telefon</h3>
                        <p>Rufen Sie uns an</p>
                        <a href="tel:022165058801" style="color: var(--primary-red); font-weight: 600;">0221 6505 8801</a>
                    </div>
                </div>
                
                <div class="contact-item" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div class="contact-icon" style="width: 50px; height: 50px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h3>E-Mail</h3>
                        <p>Schreiben Sie uns eine E-Mail</p>
                        <a href="mailto:info@safecologne.de" style="color: var(--primary-red); font-weight: 600;">info@safecologne.de</a>
                    </div>
                </div>
                
                <div class="contact-item" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div class="contact-icon" style="width: 50px; height: 50px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h3>Adresse</h3>
                        <p>Besuchen Sie uns</p>
                        <address style="color: var(--text-dark); font-style: normal; font-weight: 600;">
                            Subbelrather Str. 15A<br>
                            50823 Köln
                        </address>
                    </div>
                </div>
                
                <div class="contact-item" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div class="contact-icon" style="width: 50px; height: 50px; background: var(--primary-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <h3>WhatsApp</h3>
                        <p>Chatten Sie mit uns</p>
                        <a href="https://wa.me/491701234567" style="color: var(--primary-red); font-weight: 600;">+49 170 1234567</a>
                    </div>
                </div>
                
                <div class="business-hours" style="margin-top: 3rem; padding: 2rem; background: #f8f9fa; border-radius: 8px;">
                    <h3>Geschäftszeiten</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; margin-top: 1rem;">
                        <span>Montag - Freitag:</span>
                        <span>08:00 - 18:00 Uhr</span>
                        <span>Samstag:</span>
                        <span>09:00 - 14:00 Uhr</span>
                        <span>Sonntag:</span>
                        <span>Geschlossen</span>
                        <span style="color: var(--primary-red); font-weight: 600;">Notruf:</span>
                        <span style="color: var(--primary-red); font-weight: 600;">24/7 erreichbar</span>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Nachricht senden</h2>
                
                <form id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                    <div class="form-group">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">E-Mail *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="company" class="form-label">Unternehmen</label>
                        <input type="text" id="company" name="company" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="service" class="form-label">Gewünschter Service</label>
                        <select id="service" name="service" class="form-control">
                            <option value="">Bitte wählen...</option>
                            <option value="objektschutz">Objektschutz</option>
                            <option value="personenschutz">Personenschutz</option>
                            <option value="veranstaltungen">Veranstaltungssicherheit</option>
                            <option value="beratung">Sicherheitsberatung</option>
                            <option value="andere">Andere</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">Nachricht *</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" required>
                            <span>Ich stimme der <a href="/datenschutz" style="color: var(--primary-red);">Datenschutzerklärung</a> zu *</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%;">Nachricht senden</button>
                    
                    <input type="hidden" name="action" value="safe_cologne_contact_form">
                    <?php wp_nonce_field('safe_cologne_contact_nonce', 'contact_nonce'); ?>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitButton = this.querySelector('button[type="submit"]');
    
    submitButton.textContent = 'Wird gesendet...';
    submitButton.disabled = true;
    
    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Nachricht wurde erfolgreich gesendet!');
            this.reset();
        } else {
            alert('Fehler beim Senden der Nachricht. Bitte versuchen Sie es erneut.');
        }
    })
    .catch(error => {
        alert('Fehler beim Senden der Nachricht. Bitte versuchen Sie es erneut.');
    })
    .finally(() => {
        submitButton.textContent = 'Nachricht senden';
        submitButton.disabled = false;
    });
});
</script>

<style>
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    max-width: 1000px;
    margin: 0 auto;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-red);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.contact-item h3 {
    margin: 0 0 0.25rem 0;
    color: var(--text-dark);
}

.contact-item p {
    margin: 0 0 0.5rem 0;
    color: var(--text-light);
    font-size: 0.9rem;
}

.contact-item a {
    color: var(--primary-red);
    font-weight: 600;
    text-decoration: none;
}

.contact-item a:hover {
    text-decoration: underline;
}

.business-hours {
    margin-top: 3rem;
    padding: 2rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.business-hours h3 {
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.business-hours > div {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.5rem;
    margin-top: 1rem;
}

@media (max-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .contact-item {
        flex-direction: column;
        text-align: center;
    }
    
    .business-hours > div {
        grid-template-columns: 1fr;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>