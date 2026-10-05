# uOttawa Online — WordPress theme

Classic WordPress theme built from the Figma design
(`b2ssq9h8RFZSdwtihGx06j`) and the static HTML build in the parent folder.

## Install

1. Zip this folder (or use `uottawa-online.zip` next to it).
2. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → activate.

## Set up the pages

Create four pages; WordPress picks the right template from the slug.

| Page title | Slug | Template used |
|---|---|---|
| Home | `home` | `front-page.php` (set as the static front page) |
| Student experience | `student-experience` | `page-student-experience.php` |
| News & events | `news-events` | `page-news-events.php` |
| Contact | `contact` | `page-contact.php` |

Then:

- **Settings → Reading** → *Your homepage displays* → a static page → Home.
- **Appearance → Menus** → create a menu with the three nav pages and assign it
  to **Primary navigation (header)**. Without a menu the header falls back to
  those three links automatically.
- **Appearance → Customize → uOttawa Online** → set the *Apply now* and
  *Request info* links and the footer text.

## Articles

The "Featured articles" and "Latest articles" grids pull real posts. Until any
post exists they render the `[Image placeholder]` cards from the design, so the
layout still reads. Post thumbnails fill the card image.

## Files

```
style.css                       theme header only
functions.php                   setup, asset loading, helpers, customizer
header.php / footer.php         header, CTA band, footer (shared by every page)
front-page.php                  Home
page-student-experience.php
page-news-events.php
page-contact.php
index.php                       blog index / archive / search fallback
assets/css/tokens.css           colours, type scale, spacing
assets/css/base.css             reset, container, section rhythm
assets/css/components.css       header, hero, buttons, FAQ, cards, CTA, footer
assets/css/sections.css         per-page blocks
assets/css/mobile.css           every media query
assets/js/main.js               mobile menu + FAQ accordion
assets/img/                     photographs
assets/icons/                   logo and icon SVGs exported from Figma
```

Stylesheets load in that order — `tokens` first, `mobile` last — so the cascade
matches the original single-file build.

## Notes

- The design is sized against a 1920px frame. Widths that must hold their
  proportion (the hero card, its paragraph, the CTA band) are written in `vw`
  with the Figma value as the maximum, so the layout reads the same at any
  width. Breakpoints: 1200 / 1024 / 768 / 640 / 560 / 480.
- The contact form posts nowhere yet — wire it to Contact Form 7, Gravity Forms
  or WPForms, or point the `<form action>` at your own handler.
