<?php

//获取要删除的题目编号
$pid = $_GET['problem_id'];
//echo $pid;

$message1 = "删除题目".$pid."成功";
$message2 = "删除题目".$pid."失败";

//连接数据库
$con = include 'connect.php';
mysqli_query($con,'set names utf8');


//删除题目
$sql1 = "DELETE FROM `problem` WHERE `problem_id`=$pid";
$query = mysqli_query($con,$sql1);

//确认是否删除成功
$sql2 = "SELECT * FROM `problem` WHERE `problem_id`=$pid";
$result = mysqli_query($con,$sql2);
$result = mysqli_fetch_assoc($result);
//var_dump($result);
if (!$result)
{
    //echo "删除".$pid."题目成功";
    echo "<script language='JavaScript'>alert('{$message1}');location.href='problem_list.php';</script>";
}else
{
    //echo "删除".$pid."题目失败".mysqli_error($con);
    echo "<script language='JavaScript'>alert('{$message2}');location.href='problem_list.php';</script>";
}

?>