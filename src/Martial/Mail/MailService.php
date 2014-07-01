<?php

namespace Martial\Mail;

class MailService implements MailServiceInterface
{

    /**
     * Service constructor.
     * @param AccessControlInterface $accessControlManager
     */
    public function __construct(AccessControlInterface $accessControlManager)
    {
        // TODO: Implement __construct() method.
    }

    /**
     * Send a message.
     * @param MessageInterface $message
     * @return boolean
     */
    public function sendMessage(MessageInterface $message)
    {
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