# Heroes on the Water — Custom WordPress Theme

Section-based WordPress theme for the Heroes on the Water project. This document is the single source of truth for structure, assets, and conventions.

## Project structure

| Path | Responsibility |
|------|----------------|
| [`style.css`](style.css) | WordPress theme metadata only (Theme Name, Text Domain, version). No layout CSS here. |
| [`functions.php`](functions.php) | Enqueues, theme support, nav menus, widget areas, helpers (`hotw_*`). |
| [`header.php`](header.php) / [`footer.php`](footer.php) | Thin wrappers that `require` shared partials under `page-template/`. |
| [`page-template/header.php`](page-template/header.php) | Document head, `<body>`, site header, mobile drawer shell. |
| [`page-template/footer.php`](page-template/footer.php) | Emits closing `</main>` then the site footer, widget rows, and `wp_footer()`. Each template must open `<main id="primary">` after `get_header()` and must not close it. |
| [`front-page.php`](front-page.php) | Front page routing: static page uses its template; otherwise loads [`home.php`](home.php). |
| [`home.php`](home.php) | Home landing layout; includes [`template-parts/home/`](template-parts/home/) section partials. |
| [`page-whats-on.php`](page-whats-on.php) | **What's On** page template: dual-month calendar + upcoming events. |
| [`inc/post-type-event.php`](inc/post-type-event.php) | Registers the **Events** admin menu and `event` post type. |
| [`inc/whats-on-config.php`](inc/whats-on-config.php) / [`inc/whats-on-events.php`](inc/whats-on-events.php) | Meta key filters and event queries for the What's On template. |
| [`template-parts/whats-on/`](template-parts/whats-on/) | Calendar and upcoming cards partials. |
| [`index.php`](index.php) | Blog index fallback. |
| [`assets/css/variables.css`](assets/css/variables.css) | Design tokens: colors, typography variables, spacing scale. |
| [`assets/css/common.css`](assets/css/common.css) | Base utilities, global resets, **`.hotw-*`** layout and section components. |
| [`assets/css/style.css`](assets/css/style.css) | Page-specific overrides (enqueued as `hotw-style`). |
| [`assets/css/responsive.css`](assets/css/responsive.css) | **All new breakpoint rules** for `.hotw-*` inside existing `@media` blocks only. |
| [`assets/js/main.js`](assets/js/main.js) | Mobile nav, Swiper inits, What's On tabs, YouTube modal. |
| [`assets/fonts/`](assets/fonts/) | Local `@font-face` bundle: **Bebas Neue** + **Lil Stuart** + dramaturg_scregular. |

## Naming conventions

| Item | Value |
|------|-------|
| PHP prefix | `hotw_*` |
| Constant | `HOTW_THEME_VER` |
| Text domain | `heros-on-the-water` |
| CSS prefix | `.hotw-*` |
| CSS variables | `--hotw-*` |

## Asset loading strategy

Enqueue order (see [`functions.php`](functions.php)):

1. **Local fonts** — [`assets/fonts/stylesheet.css`](assets/fonts/stylesheet.css)
2. **Sen** — Google Fonts weights 400–800
3. Local Bootstrap CSS
4. Local Swiper CSS
5. `variables.css` → `common.css` → `style.css` → `responsive.css`
6. Bootstrap bundle JS, Swiper JS, then `main.js`

Version strings use `filemtime()` on key theme CSS/JS and the local font stylesheet.

## Typography

| Role | Font | Source |
|------|------|--------|
| **All `h1`–`h6`** | Bebas Neue | Local (`assets/fonts/`) |
| **`p`, `li`, form controls, body UI** | Sen | Google Fonts |
| **`<strong>` inside `h1`–`h6` only** | Lil Stuart + orange (`--hotw-orange`) | Local |

Use semantic markup: `<h2>Healing Through <strong>Water</strong></h2>`.

## Styling rules

- **Tokens**: Edit in [`variables.css`](assets/css/variables.css) only.
- **Components**: Use **`.hotw-*`** prefix. No inline styles in PHP templates.
- **WYSIWYG / ACF**: Wrap output in `.hotw-prose` and style descendants globally.
- **Responsive**: New breakpoint rules only in [`responsive.css`](assets/css/responsive.css) within predefined `@media` blocks.

## WordPress integration

- **Menus**: `primary`, `utility`, `footer` — see [`functions.php`](functions.php) for fallback labels.
- **Widgets**: `footer-main`, `footer-bottom`
- **Front page**: **Settings → Reading** — static front page or posts; [`front-page.php`](front-page.php) routes accordingly.

## What's On page (events calendar)

- **Template**: Assign **What's On** (`page-whats-on.php`) to a page.
- **Events CPT**: Slug `event`, URLs under `/events/`. Flush permalinks after install if needed.
- **ACF**: `event_date` (return `Ymd` recommended), optional `event_start_time` / `event_end_time`.
- **Logic**: [`inc/whats-on-events.php`](inc/whats-on-events.php)

## ACF usage

- Options page registered on `acf/init` — global fields via `get_field('field', 'option')`.
- FAQ, CTA, Gallery load from post ID `10` (environment-specific).
- Section fields use `get_field()` with array defaults; escape all output.

## Contact Form 7

Pass shortcodes from page templates via `$args['cf7_shortcode']`. Include `html_class="hotw-cf7"` for theme styling. Defaults are set in template parts as fallbacks.

## Dummy images

Phase 1 uses **picsum.photos** via `hotw_placeholder_image()`. Replace with attachments or theme images when final art is ready.

## Changelog (setup)

- Rebranded from The Black Door Oven to Heroes on the Water (`hotw_*`, `heros-on-the-water`, `.hotw-*`).
- Removed orphaned `inc/template-tags.php`, `acf-ref/` screenshots, unused vendor assets (`animate.css`, `normalize.min.css`, `wow.min.js`, `fonts/demo.html`).
- Fixed hardcoded localhost URLs; footer CTA guard uses page template checks instead of magic page IDs.
- Wired CF7 `$args['cf7_shortcode']` in booking and contact sections.

## Guidelines for future updates

1. Add design tokens before hard-coding hex values.
2. Add section CSS to `common.css`; breakpoint tweaks only in `responsive.css`.
3. Add JS behavior to `main.js` with existence checks on root selectors.
4. Document new template parts or menu locations in this README.
