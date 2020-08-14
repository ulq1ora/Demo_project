<?php

namespace Tests\Unit;

use App\Contact;
use PHPUnit\Framework\TestCase;

class NewContactTest extends TestCase
{
    private $contact;

    public function setUp() : void
    {
        parent::setUp();

        $this->contact = \App\Contact::first();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testisExpired()
    {
        $this->contact->ttl = '10m';
        $this->contact->created_at = '2020.08.19 00:00:00';
        $this->assertEquals('false', $this->contact->isExpired());
    }

}
