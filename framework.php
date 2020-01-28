<?php
 $connection= mysql_connect("localhost","root");
    if($connection||isset($connection)){
    mysql_select_db("library", $connection);
    }
    else 
    {
        header("location:error.php?name=no Connection");
    }

function isBookAvailable($bookId)
{
    
   
    $book=$bookId;
   
    
        $query="SELECT * FROM `books` WHERE `BOOK_ID`='$book'";
        $count="";
        $data=mysql_query($query);
        if(mysql_num_rows($data)>0)
        {
        $row= mysql_fetch_assoc($data);       
            $count=$row["BOOK_COUNT"];
        }
        
        if($count!=0)
        {
            return TRUE;
        }
         
        else
        {
            return FALSE;
        }
        return FALSE;
    
          
}
function isStudentEligible($regNo)
{
    //checks eligibility of student that to issue book
    $regno=$regNo;
    $eligiblity=FALSE;
    $bookCount=0;
   $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);    
        $bookCount=$row["BOOK_COUNT"];
        
    }
    if($bookCount<3)
    {
        $eligiblity=TRUE;
    }
 else {
        $eligiblity=FALSE;
    }
    return $eligiblity;
    
}
function isStudent($regNO)
{
    //returns true if student is a member of library
  $regno=$regNO;
  
  $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
  $result=mysql_query($query);
  $dbregno="";
  if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
      $dbregno=$row["REGISTER_NO"];
  }
  if($regno==$dbregno)
  {
      return TRUE;
  }
  else
  {
      return FALSE;
  }
  
}
function isBook($bookID)
{
    //returns true if book is present
    $bookid=$bookID;
      $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
  $result=mysql_query($query);
  $dbbookid='';
  if(mysql_num_rows($result)>0){
      $row=mysql_fetch_assoc($result);
      $dbbookid=$row["BOOK_ID"];
  }
  /*while($row= mysql_fetch_assoc($result))
  {
      $dbbookid=$row["BOOK_ID"];
  }*/
  if($bookid==$dbbookid)
  {
      return TRUE;
  }
  else if($bookid!=$dbbookid)
  {
      return FALSE;
  }
  //else if($dbbookid==''){return FALSE;}
  
    
}
function getBookCount($regNo)
{
    //Returns the book count of the student
    $regno=$regNo;
  
    $bookCount=0;
   $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
        $bookCount=$row["BOOK_COUNT"];
        
    }
    return $bookCount;
    
}

function getBookCountFromBooks($bookId)
{
    //Returns the book count of the student
       $bookid=$bookId;
  
    $bookCount=0;
   $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
        $bookCount=$row["BOOK_COUNT"];
        
    }
    return $bookCount;
    
}


function designUpdateQueryWhileIssueingBook($Count,$regNO,$bookID,$Date)
{
    $date=$Date;
    $count=$Count;
    $regNo=$regNO;
    $bookId=$bookID;
    $query='';
    $updatedCount=$count+1;
  //  $query='UPDATE  `student` SET `BOOK_COUNT`=$count WHERE `REGISTER_NO`="327CS15020"';
    switch($count)
    {
        case 0:
            $query="UPDATE `student` SET `BOOK_1`='".$bookId."',`BOOK_COUNT`='".$updatedCount."',`BOOK_1_DATE`='".$date."' WHERE `REGISTER_NO`='".$regNo."'";
            break;
        case 1:
         $query="UPDATE `student` SET `BOOK_2`='".$bookId."',`BOOK_COUNT`='".$updatedCount."',`BOOK_2_DATE`='".$date."' WHERE `REGISTER_NO`='".$regNo."'";
            break;
            
        case 2:
          $query="UPDATE `student` SET `BOOK_3`='".$bookId."',`BOOK_COUNT`='".$updatedCount."',`BOOK_3_DATE`='".$date."' WHERE `REGISTER_NO`='".$regNo."'";
            break;
            
            
    }
    return $query;
    
}
function bookNotInLibrary($bookID)
{
    //returns  if book is present
   /* $bookid=$bookID;
      $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
  $result=mysql_query($query);
  $dbbookid="";
  if(mysql_num_rows($result)>0){
      $row=mysql_fetch_assoc($result);
      $dbbookid=$row["BOOK_ID"];
  }
 /* while($row= mysql_fetch_assoc($result))
  {
      $dbbookid=$row["BOOK_ID"];
  }
  if($dbbookid==''){die(header('location:addBook.php'));}
  if($bookid==$dbbookid)
  {
      return FALSE;
  }
  else  {
      return TRUE;
  }
 */ 
    $bookid=$bookID;
    $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
    $result=mysql_query($query);
    $dbData='';
    if(mysql_num_rows($result)>0)
    {$row=mysql_fetch_assoc($result); $dbData=$row["BOOK_ID"];}
    if($dbData==$bookid){return FALSE;}
    else{ return TRUE;}
    
    
}
  
