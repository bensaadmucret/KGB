<?php declare(strict_types=1);
/*
 * This file is part of sebastian/type.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Type;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\RequiresPhp;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use ReflectionFunction;
use ReflectionFunctionAbstract;
use ReflectionMethod;
use SebastianBergmann\Type\TestFixture\AnInterface;
use SebastianBergmann\Type\TestFixture\AnotherInterface;
use SebastianBergmann\Type\TestFixture\ChildClass;
use SebastianBergmann\Type\TestFixture\ClassWithMethodsThatDeclareReturnTypes;
use SebastianBergmann\Type\TestFixture\ClassWithMethodsThatDeclareUnionReturnTypes;
use SebastianBergmann\Type\TestFixture\ClassWithMethodsThatHaveStaticReturnTypes;
use SebastianBergmann\Type\TestFixture\ClassWithMethodThatDeclaresFalseReturnType;
use SebastianBergmann\Type\TestFixture\ClassWithMethodThatDeclaresIntersectionReturnType;
use SebastianBergmann\Type\TestFixture\ClassWithMethodThatDeclaresNeverReturnType;
use SebastianBergmann\Type\TestFixture\ClassWithMethodThatDeclaresNullReturnType;
use SebastianBergmann\Type\TestFixture\ParentClass;

#[CoversClass(ReflectionMapper::class)]
#[UsesClass(FalseType::class)]
#[UsesClass(GenericObjectType::class)]
#[UsesClass(IntersectionType::class)]
#[UsesClass(MixedType::class)]
#[UsesClass(NeverType::class)]
#[UsesClass(NullType::class)]
#[UsesClass(ObjectType::class)]
#[UsesClass(SimpleType::class)]
#[UsesClass(StaticType::class)]
#[UsesClass(Type::class)]
#[UsesClass(TypeName::class)]
#[UsesClass(UnionType::class)]
#[UsesClass(UnknownType::class)]
#[UsesClass(VoidType::class)]
#[Small]
final class ReflectionMapperTest extends TestCase
{
    #[DataProvider('types')]
    public function testMapsFromReturnType(string $expected, ReflectionFunctionAbstract $method): void
    {
        $this->assertSame($expected, (new ReflectionMapper)->fromReturnType($method)->name());
    }

    public function testMapsFromIntersectionReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodThatDeclaresIntersectionReturnType::class, 'returnsObjectThatImplementsAnInterfaceAndAnotherInterface'));

        $this->assertInstanceOf(IntersectionType::class, $type);
        $this->assertSame(AnInterface::class . '&' . AnotherInterface::class, $type->name());
    }

    public function testMapsFromUnionReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatDeclareUnionReturnTypes::class, 'returnsBoolOrInt'));

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertSame('bool|int', $type->name());
    }

    public function testMapsFromUnionReturnTypeWithSelf(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatDeclareUnionReturnTypes::class, 'returnsSelfOrStdClass'));

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertSame(ClassWithMethodsThatDeclareUnionReturnTypes::class . '|stdClass', $type->name());
    }

    public function testMapsFromMixedReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatDeclareUnionReturnTypes::class, 'returnsMixed'));

        $this->assertInstanceOf(MixedType::class, $type);
        $this->assertSame('mixed', $type->name());
    }

    public function testMapsFromStaticReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatHaveStaticReturnTypes::class, 'returnsStatic'));

        $this->assertInstanceOf(StaticType::class, $type);
        $this->assertSame('static', $type->asString());
        $this->assertFalse($type->allowsNull());
    }

    public function testMapsFromNullableStaticReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatHaveStaticReturnTypes::class, 'returnsNullableStatic'));

        $this->assertInstanceOf(StaticType::class, $type);
        $this->assertSame('?static', $type->asString());
        $this->assertTrue($type->allowsNull());
    }

    public function testMapsFromUnionWithStaticReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatHaveStaticReturnTypes::class, 'returnsUnionWithStatic'));

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertSame('static|stdClass', $type->name());
    }

    public function testMapsFromUnionReturnTypeWithIntOrFalse(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodsThatDeclareUnionReturnTypes::class, 'returnsIntOrFalse'));

        $this->assertInstanceOf(UnionType::class, $type);
        $this->assertSame('false|int', $type->name());
    }

    public function testMapsFromNeverReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodThatDeclaresNeverReturnType::class, 'neverReturnType'));

        $this->assertInstanceOf(NeverType::class, $type);
        $this->assertSame('never', $type->name());
    }

    #[RequiresPhp('>= 8.2')]
    public function testMapsFromFalseReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodThatDeclaresFalseReturnType::class, 'falseReturnType'));

        $this->assertInstanceOf(FalseType::class, $type);
        $this->assertSame('false', $type->name());
    }

    #[RequiresPhp('>= 8.2')]
    public function testMapsFromNullReturnType(): void
    {
        $type = (new ReflectionMapper)->fromReturnType(new ReflectionMethod(ClassWithMethodThatDeclaresNullReturnType::class, 'nullReturnType'));

        $this->assertInstanceOf(NullType::class, $type);
        $this->assertSame('null', $type->name());
    }

    public function types(): array
    {
        return [
            [
                'unknown type', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'noReturnType'),
            ],
            [
                'void', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'voidReturnType'),
            ],
            [
                ClassWithMethodsThatDeclareReturnTypes::class, new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'selfReturnType'),
            ],
            [
                ParentClass::class, new ReflectionMethod(ChildClass::class, 'bar'),
            ],
            [
                'stdClass', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'classReturnType'),
            ],
            [
                'object', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'objectReturnType'),
            ],
            [
                'array', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'arrayReturnType'),
            ],
            [
                'bool', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'boolReturnType'),
            ],
            [
                'float', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'floatReturnType'),
            ],
            [
                'int', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'intReturnType'),
            ],
            [
                'string', new ReflectionMethod(ClassWithMethodsThatDeclareReturnTypes::class, 'stringReturnType'),
            ],

            [
                'unknown type', new ReflectionFunction('SebastianBergmann\Type\TestFixture\noReturnType'),
            ],
            [
                'void', new ReflectionFunction('SebastianBergmann\Type\TestFixture\voidReturnType'),
            ],
            [
                'stdClass', new ReflectionFunction('SebastianBergmann\Type\TestFixture\classReturnType'),
            ],
            [
                'object', new ReflectionFunction('SebastianBergmann\Type\TestFixture\objectReturnType'),
            ],
            [
                'array', new ReflectionFunction('SebastianBergmann\Type\TestFixture\arrayReturnType'),
            ],
            [
                'bool', new ReflectionFunction('SebastianBergmann\Type\TestFixture\boolReturnType'),
            ],
            [
                'float', new ReflectionFunction('SebastianBergmann\Type\TestFixture\floatReturnType'),
            ],
            [
                'int', new ReflectionFunction('SebastianBergmann\Type\TestFixture\intReturnType'),
            ],
            [
                'string', new ReflectionFunction('SebastianBergmann\Type\TestFixture\stringReturnType'),
            ],
        ];
    }
}
