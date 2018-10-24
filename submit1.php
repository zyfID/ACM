<?php

$now = strftime("%Y-%m-%d %H:%M");

$id = $_POST['problem_id'];
$language = 0;
$source_user = $_POST['source'];
echo $source_user;

preg_replace("/\/","\\\\",$source_user);
echo "<br>";
echo $source_user;

$sample_input = $_POST['sample_input'];
$sample_output = $_POST['sample_output'];
$number = $_POST['number'];
$user_id = $number;

//连接数据库
$con = new mysqli('localhost','admin','***','***','3306');

if (!$con)
{
    die('can not connect');
}
else
    echo 'success';


//将传送来的代码插入数据库
$sql = "insert into solution(problem_id,user_id,in_date,language,result) values('$id','$user_id','$now','$language','14')";
$result = $con->query($sql);
$sql = "select solution_id from solution";
$result = $con->query($sql);
$num_result = $result->num_rows;

for ($i=0; $i<$num_result; $i++)
{
    $row = $result->fetch_assoc();
    $solution_id = $row['solution_id'];
}

$sql = "insert into source_code_user(solution_id,source) values('$solution_id','$source_user')";
$con->query($sql);
$sql = "insert into source_code(solution_id,source) values('$solution_id','$source_user')";
$con->query($sql);
$sql = "update solution set result='0' where soulution_id = '$solution_id'";

sleep(1.5);
require_once ("./acm/status.php");
?>