function studentIsNotRegistered($regNO)
{
    //returns true if student is a member of library
  $regno=$regNO;
  
  $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
  $result=mysql_query($query);
  $dbregno="";
  if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
      $dbregno=$row["REGISTER_NO"];
  }
  if($regno==$dbregno)
  {
      return FALSE;
  }
  else
  {
      return TRUE;
  }
  
}
function checkBookStock($bookId)
//returns true if book stock count is more than 1
{
    $bookid=$bookId;
    $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
    $bookCount=0;
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
        $bookCount=$row["BOOK_COUNT"];
       
    }
    if($bookCount<=0)
    {
        return FALSE;
    }
 else {
        return TRUE; 
    }
    
}
function bookStockcount($bookId)
//returns the book count
{
     $bookid=$bookId;
    $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookid'";
    $bookCount=0;
    $result=mysql_query($query);
    if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
        $bookCount=$row["BOOK_COUNT"];
       
    }
    return $bookCount;
}


function getBookNameByID($bookID)
{
    $bookId=$bookID;
     $query="SELECT * FROM `books` WHERE `BOOK_ID`='$bookId'";
    $result=mysql_query($query);
    $bookName="";
   if(mysql_num_rows($result)>0)
    {
    $row= mysql_fetch_assoc($result);
        $bookName=$row["BOOK_NAME"];
    }
    return $bookName;
}
function getBooksFromStudent($registerNO,$Count)
        //returns book names from student 
{
    $regNo=$registerNO;
    $count=$Count;
    $returnValue="";
    $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regNo'";
    $result=mysql_query($query);
        switch($count){
           case 1:
                while($row= mysql_fetch_assoc($result))
                    {
                        $returnValue=$row["BOOK_1"];
                    }

            break;
              case 2:
                while($row= mysql_fetch_assoc($result))
                    {
                        $returnValue=$row["BOOK_2"];
                    }
            break;
              case 3:
                while($row= mysql_fetch_assoc($result))
                    {
                        $returnValue=$row["BOOK_3"];
                    }
            break;
 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
       }
       return $returnValue;
    
}

function swapBooks($num1,$num2,$regNo)
//Swaps books
 {
    $message="";
    $regno=$regNo;
    $book1="";
    $book2="";
    $date1="";
    $date2="";
    $no1=$num1;
    $no2=$num2;
    if($no1==1&&$no2==2)//Swap book 1 &book 2
    {
     $query="SELECT * FROM `student` WHERE `REGISTER_NO`='".$regno."'";
    $result=mysql_query($query);
    while($row= mysql_fetch_assoc($result))
    {
      $book1=$row["BOOK_1"];
      $book2=$row["BOOK_2"];
      $date1=$row["BOOK_1_DATE"];
      $date2=$row["BOOK_2_DATE"];
    }
        $B1=$book2;
        $B2=$book1;
        $D1=$date2;
        $D2=$date1;
       $query="UPDATE `student` SET `BOOK_1`='".$B1."',`BOOK_2`='".$B2."',`BOOK_1_DATE`='".$D1."',`BOOK_2_DATE`='".$D2."' WHERE `REGISTER_NO`='$regno'";
       if(mysql_query($query))
       {
           $message="<br/> Database Updated";
       }
       else{
           $message="<br/>Error! 1<br/>".mysql_error();
       }
       return $message;
     }
     elseif ($no1==2&&$no2==3) 
     {
     
    $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
    $result=mysql_query($query);
    while($row= mysql_fetch_assoc($result))
    {
      $book1=$row["BOOK_2"];
      $book2=$row["BOOK_3"];
      $date1=$row["BOOK_2_DATE"];
      $date2=$row["BOOK_3_DATE"];
    }
        $B1=$book2;
        $B2=$book1;
        $D1=$date2;
        $D2=$date1;
        $query="UPDATE `student` SET `BOOK_2`='".$B1."',`BOOK_3`='".$B2."',`BOOK_2_DATE`='".$D1."',`BOOK_3_DATE`='".$D2."' WHERE `REGISTER_NO`='$regno'";
       
       if(mysql_query($query))
       {
           $message="<br/> Database Updated";
       }
       else{
           $message="<br/>Error! 2<br/>".mysql_error();
       }
       return $message;
         
     } 
    
    
    
}



