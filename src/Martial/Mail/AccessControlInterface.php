<?php

namespace Martial\Mail;

/**
 * Interface AccessControlInterface
 * @package Martial\Mail
 */
interface AccessControlInterface
{
    /**
     * Check if a user can send a message to another user.
     *
     * @param UserInterface $sender
     * @param UserInterface $recipient
     * @return bool
     */
    public function isAllowedToSend(UserInterface $sender, UserInterface $recipient);

    /**
     * Check if a user can read a message from another user.
     *
     * @param UserInterface $sender
     * @param UserInterface $recipient
     * @return bool
     */
    public function isAllowedToRead(UserInterface $sender, UserInterface $recipient);
}