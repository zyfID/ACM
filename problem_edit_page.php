<?php
/**
 * Created by PhpStorm.
 * User: zyf-PC
 * Date: 2018/7/24
 * Time: 10:38
 */

//接收传送过来的题目编号
$pid = $_GET['problem_id'];
//echo $pid;

$con = include 'connect.php';
mysqli_query($con,'set names utf8');

$sql = "SELECT * FROM `problem` WHERE `problem_id`=$pid";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($query);
$title = $result['title'];
$description = $result['description'];
$input = $result['input'];
$output = $result['output'];
$sample_input = $result['sample_input'];
$sample_output = $result['sample_output'];
//echo $sample_input;
//echo "<br>";
//echo $sample_output;
//exit(0);

?>

<html>
<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>New Problem</title>
</head>
<body leftmargin="30" >
<div class="container">

    <?php
    include_once ("kindeditor.php");
    ?>
    <!--<form method="post" action="http://192.168.230.130:8082/problem_addout.php">-->
    <form method="post" action="http://47.100.211.26:800/problem_editout.php">
        题目编号:<?php echo $pid;?>
        <input type="hidden" name="problem_id" value="<?php echo $pid;?>">
        <p align="left">标题:
            <input type="text" class="input input-xxlarge" name="title" size="71" value="<?php echo htmlentities($title)?>">
        </p>

        <p align="left">题目描述:
            <textarea class="kindeditor" name="description" cols="120" rows="13" ><?php echo htmlentities($description,ENT_QUOTES,"UTF-8");?></textarea>
        </p>

        <p align="left">
            输入:
            <br>
            <textarea class="kindeditor" name="input" cols="120" rows="13"><?php echo htmlentities($input,ENT_QUOTES,"UTF-8");?></textarea>
        </p>

        <p align="left">
            输出:
            <textarea class="kindeditor" name="output" cols="120" rows="13"><?php echo htmlentities($output,ENT_QUOTES,"UTF-8");?></textarea>
        </p>

        <p align=left>
            样例输入:
            <textarea rows=13 name=sample_input cols=40><?php echo htmlentities($sample_input,ENT_QUOTES,"UTF-8"); ?></textarea>
            样例输出:
            <textarea rows=13 name=sample_output cols=40><?php echo htmlentities($sample_output,ENT_QUOTES,"UTF-8"); ?></textarea>
        </p>

        <p align=left>
            测试输入1:
            <textarea class="input input-large" rows=13 name=test_input1 cols=40></textarea>
            测试输出1:
            <textarea class="input input-large"  rows=13 name=test_output1 cols=40></textarea>
        </p>

        <p align="left">
            测试输入1:
            <textarea class="input input-large" rows="13" cols="40" name="test_input2"></textarea>
            测试输入2:
            <textarea class="input input-large" rows="13" cols="40" name="test_output2"></textarea>
        </p>


        <div align="center">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>

</body>
</html>

