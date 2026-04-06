# Swissup_TestimonialsCustom

A Magento 2 module that extends [Swissup_Testimonials](https://github.com/swissup/module-testimonials) to display testimonials in a fixed order in the slider widget instead of random.

## What it does

- Overrides the testimonials slider widget block to disable random ordering
- Testimonials are shown in their saved order (newest first) on every page load instead of being shuffled randomly

## Requirements

- Magento 2.4+
- `Swissup_Testimonials` module installed and enabled

## Installation

1. Add the repository to your `composer.json`:
   ```bash
   composer config repositories.swissup-testimonials-custom vcs git@github.com:swissup/testimonials-custom.git
   ```

2. Require the package:
   ```bash
   composer require swissup/module-testimonials-custom --update-no-dev
   ```

3. Enable the module:
   ```bash
   bin/magento module:enable Swissup_TestimonialsCustom
   ```

4. Run setup upgrade:
   ```bash
   php bin/magento setup:upgrade
   ```

5. Clear cache:
   ```bash
   php bin/magento cache:flush
   ```
