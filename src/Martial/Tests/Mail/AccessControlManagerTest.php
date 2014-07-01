<?php

namespace Martial\Tests\Mail;

use Martial\Mail\AccessControlManager;

class AccessControlManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAllowedToSend()
    {
        $accessControlManager = new AccessControlManager();
        $sender = $this->getMock('\Martial\Mail\UserInterface');
        $recipient = $this->getMock('\Martial\Mail\UserInterface');

        $accessGranted = $accessControlManager->isAllowedToSend($sender, $recipient);
        $this->assertSame(true, $accessGranted);
    }
}