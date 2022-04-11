<?php

class Model_teachers extends Model_for_all {

    public function insert_teacher() {
            if (isset($_POST['new_teacher'])) {
                if (isset($_POST['teachername'])          &&
                    isset($_POST['phone'])             &&
                    isset($_POST['age'])             &&
                    isset($_POST['email'])) {
                    if (!empty($_POST['teachername'])         &&
                        !empty($_POST['phone'])            &&
                        !empty($_POST['age'])            &&
                        !empty($_POST['email']) ) {
                            $teachername  = $_POST['teachername'];
                            $phone  = $_POST['phone']; 
                            $age  = $_POST['age']; 
                            $email     = $_POST['email'];
                            $insert = "INSERT INTO teachers (teachername, phone, age, email) VALUES ('$teachername', '$phone', '$age', '$email')";
                            if ($query = $this->connect->query($insert)) {
                                echo "<script>alert('success')</script>";
                                echo "<script>window.location.href='teachers.php'</script>";
                            } else {
                                echo "<script>alert('$teachername added before')</script>";
                            }
                    } else {
                        echo "<script>alert('no posts')</script>";
                    }
                }
            }      
    }

    public function fetch_teachers() {
        $data = null;
        $select  = "SELECT * FROM teachers";
        if ($query = $this->connect->query($select)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";           
            }
        }
        return $data;
    }

    public function teacher_join() {
        $data = null;
            $selectJoinData = "SELECT teachers.teachers_id, teachers.teachername, teachers.age, teachers.email, teachers.phone, schoolrooms.schoolrooms_name 
                              FROM teachers   
                              INNER JOIN schoolrooms
                              ON teachers.teachers_id=schoolrooms.teacher_id
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