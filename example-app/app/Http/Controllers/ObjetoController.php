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

    {
        //Validação do Formulário Objeto
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
            //'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png|max:4096'
        ]);
        if ($request->hasfile('imageFile')) {
            $i = 1;
            foreach ($request->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                // extensao da foto
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                //remover acentos do nome do objeto na foto
                $object_type = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $objeto->object_type);
                //remover espaços do nome do objeto na foto
                $object_type = str_replace(' ', '', $object_type);
                $name = $object_type . $i . "." . $extension;
                $file->storeAs('public/uploads/', $name);
                $imgData[] = $name;
                $i++;
            }
            $fileModal = new photo();
            $fileModal->designacao = json_encode($imgData);
            $fileModal->objeto_id = $objeto->id;
            $fileModal->save();
        }
        return redirect('/objetos')->with('message', 'Objeto inserido com sucesso!');
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
        $photo = photo::where('objeto_id', $objeto->id)->first();
        $photos = json_decode($photo->designacao);
       // var_dump($photos);
        return view('objetos.show', compact('objeto', 'photos'));
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
        $categorias = category::all(); // Select * from categories;
        $locais = classroom::all();
        $photo = photo::where('objeto_id', $objeto->id)->first(); //select * from fotos where fotos.objeto_id = objetos.objeto_id;
        if($photo){
            // caso existam fotos associadas ao objeto então converte-se o campo designacao num array de designacoes
            $designacoes = json_decode($photo->designacao);
        }else{
            // caso contrário, o array designacoes fica vazio
            $designacoes = [];
        }
        return view('objetos.edit', compact('categorias', 'locais', 'objeto', 'photo', 'designacoes'));
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
        //Validação do Formulário Objeto
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
            //'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png|max:4096'
        ]);
        if ($request->hasfile('imageFile')) {

            $fileModal = photo::where('objeto_id', $objeto->id)->first();
            $photos = ($fileModal) ? json_decode($fileModal->designacao) : [];
            $i = 1;
            if (count($photos) > 0){
                //Descobre o número presente na designacao e soma-lhe uma unidade
                $i = (int) filter_var($photos[count($photos)-1], FILTER_SANITIZE_NUMBER_INT) + 1;
            }

            foreach ($request->file('imageFile') as $file) {
                $name = $file->getClientOriginalName();
                // extensao da foto
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                //remover acentos do nome do objeto na foto
                $object_type = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $objeto->object_type);
                //remover espaços do nome do objeto na foto
                $object_type = str_replace(' ', '', $object_type);
                $name = $object_type . $i . "." . $extension;
                $file->storeAs('public/uploads/', $name);
                $imgData[] = $name;
                $i++;
            }

            $imgData = array_merge($photos, $imgData);
            $fileModal->designacao = json_encode($imgData);
            $fileModal->save();
        }

        return redirect('/objetos')->with('message', 'Objeto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objeto $objeto)
    {
        //Eliminar um objeto
        $objeto->delete();
        return redirect('/objetos')->with('message', 'Objeto removido com sucesso!');
    }
}
