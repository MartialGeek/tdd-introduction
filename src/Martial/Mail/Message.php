<?php

namespace Martial\Mail;

class Message implements MessageInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var UserInterface
     */
    private $sender;

    /**
     * @var UserInterface
     */
    private $recipient;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $body;

    /**
     * @var boolean
     */
    private $isRead;

    /**
     * Set the message ID.
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the message ID.
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the message sender.
     * @param UserInterface $sender
     * @return void
     */
    public function setSender(UserInterface $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Get the message sender.
     * @return UserInterface
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the message recipient.
     * @param UserInterface $recipient
     * @return void
     */
    public function setRecipient(UserInterface $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * Get the user recipient.
     * @return UserInterface
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set the message subject.
     * @param string $subject
     * @return void
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get the message subject.
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the message body.
     * @param string $body
     * @return void
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get the message body.
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Mark the message as read.
     * @return void
     */
    public function markAsRead()
    {
        $this->isRead = true;
    }

    /**
     * Mark the message as unread.
     * @return void
     */
    public function marAsUnread()
    {
        $this->isRead = false;
    }

    /**
     * Check if the message is read.
     * @return boolean
     */
    public function isRead()
    {
        return $this->isRead;
    }
} 