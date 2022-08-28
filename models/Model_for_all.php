<?php

class Modal_for_all {
    private $server    ="localhost";
    private $username  ="root";
    private $password  ="";
    private $dbname    ="School_OOP";
    public $connect;
    public $tables;

    public function __construct() {
        try {
            $this->connect = new mysqli(
                        $this->server,
                        $this->username,
                        $this->password,
                        $this->dbname
                    );
        } catch (Exception $er) {
            echo "Connection failed ". $er->getMessage();
        }
        
    }

    public function fetch() {
        $data = null;
        $select = "SELECT * FROM $this->tables ";
        if ($query = $this->connect->query($select)) {
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        } 
        return $data;       
    }

    public function read($id) {
        $data = null ;
        $select = "SELECT * FROM $this->tables WHERE id = '$id' ";
        if ($query = $this->connect->query($select)) {
            while ($row = mysqli_fetch_assoc($query)) {
                $data = $row;
            }
        }
        return $data;
    }

    // public function delete($id) {
    //     $destroy = "DELETE FROM $this->tables WHERE id = '$id' ";
    //     if ($query = $this->connect->query($destroy)) {
    //         return true;
    //     } else {
    //         return false;
    //     };
    // }

}