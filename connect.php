<?php


$con=mysqli_connect("","","","","");//阿里云

if (!$con)
{
    die("could not connect").mysqli_error($con);
}

 return $con;
?>