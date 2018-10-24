<?php
//此文件为新浪云编辑题目使用脚本，存放在阿里云上使用

header("Content-Type:text/html;charset=utf-8");

$pid = $_POST['problem_id'];
//echo $pid;
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
$hint = '';//题目描述，这里设置空
$source = '';
$spj = '0';

$OJ_DATA = "/home/judge/data/".$pid;//Linux上存放测试数据的路径
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

$con = mysqli_connect('localhost','root','zyf123','jol');
//$con = include 'connect.php';
if (!$con)
{
    die('could not connect').mysqli_error($con);
}
mysqli_query($con,'set names utf8');

//防止特殊字符插入数据库错误
$title = mysqli_real_escape_string($con,$title);
$description = mysqli_real_escape_string($con,$description);
$input = mysqli_real_escape_string($con,$input);
$output = mysqli_real_escape_string($con,$output);
$sample_inputinser = mysqli_real_escape_string($con,$sample_input);
$sample_outputinser = mysqli_real_escape_string($con,$sample_output);
//echo $sample_inputinser;
//echo "<br>";
//echo $sample_outputinser;
//exit(0);

$sql = "UPDATE `problem` SET `title`='{$title}',`description`='{$description}',`input`='{$input}',`output`='{$output}',
        `sample_input`='{$sample_inputinser}',`sample_output`='{$sample_outputinser}',`in_date`=NOW() WHERE `problem_id`='{$pid}'";
$query = mysqli_query($con,$sql) or die(mysqli_query($con,$sql));


//修改样例输入、输出对应的测试例文件
$basedir = "/home/judge/data/".$pid;
//echo $basedir."<br>";
//exit(0);

if ($sample_input&&file_exists($basedir."/sample.in"))
{
    //echo "<br>"."是否进入循环";
    //echo $sample_input."<br>";

    $fp = fopen($basedir."/sample.in","w");
    if ($fp)
    {
        fputs($fp,preg_replace("(\r\n)","\n",$sample_input));
        fclose($fp);
        //echo $sample_input;
    }else
    {
        echo "opening error";
    }


    $fp = fopen($basedir."/sample.out","w");
    if ($fp)
    {
        fputs($fp,preg_replace("(\r\n)","\n",$sample_output));
        fclose($fp);
    }else
    {
        echo "opening error";
    }

}

if (strlen($test_input1)&&strlen($test_output1))
{


    $fp = fopen($basedir."/test1.in","w");
    fputs($fp,preg_replace("(\r\n)","\n",$test_input1));
    fclose($fp);

    $fp = fopen($basedir."/test1.out","w");
    fputs($fp,preg_replace("(\r\n)","\n",$test_output1));
    fclose($fp);
}

if (strlen($test_input2)&&strlen($test_output2))
{

    $fp = fopen($basedir."/test2.in","w");
    fputs($fp,preg_replace("(\r\n)","\n",$test_input2));
    fclose($fp);

    $fp = fopen($basedir."/test2.out","w");
    fputs($fp,preg_replace("(\r\n)","\n",$test_output2));
    fclose($fp);
}

echo "<script language='JavaScript'>alert('修改题目成功');window.history.go(-2);</script>";




?>