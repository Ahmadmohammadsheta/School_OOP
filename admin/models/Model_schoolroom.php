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

    public function fetch_absence_as_Schoolroom($schoolrooms_id) {
        $data = null;
        $selectJoinData = "SELECT students.name, students.id , schoolrooms.schoolrooms_name, schoolrooms.schoolrooms_id 
                              FROM schoolrooms 
                              INNER JOIN students
                              ON students.schoolroom_id=schoolrooms.$schoolrooms_id
                              ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";           
            }
        }
        return $data;                     
    }
}