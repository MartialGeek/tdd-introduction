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
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    public $mailerMock;

    /**
     * @var MailServiceInterface
     */
    public $mailService;

    public function setUp()
    {
        $this->accessControlManagerMock = $this->getMock('\Martial\Mail\AccessControlInterface');
        $this->mailerMock = $this->getMock('\Martial\Mail\MailerInterface');
        $this->mailService = new MailService($this->accessControlManagerMock, $this->mailerMock);
    }

    public function testSendMessage()
    {
        $this->sendMessage();
    }

    /**
     * @expectedException \Martial\Mail\MailServiceException
     */
    public function testSendMessageShouldThrowAnExceptionWhenTheSenderIsTheRecipient()
    {
        $this->sendMessage(false);
    }

    protected function sendMessage($isAllowedToSend = true)
    {
        $senderEmail = 'john@do.net';
        $recipientEmail = 'foo@bar.org';
        $subjectEmail = 'An amazing subject';
        $bodyEmail = <<<EOF
What an amazing email!

I have never written such an incredible mail, it's just....
Sorry!
EOF;

        $senderMock = $this->getUserMock();
        $recipientMock = $this->getUserMock();
        $messageMock = $this->getMessageMock();

        $messageMock
            ->expects($this->once())
            ->method('getSender')
            ->will($this->returnValue($senderMock));

        $messageMock
            ->expects($this->once())
            ->method('getRecipient')
            ->will($this->returnValue($recipientMock));

        $this
            ->accessControlManagerMock
            ->expects($this->once())
            ->method('isAllowedToSend')
            ->with($senderMock, $recipientMock)
            ->will($this->returnValue($isAllowedToSend));

        if ($isAllowedToSend) {
            $senderMock
                ->expects($this->once())
                ->method('getEmail')
                ->will($this->returnValue($senderEmail));

            $recipientMock
                ->expects($this->once())
                ->method('getEmail')
                ->will($this->returnValue($recipientEmail));

            $messageMock
                ->expects($this->once())
                ->method('getSubject')
                ->will($this->returnValue($subjectEmail));

            $messageMock
                ->expects($this->once())
                ->method('getBody')
                ->will($this->returnValue($bodyEmail));

            $this
                ->mailerMock
                ->expects($this->once())
                ->method('send')
                ->with($senderEmail, $recipientEmail, $subjectEmail, $bodyEmail)
                ->will($this->returnValue(true));
        }

        $this->mailService->sendMessage($messageMock);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMessageMock()
    {
        return $this->getMock('\Martial\Mail\MessageInterface');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getUserMock()
    {
        return $this->getMock('\Martial\Mail\UserInterface');
    }
}