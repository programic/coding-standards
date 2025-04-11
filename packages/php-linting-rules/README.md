# 🚀 About
This package is meant to store all the linting rules for PHP projects at Programic.
It contains the following linting tools at the moment:
- [Larastan](https://github.com/larastan/larastan)
- [TLint](https://github.com/tighten/tlint)
- [PHPMD](https://phpmd.org/)

# 🏗️ Installing

## 1. Require the composer package
```bash
composer require --dev programic/php-backend-linting
```

## 2. Run the setup command
```bash
vendor/bin/programic-lint-setup
```

This command will:
- Setup the scripts to the consuming project it's `composer.json`
- Brings a `tlint.json` to the workspace root, if not exists. This is required for the package to work properly.

> Use `--force` to overwrite existing composer scripts.

## 3. (Optional) Overriding and publishing configuration files
We try to make configurations so it don't need to be overridden. If you want to override the configuration files, run the following command to publish config to projects root:
```bash
vendor/bin/programic-lint-publish-config
```

The command publishes the following files:
- `phpstan.neon` - The configuration file for PHPStan
- `phpmd.xml` - The configuration file for PHPMD

> Use `--force` to overwrite existing config files.

# 👷 Usage

After installing running the setup command, you can run the following commands to check your code:

```bash
composer lint
composer lint:fix
composer lint:tlint
composer lint:phpmd
```

## Editor Setup
Some tools have integrations to work with your editor. You can find the instructions for each tool below:
- [TLint for PHPstorm, Sublime or VSCode](https://github.com/tighten/tlint?tab=readme-ov-file#editor-integrations)


