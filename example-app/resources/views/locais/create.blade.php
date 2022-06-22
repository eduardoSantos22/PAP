@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Locais</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Nova Sala</li>
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
              <h3 class="card-title">Nova Sala</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/locais" enctype="multipart/form-data">
            @csrf
              <div class="card-body">
                <div class="form-group row"> <!-- Nome da sala -->
                    <div class="col-md-4">
                        <label for="inputLocalEnc">Sala:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" required name="inputLocalEnc" id="inputLocalEnc" placeholder="Insira a sala">
                        @error('inputLocalEnc')
                            <p class="text-danger">
                                {{ $errors->first('inputLocalEnc') }}
                            </p>
                        @enderror
                    </div>
                </div><hr>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                    <button type="submit" class="btn btn-success" id="btnInserir" name="btnInserir">Inserir</button>
                    <button type="reset" class="btn btn-primary" id="btnLimpar" name="btnLimpar">Limpar</button>
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
