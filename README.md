# Coding Standard

This repository provides a default coding standard configuration. The config is based on
PHP CS Fixer and inspired by the Netgen Layouts Coding Standards.

## Installation

```bash
$ composer require --dev marioblazek/coding-standard
```

The list of available rules can be found [here](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/index.rst).

## Usage

Create a `.php-cs-fixer.php` file in the root of your project with the following:

```php
return (new Marek\CodingStandard\PhpCsFixer\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude(['vendor'])
            ->in(__DIR__)
    )
;
```

Run the fixer with:

```bash
$ vendor/bin/php-cs-fixer fix
```

## Overriding existing rules

You can override rules included in this config per project:

```php
return (new Marek\CodingStandard\PhpCsFixer\Config())
    ->addRules([
        'list_syntax' => ['syntax' => 'long'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude(['vendor'])
            ->in(__DIR__)
    )
;
```

## Supporting PHAR distribution of PHP CS Fixer

You can also support running PHAR version of PHP CS Fixer by adding the
following at the top of your `.php-cs-fixer.php` file:

```php
// To support running PHP CS Fixer via PHAR file (e.g. in GitHub Actions)
require_once __DIR__ . '/vendor/marioblazek/coding-standard/src/PhpCsFixer/Config.php';
```

This is e.g. useful if you wish to run PHP CS Fixer via GitHub action, which
does not need running `composer install`:

```yaml
# .github/workflows/ci.yml
name: PHP CS Fixer
on: [push, pull_request]

jobs:
  php-cs-fixer:
    name: PHP CS Fixer
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - uses: actions/checkout@v2
        with:
          repository: marioblazek/coding-standard
          path: vendor/marioblazek/coding-standard
      - name: PHP CS Fixer
        uses: OskarStark/php-cs-fixer-ga@master
        with:
          args: --diff --dry-run
```

Check https://github.com/OskarStark/php-cs-fixer-ga for more details.

## Changelog

Changelog is available [here](CHANGELOG.md).
