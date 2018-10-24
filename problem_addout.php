<?php

//此文件为单独添加题目时调用的脚本

header("Content-Type:text/html;charset=utf-8");

$title = $_POST['title'];
$time_limit = 1;
$memory_limit = 128;
$description = $_POST['description'];
$input = $_POST['input'];
$output = $_POST['output'];
$sample_input = $_POST['sample_input'];
$sample_output = $_POST['sample_output'];
$test_input1 = $_POST['test_input1'];
$test_output1 = $_POST['test_output1'];
$test_input2 = $_POST['test_input2'];
$test_output2 = $_POST['test_output2'];
$test_input3 = $_POST['test_input3'];
$test_output3 = $_POST['test_output3'];
$test_input4 = $_POST['test_input4'];
$test_output4 = $_POST['test_output4'];
$hint = '';//题目描述，这里设置空
$source = '';
$spj = '0';

$OJ_DATA = "/home/judge/data";//Linux上存放测试数据的路径
//$OJ_DATA = "F:/work/ACM/editAPI/data";//本地测试用

if (get_magic_quotes_gpc())
{
    $title = stripcslashes($title);
    $time_limit = stripcslashes($time_limit);
    $memory_limit = stripcslashes($memory_limit);
    $description = stripcslashes($description);
    $input = stripcslashes($input);
    $output = stripcslashes($output);
    $sample_input = stripcslashes($sample_input);
    $sample_output = stripcslashes($sample_output);
    $test_input1 = stripcslashes($test_input1);
    $test_output1 = stripcslashes($test_output1);
    $test_input2 = stripcslashes($test_input2);
    $test_output2 = stripcslashes($test_output2);
    $hint = stripcslashes($hint);
    $source = stripcslashes($source);
    $spj = stripcslashes($spj);
}

//$con = include "./connect.php";

$con = mysqli_connect('localhost','root','zyf123','jol');
if (!$con)
{
    echo "can not cannect database".mysqli_error($con);
}

mysqli_query($con,'set names utf8');

//防止特殊字符插入数据库错误
$title = mysqli_real_escape_string($con,$title);
$description = mysqli_real_escape_string($con,$description);
$input = mysqli_real_escape_string($con,$input);
$output = mysqli_real_escape_string($con,$output);

//插入数据库中和写入测试例文件中的内容要区分开，写入测试例文件的内容不能用次函数处理
$sample_inputinser = mysqli_real_escape_string($con,$sample_input);
$sample_outputinser = mysqli_real_escape_string($con,$sample_output);

$sql = "INSERT INTO `problem` (`title`,`time_limit`,`memory_limit`,`description`,`input`,`output`,`sample_input`,
        `sample_output`,`hint`,`source`,`spj`,`in_date`,`defunct`) VALUES ('$title','$time_limit',
        '$memory_limit','$description','$input','$output','$sample_inputinser','$sample_outputinser','$hint',
        '$source','$spj',NOW(),'N')";

//$sql = "INSERT INTO problem (title,time_limit,memory_limit,description,input,output,sample_input,sample_output,
//        ,test_input,test_output,)";

$result = mysqli_query($con,$sql);
echo "<br>";
if (!$result)
{
    echo "添加题目失败".mysqli_error($con);
}else
{
    echo "添加题目成功";
}

echo "<br>";

//获取插入题目的序号，依次作为存放测试例的文件夹名称
$sql = "select * from problem where title = '$title'";
$result = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($result);
$pid = $result['problem_id'];

//echo $sample_input;
echo "<br>";
echo "添加题目编号是:".$pid;
echo "<br>";
//exit(0);

//创建存放测试数据的文件夹以及文件
$basedir = "$OJ_DATA/$pid";//本地windows测试用
mkdir($basedir);

if (strlen($sample_output) && !strlen($sample_input)) $sample_input = "0";
if (strlen($sample_input)) mkdata($pid,'sample.in',$sample_input);
if (strlen($sample_output)) mkdata($pid,'sample.out',$sample_output);

if (strlen($test_output1) && !strlen($test_input1)) $test_input1 = "0";
if (strlen($test_input1)) mkdata($pid,'test1.in',$test_input1);
if (strlen($test_output1)) mkdata($pid,'test1.out',$test_output1);


if (strlen($test_input2) && strlen($test_output2))
{
    if (strlen($test_output2) && !strlen($test_input2)) $test_input2 = "0";
    if (strlen($test_input2)) mkdata($pid,'test2.in',$test_input2);
    if (strlen($test_output2)) mkdata($pid,'test2.out',$test_output2);
}

if (strlen($test_input3) && strlen($test_output3))
{
    if (strlen($test_output3) && !strlen($test_input3)) $test_input3 = "0";
    if (strlen($test_input3)) mkdata($pid,'test3.in',$test_input3);
    if (strlen($test_output3)) mkdata($pid,'test3.out',$test_output3);
}

if (strlen($test_input4) && strlen($test_output4))
{
    if (strlen($test_output4) && !strlen($test_input4)) $test_input4 = "0";
    if (strlen($test_input4)) mkdata($pid,'test4.in',$test_input4);
    if (strlen($test_output4)) mkdata($pid,'test4.out',$test_output4);
}




//创建存放测试数据的文件
function mkdata($pid,$filename,$input)
{
    $basedir1 = "/home/judge/data/$pid";

    $fp = @fopen($basedir1."/$filename","w");
    if ($fp)
    {
        fputs($fp,preg_replace("(\r\n)","\n",$input));
        fclose($fp);
    }else
    {
        echo "Error while opening".$basedir1."/$filename";
    }
}

?>