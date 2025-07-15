/**
 * Safe Cologne Gutenberg Blocks Editor
 * Version: 1.0.0
 */

(function() {
    'use strict';
    
    const { registerBlockType } = wp.blocks;
    const { InspectorControls, BlockControls } = wp.blockEditor;
    const { PanelBody, SelectControl, ToggleControl, TextControl, ColorPicker, TextareaControl, RangeControl } = wp.components;
    const { Fragment } = wp.element;
    const { __ } = wp.i18n;
    
    // Service Showcase Block
    registerBlockType('safe-cologne/service-showcase', {
        title: __('Service Showcase', 'safe-cologne'),
        icon: 'shield',
        category: 'safe-cologne',
        description: __('Zeigt Sicherheitsdienste in einem ansprechenden Grid an', 'safe-cologne'),
        keywords: ['service', 'security', 'showcase'],
        
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { columns, showPricing, showDescription } = attributes;
            
            return (
                Fragment(null,
                    InspectorControls(null,
                        PanelBody({ title: __('Einstellungen', 'safe-cologne') },
                            RangeControl({
                                label: __('Spalten', 'safe-cologne'),
                                value: columns,
                                onChange: (value) => setAttributes({ columns: value }),
                                min: 1,
                                max: 4
                            }),
                            ToggleControl({
                                label: __('Preise anzeigen', 'safe-cologne'),
                                checked: showPricing,
                                onChange: (value) => setAttributes({ showPricing: value })
                            }),
                            ToggleControl({
                                label: __('Beschreibung anzeigen', 'safe-cologne'),
                                checked: showDescription,
                                onChange: (value) => setAttributes({ showDescription: value })
                            })
                        )
                    ),
                    wp.element.createElement('div', { className: 'sc-service-showcase-editor' },
                        wp.element.createElement('div', { className: 'components-placeholder' },
                            wp.element.createElement('div', { className: 'components-placeholder__label' },
                                wp.element.createElement('span', { className: 'dashicon dashicons-shield' }),
                                __('Service Showcase', 'safe-cologne')
                            ),
                            wp.element.createElement('div', { className: 'components-placeholder__instructions' },
                                __('Zeigt alle Sicherheitsdienste in einem Grid an', 'safe-cologne')
                            )
                        )
                    )
                )
            );
        },
        
        save: function() {
            return null; // Server-side rendering
        }
    });
    
    // Team Member Block
    registerBlockType('safe-cologne/team-member', {
        title: __('Team Member', 'safe-cologne'),
        icon: 'admin-users',
        category: 'safe-cologne',
        description: __('Zeigt ein Teammitglied mit Details an', 'safe-cologne'),
        keywords: ['team', 'member', 'staff'],
        
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { memberId, showBio, showCertifications, style } = attributes;
            
            const teamMembers = safeCologneBlocks.teamMembers || [];
            const memberOptions = teamMembers.map(member => ({
                label: member.title + (member.position ? ' (' + member.position + ')' : ''),
                value: member.id
            }));
            
            return (
                Fragment(null,
                    InspectorControls(null,
                        PanelBody({ title: __('Teammitglied', 'safe-cologne') },
                            SelectControl({
                                label: __('Teammitglied auswählen', 'safe-cologne'),
                                value: memberId,
                                options: [
                                    { label: __('Teammitglied auswählen...', 'safe-cologne'), value: 0 },
                                    ...memberOptions
                                ],
                                onChange: (value) => setAttributes({ memberId: parseInt(value) })
                            }),
                            SelectControl({
                                label: __('Stil', 'safe-cologne'),
                                value: style,
                                options: [
                                    { label: __('Karte', 'safe-cologne'), value: 'card' },
                                    { label: __('Horizontal', 'safe-cologne'), value: 'horizontal' }
                                ],
                                onChange: (value) => setAttributes({ style: value })
                            }),
                            ToggleControl({
                                label: __('Biografie anzeigen', 'safe-cologne'),
                                checked: showBio,
                                onChange: (value) => setAttributes({ showBio: value })
                            }),
                            ToggleControl({
                                label: __('Zertifizierungen anzeigen', 'safe-cologne'),
                                checked: showCertifications,
                                onChange: (value) => setAttributes({ showCertifications: value })
                            })
                        )
                    ),
                    wp.element.createElement('div', { className: 'sc-team-member-editor' },
                        wp.element.createElement('div', { className: 'components-placeholder' },
                            wp.element.createElement('div', { className: 'components-placeholder__label' },
                                wp.element.createElement('span', { className: 'dashicon dashicons-admin-users' }),
                                __('Team Member', 'safe-cologne')
                            ),
                            wp.element.createElement('div', { className: 'components-placeholder__instructions' },
                                memberId ? 
                                    __('Teammitglied ID: ', 'safe-cologne') + memberId :
                                    __('Bitte wählen Sie ein Teammitglied aus', 'safe-cologne')
                            )
                        )
                    )
                )
            );
        },
        
        save: function() {
            return null; // Server-side rendering
        }
    });
    
    // Testimonial Block
    registerBlockType('safe-cologne/testimonial', {
        title: __('Testimonial', 'safe-cologne'),
        icon: 'format-quote',
        category: 'safe-cologne',
        description: __('Zeigt eine Kundenreferenz an', 'safe-cologne'),
        keywords: ['testimonial', 'review', 'reference'],
        
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { testimonialId, showRating, showCompany, style } = attributes;
            
            const testimonials = safeCologneBlocks.testimonials || [];
            const testimonialOptions = testimonials.map(testimonial => ({
                label: testimonial.title + (testimonial.client ? ' (' + testimonial.client + ')' : ''),
                value: testimonial.id
            }));
            
            return (
                Fragment(null,
                    InspectorControls(null,
                        PanelBody({ title: __('Testimonial', 'safe-cologne') },
                            SelectControl({
                                label: __('Testimonial auswählen', 'safe-cologne'),
                                value: testimonialId,
                                options: [
                                    { label: __('Testimonial auswählen...', 'safe-cologne'), value: 0 },
                                    ...testimonialOptions
                                ],
                                onChange: (value) => setAttributes({ testimonialId: parseInt(value) })
                            }),
                            SelectControl({
                                label: __('Stil', 'safe-cologne'),
                                value: style,
                                options: [
                                    { label: __('Zitat', 'safe-cologne'), value: 'quote' },
                                    { label: __('Standard', 'safe-cologne'), value: 'standard' }
                                ],
                                onChange: (value) => setAttributes({ style: value })
                            }),
                            ToggleControl({
                                label: __('Bewertung anzeigen', 'safe-cologne'),
                                checked: showRating,
                                onChange: (value) => setAttributes({ showRating: value })
                            }),
                            ToggleControl({
                                label: __('Unternehmen anzeigen', 'safe-cologne'),
                                checked: showCompany,
                                onChange: (value) => setAttributes({ showCompany: value })
                            })
                        )
                    ),
                    wp.element.createElement('div', { className: 'sc-testimonial-editor' },
                        wp.element.createElement('div', { className: 'components-placeholder' },
                            wp.element.createElement('div', { className: 'components-placeholder__label' },
                                wp.element.createElement('span', { className: 'dashicon dashicons-format-quote' }),
                                __('Testimonial', 'safe-cologne')
                            ),
                            wp.element.createElement('div', { className: 'components-placeholder__instructions' },
                                testimonialId ? 
                                    __('Testimonial ID: ', 'safe-cologne') + testimonialId :
                                    __('Bitte wählen Sie ein Testimonial aus', 'safe-cologne')
                            )
                        )
                    )
                )
            );
        },
        
        save: function() {
            return null; // Server-side rendering
        }
    });
    
    // Call to Action Block
    registerBlockType('safe-cologne/call-to-action', {
        title: __('Call to Action', 'safe-cologne'),
        icon: 'megaphone',
        category: 'safe-cologne',
        description: __('Erstellt einen ansprechenden Call-to-Action Bereich', 'safe-cologne'),
        keywords: ['cta', 'call-to-action', 'button'],
        
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, description, buttonText, buttonUrl, backgroundColor, textColor, style } = attributes;
            
            return (
                Fragment(null,
                    InspectorControls(null,
                        PanelBody({ title: __('Inhalt', 'safe-cologne') },
                            TextControl({
                                label: __('Titel', 'safe-cologne'),
                                value: title,
                                onChange: (value) => setAttributes({ title: value })
                            }),
                            TextareaControl({
                                label: __('Beschreibung', 'safe-cologne'),
                                value: description,
                                onChange: (value) => setAttributes({ description: value })
                            }),
                            TextControl({
                                label: __('Button Text', 'safe-cologne'),
                                value: buttonText,
                                onChange: (value) => setAttributes({ buttonText: value })
                            }),
                            TextControl({
                                label: __('Button URL', 'safe-cologne'),
                                value: buttonUrl,
                                onChange: (value) => setAttributes({ buttonUrl: value })
                            })
                        ),
                        PanelBody({ title: __('Styling', 'safe-cologne') },
                            SelectControl({
                                label: __('Stil', 'safe-cologne'),
                                value: style,
                                options: [
                                    { label: __('Standard', 'safe-cologne'), value: 'default' },
                                    { label: __('Outline', 'safe-cologne'), value: 'outline' }
                                ],
                                onChange: (value) => setAttributes({ style: value })
                            }),
                            wp.element.createElement('div', { style: { marginBottom: '16px' } },
                                wp.element.createElement('label', { style: { display: 'block', marginBottom: '8px' } },
                                    __('Hintergrundfarbe', 'safe-cologne')
                                ),
                                wp.element.createElement(ColorPicker, {
                                    color: backgroundColor,
                                    onChange: (value) => setAttributes({ backgroundColor: value })
                                })
                            ),
                            wp.element.createElement('div', { style: { marginBottom: '16px' } },
                                wp.element.createElement('label', { style: { display: 'block', marginBottom: '8px' } },
                                    __('Textfarbe', 'safe-cologne')
                                ),
                                wp.element.createElement(ColorPicker, {
                                    color: textColor,
                                    onChange: (value) => setAttributes({ textColor: value })
                                })
                            )
                        )
                    ),
                    wp.element.createElement('div', { 
                        className: 'sc-cta-block sc-cta-' + style,
                        style: { 
                            backgroundColor: backgroundColor,
                            color: textColor,
                            padding: '2rem',
                            textAlign: 'center',
                            borderRadius: '12px'
                        }
                    },
                        title && wp.element.createElement('h3', { className: 'sc-cta-title' }, title),
                        description && wp.element.createElement('p', { className: 'sc-cta-description' }, description),
                        buttonText && wp.element.createElement('a', { 
                            href: buttonUrl,
                            className: 'sc-cta-button',
                            style: { 
                                display: 'inline-block',
                                padding: '1rem 2rem',
                                background: 'rgba(255,255,255,0.2)',
                                color: 'inherit',
                                textDecoration: 'none',
                                borderRadius: '6px',
                                fontWeight: '600'
                            }
                        }, buttonText)
                    )
                )
            );
        },
        
        save: function() {
            return null; // Server-side rendering
        }
    });
    
    // Register block category
    wp.blocks.getCategories().push({
        slug: 'safe-cologne',
        title: __('Safe Cologne', 'safe-cologne'),
        icon: 'shield'
    });
    
})();