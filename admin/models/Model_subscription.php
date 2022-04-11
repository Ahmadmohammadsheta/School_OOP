<?php

class Model_subscription extends Model_for_all {

    public $residual;

    public function fetch_where($student_id) {
        $data      = null;
        $select    = "SELECT * FROM subscriptions WHERE student_id = '$student_id' ";
        if ($query = $this->connect->query($select)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]      = $row;
            }
        }
        return $data;
    }

    public function fetch_sum_value($student_id, $month) {
        $data      = null;
        $select   = "SELECT sum(value) AS total , student_id, month FROM subscriptions WHERE student_id = '$student_id' AND month = '$month' ";
        if ($query = $this->connect->query($select)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data     = $row;
            }
        }
        return $data;
    }

    public function insert_query_subs($month,$value,$student_id,$schoolroom_id) {
        
        $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
        VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
        if ($query = $this->connect->query($insert)) {
            echo "<script>alert('Added only $value')</script>";
            echo "<script>window.location.href='subscriptions.php'</script>";
        }
    }

    public function check_exists_subscription($student_id, $month) {
        $select    = "SELECT value FROM absence WHERE student_id = '$student_id' AND month = '$month' ";
        if ($query = $this->connect->query($select)) {
            $row   = mysqli_fetch_assoc($query);
            if (!empty($row)) {
                return true;
            } else {
                return false;
            }          
        }
    }

    public function insert_subscription() {

        if (isset($_POST['submit'])) {
            if (isset($_POST['month'])         &&
                isset($_POST['value'])          &&
                isset($_POST['student_id'])  &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['month'])         &&
                    !empty($_POST['value'])          &&
                    !empty($_POST['student_id'])  &&
                    !empty($_POST['schoolroom_id'])) {
                        
                    $month         = $_POST['month'];
                    $value         = $_POST['value'];
                    $student_id    = $_POST['student_id'];
                    $schoolroom_id = $_POST['schoolroom_id'];
                    $this->tables  = "subscriptions";
                    $row_sub       = $this->fetch_where($student_id);
                    $row_sum_value = $this->fetch_sum_value($student_id, $month);
                    $sum_value     = $row_sum_value['total'];
                    $this->residual= $this->subscription - $sum_value;
                    $new_value     = $value + $sum_value;
                    $residual_now= $this->subscription - $new_value;
                    if ($value == $this->subscription) {
                        if (!empty($row_sub)) {
                            foreach($row_sub as $row) {
                                $array_month = array($row['month']);
                                if ($student_id == $row['student_id']) {
                                    if (in_array($month, $array_month)) {
                                        if ($this->residual > 0 && $new_value>$residual_now) {
                                            $value = $this->residual;
                                            $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                            VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                            if ($query = $this->connect->query($insert)) {
                                                echo "<script>alert('Added only $value')</script>";
                                                echo "<script>window.location.href='subscriptions.php'</script>";
                                            } elseif ($this->residual == 0) { 
                                                echo "<script>alert('subscriped month $value')</script>";
                                                echo "<script>window.location.href='subscriptions.php'</script>";
                                            }
                                        } else {
                                            echo "<script>alert('subscriped')</script>";
                                        }
                                    }else {
                                        $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                        VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                        if ($query = $this->connect->query($insert)) {
                                            echo "<script>alert('Added only  $value')</script>";
                                            echo "<script>window.location.href='subscriptions.php'</script>";
                                        } else {
                                            echo "<script>alert('subscriped student')</script>";
                                        }                              
                                    }
                                } 
                            } 
                        } else {
                            $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                    VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                    if ($query = $this->connect->query($insert)) {
                                        echo "<script>alert('Added only  $value')</script>";
                                        echo "<script>window.location.href='subscriptions.php'</script>";
                                    } else {
                                        echo "<script>alert('subscriped student')</script>";
                                    }
                        }
                    } elseif ($value > $this->subscription) {
                        echo "<script>alert('$value is more than $this->subscription')</script>";
                        echo "<script>window.location.href='subscriptions.php'</script>";                    }                   
                } else {
                    echo "<script>alert('empty')</script>";
                }
            } else {
                echo "<script>alert('no posts')</script>";
            }
        }
    }

    public function insert_subscription_test() {

        if (isset($_POST['submit'])) {
            if (isset($_POST['month'])          &&
                isset($_POST['value'])          &&
                isset($_POST['student_id'])     &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['month'])          &&
                    !empty($_POST['value'])          &&
                    !empty($_POST['student_id'])     &&
                    !empty($_POST['schoolroom_id'])) {
                    $month         = $_POST['month'];
                    $value         = $_POST['value'];
                    $student_id    = $_POST['student_id'];
                    $schoolroom_id = $_POST['schoolroom_id'];
                    $rows_sub       = $this->fetch_where($student_id);
                    if ($rows_sub) {
                        foreach ($rows_sub as $row_sub) {
                            $months_array[] = $row_sub['month'];
                        }                    
                    } else {
                        $months_array[] = null;
                    }
                    $row_sum_value = $this->fetch_sum_value($student_id, $month);
                    $sum_value     = $row_sum_value['total'];
                    $this->residual= $this->subscription - $sum_value;
                    if (in_array($month, $months_array)) {
                        if ($sum_value == $this->subscription) {
                            echo "<script>alert('تم دفع الشهر مسبقا.$sum_value')</script>";
                        } elseif ($sum_value < $this->subscription) {
                            if ($value > $this->residual) {
                                $value = $this->residual;
                                $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                if ($query = $this->connect->query($insert)) {
                                                    echo "<script>alert('Added only $value')</script>";
                                                    echo "<script>window.location.href='students.php'</script>";
                                                }
                            } elseif ($value <= $this->residual) {
                                $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                if ($query = $this->connect->query($insert)) {
                                                    echo "<script>alert('Added only $value')</script>";
                                                    echo "<script>window.location.href='students.php'</script>";
                                                }
                            }
                        }
                    } else {
                        if ($value > $this->subscription) {
                            $value = $this->subscription;
                            $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                            VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                            if ($query = $this->connect->query($insert)) {
                                                echo "<script>alert('Added only $value')</script>";
                                                echo "<script>window.location.href='students.php'</script>";
                                            }                    
                        } else {
                            $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                            VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                            if ($query = $this->connect->query($insert)) {
                                                echo "<script>alert('Added only $value')</script>";
                                                echo "<script>window.location.href='students.php'</script>";
                                            } 
                        }
                    }                                 
                } else {
                    echo "<script>alert('empty')</script>";
                }
            } else {
                echo "<script>alert('no posts')</script>";
            }
        } 
    }

    public function insert_all_sub() {
        $data = $_POST;
        if (isset($_POST['submit_all'])) {
            if (isset($_POST['month'])          &&
                isset($_POST['value'])          &&
                isset($_POST['student_id'])     &&
                isset($_POST['schoolroom_id'])) {
                if (!empty($_POST['month'])          &&
                    !empty($_POST['value'])          &&
                    !empty($_POST['student_id'])     &&
                    !empty($_POST['schoolroom_id'])) {
                        foreach ($_POST['student_id'] as $key => $array_value) {
                        $month         = $_POST['month'][$key];
                        $value         = $_POST['value'][$key];
                        $student_id    = $_POST['student_id'][$key];
                        $schoolroom_id = $_POST['schoolroom_id'][$key];
                        $data[]          = $array_value;
                        $rows_sub       = $this->fetch_where($student_id);
                        if ($rows_sub) {
                            foreach ($rows_sub as $row_sub) {
                                $months_array[] = $row_sub['month'];
                            }                    
                        } else {
                            $months_array[] = null;
                        }
                        $row_sum_value = $this->fetch_sum_value($student_id, $month);
                        $sum_value     = $row_sum_value['total'];
                        $this->residual= $this->subscription - $sum_value;
                        if (in_array($month, $months_array)) {
                            if ($sum_value == $this->subscription) {
                                echo "<script>alert('تم دفع الشهر مسبقا.$sum_value')</script>";
                            } elseif ($sum_value < $this->subscription) {
                                if ($value > $this->residual) {
                                    $value = $this->residual;
                                    $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                    VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                    if ($query = $this->connect->query($insert)) {
                                                        echo "<script>alert('Added only $value')</script>";
                                                        echo "<script>window.location.href='students.php'</script>";
                                                    }
                                } elseif ($value <= $this->residual) {
                                    $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                    VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                    if ($query = $this->connect->query($insert)) {
                                                        echo "<script>alert('Added only $value')</script>";
                                                        echo "<script>window.location.href='students.php'</script>";
                                                    }
                                }
                            }
                        } else {
                            if ($value > $this->subscription) {
                                $value = $this->subscription;
                                $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                if ($query = $this->connect->query($insert)) {
                                                    echo "<script>alert('Added only $value')</script>";
                                                    echo "<script>window.location.href='students.php'</script>";
                                                }                    
                            } else {
                                $insert = "INSERT INTO $this->tables ( month, value, student_id, schoolroom_id ) 
                                                VALUES ( '$month', '$value', '$student_id', '$schoolroom_id' )";
                                                if ($query = $this->connect->query($insert)) {
                                                    echo "<script>alert('Added only $value')</script>";
                                                    echo "<script>window.location.href='students.php'</script>";
                                                } 
                            }
                        }
                    }                                 
                } else {
                    echo "<script>alert('empty')</script>";
                }
            } else {
                echo "<script>alert('no posts')</script>";
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





}