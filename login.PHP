   <?php

   $echoMsg="";
   $logoutStat='';
   session_start();
   if(isset($_SESSION['user']))
   {
       header("location:index.php");
   }
 else {
       session_destroy();       
}
if(isset($_GET['logout'])){
    $logoutStat='  <div class="container" style="position: absolute;top:70px;left:450px"> <div class="row"> <div class="col-md-3"><div class="bg-success"> &nbsp;&nbsp;'.$_GET['logout'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <a href="./login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div></div></div></div><br>';
    //''.$_GET['logout'];
}
       if(isset($_POST["login"]))
{
       
     
         require './framework.php';
        
       
             $uname=mysql_real_escape_string($_POST["username"]);
            $password=md5($_POST["password"]);
            $dbpwd='';
            
            $query="SELECT * FROM `data` WHERE `USER_NAME`='$uname'";
            $result= mysql_query($query);
            if(mysql_num_rows($result)>0){
                $row= mysql_fetch_assoc($result);
                $dbpwd=$row["PASSWORD"];
                
            }
            else{
                $echoMsg="This is not admin";
            }
            if($password==$dbpwd)
            {
            session_start();
            $_SESSION['user']=$uname;
             header("location:index.php");
            }
            else
             {
                $echoMsg="Password doesnot match";
             }
           
            
            
            
            
            
}
        ?>
 
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="js/jquery.min.1.11.1.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/font-awesome.min.css">
            <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>

        



        <style>
                   .nv{
                    position: absolute;
                    top: 75%;
                    color: white;
                    left: 10%;
                    height: 25%;
                    border: 2px solid white;
                    font-family:Ubuntu-Mono;
                    font-size: 16px;
                    bottom: 6%;
                }
                        
                      .alignmentForRegisterBox{
                        width: auto;
                    position: absolute;
                    top:200px;
                    left: 1000px;
                    width: 400px;
                    text-align: center;
                }
                .errorMSG{
                    color:blue;
                    font-family: inherit;
                }
                .paragraph{
                  /*  color: #2eb4f7*/;
                  padding-top: 3px; 
                  
                    
                }
                .centre{
                    position: absolute;
                    top: 75px;
                    left: 500px;
                    padding: 30px;
                }
                .box{
                    height: auto;
                    width: auto;
                    padding: 5px;
                    background-color:  #772953 ;/*#e95420*/
                    border-radius: 7px;
                    color:white;

                }
               .Text{
                    color: white;
                    
                }
                .pad{
                    padding-bottom: 10px;
                    padding-top: 10px;
                    padding-left: 10px;
                    padding-right:10px;
                }
                .successtxt{
                    color:saddlebrown;
                    
                }
                 .navbar{
                    background-color:#772953;
                    /* #e95420*/
                    border-radius: 0;
                    
                }
                  @font-face{
                font-family:Ubuntu;
                src:url(fonts/Ubuntu.ttf);
                }
         .body{
             font-family: Ubuntu;
              color: white;
         }
         .navTxt{
             color: white;
            font-size: 25px;
         }
         .dropdown-menu{
              background-color: #772953 /* #e95420*/;
               color: white;
         }
         .dropDownText{
             
            font-size: 20px;
            
         }
         .fontColor{
             color: white;
             
             
         }
         .errorInput{
             border: 1px solid red;
             
         }
          .backgroundcol
                    {
                        background-color: black;
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;
                        height: 100vh;
                        width: 100%;
                      }

                      .inputWithIcon input[type-text]{
                        padding-left: 40px;
                        }

                        .inputWithIcon{
                            position: relative;
                        }

                        .inputWithIcon i{
                            position: absolute;
                            left: 0;
                            top: 3px;
                            bottom: 5px;
                            padding: 7px 7px;
                            color: white;
                            margin-left: 18%;
                        }
                       /* .inputWithIcon input[type=text]; focus + i{
                            color: dodgerBlue
                        }*/
                        .jumbotron
                        {
                               
                    position: absolute;
                    top:5%;
                    left: 5%;
                    width: 35%;
                   
                        }
                        bg-purple
                        {
                            background-color:#772953;
                            border: 1px solid;
                            border-color: white;
                            padding: 1.3rem;
                        }

                </style>
       
                        
    </head>
   
    <body class="body" style="background-color: black; font-family: Ubuntu; color:white;">


            <div class="backgroundcol">    <!--For background color!-->
     

        
        <!-- top nav bar strt from here !-->
        <nav class="navbar" role="navigation">
          <div class="navbar-header">
    <a class="navbar-brand"><div style="font-size:30px; color:white;">Library Management System</div>
        </a>
        </div>
        </nav>
<!-- top navbar end here !-->



                <!-- Welcome heading strt here !-->

                <div class="container">
                    <div class="row">
                     <div class="templatemo-line-header" style="margin-top: 30px;">
                        <div class="style-welcome">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey" style="color: #efeae6">WELCOME</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <!-- Welcome heading end here !-->

                <!-- slider start Here !-->
             
              <div class="container">
                <div class="row">
                <div class="col-md-4" style="width: 40%;">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <li data-target="#mycarousel" data-slide-to="0"></li>
                   <li data-target="#mycarousel" data-slide-to="1"></li>
                    <li data-target="#mycarousel" data-slide-to="2s"></li>
                      </ol>
                          <div class="carousel-inner">
                          <div class="item active">
                            <img src="img/library1.jpeg" >
                      </div>
                       <div class="item">
                            <img src="img/library2.jpeg" >
                      </div>
                       <div class="item">
                            <img src="img/library3.jpeg">
                      </div>
                </div>
              
              <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>  
             </div>
            </div>
            </div>
           
            <br>

                <!-- slider End Here !-->

      <?php echo $logoutStat;?>
        <!--Image SlideShow starts-->
        
        <!--Image slide show ends here-->
        <!--Login Box starts here-->
        
        <div id="inputForm">
        <div class="row">

        <div class="form-inline alignmentForRegisterBox"> <!--alignmentForRegisterBox this class for log in box !-->
            <div class="pad">
            <form class="form-inline " action="#" method="post">
              <div class="login-panel panel panel-danger" style="background-color: #772953">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    <p class="paragraph" id="unametxt" style="font-size: 15px;"><span class="glyphicon glyphicon-pencil"> Username </span></p> 
                        <div class="inputWithIcon">
                     <input type="text" autocomplete="off" id="username" name="username" class="form-control" placeholder="Enter username" ><div id="usernameeroor"></div>
                        <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                    </div>
                    <p class="paragraph" style="font-size: 15px;"><span class="glyphicon glyphicon-search"> Password </span></p> 
                          <div class="inputWithIcon">
                    <input type="password" autocomplete="off" id="password"  name="password" class="form-control" placeholder="Enter password"><div id="passworderror" >
                         <i class="fa fas fa-spinner fa-spin fa-pulse fa-lg"></i>
                    </div></div>
         <br/> <center>  
           <input type="submit" id="login" name="login" value="Login" class="form-control btn btn-primary"></center>
            </form>  
            </div>
            <div id="loginError"><p><?php echo $echoMsg;?></p></div>
          </div>
        </div>
        </div>
          </div>
            </div>
          </div>
           
            
            
            
       
        <!--Login Box ends-->
        
       <!--     <div class="nv">
         <div class="container">
                <div class="row" style="margin-top:20px; margin-bottom: 20px;">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-5 footer_txt" style="min-height: 120px;">
                         
                        <p>Copyright&copy;<?php //echo date('Y'); ?> Web Based Library Management System</p><tr/>
                           <div class="row">
                            Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new">Darshan Hegde </a>
                             Developer: <a href="https://www.facebook.com/Pranav Shastri" target="new">Pranav Shastri </a>
                         </div><br/>
                         <div class="row">
                             Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new">Chandan hegde </a>
                              Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new"> Prasad arrar </a>
                           </div>
                       
                        </div>
                          </div>
                 </div> /.row
            </div> /.container -->


            <!-- Copyright block -->
       
         <style type="text/css">
                                                                          .nv{
                                                                        position: absolute;
                                                                        top: 77%;
                                                                        color: white;
                                                                        left: 10%;
                                                                        height: 22%;
                                                                        border: 2px solid white;
                                                                        font-family:Ubuntu-Mono;
                                                                        font-size: 16px;
                                                                        bottom: 6%;
                                                                    }
                                                            </style>
    <div class="nv">
         <div class="container">

                <div class="row" style="margin-top:20px; margin-bottom: 20px;">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-4 footer_txt" style="min-height: 120px;">

                            <!--for connection !-->
                          <p>Copyright&copy;<?php echo date('Y'); ?> Web Based Library Management System</p><tr/>
                          <div class="row" style="position: absolute;left: 25px;">
                            Guided BY: <a href="https://www.facebook.com/vandana" target="new">  Ms.Roopa </a>
                          </div><br>
                           <div class="row" style="position: absolute;left: 25px;">
                            Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new">   Darshan Hegde </a>
                             Developer: <a href="https://www.facebook.com/Krishnasagar desai" target="new">   Krishnasagar desai </a>
                         </div><br/>
                         <div class="row" style="position: absolute;left: 25px;">
                             Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new">    Abhijith divate </a>
                              Devoloper: <a href="https://www.facebook.com/Darshan Hegde" target="new">   Anudeep </a>
                           </div>
                          </div>
                        </div>
                          </div>
                 </div><!-- /.row -->
            </div><!-- /.container -->
        
            <!-- copyrigt block end -->
           
        <script>
            
            $('document').ready(function(){
              
              /*  
                var count=1;
                if(count===1)
                { 
                    $('div#slideShow').html('<img src="2.jpg">'); 
                    count=count+1;
                }
                else if(count===2)
                {
                    $('div#slideShow').html('<img src="3.jpg">'); 
                    count=count+1;
                }
                else if(count===3)
                {
                    $('div#slideShow').html('<img src="1.jpg">'); 
                    count=1;;
                }
                
               */ 
            });
            
  $('input#username').blur(
                    function(){
                        if(!this.value)
                        {
                            $('div#usernameeroor').html('<p style="color:red">User name required</p>');
                             this.focus();
                        }
                        else
                        {
                            $('div#usernameeroor').html("");
                        }
                    }
  
            
  );
     $('input#password').blur(
                    function(){
                        if(!this.value)
                        {
                            $('div#passworderror').html('<p style="color:red">Password is required</p>');
                             this.focus();
                             
                        }
                        else{
                            $('div#passworderror').html('');
                        }
                    }
  
            
  );
  
  
$("input#login").on('click',function(){
    
var username=$('input#username').val();
var password=$('input#password').val();

if(username==='')
 {
     $('div#usernameeroor').text("username must be filled");
     
     $('input#username').focus();
 }
 if(password==='')
 {
     $('div#passworderror').text("password must be filled");
     $('input#password').focus();
 }


 


}
       );  
   
   
   
   
   
   $('input#username').keyup(function(){
       var username=$('input#username').val();
       if(username==='')
        {
            $('div#usernameeroor').text("username must be filled");

            $('input#username').focus();
        }
        else
        {
            $('div#loginError').html('');
            $.post('basicHelper.php',{login:username},function(data){
                $('div#usernameeroor').html(data);
            });

        }
       
       
   });
   
   
    $('input#password').keyup(function(){
        var password=$('input#password').val();
                        if(password==='')
                            {
                                $('div#passworderror').text("password must be filled");
                                $('input#password').focus();
                            }
                         else{$('div#passworderror').html("");}
                        
                        
                    });
     
        
        </script>


                    
    </body>
</html>
