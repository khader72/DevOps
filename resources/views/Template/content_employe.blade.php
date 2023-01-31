@extends('layouts.AppCentral')
@section('title')
Ela
@endsection

@section('content')
<div class="content">

    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="card">

            <div class="card-header"><strong>Formulaire</strong><small> Employe</small></div>
            <div class="card-body">
                <form action="{{('insertEmploye')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-lg-4">
                            Nom :
                            <input class="form-control" type="text" name="NomEmploye" />
                        </div>
                        <div class="col-lg-4">
                            Prenom :
                            <input class="form-control" type="text" name="PrenomEmploye" />
                        </div>
                        <div class="col-lg-4">
                            Type Piece :
                            <select class="form-control" name="piece">
                                @foreach($Pieces as $piece)
                                <option value="{{$piece->idpiece}}">{{$piece->labelPiece}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            Numero Piece :
                            <input class="form-control" type="text" name="NumeroPieceEmploye" />
                        </div>
                        <div class="col-lg-4">
                            Telephone :
                            <input class="form-control" type="text" name="TelephoneEmploye" />
                        </div>

                        <div class="col-lg-4">
                            Poste :
                            <select class="form-control" name="post">
                                @foreach($typeEmployes as $typeEmploye)
                                <option value="{{$typeEmploye->idtype_employe}}">{{$typeEmploye->LabelType_employe}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <br>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <b><i class="fa fa-check"></i> Valider</b>
                </button>
                <button type="reset" class="btn btn-danger">
                    <b><i class="fa fa-ban"></i> Reset</b>
                </button>
            </div>
            </form>

        </div>

    </div>
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Liste des employes</strong>
            </div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Type Piece</th>
                        <th>Numero Piece</th>
                        <th>Telephone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Employes as $employe)
                    <tr>
                        <td>{{$employe->NomEmploye}}</td>
                        <td>{{$employe->PrenomEmploye}}</td>
                        <td>{{$employe->labelPiece}}</td>
                        <td>{{$employe->PieceEmploye}}</td>
                        <td>{{$employe->TelephoneEmploye}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
<!-- /Widgets -->

<!--  Traffic  -->


@endsection