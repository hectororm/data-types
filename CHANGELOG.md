# Change Log

All notable changes to this project will be documented in this file. This project adheres
to [Semantic Versioning] (http://semver.org/). For change log format,
use [Keep a Changelog] (http://keepachangelog.com/).

## [1.0.0-beta3] - 2024-03-19

### Added

- New method `TypeInterface::equals(): bool` to compare data from schema and entity

## [1.0.0-beta2] - 2022-02-19

### Added

- New boolean type
- New PHP 8.1 enum type
- Add option on JSON type to force non-associative decode
- Add option on DateTime type to accept other class like immutable

### Changed

- `TypeException` renamed to `ValueException` and now inherits the `ValueError` exception

## [1.0.0-beta1] - 2021-08-27

Initial development.
