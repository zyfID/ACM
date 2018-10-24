<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="utf-8"><meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ACM</title>
    <style>
        p {
            white-space: pre-line;
        }
    </style>


</head>
<body>
<div class="jumbotron">

    <center>

        <h2>

            <?php

            $problem_id=$_GET['problem_id'];	//传递题目id
            //echo $problem_id;
            //exit(0);
            $ID=$_GET['id'];			//传递微信用户id
            $number=$_GET['number'];

            $con=new mysqli("","","","");
            $con->query("set names 'utf8';");//编码转化
            if ($con) {
                //echo "链接阿里数据库成功";
            }
            $query = "select * from problem where problem_id=$problem_id";
            $result=$con->query($query);		//查询题目


            $row = $result->fetch_assoc();     //从结果集中取得一行作为关联数组
            $title = $row['title'];             //提取题目数据
            $problem_id=$row['problem_id'];
            $description=$row['description'];
            $input=$row['input'];
            $output=$row['output'];
            $sample_input=$row['sample_input'];
            $sample_output=$row['sample_output'];
            //$sample_input=str_replace("<","&lt;",$sample_input);
            //$sample_input=str_replace(">","&gt;",$sample_input);
            //$sample_output=str_replace("<","&lt;",$sample_output);
            //$sample_output=str_replace(">","&gt;",$sample_output);
            $hint=$row['hint'];
            //echo "$title";
            //var_dump($title);
            //echo $problem_id;
            echo " $title";

            ?>
        </h2>
        <span class="green">时间限制: </span>1 Sec&nbsp;&nbsp;
        <span class="green">内存限制: </span>128 MB
        <br />
        <br />
        <br />
        <br />
    </center>
    <h2>题目描述</h2>
    <div class="content">
        <?php
        echo "$description";

        ?>
    </div>
    <h2>输入</h2>
    <div class="content">
        <?php
        echo "$input";

        ?>
    </div>
    <h2>输出</h2>
    <div class="content">
        <?php
        echo "$output";

        ?>
    </div>
    <h2>样例输入</h2>
    <p><!-- <div class="content" white-space:pre-wrap>--><?php echo "$sample_input";?>    </p>

</div>
<h2>样例输出</h2>
<!--<div class="content" white-space:pre-wrap>-->
</div>
<p><?php echo "$sample_output";?></p>

<h2>提示</h2>
<div class="content">
    <p></p>
</div>
<h2>来源</h2>
<div class="content">
    <p><a href="problemset.php?search="></a>&nbsp;</p>
</div>
<center>
    [
    <?php
    //$stu_num="171109";
    echo "<a href='submitpage.php?problem_id=$problem_id&id=$ID&number=$number'>猛戳提交</a>";
    ?>
    ]
</center>
</div>
</body>
</html>