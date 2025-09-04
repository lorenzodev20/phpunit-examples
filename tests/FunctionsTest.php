<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__).'/lib/functions.php';

final class FunctionsTest extends TestCase
{
    public function testAddIntegers(): void
    {
        $this->assertSame(5, addIntegers(2,3));
    }
}