<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(25);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // $data =$request->all();
        // dd($request->all());
        $data = $request->validated();
        $img_path = Storage::put('uploads/projects', $data['image']);
        $data["author"] = Auth::id();
        $data["date"] = Carbon::now();
        $data["image"] = $img_path;
        $newProject = Project::create($data);
        $newProject->tecnologies()->sync($data["technologies"]);

        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        // $data["author"] = Auth::user()->name;
        // $data["date"] = Carbon::now();
        $project->update($data);
        $project->tecnologies()->sync($data["technologies"]);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->tecnologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}