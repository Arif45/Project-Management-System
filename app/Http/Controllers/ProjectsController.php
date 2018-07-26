<?php

namespace App\Http\Controllers;

use App\Project;
use App\Department;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('projects.index', ['projects' => $projects]);
    }
       return view('auth.login');
    }

    public function adduser(Request $request){


        $project = Project::find($request->input('project_id'));

           if(Auth::user()->id == $project->user_id){
        $user = User::where( 'email', $request->input('email'))->first();

              $projectUser = ProjectUser::where('user_id', $user->id)
              ->where('project_id', $project->id)
              ->first();

              if($projectUser){
                  return redirect()->route('projects.show', ['project' => $project->id])
    ->with('success', $request->input('email'),' is already a member of this project');

              }
         
       

        if($user && $project){
            $project->users()->toggle($user->id);
            return redirect()->route('projects.show', ['project' => $project->id])
    ->with('success', $request->input('email'),' was added to the project successfully');
        }
    }
    return redirect()->route('projects.show', ['project' => $project->id])
    ->with('errors','Error adding user to project');




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($department_id = null)
    {
        $departments = null;

        if(!$department_id){
            $departments = Department::where('user_id', Auth::user()->id)->get();
        }
        
        return view('projects.create', ['department_id' => $department_id , 'departments' => $departments]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $project = Project::create([

                      'name' => $request->input('name'),
                      'description' => $request->input('description'),
                      'department_id' => $request->input('department_id'),
                      'user_id' => Auth::user()->id
            ]);

            if($project){
                return redirect()->route('projects.show', ['project' => $project->id])
                ->with('success', 'Project created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id );
        $comments = $project->comments;
       
        return view('projects.show', ['project' => $project, 'comments'=> $comments]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id );
       
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        

        $projectUpdate = Project::where('id', $project->id)
        ->update([

              'name' => $request->input('name'),
              'description' => $request->input('description')      

        ]);

         if($projectUpdate){


            return redirect()->route('projects.show', ['project'=>$project->id])->with('success', 'Project updated successfully');
         }
         return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findProject = Project::find( $project->id);
        if($findProject->delete()){
            return redirect()->route('projects.index')
            ->with('success', 'project deleted successfully');
        }

        return back()->withInput()->with('error' , 'project could not be deletd');
    }
}
