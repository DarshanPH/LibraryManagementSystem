<?php
require './framework.php';


//returns book details
if(isset($_POST['bookid']))
{
    $echoMSG='';
    $bookName=''; 
   $bookStock=0;
    $bookId= mysql_real_escape_string($_POST['bookid']);
    if(!empty($bookId)){
       $bookExists= isBook($bookId);
      if($bookExists){
       $bookName= getBookNameByID($bookId);
       $bookStock= getBookCountFromBooks($bookId);
       if($bookStock==0)
       {
           $echoMSG='<p> Book Name:'.$bookName.'<br>Book Stock: '.$bookStock.'<br>Book Id:'.$bookId.'</p>';
       }
       else{
           $echoMSG='<p>Book Name:'.$bookName.'<br>Book Stock: '.$bookStock.'<br>Book Id:'.$bookId.'</p>';
       }
       }
       else{ $echoMSG='<p>Book Not exists</p>';}
    }
    else{$echoMSG='<p>Book Id cannot be blank</p>';}
    
    echo $echoMSG ;
    
    
}


/*if(isset($_POST['']))
{
    
}
 * /*
 */

//checking student details for adding student
if(isset($_POST['studentCheck']))
{
    $echoMsg='';
    $regNo= mysql_real_escape_string($_POST['studentCheck']);
    if(!empty($regNo)){
    $studentCheck= isStudent($regNo);
    if($studentCheck){
        $echoMsg='<p  >Student is already member </p>';
    }
    else{
        $echoMsg='<p>Student is not member </p>';
    }
    echo $echoMsg;
   }
}

//checking student for issuing book
if(isset($_POST['studentCheckForIssueingBook']))
{
    $echoMsg='';
    $count=0;
    $book1='';
    $book2='';
    $book3='';
    
    $regNo= mysql_real_escape_string($_POST['studentCheckForIssueingBook']);
    $name=getStudentName($regNo);
    if(!empty($regNo)){
    $studentCheck= isStudent($regNo);
    if($studentCheck){
        $count= getBookCount($regNo);
        
        $book1=getBooksFromStudent($regNo,$count);
                 $echoMsg='<p></p>';
        if($count==0)
        {$echoMsg='<p>Student is a member<br> <br> Name:'.$name.'<br>Register No:'.$regNo.'<br/>No books taken  </p>';}
        else if($count==1){
            
            $book1=getBooksFromStudent($regNo,1);
            $bookName1= getBookNameByID($book1);
            $echoMsg='<p>Student is a member<br>Name:'.$name.'<br>Register No:'.$regNo.' <br/>Books taken:<br>Book 1:'.$bookName1.'</p>';
        }
        else if($count==2){
            $book1=getBooksFromStudent($regNo,1);
            $book2=getBooksFromStudent($regNo,2);
            $bookName1= getBookNameByID($book1);
            $bookName2= getBookNameByID($book2);
             $echoMsg='<p>Student is a member<br> Name:'.$name.'<br>Register No:'.$regNo.'<br/>Books taken:<br>Book 1:'.$bookName1.'<br>Book 2:'.$bookName2.'></p>';
        }
        else if($count==3){
             $book1=getBooksFromStudent($regNo,1);
            $book2=getBooksFromStudent($regNo,2);
            
            $book3=getBooksFromStudent($regNo,3);
            $bookName1= getBookNameByID($book1);
            $bookName2= getBookNameByID($book2);
            $bookName3= getBookNameByID($book3);
            
             $echoMsg='<p>Student is a member<br> Name:'.$name.'<br>Register No:'.$regNo.'<br/>Books taken:<br>Book 1:'.$bookName1.'<br>Book 2:'.$bookName2.'<br/>Book 3:'.$bookName3.'</p>';
            
            
        }
                
                 
        
    }
    else{
        $echoMsg='<p  >'.$regNo.' is not assigned to any student</p>';
    }
    echo $echoMsg;
   }
}

//checks book availability for jQuery
if(isset($_POST['isbook']))
{
    $echoMsg='';
    $bookId=mysql_real_escape_string($_POST['isbook']);
    if(!empty($bookId)){
        if(isBook($bookId))
        {$echoMsg='<p>Book is in library';
        if(checkBookStock($bookId)){
            $echoMsg.='<br>Book available</p>';
        }
        else{$echoMsg='<p  >Book is out of stock</p>';}
        }
        else{$echoMsg='<p  >BookId:'.$bookId.'not in library</p>';}
        
    }
    else{$echoMsg='<p  >BookId is empty</p>';}
    echo $echoMsg;
    
}
//Used in issue book.php to check if student is a member or not
if(isset($_POST['isstudent']))
{
   $regNo= mysql_real_escape_string($_POST['isstudent']);
   $echomsg='';
   if(!empty($regNo))
   {
       if(isStudent($regNo)){$echomsg='<p>Student is registered</p>';}
       else{$echomsg='<p  >Student not registered</p>';}
       
       
   }
   else{$echomsg='<p  >Register no is empty</p>';}
   echo $echomsg;
   
    
    
    
}


if(isset($_POST['login']))
{
    $MSG="";
    $uname=mysql_real_escape_string($_POST['login']);
    $query="SELECT * FROM `data` WHERE `USER_NAME`='$uname'";
    $res=mysql_query($query);
    if(mysql_num_rows($res)>0)
    {
        $MSG= '<p>You are the admin</p>';
    }
    else
    {
        $MSG= '<p  >Are you not the admin</p>';
    }
    echo $MSG;
}

if(isset($_POST['RegNo']))
{
    $msg="";
    $reg= mysql_real_escape_string($_POST['RegNo']);
    $status=isStudent($reg);
   if($status)
   {$msg.="Student Found";}
   else{$msg.="Student Not found ";}
    echo $msg;
}

if(isset($_POST['idcard']))
{
   $regno= mysql_real_escape_string($_POST['idcard']);
   
   $echoMsg='';
   $name='';
   if(isStudent($regno)){
       $name= getStudentName($regno);
      $echoMsg=generateIdCard($regno);
   }
   else{
       $echoMsg='Student not found';
   }
   echo $echoMsg;
   
}

if(isset($_POST["idcardManager"])){
    $msg='';
    $msg.='<table border=1 class="table table-striped table-bordered table-hover table-condensed table-responsive">
            <tr><h1>
               <td>Name  &nbsp;</td>
                <td>RegesterNo  &nbsp;</td>
                <td>File Name  &nbsp;</td>
                <td>Action  &nbsp;</td>
                </tr>';
   if(is_dir('./idcards')){
       if ($dh = opendir('./idcards')){
    while (($file = readdir($dh)) !== false){
     if($file!='.'&&$file!='..'){
         $regNo= substr($file,0,10);
         $name= getStudentName($regNo);
         $button='<button class="btn btn-danger" value="hello" id="'.$regNo.'" onclick="deleteIdCard(this.id)">Delete</button>';
         $msg.='<tr><td>'.$name .'&nbsp;'. '</td>';
         $msg.='<td>'.$regNo.'&nbsp;'.'</td>';
         $msg.='<td>'.$file.'</td>';
         $msg.='<td>'.$button.'</td></tr>';
         
     }
    }
    closedir($dh);
  }
   }
    echo $msg;
    
}


if(isset($_POST["deleteIdCard"])){
    $fileName=mysql_real_escape_string($_POST['deleteIdCard']);
    $msg=deleteIdCard($fileName.'.jpg');
    echo $msg;
    
    
    
}

