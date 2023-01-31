@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Equipement</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Liste des equipements</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing=0">
                        <thead>
                            <tr>
                                <th>Equipement</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Equipement</th>
                                <th></th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($equipementAll as $equipement)
                            <tr>
                                <td>{{$equipement->libelle_equipement}}</td>
                                <td><button class="btn btn-primary" data-toggle="modal" data-target=".edit_{{$equipement->id_equipement}}" ><i class="fas fa-edit" ></i></button>
                                    <button  onclick="deleteEquipement('{{$equipement->id_equipement}}')" class="btn btn-danger" ><i class="fas fa-trash" ></i></button><br><br>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter equipement</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">                   
                    <div class="col-sm-8">
                        Equipement
                        <input type="text" class="form-control" name="equipement" id="equipement" />                    
                    </div>
                </div><br>

                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addequipement" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($equipementAll as $equipement)
<div class="modal fade edit_{{$equipement->id_equipement}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier equipement</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">                   
                    <div class="col-sm-8">
                        Equipement
                        <input type="text" id="u_equipement_{{$equipement->id_equipement}}" class="form-control" name="equipement" id="equipement" value="{{$equipement->libelle_equipement}}" />                    
                    </div>
                </div><br>

                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="" onclick="updateEquipement('{{$equipement->id_equipement}}')" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@stop

