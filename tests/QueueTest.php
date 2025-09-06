<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @file QueueTest.php
 * @author Lorenzo Rojo
 * @date 2024-06-15
 * @brief Unit tests for Queue class with sample tests
 */
final class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty(): void
    {
        $queue = new Queue;
        $this->assertSame(0, $queue->getSize());
    }

    public function testPushAddsItem(): void
    {
        $queue = new Queue;
        $queue->push('an item');
        $this->assertSame(1, $queue->getSize());
    }

    public function testPopRemovesAndReturnsItem(): void
    {
        $queue = new Queue;
        $queue->push('an item');
        $this->assertSame('an item', $queue->pop());
        $this->assertSame(0, $queue->getSize());
    }
}
