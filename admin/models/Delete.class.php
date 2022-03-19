<?php
    require 'Model_for_all.php';
    $model  = new Modal_for_all();
    $table  = $_GET['table'];
    // $model->tables  = $table;
    $id     = $_REQUEST['id'];
    $delete = $model->delete($table, $id);

    if ($delete) {
        echo "<script>alert('deleted succsessfully')</script>";
        echo "<script>window.location.href='../students.php'</script>";
    } else {
        // echo "<script>alert('$table $id')</script>";
        // echo "<script>alert('did not deleted')</script>";
        // echo "<script>window.location.href='../students.php'</script>";
    }




