<?php
include_once('config.php');
$tambah = new tambah();
$tambah->proses();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script>
        // Fungsi untuk memberi value otomatis kepada input gaji pokok
        function nilaiGajiPokok() {
            var jabatan = document.getElementById("462_Jabatan").value;
            var gajiPokokInput = document.getElementById("462_gajipokok");
            
            if (jabatan === "Training") {
                gajiPokokInput.value = 1500000;
            } else if (jabatan === "Operator") {
                gajiPokokInput.value = 2000000;
            } else if (jabatan === "Supervisor") {
                gajiPokokInput.value = 3000000;
            } else {
                gajiPokokInput.value = '';
            }
        }
    </script>
</head>
<body>
  <form action="" method="post">
  <div class="container-fluid p-3 my-5 w-75 rounded border border-warning align-self-center">
  <div>
  <h5 class="mb-2">Tambah Data Baru</h5>
  <hr >
</div>
<div class="row">
<!-- NIK -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_nomorinduk"><h6>Nomor Induk Karyawan :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_nomorinduk" id="" required>
    </div>
    </div>
<!-- Nama Karyawan -->
    <div class="my-3 col-md-6">
    <div class="d-flex flex-column w-75">
    <label for="462_nama"><h6>Nama Karyawan :</h6></label>
    <input type="text" class="form-control p-1 m-1" name="462_nama" id="" required>
    </div>
    </div>

<!-- Jabatan -->
    <div class="my-3 col-md-6 d-flex">
    <div class="d-flex flex-column w-75">
    <label for="462_Jabatan" class="form-label p-1">
        <h6>Jabatan :</h6>
    </label>
    <select  class="form-select p-1 m-1" name="462_Jabatan" id="462_Jabatan" onchange="nilaiGajiPokok()" required>
      <option selected value="">Pilih Jabatan</option>
      <option value="Training">Training</option>
      <option value="Operator">Operator</option>
      <option value="Supervisor">Supervisor</option>
    </select>
    </div>
</div>
<!-- Nomor HP -->
<div class="my-3 col-md-6">
<div class="d-flex flex-column w-75">
    <label for="462_nomorhp"><h6>Nomor HP :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_nomorhp" id="" >
</div>
    </div>
    <!-- Gaji Pokok -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_gajipokok"><h6>Gaji Pokok (Rp.) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_gajipokok" id="462_gajipokok" readonly>
    </div>
    </div>
    <!-- Bonus -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_bonus"><h6>Bonus Prestasi (Rp.) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_bonus" id="">
    </div>
    </div>
    <!-- Alpha -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_absen"><h6>Alpha (hari) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_absen" id="">
    </div>
    </div>
    </div>
    <div class="text-center mt-2 mb-3">
  <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
  <a href="?" class="btn btn-danger px-4 py-2">Batal</a>
  </div>
  </form>
</body>
<script src="./css/bootstrap.bundle.min.js">
    
</script>
</html>