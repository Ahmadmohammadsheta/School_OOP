<?php

class Model_for_all {
    private $server    ="localhost";
    private $username  ="root";
    private $password   ;
    private $dbname    ="School_OOP";
    public $connect;
    public $tables;
    public $amount;
    public $subscription = 150;


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

    public function search($table) {
        $data         = null;
        $filteredData = $_GET['search'];
        $select       = "SELECT * FROM $table WHERE CONCAT(name, age, mother_name, mother_phone) LIKE '%$filteredData%' ";
        if ($query = $this->connect->query($select)) {
            foreach ($query as $rows) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function join1() {
        $data = null;
        $selectJoinData = "SELECT students.name, students.id ,students.age,students.schoolroom_id, schoolrooms.schoolrooms_name, subscriptions.month, subscriptions.value 
                              FROM subscriptions   
                              INNER JOIN students
                              ON subscriptions.student_id=students.id
                              INNER JOIN schoolrooms
                              ON students.schoolroom_id=schoolrooms.schoolrooms_id
                              ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<br>";           
            }
        }
        return $data;
    }

    public function search_join() {
        $data = null;
        if (isset($_GET['submit'])) {
            $filteredData = $_GET['search'];
            $selectJoinData = "SELECT students.id, students.name, students.age, schoolrooms.schoolrooms_name, students.mother_name, students.mother_phone 
                              FROM students   
                              INNER JOIN schoolrooms
                              ON students.schoolroom_id=schoolrooms.schoolrooms_id
                              WHERE CONCAT(name, age, mother_name, mother_phone, schoolrooms_name) 
                              LIKE '%$filteredData%' 
                              ";
            if ($query = $this->connect->query($selectJoinData)) {
                while ($row   = mysqli_fetch_assoc($query)) {
                    $data[]   = $row;
                    // print_r($data);echo "<br>";           
                }
            }
        return $data;        
        }
    }

    public function search_join_schoolroom() {
        $data = null;
        if (isset($_GET['submit_schoolroom'])) {
            $filteredData = $_GET['schoolroom'];
            $selectJoinData = "SELECT students.id, students.name, students.age, schoolrooms.schoolrooms_name, students.mother_name, students.mother_phone 
                              FROM students   
                              INNER JOIN schoolrooms
                              ON students.schoolroom_id=schoolrooms.schoolrooms_id
                              WHERE CONCAT(name, age, mother_name, mother_phone, schoolrooms_name) 
                              LIKE '%$filteredData%' 
                              ";
            if ($query = $this->connect->query($selectJoinData)) {
                while ($row   = mysqli_fetch_assoc($query)) {
                    $data[]   = $row;
                    // print_r($data);echo "<br>";           
                }
            }
        return $data;        
        }
    }

}