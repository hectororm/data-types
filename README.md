# Hector Data Types

[![Latest Version](https://img.shields.io/packagist/v/hectororm/data-types.svg?style=flat-square)](https://github.com/hectororm/data-types/releases)
[![Software license](https://img.shields.io/github/license/hectororm/data-types.svg?style=flat-square)](https://github.com/hectororm/data-types/blob/main/LICENSE)
[![Build Status](https://img.shields.io/github/actions/workflow/status/hectororm/data-types/tests.yml?branch=main&style=flat-square)](https://github.com/hectororm/data-types/actions/workflows/tests.yml?query=branch%3Amain)
[![Quality Grade](https://img.shields.io/codacy/grade/49693590f2bc4e1fbb174b4b7cf0d0b4/main.svg?style=flat-square)](https://app.codacy.com/gh/hectororm/data-types)
[![Total Downloads](https://img.shields.io/packagist/dt/hectororm/data-types.svg?style=flat-square)](https://packagist.org/packages/hectororm/data-types)

Hector Data Types is the module to manage types of Hector ORM. Can be used independently of ORM.

## Installation

### Composer

You can install **Hector Data Types** with [Composer](https://getcomposer.org/), it's the recommended installation.

```shell
$ composer require hectororm/data-types
```

### Dependencies

- **PHP** ^8.0
- Extensions dependencies:
    - **ext-pdo**

## Usage

Each type converter implement interface:

```php
use Hector\DataTypes\ExpectedType;

interface TypeInterface
{
    /**
     * From schema function.
     *
     * @return string|null
     */
    public function fromSchemaFunction(): ?string;

    /**
     * From schema to entity.
     *
     * @param mixed $value
     * @param ExpectedType|null $expected
     *
     * @return mixed
     */
    public function fromSchema(mixed $value, ?ExpectedType $expected = null): mixed;

    /**
     * To schema function.
     *
     * @return string|null
     */
    public function toSchemaFunction(): ?string;

    /**
     * From entity to schema.
     *
     * @param mixed $value
     * @param ExpectedType|null $expected
     *
     * @return mixed
     */
    public function toSchema(mixed $value, ?ExpectedType $expected = null): mixed;

    /**
     * Get binding type.
     * Must return a PDO::PARAM_* value.
     *
     * @return int|null
     */
    public function getBindingType(): ?int;
}
```

Attempted excepted type is a representation of PHP type of property.