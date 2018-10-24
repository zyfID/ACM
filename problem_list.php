<!-- 这个文件是用来显示题目列表，并且有重新编辑和删除操作-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

<table border="1" cellpadding="1" cellspacing="0" width="1000">
    <tr>
        <td width="60">
            <p>
                <span>题号</span>
            </p>
        </td>

        <td width="60">
            <p>
                <span>Title</span>
            </p>
        </td>

        <td width="60">
            <p>
                <span>Edit</span>
            </p>
        </td>

        <td width="60">
            <p>
                <span>Delete</span>
            </p>
        </td>
    </tr>

    <?php

    $id = $_GET['id'];
    $number = $_GET['number'];

//    $id=1;
//    $number=1;

    $con = include 'connect.php';

    mysqli_query($con,'set names utf8');

    $query = "select * from `problem` order by `problem_id` desc";
    $result = mysqli_query($con,$query);
    if (!$result)
    {
        die('查询数据错误').mysqli_error($con);
    }else
        $problem_num = mysqli_num_rows($result);
    //echo $problem_num;

    for ($i = 1000; $i < 999+$problem_num; $i++)
    {
        $problem_row = mysqli_fetch_array($result);
        $pid = $problem_row['problem_id'];
        echo "<tr>";

        echo "<td width='60'>";
        echo "<p>";
        echo "<span>".$problem_row['problem_id']."</span>";
        echo "</p>";
        echo "</td>";

        echo "<td width='100'>";
        echo "<p>";
        //echo "<span>".$problem_row['title']."</span>";
        echo "<a href='problem.php?problem_id=$pid&id=$id&number=$number'>".$problem_row['title']."</a>";
        echo "</p>";
        echo "</td>";

        echo "<td width='60'>";
        echo "<p>";
        echo "<a href='problem_edit_page.php?problem_id=$pid'>Edit</a>";
        echo "</p>";
        echo "</td>";

        echo "<td width='60'>";
        echo "<p>";
        echo "<a href='problem_delete.php?problem_id=$pid'>Delete</a>";
        echo "</p>";
        echo "</td>";

        echo "</tr>";
    }

    ?>
</table>

</body>
</html>
