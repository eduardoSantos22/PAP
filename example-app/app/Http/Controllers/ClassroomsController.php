<?php

namespace App\Http\Controllers;

use App\Models\classrooms;
use Illuminate\Http\Request;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('locais.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Validação do Formulário dos locais
    {
        request()->validate([
            'inputLocalEnc'=> 'required'
        ]);


        //Inserção de dados no Formulário locais
            $localidade = new classrooms();
            $localidade->classroom = request('inputLocalEnc');

            $localidade->save();
            return redirect('/locais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(classrooms $classrooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(classrooms $classrooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classrooms $classrooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(classrooms $classrooms)
    {
        //
    }

}
