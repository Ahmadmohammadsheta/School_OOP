<?php
    require 'Model_for_all.php';
    $model  = new Model_for_all();
    // $model->tables  = $table;
    $table_id = $_GET['table_id'];
    $id     = $_REQUEST['id'];
    $table  = $_GET['table'];
    $delete = $model->delete($table, $table_id, $id);

    if ($delete) {
        echo "<script>alert('deleted succsessfully')</script>";
        echo "<script>window.location.href='../students.php'</script>";
    } else {
        echo "<script>alert('did not deleted')</script>";
        echo "<script>window.location.href='../students.php'</script>";
    }




