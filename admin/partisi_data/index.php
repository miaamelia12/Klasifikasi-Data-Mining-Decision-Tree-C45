<?php
  include('../../cekadmin.php');

  include('../../connection.php');  
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aplikasi Klasifikasi Mahasiswa Aktif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../../assets/css/metisMenu.css">
        <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- others css -->
        <link rel="stylesheet" href="../../assets/css/typography.css">
        <link rel="stylesheet" href="../../assets/css/default-css.css">
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h3><b>Administrator</b></h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="../"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                            <li><a href="../data_mahasiswa"><i class="ti-server"></i><span>Data Mahasiswa</span></a></li>
                            <li  class="active"><a href="../partisi_data"><i class="ti-files"></i><span>Partisi Data</span></a></li>
                            <li><a href="../perhitungan"><i class="ti-pencil-alt"></i><span>Perhitungan</span></a></li>
                            <li><a href="../decision_tree"><i class="ti-vector"></i><span>Pohon Keputusan</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Kinerja</span></a>
                                <ul class="collapse">
                                    <li><a href="../perbandingan">Tabel Perbandingan</a></li>
                                    <li><a href="../tabel_penilaian">Tabel Penilaian</a></li>
                                </ul>
                            </li>
                            <li><a href="../hasil_prediksi"><i class="ti-announcement"></i><span>Hasil Prediksi</span></a></li>
                            <li><a href="../../logout.php"></i><span>Log out</span></a></li>                       
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Partisi Data</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <ul class="user-profile pull-right">  
                            <li class="dropdown">
                                <?php
                                    $sesi = $_SESSION['username'];
                                    $query="SELECT nama_lengkap FROM user WHERE username='$sesi'";
                                    $result=mysqli_query($connection,$query);
                                    $row=mysqli_fetch_assoc($result);
                                    $namalengkap=$row['nama_lengkap'];               
                                ?>
                                <div class="user-profile pull-right">
                                    <img class="avatar user-thumb" src="../../assets/images/author/avatar.png" alt="avatar">
                                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $namalengkap; ?></h4>
                                    <!-- <ul class="dropdown-menu">                         
                                        <li>
                                            <a href="../../logout.php">Log Out</a>
                                        </li>
                                    </ul> -->
                                    <!-- <div class="dropdown-menu">
                                        <a class="dropdown-item" href="../../logout.php">Log Out</a>
                                    </div> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
                <!-- Progress Table start -->
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Info!</h4>
                    <p>Data akan dipartisi menjadi data training dan data testing. Data training akan digunakan sebagai data untuk membuat pohon keputusan, sedangkan data testing akan digunakan sebagai data untuk mengukur kinerja pohon keputusan.</p>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Partisi Data</h4>
                            <form action="" method="post">
                                <div class="form-row align-items-center">
                                    <div class="col-md-4 mb-3">
                                        <label for="partisi">Partisi Data Training</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="partisi" name="partisi" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>&nbsp&nbsp&nbsp
                                            <button name="submit" type="submit" class="btn btn-primary">Proses</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                    <?php
                        if(isset($_POST['submit'])) {
                            $partisi = $_POST['partisi'];
                            $uji = (100 - $partisi);
                            
                            $sql_dataset = mysqli_query($connection, "SELECT * FROM data_mahasiswa") or die (mysqli_error($connection));
                                if(mysqli_num_rows($sql_dataset) > 0) { 
                                        $query = mysqli_query($connection, "SELECT COUNT(class) AS dropout, (SELECT COUNT(class) FROM data_mahasiswa WHERE class='AKTIF') AS aktif FROM data_mahasiswa WHERE class='DO'");
                                        $data = mysqli_fetch_array($query);

                                        $getdo = $data['dropout'];
                                        $getaktif = $data['aktif'];
                                        $label = ['DO', 'AKTIF'];
                                            
                                        $latihdo = round(($partisi * $getdo) / 100);
                                        $latihaktif = round(($partisi * $getaktif) / 100);

                                        $ujido = round(($uji * $getdo) / 100);
                                        $ujiaktif = round(($uji * $getaktif) / 100);
                    ?>
                        <div class="card-body">
                                <h4 class="header-title">Hasil Partisi</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">Label Data</th>
                                                <th scope="col">Data Training</th>
                                                <th scope="col">Data Testing</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $label[0]; ?></td>
                                                <td><?php echo $latihdo; ?></td>
                                                <td><?php echo $ujido; ?></td>
                                                <?php
                                                    mysqli_query($connection, "UPDATE data_mahasiswa SET status='DATA TRAINING' WHERE class='DO' ORDER BY nama_mahasiswa LIMIT 38");
                                                    mysqli_query($connection, "UPDATE data_mahasiswa SET status='DATA TRAINING' WHERE class='AKTIF' ORDER BY nama_mahasiswa LIMIT 62");
                                                ?>
                                            </tr>
                                            <tr>
                                                <td><?php echo $label[1]; ?></td>
                                                <td><?php echo $latihaktif; ?></td>
                                                <td><?php echo $ujiaktif; ?></td>
                                                <?php
                                                    mysqli_query($connection, "UPDATE data_mahasiswa SET status='DATA TESTING' WHERE class='DO' ORDER BY nama_mahasiswa DESC LIMIT 16");
                                                    mysqli_query($connection, "UPDATE data_mahasiswa SET status='DATA TESTING' WHERE class='AKTIF' ORDER BY nama_mahasiswa DESC LIMIT 27");
                                                ?>
                                            </tr>
                                            <?php
                                                $cek = mysqli_query($connection,"SELECT * FROM partisi_data") or die (mysqli_error($connection));
                                                if (mysqli_num_rows($cek) > 0){
                                                    mysqli_query($connection, "UPDATE partisi_data SET partisi='$partisi', training_do='$latihdo', testing_do='$ujido', training_aktif='$latihaktif', testing_aktif='$ujiaktif' WHERE id_partisi=1") or die (mysqli_error($connection));
                                                } else {
                                                    mysqli_query($connection, "INSERT INTO partisi_data (partisi, training_do, testing_do, training_aktif, testing_aktif) VALUES ('$partisi', '$latihdo', '$ujido', '$latihaktif', '$ujiaktif')") or die (mysqli_error($connection));
                                                }
                                        } else {
                                            echo "<script>alert('Data Mahasiswa Masih Kosong!'); window.location='index.php';</script>";
                                        }
                                    }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/metisMenu.min.js"></script>
    <script src="../../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>
