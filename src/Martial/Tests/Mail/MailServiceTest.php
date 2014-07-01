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
        $this->sendMessage(true);
    }

    protected function sendMessage($senderIsRecipient = false)
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
        $recipientMock = $senderIsRecipient ? $senderMock : $this->getUserMock();
        $messageMock = $this->getMessageMock();

        if ($senderIsRecipient) {
            $senderMatcher = $senderMock->expects($this->exactly(2));
        } else {
            $senderMatcher = $senderMock->expects($this->once());
        }

        $senderMatcher
            ->method('getEmail')
            ->will($this->returnValue($senderEmail));

        if (!$senderIsRecipient) {
            $recipientMock
                ->expects($this->once())
                ->method('getEmail')
                ->will($this->returnValue($recipientEmail));
        }

        $messageMock
            ->expects($this->once())
            ->method('getSender')
            ->will($this->returnValue($senderMock));

        $messageMock
            ->expects($this->once())
            ->method('getRecipient')
            ->will($this->returnValue($recipientMock));

        $messageMock
            ->expects($this->once())
            ->method('getSubject')
            ->will($this->returnValue($subjectEmail));

        $messageMock
            ->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue($bodyEmail));

        $accessControlResult = $senderIsRecipient ? false : true;

        $this
            ->accessControlManagerMock
            ->expects($this->once())
            ->method('isAllowedToSend')
            ->with($senderMock, $recipientMock)
            ->will($this->returnValue($accessControlResult));

        if (!$senderIsRecipient) {
            $this
                ->mailerMock
                ->expects($this->once())
                ->method('send')
                ->with($senderEmail, $recipientEmail, $subjectEmail, $bodyEmail)
                ->will($this->returnValue(true));
        }

        $status = $this->mailService->sendMessage($messageMock);

        if (!$senderIsRecipient) {
            $this->assertTrue($status);
        }
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