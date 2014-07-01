<?php

namespace Martial\Mail;

/**
 * Interface MailServiceInterface
 * @package Martial\Mail
 */
interface MailServiceInterface
{
    /**
     * Service constructor.
     *
     * @param AccessControlInterface $accessControlManager
     */
    public function __construct(AccessControlInterface $accessControlManager);

    /**
     * Send a message.
     *
     * @param MessageInterface $message
     * @return boolean
     */
    public function sendMessage(MessageInterface $message);

    /**
     * Read the message with the given ID.
     *
     * @param int $messageId
     * @param UserInterface $user
     * @return mixed
     */
    public function readMessage($messageId, UserInterface $user);

    /**
     * Get a list of the messages sent by the given user.
     *
     * @param UserInterface $sender
     * @return MessageInterface[]
     */
    public function getMessagesBySender(UserInterface $sender);

    /**
     * Get a list of the messages received by the given user.
     *
     * @param UserInterface $recipient
     * @return MessageInterface[]
     */
    public function getMessagesByRecipient(UserInterface $recipient);

    /**
     * Delete the given message with the given user.
     *
     * @param MessageInterface $message
     * @param UserInterface    $user
     * @return boolean
     */
    public function deleteMessage(MessageInterface $message, UserInterface $user);
} 