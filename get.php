<?php
if($_FILES)
{
    $filename = $_FILES['in']['name'];
    $tmpname = $_FILES['in']['tmp_name'];
    if(move_uploaded_file($tmpname, dirname(__FILE__).'/get/'.$filename))
    {
        echo json_encode('上传成功');
    }
    else
    {
        $data = json_encode($_FILES);
        echo $data;
    }
}
?>