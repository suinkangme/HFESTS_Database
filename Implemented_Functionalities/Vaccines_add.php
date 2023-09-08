<!DOCTYPE html>
<?php
include_once('config.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Add New Vaccine Type </title>
</head>

<body>
    <div class = "container my-5">
        <form method = "post">
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-label"> Vaccine Type :</label>
                <input type="text" class = "form-control" name = "v_type">
            </div>
            <div class = "row mb-3 my-5">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                <button type = "submit" class ="btn btn-primary" name = "submit"> Add a new vaccine type </button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class ="btn btn-outline-primary" href="Vaccines.php" role = "button"> Cancel </a>
                </div>
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['submit']))

        $v_type =  $_POST["v_type"];

        //check if any of the values are empty or null before constructing the SQL query
        if (!empty($v_type)) {
            $sql = "INSERT INTO Vaccines
                    VALUES ('$v_type')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Vaccine type is successfully added!')</script>";
            } 
            else {
                die(mysqli_error($con));
            }   
 
        }         
    ?>
</body>
</html>

