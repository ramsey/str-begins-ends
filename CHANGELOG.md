# ramsey/str-begins-ends Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).


## [Unreleased]

### Added

Added the following functions to accommodate [recent changes][rfc-0.3] to the
[proposed RFC][rfc].

* `mb_str_ends_with()`
* `mb_str_ends_with_ci()`
* `mb_str_starts_with()`
* `mb_str_starts_with_ci()`
* `str_ends_with()`
* `str_ends_with_ci()`
* `str_starts_with()`
* `str_starts_with_ci()`

### Changed

### Deprecated

Since the following are no longer specified in the [RFC][], they have been
deprecated in this polyfill library.

* `mb_str_begins()`
* `mb_str_ends()`
* `mb_str_ibegins()`
* `mb_str_iends()`
* `str_begins()`
* `str_ends()`
* `str_ibegins()`
* `str_iends()`

### Removed

### Fixed

### Security


## [1.0.0] - 2019-06-19

### Added

Polyfill for functions based on Will Hudgins's PHP RFC "[Add str begin and end
functions][rfc]."

* `mb_str_begins()`
* `mb_str_ends()`
* `mb_str_ibegins()`
* `mb_str_iends()`
* `str_begins()`
* `str_ends()`
* `str_ibegins()`
* `str_iends()`


[rfc-0.3]: https://wiki.php.net/rfc/add_str_begin_and_end_functions?do=diff&rev2%5B0%5D=1506086901&rev2%5B1%5D=1562258308&difftype=sidebyside
[rfc]: https://wiki.php.net/rfc/add_str_begin_and_end_functions
[Unreleased]: https://github.com/ramsey/str-begins-ends/compare/1.0.0...HEAD
[1.0.0]: https://github.com/ramsey/str-begins-ends/commits/1.0.0
