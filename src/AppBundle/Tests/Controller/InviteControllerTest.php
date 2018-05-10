<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InviteControllerTest extends WebTestCase
{
    public function testGetinvites()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getInvites');
    }

    public function testGetinvite()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getInvite/{invite_id}');
    }

}
