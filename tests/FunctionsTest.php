<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class FunctionsTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            "two positive integers" => [2, 3, 5],
            "two negative integers" => [-2, -3, -5],
            "positive and negative integer" => [3, -2, 1],
            "adding zero" => [3, 0, 3],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAddIntegers(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, addIntegers($a, $b));
    }

    public function testAddTwoNegativeInteger(): void
    {
        $this->assertSame(-5, addIntegers(-2, -3));
    }
    public function testAddPositiveAndNegativeInteger(): void
    {
        $this->assertSame(1, addIntegers(3, -2));
    }
    public function testAddZeroToInteger(): void
    {
        $this->assertSame(3, addIntegers(3, 0));
    }
    public function testAddingIsCommutative(): void
    {
        $this->assertSame(addIntegers(2, 3), addIntegers(3, 2));
    }
}
