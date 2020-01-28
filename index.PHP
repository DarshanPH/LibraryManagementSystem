<?php

session_start();
   if(isset($_SESSION['user']))
   {
       
   }
 else {
        session_destroy();
       header("location:login.php"); 
        
 }
     ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="./js/jquery.min.1.11.1.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
    
    
    <body>

      <style type="text/css">
                
            .navbar{
                background-color: #772953;
                color: white;
                 } 
                  .box{
                    height: auto;
                    width: auto;
                    padding: 5px;
                    background-color:  #772953 ;/*#e95420*/
                    border-radius: 7px;
                    color:white;
                  }

                    @font-face{
                font-family:Ubuntu;
                src:url(fonts/Ubuntu.ttf);
                }

                /*.btn{
                background-color: black;
                width: 90%;
                height: 50px;
                text-align: center;
                border: 2px solid black;
                border-radius: 20px 20px 20px 20px; 
                
            } */

             .backgroundcol
                    {
                        background-color: black;
                        background-size: cover;
                         height: 100vh;
                      }
                      .jumbotron{
                              background-image: url("./img/cover.jpeg");
                              background-size: cover;
                              height: 25%;
                            }
                      
                      /*.jumbotron
                      {
                          width: 45%;
                          height: auto;
                        margin-top: 5%;
                        border: 2px solid white;
                        background-color: #772953;
                        border-radius: 20px 20px 20px 20px;
                          
                      } */
         

                      
      </style>
        <div class="backgroundcol">

          <div class="fntcol" style="color: white; font-family: Ubuntu;">
                 <div class="jumbotron text-center">
                     <nav class="navbar navbar-fixed-top" style="font-family:ubuntu;">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed">
              <span class="sr-only"> Toggle navigation </span>
              <span class="iconbar"></span>
              <span class="iconbar"></span>
              <span class="iconbar"></span>
            </button>
            <a class="navbar-brand" href="login.php" style="color: white; font-family: Ubuntu; font-size: 25px;"> Library Management System </a>
          </div>

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

              <li class="active"><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-back"><span class="glyphicon glyphicon-off"></span>  LOGOUT </span></a></li>
            </ul>
          
           <div class="container">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#"><span class="glyphicon glyphicon-exclamation-sign" style="color: white;">  HELP </span></a></li>
            </ul>
         
           
           
          
</div>
</nav>
      
       
       <!-- <center>
      <div class="jumbotron">
          <div class="container">
            <div class="row">  
       
           
   
              
                <form action="addBook.php" method="post">
                    <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span class="glyphicon glyphicon-user"></span>   Add Book </button>
                    </form>

                                
               <form action="addStudent.php" method="post">
                    <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span class="glyphicon glyphicon-user"></span> Add Student</button>
                                      </form>
                  
                <form action="issueBook.php" method="post">
                    <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-book"></span> Issue Book</button>
                  </form>
                 <form action="bookReturns.php" method="post">
                     <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-refresh"></span> Return Book</button>
                  </form>
                   !-->
                
               
                                        

                          

                     

                    
                  
                   <h2> welcome </h2>
                       </div> <br/>
                  
                 
                 <div class="row">
                  <center>
                    <div class="col-md-2">
                      <a href="addBook.php">
                        <img src="img/addbook.jpeg" alt="Responsive image" class="img-circle"></a>
                     <br><br> <h2> Add Book </h2>
                      <p> In this block contains Book information. Which means it can contain Book Id, Book name, total stock availabality and the Auyhor name </p>
                      <form action="addBook.php" method="post">
                    <button class="btn btn-primary"> <span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span class="glyphicon glyphicon-user"></span>   Add Book </button>
                    </form>

                 </div>
                 <div class="col-md-2">
                  <a href="addStudent.php">
                    <img src="img/addstudent.jpeg" alt="Responsive image" class="img-circle"></a>
                  <br><br> <h2> Add student </h2>
                   <p> In this block contains Student information. Which means it can contain Name, Register number, branch, semister and The address of the student </p>
                    <form action="addStudent.php" method="post">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span class="glyphicon glyphicon-user"></span> Add Student</button>
                                      </form>
                 </div>
                 <div class="col-md-2">
                  <a href="issueBook.php">
                    <img src="img/issuebook.jpeg" height="29%" width="100%" alt="Responsive image" class="img-circle"></a><br/>
                   <br><h2> Issue Book </h2>
                   <p>In this block working the operation of issueing book, For issueing book. The Admin can enter the Student Register numner and Book ID</p>
                   <form action="issueBook.php" method="post">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> Issue Book</button>
                  </form>
                 </div>
                 <div class="col-md-2">
                  <a href="bookReturns.php">
                    <img src="img/returnbook.jpeg" alt="Responsive image" class="img-circle">
                  </a><br><br>
                  <h3> Return Book</h3>
                   <p> In this block working the operation of Returning book. For returning the book,The library icharge or Admin enter the Student Register numner. </p>
                    <form action="bookReturns.php" method="post">
                     <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-refresh"></span> Return Book</button>
                  </form>
                 </div>
                      <div class="col-md-2">
                  <a href="readData.php">
                    <img src="img/readdata.png" alt="Responsive image" class="img-circle" width="100%;">
                  </a><br><br>
                  <h3> Read data</h3>
                   <p> In this block working the operation of Returning book. For returning the book,The library icharge or Admin enter the Student Register numner. </p>
                    <form action="bookReturns.php" method="post">
                     <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-refresh"></span> Read data</button>
                  </form>
                 </div>
                      <div class="col-md-2">
                  <a href="stockVerification.php">
                    <img src="img/stockverification.jpeg" alt="Responsive image" class="img-circle" width="100%;">
                  </a><br><br>
                  <h3> Stock verification</h3>
                   <p> In this block,working the operation of stock verification, which means it will shows the book, student doesn't return, and his/her Details </p>
                    <form action="stockVerification.php" method="post">
                     <button class="btn btn-primary" style="font-family: Ubuntu; font-size: 18px;"><span class="glyphicon glyphicon-refresh"></span> Stack verification</button>
                  </form>
                 </div>
               </center>
                </div>
              </div>
              <hr>
            
            



          <!--  <nav class="navbar navbar-fixed-bottom" style="font-family: Ubuntu; height: 30px;">
                        <div class="navbar-text pull-left">
                           <h4> Devoloped by polytechnic students sirsi </h4>
                          </div>
                          <div class="container">
                          <div class="navbar-text pull-right">
                          <a href="https://www.facebook.com" target="new"><i class="fa fa-facebook fa-2x" style="color: white;"></a></i> 
                           <a href="https://www.twitter.com" target="new"><i class="fa fa-twitter fa-2x" style="color: white;"></a></i>
                            <a href="https://www.googleplus.com"v target="new"><i class="fa fa-google-plus fa-2x" style="color: white;"></a></i> 
                          </div>  
                      </nav> !-->

          <!--  <p class="success"><a href="issueCard.php" class="btn btn-link">click</a> to issue idcard</p>
            <a href="logout.php">logout</a> 
        </center> !-->
    </body>
    
</html>
