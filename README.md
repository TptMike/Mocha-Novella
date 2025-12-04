# Mike Personal - WordPress Theme

A custom WordPress theme designed for technically inclined creatives who want to showcase their books, projects, and build a fanbase while maintaining excellent readability and reflecting their unique personality.

## Features

### Reader-Focused Design
- **Optimal Typography**: Large, readable fonts with comfortable line spacing (1.7-1.8)
- **Content Width**: Optimal reading width of 700px for maximum readability
- **Reading Time**: Automatic reading time estimates for each post
- **Reading Progress Bar**: Visual progress indicator on single posts

### Creative Technical Touches
- **Code-Friendly Styling**: Beautiful syntax highlighting for code blocks
- **Modern CSS Variables**: Easy color customization
- **Smooth Animations**: Subtle hover effects and transitions
- **Creative Accents**: Arrow indicators on "Continue reading" links

### Personal Branding
- **Custom Logo Support**: Upload your own logo
- **Social Media Integration**: Footer social links (Twitter, Facebook, Instagram, LinkedIn, GitHub, Email)
- **Author Showcase**: Prominent author information on posts
- **Project & Book Ready**: Perfect for showcasing creative work

### WordPress Features
- **Full Theme Support**: Post thumbnails, custom logo, HTML5 markup
- **Navigation Menus**: Primary and footer menu locations
- **Widget Areas**: Sidebar and footer widget areas
- **Custom Image Sizes**: Featured images and thumbnails
- **Responsive Design**: Mobile-friendly layout
- **Accessibility Ready**: Screen reader support, skip links

## Installation

1. Upload the `mike-personal` folder to `/wp-content/themes/`
2. Activate the theme through the 'Appearance' menu in WordPress
3. Go to **Appearance > Customize** to configure theme options

## Customization

### Setting Up Your Menu

1. Go to **Appearance > Menus**
2. Create a new menu or select an existing one
3. Add pages, posts, or custom links
4. Assign the menu to "Primary Menu" location

### Adding a Custom Logo

1. Go to **Appearance > Customize > Site Identity**
2. Click "Select Logo"
3. Upload your logo image
4. Adjust the logo size if needed

### Configuring Social Links

The theme supports social media links in the footer. You can customize these through:

1. **Appearance > Customize > Theme Options** (if you add customizer controls)
2. Or edit `footer.php` directly to add your social media URLs

Currently supported platforms:
- Twitter
- Facebook
- Instagram
- LinkedIn
- GitHub
- Email

### Changing Colors

The theme uses CSS variables for easy color customization. Edit `style.css` and modify the `:root` variables:

```css
:root {
    --color-primary: #2563eb;        /* Main brand color */
    --color-secondary: #7c3aed;      /* Secondary color */
    --color-accent: #f59e0b;         /* Accent color */
    /* ... more colors ... */
}
```

### Widget Areas

The theme includes two widget areas:

1. **Sidebar** (`sidebar-1`): Appears on blog posts and archive pages
2. **Footer Widget Area** (`footer-1`): Appears in the footer

Add widgets through **Appearance > Widgets**.

## File Structure

```
mike-personal/
├── style.css          # Main stylesheet with theme header
├── functions.php      # Theme functions and setup
├── header.php         # Site header
├── footer.php         # Site footer
├── index.php          # Main blog template
├── single.php         # Single post template
├── page.php           # Page template
├── archive.php        # Archive template
├── search.php         # Search results template
├── 404.php            # 404 error template
├── sidebar.php        # Sidebar template
├── comments.php       # Comments template
├── searchform.php     # Search form template
├── js/
│   └── theme.js       # Theme JavaScript
└── README.md          # This file
```

## Customization Tips

### For Authors

1. **Create a "Books" Category**: Use this for book-related posts
2. **Featured Images**: Always use featured images for better visual appeal
3. **Reading Lists**: Use the sidebar widget to create reading lists
4. **Author Bio**: Consider adding an author bio widget in the sidebar

### For Project Showcases

1. **Project Categories**: Create categories for different project types
2. **Image Galleries**: Use WordPress galleries to showcase project images
3. **Featured Projects**: Use sticky posts to highlight important projects

### Technical Blogging

1. **Code Blocks**: The theme has special styling for code blocks
2. **Syntax Highlighting**: Consider installing a syntax highlighting plugin
3. **Technical Tags**: Use tags to organize technical topics

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Credits

Built with attention to detail for authors, creators, and technical bloggers.

## License

This theme is licensed under the GNU General Public License v2 or later.

