# Changelog

All notable changes will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## Unreleased

### Added
### Changed 
### Removed 

## 2.16.0
### Changed

- Enforce snake_case methods for PHPUnit method (see [laravel/pint#300](https://github.com/laravel/pint/pull/300))
- Enforce visibility for PHPUnit setUp and tearDown methods (see [laravel/pint#301](https://github.com/laravel/pint/pull/301))

## 2.15.0
### Changed

- Add/Configure new_with_parentheses rule (see [laravel/pint#285](https://github.com/laravel/pint/pull/285))

## 2.14.0
### Changed

- Enable single_line_empty_body rule (see [laravel/pint#277](https://github.com/laravel/pint/pull/277))

## 2.13.0
### Changed

- Replace custom phpdoc_align rule with php-cs-fixer option (see [laravel/pint#242](https://github.com/laravel/pint/pull/242))

## 2.12.0
### Changed

- Adds support for Laravel 11

## 2.11.0
### Changed

- Disables fully_qualified_strict_types (see [laravel/pint#240](https://github.com/laravel/pint/pull/240))

## 2.10.0
### Changed

- Change default for nullable_type_declaration_for_default_null_value (see [laravel/pint#236](https://github.com/laravel/pint/pull/236))

## 2.9.0
### Changed

- Replace deprecated rules (see [laravel/pint#224](https://github.com/laravel/pint/pull/224))

## 2.8.1
### Changed

- Fixes non yoda_style rule moving variables (see [laravel/pint#213](https://github.com/laravel/pint/pull/213))

## 2.7.0
### Changed

- Orders interfaces and traits (see [laravel/pint#206](https://github.com/laravel/pint/pull/206))
- Sort fixers by name (see [laravel/pint#207](https://github.com/laravel/pint/pull/207))

## 2.6.0
### Changed

- Improves imports when using functions (see [laravel/pint#205](https://github.com/laravel/pint/pull/205))

## 2.5.1

### Fixed

- Remove deprecated function_typehint_space rule (see [laravel/pint#197](https://github.com/laravel/pint/pull/197))

## 2.5.0

### Added

- Bump PHP-CS-Fixer to `^3.21`
- Enable nullable_type_declaration_for_default_null_value fixer (see [laravel/pint#192](https://github.com/laravel/pint/pull/192))
- Enable nullable_type_declaration fixer (see [laravel/pint#193](https://github.com/laravel/pint/pull/193))
- Enable type_declaration_spaces fixer (see [laravel/pint#194](https://github.com/laravel/pint/pull/194))


## 2.4.1

### Changed

- Bump PHP-CS-Fixer to `^3.18`
- Replace deprecated rule [`single_blank_line_before_namespace`](https://cs.symfony.com/doc/rules/namespace_notation/single_blank_line_before_namespace.html) with newer [`blank_lines_before_namespace`](https://cs.symfony.com/doc/rules/namespace_notation/blank_lines_before_namespace.html)

## 2.4.0

### Changed

- Enable statement_indentation fixer (see [laravel/pint#178](https://github.com/laravel/pint/pull/178))

## 2.3.0

### Added

- Enable method_chaining_indentation fixer

## 2.2.0

### Changed

- Replace deprecated braces rule

## 2.1.0

### Added

- Enable self_static_accessor fixer

## 2.0.1

### Changed

- Updated texts in the documentation

### Fixed

- Include `php-cs-fixer.dist.php` again

### Removed

- Removed Grouping of Rules `@Laravel` and `@Laravel:risky`
