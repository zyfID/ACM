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
    <form method="post" action="http://47.100.211.26:800/problem_addout.php">
        <input type="hidden" name="problem_id" value="New Problem">
        <p align="left">标题:
            <input type="text" class="input input-xxlarge" name="title" size="71">
        </p>

        <p align="left">题目描述:
            <textarea class="kindeditor" name="description" cols="80" rows="13"></textarea>
        </p>

        <p align="left">
            输入:
            <br>
            <textarea class="kindeditor" name="input" cols="80" rows="13"></textarea>
        </p>

        <p align="left">
            输出:
            <textarea class="kindeditor" name="output" cols="80" rows="13"></textarea>
        </p>

        <p align=left>
            样例输入:
            <textarea  class="input input-large"  rows=13 name=sample_input cols=40></textarea>
            样例输出:
            <textarea  class="input input-large"  rows=13 name=sample_output cols=40></textarea>
        </p>

        <p align=left>
            测试输入1:
            <textarea  class="input input-large" rows=13 name=test_input1 cols=40></textarea>
            测试输出1:
            <textarea  class="input input-large"  rows=13 name=test_output1 cols=40></textarea>
        </p>

        <p align="left">
            测试输入2:
            <textarea class="input input-large" rows="13" cols="40" name="test_input2"></textarea>
            测试输入2:
            <textarea class="input input-large" rows="13" cols="40" name="test_output2"></textarea>
        </p>

        <p align="left">
            测试输入3:
            <textarea class="input input-large" rows="13" cols="40" name="test_input3"></textarea>
            测试输入3:
            <textarea class="input input-large" rows="13" cols="40" name="test_output3"></textarea>
        </p>

        <p align="left">
            测试输入4:
            <textarea class="input input-large" rows="13" cols="40" name="test_input4"></textarea>
            测试输入4:
            <textarea class="input input-large" rows="13" cols="40" name="test_output4"></textarea>
        </p>

        <div align="center">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>

</body>
</html>
