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
            <li class="breadcrumb-item active">Listar Objetos</li>
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
              <h3 class="card-title">Listagem de Objetos</h3>
            </div>
            <!-- /.card-header -->


            <div class="card-body">
                <table id="projetos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Objeto</th>
                            <th>Categoria</th>
                            <th>Local</th>
                            <th>Dia</th>
                            <th>Entregue</th>
                            <th>Doado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($objetos as $objeto)
                        <tr>
                            <td>{{ $objeto->object_type }}</td>
                            <td>{{ $objeto->categories->name }}</td>
                            <td>{{ $objeto->location }}</td>
                            <td>{{ $objeto->day_found }}</td>
                            <td>{{ $objeto->delievered }}</td>
                            <td>{{ $objeto->donated }}</td>
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