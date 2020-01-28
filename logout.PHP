<?php
    session_start();
   if(isset($_SESSION["user"]))
        {
            unset($_SESSION["user"]);
            session_destroy();
            header('location:login.php?logout=successfully logged out');
        }
        else {
              
        }

/* session_start();
        if(isset($_SESSION["user"]))
        {
            unset($_SESSION["user"]);
            session_destroy();
            echo "Logged out";
        }
        else {
                echo"Already logged out!";
        }
        * */

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
    </body>
</html>
