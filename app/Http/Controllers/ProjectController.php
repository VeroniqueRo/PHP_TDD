<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Project;



class ProjectController extends Controller
{
   public function index()
   {
       $projects = Project::all();
       return view('projects', compact('projects'));
   }
    function detailProject($id) {

        $projects = Project::find($id);
        return view('projectDetail', compact('projects'));

    }
}
