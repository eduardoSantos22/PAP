<?php

namespace App\Http\Controllers;

use App\Models\teams;
use Illuminate\Http\Request;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $turma = teams::all();
        return view('turmas.index', compact('turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('turmas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Validação do Formulário das turmas
    {
        request()->validate([
            'inputTurma'=> 'required'
        ]);


        //Inserção de dados no Formulário Turmas
            $turma = new teams();
            $turma->team = request('inputTurma');

            $turma->save();
            return redirect('/turmas')->with('message', 'Turma inserida com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(teams $teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit(teams $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teams $teams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy(teams $teams)
    {
        //
    }
}
