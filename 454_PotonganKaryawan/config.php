<?php
interface prass{ //kerangka class interface, nantinya semua method yang ada di interface harus ada di setiap class yang mengimplementasikanya
    public function tampilData();
    public function tambahData();
    public function ambilData();
    public function editData();
    public function cariData($keyword);
    public function pageShow();
    public function hapusData();

}


//koneksi database
class Lib454 implements prass{

    public $db;
    public function __construct() //method construct, otomatis tereksekusi saat objek class connection dibuat
    {
    
             // Data yang diperlukan untuk koneksi ke database
             $host = 'localhost';
             $dbname = 'kelompok_gaji';
             $user = 'root';
             $pwd = '';
             $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pwd); //membuat koneksi ke database, yang nanti disimpan ke property $db untuk digunakan kembali
    }
    public function tampilData(){
             $query = $this->db->prepare("SELECT * FROM potongan_karyawan"); //query sql untuk menampilkan semua data yang ada dalam tabel potongan_karyawan
             $query->execute(); //mengeksekusi variabel $query di atas
             $data = $query->fetchAll(); //data yang diambil dari querry kemudian difecthing dijadikan data berbentuk array yang kemudian disimpan ke variabel $data
             return $data; //isi nilai akhir dari method show() adalah value dari variabel $data
    }

    public function tambahData(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='tambah') { //menerapkan kerangka dari interface prass
            //menampung data2 yang dikirim melalui form tambah.php dengan method post ke dalam variabel2 berikut
            $id = $_POST['454_idpotongan'];
            $nama = $_POST['454_nama'];
            $jamkes = $_POST['454_jamkes'];
            $pajak = $_POST['454_pajak'];
            $izin = $_POST['454_izin'];
            $alpha = $_POST['454_alpha'];
            $total = $_POST['454_total'];

        //membuat query untuk insert data ke dalam kolom2 yang ada di database
            $query = $this->db->prepare("INSERT INTO potongan_karyawan 
            (id_potongan, nama_potongan, jamkes_potongan, pajak_potongan, izin_potongan, alpha_potongan, total_potongan) 
             VALUES (?, ?, ?, ?, ?, ?, ?)");

        // mengeksekusi query dengan isian variabel2 yang sudah menampung value dari method post di atas, ingat penempatan harus urut sesuai query insert di atas
        $query->execute([$id, $nama, $jamkes,  $pajak, $izin, $alpha, $total]);
            header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
        exit();
    }
}

public function ambilData(){ //method ini hanya ada di class edit berfungsi untuk mengambil data dari database yang akan di edit/update
    if(isset($_GET['page']) && $_GET['page'] == "edit"){ //logika di bawah hanya akan dieksekusi apabila dalam url ada $_GET['page'] dan parameternya berisi edit
        $id = $_GET['idpotongan']; //mengambil value dari parameter $_GET['idpotongan'] dan disimpan ke dalam variabel $id untuk nantinya menjadi acuan untuk update data
        $tampildata =$this->db->prepare("SELECT * FROM potongan_karyawan WHERE id_potongan = ?"); //query disimpak ke variabel $tampildata, isinya menampilkan data dari database yang data di kolom id_potongan nya sama dengan variabel $id yang digunakan sebagai acuan tadi
        $tampildata->execute([$id]); //mengeksekusi query dari variabel $tampildata dengan mengambil parameter dari variabel $id untuk acuan pengambilan data dari database
        $dataedit = $tampildata->fetchAll(); //menyimpan hasil eksekusi query $tampildata ke dalam variabel $dataedit yang isinya berbentuk array
        return $dataedit; //mengembalikan nilai getData() yang nantinya berisi data dari $dataedit
    }
}

public function editData(){ //menerapkan kerangka dari interface prass yaitu method proses()
           
    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='edit'){ //logika di bawah hanya akan di picu apabila ada method POST yang dijalankan dan value/parameter dari $GET['page'] adalah "edit"
   //menampung data2 yang dikirim melalui form edit.php dengan method post ke dalam variabel2 berikut
   $id = $_POST['454_idpotongan'];
   $nama = $_POST['454_nama'];
   $jamkes = $_POST['454_jamkes'];
   $pajak = $_POST['454_pajak'];
   $izin = $_POST['454_izin'];
   $alpha = $_POST['454_alpha'];
   $total = $_POST['454_total'];
    
    //membuat query untuk update data ke dalam kolom2 yang ada di database, dengan syarat data yang di update pada kolom id_potongan bervalue sama dengan $id
    $query = $this->db->prepare("UPDATE potongan_karyawan SET jamkes_potongan = ?,nama_potongan = ?, pajak_potongan = ?, izin_potongan = ?, alpha_potongan = ?, total_potongan = ? WHERE id_potongan = ?");
     // mengeksekusi query dengan isian variabel2 yang sudah menampung value dari method post di atas, ingat penempatan harus urut sesuai query insert di atas
    $query->execute([$jamkes, $nama, $pajak, $izin, $alpha, $total, $id]);
        header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
        exit();
    }
 }

public function cariData($keyword){ //mengimplementasikan kerangka pada interface prass dengan parameter $keyword, class ini untuk pencarian data
    $query = $this->db->prepare("SELECT * FROM potongan_karyawan WHERE id_potongan LIKE ?"); //query untuk menampilkan data berdasar kecocokan keyword dengan kolom id_potongan
    $query->execute(['%' . $keyword . '%']); //mengeksekusi query dengan mengambil value dari parameter $keyword untuk di cari di setiap kolom yang ditentukan
    $data = $query->fetchAll(); //memfetching hasil data yang ada di variable $query yang nantinya akan berbentuk array dan disimpan ke variabel $data
    return $data; //mengembalikan nilai dari fungsi cari() bervalue dari variabel $data
}

public function pageShow(){ //menerapkan kerangka dari interface prass yaitu method proses()
    $page =""; //nilai default variable $page
    if(isset($_GET['page'])){ //kode dibawah akan dieksekusi jika di url ada $_GET['page']
        $page = $_GET['page']; //value dari variable $page akan di isi parameter dari $_GET['page']
    }
    switch($page){ //menggunakan switch case untuk menentukan form yang di include
        case 'tambah' : //jika value $page yang isinya dari $_GET['page'] tadi adalah "tambah"
            include("tambah.php"); //maka yang di include adalah file tambah.php
            break;
            case 'edit' : //jika value $page yang isinya dari $_GET['page'] tadi adalah "edit"
                include("edit.php"); //maka yang di include adalah file edit.php
                break;
                default ;
    }

}

public function hapusData(){ //menerapkan kerangka dari interface prass yaitu method proses()
if (isset($_GET['hapus'])) { //logika di bawah hanya akan dieksekusi jika url dengan $_GET['hapus] ada
    $id = $_GET['hapus']; //menyimpan value parameter dari $_GET['hapus] ke dalam variabel $id
    $query = $this->db->prepare("DELETE FROM potongan_karyawan WHERE id_potongan = ?"); //query untuk menghapus data dalam database dengan acuan data yang dihapus pada kolom id_potongan sama dengan variabel $id
    $query->execute([$id]); //mengeksekusi query di atas dengan menangkap value dari $id sebagai acuan
    header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
    exit();
}
}
}

