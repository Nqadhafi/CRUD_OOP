<?php
include_once('config.php'); //menyertakan config.php, tapi jika sudah ada maka diabaikan
$edit = new edit(); //membuat objek dari class edit
$edit->proses(); //mengeksekusi method proses() dari class edit
$tampil = $edit->getData(); //mengeksekusi method getData() dari ckass edit untuk menampilkan data dari database yang akan kita update di bawah, disimpan ke variabel $tampil dengan isinya berupa array

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script>
        // Fungsi untuk memberi value otomatis kepada input total gaji kotor
        function nilaiGajiKotor() {
            var pokok = parseFloat(document.getElementById("469_pokokgaji").value) || 0;
            var lembur = parseFloat(document.getElementById("469_lemburgaji").value) || 0;
            var tunjangan = parseFloat(document.getElementById("469_tunjangangaji").value) || 0;
            var bonus = parseFloat(document.getElementById("469_bonusgaji").value) || 0;
            var gajikotor = pokok + lembur + tunjangan + bonus;
            
            document.getElementById("469_kotorgaji").value = gajikotor;
        }
    </script>
</head>
<body>
  <form action="" method="post">
    <div class="container-fluid p-3 my-5 w-75 rounded border border-warning align-self-center">
      <div>
        <h5 class="mb-2">Tambah Data Baru</h5>
        <hr>
      </div>
      <div class="row">
        <!-- ID Gaji -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_idgaji"><h6>ID Gaji :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_idgaji" id="469_idgaji" value="<?php echo $tampil[0]['id_gaji']?>" required readonly>
          </div>
        </div>
        <!-- Gaji Pokok -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_pokokgaji"><h6>Gaji Pokok (Rp) :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_pokokgaji" id="469_pokokgaji" value="<?php echo $tampil[0]['pokok_gaji']?>" required oninput="nilaiGajiKotor()">
          </div>
        </div>
        <!-- Gaji Lembur -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_lemburgaji"><h6>Lembur (Rp) :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_lemburgaji" id="469_lemburgaji" value="<?php echo $tampil[0]['lembur_gaji']?>" oninput="nilaiGajiKotor()">
          </div>
        </div>
        <!-- Gaji Tunjangan -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_tunjangangaji"><h6>Tunjangan (Rp) :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_tunjangangaji" id="469_tunjangangaji" value="<?php echo $tampil[0]['tunjangan_gaji']?>" oninput="nilaiGajiKotor()">
          </div>
        </div>
        <!-- Bonus Gaji -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_bonusgaji"><h6>Bonus (Rp) :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_bonusgaji" id="469_bonusgaji" value="<?php echo $tampil[0]['bonus_gaji']?>" oninput="nilaiGajiKotor()">
          </div>
        </div>
        <!-- Total Kotor Gaji -->
        <div class="my-3 col-md-6">
          <div class="d-flex flex-column w-75">
            <label for="469_kotorgaji"><h6>Total Gaji Kotor (Rp) :</h6></label>
            <input type="number" class="form-control p-1 m-1" name="469_kotorgaji" id="469_kotorgaji" value="<?php echo $tampil[0]['total_gaji']?>" readonly>
          </div>
        </div>
      </div>
      <!-- Submit -->
      <div class="text-center mt-2 mb-3">
        <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
        <a href="?" class="btn btn-danger px-4 py-2">Batal</a>
      </div>
    </div>
  </form>
</body>
<script src="./css/bootstrap.bundle.min.js"></script>
</html>
