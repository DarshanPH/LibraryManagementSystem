<?php
require './framework.php';
if(isset($_POST["student"])){
$id=$_POST["id"];
$text=$_POST["text"];
$column_name=$_POST["column_name"];
/*$id=1;
$text="Pranav Shastri";
$column_name="first_name";
*/
$query="UPDATE `student` SET `".$column_name."`='".$text."' WHERE `ID`='".$id."'";
$output='';

if(mysql_query($query)){$output='<span class="bg-success">Data Updated</span>';}
else{$output="Data update failed".mysql_error();}
echo $output;



//UPDATE `data` SET `first_name`='Pranav Shastri' WHERE `id`='1'

}

if(isset($_POST["edit_book"])){
$id=$_POST["id"];
$text=$_POST["text"];
$column_name=$_POST["column_name"];
/*$id=1;
$text="Pranav Shastri";
$column_name="first_name";
*/
$query="UPDATE `books` SET `".$column_name."`='".$text."' WHERE `ID`='".$id."'";
$output='';
if(mysql_query($query)){$output="Data Updated";}
else{$output="Data update failed".mysql_error();}
echo $output;



//UPDATE `data` SET `first_name`='Pranav Shastri' WHERE `id`='1'

}




?>

