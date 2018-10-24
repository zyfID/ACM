<?php
/**
 * Created by PhpStorm.
 * User: zyf-PC
 * Date: 2018/6/21
 * Time: 11:37
 */


$now=strftime("%Y-%m-%d %H:%M",time());


$id=$_POST['problem_id'];     //problem__id即题目id

$language=$_POST['language'];
//$source_user1=$_POST['source'];
//$source_user=str_replace('\n',"\\\\n",$source_user1);
$source_user = $_POST['source'];

$sample_input=$_POST['sample_input'];	//测试数据
$number=$_POST['number'];

$user_id=$number;         //用户学号
$ip=$_POST['ip'];


$con = mysqli_connect("localhost","root","***","***");
if (!$con)
{
    die('Could not connect:'.mysqli_error());
}else
{
   // echo "connect success <br />";
}

$query="INSERT INTO `solution`(`problem_id`,`user_id`,`in_date`,`language`,`result`,`ip`) VALUES('$id','$user_id','$now','$language','14','$ip')";
mysqli_query($con,$query);

$query="select solution_id from solution";
$result=mysqli_query($con,$query);
$num_results=$result->num_rows;

//echo $num_results;
//echo "<br>";
for ($i=0; $i < $num_results; $i++) {
    $row = $result->fetch_assoc();     //从结果集中取得一行作为关联数�?
    $solution_id=$row['solution_id'];       //返回solution_id
}
//echo $solution_id;

$source_user = mysqli_real_escape_string($con,$source_user);
$query="INSERT INTO `source_code_user`(`solution_id`,`source`) VALUES('$solution_id','$source_user')";
$result=mysqli_query($con,$query);          //source_code_user表插�?
if (!$result)
{
    echo "fail: <br>".mysqli_error($con);
    exit(0);
}
$query="INSERT INTO `source_code`(`solution_id`,`source`) VALUES('$solution_id','$source_user')";
$result=mysqli_query($con,$query);            //source_code表插�?
if (!$result)
{
    die("fail").mysqli_error($con);
    exit(0);
}
$query="INSERT INTO `custominput`(`solution_id`,`input_text`) VALUES('$solution_id','$sample_input')";
$result=mysqli_query($con,$query);
$query="update `solution` set ip='127.0.0.1' where `solution_id`='$solution_id'";
$result=mysqli_query($con,$query);
$query="update `solution` set `result`='0' where `solution_id`='$solution_id'";
$result=mysqli_query($con,$query);
sleep(2.5);

//header("location:http://acm.gailvlunpt.com/acm/status.php&user_id=$user_id");
require_once("./acm/status.php");
//echo $source_user;
//exit;



?>