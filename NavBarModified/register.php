<?php

include 'time_table_small.php';

?>
<html>
  <head>
    <title>New to Ajax</title>
    <script>
      function load()
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
          }
        }
      var text = document.getElementById("search").value;
      xmlhttp.open("GET","search.php?change_text="+text,true);
      xmlhttp.send();
      }

      function remove_random()
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
			
          }
        }
      xmlhttp.open("GET","random_pure.php",true);
      xmlhttp.send();
      load();
      setTimeout("remove_random()",2000);
      }
    </script>
  </head>
  <body>
  
  <br><h4 id="h4">Enter Course Name or Course Code</h4>
  <br><form>
  <input type="text" id="search" name="change_text" onkeyup="load()" onclick="remove_random()">
  </form>
  <br><div id="myDiv">
  </div>
  </body>
</html>


