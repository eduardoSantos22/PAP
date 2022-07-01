@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categorias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Listar Categorias</li>
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
              <h3 class="card-title">Listagem de Categorias</h3>
            </div>
            <!-- /.card-header -->


            <div class="card-body">
                <table id="objetos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Remover</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->name }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

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
