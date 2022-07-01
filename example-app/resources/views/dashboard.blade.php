@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Administração</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Início</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <!-- <div class="row"> -->
            {{-- <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h2>Objetos <br> Perdidos</h2>
                  <br>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              {{-- <div class="small-box bg-success">
                <div class="inner">
                  <h2>Objetos Entregues</h2>
                  <br>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h2>Objetos Removidos</h2>
                  <br>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h2>Notícias</h2>
                  <br>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> --}}
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
              <div class="card">
                  <div class="card-header bg-lightblue">
                    <h3 class="card-title">Objetos Perdidos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="objetos" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Objeto</th>
                                  <th>Categoria</th>
                                  <th>Encontrado</th>
                                  <th>Entregue</th>
                                  <th>Doado</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Camisola</td>
                                  <td>Roupa</td>
                                  <td>Sala 1</td>
                                  <td>Não</td>
                                  <td>Não</td>
                              </tr>
                              <tr>
                                  <td>Chapéu</td>
                                  <td>Roupa</td>
                                  <td>Sala 31</td>
                                  <td>Sim</td>
                                  <td>Não</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
                </div>
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
