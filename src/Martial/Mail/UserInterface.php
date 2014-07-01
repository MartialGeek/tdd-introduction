<?php

namespace Martial\Mail;

/**
 * Interface UserInterface
 * @package Martial\Mail
 */
interface UserInterface
{
    /**
     * Set the user ID.
     *
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * Get the user ID.
     *
     * @return int
     */
    public function getId();

    /**
     * Set the user name.
     *
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * Get the user name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set the user email.
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email);

    /**
     * Get the user email.
     *
     * @return string
     */
    public function getEmail();
}