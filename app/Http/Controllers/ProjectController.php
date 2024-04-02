<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $projects = Project::all();
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate(
            [
                'title' =>  'required|unique:projects|max:100',
                'description' => 'max:8192',
                'thumb' => 'max:250|active_url',
                'stack' => 'nullable'
            ]
        );
        Project::create($validated_data);
        return redirect()->route('dashboard');
    }

    public function show(Project $project)
    {
        // Logic to show a specific project
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated_data = $request->validate(
            [
                'title' =>  ['required', 'max:100', Rule::unique('projects')->ignore($project->id)],
                'description' => 'max:8192',
                'thumb' => 'max:250|active_url',
                'stack' => 'nullable'
            ]
        );
        $project->update($validated_data);
        return redirect()->route('dashboard');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard');
    }
}
