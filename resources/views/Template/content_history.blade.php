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