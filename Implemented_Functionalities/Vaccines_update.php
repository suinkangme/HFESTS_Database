<?php
include('config.php');

$v_type = $_GET['updateType'];



$sql = "SELECT * from Vaccines where v_type = '$v_type'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$v_type = $row['v_type'];

if (isset($_POST["submit"])) {

    $new_v_type = $_POST['v_type'];
   

    $sql_update = "UPDATE Vaccines SET 
                    v_type = '$new_v_type'
                    WHERE v_type = '$v_type'";
    $result = mysqli_query($con, $sql_update);

    if ($result) {
        echo "<script>alert('vaccine type is successfully updated')</script>";
    } else {
        echo $endDate . "==========";

        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Update Vaccine Type</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Vaccine Type:</label>
                <input type="text" class="form-control" name="v_type" value="<?php echo $v_type; ?>">
            </div>

            <div class="row mb-3 my-5">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Update the information</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="Vaccines.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>