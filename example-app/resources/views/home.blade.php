@extends('layouts.outer')

@section('content')

<div class="div1">

    <select class="seleciona" name="filtroEscolha" id="filtroEscolha">
        <option value="" disabled selected>Selecione a sua Turma</option>
        <option value="turma1">7.ºA</option>
        <option value="turma1">7.ºB</option>
        <option value="turma1">7.ºC</option>
    </select>

    <select class="seleciona" name="filtroEscolha" id="filtroEscolha">
      <option value="" disabled selected>Escolha uma Categoria</option>
      <option value="DE">Dispositivos eletrónicos</option>
      <option value="C">Cartões</option>
      <option value="R">Roupa</option>
      <option value="Cal">Calçado</option>
      <option value="Mat">Material escolar</option>
      <option value="Outros">Outros</option>
    </select>

    <input class="seleciona1" type="datetime-local" id="data" name="data">
</div>



<section class="py-5">
<div class="container px-4 px-lg-5 mt-5 animate__animated animate__fadeInLeft">
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
    <div class="col-3 mb-5">
        <div class="card h-70">
            <!-- Product image-->
            <img class="card-img-top" src="/assets/image_processing20200510-5493-1ydp5eq.png" alt="..." />
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">Óculos</h5>
                </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection
