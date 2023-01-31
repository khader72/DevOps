@extends('layouts.appSupervision')
@section('title')
Supervision
@stop

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Charger un fichier</h1>
    </div>

    <!-- Content Row -->
    <div class="card-body bg-white">
        <div class="container my-auto">
            <div class="row">
                <div class="col-sm-5">
                    <input type="file" class="form-control-file" />
                </div>

                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary">
                        Charger 
                        <i class="fas fa-save" ></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br>


    <div class="container-fluid">
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
@stop

