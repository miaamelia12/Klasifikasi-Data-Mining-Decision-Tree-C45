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
        <!-- <link rel="stylesheet" href="../../assets/dataTables/datatables.css"> -->
        <!-- modernizr css -->
        <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <script src="../../assets/js/metisMenu.min.js"></script>
        <script src="../../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../../assets/js/jquery.slicknav.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

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
                    <?php
                        $sesi = $_SESSION['username'];
                        $query="SELECT level FROM user WHERE username='$sesi'";
                        $result=mysqli_query($connection,$query);
                        $row=mysqli_fetch_assoc($result);
                        $level=$row['level'];               
                    ?>
                    <div class="logo">
                        <h3><b><?php echo $level; ?></b></h3>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>
                            <ul class="metismenu" id="menu">
                                <li><a href="../"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                                <li><a href="../data_mahasiswa"><i class="ti-server"></i><span>Data Mahasiswa</span></a></li>
                                <li><a href="../partisi_data"><i class="ti-files"></i><span>Partisi Data</span></a></li>
                                <li class="active"><a href="../perhitungan"><i class="ti-pencil-alt"></i><span>Perhitungan</span></a></li>
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
                                <h4 class="page-title pull-left">Perhitungan C4.5</h4>
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
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">           
                                <form action="" method="post">
                                    <table id="datatables" class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Atribut</th>
                                                <th scope="col">Nilai Atribut</th>
                                                <th scope="col">Jumlah Kasus Total</th>
                                                <th scope="col">Jumlah Kasus DO</th>
                                                <th scope="col">Jumlah Kasus Aktif</th>
                                                <th scope="col">Entropy</th>
                                                <th scope="col">Gain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $sql_dataset = mysqli_query($connection, "SELECT * FROM data_mahasiswa") or die (mysqli_error($connection));
                                                if(mysqli_num_rows($sql_dataset) > 0) {                                              

                                                //Seleksi Database Table Partisi Data                           
                                                $part = mysqli_query($connection,"SELECT * FROM partisi_data");
                                                    $q = mysqli_fetch_array($part);
                                                    $get_partisi        = $q['partisi'];
                                                    $get_trainingdo     = $q['training_do'];
                                                    $get_testingdo      = $q['testing_do'];
                                                    $get_trainingaktif  = $q['training_aktif'];
                                                    $get_testingaktif   = $q['testing_aktif'];
                                                
                                                //Seleksi Database Table Data Mahasiswa
                                                $dataset = mysqli_query($connection,"SELECT COUNT(class) AS total FROM data_mahasiswa");
                                                    $a = mysqli_fetch_array($dataset);
                                                    $get_total = $a['total'];
                                                
                                                $sangatbaik = mysqli_query($connection,"SELECT COUNT(kompensasi) AS sangatbaik, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND kompensasi <= 674) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND kompensasi <= 674) AS aktif FROM data_mahasiswa WHERE kompensasi <= 674");
                                                    $o = mysqli_fetch_array($sangatbaik);
                                                    $getsangatbaik              = $o['sangatbaik'];
                                                    $getJumlahDOsangatbaik      = $o['drpot'];
                                                    $getJumlahAktifsangatbaik   = $o['aktif'];

                                                $baik = mysqli_query($connection,"SELECT COUNT(kompensasi) AS baik, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND kompensasi BETWEEN 675 AND 1710) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND kompensasi BETWEEN 675 AND 1710) AS aktif FROM data_mahasiswa WHERE kompensasi BETWEEN 675 AND 1710");
                                                    $p = mysqli_fetch_array($baik);
                                                    $getbaik            = $p['baik'];
                                                    $getJumlahDObaik    = $p['drpot'];
                                                    $getJumlahAktifbaik = $p['aktif'];

                                                $tidakbaik = mysqli_query($connection,"SELECT COUNT(kompensasi) AS tidakbaik, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND kompensasi >=1710) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND kompensasi >=1710) AS aktif FROM data_mahasiswa WHERE kompensasi >=1710");
                                                    $s = mysqli_fetch_array($tidakbaik);
                                                    $gettidakbaik               = $s['tidakbaik'];
                                                    $getJumlahDOtidakbaik       = $s['drpot'];
                                                    $getJumlahAktiftidakbaik    = $s['aktif'];

                                                $sangatmemuaskan = mysqli_query($connection,"SELECT COUNT(nilai_ipk) AS sangatmemuaskan, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND nilai_ipk >=3.00) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND nilai_ipk >=3.00) AS aktif FROM data_mahasiswa WHERE nilai_ipk >=3.00");
                                                    $n = mysqli_fetch_array($sangatmemuaskan);
                                                    $getsangatmemuaskan             = $n['sangatmemuaskan'];
                                                    $getJumlahDOsangatmemuaskan     = $n['drpot'];
                                                    $getJumlahAktifsangatmemuaskan  = $n['aktif'];

                                                $memuaskan = mysqli_query($connection,"SELECT COUNT(nilai_ipk) AS memuaskan, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND nilai_ipk BETWEEN 2.00 AND 2.99) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND nilai_ipk BETWEEN 2.00 AND 2.99) AS aktif FROM data_mahasiswa WHERE nilai_ipk BETWEEN 2.00 AND 2.99");
                                                    $m = mysqli_fetch_array($memuaskan);
                                                    $getmemuaskan               = $m['memuaskan'];
                                                    $getJumlahDOmemuaskan       = $m['drpot'];
                                                    $getJumlahAktifmemuaskan    = $m['aktif'];

                                                $kurangmemuaskan = mysqli_query($connection,"SELECT COUNT(nilai_ipk) AS kurangmemuaskan, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'DO' AND nilai_ipk <= 1.99) as drpot, (SELECT COUNT(class) FROM data_mahasiswa WHERE class = 'Aktif' AND nilai_ipk <= 1.99) AS aktif FROM data_mahasiswa WHERE nilai_ipk <= 1.99");
                                                    $l = mysqli_fetch_array($kurangmemuaskan);
                                                    $getkurangmemuaskan             = $l['kurangmemuaskan'];
                                                    $getJumlahDOkurangmemuaskan     = $l['drpot'];
                                                    $getJumlahAktifkurangmemuaskan  = $l['aktif'];
                                                
                                                //Seleksi Database Table Atribut dan Nilai Atribut
                                                $sqlatribut = mysqli_query($connection,"SELECT id_data_atribut, atribut,nilai, id_atribut FROM nilai_atribut INNER JOIN atribut ON id_atribut2=id_atribut ORDER BY id_data_atribut DESC");
                                                    while ($atr = mysqli_fetch_array($sqlatribut)) {
                                                        $getAtribut         = $atr['atribut'];
                                                        $getAtributid       = $atr['id_data_atribut'];
                                                        $getAtributnilai    = $atr['nilai'];
                                                        $getid              = $atr['id_atribut'];

                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no++; ?>
                                                        <input type="hidden" name="id_data_atribut" id="id_data_atribut" value="<?php echo $getAtributid; ?>">
                                                    </td>
                                                    <td><?=$getAtribut?></td>
                                                    <td><?=$getAtributnilai?></td>
                                                    <td>
                                                        <?php
                                                            if ($getAtribut == 'Total') {
                                                                /*Total Kasus*/
                                                                $kasus_total = floor(($get_partisi * $get_total) / 100);
                                                                echo $kasus_total;                                

                                                            } elseif ($getAtributnilai == 'Sangat Baik') {
                                                                $kasus_do_sangatbaik = floor(($get_partisi * $getJumlahDOsangatbaik) / 100);
                                                                $kasus_aktif_sangatbaik = floor(($get_partisi * $getJumlahAktifsangatbaik) / 100);

                                                                $kasus_total_sangatbaik = ($kasus_do_sangatbaik + $kasus_aktif_sangatbaik);
                                                                echo $kasus_total_sangatbaik;

                                                            } 
                                                             elseif ($getAtributnilai == 'Baik') {
                                                                $kasus_do_baik = floor(($get_partisi * $getJumlahDObaik) / 100);
                                                                $kasus_aktif_baik = floor(($get_partisi * $getJumlahAktifbaik) / 100);

                                                                $kasus_total_baik = ($kasus_do_baik + $kasus_aktif_baik);
                                                                echo $kasus_total_baik;

                                                            } elseif ($getAtributnilai == 'Tidak Baik') {
                                                                $kasus_do_tidakbaik = floor(($get_partisi * $getJumlahDOtidakbaik) / 100);
                                                                $kasus_aktif_tidakbaik = floor(($get_partisi * $getJumlahAktiftidakbaik) / 100);

                                                                $kasus_total_tidakbaik = ($kasus_do_tidakbaik + $kasus_aktif_tidakbaik);
                                                                echo $kasus_total_tidakbaik;

                                                            } elseif ($getAtributnilai == 'Sangat Memuaskan') {
                                                                $kasus_do_sangatmemuaskan = floor(($get_partisi * $getJumlahDOsangatmemuaskan) / 100);
                                                                $kasus_aktif_sangatmemuaskan = floor(($get_partisi * $getJumlahAktifsangatmemuaskan) / 100);

                                                                $kasus_total_sangatmemuaskan = ($kasus_do_sangatmemuaskan + $kasus_aktif_sangatmemuaskan);
                                                                echo $kasus_total_sangatmemuaskan;

                                                            } elseif ($getAtributnilai == 'Memuaskan') {
                                                                $kasus_do_memuaskan = floor(($get_partisi * $getJumlahDOmemuaskan) / 100);
                                                                $kasus_aktif_memuaskan = floor(($get_partisi * $getJumlahAktifmemuaskan) / 100);

                                                                $kasus_total_memuaskan = ($kasus_do_memuaskan + $kasus_aktif_memuaskan);
                                                                echo $kasus_total_memuaskan;

                                                            } elseif ($getAtributnilai == 'Kurang Memuaskan') {
                                                                $kasus_do_kurangmemuaskan = floor(($get_partisi * $getJumlahDOkurangmemuaskan) / 100);
                                                                $kasus_aktif_kurangmemuaskan = floor(($get_partisi * $getJumlahAktifkurangmemuaskan) / 100);

                                                                $kasus_total_kurangmemuaskan = ($kasus_do_kurangmemuaskan + $kasus_aktif_kurangmemuaskan);
                                                                echo $kasus_total_kurangmemuaskan;

                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($getAtribut == 'Total') {
                                                                /*Jumlah Kasus DO*/
                                                                echo $get_trainingdo;

                                                            } elseif ($getAtributnilai == 'Sangat Baik') {
                                                                $kasus_do_sangatbaik = floor(($get_partisi * $getJumlahDOsangatbaik) / 100);
                                                                echo $kasus_do_sangatbaik;

                                                            } elseif ($getAtributnilai == 'Baik') {
                                                                $kasus_do_baik = floor(($get_partisi * $getJumlahDObaik) / 100);
                                                                echo $kasus_do_baik;

                                                            } elseif ($getAtributnilai == 'Tidak Baik') {
                                                                $kasus_do_tidakbaik = floor(($get_partisi * $getJumlahDOtidakbaik) / 100);
                                                                echo $kasus_do_tidakbaik;

                                                            } elseif ($getAtributnilai == 'Sangat Memuaskan') {
                                                                $kasus_do_sangatmemuaskan = floor(($get_partisi * $getJumlahDOsangatmemuaskan) / 100);
                                                                echo $kasus_do_sangatmemuaskan;

                                                            } elseif ($getAtributnilai == 'Memuaskan') {
                                                                $kasus_do_memuaskan = floor(($get_partisi * $getJumlahDOmemuaskan) / 100);
                                                                echo $kasus_do_memuaskan;

                                                            } elseif ($getAtributnilai == 'Kurang Memuaskan') {
                                                                $kasus_do_kurangmemuaskan = floor(($get_partisi * $getJumlahDOkurangmemuaskan) / 100);
                                                                echo $kasus_do_kurangmemuaskan;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($getAtribut == 'Total') {
                                                                /*Jumlah Kasus AKTIF*/
                                                                echo $get_trainingaktif;
                                                                
                                                            } elseif ($getAtributnilai == 'Sangat Baik') {
                                                                $kasus_aktif_sangatbaik = floor(($get_partisi * $getJumlahAktifsangatbaik) / 100);
                                                                echo $kasus_aktif_sangatbaik;

                                                            } elseif ($getAtributnilai == 'Baik') {
                                                                $kasus_aktif_baik = floor(($get_partisi * $getJumlahAktifbaik) / 100);
                                                                echo $kasus_aktif_baik;

                                                            } elseif ($getAtributnilai == 'Tidak Baik') {
                                                                $kasus_aktif_tidakbaik = floor(($get_partisi * $getJumlahAktiftidakbaik) / 100);
                                                                echo $kasus_aktif_tidakbaik;

                                                            } elseif ($getAtributnilai == 'Sangat Memuaskan') {
                                                                $kasus_aktif_sangatmemuaskan = floor(($get_partisi * $getJumlahAktifsangatmemuaskan) / 100);
                                                                echo $kasus_aktif_sangatmemuaskan;

                                                            } elseif ($getAtributnilai == 'Memuaskan') {
                                                                $kasus_aktif_memuaskan = floor(($get_partisi * $getJumlahAktifmemuaskan) / 100);
                                                                echo $kasus_aktif_memuaskan;

                                                            } elseif ($getAtributnilai == 'Kurang Memuaskan') {
                                                                $kasus_aktif_kurangmemuaskan = floor(($get_partisi * $getJumlahAktifkurangmemuaskan) / 100);
                                                                echo $kasus_aktif_kurangmemuaskan;
                                                            }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        //ENTROPY
                                                            if ($getAtribut == 'Total') {
                                                                if ($kasus_total == 0 OR $get_trainingaktif == 0 OR $get_trainingdo == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($get_trainingaktif == $get_trainingdo) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $get_trainingaktif / $kasus_total;
                                                                    $perbandingando = $get_trainingdo / $kasus_total;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total', jml_kasus_do='$get_trainingdo', jml_kasus_aktif='$get_trainingaktif', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total', '$get_trainingdo', '$get_trainingaktif', '$getEntropy', '')"); 
                                                                }
                                                                
                                                            } elseif ($getAtributnilai == 'Sangat Baik') {
                                                                if ($kasus_total_sangatbaik == 0 OR $kasus_aktif_sangatbaik == 0 OR $kasus_do_sangatbaik == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_sangatbaik == $kasus_do_sangatbaik) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_sangatbaik / $kasus_total_sangatbaik;
                                                                    $perbandingando = $kasus_aktif_sangatbaik / $kasus_total_sangatbaik;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_sangatbaik', jml_kasus_do='$kasus_do_sangatbaik', jml_kasus_aktif='$kasus_aktif_sangatbaik', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_sangatbaik', '$kasus_do_sangatbaik', '$kasus_aktif_sangatbaik', '$getEntropy', '')"); 
                                                                }

                                                            } elseif ($getAtributnilai == 'Baik') {
                                                                if ($kasus_total_baik == 0 OR $kasus_aktif_baik == 0 OR $kasus_do_baik == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_baik == $kasus_do_baik) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_baik / $kasus_total_baik;
                                                                    $perbandingando = $get_trainingdo / $kasus_total_baik;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_baik', jml_kasus_do='$kasus_do_baik', jml_kasus_aktif='$kasus_aktif_baik', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_baik', '$kasus_do_baik', '$kasus_aktif_baik', '$getEntropy', '')"); 
                                                                }

                                                            } elseif ($getAtributnilai == 'Tidak Baik') {
                                                                if ($kasus_total_tidakbaik == 0 OR $kasus_aktif_tidakbaik == 0 OR $kasus_do_tidakbaik == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_tidakbaik == $kasus_do_tidakbaik) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml ka4sus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_tidakbaik / $kasus_total_tidakbaik;
                                                                    $perbandingando = $kasus_do_tidakbaik / $kasus_total_tidakbaik;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_tidakbaik', jml_kasus_do='$kasus_do_tidakbaik', jml_kasus_aktif='$kasus_aktif_tidakbaik', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_tidakbaik', '$kasus_do_tidakbaik', '$kasus_aktif_tidakbaik', '$getEntropy', '')"); 
                                                                }

                                                            } elseif ($getAtributnilai == 'Sangat Memuaskan') {
                                                                if ($kasus_total_sangatmemuaskan == 0 OR $kasus_aktif_sangatmemuaskan == 0 OR $kasus_do_sangatmemuaskan == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_sangatmemuaskan == $kasus_do_sangatmemuaskan) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_sangatmemuaskan / $kasus_total_sangatmemuaskan;
                                                                    $perbandingando = $kasus_do_sangatmemuaskan / $kasus_total_sangatmemuaskan;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_sangatmemuaskan', jml_kasus_do='$kasus_do_sangatmemuaskan', jml_kasus_aktif='$kasus_aktif_sangatmemuaskan', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_sangatmemuaskan', '$kasus_do_sangatmemuaskan', '$kasus_aktif_sangatmemuaskan', '$getEntropy', '')"); 
                                                                }

                                                            } elseif ($getAtributnilai == 'Memuaskan') {
                                                                if ($kasus_total_memuaskan == 0 OR $kasus_aktif_memuaskan == 0 OR $kasus_do_memuaskan == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_memuaskan == $kasus_do_memuaskan) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_memuaskan / $kasus_total_memuaskan;
                                                                    $perbandingando = $kasus_do_memuaskan / $kasus_total_memuaskan;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_memuaskan', jml_kasus_do='$kasus_do_memuaskan', jml_kasus_aktif='$kasus_aktif_memuaskan', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_memuaskan', '$kasus_do_memuaskan', '$kasus_aktif_memuaskan', '$getEntropy', '')"); 
                                                                }

                                                            } elseif ($getAtributnilai == 'Kurang Memuaskan') {
                                                                if ($kasus_total_kurangmemuaskan == 0 OR $kasus_aktif_kurangmemuaskan == 0 OR $kasus_do_kurangmemuaskan == 0) {
                                                                    $getEntropy = 0;
                                                                    echo $getEntropy;
                                                                    // jika jml kasus Tepat Waktu = jml kasus Tidak Tepat Waktu, maka entropy = 1
                                                                } else if ($kasus_aktif_kurangmemuaskan == $kasus_do_kurangmemuaskan) {
                                                                    $getEntropy = 1;
                                                                    echo $getEntropy; 
                                                                } else { // jika jml kasus != 0, maka hitung rumus entropy:
                                                                    $perbandingan_aktif = $kasus_aktif_kurangmemuaskan / $kasus_total_kurangmemuaskan;
                                                                    $perbandingando = $kasus_do_kurangmemuaskan / $kasus_total_kurangmemuaskan;
                                                                    $rumusEntropy = (-($perbandingando) * log($perbandingando,2)) + (-($perbandingan_aktif) * log($perbandingan_aktif,2));
                                                                    $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                                                                    echo $getEntropy;
                                                                }

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET jml_kasus_total='$kasus_total_kurangmemuaskan', jml_kasus_do='$kasus_do_kurangmemuaskan', jml_kasus_aktif='$kasus_aktif_kurangmemuaskan', entropy='$getEntropy', info_gain='' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (id_mining, id_data_atribut2, jml_kasus_total, jml_kasus_do, jml_kasus_aktif, entropy, info_gain) VALUES ('', '$getAtributid', '$kasus_total_kurangmemuaskan', '$kasus_do_kurangmemuaskan', '$kasus_aktif_kurangmemuaskan', '$getEntropy', '')"); 
                                                                }

                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        /*hitung Gain*/
                                                        $mining = mysqli_query($connection,"SELECT entropy AS entropy_total, (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=28) AS entropy_sangatbaik, 
                                                            (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=27) AS entropy_baik, (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=26) AS entropy_tidakbaik, 
                                                            (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=25) AS entropy_sangatmemuaskan, (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=24) AS entropy_memuaskan, 
                                                            (SELECT entropy FROM mining_c45 WHERE id_data_atribut2=23) AS entropy_kurangmemuaskan FROM mining_c45 WHERE id_data_atribut2=29");
                                                            $get_mining = mysqli_fetch_array($mining);
                                                            $get_entropy_total              = $get_mining['entropy_total'];
                                                            $get_entropy_sangatbaik         = $get_mining['entropy_sangatbaik'];
                                                            $get_entropy_baik               = $get_mining['entropy_baik'];
                                                            $get_entropy_tidakbaik          = $get_mining['entropy_tidakbaik'];
                                                            $get_entropy_sangatmemuaskan    = $get_mining['entropy_sangatmemuaskan'];
                                                            $get_entropy_memuaskan          = $get_mining['entropy_memuaskan'];
                                                            $get_entropy_kurangmemuaskan    = $get_mining['entropy_kurangmemuaskan'];

                                                        $mining_total = mysqli_query($connection,"SELECT jml_kasus_total AS kasus_total, (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=28) AS total_sangatbaik, 
                                                            (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=27) AS total_baik, (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=26) AS total_tidakbaik, 
                                                            (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=25) AS total_sangatmemuaskan, (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=24) AS total_memuaskan, 
                                                            (SELECT jml_kasus_total FROM mining_c45 WHERE id_data_atribut2=23) AS total_kurangmemuaskan FROM mining_c45 WHERE id_data_atribut2=29");
                                                            $get_mining2 = mysqli_fetch_array($mining_total);
                                                            $get_kasus_total             = $get_mining2['kasus_total'];
                                                            $get_kasus_sangatbaik         = $get_mining2['total_sangatbaik'];
                                                            $get_kasus_baik               = $get_mining2['total_baik'];
                                                            $get_kasus_tidakbaik          = $get_mining2['total_tidakbaik'];
                                                            $get_kasus_sangatmemuaskan    = $get_mining2['total_sangatmemuaskan'];
                                                            $get_kasus_memuaskan          = $get_mining2['total_memuaskan'];
                                                            $get_kasus_kurangmemuaskan    = $get_mining2['total_kurangmemuaskan'];
                                                            
                                                            if ($getAtribut == 'Total') {
                                                                //
                                                            } elseif ($getAtribut == 'Kompensasi') {
                                                                $nilai_sangatbaik   = (($get_kasus_sangatbaik / $get_kasus_total) * $get_entropy_sangatbaik);
                                                                $nilai_baik         = (($get_kasus_baik / $get_kasus_total) * $get_entropy_baik);
                                                                $nilai_tidakbaik    = (($get_kasus_tidakbaik / $get_kasus_total) * $get_entropy_tidakbaik);

                                                                $hitung_gain_kompensasi = round($get_entropy_total - ($nilai_sangatbaik) - ($nilai_baik) - ($nilai_tidakbaik), 4);
                                                                echo $hitung_gain_kompensasi;
                                                                
                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET info_gain='$hitung_gain_kompensasi' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (info_gain) VALUES ('$hitung_gain_kompensasi')"); 
                                                                }

                                                            } elseif ($getAtribut == 'IPK') {
                                                                $nilai_sangatmemuaskan  = (($get_kasus_sangatmemuaskan / $kasus_total) * $get_entropy_sangatmemuaskan);
                                                                $nilai_memuaskan        = (($get_kasus_memuaskan / $kasus_total) * $get_entropy_memuaskan);
                                                                $nilai_kurangmemuaskan  = (($get_kasus_kurangmemuaskan / $kasus_total) * $get_entropy_kurangmemuaskan);

                                                                $hitung_gain_ipk = round($get_entropy_total - ($nilai_sangatmemuaskan) - ($nilai_memuaskan) - ($nilai_kurangmemuaskan), 4);
                                                                echo $hitung_gain_ipk;

                                                                $cek = mysqli_query($connection,"SELECT * FROM mining_c45 WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                if (mysqli_num_rows($cek) > 0) {
                                                                    mysqli_query($connection, "UPDATE mining_c45 SET info_gain='$hitung_gain_ipk' WHERE id_data_atribut2='$getAtributid'") or die (mysqli_error($connection));
                                                                } else {
                                                                    mysqli_query($connection,"INSERT INTO mining_c45 (info_gain) VALUES ('$hitung_gain_ipk')"); 
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            } else {
                                                echo "<tr><td colspan=\"9\" align=\"center\">Data Mahasiswa Masih Kosong</td></tr>";
                                             }
                                            ?>                             
                                        </tbody>
                                    </table>
                                </form>
                                </div>
                                <div class="table-responsive">
                                    <br><br>
                                    <h8> Keterangan : </h5><b5>
                            
                                <li>Sangat Baik = Kompensasi < 675 Menit </li>
                                <li>Baik = Kompensasi 675 - 1710 Menit</li>
                                <li>Tidak Baik = Kompensasi >= 1710 Menit</li><br>

                                <li>Kurang Memuaskan = IPK : 1.00 - 1.99 </li>
                                <li>Memuaskan = IPK : 2.00 - 2.99</li>
                                <li>Sangat Memuaskan = IPK : 3.00 - 4.00</li>
                            
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
        <!-- <script src="../../assets/dataTables/datatables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatables').DataTable();
            });
        </script> -->
    </body>

</html>