/*function returnBook($regNO,$Count)
{
    $regNo=$regNo;
    $count=$Count;
    $status=FALSE;
    switch($count)
    {
        case 1:
            $query="UPDATE `student` SET `BOOK_1`=NULL `BOOK_1_DATE`=NULL WHERE `REGISTER_NO`='$regno'";
            if(mysql_query($query))
            {
               
                
                $v1=swapBooks(1,2,$regNo);
                $v2=swapBooks(2,3,$regNo);
                if(v1&&v2)
                {
                     $status=TRUE;
                }
                
                
                }
            
            break;
        case 2:
             $query="UPDATE `student` SET `BOOK_2`=NULL WHERE `BOOK_2_DATE`=NULL `REGISTER_NO`='$regno'";
            if(mysql_query($query))
            {
                
                $v1=swapBooks(2,3,$regNo);
                if($v1)
                {
                    $status=TRUE;
                }
            }
            break;
        case 3:
             $query="UPDATE `student` SET `BOOK_3`=NULL `BOOK_3_DATE`=NULL WHERE `REGISTER_NO`='$regno'";
            if(mysql_query($query))
            {
                $status=TRUE;
            }
            break;
        
    }
    
}*/
function seperateData($raw,$c)
        //used to extract data submitted in books return confirm.php
        //returns the value of which is requested 1->checkbox count :: 2->reg no :: 3->bookId
{
    $rawVal=$raw;
    $count=$c;
    $str=explode("-",$rawVal);
    $returnVal="";
    if($count==0)
    {
      $returnVal=$str["0"]; 
    }
    else if($count==1)
    {
       $returnVal=$str["1"]; 
    }
    else if($count==2)
    {
       $returnVal=$str["2"]; 
    }
   
   return $returnVal;
    
}
function checkBookTakenByStudent($id,$c,$regNO)
        //returns true if the book is present in that column
{
    $regNo=$regNO;
   $bookId=$id;
   $count=$c;
   $query="";
   $status=FALSE;
   switch($count)
   {
       case 1:
           $query="SELECT `BOOK_1` FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       case 2:
           $query="SELECT `BOOK_2` FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       case 3:
           $query="SELECT `BOOK_3` FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       
   }
   $result=mysql_query($query);
   if($id==$result)
   {
       $status=TRUE;
   }
   return $status;
}


