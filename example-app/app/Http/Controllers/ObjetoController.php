<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\category;
use App\Models\classroom;
use App\Models\photo;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ObjetoController extends Controller
{
    /**
     * Display a lis ting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listagem de Objetos
        $objetos = Objeto::all(); // select * from objetos;
        return view('objetos.index', compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = category::all(); // Select * from categories;
        $locais = classroom::all();
        return view('objetos.create', compact('categorias', 'locais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Validação do Formulário Objeto
    {
        request()->validate([
            'inputTipoDeObj' => 'required',
            'inputLocalEnc' => 'required',
            'inputDiaEnc'   => 'required',
            'inputHoraEnc'  => 'nullable',
            'inputCategoria' => 'required',
            'inputEntregue' => 'nullable',
            'inputDoado'    => 'nullable',
            'textObserv'    => 'required'
        ]);


        //Inserção de dados no Formulário Objeto
        $objeto = new Objeto();
        $objeto->object_type = request('inputTipoDeObj');
        $objeto->classroom_id = request('inputLocalEnc');
        $objeto->day_found = request('inputDiaEnc');
        $objeto->hour_found = request('inputHoraEnc');
        $objeto->category_id = request('inputCategoria');
        $objeto->delievered = $request->has('inputEntregue');
        $objeto->donated = $request->has('inputDoado');
        $objeto->observation = request('textObserv');
        $objeto->save();

        $request->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png|max:4096'
        ]);
        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $imgData[] = $name;
            }
            $fileModal = new photo();
            $fileModal->designacao = json_encode($imgData);
            $fileModal->objeto_id = $objeto->id;
            $fileModal->save();
        }
        return redirect('/objetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function show(Objeto $objeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Objeto $objeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objeto $objeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objeto $objeto)
    {
        //
    }
}
