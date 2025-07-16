# SpecSec Professional WordPress Theme

A professional WordPress theme designed specifically for SpecSec - a premium security services company specializing in event security, crowd management, and professional security solutions.

## Features

- **Modern & Professional Design**: Clean, contemporary design with gold/brown color scheme
- **Fully Responsive**: Optimized for all devices - mobile, tablet, and desktop
- **Comprehensive Customizer**: Easy-to-use WordPress customizer with all content areas
- **Page-Specific Styling**: Separate CSS and JavaScript files for each page
- **SEO Optimized**: Built with SEO best practices
- **Performance Optimized**: Fast loading times and optimized code
- **Accessibility Compliant**: WCAG 2.1 AA compliant
- **GDPR Compliant**: Includes privacy policy and cookie management

## Pages Included

1. **Home Page** - Hero section, services overview, statistics, testimonials
2. **Team SpecSec** - Team gallery, service descriptions, research projects
3. **Leistungen** - Detailed service descriptions (VSD, VOD, Projektierung)
4. **Karriere (Job Portal)** - Job listings, application forms, benefits
5. **Kontakt** - Contact information, forms, certifications
6. **Login Portal** - Employee and partner login areas
7. **Datenschutz** - Privacy policy page
8. **Impressum** - Legal imprint page

## Installation

1. Download the theme files
2. Upload to your WordPress `/wp-content/themes/` directory
3. Activate the theme in WordPress admin
4. Go to Appearance > Customize to configure the theme

## File Structure

```
specsec-theme/
├── style.css                 # Main theme stylesheet
├── functions.php            # Theme functions and setup
├── index.php               # Main template file
├── front-page.php          # Home page template
├── header.php              # Header template
├── footer.php              # Footer template
├── page.php                # Default page template
├── single.php              # Single post template
├── 404.php                 # 404 error page
├── searchform.php          # Search form
├── sidebar.php             # Sidebar template
├── assets/
│   ├── css/
│   │   ├── style.css       # Main styles
│   │   ├── responsive.css  # Responsive styles
│   │   ├── home.css        # Home page styles
│   │   ├── team.css        # Team page styles
│   │   ├── services.css    # Services page styles
│   │   ├── jobportal.css   # Job portal styles
│   │   ├── contact.css     # Contact page styles
│   │   └── login.css       # Login portal styles
│   └── js/
│       ├── main.js         # Main JavaScript
│       ├── navigation.js   # Navigation JavaScript
│       ├── home.js         # Home page JavaScript
│       ├── team.js         # Team page JavaScript
│       ├── jobportal.js    # Job portal JavaScript
│       └── contact.js      # Contact page JavaScript
├── inc/
│   ├── theme-setup.php     # Theme setup functions
│   ├── customizer.php      # WordPress customizer
│   ├── custom-post-types.php
│   └── ajax-handlers.php
├── page-templates/
│   ├── page-team.php       # Team page template
│   ├── page-services.php   # Services page template
│   ├── page-jobportal.php  # Job portal template
│   ├── page-contact.php    # Contact page template
│   ├── page-login.php      # Login portal template
│   ├── page-privacy.php    # Privacy policy template
│   └── page-imprint.php    # Imprint template
└── template-parts/
    ├── hero-section.php
    └── navigation.php
```

## Theme Customization

### WordPress Customizer Options

Access via **Appearance > Customize > SpecSec Einstellungen**:

#### Company Information
- Phone Number
- Contact Email
- Jobs Email
- Company Address

#### Hero Section
- Hero Title
- Hero Subtitle
- Hero Description
- Background Image

#### Statistics
- Number of Employees
- Events per Year
- Years of Experience

#### Testimonials
- Testimonial 1 (Name & Text)
- Testimonial 2 (Name & Text)
- Testimonial 3 (Name & Text)

#### Services
- VSD Title & Description
- VOD Title & Description
- Projektierung Title & Description

#### Footer
- Footer Text
- Certifications

#### Colors
- Primary Color (Gold)
- Secondary Color (Brown)
- Accent Color (Dark)

## Development

### CSS Architecture

The theme uses a modular CSS architecture:

- **style.css**: Main theme styles and variables
- **responsive.css**: Responsive design rules
- **Page-specific CSS**: Individual files for each page

### JavaScript Structure

- **main.js**: Core functionality and utilities
- **navigation.js**: Navigation and menu functionality
- **Page-specific JS**: Individual files for each page's functionality

### Color Variables

The theme uses CSS custom properties for consistent theming:

```css
:root {
    --primary-gold: #B8860B;
    --secondary-brown: #8B4513;
    --accent-dark: #1a1a1a;
    --light-gold: #DAA520;
    --dark-brown: #654321;
}
```

## Content Management

### Creating Pages

1. Create a new page in WordPress
2. Select the appropriate page template from the "Page Attributes" meta box
3. Add content using the WordPress editor
4. Customize via the WordPress Customizer

### Customizing Content

Most content can be customized through the WordPress Customizer without touching code:

- Navigate to **Appearance > Customize**
- Select **SpecSec Einstellungen**
- Modify text, colors, and settings
- Preview changes live
- Click "Publish" to save

## Support

For support and customization requests, please contact:
- Email: support@specsec.de
- Phone: +49 2271 98950

## License

This theme is licensed under the GPL v3 License.

## Version History

- **v1.0.0** - Initial release with all core features
- Complete SpecSec branding and functionality
- Responsive design and accessibility features
- Comprehensive customizer integration