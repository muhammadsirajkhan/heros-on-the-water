# Heroes on the Water — Custom WordPress Theme

Section-based WordPress theme for the Heroes on the Water project (Isle of Man). Visual system matches the navy / yellow design mockups in [`design/`](design/).

## Project structure

| Path | Responsibility |
|------|----------------|
| [`style.css`](style.css) | WordPress theme metadata only |
| [`functions.php`](functions.php) | Enqueues, menus, helpers (`hotw_*`) |
| [`page-template/header.php`](page-template/header.php) | Top bar + floating pill nav + mobile drawer |
| [`page-template/footer.php`](page-template/footer.php) | 5-column footer, newsletter, contact strip |
| [`home.php`](home.php) | Home Page template |
| [`about-page.php`](about-page.php) | About Us |
| [`contact-page.php`](contact-page.php) | Contact Us |
| [`donate-page.php`](donate-page.php) | Donate Us |
| [`events-page.php`](events-page.php) | Events (CPT cards + Location/Time meta) |
| [`single-event.php`](single-event.php) | Single Event (no interior banner) |
| [`policy-page.php`](policy-page.php) | Policy Page (Privacy, Terms, etc.) |
| [`team-page.php`](team-page.php) | Meet the Team |
| [`journey-page.php`](journey-page.php) | Our Journey |
| [`partners-page.php`](partners-page.php) | Our Partners |
| [`template-parts/shared/`](template-parts/shared/) | Interior hero, ticker, group photo |
| [`template-parts/home/`](template-parts/home/) | Home sections (hero, mission, video, visitors, CTA, hours, impact) |
| [`acf-json/`](acf-json/) | ACF field group sync (header, footer/options, home, about, donate, contact, journey, team, partners, events) |
| [`template-parts/about/`](template-parts/about/) | About info + map |
| [`template-parts/contact/`](template-parts/contact/) | Contact v2 |
| [`template-parts/donate/`](template-parts/donate/) | Donate impact |
| [`template-parts/events/`](template-parts/events/) | Upcoming events grid |
| [`template-parts/team/`](template-parts/team/) | Patrons, trustees, volunteers |
| [`template-parts/journey/`](template-parts/journey/) | Timeline Swiper |
| [`template-parts/partners/`](template-parts/partners/) | Logo wall + partner cards |
| [`design/`](design/) | Reference mockups (not enqueued) |
| [`assets/css/`](assets/css/) | variables → common → style → responsive |
| [`assets/js/main.js`](assets/js/main.js) | Mobile nav, Swipers, donate widget |

## Naming conventions

| Item | Value |
|------|-------|
| PHP prefix | `hotw_*` |
| Constant | `HOTW_THEME_VER` |
| Text domain | `heros-on-the-water` |
| CSS prefix | `.hotw-*` |
| CSS variables | `--hotw-*` |

## Design tokens

- **Navy** `--hotw-navy` (`#000b26`)
- **Yellow** `--hotw-yellow` (`#ffd700`)
- **Display font** Montserrat (Google Fonts)
- **Body font** Sen (Google Fonts)

## Page setup (WP Admin)

Create pages and assign templates:

| Page | Template |
|------|----------|
| Home (front) | Home Page |
| About Us | About Us Page |
| Contact | Contact Page |
| Donate | Donate Page |
| Events | Events Page |
| Meet the Team | Meet the Team Page |
| Our Journey | Our Journey Page |
| Our Partners | Our Partners Page |
| Privacy Policy / Terms / etc. | Policy Page |

## Styling rules

- Tokens in `variables.css` only
- Components as `.hotw-*` in `common.css`
- Breakpoints only in existing `@media` blocks in `responsive.css`
- No inline styles in PHP templates

## Legacy templates

Story, Menu, Book, Gallery, and What’s On remain in the theme but are outside the current design mockup set. They inherit the new header/footer.

## Guidelines

1. Reuse shared partials (hero, ticker, group photo) on interior pages
2. ACF-driven sections: use field `default_value` + conditionals; no PHP static content fallbacks. Buttons use Link fields.
3. Add JS via `initHotw{Feature}()` with selector guards
4. Escape all output; text domain `heros-on-the-water`
