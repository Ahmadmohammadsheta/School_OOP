<?php

require_once 'Model_for_all.php';

class Model_students extends Model_for_all {

// START FETCH STUDENTS METHOD
    public function fetch_students_join() {
        $data = null;
        $selectJoinData = "SELECT students.name, students.id ,students.age, students.mother_name, students.mother_phone, schoolrooms.schoolrooms_name, schoolrooms.schoolrooms_id 
                              FROM students
                              INNER JOIN schoolrooms
                              ON students.schoolroom_id=schoolrooms.schoolrooms_id
                              ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";           
            }
        }
        return $data;                     
    }

    public function fetch_students_as_schoolroom($schoolrooms_id) {
        $data = null;
        $selectJoinData = "SELECT students.name, students.id ,students.age, students.mother_name, students.mother_phone, schoolrooms.schoolrooms_name, schoolrooms.schoolrooms_id 
                              FROM students
                              INNER JOIN schoolrooms
                              ON students.schoolroom_id=schoolrooms.schoolrooms_id
                              WHERE students.schoolroom_id=$schoolrooms_id
                              ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";           
            }
        }
        return $data;                     
    }
// END FETCH STUDENTS METHOD


// START ADD STUDENT METHOD
    public function insert() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name'])         &&
                isset($_POST['age'])          &&
                isset($_POST['mother_name'])  &&
                isset($_POST['mother_phone']) &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['name'])        &&
                    !empty($_POST['age'])         &&
                    !empty($_POST['mother_name']) &&
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
                        }
                } else {
                    echo "<script>alert('some field is empty')</script>";
                }
            } 
        }    
    }

// END ADD STUDENT METHOD

/////////////////////////

// START UPDATE STUDENT METHOD
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

// END UPDATE STUDENT METHOD

/////////////////////////


}