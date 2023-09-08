<!DOCTYPE html>
<?php
include_once('config.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report New Vaccinated Information </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
    </svg>

    <div class="container my-5">
        <h1>Report New Vaccinated Information</h1>

        <form method="post">
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Dose Number : </label>
                <input type="text" class="form-control" name="dose_num" size="20">
            </div>
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Vaccinated Date : </label>
                <input type="text" class="form-control" name="vaccinated_date" size="20">
            </div>
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Facillity Name : </label>
                <input type="text" class="form-control" name="f_name" size="20">
            </div>
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Facility Address : </label>
                <input type="text" class="form-control" name="f_address" size="20">
            </div>
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Medicare Card : </label>
                <input type="text" class="form-control" name="medicare_num" size="20">
            </div>
            <div class="row mb-3 my-5">
                <label class="col-sm-3 col-form-label">Vaccine Type : </label>
                <input type="text" class="form-control" name="v_type" size="20">
            </div>

            <div class="row mb-3 my-5">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="vaccinated.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {

        $dose_num = $_POST["dose_num"];
        $vaccinated_date =  $_POST["vaccinated_date"];
        $f_name = $_POST["f_name"];
        $f_address = $_POST['f_address'];
        $medicare_num = $_POST['medicare_num'];
        $v_type =  $_POST["v_type"];

        if (!empty($dose_num) && !empty($vaccinated_date) && !empty($f_name) && !empty($f_address) &&!empty($medicare_num) &&!empty($v_type)) {
            $sql = "INSERT INTO vaccinated
                    VALUES ('$dose_num','$vaccinated_date','$f_name','$f_address','$medicare_num', '$v_type')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('New vaccinated information is successfully added')</script>";
            } else {
                echo mysqli_error($con);
            }
      
        }

    }

    ?>
</body>

</html>