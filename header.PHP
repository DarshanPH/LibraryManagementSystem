<?php
    
    require './framework.php';
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
        <script src="js/jquery.min.1.11.1.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="css/font-awesome.min.css">
        
  
   
        <style>
            
                    .alignmentForRegisterBox{
                    position: absolute;
                    top:100px;
                    left:400px;
                }

                        .nav > li > a:hover,
.nav > li > a:focus {
    background-color: orange;
    color:#fff;
    border-radius: 20px;
    transition: 0.5s;
}
                  
                     /* .jumbotron
                      {
                        width: auto;
                        height: auto;
                        background-color: #591b5b;/*#772953;*/
                        /*color: red;
                        size: cover;
                        font-size: 25px;
                        margin-left: 60%;
                        border-radius: 20px 20px 20px 20px;
                        margin-top: 4%;
                      } */
                
                .errorMSG{
                    color:blue;
                    
                }
                .paragraph{
                  /*  color: #2eb4f7*/;
                  padding-top: 3px; 
                  
                    color:white;
                }
                .centre{
                    position: absolute;
                    top: 175px;
                    left: 600px;
                    padding: 30px;
                }
                .box{
                    height: auto;
                    width: 100%;
                    padding: 5px;
                    background-color:  #772953 ;/*#e95420*/
                    border-radius: 7px;
                    color:white;
                    font-size: 20px;
                    height: auto;
                }
               .text{
                    color: white;
                    
                }
                .pad{
                    padding-bottom: 6px;
                    padding-top: 6px;
                    padding-left: 6px;
                    padding-right:6px;
                }
                .successtxt{
                    color:saddlebrown;
                    
                }
                 .navbar{
                    

                    
                    /* #e95420*/
                    border-radius: 0;
                    
                    
                }
                  @font-face{
                font-family:Ubuntu;
                src:url(fonts/Ubuntu.ttf);
                
                
                
         }
         .navTxt{
             color: white;
            font-size: 25px;
         }
         .dropdown-menu{
              background-color: #591b5b; /* #e95420*/;
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
         .inputTxt{
             color:black;
         }
           .backgroundimg
                    {
                        background-image: url("img/imgcover.jpg");
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;
                        margin-top: auto;
                       width: 100%;
                      }
         .backgroundcol
                    {
                        background-color: black;
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;
                        margin-top: auto;
                        height: 1000px;
                        width: 100%;
                      }
                      .fntsize{
                        font-size: 20px;
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
         
         
                </style>
                
    </head>
    <body style="background-color: #80bfff;; font-family: Ubuntu; " >
       