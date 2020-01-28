<?php
       include './header.php';
       include './navbar.php';
      
        $regNo="";
        $checkBoxVals='';
        global $bookCount;
        global $regNo;
        global $days;
        global $msg;
        $msg='';
    if(isset($_POST["submit"]))
    {
        global $regNo;
        $regNo=$_POST["registerno"];
        $studendExists= isStudent($regNo);
           $name="";
           $book1="";
           $book2="";
           $bookN3="";
           $bookName1="";
           $bookName2="";
           $bookName3="";
           $echoMsg="";
           $selectMsg="";
           
          
        if($studendExists)
        {
            $bookCount= getBookCount($regNo);
           
            switch($bookCount)
                   {
                       case 0:
                           $echoMsg="Student took zero books<br/>";
                           break;
                       case 1:
                            $book1= getBooksFromStudent($regNo, 1);
                            $bookName1= getBookNameByID($book1);
                            $checkBoxVals='<form action="#" method="post">'
                           . ' <input type="radio" value="1-'.$regNo.'-'.$book1.'" name="rad">'.$bookName1.'<br/><br/>'
                           .'<input type="submit" class="btn btn-primary" name="update">'
                           . '</form>';
                           break;
                       case 2:
                           $book1= getBooksFromStudent($regNo, 1);
                            $bookName1= getBookNameByID($book1);
                            $book2= getBooksFromStudent($regNo, 2);
                            $bookName2= getBookNameByID($book2);
                           $checkBoxVals='<form action="#" method="post">'
                          . ' <input type="radio" value="1-'.$regNo.'-'.$book1.'" name="rad">'.$bookName1.'&nbsp;&nbsp;&nbsp;'
                           . ' <input type="radio" value="2-'.$regNo.'-'.$book2.'" name="rad">'.$bookName2.'<br/><br/>'
                           .'<input type="submit" class="btn btn-primary" name="update">'
                           . '</form>';
                           break;
                       case 3:
                           $book1= getBooksFromStudent($regNo, 1);
                            $bookName1= getBookNameByID($book1);
                            $book2= getBooksFromStudent($regNo, 2);
                            $bookName2= getBookNameByID($book2);
                            $book3= getBooksFromStudent($regNo, 3);
                             $bookName3= getBookNameByID($book3);
                             $checkBoxVals='<form action="#" method="post" class="form-inline">'
                           . ' <input type="radio" class="form-control" value="1-'.$regNo.'-'.$book1.'" name="rad">'.$bookName1.'&nbsp;&nbsp;&nbsp;'
                           . ' <input type="radio" class="form-control" value="2-'.$regNo.'-'.$book2.'" name="rad">'.$bookName2.'&nbsp;&nbsp;&nbsp;'
                           . ' <input type="radio" class="form-control" value="3-'.$regNo.'-'.$book3.'" name="rad">'.$bookName3.'<br/><br/>'
                           .'<input type="submit" class="btn btn-primary" name="update">'
                           . '</form>';
                           break;
                       
                   }
            
            
            
            
        }
    }


if(isset($_POST["update"]))
                  {
                    $raw=$_POST["rad"];
                    $num= seperateData($raw, 0);
                    $regno=seperateData($raw, 1);
                    $bookid=seperateData($raw, 2);
                    $olddate=getDateFromDataBase($num, $regno);
                    $newDate= date_create(date("d-m-Y"));
                    $oldDate= date_create($olddate);
                    $days= date_diff($oldDate,$newDate);
                    $day="".$days->format("%a");
                    $extraDays=0;
                   // echo $days->format("%a");
                    if($day>7){$extraDays=$day-7;}
                    $cost=$extraDays*5;
                    $msg.='<br>';
                    $msg.='Fine amount:'.$cost.'<br>';
                   $msg.= updateTables($num, $regno, $bookid);
                   
                   
                  //    header("location:takeBackBooks.php?val=".$num."&&regno=".$regno."&&bookid=".$bookid);
                     //echo $msg;
                     
                  }





?>
        
        
          <div class="backgroundimg" style="height: 100%;">
      <!-- navbar -->

  <!-- <div class="logo">
  </div>  !-->               
<nav class="navbar">
<a class="navbar-brand"><div style="font-size:30px; color:white;">Library Management System</div>
</a>
<div class="container">
<div class=" navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right ">
<li class="dropdown navTxt">
<li class="active"><a class="navTxt" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION["user"];?>
<ul class="dropdown-menu">
    <li><a href="./logout.php" class="active" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';" ><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</p></a></li>
</ul></a>
 </li>
 </li>
</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="active"><a class="navTxt"  href="./index.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
<li class="dropdown navTxt">
<li class="active"><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-triangle-bottom">     
<ul class="dropdown-menu">
    <li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./addStudent.php"  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-plus-sign "></span>&nbsp;<span class="glyphicon glyphicon-user"></span> Add Student</p></a></li>
    <li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./addBook.php"  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-plus-sign "></span>&nbsp;<span class="glyphicon glyphicon-book"></span> Add Book</p></a></li>
<li class="divider"></li>
<li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./issueCard.php" class="active" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';" ><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-picture "></span>&nbsp;Issue Library Card</p></a></li>
<li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./manageCard.php" class="active" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';" ><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-dashboard "></span>&nbsp;Manage Library Cards</p></a></li>
<li class="divider"></li>
<li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./issueBook.php" class="active" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';" ><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-minus-sign "></span>&nbsp;<span class="glyphicon glyphicon-book"></span>&nbsp;Issue Book</p></a></li>
<li  onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><a href="./bookReturns.php"   class="active"><p class="dropDownText fontColor" onmouseover="this.style.color='#337ab7';" onmouseout="this.style.color='white';"><span class="glyphicon glyphicon-refresh "></span>&nbsp;<span class="glyphicon glyphicon-book"></span>Book Returns</p></a></li>

</ul>
</span>
</a>
</li>
</li>
</ul>
</div>
</div>
<hr>
</nav>

   <center>
       <form action="#" method="post" class="form-inline">
        
           <input type="text" class="form-control" name="registerno" id="registerno" placeholder="Enter Book Register no" autocomplete="off"> <div id="x" style="color:cyan;"></div><br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Check">
          </form>
       </center>
    <div class="container" align="center">
    <div class="row ">
    <div class="panel panel-primary" >
        <div class="panel-heading"><h4>Books taken:<?php  echo"".$bookCount;?></h4></div>
        <div class="panel-heading"><h5>Please select:</h5></div>
        <div class="panel-body"> <?php 
                       
                echo $checkBoxVals;
         
                ?>
        
        </div>
        
    </div>
    </div>
    </div>
    <div style="position: absolute; top:400px;left:500px;"><?php echo $msg; ?></div></div>

  

        <script>
        
        $('input#registerno').blur(function(){
            var regNo=$('input#registerno').val();
            if(regNo===''){$('input#registerno').focus();}
        });
   $('input#registerno').keyup(function(){
       var regNo=$('input#registerno').val();
            if(regNo===''){$('input#registerno').focus();}
            else{
              
                $.post('basicHelper.php',{RegNo:regNo},function(data){
                    $('div#x').html(data);
                });
            }
        });
        
        
        </script>
    </body>
</html>

