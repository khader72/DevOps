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

            <div class="card-header"><strong>Paie</strong><small> Des Laveurs</small></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        Laveur :
                        <select class="form-control" name="laveurClient" id="idselectEmploye">
                            <option></option>
                            @foreach($employe as $emp)
                            <option value="{{$emp->idemploye}}">{{$emp->NomEmploye}} {{$emp->PrenomEmploye}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        Montant
                        <input class="form-control" type="text" name="" id="montant" />
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Liste des Type de vehicules</strong>
            </div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Label Traitement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type_vehicule as $vehicule)
                    <tr>
                        <td>{{$vehicule->labelTypeVehicule}}</td>
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