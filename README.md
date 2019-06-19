# ramsey/str-begins-ends

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][packagist]
[![Software License][badge-license]][license]
[![PHP Version][badge-php]][php]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

ramsey/str-begins-ends provides functions to test whether a string begins or
ends with a certain substring. This is a polyfill for functions based on Will
Hudgins's PHP RFC "[Add str begin and end functions][rfc]."

This project adheres to a [Contributor Code of Conduct][conduct]. By
participating in this project and its community, you are expected to uphold this
code.


## Installation

The preferred method of installation is via [Composer][]. Run the following
command to install the package and add it as a requirement to your project's
`composer.json`:

```bash
composer require ramsey/str-begins-ends
```


## Documentation

This library provides the following functions in the global scope. It will not
cause conflicts in any project using it, should PHP decide to adopt and
implement the [RFC][] in a future version.


## str_begins

``` php
str_begins(string $haystack , string $needle): bool
```

Performs a *case-sensitive* check to determine whether `$haystack` begins with
`$needle`.


### Example

``` php
$url = 'http://example.com';

if (str_begins($url, 'http://')) {
    $url = str_replace('http://', 'https://', $url);
}
```


## str_ends

``` php
str_ends(string $haystack , string $needle): bool
```

Performs a *case-sensitive* check to determine whether `$haystack` ends with
`$needle`.


### Example

``` php
$file = '/path/to/something.log';

if (str_ends($file, '.log')) {
    $contents = file_get_contents($file);
}
```


## str_ibegins

``` php
str_ibegins(string $haystack , string $needle): bool
```

Performs a *case-insensitive* check to determine whether `$haystack` begins with
`$needle`.


### Example

``` php
$url = 'HTTPS://example.com';

if (str_ibegins($url, 'https://')) {
    $url = substr($url, 8);
}
```


## str_iends

``` php
str_iends(string $haystack , string $needle): bool
```

Performs a *case-insensitive* check to determine whether `$haystack` ends with
`$needle`.


### Example

``` php
$file = '/path/to/something.TXT';

if (str_iends($file, '.txt')) {
    $contents = file_get_contents($file);
}
```


## mb_str_begins

``` php
mb_str_begins(string $haystack , string $needle [, string $encoding = mb_internal_encoding()]): bool
```

Performs a *case-sensitive*, multi-byte safe `str_begins()` operation to check
whether `$haystack` begins with `$needle`.

> This function is only available if the [mbstring extension][] is installed.


### Example

``` php
$runePoem = 'ᚠᛇᚻ᛫ᛒᛦᚦ᛫ᚠᚱᚩᚠᚢᚱ᛫ᚠᛁᚱᚪ᛫ᚷᛖᚻᚹᛦᛚᚳᚢᛗ';

if (mb_str_begins($runePoem, 'ᚠᛇᚻ')) {
    $poem = 'Wealth is a comfort to all men';
}
```


## mb_str_ends

``` php
mb_str_ends(string $haystack , string $needle [, string $encoding = mb_internal_encoding()]): bool
```

Performs a *case-sensitive*, multi-byte safe `str_ends()` operation to check
whether `$haystack` ends with `$needle`.

> This function is only available if the [mbstring extension][] is installed.


### Example

``` php
$sanskrit = 'काचं शक्नोम्यत्तुम् । नोपहिनस्ति माम् ॥';

if (mb_str_ends($sanskrit, 'माम् ॥')) {
    $translation = 'I can eat glass';
}
```


## mb_str_ibegins

``` php
mb_str_ibegins(string $haystack , string $needle [, string $encoding = mb_internal_encoding()]): bool
```

Performs a *case-insensitive*, multi-byte safe `str_ibegins()` operation to check
whether `$haystack` begins with `$needle`.

> This function is only available if the [mbstring extension][] is installed.


### Example

``` php
$poem = 'Τὴ γλῶσσα μοῦ ἔδωσαν ἑλληνικὴ';

if (mb_str_ibegins($poem, 'ΤῊ')) {
    $poet = 'Οδυσσέας Ελύτης';
}
```


## mb_str_iends

``` php
mb_str_iends(string $haystack , string $needle [, string $encoding = mb_internal_encoding()]): bool
```

Performs a *case-insensitive*, multi-byte safe `str_iends()` operation to check
whether `$haystack` ends with `$needle`.

> This function is only available if the [mbstring extension][] is installed.


### Example

``` php
$poem = 'Τὴ γλῶσσα μοῦ ἔδωσαν ἑλληνικὴ';

if (mb_str_iends($poem, 'ἙΛΛΗΝΙΚῊ')) {
    $poet = 'Οδυσσέας Ελύτης';
}
```


## Contributing

Contributions are welcome! Please read [CONTRIBUTING][] for details.


## Copyright and License

The ramsey/str-begins-ends library is copyright © [Ben Ramsey](https://benramsey.com)
and licensed for use under the MIT License (MIT). Please see [LICENSE][] for
more information.


[conduct]: https://github.com/ramsey/str-begins-ends/blob/master/.github/CODE_OF_CONDUCT.md
[composer]: http://getcomposer.org/
[documentation]: https://ramsey.github.io/str-begins-ends/
[contributing]: https://github.com/ramsey/str-begins-ends/blob/master/.github/CONTRIBUTING.md
[mbstring extension]: https://www.php.net/manual/en/book.mbstring.php
[rfc]: https://wiki.php.net/rfc/add_str_begin_and_end_functions

[badge-source]: http://img.shields.io/badge/source-ramsey/str--begins--ends-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/ramsey/str-begins-ends.svg?style=flat-square&label=release
[badge-license]: https://img.shields.io/packagist/l/ramsey/str-begins-ends.svg?style=flat-square
[badge-php]: https://img.shields.io/packagist/php-v/ramsey/str-begins-ends.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/ramsey/str-begins-ends/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/github/ramsey/str-begins-ends/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/ramsey/str-begins-ends.svg?style=flat-square&colorB=mediumvioletred

[source]: https://github.com/ramsey/str-begins-ends
[packagist]: https://packagist.org/packages/ramsey/str-begins-ends
[license]: https://github.com/ramsey/str-begins-ends/blob/master/LICENSE
[php]: https://php.net
[build]: https://travis-ci.org/ramsey/str-begins-ends
[coverage]: https://coveralls.io/r/ramsey/str-begins-ends?branch=master
[downloads]: https://packagist.org/packages/ramsey/str-begins-ends
