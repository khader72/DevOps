@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">
                    Ajouter
                    <i class="fas fa-plus" ></i>
                </a>
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
                            @foreach($serviceAll as $service)
                            <tr>
                                <td>{{$service->libelle_service}}</td>
                                <td>{{$service->email_service}}</td>
                                <td>{{$service->dept_service}}</td>
                                <td><button class="btn btn-primary" data-toggle="modal" data-target=".edit_{{$service->id_service}}" ><i class="fas fa-edit" ></i></button>
                                    <button  onclick="deleteService('{{$service->id_service}}')" class="btn btn-danger" ><i class="fas fa-trash" ></i></button><br><br>
                                </td>
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

@foreach($serviceAll as $service)

<div class="modal fade edit_{{$service->id_service}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier service </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">                   
                    <div class="col-sm-4">
                        Nom
                        <input type="text" class="form-control" id="u_nomservice_{{$service->id_service}}" value="{{$service->libelle_service}}" />                    
                    </div>
                    <div class="col-sm-4">
                        Email
                        <input type="text" class="form-control" id="emailservice_{{$service->id_service}}" value="{{$service->email_service}}" />                    
                    </div> 
                    <div class="col-sm-4">
                        Direction
                        <input type="text" class="form-control" id="direction_{{$service->id_service}}" value="{{$service->dept_service}}" />                    
                    </div>
                </div><br>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  onclick="updateService('{{$service->id_service}}')" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop

