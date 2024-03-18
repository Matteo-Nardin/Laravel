<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('posts');

        // S6L4_Laravel/esercizio/app/Http/Controllers:
        // return Author::with('books')->paginate(5);
        // return view('books', ['books' => Book::get()]); // passo i dati alla view
        // return Category::with('books')->paginate(5);

        // doppio join
        // return view('project', ['project' => Project::with('activities')->with('user')->get()]);


        //filtro per id
        //S6L3_Laravel/app-laravel-3/app/Http/Controllers/PostController.php


        //S6L3_Laravel/esercizio-3/app/Http/Controllers/LibroController.php
        // $books = Libro::orderBy('id');
        // return view('books', ['books' => $books->get()]);

        //-----------------------------------------
        //mostro solo i progetti dell'utente loggato
        $projects = Project::with('projectTasks')->where('user_id', '=', Auth::user()->id) ->get();
        //$projects = Project::with('projectTasks')->get(); //join con la tabella task utilizzando il metodo 'projectTasks' del modell Project
        return view('/project' , ['projectList' => $projects]); //nel blade richiamo l'etichetta 'projectList'

        //return auth::user(); //utente loggato
        //return Project::get(); //API

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('projectForm');
        return view('/projectForm', ['user' => User::get()]);
        // return view('projectForm', ['user' => User::get(), 'currentUser' => auth()->user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //return 'sono store';

        $newData = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Project::create($newData);
        // 'index' è il riferimento al metodo
        return redirect()->action([ProjectController::class, 'index']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //conosce già l'id
        //return $project; //API
        //return 'sono show';

        return view('projectDetail', ['projectDetail' => $project]);

        //aggiunge i task al project
        //return view('projectDetail', ['project' => $project->load('task')])
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // if($post->user_id != Auth::user()->id) {
        //     abort(401);
        // }
        // return $post;
        //return Auth::user();
        return view('projectFormModify');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/project');
    }
}
