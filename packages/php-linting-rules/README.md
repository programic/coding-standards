# 🚀 About
This package is meant to store all the linting rules for PHP projects at Programic.
It contains the following linting tools at the moment:
- [Larastan](https://github.com/larastan/larastan)

# 🏗️ Installing

## 1. Require the composer package
```bash
composer require --dev programic/php-backend-linting
```

## 2. Run the setup command
```bash
vendor/bin/programic-setup-linting
```

This command will install the scripts to the consuming project it's `composer.json
You can override these files if you want to customize the configuration for project specific rules.

> Use `--force` to overwrite existing composer scripts.

## 3. (Optional) Overriding and publishing configuration files
We try to make configurations so it don't need to be overridden. If you want to override the configuration files, run the following command to publish config to projects root:
```bash
vendor/bin/programic-lint-publish-config
```

The command publishes the following files:
- `phpstan.neon` - The configuration file for PHPStan


> Use `--force` to overwrite existing config files.

# 👷 Usage

After installing running the setup command, you can run the following commands to check your code:

```bash
composer lint
composer lint:ecs
```



