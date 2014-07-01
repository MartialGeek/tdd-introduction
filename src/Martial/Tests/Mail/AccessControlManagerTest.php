<?php

namespace Martial\Tests\Mail;

use Martial\Mail\AccessControlManager;

class AccessControlManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AccessControlManager
     */
    public $accessControlManager;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    public $senderMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    public $recipientMock;

    public function setUp()
    {
        $this->accessControlManager = new AccessControlManager();
        $this->senderMock = $this->getMock('\Martial\Mail\UserInterface');
        $this->recipientMock = $this->getMock('\Martial\Mail\UserInterface');
    }

    public function testIsAllowedToSend()
    {
        $accessGranted = $this->accessControlManager->isAllowedToSend($this->senderMock, $this->recipientMock);
        $this->assertTrue($accessGranted);
    }

    public function testIsAllowedToSendShouldReturnsFalseWhenTheSenderIsTheRecipient()
    {
        $accessGranted = $this->accessControlManager->isAllowedToSend($this->senderMock, $this->senderMock);
        $this->assertFalse($accessGranted, 'The sender is the same user as the recipient');
    }
}