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

            <div class="card-header"><strong>Formulaire</strong><small> Traitement</small></div>
            <div class="card-body">
                <form action="{{('insertTraitement')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-lg-4">
                            Type vehicule :
                            <select class="form-control" name="typevehicule">
                                @foreach($type_vehicule as $vehicule)
                                <option value="{{$vehicule->idtype_vehicule}}">{{$vehicule->labelTypeVehicule}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            Label traitement :
                            <input class="form-control" type="text" name="labelTraitement" />
                        </div>
                        <div class="col-lg-4">
                            Prix traitement :
                            <input class="form-control" type="text" name="prixTraitement" />
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
                <strong class="card-title">Liste des traitements</strong>
            </div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Label Traitement</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traitement as $dataTrait)
                    <tr>
                        <td>{{$dataTrait->LabelTraitement}}</td>
                        <td>{{$dataTrait->PrixTraitement}}</td>
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