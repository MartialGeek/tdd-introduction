<?php

namespace Martial\Mail;

/**
 * Interface MessageInterface
 * @package Martial\Mail
 */
interface MessageInterface
{
    /**
     * Set the message ID.
     *
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * Get the message ID.
     *
     * @return int
     */
    public function getId();

    /**
     * Set the message sender.
     *
     * @param UserInterface $sender
     * @return void
     */
    public function setSender(UserInterface $sender);

    /**
     * Get the message sender.
     *
     * @return UserInterface
     */
    public function getSender();

    /**
     * Set the message recipient.
     *
     * @param UserInterface $recipient
     * @return void
     */
    public function setRecipient(UserInterface $recipient);

    /**
     * Get the user recipient.
     *
     * @return UserInterface
     */
    public function getRecipient();

    /**
     * Set the message subject.
     *
     * @param string $subject
     * @return void
     */
    public function setSubject($subject);

    /**
     * Get the message subject.
     *
     * @return string
     */
    public function getSubject();

    /**
     * Set the message body.
     *
     * @param string $body
     * @return void
     */
    public function setBody($body);

    /**
     * Get the message body.
     *
     * @return string
     */
    public function getBody();

    /**
     * Mark the message as read.
     *
     * @return void
     */
    public function markAsRead();

    /**
     * Mark the message as unread.
     *
     * @return void
     */
    public function marAsUnread();

    /**
     * Check if the message is read.
     *
     * @return boolean
     */
    public function isRead();
}