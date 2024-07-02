<?php
interface haikal{
    public function page();
    public function tambah();
    public function edit();
    public function hapus();

}

//koneksi database
class conecntion{
    public function __construct()
    {
        
    }
}

class page implements haikal{
    public function tambah(){}
    public function edit(){}
    public function hapus(){}
    public function page(){
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
    public function edit(){}
    public function hapus(){}
    public function page(){}
    public function tambah(){
        // ... logika tambah
    }
    }

    class edit implements haikal{
        public function hapus(){}
        public function page(){}
        public function tambah(){}
        public function edit(){
            // ...logika edit
        }
    }

    class hapus implements haikal{
        public function page(){}
        public function tambah(){}
        public function edit(){}
        public function hapus(){
            //  ... logika hapus
        }
    }
?>