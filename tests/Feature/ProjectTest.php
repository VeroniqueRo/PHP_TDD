<?php

namespace Tests\Feature;

use App\Project;
use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
Use Illuminate\Auth\Authentication;

class ProjectTest extends TestCase
{
    // Pour réinitialiser la BDD à chaque lancement des tests
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
        $project = Factory("App\Project")->create();

        // Lorsque l'on saisit l'url /project
        $response = $this->get('/projects');

        // On voit le nom du projet dans la page
        $response->assertSee($project->ProjectTitle);
    }

    public function testNomDansDetailProject ()
    {
        // Etant donné une vue détaillée de chaque projet
        $project = Factory(Project::class)->create();

        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);

        // Le nom du projet est bien dans la page
        $response->assertSee($project->ProjectTitle);
    }

    public function testDescriptionDansDetailProject ()
    {
        // Etant donné que je crée un projet
        $project = Factory(Project::class)->create();

        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);

        // Le descriptif du projet est bien dans la page
        $response->assertSee($project->Descriptive);
    }

    public function testModelRelation()
    {
        // Etant donné une relation One to Many entre les Model User et Project
        $project = Factory(Project::class)->create();

        // Lorsqu'on appelle l'user_id de la table Projects
        $actual = $project->user_id;
        // Alors  on obtient le même id existant dans la table Users
        $expected = $project->user->id;
        $this->assertEquals($expected, $actual);

//        dump($actual, $expected);
    }

    public function testNomAuteurSurPageDetail ()
    {
        // Etant donné une vue détaillée de chaque projet
        $project = Factory(Project::class)->create();

        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);

        // Le nom de l'auteur du projet s'affiche bien dans la page
        $response->assertSee($project->user->name);

        dump($project->user->name);
    }

    public function testUtilisateurConnectePouvantAjouterUnProjet ()
    {
        // Etant donné un utilisateur créé
        $user = factory(User::class)->create();

        // Authentifie un utilisateur donné en tant qu'utilisateur actuel
        $this->actingAs($user)
            ->withSession(['foo' => 'bar']);

        // Lorsque l'on va sur l'url de création de projet
        $response = $this->get('/projectAjout');

        // L'utiliser &tant considéré comme l'utilisateur actuel
        $this->be($user);

        // Le nom de l'auteur du projet s'affiche bien dans la page
        $response->assertSee('Bonjour '.$user->name);
    }
}
