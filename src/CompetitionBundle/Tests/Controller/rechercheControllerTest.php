<?php

namespace CompetitionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class rechercheControllerTest extends WebTestCase
{
    public function testRecherche()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/recherche');
    }

    public function testRechercheajax()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechercheajax');
    }

}
