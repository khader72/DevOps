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
            <form action="{{('insertPrestation')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-header"><strong>Formulaire</strong><small> Presstation</small></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            Nom client :
                            <input class="form-control" type="text" name="nomClient" />
                        </div>
                        <div class="col-lg-4">
                            Prenom client :
                            <input class="form-control" type="text" name="prenomClient" />
                        </div>
                        <div class="col-lg-4">
                            Telephone :
                            <input class="form-control" type="text" name="telClient" />
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            Immatriculation Vehicule :
                            <input class="form-control" type="text" name="immaClient" />
                        </div>
                        <div class="col-lg-4">
                            Type Vehicule :
                            <select class="form-control" name="typeVehiculeClient" id="SelectVehicule">
                                <option></option>
                                @foreach($type_vehicule as $vehicule)
                                <option value="{{$vehicule->idtype_vehicule}}">{{$vehicule->labelTypeVehicule}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            Traitement :
                            <select class="form-control" name="traitementClient" id="SelectTraitement">

                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            Montant :
                            <input class="form-control" type="text" name="montantPresClient" id="prixTrait" />
                        </div>
                        <div class="col-lg-4">
                            Laveur :
                            <select class="form-control" name="laveurClient">
                                <option></option>
                                @foreach($employe as $emp)
                                <option value="{{$emp->idemploye}}">{{$emp->NomEmploye}} {{$emp->PrenomEmploye}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Ajouter
                    </button>
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
                <strong class="card-title">Liste des transactions</strong>
            </div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Immatriculation</th>
                        <th>Traitement</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestations as $prestation)
                    <tr>
                        <td>{{$prestation->idticket}}</td>
                        <td>{{$prestation->dateticket}} {{$prestation->heureticket}}</td>
                        <td>{{$prestation->NomClient}}</td>
                        <td>{{$prestation->ImmatriculeVehicule}}</td>
                        <td>{{$prestation->LabelTraitement}}</td>
                        <td>{{$prestation->MontantTicket}}</td>
                        <td>{{$prestation->statutLabel}}</td>


                        @if($prestation->idstatut==$statutfirst->idstatut)
                        <td><a href="/closeAction/{{$statutlast->idstatut}}/{{$prestation->idticket}}" class="form-control btn btn-success">Terminer</a></td>
                        @else
                        <td></td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
<!-- /Widgets -->

<div></div>
<!--  Traffic  -->


@endsection