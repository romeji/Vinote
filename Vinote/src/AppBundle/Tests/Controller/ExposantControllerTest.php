<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExposantControllerTest extends WebTestCase
{
    public function testGetexposants()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getExposants');
    }

    public function testGetexposant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getExposant/{exposant_id}');
    }

}
