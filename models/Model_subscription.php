<?php

class Model_subscription extends Model_students {
     				
    public function sub_insert() {
        $name = null;
        $month= null;
        if (isset($_POST['submit'])) {
            if (isset($_POST['month'])      &&
                isset($_POST['vlaue'])      &&
                isset($_POST['residual'])   &&
                isset($_POST['student_id']) &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['month'])      &&
                    !empty($_POST['vlaue'])      &&
                    !empty($_POST['residual'])   &&
                    !empty($_POST['student_id']) &&
                    !empty($_POST['schoolroom_id'])) {
                    $month         = $_POST['month'];
                    $vlaue         = $_POST['vlaue'];
                    $residual      = $_POST['residual'];
                    $student_id    = $_POST['student_id'];
                    $schoolroom_id = $_POST['schoolroom_id'];
                    $select = "SELECT * FROM $this->tables WHERE student_id = '$student_id' AND month = '$month' ";
                    if ($query = $this->connect->query($select)) {                        
                        foreach ($query as $row) {
                            $row_month[]  = $row['month'];
                            if (!in_array($month, $row_month) ) {                        
                                $insert = "INSERT INTO $this->tables ( month, vlaue, residual, student_id, schoolroom_id ) 
                                VALUES ( '$month', '$vlaue', '$residual', '$student_id', '$schoolroom_id' )";
                                if ($query = $this->connect->query($insert)) {
                                    echo "<script>alert('Added successfully')</script>";
                                    echo "<script>window.location.href='subscriptions.php'</script>";
                                } else {
                                    echo "<script>alert('failed adding')</script>";
                                }    
                            } else {
                                echo "<script>alert('دفع اشتراك')</script>";
                            }   
                        }
                    } else {
                        echo "<script>alert('empty id or month')</script>";                  
                    }
                } else {
                    echo "<script>alert('empty posts')</script>";
                }
            } else {
                echo "<script>alert('no posts')</script>";
            }
        } else {
            echo "<script>alert('no submit')</script>";
        }
    }

    public function sub_read($id) {
        $data   = null ;
        $row_fetch  = $this->fetch();
        if (!empty($row_fetch)) {
            foreach ($row_fetch as $row) {
                $month = $row['month'];
                $select = "SELECT * FROM $this->tables WHERE id = '$id' AND  month = '$month' ";
                if ($query = $this->connect->query($select)) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $data[] = $row;
                }
            }
        }
    }
        return $data;
    }

    public function read_student($id) {
        $data = null ;
        $select = "SELECT * FROM $this->tables WHERE student_id = '$id' ";
        if ($query = $this->connect->query($select)) {
            while ($row = mysqli_fetch_assoc($query)) {
                $data = $row;
            }
        }
        return $data;
    }

}