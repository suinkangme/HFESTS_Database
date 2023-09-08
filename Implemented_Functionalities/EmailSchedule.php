<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<title>Document</title>
</head>

<body>
	<div class="container my-5">
		<h3>Send email about schedule</h3><br><br>
		<div class="offset-sm-3 col-sm-3 d-grid">
			<button type="submit" class="btn btn-primary" name="submit3">Send a schedule for week 3</button>
		</div><br><br>
		<div class="offset-sm-3 col-sm-3 d-grid">
			<button type="submit" class="btn btn-primary" name="submit4">Send a schedule for week 4</button>
		</div><br><br>
		<a class="btn btn-outline-primary" href="log_given_facility.php" role="button">Cancel</a>
	</div>
</body>
<?php
include('config.php');

$sql3 = "
DELIMITER $$
DROP PROCEDURE IF EXISTS ScheduleLog;
CREATE PROCEDURE ScheduleLog()
BEGIN
DECLARE sent_date DATE DEFAULT '2023-03-19';
DECLARE monday DATE DEFAULT '2023-03-20';

	WHILE sent_date <= '2023-03-19' DO     
    INSERT INTO log
        SELECT sent_date, w.fName, w.fAddress, w.MedicareCardNumber, e.email,        
			CONCAT(w.fName, ' Schedule for ', 
					  DATE_FORMAT(monday, '%W %D %M %Y'), ' to ', 
					  DATE_FORMAT(DATE_ADD(monday, INTERVAL 7 DAY), '%W %D %M %Y')) AS subject,
			  substring( CONCAT('Facility Name: ', w.fName, '\n',
					  'Address: ', w.fAddress, '\n',
					  'Employee Name: ', e.firstName, ' ', e.lastName, '\n',
					  'Email Address: ', e.email, '\n\n',
					  'Schedule for the Coming Week:\n',
					  IFNULL(GROUP_CONCAT(DISTINCT
							 CONCAT(DATE_FORMAT(s.Date, '%W'), ': ', 
									IFNULL(TIME_FORMAT(s.startTime, '%h:%i %p'), 'No Assignment'), ' - ', 
									IFNULL(TIME_FORMAT(s.endTime, '%h:%i %p'), 'No Assignment')) 
									ORDER BY s.Date SEPARATOR '\n'), 'No Schedule')),1,80) AS body
		FROM working w
			JOIN Employee e ON w.MedicareCardNumber = e.MedicareCardNumber
			LEFT JOIN schedule s ON w.fName = s.Fname AND w.MedicareCardNumber = s.MedicareCardNumber
		WHERE s.date BETWEEN monday AND DATE_ADD(monday, INTERVAL 7 DAY)
		GROUP BY w.fName, w.fAddress, e.firstName, e.lastName, e.email;
	
	   SET sent_date = date_add(sent_date, INTERVAL 7 DAY);
       SET monday = date_add(monday, INTERVAL 7 DAY);
	END WHILE;
END; $$
DELIMITER ;

call ScheduleLog(); 
";

//last week, for demo
$sql4 = "
DELIMITER $$
DROP PROCEDURE IF EXISTS ScheduleLog;
CREATE PROCEDURE ScheduleLog()
BEGIN
DECLARE sent_date DATE DEFAULT '2023-03-26';
DECLARE monday DATE DEFAULT '2023-03-27';
	WHILE sent_date <= '2023-03-26' DO     
    INSERT INTO log
        SELECT sent_date, w.fName, w.fAddress, w.MedicareCardNumber, e.email,        
			CONCAT(w.fName, ' Schedule for ', 
					  DATE_FORMAT(monday, '%W %D %M %Y'), ' to ', 
					  DATE_FORMAT(DATE_ADD(monday, INTERVAL 7 DAY), '%W %D %M %Y')) AS subject,
			  substring( CONCAT('Facility Name: ', w.fName, '\n',
					  'Address: ', w.fAddress, '\n',
					  'Employee Name: ', e.firstName, ' ', e.lastName, '\n',
					  'Email Address: ', e.email, '\n\n',
					  'Schedule for the Coming Week:\n',
					  IFNULL(GROUP_CONCAT(DISTINCT
							 CONCAT(DATE_FORMAT(s.Date, '%W'), ': ', 
									IFNULL(TIME_FORMAT(s.startTime, '%h:%i %p'), 'No Assignment'), ' - ', 
									IFNULL(TIME_FORMAT(s.endTime, '%h:%i %p'), 'No Assignment')) 
									ORDER BY s.Date SEPARATOR '\n'), 'No Schedule')),1,80) AS body
		FROM working w
			JOIN Employee e ON w.MedicareCardNumber = e.MedicareCardNumber
			LEFT JOIN schedule s ON w.fName = s.Fname AND w.MedicareCardNumber = s.MedicareCardNumber
		WHERE s.date BETWEEN monday AND DATE_ADD(monday, INTERVAL 7 DAY)
		GROUP BY w.fName, w.fAddress, e.firstName, e.lastName, e.email;
	
	   SET sent_date = date_add(sent_date, INTERVAL 7 DAY);
       SET monday = date_add(monday, INTERVAL 7 DAY);
	END WHILE;
END; $$
DELIMITER ;

call ScheduleLog();
";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['submit3'])) {
		$result3 = mysqli_query($con, $sql3);
		if ($result3) {
			echo "<script>alert('Schedule is successfully sent')</script>";
		} else {
			die(mysqli_error($con));
		}
	}


	if (isset($_POST['submit4'])) {
		$result4 = mysqli_query($con, $sql4);
		if ($result4) {
			echo "<script>alert('Schedule is successfully sent')</script>";
		} else {
			die(mysqli_error($con));
		}
	}
}
?>