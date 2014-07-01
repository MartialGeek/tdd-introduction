<?php

namespace Martial\Tests\Mail;

use Martial\Mail\MailService;
use Martial\Mail\MailServiceInterface;

class MailServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    public $accessControlManagerMock;

    /**
     * @var MailServiceInterface
     */
    public $mailService;

    public function setUp()
    {
        $this->accessControlManagerMock = $this->getMock('\Martial\Mail\AccessControlInterface');
        $this->mailService = new MailService($this->accessControlManagerMock);
    }

    public function testSendMessage()
    {
        $messageMock = $this->getMessageMock();
        $status = $this->mailService->sendMessage($messageMock);
        $this->assertTrue($status);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMessageMock()
    {
        return $this->getMock('\Martial\Mail\MessageInterface');
    }
}