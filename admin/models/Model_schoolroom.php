<?php

class Model_schoolroom extends Model_students{
    public function insert() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['schoolrooms_name'])) {
                if (!empty($_POST['schoolrooms_name'])) {
                    $schoolrooms_name          = $_POST['schoolrooms_name'];
                    $insert = "INSERT INTO $this->tables ( schoolrooms_name ) 
                    VALUES ( '$schoolrooms_name' )";
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