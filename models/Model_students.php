<?php

class Model_students {
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

    public function students_posts () {

        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])     &&
                isset($_POST['age'])          &&
                isset($_POST['mother_name'])  &&
                isset($_POST['mother_phone']) &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['name'])    &&
                    !empty($_POST['age'])         &&
                    !empty($_POST['mother_name']) &&
                    !empty($_POST['mother_phone'])) {
                    $name          = $_POST['name'];
                    $age           = $_POST['age'];
                    $mother_name   = $_POST['mother_name'];
                    $mother_phone  = $_POST['mother_phone'];
                    $schoolroom_id = $_POST['schoolroom_id'];
                    
                }
            }
        }
        return $name          ;
        return $age           ;
        return $mother_name   ;
        return $mother_phone  ;
        return $schoolroom_id ;
    }
    
    public function insert() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])         &&
                isset($_POST['age'])          &&
                isset($_POST['mother_name'])  &&
                isset($_POST['mother_phone']) &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['name'])         &&
                    !empty($_POST['age'])          &&
                    !empty($_POST['mother_name'])  &&
                    !empty($_POST['mother_phone']) &&
                    !empty($_POST['schoolroom_id'])) {
                    $name          = $_POST['name'];
                    $age           = $_POST['age'];
                    $mother_name   = $_POST['mother_name'];
                    $mother_phone  = $_POST['mother_phone'];
                    $schoolroom_id = $_POST['schoolroom_id'];
                    $insert = "INSERT INTO $this->tables ( name, age, mother_name, mother_phone, schoolroom_id ) 
                    VALUES ( '$name', '$age', '$mother_name', '$mother_phone', '$schoolroom_id' )";
                    if ($query = $this->connect->query($insert)) {
                        echo "<script>alert('Added successfully')</script>";
                        echo "<script>window.location.href='students.php'</script>";

                    } else {
                        echo "<script>alert('no')</script>";
                    };
                }
            }
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

    public function update($id) {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])         &&
                isset($_POST['age'])          &&
                isset($_POST['mother_name'])  &&
                isset($_POST['mother_phone']) &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['name'])         &&
                    !empty($_POST['age'])          &&
                    !empty($_POST['mother_name'])  &&
                    !empty($_POST['mother_phone']) &&
                    !empty($_POST['schoolroom_id'])) {
                    $name          = $_POST['name'];
                    $age           = $_POST['age'];
                    $mother_name   = $_POST['mother_name'];
                    $mother_phone  = $_POST['mother_phone'];
                    $schoolroom_id = $_POST['schoolroom_id'];


                    $update = "UPDATE $this->tables SET  
                        name          = '$name',
                        age           = '$age',
                        mother_name   = '$mother_name', 
                        mother_phone  = '$mother_phone',
                        schoolroom_id = '$schoolroom_id' 
                        WHERE id = '$id' ";

                    if ($query = $this->connect->query($update)) {
                        echo "<script>alert('Update Successfully')</script>";
                        echo "<script>window.location.href='students.php'</script>";
                    } else {
                        echo "<script>alert('no')</script>";
                    };
                }
                echo "<script>alert('empty')</script>";
            }
        }
        
    }

    public function delete($id) {
        $destroy = "DELETE FROM $this->tables WHERE id = '$id' ";
        if ($query = $this->connect->query($destroy)) {
            return true;
        } else {
            return false;
        };
    }


}