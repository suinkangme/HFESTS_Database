<?php
include('config.php');

$updateMedicareNum= $_GET['updateMedicareNum'];
$updateVaccinatedDate= $_GET['updateVaccinatedDate'];

$sql = "SELECT * from vaccinated where medicare_num= '" . $updateMedicareNum. "' AND vaccinated_date= '". $updateVaccinatedDate ."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$dose_num =  $row["dose_num"];
$vaccinated_date =  $row["vaccinated_date"];
$f_name =  $row["f_name"];
$f_address =  $row["f_address"];
$medicare_num =  $row["medicare_num"];
$v_type =  $row["v_type"];

if (isset($_POST["submit"])) {

    $dose_num =  $_POST["dose_num"];
    $vaccinated_date =  $_POST["vaccinated_date"];
    $f_name =  $_POST["f_name"];
    $f_address =  $_POST["f_address"];
    $medicare_num =  $_POST["medicare_num"];
    $v_type =  $_POST["v_type"];

    
        $sql_update = "UPDATE vaccinated SET
                    dose_num = '$dose_num',vaccinated_date = '$vaccinated_date',f_name= '$f_name', f_address= '$f_address',medicare_num = '$medicare_num',v_type = '$v_type'
                    where medicare_num= '" . $updateMedicareNum. "' AND vaccinated_date= '". $updateVaccinatedDate ."'";
        $result = mysqli_query($con, $sql_update);

        if ($result) {
            echo "<script>alert('vaccinated information is successfully updated')</script>";
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

    <title> Update Vaccinated Information </title>
</head>

<body>
    <div class = "container my-5">
        <form method = "post">
             <div class="form-group">
                <label> Dose number: </label>
                <input type="text" class = "form-control" name = "dose_num" value = "<?php echo $dose_num;?>"> 
            </div>
            <div class="form-group">
                <label> Vaccinate Date: </label>
                <input type="text" class = "form-control" name = "vaccinated_date" value = "<?php echo $vaccinated_date;?>"> 
            </div>
            <div class="form-group">    
                <label>Facility Name:</label>
                <input type="text" class = "form-control" name = "f_name" value = "<?php echo $f_name;?>">
            </div>
            <div class="form-group">
                <label>Facility Address: </label>
                <input type="text" class = "form-control" name = "f_address" value = "<?php echo $f_address;?>">
            </div>
            <div class="form-group">
                <label> Medicare Card Number: </label>
                <input type="text" class = "form-control" name = "medicare_num" value = "<?php echo $medicare_num;?>"> 
            </div>
            <div class="form-group">
                <label> Vaccine Type: </label>
                <input type="text" class = "form-control" name = "v_type" value = "<?php echo $v_type;?>"> 
            </div>

            <div class = "row mb-3 my-5">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                <button type = "submit" class ="btn btn-primary" name = "submit">Update the Table</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class ="btn btn-outline-primary" href="vaccinated.php" role = "button"> Cancel </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
