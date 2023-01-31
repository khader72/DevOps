@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ri}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-router fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">AVISO</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$avi}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa fa-ups fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ENERGIE</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$en}}</div>
                                </div>
                                <!--<div class="col">
                                    <div class="progress progress-sm mr-2">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$si}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-server fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Hostname</th>
                                <th>Adresse</th>
                                <th>Description</th>
                                <th>Equipement</th>
                                <th>Zone</th>
                                <th>Service</th>
                                <th>Email</th>
                                <th>Departement</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Hostname</th>
                                <th>Adresse</th>
                                <th>Description</th>
                                <th>Equipement</th>
                                <th>Zone</th>
                                <th>Service</th>
                                <th>Email</th>
                                <th>Departement</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataAll as $data)
                            <tr>
                                <td>{{$data->hostname}}</td>
                                <td>{{$data->adresse_ip}}</td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->libelle_equipement}}</td>
                                <td>{{$data->libelle_type}}</td>
                                <td>{{$data->libelle_service}}</td>
                                <td>{{$data->email_service}}</td>
                                <td>{{$data->dept_service}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /.container-fluid -->

@stop