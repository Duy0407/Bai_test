<?php
require_once 'models/Model.php';

class News extends Model{
    public $id;
    public $id_user;
    public $title;
    public $content;
    public $image;
    public $create_new;
    public $update_new;
    public $status;

    public function insert(){
        $obj_insert = $this->connection->prepare("INSERT INTO `tin`(id_user,title,content,image,create_new,update_new,status)VALUES(:id_user,:title,:content,:image,:create_new,:update_new,:status)");
        $arr_insert = [
            ':id_user' => $this->id_user,
            ':title' => $this->title,
            ':content' => $this->content,
            ':image' => $this->image,
            ':create_new' => $this->create_new,
            ':update_new' => $this->update_new,
            ':status' => $this->status,
        ];

        return $obj_insert->execute($arr_insert);
    }


    public function getShowHome(){
        $obj_select = $this->connection->prepare("SELECT * FROM `tin` t INNER JOIN `user` u ON t.`id_user` = u.`id_user` WHERE t.`status` = 1 ORDER BY t.`update_new` DESC");
        $obj_select->execute();
        $new = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $new;
    }

    public function getNewsViaUser1($id_user){
        $obj_select = $this->connection->prepare("SELECT * FROM `tin` t INNER JOIN `user` u ON t.`id_user` = u.`id_user` WHERE t.`status` = 1 AND t.`id_user` = '$id_user'  ORDER BY t.`update_new` DESC");
        $obj_select->execute();
        $new1 = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $new1;
    }

    public function getNewsViaUser2($id_user){
        $obj_select = $this->connection->prepare("SELECT * FROM `tin` t INNER JOIN `user` u ON t.`id_user` = u.`id_user` WHERE t.`status` = 0 AND t.`id_user` = '$id_user'  ORDER BY t.`update_new` DESC");
        $obj_select->execute();
        $new1 = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $new1;
    }

    public function getNewsViaUser3($id_user){
        $obj_select = $this->connection->prepare("SELECT * FROM `tin` t INNER JOIN `user` u ON t.`id_user` = u.`id_user` WHERE t.`status` = 2 AND t.`id_user` = '$id_user'  ORDER BY t.`update_new` DESC");
        $obj_select->execute();
        $new1 = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $new1;
    }


    public function delete($id){
        $obj_delete = $this->connection->prepare("DELETE FROM `tin` WHERE `id` = '$id'");
        return $obj_delete->execute();
    }

    public function update($id){
        $obj_update = $this->connection->prepare("UPDATE `tin` SET `title` = :title, `content` = :content, `image` = :image, `update_new` = :update_new WHERE `id` = '$id'");
        $arr_update = [
            ':title' => $this->title,
            ':content' => $this->content,
            ':image' => $this->image,
            ':update_new' => $this->update_new,
        ];

        return $obj_update->execute($arr_update);
    }

    public function getUpdateId($id){
        $obj_getupdate = $this->connection->prepare("SELECT * FROM `tin` WHERE `id` = '$id'");
        $obj_getupdate->execute();
        $new_one = $obj_getupdate->fetch(PDO::FETCH_ASSOC);
        return $new_one;

    }


    public function getNewsAdmin(){
        $obj_select = $this->connection->prepare("SELECT * FROM `tin` t INNER JOIN `user` u ON t.`id_user` = u.`id_user` WHERE t.`status` = 0 AND u.`level` = 0 ORDER BY `update_new`");
        $obj_select->execute();
        $new = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $new;
    }


    public function duyet($id){
        $obj_update = $this->connection->prepare("UPDATE `tin` SET `update_new` = :update_new, `status` = :status WHERE `id` = '$id'");
        $arr_update = [
            ':update_new' => $this->update_new,
            ':status' => $this->status,
        ];
        return $obj_update->execute($arr_update);
    }

    public function tuchoi($id){
        $obj_update = $this->connection->prepare("UPDATE `tin` SET `status` = :status WHERE `id` = '$id'");
        $arr_update = [
            ':status' => $this->status,
        ];
        return $obj_update->execute($arr_update);
    }
}




?>