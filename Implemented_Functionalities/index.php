<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>HFESTS</title>
</head>
<?php
include_once('config.php');
?>

<body>
    <div class="container my-3">
        <h1>Health Facility Employee Status Tracking System</h1>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="Employee_Display.php" class="nav-link active" aria-current="page" href="#">Employee</a>
            </li>
            <li class="nav-item">
                <a href="facility.php" class="nav-link" href="#">Facility</a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="Vaccines.php" class="nav-link" href="#">Vaccines</a>
            </li>
            <li class="nav-item">
                <a href="vaccinated.php" class="nav-link" href="#">Vaccinated</a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="infected.php" class="nav-link" href="#">Infected</a>
            </li>
            <li class="nav-item">
                <a href="infection.php" class="nav-link" href="#">Infections</a>
            </li>
            <li class="nav-item">
                <a href="COVID-19.php" class="nav-link" href="#">COVID-19 INFO</a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="working.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Manage working status</a>
            </li>
            <li class="nav-item">
                <a href="schedule.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Schedule</a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="log_given_facility.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true"> Email Log</a>
            </li>
            <hr>
        </ul>

        <h3>More queries</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
            <a href="simpleQuery.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Simple Query Generator</a>
            </li>
            <hr>
            <li class="nav-item">
            <a href="query_11.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Doctors and nurses working in past 2 weeks</a>
            </li>
            <hr>
            <li class="nav-item">
            <a href="query_12.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Total hours of working</a>
            </li>
            <hr>
            <li class="nav-item">
            <a href="query14.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Doctors currently working in a Province</a>
            </li>
            <hr>
            <li class="nav-item">
            <a href="query15.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">Nurses who are currently working and has the highest number of hours scheduled</a>
            </li>
        <ul>
        <?php mysqli_close($con); ?>

    </div>
</body>

</html>