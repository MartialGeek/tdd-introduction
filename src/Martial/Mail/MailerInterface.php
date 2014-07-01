<?php

namespace Martial\Mail;

/**
 * Interface MailerInterface
 * @package Martial\Mail
 */
interface MailerInterface
{
    /**
     * Send a mail.
     * @param string $emailSender
     * @param string $emailRecipient
     * @param string $subject
     * @param string $body
     * @return boolean
     */
    public function send($emailSender, $emailRecipient, $subject, $body);
} 