@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recherche</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-xl-12 col-md-6 mb-4">
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
        </div>
    </div>
    <br>


    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Email</th>
                                <th>Direction</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Service</th>
                                <th>Email</th>
                                <th>Direction</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /.container-fluid -->

<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Service </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        Nom
                        <input type="text" class="form-control" id="nomservice" />
                    </div>
                    <div class="col-sm-4">
                        Email
                        <input type="text" class="form-control" id="emailservice" />
                    </div>
                    <div class="col-sm-4">
                        Direction
                        <input type="text" class="form-control" id="direction" />
                    </div>
                </div><br>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="" id="addservice" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>


@stop