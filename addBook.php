 <?php
    $echoMSG="";
    include './header.php';
    include './navbar.php';
      if(isset($_POST["submit"])) 

 
         {
             $status=FALSE; 
             
             $bookname=mysql_real_escape_string($_POST["bookname"]);
             $bookid=mysql_real_escape_string($_POST["bookid"]);
             $bookCount=mysql_real_escape_string($_POST["bookstock"]);
             $author=mysql_real_escape_string($_POST["author"]);
             $stockCount=$bookCount;
             if(!isNull($bookname)&&!isNull($bookid)&&!isNull($bookCount)&&!isNull($author)){
                 $status= bookNotInLibrary($bookid);
                if($status){
                    
              $query="INSERT INTO `books`( `BOOK_NAME`, `BOOK_ID`, `STOCK_COUNT`, `BOOK_COUNT`, `BOOK_AUTHOR`) VALUES('$bookname','$bookid','$stockCount','$bookCount','$author')";
             if(mysql_query($query))
                 {
             
 	            $echoMSG="<center>Book Added.</center><br/>";
             }
             else
             {
	      echo ' <p>'.mysql_error();
             }
                    
                }
                    else{$echoMSG.=' <p>Book exists in Library</p>';}
                  }
             else{
                 $echoMSG=' <p>Fill all the fields</p>';
             }
             
         }
       
       
?>

     

                    <style type="text/css">
                        .jumbotron{
                            background-image: url("img/addbookcover.jpg");
                            background-size: cover;
                        }
                         .form-control
                    {
                        width: 80%;
                        border-radius: 20px 20px 20px 20px;
                        height: 50px;
                        color: black ;
                        background-color: white;
                       
                    }
                    .logo{
                        background-image: url("img/cover2.jpg");
                        height: 15%;
                        background-size: cover;
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
      
      


        <!--Input form stqarts-->
     
           <div class="container" style="width: 40%;">

             <div class="backcol" style="background-color: #591b5b; border-radius: 20px 20px 20px 20px; width: auto;">  
            <div class="jumbotron text-center" style="margin-top: 5%; border-radius: 25px 25px 0px 0px; height: 25%;">
                
            </div>
                    <center><div class="fntcol" style="color: white; "><h2> Please Enter all Data </h2> </div></center>
                    <div class="fntsize">
        <form action="#" method="post"><p class="paragraph Text" id="bookidtxt"><span class="glyphicon glyphicon-pencil"> Book name </span>
           </p><center><input type="text" id="bookname" name="bookname" class="form-control" placeholder="Enter Book name" ></center><div id="booknameerror"></div>
        <p class="paragraph Text" id="bookidtxt"><span class="glyphicon glyphicon-barcode"> Book id </span></p> <center> <input type="text" id="bookid" name="bookid" class="form-control" placeholder="Enter Book id" ></center><div id="bookiderror"></div>
        <p class="paragraph Text" id="bookstocktxt"><span class="glyphicon glyphicon-book"> Book stock </span></p> <center> <input type="number" id="bookstock" name="bookstock" class="form-control" placeholder="Enter Book stock" ></center><div id="bookstockerror"></div>
        <p class="paragraph Text" id="authortxt"><span class="glyphicon glyphicon-info-sign"> Author </span></p> <center> <input type="text" id="author" name="author" class="form-control" placeholder="Enter book author" ></center><div id="authorerror"></div>
        <br> <center>  <input type="submit" id="submit" name="submit" value="Submit"  class="btn btn-primary Text" style="border-radius: 20px 20px 20px 20px; width: 15%; height: 6%;"></center>
         </form> <br/><br/>
         <div id="status" style="color:white;"><p><?php echo $echoMSG;?></p></div>
    </div>
        </div>  <!--backcol, This is for Jumbotron back color !-->
        </div>    <!-- container !-->
    </div> <!-- backgroundcol --!>
        
    
        <!--Input form ends !-->
        
       




        
           <script src="js/jquery.min.1.11.1.js"></script>
        <script>
        $('document').ready($('input#bookname').focus());
        
        
          $('input#bookname').blur(
                    function(){
                        if(this.value=='')
                        {
                            $('div#booknameerror').html('<p style="color:red">Book name required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#bookiderror').html("");
                        }
                    }
  
            
  );
        $('input#bookname').keyup(
                    function(){
                        if(this.value=='')
                        {
                            $('div#booknameerror').html('<p style="color:red">Book name required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#booknameerror').html("");
                        }
                    }
  
            
  );
    $('input#bookid').blur(
                    function(){
                        if(this.value=='')
                        {
                            $('div#bookiderror').html('<p style="color:red">Book Id required</p>');
                             $('input#bookid').addClass("errorInput");
                             this.focus();
                        }
                        else
                        {
                            $('div#bookiderror').html("");
                            $('input#bookid').removeClass("errorInput");
                        }
                    }
  
            
  );
    $('input#bookid').keyup(
                    function(){
                        if(this.value=='')
                        {
                            $('div#bookiderror').html('<p style="color:red">Book Id required</p>');
                            $('input#bookid').addClass("errorInput");
                             this.focus();
                        }
                        else
                        {
                            $('div#bookiderror').html("");
                            $('input#bookid').removeClass("errorInput");
                            
                        }
                    }
  
            
  );
    $('input#bookstock').blur(
                    function(){
                        if(!this.value)
                        {
                            $('div#bookstockerror').html('<p style="color:white">Book stock required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#bookstockerror').html("");
                        }
                    }
  
            
  );
  $('input#bookstock').keyup(
                    function(){
                        if(!this.value)
                        {
                            $('div#bookstockerror').html('<p style="color:white">Book stock required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#bookstockerror').html("");
                        }
                    }
  
            
  );
    $('input#author').blur(
                    function(){
                        if(!this.value)
                        {
                            $('div#authorerror').html('<p style="color:white">Book author required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#authortxt').html("");
                        }
                    }
  
            
  );
  $('input#author').keyup(
                    function(){
                        if(this.value=='')
                        {
                            $('div#authorerror').html('<p style="color:white">Book author required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#authorerror').html('');
                        }
                    }
  
            
  );
        </script>
        
        
        
    </body>
</html>
