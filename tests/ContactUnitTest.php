<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(){
        $contact = new Contact();

        $contact->setLastname('lastname')
                ->setFirstname('firstname')
                ->setPhone('0700000000')
                ->setMail('test@mail.com')
                ->setMessage('message');

        $this->assertTrue($contact->getLastname() === 'lastname');
        $this->assertTrue($contact->getFirstname() === 'firstname');
        $this->assertTrue($contact->getPhone() === '0700000000');
        $this->assertTrue($contact->getMail() === 'test@mail.com');
        $this->assertTrue($contact->getMessage() === 'message');
    }

    public function testIsFalse(){
        $contact = new Contact();

        $contact->setLastname('lastname')
            ->setFirstname('firstname')
            ->setPhone('0700000000')
            ->setMail('test@mail.com')
            ->setMessage('message');

        $this->assertFalse($contact->getLastname() === 'false');
        $this->assertFalse($contact->getFirstname() === 'false');
        $this->assertFalse($contact->getPhone() === 'false');
        $this->assertFalse($contact->getMail() === 'false');
        $this->assertFalse($contact->getMessage() === 'false');
    }

    public function testIsEmpty(){
        $contact = new Contact();

        $this->assertEmpty($contact->getLastname());
        $this->assertEmpty($contact->getFirstname());
        $this->assertEmpty($contact->getPhone());
        $this->assertEmpty($contact->getMail());
        $this->assertEmpty($contact->getMessage());
    }
}
