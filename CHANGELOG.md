# Changelog

## Version 0.6.3

* Add changelog
* Update to Niirrty Libs v0.6.*
* Update composer dependency to PHP v8.3
* Update composer dependency of PHPUnit to v9.*
* Add more documentation to `Niirrty\Holiday\Callbacks\GenericDateCallback`.
* Add comment of the exception `\Throwable` for `Niirrty\Holiday\Callbacks\EasterDateCallback->calculate(...)`.
* Ensure that both properties of `Niirrty\Holiday\Callbacks\AdventDateCallback` are of type `int` and add type to property definition.
* Replace imports of PHP core functions by absolute naming inside namespace `Niirrty\Holiday\Callbacks`.
* Replace specific class properties to properties, defined by constructor, inside `Niirrty\Holiday\Callbacks\ModifyDateCallback`.