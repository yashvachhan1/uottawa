# uOttawa Online — WordPress theme

Classic WordPress theme built from the Figma design
(`b2ssq9h8RFZSdwtihGx06j`) and the static HTML build in the parent folder.

## Install

1. Zip this folder (or use `uottawa-online.zip` next to it).
2. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → activate.

## Set up

Activating the theme does the setup for you. On activation it:

- creates the five pages below, published and with the right slugs;
- sets **Home** as the static front page;
- creates a **Primary** menu (Online programs, Student experience,
  News & events) pointing at those pages and assigns it to the header;
- switches on `/%postname%/` permalinks if no structure is set yet.

| Page title | Slug | Template used |
|---|---|---|
| Home | `home` | `front-page.php` |
| Online programs | `online-programs` | `page-landing.php` |
| Student experience | `student-experience` | `page-student-experience.php` |
| News & events | `news-events` | `page-news-events.php` |
| Contact | `contact` | `page-contact.php` |

Nothing that already exists is touched, so re-activating — or re-deploying
through WP Pusher — is safe and will not duplicate anything.

The only manual step left: **Appearance → Customize → uOttawa Online** to set
the *Apply now* and *Request info* links and the footer text.

## Program landing page

Ported from the old `uottawa-mu-plugin`. Its content is edited through the meta
boxes on the page edit screen (General, Info Grid, Why uOttawa, Overview,
Program Insights, Admissions, FAQ, Course Information, Areas of Study,
Final CTA).

Use it either way:

- give a page the **Program landing page** template, or
- drop `[uottawa_landing]` into any page.

`assets/css/landing.css` is scoped to `.uottawa-lp` and loads only on pages
that use one of those, so it cannot affect the rest of the site. The plugin's
own header, footer and menu are gone — the theme supplies those now, and the
header menu is a normal WordPress menu.

Four images are still referenced by absolute path and must exist in the media
library:

```
/wp-content/uploads/2026/08/09a3437c81e0706f56f386a8cdcda7ccbf69d2b5.webp
/wp-content/uploads/2026/08/62d370ec3bf8ccd7d20c0419ced8b558a214aee4.webp
/wp-content/uploads/2026/08/7c98b18301ccaa1ff078e67d5351da8cdd8d49e9.webp
/wp-content/uploads/2026/08/ef4da6c9c98f32283a2013b4740afd8fb341e4de.webp
```

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

- **Type is in `rem`, at exactly the Figma pixel size** (`rem = px / 16`). The
  root is pinned with `html{ font-size:16px }` so those figures land on their
  design pixels on every machine - a reader whose browser font size is set to
  Large was otherwise seeing the whole site about a quarter larger than the
  design, which broke the denser rows. `rem` does not shrink with
  the viewport, so the type tokens in `tokens.css` are restated smaller at
  1400 / 1024 / 768 in `mobile.css` — change a size there and everything using
  that token follows.
- The design is sized against a 1920px frame. Widths that must hold their
  proportion (the hero card, its paragraph, the CTA band) are written in `vw`
  with the Figma value as the maximum, so the layout reads the same at any
  width. Breakpoints: 1400 / 1200 / 1024 / 768 / 640 / 560 / 480.
- **Page gutters are shared with the Online programs landing page** so every
  page sits on the same left and right edge: `--page-l` 125px and `--page-r`
  91px, stepping to 64/64 at 1700, 32/32 at 1100 and 20/20 at 640 — the same
  steps `landing.css` uses. `.container` is the only thing that reads them,
  the dark CTA band included.
- The contact form posts nowhere yet — wire it to Contact Form 7, Gravity Forms
  or WPForms, or point the `<form action>` at your own handler.
