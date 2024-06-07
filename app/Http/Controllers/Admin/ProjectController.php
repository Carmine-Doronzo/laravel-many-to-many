<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderby('name','asc')->get();
        return view('admin.projects.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // $request->validate([
        //     'name'=> 'required|min:10',
        //     'description' => 'nullable|max:10000',
        //     'github_url'=> 'required|max:200',
        // ]);
        
        $form_data = $request->validated();
        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        // dd($form_data, $slug);
        $n = 0;

        do {
            // SELECT * FROM `posts` WHERE `slug` = ?
            $find = Project::where('slug', $slug)->first(); // null | Post

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

       
        

        $form_data['slug'] = $slug;

        $new_project = Project::create($form_data);
        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name','asc')->get();
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $project->update($form_data);
        return to_route('admin.projects.show',$project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
