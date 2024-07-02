<?php
interface haikal{
    public function proses();
}

//koneksi database
class conecntion{
    public function __construct()
    {
        
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