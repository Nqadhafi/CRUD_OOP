<?php
interface haikal{
    public function proses();
}

//koneksi database
class connection{

    protected $db;
    public function __construct()
    {
    
        $host = 'localhost';
        $dbname = 'kelompok_gaji';
        $user = 'root';
        $pwd = '';
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pwd);
    }
    public function show(){
        $query = $this->db->prepare("SELECT * FROM data_gaji");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}

class page implements haikal{
    public function proses(){
        $page ="";
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        switch($page){
            case 'tambah' :
                include("tambah.php");
                break;
                case 'edit' :
                    include("edit.php");
                    break;
                    default ;
        }
    }
    }

    class tambah implements haikal{
    public function proses(){
        // ... logika tambah
    }
    }

    class edit implements haikal{
        public function proses(){
            // ...logika edit
        }
    }

    class hapus implements haikal{
        public function proses(){
            //  ... logika hapus
        }
    }
?>