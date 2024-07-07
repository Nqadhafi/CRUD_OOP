<?php
interface haikal{ //kerangka class interface, nantinya semua method yang ada di interface harus ada di setiap class yang mengimplementasikanya
    public function proses(); //kerangka method proses()
    public function cari($keyword); //kerangka method cari($parameter)
}


//koneksi database
class connection{

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
    public function show(){
        $query = $this->db->prepare("SELECT * FROM data_karyawan"); //query sql untuk menampilkan semua data yang ada dalam tabel data_karyawan
        $query->execute(); //mengeksekusi variabel $query di atas
        $data = $query->fetchAll(); //data yang diambil dari querry kemudian difecthing/dijadikan data berbentuk array yang kemudian disimpan ke variabel $data
        return $data; //isi nilai akhir dari method show() adalah value dari variabel $data
    }
}

class page implements haikal{ //class ini menghandel tampilan form yang akan diinclude
    public function proses(){ //menerapkan kerangka dari interface haikal yaitu method proses()
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
    public function cari($keyword){ //mengimplementasikan kerangka pada interface haikal dengan parameter $keyword, class ini untuk pencarian data
        $koneksi = new connection(); //membuat koneksi ke database supaya dapat mengeksekusi query dengan memanfaatkan membuat objek dari class connection
        $query = $koneksi->db->prepare("SELECT * FROM data_karyawan WHERE id_karyawan LIKE ? OR nama_karyawan LIKE ? OR jabatan_karyawan LIKE ? OR alamat_karyawan LIKE ?"); //query untuk menampilkan data berdasar kecocokan keyword dengan kolom nama_karyawan atau jabatan_karyawan atau alamat_karyawan
        $query->execute(['%' . $keyword . '%','%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%']); //mengeksekusi query dengan mengambil value dari parameter $keyword untuk di cari di setiap kolom yang ditentukan
        $data = $query->fetchAll(); //memfetching hasil data yang ada di variable $query yang nantinya akan berbentuk array dan disimpan ke variabel $data
        return $data; //mengembalikan nilai dari fungsi cari() bervalue dari variabel $data
    }
    }

    class tambah implements haikal{ //class ini menghandel proses dari tambah.php
    public function cari($keyword){
        // kosong
    }
    public function proses(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='tambah') { //menerapkan kerangka dari interface haikal yaitu method proses()
            $koneksi = new connection(); //membuat koneksi ke database supaya dapat mengeksekusi query dengan memanfaatkan membuat objek dari class connection
            
            //menampung data2 yang dikirim melalui form tambah.php dengan method post ke dalam variabel2 berikut
            $idkaryawan = $_POST['462_id'];
            $nama = $_POST['462_nama'];
            $usia = $_POST['462_usia'];
            $jabatan = $_POST['462_jabatan'];
            $alamat = $_POST['462_alamat'];
            //membuat query untuk insert data ke dalam kolom2 yang ada di database
            $query = $koneksi->db->prepare("INSERT INTO data_karyawan 
            (id_karyawan, 
            nama_karyawan, 
            usia_karyawan, 
            jabatan_karyawan, 
            alamat_karyawan) 
            VALUES (?, ?, ?, ?, ?)");

            // mengeksekusi query dengan isian variabel2 yang sudah menampung value dari method post di atas, ingat penempatan harus urut sesuai query insert di atas
            $query->execute([
                $idkaryawan, 
                $nama, 
                $usia, 
                $jabatan, 
                $alamat, 
                ]);

                header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
            exit();
        }
    }
    
    }

    class edit implements haikal{
        public function cari($keyword){
            // kosong
        }
        public function getData(){ //method ini hanya ada di class edit berfungsi untuk mengambil data dari database yang akan di edit/update
            if(isset($_GET['page']) && $_GET['page'] == "edit"){ //logika di bawah hanya akan dieksekusi apabila dalam url ada $_GET['page'] dan parameternya berisi edit
                $koneksi = new connection(); //membuat koneksi ke database supaya dapat mengeksekusi query dengan memanfaatkan membuat objek dari class connection
                $idkaryawan = $_GET['idkaryawan']; //mengambil value dari parameter $_GET['idkaryawan'] dan disimpan ke dalam variabel $idkaryawan untuk nantinya menjadi acuan untuk update data
                $tampildata = $koneksi->db->prepare("SELECT * FROM data_karyawan WHERE id_karyawan = ?"); //query disimpan ke variabel $tampildata, isinya menampilkan data dari database yang data di kolom id_karyawan nya sama dengan variabel $idkaryawan yang digunakan sebagai acuan tadi
                $tampildata->execute([$idkaryawan]); //mengeksekusi query dari variabel $tampildata dengan mengambil parameter dari variabel $idkaryawan untuk acuan pengambilan data dari database
                $dataedit = $tampildata->fetchAll(); //menyimpan hasil eksekusi query $tampildata ke dalam variabel $dataedit yang isinya berbentuk array
                return $dataedit; //mengembalikan nilai getData() yang nantinya berisi data dari $dataedit
            }
        }
        public function proses(){ //menerapkan kerangka dari interface haikal yaitu method proses()
           
            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='edit'){ //logika di bawah hanya akan di picu apabila ada method POST yang dijalankan dan value/parameter dari $GET['page'] adalah "edit"
            $koneksi = new connection(); //membuat koneksi ke database supaya dapat mengeksekusi query dengan memanfaatkan membuat objek dari class connection
           //menampung data2 yang dikirim melalui form edit.php dengan method post ke dalam variabel2 berikut
           $idkaryawan = $_POST['462_id'];
           $nama = $_POST['462_nama'];
           $usia = $_POST['462_usia'];
           $jabatan = $_POST['462_jabatan'];
           $alamat = $_POST['462_alamat'];
            
            //membuat query untuk update data ke dalam kolom2 yang ada di database, dengan syarat data yang di update pada kolom id_karyawan bervalue sama dengan $idkaryawan
            $query = $koneksi->db->prepare("UPDATE data_karyawan SET
            nama_karyawan = ?, 
            usia_karyawan = ?, 
            jabatan_karyawan = ?, 
            alamat_karyawan = ?
            WHERE id_karyawan = ?");

             // mengeksekusi query dengan isian variabel2 yang sudah menampung value dari method post di atas, ingat penempatan harus urut sesuai query insert di atas
            $query->execute([$nama, $usia, $jabatan, $alamat, $idkaryawan]);

                header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
                exit();
            }
         }
         }

    class hapus implements haikal{ 
        public function cari($keyword){
            // kosong
        }
        public function proses(){ //menerapkan kerangka dari interface haikal yaitu method proses()
            $koneksi = new connection(); //membuat koneksi ke database supaya dapat mengeksekusi query dengan memanfaatkan membuat objek dari class connection
        if (isset($_GET['hapus'])) { //logika di bawah hanya akan dieksekusi jika url dengan $_GET['hapus] ada
            $idkaryawan = $_GET['hapus']; //menyimpan value parameter dari $_GET['hapus] ke dalam variabel $idkaryawan
            $query = $koneksi->db->prepare("DELETE FROM data_karyawan WHERE id_karyawan = ?"); //query untuk menghapus data dalam database dengan acuan data yang dihapus pada kolom id_karyawan sama dengan variabel $idkaryawan
            $query->execute([$idkaryawan]); //mengeksekusi query di atas dengan menangkap value dari $idkaryawan sebagai acuan
            header('Location: index.php'); //jika sukses maka akan kembali ke halaman index
            exit();
        }
        }
    }
?>