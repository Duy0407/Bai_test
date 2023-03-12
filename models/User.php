<?php
require_once 'models/Model.php';

class User extends Model{
    public $id_user;
    public $tai_khoan;
    public $mat_khau;
    public $ho_ten;
    public $avatar; 
    public $level; 
    public $create_at; 
    public $update_at; 

   
    
    public function insertRegister(){
        $obj_insert = $this->connection->prepare("INSERT INTO user(tai_khoan,mat_khau,ho_ten,level,create_at,update_at)VALUE(:tai_khoan,:mat_khau,:ho_ten,:level,:create_at,:update_at)");
        $arr_insert = [
            ':tai_khoan' => $this->tai_khoan,
            ':mat_khau' => $this->mat_khau,
            ':ho_ten' => $this->ho_ten,
            ':level' => $this->level,
            ':create_at' => $this->create_at,
            ':update_at' => $this->update_at,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getUsernameAndPassword($tai_khoan,$mat_khau){
        $obj_select = $this->connection->prepare("SELECT * FROM `user` WHERE tai_khoan=:tai_khoan AND mat_khau=:mat_khau LIMIT 1");
        $arr_select = [
            ':tai_khoan' => $tai_khoan,
            ':mat_khau' => $mat_khau,
        ];
        $obj_select->execute($arr_select);
        $user = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $user;
    }


   
}

?>