
   
<?php
include './header.php';
include './navbar.php';
?>


<?php
if(isset($_GET['regno']))
{
    $regno=$_GET['regno'];
    global $echoMsg;
    $echoMsg='Something went wrong!';
    $echoMsg= generateIdCard($regno);
    ?> 
<center>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="img-responsive">
<div id="img"></div>
   </div>
        </div>
    </div>
</div>
</center>
<script>
data="<?php echo $echoMsg?>";
$('div#img').html(''+data+'');
</script>

<?php
}else{
?>

             
<nav class="navbar" style="background-color: #772953; height: 10%;">
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
<div  id="regnobox">      
<div class="container">
<div class="row">
<div class="col-md-6">
<div style="background-color:  #772953; border-radius: 20px 20px 20px 20px; position: relative; top: 20px;">
<div class="jumbotron text-center" style="color: white; background-color: #63707c; background-size: cover; border-radius: 20px 20px 0px 0px;">
<h2> Enter Register No</h2>
</div>
<center>
<div class="form-inline">
<input type="text" id="regno" placeholder="Enter Register No" name="regno" class="form-control"><div id="student"></div><div id="regnoerror"></div><br>
<center><input type="submit" id="submit" value="submit" class="btn btn-primary"></center><br>
</div>
</center>
</div>
</div>
</div>
</div>
</div>
    </center>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="img-responsive">
<div id="img"></div>
   </div>
        </div>
    </div>
</div>
</center>
    

        
        <script>
           
         $('input#regno').keyup(function(){
             var regno=$('input#regno').val();
             if(regno!==''){
                 $('div#regnoerror').html("");
                $.post('basicHelper.php',{RegNo:regno},function(data){$('div#regnoerror').html('<h2 style="color:white">'+data+'</h2>');});
   
             }
             else{
                 
                 $('input#regno').focus();
                 
             }
             
             
         });
         
          $('input#submit').blur(
              function(){
                  
                  var regno=$('input#regno').val();
             if(regno===''){
             
                 $('div#regnoerror').html("<p>This field cannot be blank</p>");
                 $('input#regno').focus();
                 
             }
             else{
                
   
                 $('div#regnoerror').html("");
             }
              });
              


            $('input#submit').on('click',function(){
               var regno=$('input#regno').val();
            $.post('basicHelper.php',{idcard:regno},function(data){
                    
                     $('div#img').html(data);
                      $('div#regnobox').hide();
                 });
             }
                 );
            
         </script>

    </body>
    
</html>
<?php
}

?>