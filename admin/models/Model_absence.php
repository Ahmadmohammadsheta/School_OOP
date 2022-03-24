<?php

class Model_absence extends Model_for_all {

    // START FETCH STUDENTS METHOD
    public function fetch_absence_join() {
        $data = null;
        $selectJoinData = "SELECT students.name, students.id , schoolrooms.schoolrooms_name, schoolrooms.schoolrooms_id 
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
// END FETCH STUDENTS METHOD

    public function fetch_absence($day) {
        $data      = null;
        $select    = "SELECT * FROM $this->tables WHERE day = '$day' ";
        if ($query = $this->connect->query($select)) {
            $row   = mysqli_fetch_assoc($query);
            $data  = $row;
            
        }
        return $data;

    }

    public function insert_absence() {

        $data= $_POST;

        if ( $day = $_GET['day']) {
            $this->tables = 'absence';
            $fetch_where  = $this->fetch_absence($day);
            @$today        = $fetch_where['day'];
        }
        if (isset($_REQUEST['submit'])) {
            if ($day !== $today) {
                if (isset($_POST['student_id'])         &&
                    isset($_POST['schoolroom_id'])&&
                    isset($_POST['status'])       &&
                    isset($_POST['day'])) {
                    if (!empty($_POST['student_id'])         &&
                        !empty($_POST['schoolroom_id'])&&
                        !empty($_POST['status'])       &&
                        !empty($_POST['day'])) {

                            foreach ($_POST['student_id'] as $key => $value) {
                                $student_id    = $_POST['student_id'][$key];
                                $schoolroom_id = $_POST['schoolroom_id'][$key];                   
                                $status        = $_POST['status'][$key];
                                $day           = $_POST['day'][$key];
                                $data[]        = $value;
                                $insert = "INSERT INTO $this->tables 
                                ( student_id, schoolroom_id, status, day ) 
                                VALUES 
                                ('$student_id', '$schoolroom_id', '$status', '$day')";
                                if ($query = $this->connect->query($insert)) {
                                    echo "<script>alert('Added successfully')</script>";
                                    echo "<script>window.location.href='absences.php?day=$day'</script>";
                                } else {
                                    echo "<script>alert('no')</script>";
                                }

                            }

                    } else {
                        echo "<script>alert('some field is empty')</script>";
                    }

                } else {
                    echo "<script>alert('no posts')</script>";
                }

            } else {
                echo "<script>alert('$today is added before')</script>";
            }

        }                        

        return $data; 

    }

    public function test_insert() {
        $data = $_POST;
        print_r($data);        
    }









    // End Of Model
}