function checkBookIdItExistsInTheColumn($id,$c,$regNO)
{
    $regNo=$regNO;
   $bookId=$id;
   $count=$c;
   $query="";
   $status=FALSE;
   $book="";
   switch($count)
   {
       case 1:
           $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       case 2:
           $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       case 3:
           $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regNo' ";
           break;
       
   }
   $result=mysql_query($query);
   //while($row=mysql_fetch_assoc($result))
       $row='';    
    if(mysql_num_rows($result)>0)
     {
        $row=mysql_fetch_assoc($result);
     }
         if($count==1)
       {
           $book=$row["BOOK_1"];
       }
      else if($count==2)
       {
           $book=$row["BOOK_2"];
       }
       else if($count==3)
       {
           $book=$row["BOOK_3"];
       }
   
  if($bookId==$book)
   {
       $status=TRUE;
   }
   return $status;
    
   
}

  function updateTables($no,$regNO,$bookID){
      //used un returning the books
      $echoMsg='';
        $numVal=$no;
        $regNo=$regNO;
        $bookId=$bookID;
        $updateStudentQuery="";
        
        $callingSwapValue=0;
        $bookStock= bookStockcount($bookId);
        $updatedBookStckInBookDB=$bookStock+1;
        $bookCountOfStudent= getBookCount($regNo);
        $bookCountForBooksDB= getBookCountFromBooks($bookId);
        $updatedBookCountForStudentDB=$bookCountOfStudent-1;
        $updatedBookStock=$bookCountForBooksDB+1;
        $stat1=FALSE;
        $stat2=FALSE;
        $stat3=FALSE;
        $stat4=FALSE;
        $dSTat1=FALSE;
        $dSTat2=FALSE;
        $dSTat3=FALSE;
        $dSTat4=FALSE;
        if(!checkBookIdItExistsInTheColumn($bookId, $numVal, $regNo))
        {
            $echoMsg="Check the values again";
        }
        $val=0;
       
        switch($numVal)
        {
            case 1:
                $updateStudentQuery="UPDATE `student` SET `BOOK_1`='NULL',`BOOK_1_DATE`='NULL',`BOOK_COUNT`='$updatedBookCountForStudentDB' WHERE `REGISTER_NO`='$regNo'";
               // $callingSwapValue=2;
               $val=1;
                break;
            case 2:
                $updateStudentQuery="UPDATE `student` SET `BOOK_2`='NULL',`BOOK_2_DATE`='NULL',`BOOK_COUNT`='$updatedBookCountForStudentDB' WHERE `REGISTER_NO`='$regNo'";
              //  $callingSwapValue=1;
                $val=2;
                break;
            case 3:
                $updateStudentQuery="UPDATE `student` SET `BOOK_3`='NULL', `BOOK_3_DATE`='NULL' ,`BOOK_COUNT`='$updatedBookCountForStudentDB' WHERE `REGISTER_NO`='$regNo'";
                break;
        }
        $updateBooksDBQuery="UPDATE `books` SET `BOOK_COUNT`='$updatedBookStock' WHERE `BOOK_ID`='$bookId'";
        mysql_query($updateBooksDBQuery);
        mysql_query($updateStudentQuery);
        
       if($val==1&&$bookCountOfStudent==3)
       {
           //swap 1&2, 2&3...
           $stat1= swapBooks(1, 2, $regNo);
           $stat2= swapBooks(2, 3, $regNo);
         
       }
        else if($val==2&&$bookCountOfStudent==3)
        {
            //swap only 2&3
            $stat3= swapBooks(2, 3, $regNo);
            
        }
        else if($val==1&&$bookCountOfStudent==2)
        {
            //swap 1&2
            $stat4= swapBooks(1, 2, $regNo);
            
        }
        
  
        if($stat1&&$stat2)
        {
            $echoMsg="Database Updated";
        }
        else if($stat3)
        {
            $echoMsg= "Database Updated";
        }
        else if($stat4)
        {
            $echoMsg="Database Updated";
        }
        else {$echoMsg='Database Updated';}
        return $echoMsg;
                         
                         
 }
 
  
  
  function getStudentName($regNO){
      
      $regno= mysql_real_escape_string($regNO);
      $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
      $msg='';
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row= mysql_fetch_assoc($result);
          $msg=$row["STUDENT_NAME"];
      }
      return $msg;
      
  }
  
  function getStudentAddress($regNO){
      
      $regno= mysql_real_escape_string($regNO);
      $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
      $msg='';
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row= mysql_fetch_assoc($result);
          $msg=$row["ADDRESS"];
      }
      return $msg;
      
  }
  
  
  function getStudentSem($regNO){
      
      $regno= mysql_real_escape_string($regNO);
      $query="SELECT * FROM `student` WHERE `REGISTER_NO`='$regno'";
      $msg='';
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row= mysql_fetch_assoc($result);
          $msg=$row["SEMESTER"];
      }
      return $msg;
      
  }
  
  
 /*function  generateIdCard($Name,$regNO){
     $name=$Name;
     $regno=$regNO;
     $length=strlen(trim($name));
      $txt=trim($name);
      $msg='';
       
       if($length>0&&$length<19)
       {
           $image= imagecreatefromjpeg('card1.jpg');
           imagefttext($image,17,0,100,220,1,"./fonts/Ubuntu.ttf",$txt);
            imagefttext($image,17,0,160,283,1,"./fonts/Ubuntu.ttf",$regno);
           
       }
       else if($length>19&&$length<40)
       {
           $str1= substr($txt, 0,18);
           $str2=substr($txt,18);
           $image= imagecreatefromjpeg('card2.jpg');
           imagefttext($image,17,0,100,220,1,"./fonts/Ubuntu.ttf",$str1."-");
           imagefttext($image,17,0,30,250,1,"./fonts/Ubuntu.ttf","-".$str2);
           imagefttext($image,17,0,160,283,1,"./fonts/Ubuntu.ttf",$reg);
         
       }
       imagejpeg($image,'./idcards/'.$regno.'.jpg');
     $msg='<img src="./idcards/'.$regno.'.jpg">'.'<br/>';
     $msg.='<a href="./idcards/'.$regno.'.jpg" action="download">Click here to download</a>';
     return $msg;
 }
 */
  function generateIdCard($regNO)
  //generates Id card
  {
       $image= imagecreatefromjpeg('icard.jpg');
       $regno=$regNO;
       $regnoTrim=substr($regno,3,2);
       $name= getStudentName($regno);
       $address=getStudentAddress($regno);
       $sem= getStudentSem($regno);
       $dept='';
       switch ($regnoTrim)
       {
           case "CS":
              $dept='CSE';
               break;
           case "ME":
              $dept='ME';
               break;
           case "CE":
               $dept='CE';
               break;
           case "EC":
               $dept='EC';
               break;
           case "EE":
               $dept='EE';
               break;
       }
        if(strlen($name)<20){
            imagefttext($image,17,0,74,88,1,"./fonts/Ubuntu.ttf",$name);
            
        }
        else{
            $name1= substr($name,0,18);
            $name2=substr($name,18,strlen($name));
            imagefttext($image,17,0,74,88,1,"./fonts/Ubuntu.ttf",$name1.'-');
            imagefttext($image,17,0,20,120,1,"./fonts/Ubuntu.ttf",'-'.$name2);
        }
        imagefttext($image,17,0,80,159,1,"./fonts/Ubuntu.ttf",$regno);
        imagefttext($image,17,0,87,204,1,"./fonts/Ubuntu.ttf",$dept);
        imagefttext($image,17,0,313,203,1,"./fonts/Ubuntu.ttf",$sem);
        
        if(strlen($address)<20){
        imagefttext($image,17,0,93,240,1,"./fonts/Ubuntu.ttf",$address);}
        else{
            $address1=substr($address,0,18);
            $address2=substr($address,19, strlen($address));
            imagefttext($image,17,0,93,243,1,"./fonts/Ubuntu.ttf",$address1.'-');
            imagefttext($image,17,0,20,283,1,"./fonts/Ubuntu.ttf",'-'.$address2);
        } 
        
       if( imagejpeg($image,'./idcards/'.$regno.'.jpg')){
        $msg='<div style="position: absolute; top:100px;left:500px;"><img src="./idcards/'.$regno.'.jpg">'.'<br/>';
        $msg.='<a href="./idcards/'.$regno.'.jpg" download="./idcards/'.$regno.'.jpg">Click here to download</a> </div>';
        echo $msg;
       }
      
  }
 /*

        imagefttext($image,60,0,250,330,1,"UbuntuMono.ttf",$name);
        imagefttext($image,60,0,340,610,1,"UbuntuMono.ttf",$regno);
        imagefttext($image,60,0,340,770,1,"UbuntuMono.ttf",$dept);
        imagefttext($image,60,0,1250,770,1,"UbuntuMono.ttf",$sem);
        imagefttext($image,60,0,340,900,1,"UbuntuMono.ttf",$address);
       
   
    */
  
  
  
 function getDateFromDataBase($Count,$regNO)
    {
     $regno=$regNO;
    $count=$Count;
    $query='';
    $returnVal='';
    switch($count){
        
        case 1:
             $query="SELECT `BOOK_1_DATE` FROM `student` WHERE `REGISTER_NO`='$regno' ";
            break;
        case 2:
            $query="SELECT `BOOK_2_DATE` FROM `student` WHERE `REGISTER_NO`='$regno' ";
            break;
        case 3:
            $query="SELECT `BOOK_3_DATE` FROM `student` WHERE `REGISTER_NO`='$regno' ";
            break;
        
        
    }
        $result=mysql_query($query);
        if(mysql_num_rows($result)>0){
        $row=mysql_fetch_assoc($result);
        if($count==1){ $returnVal=$row['BOOK_1_DATE'];}
        else if($count==2){$returnVal=$row['BOOK_2_DATE'];}
        else if($count==3){$returnVal=$row['BOOK_3_DATE'];}
        }
        return $returnVal;
    }
    function isNull($str){
       
        if("" ==$str){
            return TRUE;
        }
        else{return FALSE;}
        
        
    }
    
    function deleteIdCard($filename)
    {
        $fileName=$filename;
        $file='./idcards/'.$fileName;
        $msg='';
        if(unlink($file))
        {$msg.='<div class="bg-success">File deleted</div>';}
        else{$msg.='<div class="bg-danger">Unable to delete file or file not exists</div>';}
        return $msg;
    }
    function isBookDeleteEligible($id){
        $query="SELECT * FROM `books` WHERE `ID`='".$id."'";
        $result=mysql_query($query);
        $bookstock="";
        $bookcount="";
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            $bookstock=$row["STOCK_COUNT"];
            $bookcount=$row["BOOK_COUNT"];        
        }
        if($bookcount==$bookstock)
        {return TRUE;}
        else 
        {return FALSE;}
    }
    function isStudentDeleteEligible($id){
        $query="SELECT * FROM `student` WHERE `ID`='".$id."'";
        $result=mysql_query($query);
        $bookcount="";
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            
            $bookcount=$row["BOOK_COUNT"];     
            
        }
        if($bookcount==0){return TRUE;}
         else {return FALSE;}
        
    }
    

 function email($emailid,$id)
 {
      $bookcount= getStudentBookCountById($id);
     $bookDetails="";
     $query="SELECT * FROM `student` WHERE `ID`='".$id."'";
     $result=mysql_query($query);
     $book1="";
     $book2="";
     $book3="";
     $studentName= getStudentNameById($id);
     if(mysql_num_rows($result)>0){$row=mysql_fetch_assoc($result);
         switch ($bookcount){
         case 0:
             $bookDetails="You dont have any book taken.Ignore this alert/Contact your library admnistrator.";
             break;
          case 1:
             $book1=$row["BOOK_1"];
             $bookDetails="\t".'1.'. getBookNameByID($book1).".\r\n";
             break;
          case 2:
             $book1=$row["BOOK_1"];
             $bookDetails="\r".'1.'. getBookNameByID($book1).".\r\n";
             $book2=$row["BOOK_2"];
             $bookDetails.="\r".'2.'. getBookNameByID($book2).".\r\n";
             break;
          case 3:
             $book1=$row["BOOK_1"];
             $bookDetails="\t".'1.'. getBookNameByID($book1).".\r\n";
             $book2=$row["BOOK_2"];
             $bookDetails.="\r".'2.'. getBookNameByID($book2).".\r\n";
             $book3=$row["BOOK_3"];
             $bookDetails.="\r".'3.'. getBookNameByID($book3).".\r\n";
             break;
     }
     }
    
    
    $subject = 'Simple Send Test Message Subject Line';
    $message = 'Dear,'."\n\t".$studentName."\t".'You are needed by the library administrator.'."\r\n".'Reason:'."\r\n\t".'You have some books that is/are not returned to library.'."\r\n"."Here are your book details"."\r\n".''.$bookDetails;
    $headers = 'From: noreply@librarymanagementsystem.com' . "\r\n";
    $headers .= 'Library Manager 3.0';
    $output='';
   if( mail($emailid, $subject, $message, $headers))
   {
    $output='<div class="bg-success">Email Sent to:'."\t".$emailid.'</div>';   
   }
   else
   {
       $output='<div class="bg-danger">Failed to send the email</div>';
       
   }
   
   return $output;
     
     
     
 }
 function getStudentBookCountById($id){
      
      $id= mysql_real_escape_string($id);
      $query="SELECT * FROM `student` WHERE `ID`='$id'";
      $msg='';
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row= mysql_fetch_assoc($result);
          $msg=$row["BOOK_COUNT"];
      }
      return $msg;
      
  }
  function getStudentNameById($id){
      
      $id= mysql_real_escape_string($id);
      $query="SELECT * FROM `student` WHERE `ID`='$id'";
      $msg='';
      $result=mysql_query($query);
      if(mysql_num_rows($result)>0){
          $row= mysql_fetch_assoc($result);
          $msg=$row["STUDENT_NAME"];
      }
      return $msg;
      
  }
    
