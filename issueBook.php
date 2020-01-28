<?php
include './header.php';
include './navbar.php';
//session ends here
     $echoMSG="";
     
     if(isset($_POST["issueBook"]))
         {
              $bookid=$_POST["bookId"];
              $regno=$_POST["registerNo"];
              $bookCount=0;
              $studentCheck= isStudent($regno);
              $studentEligibility= isStudentEligible($regno);
              if($studentCheck)
              {
                 $bookCount=getBookCount($regno);
              }
              else {$echoMSG='<br>Student not found';}
              $bookCheck= isBook($bookid);
              $date=date("d-m-Y");
              $bookStockAvailable=checkBookStock($bookid);
              $bookStockCount=bookStockcount($bookid);
              $updated_book_count=$bookStockCount-1;
              if($studentEligibility&&$bookCheck&&$studentCheck&&$bookStockAvailable)
                {
                 $query_for_updating_studentTable=designUpdateQueryWhileIssueingBook($bookCount, $regno, $bookid,$date); 
                 $query_for_updating_bookStock="UPDATE `books` SET `BOOK_COUNT`='$updated_book_count' WHERE `book_id`='$bookid'";
                 if(mysql_query($query_for_updating_bookStock)&&mysql_query($query_for_updating_studentTable))
                 {
                  $echoMSG="Book issue is registerd<br/> Database updated";
                 }
                 else {
                     $echoMSG="".mysql_error();
                 }
               }
               else if(!$studentEligibility)
               {
                   $echoMSG="Student already took 3 books<br/> Limit reached";
               }
                else if(!$bookCheck)
               {
                   $echoMSG="Book Not Found";
               }
                else if(!$studentCheck)
               {
                   $echoMSG="Student is not a member of Library.<br/> Tell him to register for Library";
               }
                else if(!$bookStockAvailable)
               {
                   $echoMSG="<br/>Book out of stock";
               }
              
         }
 
       
  ?>

        
          <style type="text/css">
            .jumbotron{
              background-color: #591b5b;
              background-size: cover;
            
            }
              .form-control
        {
                        width: 80%;
                        border-radius: 20px 20px 20px 20px;
                        height: 50px;
                        color: black ;
                        background-color: white;
                        text-align-last: left;
        }
          </style>


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
        
                  
                 
                    <br>
                      <div class="container" style= "width: 50%;">
                    <div class="panel panel-danger" style="background-color: #591b3b;">
                      
                        <div class="panel panel-heading">
                      <h2><center> Enter Below Details </center></h2><br><br>
                    </div>
                      <div class="pannel">
                      <form action="#" method="post">
                <p class="paragraph pad"> Enter Book Id</p><center> <input type="text" autocomplete="off" class="form-control pad" name="bookId" id="bookId" placeholder="Enter Book Id" ></center><div id="bookIdError" ></div><div id="bookStatus" ></div>
        <p class="paragraph pad"> Enter register no </p><center><input type="text" autocomplete="off" class="form-control pad" name="registerNo" id="registerNo" placeholder="Enter student Register no" > </center><div id="registerNoError" ></div><div id="studentStatus" ></div>
        <br><center> <input type="submit" class="btn btn-primary" name="issueBook" value="Issue Book"> </center>
        </form>
       <center><br><br><div id="echoMsg" style="color:white;"><?php echo $echoMSG;?></div></center>
      </div>
    </div>
        </div>
             
   



       
        
       
        <!--Form ends here-->
        
        
        <script src="js/jquery.min.1.11.1.js"></script>
        <script>
            
            $('document').ready(function(){
                
                $('input#bookId').focus();
             });//ready ends here
             
             
             
               $('input#bookId').keyup(function(){
                   if( $('input#bookId').val()===''){ $('div#bookIdError').html('<p style="color:red">This field cannot be Blank</p>'); this.focus();}else{$('div#bookIdError').html('')}
                 var bookid=$('input#bookId').val();
                 if(bookid!=''){
                     $.post('basicHelper.php',{isbook:bookid},function(data){
                       
                          $('div#bookStatus').html(data);
                         });}
                 else{ 
                     $('div#bookStatus').html('');
                 }
            });
              $('input#registerNo').keyup(function(){
                  if( $('input#registerNo').val()===''){ $('div#registerNoError').html('<p style="color:red">This field cannot be Blank</p>'); this.focus();}else{$('div#registerNoError').html('')}
                 var regNo=$('input#registerNo').val();
                 if(regNo!=''){
                     $.post('basicHelper.php',{isstudent:regNo},function(data){
                       
                          $('div#studentStatus').html(data);
                         });}
                 else{ 
                     $('div#studentStatus').html('');
                 }
            });
             
             
             
             
             
             
             $('input#bookId').keyup(function(){
                 if( $('input#bookId').val()===''){ $('div#bookIdError').html('<p style="color:red">This field cannot be Blank</p>'); this.focus();}else{$('div#bookIdError').html('')}
                 var bookid=$('input#bookId').val();
                 if(bookid!=''){
                     $.post('basicHelper.php',{bookid:bookid},function(data){
                         
                          $('div#results').html(data);
                         });}
                 else{ 
                    $('div#results').html('');
                 }
           
           
           });
               $('input#registerNo').keyup(function(){
                 if( $('input#registerNo').val()===''){ $('div#registerNoError').html('<p style="color:red">This field cannot be Blank</p>'); this.focus();}else{$('div#registerNoError').html('')}
                 var regno=$('input#registerNo').val();
                 if(regno!=''){
                     $.post('basicHelper.php',{studentCheckForIssueingBook:regno},function(data){
                        
                          $('div#results1').html(data);
                          
                         });}
                 else{ 
                     $('div#results1').html('');
                 }
             
             
             });
             $('input#registerNo').blur(function(){if( $('input#registerNo').val()===''){ $('div#registerNoError').html('<p style="color:red">This field cannot be Blank</p>'); this.focus();}else{$('div#registerNoError').html('')}});
              $('input#bookId').blur(function(){ if( $('input#bookId').val()===''){ $('div#bookIdError').html('<p">This field cannot be Blank</p>'); this.focus();}else{$('div#bookIdError').html('')}});
            
             
           
 
            
            
        </script>
    </body>
</html>
