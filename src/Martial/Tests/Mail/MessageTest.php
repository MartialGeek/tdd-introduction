<?php

namespace Martial\Tests\Mail;

use Martial\Mail\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $id = 42;
        $sender = $this->getMock('\Martial\Mail\UserInterface');
        $recipient = $this->getMock('\Martial\Mail\UserInterface');
        $subject = 'The subject';
        $body = <<<EOF
Hello!
This is the body of my message.

Best regards,
John Do
EOF;
        $message = new Message();
        $message->setId($id);
        $message->setSender($sender);
        $message->setRecipient($recipient);
        $message->setSubject($subject);
        $message->setBody($body);

        $this->assertSame($id, $message->getId());
        $this->assertSame($sender, $message->getSender());
        $this->assertSame($recipient, $message->getRecipient());
        $this->assertSame($subject, $message->getSubject());
        $this->assertSame($body, $message->getBody());
        $this->assertSame(false, $message->isRead());

        $message->markAsRead();
        $this->assertSame(true, $message->isRead());
    }
}