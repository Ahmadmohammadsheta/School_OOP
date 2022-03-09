<?php
    require 'Model_students.php';
    $model  = new Model_students();
    $model->tables  ='students';
    $id     = $_REQUEST['id'];
    $delete = $model->delete($id);
    if ($delete) {
        echo "<script>alert('deleted succsessfully')</script>";
        echo "<script>window.location.href='../students.php'</script>";
    } else {
        echo "<script>alert('did not deleted')</script>";
        echo "<script>window.location.href='../students.php'</script>";
    }
