<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["administrator"]) {
    include_once 'beans/Admin.php';
    include_once 'services/AdminService.php';
    $es = new AdminService();
    $em = $es->findById($_SESSION["administrator"]);
        $_SESSION['administrator'] = $em->getId();
        $_SESSION['nom'] = $em->getNom();
        $_SESSION['prenom'] = $em->getPrenom();
        $_SESSION['photo'] = $em->getPhoto();
        $_SESSION['email'] = $em->getEmail();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile Admin</title>

 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">ENSAJ-Ges</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Profile</span></a>
            </li>
            <div class="sidebar-heading">
                Tables
            </div>

            <!-- Nav Item - Etudiants table -->



                
             <!-- Nav Item - Demandes -->
             <li class="nav-item">
                <a class="nav-link" href="Demandes.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Demandes</span></a>
            </li>

            <!-- Nav Item - Table Professeurs -->
            <li class="nav-item">
                <a class="nav-link" href="tableProfesseur.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Professeur</span></a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></span>
                                <img class="img-profile rounded-circle"
                                    src="dossiers/<?php echo $_SESSION['photo']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                    <p class="mb-4"></p>
                            <div class="card shadow mb-4" style="margin: auto 2% auto 2%">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="form-group row" style="margin-bottom: 0%;">
                                            <div class="col-sm-6 mb-3 mb-sm-0" >
                                                <label for="nom" class="donne">Nom : </label>
                                                <input type="text" class="form-control form-control-user" id="nom"
                                                    placeholder="First Name" readonly>
                                                <label for="prenom" class="donne">Prenom : </label>
                                                <input type="text" class="form-control form-control-user" id="prenom"
                                                placeholder="Last Name" readonly>
                                                <label for="role" class="donne">Role : </label>
                                                <input type="text" class="form-control form-control-user" id="role"
                                                    placeholder="Role" readonly>
                                            </div>
                                            <div class="col-sm-6" style="padding-right: 0%; padding-left: auto;">
                                                <img src="dossiers/<?php echo $_SESSION['photo']?>" alt="porfil.pic" style="position: relative; margin-left: 55%;" width="35%" height="auto">
                                                <a href="updateAdministrateur.php?id= <?php echo $_SESSION['administrator']?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="position: relative; margin-left: 68%; margin-top: 3%;">Edit Profile</a>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0%;">
                                            <label for="email" class="donne">Email : </label>
                                            <input type="email" class="form-control form-control-user" id="email"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>


</div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Logout" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .donne{
            margin-top: 2%;
        }
    </style>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    <!-- My scripts -->

    <script>
        document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
            
            element.addEventListener('click', function (e) {

            let nextEl = element.nextElementSibling;
            let parentEl  = element.parentElement;	

                if(nextEl) {
                    e.preventDefault();	
                    let mycollapse = new bootstrap.Collapse(nextEl);
                    
                    if(nextEl.classList.contains('show')){
                    mycollapse.hide();
                    } else {
                        mycollapse.show();
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                        if(opened_submenu){
                        new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); 
        }) 
        }); 
    </script>
    <script>
        document.getElementById('nom').setAttribute('value','<?php echo $_SESSION['nom']?>');
        document.getElementById('prenom').setAttribute('value','<?php echo $_SESSION['prenom']?>');
        document.getElementById('role').setAttribute('value','<?php echo $_SESSION['role']?>');
        document.getElementById('email').setAttribute('value','<?php echo $_SESSION['email']?>');


    </script>

</body>

</html>
<?php } ?>