@extends('layouts.outer')

@section('content')
<form id="myForm" role="form" method="POST" action="/">
    @csrf
    <div class="container">
        <div class="row mt-5">
            <div class="offset-sm-4 col-sm-3">
                <select class="form-select" name="selectCat" id="selectCat">
                    <option value="0" disabled selected>Escolha uma Categoria</option>
                    @foreach ($categorias as $categories)
                        @if (old('selectCat') == $categories->id )
                            <option value="{{ $categories->id }}" selected>{{ $categories->name }}</option>
                        @else
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- <div class="offset-sm-4 col-sm-3">
                <select class="form-select" name="selectSala" id="selectSala">
                    <option value="0" disabled selected>Escolha uma Sala</option>
                            @foreach ($locais as $classrooms)
                                @if (old('selectSala') == $classrooms->id)
                                    <option value="{{ $classrooms->id }}" selected>{{ $classrooms->designation }}</option>
                                @else
                                    <option value="{{ $classrooms->id }}">{{ $classrooms->designation }}</option>
                                @endif
                            @endforeach
                </select>
            </div> --}}

            <div class="col-sm-2">
                <button class="btn btn-secondary" type="submit" name="procurar" id="procurar">
                    <i class='fa-solid fa-magnifying-glass'></i>
                </button>
            </div>
        </div>
    </div>
</form>

<section id="objetos" class="py-2">
    <div class="container px-4 px-lg-5 mt-5 animate__animated animate__fadeInLeft">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
            @foreach ($objetos as $objeto)
            <div class="col-3 mb-5">
                <div class="card h-70">
                    <!-- Product image-->
                    <a href="/objetos/{{ $objeto->id }}">
                        <img class="card-img-top" src="{{ asset('storage/uploads')."/".json_decode($objeto->photodes)[0] }}" alt=""/>
                    </a>
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{ $objeto->object_type }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
