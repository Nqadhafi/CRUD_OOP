<?php
include_once('config.php'); //menyertakan config.php, tapi jika sudah ada maka diabaikan
$edit = new Lib462(); //membuat objek dari class edit
$edit->editData(); //mengeksekusi method proses() dari class edit
$tampil = $edit->ambilData(); //mengeksekusi method getData() dari ckass edit untuk menampilkan data dari database yang akan kita update di bawah, disimpan ke variabel $tampil dengan isinya berupa array

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
  <h5 class="mb-2">Edit Data Karyawan</h5>
  <hr >
</div>
<div class="row">
<!-- ID Karyawan -->
<div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_nomorinduk"><h6>ID Karyawan :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_id" id="" value="<?php echo $tampil[0]['id_karyawan'] ?>" readonly>
    </div>
    </div>
<!-- Nama Karyawan -->
    <div class="my-3 col-md-6">
    <div class="d-flex flex-column w-75">
    <label for="462_nama"><h6>Nama Karyawan :</h6></label>
    <input type="text" class="form-control p-1 m-1" name="462_nama" id="" value="<?php echo $tampil[0]['nama_karyawan'] ?>" required>
    </div>
    </div>
<!-- Usia Karywan -->
<div class="my-3 col-md-6">
<div class="d-flex flex-column w-75">
    <label for="462_usia"><h6>Usia Karyawan:</h6></label>
    <input type="number" class="form-control p-1 m-1" name="462_usia" maxlength="2" value="<?php echo $tampil[0]['usia_karyawan'] ?>" required>
</div>
    </div>
<!-- Jabatan -->
<div class="my-3 col-md-6 d-flex">
    <div class="d-flex flex-column w-75">
    <label for="462_Jabatan" class="form-label p-1">
        <h6>Jabatan :</h6>
    </label>
    <select  class="form-select p-1 m-1" name="462_jabatan">
      <option value="Training" <?php echo ($tampil[0]['jabatan_karyawan'] == 'Training') ? 'selected' : ''; ?>>Training</option>
      <option value="Operator"<?php echo ($tampil[0]['jabatan_karyawan'] == 'Operator') ? 'selected' : ''; ?>>Operator</option>
      <option value="Supervisor" <?php echo ($tampil[0]['jabatan_karyawan'] == 'Supervisor') ? 'selected' : ''; ?>>Supervisor</option>
    </select>
    </div>
</div>
    <!-- Alamat Karyawan -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="462_gajipokok"><h6>Alamat Karyawan :</h6></label>
    <textarea name="462_alamat" class="form-control" id="" ><?php echo $tampil[0]['alamat_karyawan'] ?></textarea>
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
<script src="./css/bootstrap.bundle.min.js"></script>
</html>