<?php

namespace Martial\Mail;

/**
 * Class User
 * @package Martial\Mail
 */
class User implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * Set the user ID.
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the user ID.
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the user name.
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the user name.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the user email.
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the user email.
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}