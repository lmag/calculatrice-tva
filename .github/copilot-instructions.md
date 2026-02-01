# Copilot Instructions for Calculatrice TVA

## Project Overview
French VAT calculator web application supporting rates: 2.1%, 5.5%, 7%, 20%. Converts between HT (Hors Taxe—price before tax) and TTC (Toutes Taxes Comprises—price with tax). Zero dependencies, plain HTML/CSS/JavaScript served via WAMP.

## Architecture Summary

**Stack:** HTML, vanilla JavaScript, PHP (email only), CSS  
**Key Files:**
- [index.html](index.html) — Form UI: HT/TVA/TTC inputs, rate buttons, email field
- [js/calcul.js](js/calcul.js) — Calculation engine & form validation
- [envoi_mail.php](envoi_mail.php) — Email sender, formats results as HTML+text
- [css/style.css](css/style.css) — Layout & styling

## Calculation Flow

**Three Bidirectional Input Fields** (any one triggers recalculation):
- `converthttotva()` — HT entered → calculates TTC & TVA
- `converttvatoht()` — TTC entered → calculates HT & TVA  
- `gettva()` — TVA entered → calculates HT & TTC
- `modiftaux()` — Rate changed → recalculates from HT

**Numeric Precision:**
- `forceValidFloat(input)` — Filters to digits only; converts comma to dot; prevents multiple decimals
- All math: `Math.round(value * 100) / 100` (2-decimal rounding)
- Input maxlength: 9 chars (enforced in code)

**Example:** HT=100, rate=20% → TTC=120, TVA=20

## Email Validation & Sending

1. `email()` checks:
   - ≥1 input field has value
   - Email matches: `^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$`
   - Submits form to `envoi_mail.php`
2. PHP: Appends " €" to values, detects Hotmail/MSN (use `\n` line breaks not `\r\n` due to server bugs), sends MIME multipart email (text + HTML)

## Legacy & Quirks

- **Encoding:** ISO-8859-1 throughout (not UTF-8)
- **Events:** Inline `onclick="func(this.id)"` handlers, not listeners
- **GA:** Deprecated `_gaq.push()` (pre-Universal Analytics)  
- **Obsolete:** `favoris()` function (IE sidebar favorites) — vestigial
- **IE Detection:** HTML conditionals for IE-specific content (e.g., Facebook plugin fallback)

## When Modifying

- **Preserve IDs:** `ht`, `tva`, `ttc`, `taux` — many functions depend on exact selectors
- **Regex:** If updating email validation, sync patterns in both [calcul.js](js/calcul.js) and [envoi_mail.php](envoi_mail.php)
- **Rounding:** Test edge cases (9.99 at 20% should yield 119.88 exactly)
- **No Build:** Add files to repo root or folders—served as-is via Apache
