<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with( "category", "tecnologies")->paginate(30);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(string $id){
        $project = Project::with("category", "tecnologies")->findOrFail($id);
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}