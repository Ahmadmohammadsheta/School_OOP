<?php

class Model_teachers extends Model_for_all {

    public function insert_user() {

        if (isset($_POST['new_user'])) {
            # code...
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
            $selectJoinData = "SELECT teachers.id, teachers.username, teachers.age, teachers.email, teachers.phone, schoolrooms.schoolrooms_name 
                              FROM teachers   
                              INNER JOIN schoolrooms
                              ON teachers.id=schoolrooms.teacher_id
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