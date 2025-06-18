# 🚀 About
This package is meant to store all the linting rules for PHP projects at Programic.
It contains the following linting tools at the moment:
- [Larastan](https://github.com/larastan/larastan)
- [TLint](https://github.com/tighten/tlint)
- [PHPMD](https://phpmd.org/)
- [ECS](https://github.com/easy-coding-standard/easy-coding-standard) with rules from:
  - [PHP Coding Standards Fixer](https://cs.symfony.com/)
  - [Slevomat](https://github.com/slevomat/coding-standard)

## ✅ Compatibility

| Laravel Version | Minimum PHP Version |
|-----------------|---------------------|
| 12.x            | 8.2 - 8.4           |
| 11.x            | 8.2 - 8.4           |


# 🏗️ Installing

## 1. Require the composer package
```bash
composer require --dev programic/php-linting-rules
```

## 2. Run the setup command
```bash
vendor/bin/programic-lint-setup
```

This command will:
- Setup the scripts to the consuming project it's `composer.json`
- Brings the config files to the workspace root, if not exists. This is required for the package to work properly.

> Use `--force` to overwrite configuration files.

# 👷 Usage

After installing running the setup command, you can run the following commands to check your code:

```bash
composer lint
composer lint:tlint
composer lint:phpmd
composer lint:phpstan
composer lint:ecs
composer lint:fix
```

## Editor Setup
Some tools have integrations to work with your editor. You can find the instructions for each tool below:
- [TLint for PHPstorm, Sublime or VSCode](https://github.com/tighten/tlint?tab=readme-ov-file#editor-integrations)


