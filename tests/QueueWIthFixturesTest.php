<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

/**
 * @file QueueTest.php
 * @author Lorenzo Rojo
 * @date 2024-06-15
 * @brief Unit tests for Queue class with fixtures.
 */
final class QueueWIthFixturesTest extends TestCase
{
    private Queue $queue;

    public function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty(): void
    {
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testPushAddsItem(): void
    {
        $this->queue->push('an item');
        $this->assertSame(1, $this->queue->getSize());
    }

    public function testPopRemovesAndReturnsItem(): void
    {
        $this->queue->push('an item');
        $this->assertSame('an item', $this->queue->pop());
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        $this->queue->push('first');
        $this->queue->push('second');
        $this->assertSame('first', $this->queue->pop());
    }

    public function testPopThrowsExceptionWhenQueueIsEmpty(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty');
        $this->queue->pop();
    }
}
