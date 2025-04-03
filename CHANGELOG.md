# Changelog

## Version 1.3.1 (2024-03-10)

* Add changelog
* Update to Niirrty Libs v0.6.*
* Update composer dependency to PHP v8.3
* Update composer dependency of PHPUnit to v9.*
* Add more documentation to `Niirrty\Holiday\Callbacks\GenericDateCallback`.
* Add comment of the exception `\Throwable` for `Niirrty\Holiday\Callbacks\EasterDateCallback->calculate(...)`.
* Ensure that both properties of `Niirrty\Holiday\Callbacks\AdventDateCallback` are of type `int` and add type to property definition.
* Replace imports of PHP core functions by absolute naming inside namespace `Niirrty\Holiday\Callbacks`.
* Replace specific class properties to properties, defined by constructor, inside `Niirrty\Holiday\Callbacks\ModifyDateCallback`.
* Add International Woman's Day holiday for german regions Berlin (since 2019) and Mecklenburg-Vorpommern MVP (since 2023)

## Version 2.0.0 (2025-04-03)

This version is a complete rework and is not compatible to older Versions.

* Removed all redundant code parts for defining translated holiday names and move the translations to separate files
* All current defined holidays for all supported countries now have translations for all supported languages.
* For the following countries are holidays defined now: at, ch, cz, de, dk, fr, it, jp, nl, pl, sv, uk
* All holiday names now are translated to languages: cz, de, dk, en, es, fr, is, it, jp, nl, no, pl, pt, sv
* Update and run all tests for new code.
* Update readme and remove explicit german readme (because redundant)