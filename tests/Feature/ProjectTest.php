<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    /**
     * Test fonctionnel sur le succès d'une requête
     */
    public function testValidationStatus200()
    {
        $response = $this->get('/project');
        $response->assertStatus(200);
    }

    /**
     * Test Fonctionnel sur la présence de la balise h1 et du texte associé
     */
    public function testValidH1()
    {
        $response = $this->get('/project');
        $response->assertSee('<h1>Liste des projets</h1>');
    }
}
