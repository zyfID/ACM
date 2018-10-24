<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="ProgId" content="Word.Document" />
    <meta name="Generator" content="Microsoft Word 12" />
    <meta name="Originator" content="Microsoft Word 12" />
    <link rel="File-List" href="prepare1.files/filelist.xml" />
    <meta charset="utf-8">
    <title>代码提交</title>

    <style>
        p {
            white-space: pre-wrap;
        }
    </style>

</head>
<body>
<div style="width:1000px;margin:10px auto">
    <h2>提交代码</h2>

<?php
//    //require_once("../connect_database.php");
//
//    $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
//    if($link)
//    {
//        mysql_select_db('app_dstructuretest',$link);
//        $mysql  =   new SaeMysql();
//        $sql="select * from classes where id = '$ID'";
//        $result=mysql_query($sql,$link);
//    }
//
//    $problem_id=$_GET['problem_id'];	//题目id
//    $number=$_GET['number'];			//学号
//    //echo $number;					//学号
//    //echo "*************************";
//    //$con=new mysqli("106.14.165.22","admin","123456","jol");//连接阿里云数据库
//    $con=new mysqli("47.100.211.26","root","zyf123","jol");
//    $con->query("set names 'utf8';");//编码转化
//    if ($con) {
//        //echo "链接阿里数据库成功";
//    }
//    $query = "select * from problem where problem_id=$problem_id";
//    $result=$con->query($query);
//
//
//    $row = $result->fetch_assoc();     //从结果集中取得一行作为关联数组
//    $title = $row['title'];             //提取题目数据
//    $problem_id=$row['problem_id'];
//    $description=$row['description'];
//    $input=$row['input'];
//    $output=$row['output'];
//    $sample_input=$row['sample_input'];
//    $sample_output=$row['sample_output'];
//    $hint=$row['hint'];
//    //echo $title;
//    // echo "<br>";		http://106.14.165.22/JudgeOnline/submit3.php
//    // echo $sample_input;
$ip = $_SERVER['REMOTE_ADDR'];
//    ?>

    <form action="submit.php" method="POST">
        <table>
            <tr>
                <td>题目:</td>
                <td>
                    <input style="width:800px;height:40px"  value="<?php echo "$title"; ?>">
                    <input type="hidden" name="number" value="<?php echo "$number"; ?>">
                </td>

                <select name="language" size="1">
                    <option value="0">C</option>
                    <option value="1">C++</option>
                </select>

                <input type="hidden" name="csrf">
                <input type="hidden" name="problem_id" value="<?php echo "$problem_id"; ?>">
                <input type="hidden" name="ip" value="<?php echo "$ip";?>">
            </tr>
            <tr>
                <td>代码：</td>
                <td><textarea style="width:800px;height:400px" name="source" ></textarea></td>
            </tr>


        </table>

        <div style="width:800px;margin:10px auto">
            <table>
                <tr>
                    <td>输入:
                        <input  style="width:340px;margin:10px" cols="10" rows="5"  id="input_text" name="sample_input2" value="<?php echo "$sample_input"; ?>">
                    </td>
                    <td>
                        输出：
                        <input style="width:340px;margin:10px" cols="10" rows="5" id="out" name="out" value="<?php echo $sample_output ?>">
                    </td>
                </tr>
                <br>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="submit" value="提交" style="auto" />
                    </td>
                </tr>
                <input type="hidden" name="sample_input" value="<?php echo "$sample_input"; ?>">
            </table>
        </div>

    </form>
</div>

<br>


</body>
</html>