<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    public function testNotificationIsSent(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hello!'));
    }

    public function testSendThrowsException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')
            ->willThrowException(new RuntimeException('SMTP server not reachable'));

        $service = new NotificationService($mailer);

        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage('Could not send notification');

        $service->sendNotification('dave@example.com', 'Hello!');
    }

    public function testMailerIsCalledCorrectly(): void
    {
        $mailer = $this->createMock(Mailer::class);

        $mailer->expects($this->once())
            ->method('sendEmail')
            ->with('dh@example.com','New notification', 'Hi!')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dh@example.com', 'Hi!'));
    }
}
