
## Composer Scripts
Add these to the projects `composer.json`:

```json
"scripts": {
  "lint:ecs": "vendor/bin/ecs check src --config vendor/your-vendor/php-linting-rules/ecs/ecs.php",
  "lint:phpstan": "vendor/bin/phpstan analyse -c vendor/your-vendor/php-linting-rules/phpstan/phpstan.neon",
  "lint:phpmd": "vendor/bin/phpmd app text vendor/your-vendor/php-linting-rules/phpmd/phpmd.xml",
  "lint:phpcs": "vendor/bin/phpcs --standard=vendor/your-vendor/php-linting-rules/phpcs/ruleset.xml src"
}
```

## Optional: Use Duster

If you're using Laravel and want a one-command tool to run all checks and fixers, install [Tighten's Duster](https://github.com/tighten/duster-php):

```bash
composer require --dev tighten/duster
vendor/bin/duster
