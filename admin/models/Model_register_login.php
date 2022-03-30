<?php
class Model_register_login extends Model_for_all {

    public function register($username, $phone, $password, $confirm_password, $email) {
        if (isset($_POST['register_btn'])) {
            if (isset($_POST['username'])          &&
                isset($_POST['phone'])             &&
                isset($_POST['password'])          &&
                isset($_POST['confirm_password'])  &&
                isset($_POST['email'])) {
                if (!empty($_POST['username'])         &&
                    !empty($_POST['phone'])            &&
                    !empty($_POST['password'])         &&
                    !empty($_POST['confirm_password']) &&
                    !empty($_POST['email']) ) {
                        $username  = $_POST['username'];
                        $phone  = $_POST['phone']; 
                        $password  = $_POST['password']; 
                        $confirm_password  = $_POST['confirm_password']; 
                        $email     = $_POST['email'];
                        if (!$this->exists_user($phone)) {
                            if ($this->confirm_passwor($password, $confirm_password)) {
                                $insert = "INSERT INTO teachers (username, phone, password, email) VALUES ('$username', '$phone', '$password', '$email')";
                                if ($query = $this->connect->query($insert)) {
                                    echo "<script>alert('success')</script>";
                                    echo "<script>window.location.href='login.php'</script>";
                                } else {
                                    echo "<script>alert('subscriped student')</script>";
                                }
                            } else {
                                echo "<script>alert('passwords dose not match')</script>";
                            }
                        } else {
                            echo "<script>alert('exists phone')</script>";
                        }
                } else {
                    echo "<script>alert('no posts')</script>";
                }
            }
        }
    }

    public function admin_privilege($privilege) {
        $select_email = "SELECT privilege FROM teachers WHERE privilege = '$privilege' ";
        if ($query = $this->connect->query($select_email)) {
            return true;
        } else {
            return false;
        }
    }

    public function exists_user($phone) {
        $select_email = "SELECT phone FROM teachers WHERE phone = '$phone' ";
        if ($query = $this->connect->query($select_email)) {
            if ($query->num_rows > 0 ) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function confirm_passwor($password, $confirm_password) {  
        if ($password == $confirm_password) {
            return true;
        } else {
            return false;
        } 
}

    public function login($username, $password) {
        if (isset($_POST['login_btn'])) {
            $username  = $_POST['username'];
            $password  = $_POST['password']; 
            $select =  "SELECT * FROM teachers WHERE username = '$username' AND password = '$password'";
            
            if ($query = $this->connect->query($select)) {
                $user  = mysqli_fetch_assoc($query);
                    if ($query->num_rows > 0 ) {
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    header("location:students.php");
                    } else {
                        header("location:login.php");
                    }
                    echo "<script>alert('login')</script>";
                    echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('no query')</script>";
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

		echo "<script>alert('logout')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }



    //END OF Model_register_login CLASS
}