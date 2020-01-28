<?php

$pwd= md5('12345');
$uname='Dp';
require './framework.php';

if(mysql_query("INSERT INTO `data`(`USER_NAME`, `PASSWORD`, `RECOVERY_EMAIL`, `CONFIRM_CODE`, `CONFIRMED`) VALUES ('".$uname."','".$pwd."','darshanhegde5@gmail.com','0','1')")){echo"</br>Data updated";}//add to data