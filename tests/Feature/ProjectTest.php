<?php

namespace Tests\Feature;

use App\Project;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test fonctionnel sur le succès d'une requête
     */
    public function testValidationStatus200()
    {
        // Etant donné que la vue est bien associée à sa route
        // Lorsque l'on saisit l'url /projects
        $response = $this->get('/projects');

        // On obtient une réponse Status 200 OK
        $response->assertStatus(200);
    }

    /**
     * Test fonctionnel sur la présence de la balise h1 et du texte associé
     */
    public function testValidH1()
    {
        // Etant donné que la vue est bien associée à sa route
        // Lorsque l'on saisit l'url /projects
        $response = $this->get('/projects');

        // La balise h1 contenant la liste des projets s'affiche
        $response->assertSee('<h1>Listes des projets</h1>');
    }

    public function testListOfProjects()
    {
        // Etant donné la création d'une base de données des projets
        $project = Factory(Project::class)->create();

        // Lorsque l'on saisit l'url /project
        $response = $this->get('/projects');

        // On voit le nom du projet dans la page
        $response->assertSee($project->titre);
    }
}
