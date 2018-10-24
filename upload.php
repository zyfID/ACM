<?php

$ftp_server = "***";
$ftp_user_name = "***";
$ftp_user_pass = "***";
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
$file = 'test.txt';
$remote_file = '/test/a.txt';
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "文件移动成功\n";
} else {
    echo "移动失败\n";
}
ftp_close($conn_id);


?>