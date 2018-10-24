<?php


$con=mysqli_connect("","","","","");//阿里云

if (!$con)
{
    die('can not connect').mysqli_error($con);
}
// else
//     echo "数据库连接成功";

// $sql = "truncate table problem";
//$con->query($sql);


// $sql = "select * from problem";
// $result = $con->query($sql);
//
// $row = $result->fetch_assoc();
// $title = $row['title'];
// echo $title;

// $sql = "insert into problem (title) VALUES ('这是标题')";
// //$result = mysqli_query($con,$sql);
// $result = $con->query($sql);
// if (!$result)
// {
//     echo "插入数据失败";
// }else
//     echo "插入数据成功";

return $con;
?>