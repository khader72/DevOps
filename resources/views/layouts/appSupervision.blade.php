<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$session = session->get('valueUser');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <meta name="author" content="">

    <title>Supervision</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="sweetalert/dist/sweetalert2.css" rel="stylesheet">

</head>

<body id="page-top">
    @if (session()->has('error'))
    <script>
        swal({
            title: "Oops!",
            text: "{{session()->get('error')}}",
            timer: 3000,
            showConfirmButton: false,
            type: "error"
        });
    </script>
    @endif

    @if (session()->has('succes'))
    <script>
        swal({
            title: "Réussi",
            text: "{{session()->get('succes')}}",
            timer: 3000,
            showConfirmButton: false,
            type: "success"
        });
    </script>
    @endif
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Connaissance <sup>
                        <h8>SUP</h8>
                    </sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            @if(Session::has('Simple') && session('Simple') !=NULL)
            <div class="sidebar-heading">
                Host
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Action:</h6>
                        <a class="collapse-item" href="/host">Host</a>
                        <a class="collapse-item" href="/grouphost">Group host</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            @else
            <!-- Heading -->
            <div class="sidebar-heading">
                Host
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-server"></i>
                    <span></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Action:</h6>
                        <a class="collapse-item" href="/host">Host</a>
                        <a class="collapse-item" href="/grouphost">Group host</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Service
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/service">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Service</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/equipement">
                    <i class="fas fa-fw fa-server"></i>
                    <span>Equipement</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Fichier
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/file">
                    <i class="fas fa-fw fa-file-archive"></i>
                    <span>Charger</span></a>
            </li>


            <div class="sidebar-heading">
                Compte
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Utilisateur</span></a>
            </li>
            @endif
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">...</span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your DK <?php date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deconnexion</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Cliquer sur "Deconnexion" Pour fermer votre session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href=" /login/destroy?session=">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src=" vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="sweetalert/dist/sweetalert2.min.js"></script>
    <script>

    </script>
    <script>
        $(function() {

            //Add data dans in table host
            $('#addhost').click(function() {
                // alert("addhost");
                //field table
                hostname = $('#hostname').val();
                adresse_ip = $('#adresse_ip').val();
                descriptions = $('#descriptions').val();
                equipement = $('#selectequipement').val();
                service = $('#selecteservice').val();
                types = $('#selecttype').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/host',
                    data: {
                        hostname: hostname,
                        adresse_ip: adresse_ip,
                        descriptions: descriptions,
                        equipement: equipement,
                        service: service,
                        types: types,

                    },
                    success: function(result) {

                        // alert(result);
                        switch (result) {
                            case '0':
                                swal({
                                    title: "Réussi",
                                    text: "Informations enregister",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "success"
                                });
                                window.location.reload();
                                break;
                            case '1':
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                                break;
                            case '2':
                                swal({
                                    title: "Oops!",
                                    text: "Prière renseigner le formulaire",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                                break;
                                defaul:
                                    swal({
                                        title: "Oops!",
                                        text: "Information non enregistrer ,veuillez verifier les données saisis",
                                        timer: 3000,
                                        showConfirmButton: false,
                                        type: "error"
                                    });
                                break;
                        }

                    },
                    error: function(e) {
                        console.log(e);
                        alert(e);
                    }
                });
            });




            //Add data dans in table service
            $('#addservice').click(function() {
                // alert("1");
                //field table
                nomservice = $('#nomservice').val();
                emailservice = $('#emailservice').val();
                direction = $('#direction').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/service',
                    data: {
                        nomservice: nomservice,
                        emailservice: emailservice,
                        direction: direction,
                    },
                    success: function(result) {

                        // alert(result);
                        switch (result) {
                            case '0':
                                swal({
                                    title: "Réussi",
                                    text: "Informations enregister",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "success"
                                });
                                window.location.reload();
                                break;
                            case '1':
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                                break;
                            case '2':
                                swal({
                                    title: "Oops!",
                                    text: "Prière renseigner le formulaire",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                                break;
                                defaul:
                                    swal({
                                        title: "Oops!",
                                        text: "Information non enregistrer ,veuillez verifier les données saisis",
                                        timer: 3000,
                                        showConfirmButton: false,
                                        type: "error"
                                    });
                                break;
                        }

                    },
                    error: function(e) {
                        console.log(e);
                        alert(e);
                    }
                });
            });



            /*     //Add data dans in table service
             $('#selectequipement-').change(function () {
             alert("1");
             //field table
             equipement = $('#selectequipement option:selected').val();
             $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });
             $.ajax({
             type: 'GET',
             url: '/getEquipementAll',
             data: {
             equipement: equipement
             },
             success: function (result) {
             alert('ok')
             },
             error: function (e) {
             console.log(e);
             alert(e);
             }
             });
             });
             */

            //Connexion in interface Home
            $('#test').click(function() {
                console.log('ok');
                alert('top');
            });
        });

        //Update data table service

        function updateService(id) {
            //alert(1);
            nomservice = document.getElementById('u_nomservice_' + id).value;
            emailservice = document.getElementById('emailservice_' + id).value;
            direction = document.getElementById('direction_' + id).value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/service',
                data: {
                    id: id,
                    nomservice: nomservice,
                    emailservice: emailservice,
                    direction: direction,

                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations mis à jour",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });
        }


        //DELETE data in table service

        function deleteService(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: '/service',
                data: {
                    id: id
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non supprimer",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }


        //Delete USER
        function deleteUser(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: '/user',
                data: {
                    id: id
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non supprimer",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }

        //Update data dans in table host

        function updatehost(id) {
            // alert(id);
            hostname = document.getElementById('u_hostname_' + id).value;
            // alert(hostname);
            adresse_ip = document.getElementById('u_adresse_ip_' + id).value;
            equipement = document.getElementById('u_selectequipement_' + id).value;
            service = document.getElementById('u_selecteservice_' + id).value;
            description = document.getElementById('u_description_' + id).value;
            type = document.getElementById('u_selectetype_' + id).value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/host',
                data: {
                    id: id,
                    hostname: hostname,
                    adresse_ip: adresse_ip,
                    description: description,
                    equipement: equipement,
                    service: service,
                    type: type

                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations mis à jour",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }

        //DELETE data in table host

        function deleteHost(id) {
            // alert(id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: '/host',
                data: {
                    id: id
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non supprimer",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }


        //Add data equipement

        $('#addequipement').click(function() {
            // alert("1");
            //field table
            equipement = $('#equipement').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/equipement',
                data: {
                    equipement: equipement
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations enregister",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });
        });

        //Add data USER


        $('#adduser').click(function() {
            //alert("1");
            //field table
            nom = $('#nomuser').val();
            prenom = $('#prenomuser').val();
            user = $('#user').val();
            pass = $('#passuser').val();
            privilege = $('#selectprivilege').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/user',
                data: {
                    nom: nom,
                    prenom: prenom,
                    user: user,
                    passuser: pass,
                    privilege: privilege
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations enregister",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });
        });

        //LOGING

        $('#connexion').click(function() {
            alert("1");
            //field table
            nom = $('#user').val();
            pass = $('#password').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/login',
                data: {
                    nom: nom,
                    prenom: prenom,
                    user: user,
                    passuser: pass
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations enregister",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });
        });

        //Update datat table equipement
        function updateEquipement(id) {
            // alert(id);

            equipement = document.getElementById('u_equipement_' + id).value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/equipement',
                data: {
                    id: id,
                    equipement: equipement,

                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations mis à jour",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non enregistrer ,veuillez verifier les données saisis",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non enregistrer ,veuillez verifier les données saisis",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }

        //DELETE data table equipement

        function deleteEquipement(id) {
            alert(id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: '/equipement',
                data: {
                    id: id
                },
                success: function(result) {

                    // alert(result);
                    switch (result) {
                        case '0':
                            swal({
                                title: "Réussi",
                                text: "Informations supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "success"
                            });
                            window.location.reload();
                            break;
                        case '1':
                            swal({
                                title: "Oops!",
                                text: "Information non supprimé",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                        case '2':
                            swal({
                                title: "Oops!",
                                text: "Prière renseigner le formulaire",
                                timer: 3000,
                                showConfirmButton: false,
                                type: "error"
                            });
                            break;
                            defaul:
                                swal({
                                    title: "Oops!",
                                    text: "Information non supprimer",
                                    timer: 3000,
                                    showConfirmButton: false,
                                    type: "error"
                                });
                            break;
                    }

                },
                error: function(e) {
                    console.log(e);
                    alert(e);
                }
            });

        }
    </script>

</body>

</html>