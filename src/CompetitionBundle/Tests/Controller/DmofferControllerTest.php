<?php

namespace CompetitionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DmofferControllerTest extends WebTestCase
{
    public function testAdddemandeoffer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/adddemandeoffer');
    }

    public function testDeletedemmandeoffer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletedemmandeoffer');
    }

}
