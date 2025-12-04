# Mocha Novella

**Contributors:** mike  
**Tags:** blog, portfolio, custom-menu, featured-images, threaded-comments, translation-ready, editor-style, custom-colors, responsive-layout, full-width-template, sticky-post, theme-options  
**Requires at least:** 6.0  
**Tested up to:** 6.9  
**Requires PHP:** 7.4  
**Stable tag:** 1.0.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

A cozy WordPress theme for authors and creatives, inspired by books, coffee, and music. Perfect for writers showcasing their work, building a fanbase, and sharing their creative journey in a warm, inviting space.

## Description

**Mocha Novella** is a beautifully crafted WordPress theme designed for authors, bloggers, and creative professionals. Inspired by the warm atmosphere of a coffee shop and the comfort of a well-loved library, this theme creates an inviting space where readers feel at home.

### Key Features

#### 📚 Reader-Focused Design
- **Optimal Typography**: Rokkitt for headings, Georgia for body text - perfect for extended reading
- **Wide Content Width**: 1300px content area for comfortable reading without overwhelming the screen
- **Reading Time Estimates**: Automatic calculation and display of reading time for each post
- **Beautiful Bookshelf Background**: Subtle, fixed bookshelf pattern that creates atmosphere without distraction

#### ☕ Coffee & Books Aesthetic
- **Warm Color Palette**: Rich coffee browns, creams, and amber tones
- **White Content Cards**: Clean, readable content panels that stand out
- **Customizable Avatar**: Upload your own author avatar via the Customizer
- **Author Profile Sidebar**: Showcase your bio, tagline, and social links prominently

#### 🎵 Modern Functionality
- **Infinite Dropdown Menus**: Unlimited nesting levels for complex navigation structures
- **Responsive Design**: Looks great on all devices from mobile to desktop
- **Customizable Excerpts**: Choose full post or excerpt display with adjustable word count
- **Featured Image Support**: Banner-style featured images that showcase your content

#### ⚙️ WordPress Features
- **Full Customizer Integration**: Easily customize colors, fonts, social links, and more
- **Widget Ready**: Sidebar and footer widget areas
- **Navigation Menus**: Primary menu with dropdown support
- **Custom Logo Support**: Upload your brand logo
- **Translation Ready**: All strings are prepared for translation

## Installation

### From WordPress Admin
1. Go to **Appearance > Themes > Add New**
2. Click **Upload Theme**
3. Choose the `mocha-novella.zip` file
4. Click **Install Now**
5. Activate the theme

### Manual Installation
1. Extract the zip file to get the `mocha-novella` folder
2. Upload the `mocha-novella` folder to `/wp-content/themes/` directory
3. Go to **Appearance > Themes** and activate **Mocha Novella**

### Requirements
- WordPress 6.0 or higher
- PHP 7.4 or higher

## Frequently Asked Questions

### How do I customize the theme colors?
The theme uses a warm coffee and books color palette. Colors can be customized by editing the CSS variables in `style.css` or by creating a child theme.

### Can I change the sidebar layout?
Yes! The sidebar appears on the right side of the content. You can add widgets via **Appearance > Widgets** or hide it by removing all widgets.

### How do I add my social media links?
Go to **Appearance > Customize > Social Media Links** and enter your social media URLs. Supported platforms include Twitter, Facebook, Instagram, Pinterest, LinkedIn, GitHub, and Email.

### How do I customize the author avatar?
Go to **Appearance > Customize > Theme Options > Author Avatar Image** to upload your custom avatar. If no image is uploaded, your WordPress user avatar will be used.

### Can I show full posts instead of excerpts on archive pages?
Yes! Go to **Appearance > Customize > Post Display Options** and select "Full Post" or "Excerpt". You can also adjust the excerpt length.

## Customization

### Theme Options (Customizer)

**Appearance > Customize > Theme Options**
- Footer Text
- Site Title Font Size
- Author Avatar Image

**Appearance > Customize > Post Display Options**
- Archive Display Type (Full Post or Excerpt)
- Excerpt Length (10-200 words)

**Appearance > Customize > Social Media Links**
- Twitter/X URL
- Facebook URL
- Instagram URL
- Pinterest URL
- RSS Feed URL
- LinkedIn URL
- GitHub URL
- Email Address

### Menu Setup
1. Go to **Appearance > Menus**
2. Create or select a menu
3. Add items (pages, posts, custom links)
4. Assign to "Primary Menu" location
5. Menus support unlimited nesting levels

### Widget Areas
- **Sidebar** (`sidebar-1`): Right sidebar on posts and archives
- **Footer Widget Area** (`footer-1`): Footer widget area

### Custom Logo
1. Go to **Appearance > Customize > Site Identity**
2. Click "Select Logo"
3. Upload your logo (recommended: 400px width, flexible height)

## File Structure

```
mocha-novella/
├── style.css              # Main stylesheet with theme header
├── functions.php          # Theme functions and setup
├── header.php             # Site header
├── footer.php             # Site footer
├── sidebar.php            # Sidebar template
├── index.php              # Main blog template
├── single.php             # Single post template
├── page.php               # Page template
├── archive.php            # Archive template (categories, tags, author)
├── search.php             # Search results template
├── 404.php                # 404 error template
├── comments.php           # Comments template
├── searchform.php         # Search form template
├── screenshot.png         # Theme screenshot (1200x900px)
├── js/
│   └── theme.js           # Theme JavaScript
└── README.md              # This file
```

## Changelog

### 1.0.0
* Initial release
* Books, coffee, and music inspired design
* Customizable avatar via Customizer
* Infinite dropdown menu nesting
* Responsive layout
* Excerpt customization options
* Social media integration
* Reading time estimates
* Customizable content display

## Credits

**Theme Name:** Mocha Novella  
**Theme Author:** Mike  
**Author URI:** https://tptmike.com  
**Theme URI:** https://tptmike.com

### Fonts
- **Rokkitt**: Google Fonts (headings)
- **Georgia**: System font (body text)
- **Font Awesome 6.4.0**: Social media icons

### Inspiration
This theme was designed with authors, bloggers, and creative professionals in mind. The warm, inviting aesthetic reflects the cozy atmosphere of a coffee shop and the comfort of a well-loved library.

## Support

For support, feature requests, or bug reports, please visit:
- **Website:** https://tptmike.com
- **GitHub:** (Add your GitHub repository URL here)

## License

Mocha Novella WordPress Theme, Copyright (C) 2024  
Mocha Novella is distributed under the terms of the GNU GPL

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

## Development

### Requirements
- WordPress 6.0+
- PHP 7.4+
- Node.js (for development, if needed)

### Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

## Screenshots

1. Homepage with blog posts
2. Single post view
3. Archive page
4. Mobile responsive design

---

**Enjoy your new theme!** ☕📚✨
