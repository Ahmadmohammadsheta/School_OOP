<?php

class Model_schoolroom extends Model_students{
    public function insert() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])) {
                if (!empty($_POST['name'])) {
                    $name          = $_POST['name'];
                    $insert = "INSERT INTO $this->tables ( name ) 
                    VALUES ( '$name' )";
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
}