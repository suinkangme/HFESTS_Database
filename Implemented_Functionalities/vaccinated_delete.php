<?php
include_once 'config.php';

if(isset($_GET['deleteMedicareNum']) && isset($_GET['deleteVaccinatedDate'])){
    $deleteMedicareNum= $_GET['deleteMedicareNum'];
    $deleteVaccinatedDate= $_GET['deleteVaccinatedDate'];
    
    $sql = "DELETE FROM vaccinated WHERE medicare_num= '" . $deleteMedicareNum. "' AND vaccinated_date= '". $deleteVaccinatedDate ."'";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:vaccinated.php');
    }else{
        die(mysqli_error($con));
    }
}
?>
