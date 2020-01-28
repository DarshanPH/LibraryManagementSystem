
        <?php
        include './header.php';
        include './navbar.php';
        ?>
<div id="message" style="position: absolute;top:100px;left:500px;"  ></div>
 <div id="idcardList" style="position: absolute;top:100px;left:500px;"></div>

<script>

 $('document').ready(
            function(){
                $.post(
                'basicHelper.php',
                {idcardManager:1},
                function(data){
                    $('div#idcardList').html(data);
                }
                
                );
                
            }    
            );
function deleteIdCard(id){
    var name=id;
    $.post(
       'basicHelper.php',
       {deleteIdCard:name},
       function(data){
           $('div#message').html(data);
           refresh();
          
       }
                
       );
}

function refresh(){
    
    $.post(
                'basicHelper.php',
                {idcardManager:1},
                function(data){
                    $('div#idcardList').html(data);
                }
                
                );
}
</script>
        
        <div class="backgroundcol"></div>


    </body>
</html>
