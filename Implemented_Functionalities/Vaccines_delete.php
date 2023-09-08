<?php
include_once 'config.php';
if(isset($_GET['deleteType'])){
    $deleteType = $_GET['deleteType'];

    $sql = "DELETE from Vaccines WHERE v_type= '" . $deleteType ."'";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:Vaccines.php');
    }else{
        die(mysqli_error($con));
    }
}
?>