/**
 * Mocha Novella Theme JavaScript
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Mobile menu toggle (if you want to add mobile menu functionality later)
    const initMobileMenu = () => {
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-navigation');

        if (menuToggle && nav) {
            menuToggle.addEventListener('click', () => {
                nav.classList.toggle('toggled');
                menuToggle.setAttribute('aria-expanded', nav.classList.contains('toggled'));
            });
        }
    };

    // Dropdown menu functionality - supports infinite nesting
    const initDropdownMenus = () => {
        // Create toggle buttons for menu items with children
        const menuItemsWithChildren = document.querySelectorAll('.main-navigation .menu-item-has-children, .sidebar-navigation .menu-item-has-children');
        
        menuItemsWithChildren.forEach(menuItem => {
            const menuLink = menuItem.querySelector('> a');
            const submenu = menuItem.querySelector('> ul');
            
            if (menuLink && submenu) {
                // Create a toggle button for mobile
                const toggleButton = document.createElement('button');
                toggleButton.className = 'menu-toggle-dropdown';
                toggleButton.setAttribute('aria-expanded', 'false');
                toggleButton.setAttribute('aria-label', 'Toggle submenu');
                toggleButton.innerHTML = '<i class="fas fa-chevron-down"></i>';
                toggleButton.type = 'button';
                
                // Insert toggle button after the link
                menuLink.parentNode.insertBefore(toggleButton, menuLink.nextSibling);
                
                // Toggle dropdown when button is clicked
                toggleButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const isExpanded = menuItem.classList.toggle('menu-item-open');
                    toggleButton.setAttribute('aria-expanded', isExpanded);
                    
                    // Close other open menus at the same level
                    const siblings = Array.from(menuItem.parentElement.children);
                    siblings.forEach(sibling => {
                        if (sibling !== menuItem && sibling.classList.contains('menu-item-has-children')) {
                            sibling.classList.remove('menu-item-open');
                            const siblingToggle = sibling.querySelector('.menu-toggle-dropdown');
                            if (siblingToggle) {
                                siblingToggle.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });
                });
            }
        });

        // Handle focus for keyboard navigation
        const menuItems = document.querySelectorAll('.main-navigation a, .sidebar-navigation a');
        menuItems.forEach(item => {
            item.addEventListener('focus', function() {
                let parentLi = this.parentElement;
                // Traverse up to find all parent menu items
                while (parentLi && parentLi.tagName === 'LI') {
                    const submenu = parentLi.querySelector('ul');
                    if (submenu && parentLi.parentElement.tagName === 'UL') {
                        parentLi.classList.add('focus');
                    }
                    parentLi = parentLi.parentElement?.closest('li');
                }
            });

            item.addEventListener('blur', function() {
                // Small delay to allow focus to move to submenu
                setTimeout(() => {
                    const focusedItem = document.activeElement;
                    const parentLi = this.parentElement;
                    
                    if (!parentLi.contains(focusedItem)) {
                        parentLi.classList.remove('focus');
                    }
                }, 100);
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-navigation, .sidebar-navigation')) {
                document.querySelectorAll('.main-navigation li, .sidebar-navigation li').forEach(li => {
                    li.classList.remove('menu-item-open', 'focus');
                });
            }
        });
    };

    // Smooth scroll for anchor links
    const initSmoothScroll = () => {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    };

    // Add reading progress indicator (creative touch)
    const initReadingProgress = () => {
        if (document.querySelector('.single')) {
            const progressBar = document.createElement('div');
            progressBar.className = 'reading-progress';
            progressBar.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 0%;
                height: 3px;
                background: linear-gradient(90deg, #2563eb, #7c3aed);
                z-index: 9999;
                transition: width 0.1s ease;
            `;
            document.body.appendChild(progressBar);

            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                progressBar.style.width = scrolled + '%';
            });
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initMobileMenu();
            initDropdownMenus();
            initSmoothScroll();
            initReadingProgress();
        });
    } else {
        initMobileMenu();
        initDropdownMenus();
        initSmoothScroll();
        initReadingProgress();
    }

})();

