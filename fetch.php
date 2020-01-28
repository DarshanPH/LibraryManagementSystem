<?php
require './framework.php';
if(isset($_POST["fetch_student_data"])){
 $query='SELECT * FROM `student`';
$output='<div class="table-responsive">
      <table border=1 class="table table-striped table-bordered table-hover table-condensed table-responsive">
        <tr>
        <th width="10">&nbsp;<center> <h4> Id &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Name&nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Reg No &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Semester &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Address &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center>  <h4>Department &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center><h4> Action &nbsp; </h4></center></th>
        
        </tr>
        ';
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
   while( $row=mysql_fetch_assoc($result)){
    $output.='<tr><td>'.$row["ID"].'</td>
            <td class="name" data-id1="'.$row["ID"].'" contenteditable> &nbsp;<h4>'.$row["STUDENT_NAME"].'&nbsp;</h4>  </td>
            <td class="regno" data-id2="'.$row["ID"].'"> &nbsp;<h4>'.$row["REGISTER_NO"].'&nbsp; </h4></td>
            <td class="sem" data-id3="'.$row["ID"].'" contenteditable> &nbsp;<h4>'.$row["SEMESTER"].'&nbsp; </h4> </td>
            <td class="address" data-id4="'.$row["ID"].'" contenteditable> &nbsp;<h4>'.$row["ADDRESS"].'&nbsp; </h4> </td>
            <td class="department" data-id5="'.$row["ID"].'" contenteditable> &nbsp;<h4>'.$row["DEPARTMENT"].'&nbsp; </h4> </td>
                 <td class="delete" data-id13="'.$row["ID"].'">  <center>  <button id="'.$row["ID"].'" onclick="deletedata(this.id,1)" class="btn btn-danger">Delete</button></center>&nbsp;</h4></td>
            </tr> ';
   }
}
else{
     $output.='<tr>No data found</tr>';
}

$output.='</table></div>';
echo $output;

}

if(isset($_POST["fetch_book_data"])){
    
    $output="";
    
    $query='SELECT * FROM `books`';
    $output='<div class="table-responsive">
        <table border=1 class="table table-striped table-bordered table-hover table-condensed table-responsive">
        <tr>
        <th width="10">&nbsp; <h4>ID &nbsp;</h4></th>
        <th width="10">&nbsp; <h4>Name&nbsp;</h4></th>
        <th width="10">&nbsp; <h4> Unique Id &nbsp;</h4></th>
        <th width="10">&nbsp;<h4> Author &nbsp; </h4></th>
        <th width="10">&nbsp;<h4> Action &nbsp; </h4></th>
       </tr>
        ';
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
    while($row=mysql_fetch_assoc($result)){
    $output.='<tr><td><h4>'.$row["ID"].'</h4></td>
            <td class="bookname" data-id10="'.$row["ID"].'" contenteditable> <h4>&nbsp;'.$row["BOOK_NAME"].'&nbsp; </h4> </td>
            <td class="bookid" data-id11="'.$row["ID"].'"><h4> &nbsp;'.$row["BOOK_ID"].'&nbsp;</h4> </td>
            <td class="bookauthor" data-id12="'.$row["ID"].'" contenteditable> <h4>&nbsp;'.$row["BOOK_AUTHOR"].'&nbsp;</h4> </td> 
            <td class="delete" data-id13="'.$row["ID"].'">  <center>  <button id="'.$row["ID"].'" onclick="deletedata(this.id,2)" class="btn btn-danger">Delete</button></center>&nbsp;</h4></td>
                </tr>
            ';
            
    }
    }
else
{
   $output.='<tr>No data found</tr>';  
}
$output.='</table></div>';
echo $output;









}





?>
