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

            <div class="card-header"><strong>Formulaire</strong><small> Vehicule</small></div>
            <div class="card-body">
                <form action="{{('insertTypeVehicule')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-lg-4">
                            Label type vehicule :
                            <input class="form-control" type="text" name="labelTypeVehicule" />
                        </div>
                    </div><br>
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