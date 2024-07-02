<?php
include ('config.php');
$koneksi = new connection();
$data =$koneksi->show();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Aplikasi Penggajian Karyawan</title>
</head>
<body>
    <div class="container-fluid">
        <!-- Navbar start -->
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid bg-primary">
    <a class="navbar-brand text-white p-3" href="#">
     <h3>Sistem Penggajian Karyawan PT .Eka Maju</h3>
    </a>
  </div>
</nav>
<!-- User profile -->
<div class="container mt-5 d-flex flex-column align-items-center mx-auto">
  <h1 class="mb-3">Selamat Datang!</h1>
<div class="card" style="width: 35rem;">
<div class="d-flex">
  <div class="w-25">
  <img src="./assets/haikal.jpeg" class="card-img-top" alt="...">
  </div>
  <div class="card-body align-items-center align-self-center px-4">
    <h5 class="card-text">Nama : Haikal</h5>
    <h5 class="card-text">NIM : 999999</h5>
    <h5 class="card-text">Jabatan : Human Resource Departement</h5>
  </div>
  </div>
</div>

    </div>
    <!-- Show All Data -->
     <div class="container-fluid p-5 mx-auto">
        <div class="card">
            <div class="card-header p-3">
                <h2 class="fw-bold text-dark">Data Gaji Karyawan Bulan Juli</h2>
            </div>
      <div class="m-2">
     <table class="table table-striped table-bordered">
     <a href="?page=tambah" class="btn py-1 px-3 m-3 btn-success" style="width:10rem;">+ Tambah Data</a>
 <div class="d-flex justify-content-center mx-auto">
       <?php
        $page = new page();
        $page->proses();
        ?>
    </div>
     <thead>
        <td class="fw-bold bg-warning p-2">No.</td>
        <td class="fw-bold bg-warning p-2">NIP</td>
        <td class="fw-bold bg-warning p-2">Nama Pegawai</td>
        <td class="fw-bold bg-warning p-2">Jabatan</td>
        <td class="fw-bold bg-warning p-2">Nomor HP</td>
        <td class="fw-bold bg-warning p-2">Gaji Pokok</td>
        <td class="fw-bold bg-warning p-2">Bonus</td>
        <td class="fw-bold bg-warning p-2">Potongan</td>
        <td class="fw-bold bg-warning p-2">Take Home Pay</td>
        <td class="fw-bold bg-warning p-2"> Edit/ Hapus</td>
    </thead>
    
      <?php
      $nomor = 1;
    foreach ($data as $data){
      echo "<tr>";
      echo "<td class=' p-2'>". $nomor ."</td>";
      echo "<td class=' p-2'>". $data['nomorinduk_karyawan'] ."</td>";
     echo  "<td class=' p-2'>". $data['nama_karyawan'] ."</td>";
     echo " <td class=' p-2'>". $data['jabatan_karyawan'] ."</td>";
     echo  "<td class=' p-2'>". $data ['nomorhp_karyawan'] ."</td>";
      echo "<td class=' p-2'>Rp.". $data['gajipokok_karyawan'] ."</td>";
     echo  "<td class=' p-2'>". $data['bonus_karyawan'] ."</td>";
      echo "<td class=' p-2'>Rp.".$potongan = $data['absen_karyawan'] * 20000 ."</td>";
     echo " <td class=' p-2'>Rp.". (int) $data['gajipokok_karyawan']- (int)$potongan + (int)$data['bonus_karyawan']."</td>";
      echo "<td class=' p-2'> ";
          echo "<a href='?page=edit&nomorinduk=".$data['nomorinduk_karyawan']."'class='btn py-1 px-3 btn-success'>Edit</a>";
         echo  "<a href='?hapus=".$data['nomorinduk_karyawan']."' class='btn py-1 px-2 btn-danger'>Hapus</a>";
      echo "</td>";
      echo "</tr>";
      $nomor++;
    }
      ?>
   
     </table>
     </div>
     </div>
     </div>
    </div>
</body>
<script src="./css/bootstrap.min.js"></script>
</html>