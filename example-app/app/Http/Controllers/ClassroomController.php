<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
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
        //
        return view('locais.create');
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
        request()->validate([
            'inputLocalEnc' => 'required'
        ]);


        //Inserção de dados no Formulário locais
        $localidade = new classroom();
        $localidade->classroom = request('inputLocalEnc');

        $localidade->save();
        return redirect('/locais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(classroom $classroom)
    {
        //
    }
}
