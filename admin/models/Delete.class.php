<?php
    require 'Model_for_all';
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
