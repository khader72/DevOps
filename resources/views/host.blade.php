@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Host</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                    Ajouter
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <br>


    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des host</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Hostname</th>
                                <th>Adresse</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Hostname</th>
                                <th>Adresse</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($hostAll as $host)
                            <tr>
                                <td>{{$host->hostname}}</td>
                                <td>{{$host->adresse_ip}}</td>
                                <td>{{$host->description}}</td>
                                <td><button style="font-size:small" class="btn btn-primary"><i class="fas fa-eye"></i></button></td>
                                <td><button style="font-size:small" class="btn btn-primary" data-toggle="modal" data-target=".edit_{{$host->id_host}}"><i class="fas fa-edit"></i></button></td>
                                <td><button style="font-size:small" onclick="deleteHost('{{$host->id_host}}')" class="btn btn-danger"><i class="fas fa-trash"></i></button><br><br>
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
                <h5 class="modal-title">Ajouter host</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- <form> -->
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-sm-4">
                        Hostname
                        <input type="text" class="form-control" name="hostname" id="hostname" />
                    </div>
                    <div class="col-sm-4">
                        Adresse IP
                        <input type="text" class="form-control" name="adresse_ip" id="adresse_ip" />
                    </div>
                    <div class="col-sm-4">
                        Type equipement
                        <select id="selectequipement" class="form-control" name="equipement">
                            <option value=""></option>
                            @foreach($equipementAll as $equipement)
                            <option value="{{$equipement->id_equipement}}">{{$equipement->libelle_equipement}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Service à charge
                        <select id="selecteservice" class="form-control" name="equipement">
                            <option value=""></option>
                            @foreach($serviceAll as $service)
                            <option value="{{$service->id_service}}">{{$service->libelle_service}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        Descritption
                        <textarea class="form-control" name="descriptions" id="descriptions">

                        </textarea>
                    </div>
                    <div class="col-sm-4">
                        Type
                        <select id="selecttype" class="form-control" name="type">
                            <option value=""></option>
                            @foreach($typeAll as $type)
                            <option value="{{$type->id_type}}">{{$type->libelle_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="" id="addhost" class="btn btn-primary">Enregistrer</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<?php $_description = ''; ?>

<!-- Editer le host -->
@foreach($hostAll as $host)
<div class="modal fade edit_{{$host->id_host}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le host</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- <form> -->
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-sm-4">
                        Hostname
                        <input type="text" class="form-control" name="" id="u_hostname_{{$host->id_host}}" value="{{$host->hostname}}" />
                    </div>
                    <div class="col-sm-4">
                        Adresse IP
                        <input type="text" class="form-control" name="" id="u_adresse_ip_{{$host->id_host}}" value="{{$host->adresse_ip}}" />
                    </div>
                    <div class="col-sm-4">
                        Type equipement
                        <select id="u_selectequipement_{{$host->id_host}}" class="form-control" name="">
                            <option value=""></option>
                            @foreach($equipementAll as $equipement)
                            <option value="{{$equipement->id_equipement}}">{{$equipement->libelle_equipement}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Service à charge
                        <select id="u_selecteservice_{{$host->id_host}}" class="form-control" name="">
                            <option value=""></option>
                            @foreach($serviceAll as $service)
                            <option value="{{$service->id_service}}">{{$service->libelle_service}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <?php $_description = $host->description ?>
                        Descritption
                        <textarea class="form-control" name="descriptions" id="u_description_{{$host->id_host}}" cols="6">
                        {{$_description}}
                        </textarea>
                    </div>
                    <div class="col-sm-4">
                        Type
                        <select id="u_selectetype_{{$host->id_host}}" class="form-control" name="type">
                            <option value=""></option>
                            @foreach($typeAll as $type)
                            <option value="{{$type->id_type}}">{{$type->libelle_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_{{$host->id_host}}" onclick="updatehost('{{$host->id_host}}')" class="btn btn-primary">Enregistrer</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
@endforeach
@stop