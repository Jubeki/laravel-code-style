# Changelog

All notable changes will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## Unreleased

### Added
### Changed 
### Removed 

## 2.5.0

## Added

- Bump PHP-CS-Fixer to `^3.21`
- Enable nullable_type_declaration_for_default_null_value fixer (see [laravel/pint#192](https://github.com/laravel/pint/pull/192))
- Enable nullable_type_declaration fixer (see [laravel/pint#193](https://github.com/laravel/pint/pull/193))
- Enable type_declaration_spaces fixer (see [laravel/pint#194](https://github.com/laravel/pint/pull/194))


## 2.4.1

## Changed

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
