<?php

class Modal_for_all {
    private $server    ="localhost";
    private $username  ="root";
    private $password   ;
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
        $data   = null;
        $select = "SELECT * FROM $this->tables ";
        if ($query = $this->connect->query($select)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";           
            }
        }
        return $data;
    }

    public function read($id) {
        $data      = null;
        $select    = "SELECT * FROM $this->tables WHERE id = '$id' ";
        if ($query = $this->connect->query($select)) {
            $row   = mysqli_fetch_assoc($query);
            $data  = $row;
            
        }
        return $data;
    }

    public function delete($table, $id) {
        $delete = "DELETE FROM $table WHERE id = '$id' ";
        if ($this->connect->query($delete)) {
            return true;
        } else {
            echo $table;echo '<br>';
            echo $id;echo '<br>';
            print_r($this->connect);

            // return false;
        }
        
    }

    // public function delete($id) {
    //     $delete = "DELETE FROM $this->tables WHERE id = '$id' ";
    //     if ($query  = $this->connect->query($delete)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
 

    public function test() {
        $error_empty = null;
        if (isset($_POST['submit'])) {
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    echo $key." is empty"."<br>";
                }
            }
        }
        return $error_empty;
    }

}