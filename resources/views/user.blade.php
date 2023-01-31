@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">
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
                <h6 class="m-0 font-weight-bold text-primary">Liste des utilisateurs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Login</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Login</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($userAll as $user)
                            <tr>
                                <td>{{$user->nom}}</td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->user}}</td>
                                <td><button class="btn btn-primary" data-toggle="modal" data-target=".edit_{{$user->id_user}}"><i class="fas fa-edit"></i></button>
                                    <button onclick="deleteUser('{{$user->id_user}}')" class="btn btn-danger"><i class="fas fa-trash"></i></button><br><br>
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
                <h5 class="modal-title">Utilisateur </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        Nom
                        <input type="text" class="form-control" id="nomuser" />
                    </div>
                    <div class="col-sm-4">
                        Prenom
                        <input type="text" class="form-control" id="prenomuser" />
                    </div>
                    <div class="col-sm-4">
                        Login
                        <input type="text" class="form-control" id="user" />
                    </div>
                    <div class="col-sm-4">
                        Mot de passe
                        <input type="text" class="form-control" id="passuser" />
                    </div>

                    <div class="col-sm-4">
                        Role
                        <select id="selectprivilege" class="form-control" name="privilege">
                            <option value=""></option>
                            @foreach($privilegeAll as $privilege)
                            <option value="{{$privilege->id_privilege}}">{{$privilege->lib_privilege}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="" id="adduser" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($userAll as $user)

<div class="modal fade edit_{{$user->id_user}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Utilisateur </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        Nom
                        <input type="text" class="form-control" id="u_nomuser_{{$user->id_user}}" value="{{$user->nom}}" />
                    </div>
                    <div class="col-sm-4">
                        Prenom
                        <input type="text" class="form-control" id="prenom_{{$user->id_user}}" value="{{$user->prenom}}" />
                    </div>
                    <div class="col-sm-4">
                        Login
                        <input type="text" class="form-control" id="login_{{$user->id_user}}" value="{{$user->user}}" />
                    </div>

                </div><br>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="updateUser('{{$user->id_user}}')" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop