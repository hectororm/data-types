<?php
/*
 * This file is part of Hector ORM.
 *
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2021 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

namespace Hector\DataTypes\Tests\Type;

use Hector\DataTypes\ExpectedType;
use Hector\DataTypes\Type\JsonType;
use Hector\DataTypes\TypeException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Exception;

class JsonTypeTest extends TestCase
{
    public function testFromSchema()
    {
        $type = new JsonType();

        $this->assertEquals(["foo" => "bar"], $type->fromSchema('{"foo": "bar"}'));
    }

    public function testFromSchemaWithNotValid()
    {
        $this->expectException(TypeException::class);

        $type = new JsonType();
        $type->fromSchema(1);
    }

    public function testFromSchemaWithNotScalar()
    {
        $this->expectException(TypeException::class);

        $type = new JsonType();
        $type->fromSchema(['foo']);
    }

    public function testFromSchemaWithDeclaredTypeBuiltinArray()
    {
        $expectedType = new ExpectedType('array', false, true);
        $type = new JsonType();

        $this->assertEquals(["foo" => "bar"], $type->fromSchema('{"foo": "bar"}', $expectedType));
    }

    public function testFromSchemaWithDeclaredTypeBuiltinString()
    {
        $expectedType = new ExpectedType('string', false, true);
        $type = new JsonType();

        $this->assertEquals('{"foo": "bar"}', $type->fromSchema('{"foo": "bar"}', $expectedType));
    }

    public function testFromSchemaWithDeclaredTypeBuiltinInvalid()
    {
        $this->expectException(TypeException::class);

        $expectedType = new ExpectedType('int', false, true);
        $type = new JsonType();

        $type->fromSchema('{"foo": "bar"}', $expectedType);
    }

    public function testFromSchemaWithDeclaredTypeBuiltinAndBadValue()
    {
        $this->expectException(TypeException::class);
        $expectedType = new ExpectedType('string', false, true);

        $type = new JsonType();
        $type->fromSchema(new \stdClass(), $expectedType);
    }

    public function testFromSchemaWithDeclaredTypeStdClass()
    {
        $expectedType = new ExpectedType(\stdClass::class, false, false);
        $type = new JsonType();

        $this->assertEquals(
            json_decode(json_encode(["foo" => "bar"])),
            $type->fromSchema('{"foo": "bar"}', $expectedType)
        );
    }

    public function testFromSchemaWithDeclaredTypeNotBuiltin()
    {
        $this->expectException(TypeException::class);

        $expectedType = new ExpectedType('\stdClass', false, false);

        $type = new JsonType();
        $type->fromSchema('{"foo": "bar"}', $expectedType);
    }

    public function testToSchema()
    {
        $type = new JsonType();
        $fakeObject = new class implements \JsonSerializable {
            public function jsonSerialize()
            {
                return ["foo" => "bar"];
            }
        };

        $this->assertSame('{"foo":"bar"}', $type->toSchema(["foo" => "bar"]));
        $this->assertSame('{"foo": "bar"}', $type->toSchema('{"foo": "bar"}'));
        $this->assertSame('{"foo":"bar"}', $type->toSchema($fakeObject));
    }

    public function testToSchemaWithBadType()
    {
        $this->expectException(TypeException::class);

        $type = new JsonType();
        $fakeObject = new class implements \JsonSerializable {
            public function jsonSerialize()
            {
                throw new Exception('Not serializable');
            }
        };

        $type->toSchema($fakeObject);
    }
}
