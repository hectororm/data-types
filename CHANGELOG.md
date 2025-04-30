# Change Log

All notable changes to this project will be documented in this file. This project adheres
to [Semantic Versioning] (http://semver.org/). For change log format,
use [Keep a Changelog] (http://keepachangelog.com/).

## [1.0.0] - 2025-04-30

No changes were introduced since the previous beta 8 release.

## [1.0.0-beta8] - 2025-03-28

### Added

- New type `UuidType` to store UUID in binary or hexa in database
- New type `RamseyUuidType` to store UUID in binary or hexa in database and use `ramsey/uuid` library in code

### Fixed

- `JsonType::toSchema()` do not encode scalar values

## [1.0.0-beta7] - 2025-03-14

### Fixed

- Implicitly marking parameter as nullable

## [1.0.0-beta6] - 2025-02-04

### Added

- `$try` parameter on `EnumType` to allow null value in case of case does not exist

## [1.0.0-beta5] - 2024-07-02

### Added

- `StringType` parameters to truncate to the given length

## [1.0.0-beta4] - 2024-03-20

### Fixed

- `JsonType::equals()` with NULL value

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
