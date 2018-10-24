<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="ProgId" content="Word.Document" />
    <meta name="Generator" content="Microsoft Word 12" />
    <meta name="Originator" content="Microsoft Word 12" />
    <link rel="File-List" href="prepare1.files/filelist.xml" />
    <meta charset="utf-8">
    <title></title>
    <style type="text/css" >

        div { margin:0 auto; width:800px; height:200px; border:1px }



        /* Padding and font style */
        table {
            padding: 1px 4px;
            font-size: 24px;
            font-family: Verdana;
            color: rgb(177, 106, 104);
        }

        /* Alternating background colors */
        table {
            background: rgb(238, 211, 210)
        }
        table tr:nth-child(odd) {
            background: #FFF
        }


    </style>
</head>
<body>
<h1 style="text-align:center">答题情况</h1>
<?php
//$user_id=$_GET['$user_id'];
$con=new mysqli("localhost","root","zyf123","jol");

if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

//else echo"connect ok!,seccess acm<br />";

$query="set names utf8";
$result=$con->query($query);
$query="select * from solution where user_id='$user_id' order by solution_id desc";
$result=$con->query($query);
$num_results = $result->num_rows;
//echo "$num_results";

$sql = "select "

?>
<div>
    <table>

        <tr><td>编号</td><td>用户</td><td>问题</td><td>结果</td><td>提交时间</td></tr>
        <?php
        for ($i=0; $i < $num_results; $i++) {
            $row = $result->fetch_assoc();     //
            //echo "string";

            $p = 1-$row['pass_rate'];//pass_rate
            $p = $p*100;

            echo "<tr>";
            echo "<td>";
            $solution_id=$row['solution_id'];
            echo "$solution_id";
            echo "</td>";


            echo "<td>";
            $user_id=$row['user_id'];
            echo "$user_id";
            echo "</td>";

            echo "<td >";
            $problem_id=$row['problem_id'];
            echo "$problem_id";
            echo "</td>";

            $result_a=$row['result'];     //åˆ¤æ–­ç­”æ¡ˆ

            switch ($result_a) {
                case '0':
                    $result_b="等待";
                    $result_c="white";
                    break;
                case '1':
                    $result_b="等待重判";
                    $result_c="white";
                    break;
                case '2':
                    $result_b="编译中";
                    $result_c="white";
                    break;
                case '3':
                    $result_b="运行并评判";
                    $result_c="white";
                    break;
                case '4':
                    $result_b="正确";
                    $result_c="#22ef22";
                    break;
                case '5':
                    $result_b="格式错误";
                    $result_c="white";
                    break;
                case '6':
                    $result_b="答案错误".$p."%";
//                    $result_b="答案错误";
                    $result_c="white";
                    break;
                case '7':
                    $result_b="时间超限";
                    $result_c="white";
                    break;
                case '8':
                    $result_b="内存超限";
                    $result_c="white";
                    break;
                case '9':
                    $result_b="输出超限";
                    $result_c="white";
                    break;
                case '10':
                    $result_b="运行错误";
                    $result_c="white";
                    break;
                case '11':
                    $result_b="编译错误";
                    $result_c="white";
                    break;
                case '12':
                    $result_b="编译成功";
                    $result_c="white";
                    break;
                case '13':
                    $result_b="运行完成";
                    $result_c="white";
                    break;

                default:
                    $result_b="错误";
                    $result_c="white";
                    break;
            }

            //if ($result_a==4) {
            // $result_b="æ­£ç¡®";
            //  $result_c="#22ef22";
            //}
            //else {$result_b="é”™è¯¯";
            //$result_c="white";}

            echo "<td   bgcolor=$result_c>";
            echo "$result_b";
            echo "</td>";

            echo "<td >";
            $in_date=$row['in_date'];
            echo "$in_date";
            echo "</td>";

            echo "</tr>";

        }
        //echo "$problme_id";
        //$delete="delete from solution where result='2'";
        $delete="update solution set result='7' where result='2'";
        $result=$con->query($delete);
        ?>

    </table>
</div>
</body>
</html>
