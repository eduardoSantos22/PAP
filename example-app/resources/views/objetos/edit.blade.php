@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Objetos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Editar Objeto</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Objeto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/objetos/{{ $objeto->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group row"> <!-- Tipo de objeto -->
                    <div class="col-md-4">
                        <label for="inputTipoDeObj">Tipo de objeto:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" required value="{{ empty(old('inputTipoDeObj')) ? $objeto->object_type : old('inputTipoDeObj') }}" name="inputTipoDeObj" id="inputTipoDeObj" placeholder="Insira o tipo de objeto">
                        @error('inputTipoDeObj')
                            <p class="text-danger">
                                {{ $errors->first('inputTipoDeObj') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
                <div class="form-group row"> <!-- Local onde foi encontrado -->
                    <div class="col-md-4">
                        <label for="inputLocalEnc">Local onde foi encontrado: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control select2" name="inputLocalEnc" id="inputLocalEnc" style="width: 100%;">
                            <option value="DO" disabled selected hidden>Escolha aqui</option>
                            @foreach ($locais as $classrooms)
                                @if ($objeto->classroom_id == $classrooms->id)
                                    <option value="{{ $classrooms->id }}" selected>{{ $classrooms->designation }}</option>
                                @else
                                    <option value="{{ $classrooms->id }}">{{ $classrooms->designation }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('inputLocalEnc')
                            <p class="text-danger">
                                {{ $errors->first('inputLocalEnc') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
                <div class="form-group row"> <!-- Dia em que foi encontrado -->
                    <div class="col-md-4">
                        <label for="inputDiaEnc">Dia em que foi encontrado:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="date" required  value="{{ empty(old('inputDiaEnc')) ? $objeto->day_found : old('inputDiaEnc') }}" class="form-control" name="inputDiaEnc" id="inputDiaEnc">
                        @error('inputDiaEnc')
                            <p class="text-danger">
                                {{ $errors->first('inputDiaEnc') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
                <div class="form-group row"> <!-- Hora em que foi encontrado (opcional) -->
                    <div class="col-md-4">
                        <label for="inputHoraEnc">Hora em que foi encontrado (opcional):</label>
                    </div>
                    <div class="col-md-4">
                        <input type="time" nullable value="{{ empty(old('inputHoraEnc')) ? $objeto->hour_found : old('inputHoraEnc') }}" class="form-control" name="inputHoraEnc" id="inputHoraEnc">
                    </div>
                </div><hr>
                <div class="form-group row"> <!-- Categoria -->
                    <div class="col-md-4">
                        <label for="inputCategoria">Categoria: </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control select2" name="inputCategoria" id="inputCategoria" style="width: 100%;">
                            <option value="DO" disabled selected hidden>Escolha aqui</option>
                            @foreach ($categorias as $categories)

                                @if ($objeto->category_id == $categories->id )
                                    <option value="{{ $categories->id }}" selected>{{ $categories->name }}</option>
                                @else
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('inputCategoria')
                            <p class="text-danger">
                                {{ $errors->first('inputCategoria') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
                <div class="form-group"> <!-- Entregue sim ou não -->
                    <div class="col-md-4">
                        <label for="inputEntregue">Objeto entregue:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" nullable checked="{{ empty(old('inputEntregue')) ? $objeto->delievered : old('inputEntregue') }}" class="form-control" name="inputEntregue" id="inputEntregue">
                    </div>
                </div><hr>
                <div class="form-group"> <!-- Doado sim ou não -->
                    <div class="col-md-4">
                        <label for="inputDoado">Objeto doado:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="checkbox" nullable checked="{{ empty(old('inputDoado')) ? $objeto->donated : old('inputDoado') }}" class="form-control" name="inputDoado" id="inputDoado">
                    </div>
                </div>
                <div class="form-group row"> <!-- Observações -->
                    <div class="col-md-4">
                        <label for="textObserv">Observações:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" required id="textObserv" name="textObserv" rows="5" placeholder="Insira aqui observações sobre o objeto">{{ empty(old('textObserv')) ? $objeto->observation : old('textObserv') }}</textarea>
                        @error('textObserv')
                            <p class="text-danger">
                                {{ $errors->first('textObserv') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
                <div class="form-group"> <!-- Fotografia(s) do(s) objeto(s) -->
                    <label>Fotografia do objeto:</label>
                    <div class="user-image mb-3 text-center">
                        <div class="imgPreview"> </div>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="images">Insira a fotografia do objeto</label>
                            <input type="file" class="custom-file-input" name="imageFile[]" id="images" multiple="multiple">
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload Foto</span>
                        </div>
                    </div>
                        @error('imageFile')
                            <p class="text-danger">
                                {{ $errors->first('imageFile') }}
                            </p>
                        @enderror
                        @error('imageFile.*')
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">
                                    {{ $error }}
                                </p>
                            @endforeach
                        @enderror
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                    <button type="submit" class="btn btn-success" id="btnInserir" name="btnInserir">Inserir</button>
                    <button type="button" class="btn btn-primary" id="btnLimpar" name="btnLimpar">Limpar</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
