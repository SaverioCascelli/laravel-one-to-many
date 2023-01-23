<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::orderby('id', 'desc')->paginate(5);
        $direction = 'desc';
        return view('admin.projects.index', compact('data', 'direction'));
    }

    public function orderby($column, $direction)
    {

        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $data =  Project::orderby($column, $direction)->paginate(5);
        return view('admin.projects.index', compact('data', 'direction'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $new_project = new Project();
        $data = $request->all();
        if (array_key_exists('img', $data)) {
            //dd($data);
            $data['img_original_name'] = $request->file('img')->getClientOriginalName();
            $data['img'] = Storage::put('uploads', $data['img']);
        }
        $data['slug'] = Project::generateSlug($data['name']);

        $new_project->fill($data);
        $new_project->save();

        return redirect(route('admin.projects.show', $new_project));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {

        $data = $request->all();

        if ($data['name'] != $project->name) {
            $data['slug'] = Project::generateSlug($data['name']);
        } else {
            $data['slug'] = $project->slug;
        }

        if (array_key_exists('img', $data)) {
            if ($project->img) {
                Storage::disk('public')->delete($project->img);
            }
            $data['img_original_name'] = $request->file('img')->getClientOriginalName();
            $data['img'] = Storage::put('uploads', $data['img']);
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if ($project->img) {
            Storage::disk('public')->delete($project->img);
        }
        $project->delete();

        return redirect(route('admin.projects.index'));
    }
}
