<?php
include_once('config.php'); //menyertakan config.php, tapi jika sudah ada maka diabaikan
$tambah = new tambah(); //membuat objek dari class tambah
$tambah->proses(); //mengeksekusi method proses() dari class tambah
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
  <form action="" method="post">
  <div class="container-fluid p-3 my-5 w-75 rounded border border-warning align-self-center">
  <div>
  <h5 class="mb-2">Tambah Data Baru</h5>
  <hr >
</div>
<div class="row">
<!-- ID Karyawan -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_nomorinduk"><h6>ID Karyawan :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_id" maxlength="3" id="" required>
    </div>
    </div>
<!-- Nama Karyawan -->
    <div class="my-3 col-md-6">
    <div class="d-flex flex-column w-75">
    <label for="462_nama"><h6>Nama Karyawan :</h6></label>
    <input type="text" class="form-control p-1 m-1" name="462_nama" id="" required>
    </div>
    </div>
<!-- Usia Karywan -->
<div class="my-3 col-md-6">
<div class="d-flex flex-column w-75">
    <label for="462_usia"><h6>Usia Karyawan (Tahun):</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_usia" maxlength="2" required>
</div>
    </div>
<!-- Jabatan -->
    <div class="my-3 col-md-6 d-flex">
    <div class="d-flex flex-column w-75">
    <label for="462_jabatan" class="form-label p-1">
        <h6>Jabatan :</h6>
    </label>
    <select  class="form-select p-1 m-1" name="462_jabatan" required>
      <option selected value="">Pilih Jabatan</option>
      <option value="Training">Training</option>
      <option value="Operator">Operator</option>
      <option value="Supervisor">Supervisor</option>
    </select>
    </div>
</div>
    <!-- Alamat Karyawan -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_gajipokok"><h6>Alamat Karyawan :</h6></label>
    <textarea name="462_alamat" class="form-control" id=""></textarea>
    </div>
    </div>
    </div>
    <!-- Submit -->
    <div class="text-center mt-2 mb-3">
  <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
  <a href="?" class="btn btn-danger px-4 py-2">Batal</a>
  </div>
  </form>
</body>
<script src="./css/bootstrap.bundle.min.js">
    
</script>
</html>