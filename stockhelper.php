<?php
require './framework.php';
if(isset($_POST["stockverify"])){
    
    $output="";
    $query_student="SELECT * FROM `student` WHERE `BOOK_COUNT`!='0'";
    $result=mysql_query($query_student);
    $output='<div class="table-responsive">
      <table border=1 class="table table-striped table-bordered table-hover table-condensed table-responsive">
        <tr>
        <th width="10">&nbsp;<center> <h4> Id &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Name &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Reg No &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Semester &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Email Id &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center> <h4> Address &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center>  <h4>Department &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center>  <h4>Book 1 &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center>  <h4>Book 2 &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center>  <h4>Book 2 &nbsp;</h4></center></th>
        <th width="10">&nbsp;<center><h4> Action &nbsp; </h4></center></th>
        </tr>';
    if(mysql_num_rows($result)>0)
    {
        while($row=mysql_fetch_assoc($result))
        {
            $output.='<tr><td>'.$row["ID"].'</td>
            <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["STUDENT_NAME"].'&nbsp;</h4>  </td>
            <td class="regno" data-id2="'.$row["ID"].'"> &nbsp;<h4>'.$row["REGISTER_NO"].'&nbsp; </h4></td>
            <td class="sem" data-id3="'.$row["ID"].'"> &nbsp;<h4>'.$row["SEMESTER"].'&nbsp; </h4> </td>
            <td class="address" data-id4="'.$row["ID"].'"> &nbsp;<h4>'.$row["EMAIL_ID"].'&nbsp; </h4> </td>
            <td class="address" data-id4="'.$row["ID"].'"> &nbsp;<h4>'.$row["ADDRESS"].'&nbsp; </h4> </td>
            <td class="department" data-id5="'.$row["ID"].'"> &nbsp;<h4>'.$row["DEPARTMENT"].'&nbsp; </h4> </td>
            <td class="department" data-id6="'.$row["ID"].'"> &nbsp;<h4>'.getBookNameByID($row["BOOK_1"]).'&nbsp; </h4> </td>
            <td class="department" data-id7="'.$row["ID"].'"> &nbsp;<h4>'.getBookNameByID($row["BOOK_2"]).'&nbsp; </h4> </td>
            <td class="department" data-id8="'.$row["ID"].'"> &nbsp;<h4>'.getBookNameByID($row["BOOK_3"]).'&nbsp; </h4> </td>
            <td class="email" data-id9="'.$row["ID"].'">  <center>  <button id="'.$row["ID"].'" onclick="email(this.id,)" class="btn btn-primary">Email-Notify</button></center>&nbsp;</h4></td>
            </tr> ';
        }
    }
    echo $output;
    
    
}
if(isset($_POST["email"])){
    $id=$_POST["emailid"];
    $query="SELECT * FROM `student` WHERE `ID`='".$id."'";
    $result=mysql_query($query);
    $emailid="";
    if(mysql_num_rows($result)>0){
        $row=mysql_fetch_assoc($result);
        $emailid=$row["EMAIL_ID"];
    }
    $output=email($emailid,$id);
    echo ''.$output;
    
    
    
}
   
if(isset($_POST["verifybooks"]))
    {
    $query_student="SELECT * FROM `books` WHERE `STOCK_COUNT`!=`BOOK_COUNT`";
    $result=mysql_query($query_student);
     $output='<div class="table-responsive">
      <table border=1 class="table table-striped table-bordered table-hover table-condensed table-responsive">
        <tr>
        <th width="10">&nbsp;<center> <h4> Id &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Book Name &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Id &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Book Stock &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Current Stock &nbsp; </h4></center></th>
        <th width="10">&nbsp;<center> <h4> Book Author &nbsp; </h4></center></th>
        </tr>';
      if(mysql_num_rows($result)>0)
    {
        while($row=mysql_fetch_assoc($result))
        {
            $output.='<tr><td>'.$row["ID"].'</td>
                    <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["BOOK_NAME"].'&nbsp;</h4>  </td>
                   <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["BOOK_ID"].'&nbsp;</h4>  </td>
                   <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["STOCK_COUNT"].'&nbsp;</h4>  </td>
                   <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["BOOK_COUNT"].'&nbsp;</h4>  </td>
                   <td class="name" data-id1="'.$row["ID"].'"> &nbsp;<h4>'.$row["BOOK_AUTHOR"].'&nbsp;</h4>  </td>';
        }
    
    }
    echo ''.$output;
    
    
    }

  