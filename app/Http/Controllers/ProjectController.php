<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
//       $users = $projects->users->find($projects->user_id);
//       return view('projects', compact('projects'));
        return view('projects', compact('projects'));
    }

    function detailProject($id)
    {

        $project = Project::find($id);
        $user = $project->user->find($project->user_id);
        return view('projectDetail', compact('project', 'user'));

    }

    // Fonctions d'ajout d'un projet
    public function create()
    {

        $user = User::all();
        return view('projectAjout');
    }

    public function store(Request $request)

    {

        $newProject = new Project();
        $newProject->ProjectTitle = $request->projecttitle;
        $newProject->Descriptive = $request->projectdescriptive;
        $newProject->user_id = Auth::user()->id;

        $newProject->save();
        return redirect('/projects');

    }

    // Fonctions de modification d'un projet
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projectModif', compact('project'));
    }

    public function update($id)
    {
        $modifProjet = Project::find($id);
        $modifProjet->ProjectTitle = request('newprojecttitle');
        $modifProjet->Descriptive = request('newprojectdescriptive');

        $modifProjet->save();
        return redirect('/projects');
    }

}
