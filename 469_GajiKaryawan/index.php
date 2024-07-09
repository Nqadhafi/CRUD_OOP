<?php
    include ('config.php');
  
    $koneksi = new Lib469(); //Membuat objek koneksi (otomatis terbuat koneksi database menggunakan construct method)
    $data =$koneksi->tampilData(); //Mengeksekusi method show dalam class connection, menampilkan semua row yang ada di database
    if (isset($_GET['hapus'])) { //jika parameter $_GET['hapus'] ada, 
            $koneksi->hapusData();   //kemudian akan mengeksekusi method proses pada class hapus
    }
    
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
        <a class="navbar-brand text-white p-3" href="../">
        <h3>Home</h3>
        </a>
    </div>
    </nav>
    <!-- User profile -->
    <div class="container mt-5 d-flex flex-column align-items-center mx-auto">
    <h1 class="mb-3">Selamat Datang!</h1>
    <div class="card" style="width: 35rem;">
    <div class="d-flex">
    <div class="w-25">
    <img src="./assets/jonathan.jpeg" class="card-img-top" alt="...">
    </div>
    <div class="card-body align-items-center align-self-center px-4">
        <h5 class="card-text">Nama : Jonathan</h5>
        <h5 class="card-text">NIM : 469</h5>
        <h5 class="card-text">Jabatan : Payroll Division - Basic Sallary</h5>
    </div>
    </div>
    </div>

        </div>
        <!-- Show All Data -->
        <div class="container-fluid p-5 mx-auto">
            <div class="card">
                <div class="card-header p-3">
                    <h2 class="fw-bold text-dark">Data Gaji Kotor Karyawan PT.Eka Maju</h2>
                </div>
        <div class="m-2">
        <table class="table table-striped table-bordered">
        <a href="?page=tambah" class="btn py-1 px-3 m-3 btn-success" style="width:10rem;">+ Tambah Data</a>
        
    <div class="d-flex flex-column justify-content-center mx-auto">
    
        <?php

        //memanggil class page untuk meng-include halaman sesuai parameter dari url $_GET['page']
           
            $koneksi->pageShow();

            
            if (isset($_GET['469_cari'])) { //Jika url ada $_GET['469_cari'], maka akan mengeksekusi kode di bawah
               
                //mengeksekusi method cari() pada class page, dengan value parameter yang ditangkap berasal dari value $_GET['469_cari'] dan disimpan ke variabel $data
                $data = $koneksi->cariData($_GET['469_cari']);
            }
            ?>
        </div>
        <div class ="my-3 d-flex justify-content-center">
            <!-- Form cari data, method get -->
            <form method="get">
                <input type="text" class="form-control w-25 p-2" name="469_cari" id="" placeholder="Cari berdasar ID_Gaji">
                <button class="btn btn-primary p-2 ms-3">Cari Data</button>
            </form>
        </div>
        <thead>
            <td class="fw-bold bg-warning p-2">No.</td>
            <td class="fw-bold bg-warning p-2">ID Gaji</td>
            <td class="fw-bold bg-warning p-2">Gaji Pokok</td>
            <td class="fw-bold bg-warning p-2">Lembur</td>
            <td class="fw-bold bg-warning p-2">Tunjangan</td>
            <td class="fw-bold bg-warning p-2">Bonus</td>
            <td class="fw-bold bg-warning p-2">Total Gaji Kotor</td>
            <td class="fw-bold bg-warning p-2"> Edit/ Hapus</td>
        </thead>

        <!-- Menampilkan data yang diambil dari database, berdasarkan query yang sudah ditentukan -->
        <?php
$nomor = 1;
foreach ($data as $data) { //menampilkan setiap value dari $data yang isinya adalah data yang diambil dari database berdasarkan query yang dijalankan
    echo "<tr>";
    echo "<td class='p-2'>" . $nomor . "</td>";
    echo "<td class='p-2'>" . $data['id_gaji'] . "</td>";
    echo "<td class='p-2'>" . $data['pokok_gaji'] . "</td>";
    echo "<td class='p-2'>" . $data['lembur_gaji'] . "</td>";
    echo "<td class='p-2'>" . $data['tunjangan_gaji'] . "</td>";
    echo "<td class='p-2'>Rp." . $data['bonus_gaji'] . "</td>";
    echo "<td class='p-2'>Rp." . $potongan = $data['pokok_gaji'] + $data['lembur_gaji'] + $data['tunjangan_gaji'] + $data['bonus_gaji']. "</td>";
    echo "<td class='p-2'> ";
    echo "<a href='?page=edit&idgaji=" . $data['id_gaji'] . "' class='btn py-1 px-3 btn-success'>Edit</a> ";
    echo "<a href='?hapus=" . $data['id_gaji'] . "' onclick=\"return confirm('Apakah Anda Yakin Menghapus Data Ini?');\" class='btn py-1 px-2 btn-danger'>Hapus</a>"; // validasi/ konfirmasi sebelum mengeksekusi button hapuss
    echo "</td>";
    echo "</tr>";
    $nomor++; //setiap row yang dibuat, maka value $nomor juga akan bertambah
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