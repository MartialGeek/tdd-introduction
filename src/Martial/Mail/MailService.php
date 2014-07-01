<?php

namespace Martial\Mail;

/**
 * Class MailService
 * @package Martial\Mail
 */
class MailService implements MailServiceInterface
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var AccessControlInterface
     */
    private $accessControlManager;

    /**
     * Service constructor.
     * @param AccessControlInterface $accessControlManager
     * @param MailerInterface $mailer
     */
    public function __construct(AccessControlInterface $accessControlManager, MailerInterface $mailer)
    {
        $this->accessControlManager = $accessControlManager;
        $this->mailer = $mailer;
    }

    /**
     * Send a message.
     * @param MessageInterface $message
     * @throws MailServiceException
     * @return boolean
     */
    public function sendMessage(MessageInterface $message)
    {
        $sender = $message->getSender();
        $recipient = $message->getRecipient();
        $senderEmail = $sender->getEmail();
        $recipientEmail = $recipient->getEmail();
        $subject = $message->getSubject();
        $body = $message->getBody();

        if (!$this->accessControlManager->isAllowedToSend($sender, $recipient)) {
            throw new MailServiceException();
        }

        $this->mailer->send($senderEmail, $recipientEmail, $subject, $body);

        return true;
    }

    /**
     * Read the message with the given ID.
     * @param int           $messageId
     * @param UserInterface $user
     * @return mixed
     */
    public function readMessage($messageId, UserInterface $user)
    {
        // TODO: Implement readMessage() method.
    }

    /**
     * Get a list of the messages sent by the given user.
     * @param UserInterface $sender
     * @return MessageInterface[]
     */
    public function getMessagesBySender(UserInterface $sender)
    {
        // TODO: Implement getMessagesBySender() method.
    }

    /**
     * Get a list of the messages received by the given user.
     * @param UserInterface $recipient
     * @return MessageInterface[]
     */
    public function getMessagesByRecipient(UserInterface $recipient)
    {
        // TODO: Implement getMessagesByRecipient() method.
    }

    /**
     * Delete the given message with the given user.
     * @param MessageInterface $message
     * @param UserInterface    $user
     * @return boolean
     */
    public function deleteMessage(MessageInterface $message, UserInterface $user)
    {
        // TODO: Implement deleteMessage() method.
    }
}