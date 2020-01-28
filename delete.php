<?php
require './framework.php';
if(isset($_POST["deletebooks"]))
{
    $id=$_POST["id"];
    if(isBookDeleteEligible($id)){
    $query="DELETE FROM `books` WHERE `ID`='".$id."'";
    if(mysql_query($query)){echo '<div class="bg-success">Deletion success</div>';}
    else{echo '<div class="bg-danger">Deletion failed</div><br>'.mysql_error();}
    }
    else
        {
        echo '<div class="bg-danger" id="book_status">Deletion not possible<br/>Book count doesnt matches with Book stock<br/>Please verify the data</div><br>';
        }
}
if(isset($_POST["deletestudent"]))
{
    $id=$_POST["id"];
    if(isStudentDeleteEligible($id)){
    $query="DELETE FROM `student` WHERE `ID`='".$id."'";
    if(mysql_query($query)){echo '<div class="bg-success">Deletion success</div>';}
    else{echo '<div class="bg-danger">Deletion failed</div><br>'.mysql_error();}
    }
 else {
        echo '<div class="bg-danger" id="student_status">Deletion not possible<br/>Student have active book log please check!<br/> And retry Again.</div><br>';
       }
}