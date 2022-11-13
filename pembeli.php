<?php

require 'ceklogin.php';

//menghitung jumlah pembeli
$h1 = mysqli_query($c,"select * from pembeli");
$h2 = mysqli_num_rows($h1); //untuk jumlah pembeli

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>pembeli</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">data pembeli</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Pilihan</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-truck"></i></div>
                                order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></div>
                                stock barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Barang masuk
                            </a>
                            <a class="nav-link" href="pembeli.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Kelola pembeli
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Minimarket
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">data pembeli</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">selamat datang</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">jumlah pembeli: <?=$h2;?> </div>
                                </div>
                            </div>
                        </div>

                          <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#myModal">
                                tambah pembeli baru
                            </button>
                            
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                pembeli
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple"> 
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Pembeli</th>
                                            <th>no telepon</th>
                                            <th>alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $get = mysqli_query($c,"select * from pembeli");
                                        $i = 1;

                                        while($p=mysqli_fetch_array($get)){
                                            $namapembeli = $p['namapembeli'];
                                            $nomortelepon = $p['nomortelepon'];
                                            $alamat = $p['alamat'];
                                            $idpl = $p['idpembeli'];
                                        ?>
                                          
                                            <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namapembeli;?></td>
                                            <td><?=$nomortelepon;?></td>
                                            <td><?=$alamat;?></td>
                                            <td> 
                                            <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#edit<?=$idpl;?>">
                                                edit
                                            </button> 
                                             <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete<?=$idpl;?>">
                                                delete
                                            </button></td>
                                            </tr>


                                               <!-- The Modal edit -->
                                               <div class="modal fade" id="edit<?=$idpl;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">edit <?=$namapembeli;?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                <input type="text" name="namapembeli" class="form-control" placeholder="nama pembeli" value="<?=$namapembeli;?>" >
                                                <input type="text" name="nomortelepon" class="form-control mt-2" placeholder="no telepon" value="<?=$nomortelepon;?>">
                                                <input type="text" name="alamat" class="form-control mt-2" placeholder="alamat" value="<?=$alamat;?>">
                                                <input type="hidden" name="idpl" value="<?=$idpl;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editpembeli">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                        </from>
                                        </div>
                                    </div>
                                </div>


                                                <!-- The Modal delete -->
                                        <div class="modal fade" id="delete<?=$idpl;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus <?=$namapembeli;?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">
    
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                Apakah anda yakin untuk menghapus ini?
                                                <input type="hidden" name="idpl" value="<?=$idpl;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapuspembeli">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
    
                                                </form>

                                               </div>
                                            </div>
                                        </div>




                                        <?php
                                        };
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

      <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">tambah data pembeli</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="namapembeli" class="form-control" placeholder="nama pembeli">
          <input type="text" name="nomortelepon" class="form-control mt-2" placeholder="no telepon">
          <input type="text" name="alamat" class="form-control mt-2" placeholder="alamat">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahpembeli">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>


</html>
