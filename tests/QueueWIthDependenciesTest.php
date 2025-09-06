<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

/**
 * @file QueueTest.php
 * @author Lorenzo Rojo
 * @date 2024-06-15
 * @brief Unit tests for Queue class with dependencies tests.
 */
final class QueueWIthDependenciesTest extends TestCase
{
    public function testNewQueueIsEmpty(): Queue
    {
        $queue = new Queue;
        $this->assertSame(0, $queue->getSize());
        return $queue;
    }

    #[Depends('testNewQueueIsEmpty')]
    public function testPushAddsItem(Queue $queue): Queue
    {
        $queue->push('an item');
        $this->assertSame(1, $queue->getSize());
        return $queue;
    }

    #[Depends('testPushAddsItem')]
    public function testPopRemovesAndReturnsItem(Queue $queue): void
    {
        $this->assertSame('an item', $queue->pop());
        $this->assertSame(0, $queue->getSize());
    }
}
