<?php
/**
 * Created by PhpStorm.
 * User: zyf-PC
 * Date: 2018/6/9
 * Time: 14:55
 */

$con = mysqli_connect("localhost","root","***","***");
if (!$con)
{
    die('could not connect'.mysqli_error());
}else
{
    echo 'connect success <br>';
}

$now = strftime("%Y-%m-%d %H:%M",time());

//$sql = "insert into solution(problem_id,user_id,in_date,language,result,ip) VALUES ('1000','111','$now','0','14','127.0.0.1')";
//$result = mysqli_query($con,$sql);
//if ($result)
//{
//    echo "插入成功";
//}else
//{
//    echo '插入失败<br>'.mysqli_error($con);
//}

$sql = "select * from solution where solution_id='102651'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($query);
$result = $result['pass_rate'];
echo $result;

?>