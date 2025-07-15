# Safe Cologne Security WordPress Theme

A professional, enterprise-grade WordPress theme specifically designed for Safe Cologne Security Services (Sicherheitsdienst) in Cologne, Germany. Built with modern web standards, performance optimization, and security best practices.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Theme Structure](#theme-structure)
- [Configuration](#configuration)
- [Custom Post Types](#custom-post-types)
- [Page Templates](#page-templates)
- [Theme Customization](#theme-customization)
- [Development](#development)
- [Performance Optimization](#performance-optimization)
- [Security Features](#security-features)
- [Accessibility](#accessibility)
- [Browser Support](#browser-support)
- [Troubleshooting](#troubleshooting)
- [Changelog](#changelog)
- [License](#license)

## Features

### Core Features
- **Fully Responsive Design**: Mobile-first approach with breakpoints at 480px, 640px, 768px, 1024px
- **Custom Post Types**: Security Services, Team Members, Testimonials, Job Openings
- **SEO Optimized**: Schema.org markup, semantic HTML5, optimized meta tags, XML sitemap ready
- **Performance Focused**: Lazy loading, critical CSS, minified assets, optimized images
- **GDPR Compliant**: Cookie consent banner, privacy-focused features, data handling compliance
- **Multilingual Ready**: Full i18n support with German (de_DE) as default language
- **Accessibility**: WCAG 2.1 AA compliant with proper ARIA labels, keyboard navigation
- **Modern Design**: Clean layout with smooth CSS animations and transitions

### Technical Features
- **WordPress 6.0+ Compatible**: Tested up to WordPress 6.4
- **PHP 7.4+ Support**: Optimized for PHP 8.0+
- **Block Editor Support**: Gutenberg-ready with custom block styles
- **Custom Widgets**: Emergency contact, service showcase, testimonial slider
- **AJAX Forms**: Contact and job application forms with real-time validation
- **Custom Admin Dashboard**: Branded admin experience with quick stats
- **Advanced Custom Fields Ready**: ACF integration for easier content management
- **WooCommerce Compatible**: Optional e-commerce functionality for service bookings

## Requirements

### Minimum Requirements
- WordPress 5.8 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher OR MariaDB 10.1 or higher
- The mod_rewrite Apache module
- HTTPS support required

### Recommended Requirements
- WordPress 6.0 or higher
- PHP 8.0 or higher
- MySQL 8.0 or higher OR MariaDB 10.3 or higher
- Memory limit of 256 MB or higher
- Upload limit of 64 MB or higher
- Max execution time of 300 seconds

### Required PHP Extensions
- curl
- dom
- exif
- fileinfo
- hash
- json
- mbstring
- mysqli
- openssl
- pcre
- imagick or gd
- xml
- zip

## Installation

### Method 1: Upload via WordPress Admin

1. Download the theme ZIP file
2. Log in to your WordPress admin panel
3. Navigate to **Appearance > Themes**
4. Click **Add New** > **Upload Theme**
5. Choose the `safe-cologne-theme.zip` file
6. Click **Install Now**
7. Once installed, click **Activate**

### Method 2: FTP Upload

1. Extract the theme ZIP file on your computer
2. Connect to your server via FTP/SFTP
3. Navigate to `/wp-content/themes/`
4. Upload the entire `safe-cologne-theme` folder
5. Log in to WordPress admin
6. Go to **Appearance > Themes**
7. Find "Safe Cologne Security" and click **Activate**

### Method 3: Command Line Installation

```bash
# Navigate to your WordPress themes directory
cd /path/to/wordpress/wp-content/themes/

# Clone the theme (if using Git)
git clone https://github.com/your-repo/safe-cologne-theme.git

# Or download and extract
wget https://example.com/safe-cologne-theme.zip
unzip safe-cologne-theme.zip
rm safe-cologne-theme.zip

# Set proper permissions
find safe-cologne-theme -type d -exec chmod 755 {} \;
find safe-cologne-theme -type f -exec chmod 644 {} \;
