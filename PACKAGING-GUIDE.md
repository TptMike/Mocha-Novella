# Packaging Mocha Novella Theme for Live Site

## Method 1: ZIP File Upload (Recommended for First Time)

### Step 1: Create the ZIP File

1. Navigate to your theme folder: `wp-content/themes/mike-personal/`

2. Select ALL files and folders inside the `mike-personal` directory:
   - ✅ 404.php
   - ✅ archive.php
   - ✅ comments.php
   - ✅ footer.php
   - ✅ functions.php
   - ✅ header.php
   - ✅ index.php
   - ✅ page.php
   - ✅ search.php
   - ✅ searchform.php
   - ✅ sidebar.php
   - ✅ single.php
   - ✅ style.css
   - ✅ screenshot.png (your theme preview image)
   - ✅ js/ folder (contains theme.js)
   - ❌ Optional: DESIGN.md, README.md, SETUP.md, THEME-GUIDE.md, SCREENSHOT-README.txt (documentation files - you can include or exclude)

3. Right-click → "Send to" → "Compressed (zipped) folder" (Windows)
   OR
   Right-click → "Compress" (Mac)

4. Name the file: `mocha-novella.zip` (or `mike-personal.zip` - the folder name doesn't matter)

### Step 2: Upload to Live Site

#### Option A: Via WordPress Admin (Easiest)

1. Log into your live WordPress site admin dashboard
2. Go to **Appearance** → **Themes**
3. Click **Add New** button at the top
4. Click **Upload Theme** button
5. Click **Choose File** and select your `mocha-novella.zip` file
6. Click **Install Now**
7. After installation, click **Activate** to activate the theme
8. Go to **Appearance** → **Customize** to configure your theme settings

#### Option B: Via FTP/File Manager

1. Upload the ZIP file to your server (via FTP or hosting file manager)
2. Extract the ZIP file to: `/wp-content/themes/`
3. Make sure the extracted folder is named `mike-personal` (it should be if you zipped the folder correctly)
4. Log into WordPress Admin → **Appearance** → **Themes**
5. Find "Mocha Novella" and click **Activate**

---

## Method 2: Direct FTP Transfer (For Updates)

If you're updating an existing theme installation:

1. Use an FTP client (FileZilla, WinSCP, etc.) or your hosting file manager
2. Navigate to: `/wp-content/themes/mike-personal/` on your live site
3. Upload/overwrite the files you've changed:
   - `style.css`
   - `functions.php`
   - `footer.php`
   - Any other files you modified
   - `screenshot.png` (if you added it)

---

## Essential Files Checklist

✅ **Required Files:**
- `style.css` (must have theme header comment)
- `index.php`
- `functions.php`
- `header.php`
- `footer.php`
- `sidebar.php`
- `single.php` (for single posts)
- `page.php` (for pages)
- `archive.php` (for archive pages)
- `search.php` (for search results)
- `404.php` (for 404 errors)
- `comments.php` (for comments)
- `searchform.php` (search form template)
- `js/theme.js` (JavaScript functionality)

✅ **Recommended:**
- `screenshot.png` (1200x900px) - Theme preview image

❌ **Optional/Not Needed on Live Site:**
- Documentation files (README.md, DESIGN.md, etc.)
- Development notes
- `.git` folder (if present)

---

## After Installation - Setup Checklist

1. **Activate the Theme**
   - Appearance → Themes → Activate "Mocha Novella"

2. **Configure Theme Options**
   - Appearance → Customize → Theme Options
   - Add your social media links
   - Customize footer text (optional)
   - Adjust site title font size

3. **Set Up Menus**
   - Appearance → Menus
   - Create a menu and assign it to "Primary Menu" location

4. **Configure Widgets**
   - Appearance → Widgets
   - Add widgets to "Sidebar" area (Search, Recent Posts, etc.)

5. **Set Up Your Profile**
   - Users → Your Profile
   - Add bio and profile picture (used in sidebar)

6. **Test Everything**
   - Check homepage
   - Check single post pages
   - Check pages
   - Test mobile responsiveness
   - Test search functionality

---

## Quick Command Line Method (Advanced)

If you have SSH access to your live server:

```bash
# On your local machine, create the zip
cd wp-content/themes
zip -r mocha-novella.zip mike-personal/

# Upload via SCP
scp mocha-novella.zip user@yoursite.com:/path/to/wordpress/wp-content/themes/

# SSH into your server
ssh user@yoursite.com

# Navigate and extract
cd /path/to/wordpress/wp-content/themes/
unzip mocha-novella.zip
chmod -R 755 mike-personal/
```

---

## Troubleshooting

**Theme doesn't show up in WordPress:**
- Make sure `style.css` has the correct theme header
- Check that the folder structure is correct
- Verify file permissions (755 for folders, 644 for files)

**Styles not loading:**
- Check that `style.css` is in the theme root
- Clear your browser cache and WordPress cache
- Check WordPress → Appearance → Themes shows the theme as active

**Functions not working:**
- Check that `functions.php` is in the theme root
- Look for PHP errors in WordPress debug log
- Ensure PHP version is 7.4 or higher

---

## Version Notes

Your current theme version is **1.0.0**. When you make updates in the future:
1. Update the version number in `style.css` (line 10)
2. Create a new zip file
3. Upload and overwrite on your live site

Happy publishing! ☕📚

