<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Project;
use App\User;



class ProjectController extends Controller
{
   public function index()
   {
       $projects = Project::all();
       return view('projects', compact('projects'));
   }
    function detailProject($id) {

        $project = Project::find($id);
        $user = $project->user->find($project->user_id);
        return view('projectDetail', compact('project','user'));

    }
}
