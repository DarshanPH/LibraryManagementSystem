<?php
    include './header.php';
    include './navbar.php';
   
    $echoMSG="";
    if(isset($_POST["submit"]))
                {
                 $studentname=$_POST["name"];    
                 $regno=$_POST["regno"];   
                 $department=$_POST["dept"];
                 $semester=$_POST["sem"];
                 $email=$_POST["emailid"];
                 $address=$_POST["address"];
                 $bookcount=0; 
                 $book1="NULL";
                 $book2="NULL";
                 $book3="NULL";
                 $date1="NULL";
                 $date2="NULL";
                 $date3="NULL";
                 $status= studentIsNotRegistered($regno);
                 if(!isNull($studentname)&&!isNull($regno)&&!isNull($department)&&!isNull($address)&&!isNull($semester)&&!isNull($email)){
                 if($status)
                 {
                     $query="INSERT INTO `student`(`STUDENT_NAME`, `REGISTER_NO`, `SEMESTER`,  `EMAIL_ID` ,`ADDRESS`, `DEPARTMENT`, `BOOK_COUNT`, `BOOK_1`, `BOOK_1_DATE`, `BOOK_2`, `BOOK_2_DATE`, `BOOK_3`, `BOOK_3_DATE`) VALUES ('$studentname','$regno','$semester','$email','$address','$department','$bookcount','$book1','$date1','$book2','$date2','$book3','$date3')";
                     if(mysql_query($query))
                       {
                           $echoMSG='<p class="success">Student added.<br/> <a href="issueCard.php?regno='.$regno.'" class="btn btn-link">click</a> to issue idcard</p>';
                        }
                      else
                        {
                                $echoMSG='<p class="errorMSG danger">'.mysql_error().'</p>';
                        }

                     
                 }
                 }
                 else
                 {
                     //$echoMSG='<p class="errorMSG danger">Student already one of the library member<br/> please check and try again! :-)</p>';
                      
                 }
     }       
     // $echoMSG='<p class="errorMSG danger"></p>';
?>
          <div class="backgroundcol">
           <style type="text/css">
             /* .form-group
              {
                width: 35%;
                margin-left: 60%;
                background-color: #591b5b;
                text-align: center;
                font-size: 16px;
                border-radius: 20px 20px 20px 20px;
                margin-top: 2%;

              }  */
              .jumbotron
              {
                background-image: url("img/addstudentcover.jpeg");
                
              
              }
               .form-control
                    {
                        width: 70%;
                        border-radius: 20px 20px 20px 20px;
                        height: 35px;
                        color: black ;
                        background-color: white;
                       
                    }
            </style>

 <div class="backgroundimg">
     


      <!-- navbar -->

  <!-- <div class="logo">
  </div>  !-->               
