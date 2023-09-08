<!DOCTYPE html>
<?php
include_once('config.php');
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<title> Vaccinated Information</title>

    <script>
        function confirmDelete(item_name1, item_name2) {
            return confirm("Are you sure you want to delete \"" + item_name1 + "\" vaccinated on \"" + item_name2 + "\"?");
        }
    </script>

</head>

<body>
    <div class="container my-5">
        <h1> Vaccinated </h1>
        <button class="btn btn-light">
            <a href="index.php">Home</a>
        </button>
        <br><br>
        <button class="btn btn-primary">
            <a href="vaccinated_add.php" class='text-light'>Report New Vaccinated Information</a>
        </button>

        <table class="table">
            <thead>
                <tr>
				<th scope="col"> Dose Number </th>
                    <th scope="col"> Vaccinated Date </th>
                    <th scope="col"> Facility Name(Vaccinated Location) </th>
                    <th scope="col"> Facility Address </th>
                    <th scope="col"> Medicare Card Number </th>
                    <th scope="col"> Vaccine Type </th>                 
                    <th scope="col"> Actions </th>
                </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM vaccinated ORDER BY vaccinated_date";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
					$dose_num = $row["dose_num"];
                    $vaccinated_date = $row["vaccinated_date"];
                    $f_name = $row["f_name"];
                    $f_address = $row["f_address"];
                    $medicare_num = $row["medicare_num"];
                    $v_type = $row["v_type"];
					echo ' <tr>

			            <td>' . $dose_num . '</td>
            <td>' . $vaccinated_date . '</td>
            <td>' . $f_name . '</td>
            <td>' . $f_address . '</td>
            <td>' . $medicare_num . '</td>
            <td>' . $v_type . '</td>
			<td>
				<button class ="btn btn-primary"><a href="vaccinated_update.php?updateMedicareNum=' . $medicare_num . '&updateVaccinatedDate=' . $vaccinated_date . '" class="text-light">Update</a></button>
				<button class ="btn btn-danger" ><a href="vaccinated_delete.php?deleteMedicareNum=' . $medicare_num . '&deleteVaccinatedDate=' . $vaccinated_date . '" class="text-light" 
            onclick="return confirmDelete(\'' . $medicare_num . '\',\''. $vaccinated_date . '\')">Delete</a></button>

			</td>
			</tr>';
                }
            }
            mysqli_close($con);
            ?>
    </div>

</body>

</html>
