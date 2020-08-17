<?php

namespace Tests\Unit;

use App\Contact;
use Carbon\Carbon;
use Tests\TestCase;

class NewContactTest extends TestCase
{

    public function providerIsExpired()
    {
        return [
            'not expired' => [
                'ttl' => '10m',
                'created_at' => Carbon::now()->subMinutes(5),
                'expected' => false,
            ],
            'expired' => [
                'ttl' => '10m',
                'created_at' => Carbon::now()->subMinutes(15),
                'expected' => true,
            ],
            'inf_test' => [
                'ttl' => 'inf',
                'created_at' => Carbon::now()->subMinutes(5),
                'expected' => false,

            ]

        ];
    }
    /**
     * A basic test example.
     *
     * @dataProvider providerIsExpired
     * @return void
     */
    public function testisExpired($ttl,$created_at, $expected)
    {
        $Contact = new Contact();
        $Contact->ttl = $ttl;
        $Contact->created_at = $created_at;
        $this->assertEquals($expected, $Contact->isExpired());
    }

    public function testGetTtlSeconds(){
        $Contact = new Contact();
        $Contact->ttl = 'inf';
        $this->assertEquals(null, $Contact->getTtlSeconds());
    }
}
