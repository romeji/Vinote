<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VinControllerTest extends WebTestCase
{
    public function testGetvins()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getVins');
    }

    public function testGetvin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getVin/{vin_id}');
    }

}
