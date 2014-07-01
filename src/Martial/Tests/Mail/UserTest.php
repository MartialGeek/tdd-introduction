<?php

namespace Martial\Tests\Mail;

use Martial\Mail\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $id = 42;
        $name = 'John';
        $email = 'john@do.net';
        $user = new User();
        $user->setId($id);
        $user->setName($name);
        $user->setEmail($email);

        $this->assertSame($id, $user->getId());
        $this->assertSame($name, $user->getName());
        $this->assertSame($email, $user->getEmail());
        $this->assertInstanceOf('\Martial\Mail\UserInterface', $user);
    }
}