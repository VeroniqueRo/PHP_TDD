<?php

namespace Tests\Feature;

use App\Project;
use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
Use Illuminate\Auth\Authentication;
use Illuminate\Auth\AuthenticationException;

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
     * TEST fonctionnel sur la présence de la balise h1 et du texte associé
     */
    public function testValidH1()
    {
        // Etant donné que la vue est bien associée à sa route
        // Lorsque l'on saisit l'url /projects
        $response = $this->get('/projects');
        // La balise h1 contenant la liste des projets s'affiche dans la page
        $response->assertSee('<h1>Listes des projets</h1>');
    }

    /**
     * TEST fonctionnel validant la présence du titre d’un projet
     * sur la page de liste des projets
     */
    public function testListOfProjects()
    {
        // Etant donné la création d'une base de données des projets
        $project = Factory("App\Project")->create();
        // Lorsque l'on saisit l'url /project
        $response = $this->get('/projects');
        // On voit le nom du projet dans la page
        $response->assertSee($project->ProjectTitle);
    }

    /**
     * TEST fonctionnel validant la présence du nom de l’auteur d’un projet
     * sur la page de détails d’un projet
     */
    public function testNomDansDetailProject ()
    {
        // Etant donné une vue détaillée de chaque projet
        $project = Factory(Project::class)->create();
        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);
        // Le nom du projet est bien dans la page
        $response->assertSee($project->ProjectTitle);
    }

    /**
     * TEST fonctionnel validant la présence du descriptif d’un projet
     * sur la page de détails d’un projet
     */
    public function testDescriptionDansDetailProject ()
    {
        // Etant donné que je crée un projet
        $project = Factory(Project::class)->create();
        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);
        // Le descriptif du projet est bien dans la page
        $response->assertSee($project->Descriptive);
    }

    /**
     * TEST unitaire validant la relation entre les models ​Project​ et ​User
     */
    public function testModelRelation()
    {
        // Etant un projet créé
        $project = Factory(Project::class)->create();
        // Lorsqu'on appelle l'user_id de la table Projects
        $actual = $project->user_id;
        // Alors  on obtient le même id existant dans la table Users
        $expected = $project->user->id;
        $this->assertEquals($expected, $actual);

//        dump($actual, $expected);
//        dump($project->user->name);
    }

    /**
     * TEST fonctionnel validant la présence du nom de l’auteur d’un projet sur
     * la page de détails d’un projet
     */
    public function testNomAuteurSurPageDetail ()
    {
        // Etant donné une vue détaillée de chaque projet
        $project = Factory(Project::class)->create();
        // Lorsque l'on saisit l'url /project/id du projet
        $response = $this->get('/project/'.$project->id);
        // Le nom de l'auteur du projet s'affiche bien dans la page
        $response->assertSee($project->user->name);

//        dump($project->user->name);
    }

    /**
     * TEST fonctionnel validant qu’un utilisateur connecté peut afficher
     * la page de création un projet
     */
    public function testUtilisateurConnectePeutAfficherFormulaireCreationProjet ()
    {
        // Etant donné un utilisateur créé
        $user = factory(User::class)->create();
        // Que l'on authentifie en tant qu'utilisateur actuel
        $this->actingAs($user);
        // Lorsque l'on va sur l'url de création de projet
        $response = $this->get('/projectAjout');
        // Le nom de l'auteur du projet s'affiche bien dans la page
        $response->assertSee('Bonjour '.$user->name);
    }

    /**
     * TEST fonctionnel validant qu’un utilisateur connecté
     * peut ajouter un projet
     */
    public function testUtilisateurConnectePeutAjouterNouveauProjet()
    {
        // Etant donné un utilisateur et un projet créé
        $user = factory(User::class)->create();
        // Que l'on authentifie en tant qu'utilisateur actuel
        // Que l'on va sur la page de création de projet
        // On peut voir le nom de l'utilisateur affiché
        $this->actingAs($user)
            ->get('/projectAjout')
            ->assertSee('Bonjour '.$user->name);
        // Lorsque l'on soumet un formulaire d'ajout de projet
        $projet = [
            'projecttitle' => 'Test Nouveau Projet',
            'projectdescriptive'=>'Nouvelle description',
        ];

        $this->post('/projects/liste', $projet);
        // Quand on se rend sur la page des projets
        $response = $this->get('/projects');
        // Alors le projet apparait dans la liste des projets
        $response->assertSee('Test Nouveau Projet');
    }

    /**
     * TEST fonctionnel validant qu’un utilisateur non connecté
     * ne peut pas ajouter un projet
     */
    public function testUtilisateurNonConnectePeutPasAjouterNouveauProjet()
    {
        // Etant donné un utilisateur qui va sur le site sans se connecter
        // On lève une exception unauthentification
        $this->expectException(AuthenticationException::class);

        // Lorsque l'on soumet un formulaire d'ajout de projet
        $projet = [
            'projecttitle' => 'Test Nouveau Projet',
            'projectdescriptive'=>'Nouvelle description',
        ];

        $this->post('/projects/liste', $projet);

    }

    /**
     * TEST validant qu’un utilisateur non connecté ne peut pas afficher
     * le formulaire de création d’un projet
     */
    public function testUtilisateurNonConnecteNePeutAjouterNouveauProjet()
    {
        // Etant donné un utilisateur qui va sur le site sans se connecter
        // On attend une exception unauthentification
        $this->expectException(AuthenticationException::class);
        // Lorsque l'on va sur la page de création de projet
        $this->get('/projectAjout');

    }

    /**
     * TEST validant que seul l’auteur d’un projet peut l’éditer
     */
    public function testSeulAuteurDuProjetPeutEditer ()
    {
        // Etant donné un utilisateur créé
        $user = factory(User::class)->create();
        // Que l'on authentifie en tant qu'utilisateur actuel
        $this->actingAs($user);
        // Etanr donné un projet créé par un autre utilisateur
        $project = factory(Project::class)->create();
        // Lorsque l'on va sur l'url de modification du projet
        $response = $this->get('/projectModif/'.($project->id));
        // Un message d'erreur s'affiche dans la page
        $response->assertSee('Vous ne pouvez pas modifier ce projet');
    }


}
