<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NoteControllerTest extends WebTestCase
{
    public function testGetnotes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getNotes');
    }

    public function testGetnote()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getNote/{note_id}');
    }

}
