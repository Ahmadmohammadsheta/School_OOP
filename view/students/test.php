<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
    require '../../models/Model_students.php';
    $model  = new Model_students();
    $model->tables = 'students';
    $insert = $model->insert();
?>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="age" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="mother_name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="schoolroom_id" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" name="mother_phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>