<nav class="navbar">
<div class="navbar-header">
<a class="navbar-brand"><div style="font-size:30px; color:white;">Library Management System</div>
</a></div>
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
<!-- end navbar -->



        
<!-- end navbar -->
              
        
        <div class="container" style="width: 50%;">
              <div class="backcol" style="background-color: #591b5b; border-radius: 20px 20px 20px 20px; width: auto; position: relative; bottom: 10%; margin-top: 2%;">
              <div class="jumbotron" style="height: 25%;"></div>
              <div class="fntsize">
           <form action="#" method="post">
          <div class="paragraph pad" id="existsStatus"></div>
          <p class="paragraph pad">&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"> Name </span> </p><center><input type="text" id="name" name="name" class="form-control pad" placeholder="Enter name" ></center><div id="nameeroor" ></div>
          <p class="paragraph pad">&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"> Register No </span></p><center><input type="text" id="regno"  name="regno" class="form-control pad inputTxt" placeholder="Enter register no" ></center><div id="regnoerror"></div>
           <p class="paragraph pad">&nbsp;&nbsp;<span class="glyphicon glyphicon-inbox"> Email Id </span></p><center><input type="text" id="emailid"  name="emailid" class="form-control pad inputTxt" placeholder="Enter student email id" ></center><div id="emailerror"></div>
          <p class="paragraph pad">&nbsp;&nbsp;<span class="glyphicon glyphicon-education"> Department </span></p>
          <center><select class="form-control  inputTxt" name="dept" required="required">
                   <option class="form-control" value="0">Please select</option>
                   <option class="form-control" value="ISE">ISE</option>
                   <option class="form-control" value="CS">CSE</option>
                   <option class="form-control" value="Mechanical">mechanical</option>
                   <option class="form-control"  value="E&E">E&E</option>
                   <option class="form-control" value="E&C">E&C</option>
                   <option class="form-control" value="Civil">Civil</option>
                                
              </select> </center><div id="depterror"></div>
              <p class="paragraph pad">&nbsp;&nbsp;<span class="glyphicon glyphicon-education"> Semester </span></p>
              <center><select class="form-control inputTxt" name="sem" required="required">
                   <option class="form-control pad" value="0">Please select</option>
                   <option class="form-control" value="1">&#8544;</option>
                   <option class="form-control" value="2">&#8545;</option>
                   <option class="form-control" value="3">&#8546;</option>
                   <option class="form-control" value="4">&#8547;</option>
                   <option class="form-control" value="5">&#8548;</option>
                   <option class="form-control" value="6">&#8549</option>
                   <option class="form-control" value="7">&#8550;</option>
                   <option class="form-control" value="8">&#8551;</option>
                  </select> </center><div id="semerror"></div>
                <p class="paragraph pad"><span class="glyphicon glyphicon-list-alt">  Address </span></p> <center><textarea name="address" id="address" class="form-control" style="resize:none; " placeholder="Enter student address"></textarea></center><div id="addresserror"></div>
              <center><br/>  <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary pad" style="border-radius: 20px 20px 20px 20px; width: 20%; height: 5%;"></center>
                </form>
                
            <br><div id="echoMsg"><?php echo $echoMSG;?></div>
          </div>
        </div>
        <!-- box background col -->
      </div>
      <!-- container -->
     </div>  
     <!-- background image -->
       
  



            
         
       
         
         <script src="js/jquery.min.1.11.1.js"></script>
        <script>
            $('document').ready(function(){
               
            });
         $('input#name').keyup(function(){$('div#nameeroor').html('');});
         $('input#regno').keyup(function(){$('div#regnoerror').html('');});
         $('textarea#address').keyup(function(){$('div#addresserror').html('');});
         
         
      $('input#name').blur(function(){
            if(!this.value)
            {
              $('div#nameeroor').html('<p class="pad"> You should type name</p>');  
            $('input#name').focus();
             
            }
            
        });
         $('input#regno').blur(function(){
            if(!this.value)
            {
              $('div#regnoerror').html('<p class="pad"> You should enter registerno</p>');  
             $('input#regno').focus();
            }
            
        });
        $('textarea#address').blur(function(){
            if(!this.value)
            {
              $('div#addresserror').html('<p class=" pad"> You should enter Address</p>');  
             $('textarea#address').focus();
            }
            
        });
        
       $('input#submit'). click(function(){
       
       var name= $('input#name').val();
       var regno=$('input#regno').val();
       if(name==='')
       {
           $('div#nameeroor').html('<p class="pad"> You should enter name</p>');  
              $('input#name').focus();
       }
      else if(regno==='')
       {
           $('div#regnoerror').html('<p class=" pad"> You should enter registerno</p>'); 
            $('input#regnoerror').focus();
       }
      
        
    }
      );
      $('input#regno').keyup(function(){
         var regno=$('input#regno').val();
        $.post('basicHelper.php',{studentCheck:regno},function(data){$('div#existsStatus').html(data);});
   
      });
      $('input#regno').blur(function(){
         var regno=$('input#regno').val();
        $.post('basicHelper.php',{studentCheck:regno},function(data){$('div#existsStatus').html(data);});
   
      });
      </script>
    </div>
    </body>
</html>
