<!DOCTYPE html>
<html>
<head>
<title>Registeration</title>
<style>
body 
{   
	background-color: rgb(230, 242, 255);
}
div
{
	background-color:rgb(12, 47, 77);
	font-family:arial;
	font-size:300%;
	color:white;
}
p
{
	font-size:100%;
}
legend
{
	font-size:170%;
	font-family:arial;
}
</style>
</head>

<form action="update.php" method="GET" onSubmit="return(validate());">
<pre style="font-size:140%;">
<?php

$conn = mysql_connect("localhost","root","") or die("34");
mysql_select_db("web_proj", $conn);
$result = mysql_query("SELECT * FROM stu",$conn);

$fields_num = mysql_num_fields($result); 			// Field row
$row = mysql_fetch_row($result)	;


echo"<fieldset>".
"<legend >Personal Information</legend>".

"Name                       :<input type='text' name='na' value='$row[0]'><br>".
"Reg. No.                   :<input type='text' name='reg' value='$row[1]'><br>".
"Contact no.                :<input type='text' name='co' value='$row[2]'><br>".
"E-mail                     :<input type='email' name='email' value='$row[3]'><br>".
"Parent/Guardian name       :<input type='text' name='pna' value='$row[4]'><br>".
"Parent/Guardian Contact no.:<input type='text' name='pco' value='$row[5]'><br>".
"</fieldset>";
mysql_free_result($result);
?>
</pre>
<input type="submit">
</form>


<script>

function validate()
{
	var name=document.forms[0].na.value;
	var regno=document.forms[0].reg.value;
	var cont=document.forms[0].co.value;
	var em=document.forms[0].email.value;
	var pname=document.forms[0].pna.value;
	var pcont=document.forms[0].pco.value;
	
	var flag=1;
	if(name=="")
	{
		window.alert("Please enter student name");flag=0;
	}
	else
	{
		if(!name.match(/^[A-Za-z ]+$/)&&flag==1)
		{
			window.alert("name should contain only alphabets");flag=0;
		}
	}

	if(pname==""&&flag==1)
	{
	window.alert("Please enter Parent/Guardian name");flag=0;
	}
	else
	{
		if(!pname.match(/^[A-Za-z .]+$/)&&flag==1)
		{
			window.alert("name should contain only alphabets");flag=0;
		}
	}
	if(regno==""&&flag==1)
	{
		window.alert("Please enter Registeration number");flag=0;
	}
	else 
	{
		if(flag==1)
		{
			var a = regno.slice(0,2);
			var b = regno.slice(2,5);
			var c = regno.slice(5);
			if(!a.match(/^[0-9]+$/)||!b.match(/^[A-Za-z]+$/)||!c.match(/^[0-9]+$/)||regno.length!=9)
			{
				window.alert("Please enter valid Registeration number");flag=0;
			}
		}
	}
	
	if(em==""&&flag==1)
	{
		window.alert("Please enter email id");flag=0;
	}
	else
	{	
		if((em.search("@")==-1||em.search(".com")==-1)&&flag==1)
		{
			window.alert("Please enter valid email id");flag=0;
		}
	}
	

	if(cont==""&&flag==1)
	{
		window.alert("Please enter student contact number");flag=0;
	}
	else
	{
		if((!cont.match(/^[0-9]+$/)||cont.length!=10)&&flag==1)
		{
			window.alert("Enter valid contact number");flag=0;
		}
	}

	if(pcont==""&&flag==1)
	{
		window.alert("Please enter Parent/Guardian contact number");
		flag=0;
	}
	else
	{
		if((!pcont.match(/^[0-9]+$/)||pcont.length!=10)&&flag==1)
		{
			window.alert("Enter valid contact number");flag=0;
		}
	}
	if(flag==1)
	{return true;}
	else
	{return false;
	}

}
</script>
</body>
</html>