<?php
include_once('config.php'); //menyertakan config.php, tapi jika sudah ada maka diabaikan
$edit = new Lib454(); //membuat objek dari class edit
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
    <script>
        // Fungsi untuk memberi value otomatis kepada input total gaji kotor
        function nilaiPotongan() {
            var jamkes = parseFloat(document.getElementById("454_jamkes").value) || 0;
            var pajak = parseFloat(document.getElementById("454_pajak").value) || 0;
            var izin = parseFloat(document.getElementById("454_izin").value) || 0;
            var alpha = parseFloat(document.getElementById("454_alpha").value) || 0;
            if (izin >= 15) {
        izin = 60000;
    } else if (izin >= 10) {
        izin = 40000;
    } else if (izin >= 5) {
        izin = 20000;
    } else {
        izin = 0;
    }
            
        
            var total = jamkes + pajak + izin + (alpha * 20000);
            
            document.getElementById("454_total").value = total;
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
<!-- ID Potongan -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="454_idpotongan"><h6>ID Potongan :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_idpotongan" id="" value="<?php echo $tampil[0]['id_potongan']?>" required readonly>
    </div>
    </div>
          <!-- Nama Karyawan -->
          <div class="my-3 col-md-6">
      <div class="d-flex flex-column w-75">
      <label for="454_nama"><h6>Nama Karyawan :</h6></label>
      <input type="text" class="form-control p-1 m-1" name="454_nama" id="" value="<?php echo $tampil[0]['nama_potongan']?>"required>
      </div>
      </div>
<!-- Jaminan Kesehatan -->
<div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="454_jamkes"><h6>Jaminan Kesehatan(Rp) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_jamkes" id="454_jamkes" value="<?php echo $tampil[0]['jamkes_potongan']?>" required oninput="nilaiPotongan()">
    </div>
    </div>

<!-- Pajak -->
<div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="454_pajak"><h6>Pajak (Rp) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_pajak" id="454_pajak" value="<?php echo $tampil[0]['pajak_potongan']?>" required oninput="nilaiPotongan()">
    </div>
    </div>
<!-- Izin -->
<div class="my-3 col-md-6">
<div class="d-flex flex-column w-75">
    <label for="454_izin"><h6>Izin (Hari) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_izin" id="454_izin" value="<?php echo $tampil[0]['izin_potongan']?>" oninput="nilaiPotongan()">
</div>
    </div>
    <!-- Alpha -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="454_alpha"><h6>Alpha (Rp.) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_alpha" id="454_alpha" value="<?php echo $tampil[0]['alpha_potongan']?>" oninput="nilaiPotongan()">
    </div>
    </div>
    <!-- Total potongan -->
    <div class="my-3 col-md-6">
        <div class="d-flex flex-column w-75">
    <label for="454_total"><h6>Total Potongan (Rp.) :</h6></label>
    <input type="number" class="form-control p-1 m-1" name="454_total" id="454_total" value="<?php echo $tampil[0]['total_potongan']?>" readonly oninput="nilaiPotongan()">
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