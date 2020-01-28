  <?php
include './header.php';
include './navbar.php'; 
    
          
 ?>
    
      <!-- navbar -->

  <!-- <div class="logo">
  </div>  !-->               
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
    <center><div id="student_status"></div></center>
        <center> <div class="container">
            <div class="table-responsive">
                 <h1>Student</h1>
                <div id="table_student"></div>
            
            </div>
          </div>
    
    <br><br><br>
    
    
    <center><div id="book_status"></div></center>
    <div class="container">
            <div class="table-responsive">
                <h1>Books</h1>
                <div id="table_books"></div>
            
          
        
        
        
        </div>
        </center>
        <script>
        
        $(document).ready(
            function(){
                    function fetch_data(){
                        $.post('fetch.php',{fetch_student_data:1},function(data){
                        $('#table_student').html(data);
                         });
                          $.post('fetch.php',{fetch_book_data:1},function(data){
                        $('#table_books').html(data);
                         });
           
                    }
                    fetch_data();
                    function edit_data(id,text,column_name){
                        
                        $.post(
                               'edit.php',
                               {student:1,id:id,text:text,column_name:column_name},
                               function(data){$('div#student_status').html(data);
                                   setTimeout(function setNull(){$('div#student_status').text("");},3000);
                               }
                               );
                       }
                       function edit_book_data(id,text,column_name){
                        
                        $.post(
                               'edit.php',
                               {edit_book:1,id:id,text:text,column_name:column_name},
                               function(data){$('div#book_status').html(data);
                                   setTimeout(function setNull(){$('div#book_status').text("");},3000);
                               }
                               );
                       }
                     
                       
          /*edit student data function calls   */   
             $(document).on('blur','.name',function(){
              var id=$(this).data("id1");
              var text=$(this).text().trim();
              edit_data(id,text,"STUDENT_NAME");
              });
               $(document).on('blur','.regno',function(){
              var id=$(this).data("id2");
              var text=$(this).text().trim();
              edit_data(id,text,"REGISTER_NO");
              });
               $(document).on('blur','.sem',function(){
              var id=$(this).data("id3");
              var text=$(this).text().trim();
              
              
              if(parseInt(text)>0&&parseInt(text)<7){edit_data(id,text,"SEMESTER");}
              else{$('div#student_status').text("Please input correct semester (1-6 only allowed)");
                  setTimeout(function setNull(){$('div#student_status').text("");},3000);
                  fetch_data();}
              
              });
               $(document).on('blur','.address',function(){
              var id=$(this).data("id4");
              var text=$(this).text().trim();
              edit_data(id,text,"ADDRESS");
              });
               $(document).on('blur','.department',function(){
              var id=$(this).data("id5");
              var text=$(this).text().trim();
              edit_data(id,text,"DEPARTMENT");
              });
                
             //Edit student data ends here
             //Edit books data starts here
             $(document).on('blur','.bookname',function(){
              var id=$(this).data("id10");
              var text=$(this).text().trim();
              edit_book_data(id,text,"BOOK_NAME");
              });
               $(document).on('blur','.bookid',function(){
              var id=$(this).data("id11");
              var text=$(this).text().trim();
              edit_book_data(id,text,"BOOK_ID");
              });
               $(document).on('blur','.bookauthor',function(){
              var id=$(this).data("id12");
              var text=$(this).text().trim();
              edit_book_data(id,text,"BOOK_AUTHOR");
              });
             $(document).on('click','.delete_book',function(){
              var id=$(this).data("id13");
              var text=$(this).text().trim();
              edit_data(id,text,"STUDENT_NAME");
              });
             
             
             
             
             
             
             
             
             
             
             
             
             
            });
        
        //edit books ends here
             //Delete function starts here
             
             function deletedata(id,tableno)
             {
                if(tableno==1){
                    
                    
                     $.post(
                            "delete.php",
                             {deletestudent:1,id:id},
                             function(data){
                                 $('div#student_status').html(data);
                                 setTimeout(function loadagain(){function fetch_data(){
                                        $.post('fetch.php',{fetch_student_data:1},function(data){
                                        $('#table_student').html(data);
                                         });
                                          $.post('fetch.php',{fetch_book_data:1},function(data){
                                        $('#table_books').html(data);
                                         });

                                    }
                                    fetch_data();}
                                     ,100);
                                   setTimeout(function setNull(){$('div#student_status').html("");},3000);
                                   
                             }
                             );
                             
                    
                    
                    
                }
                else if (tableno==2){
                     $.post(
                            "delete.php",
                             {deletebooks:1,id:id},
                             function(data){
                                 $('div#book_status').html(data);
                                 setTimeout(function loadagain(){function fetch_data(){
                                        $.post('fetch.php',{fetch_student_data:1},function(data){
                                        $('#table_student').html(data);
                                         });
                                          $.post('fetch.php',{fetch_book_data:1},function(data){
                                        $('#table_books').html(data);
                                         });

                                    }
                                    fetch_data();}
                                     ,100);
                                   setTimeout(function setNull(){$('div#book_status').html("");},3000);
                                   
                             }
                                
                
                
                        );
                }
             }
             
             

        
        
            //Delete function ends here
             
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </script>
    </body>
</html>
