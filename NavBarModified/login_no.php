<!DOCTYPE Html>
<html>
<head>
<title>
FFCS Simulator
</title>
<link rel="stylesheet" href="custom.css">
</head>
<body style="background-color:rgb(255,255,242)">
<div id="heading">	
<h1>FFCS SIMULATOR</h1>
</div>
<form action="signin_php.php" method="POST" onSubmit="return(validate());" id="signup">
<br><br><br><br><br><br><br>
<fieldset>
<legend style="font-size:150%">Login</legend>
<div class="sign_error">
CHECK USERNAME AND PASSWORD!
</div>
<pre>
Username:             <input type="text" name="uname" placeholder="Enter username" onblur="validate1();" style="font-size:80%"><p id="username" class="error"></p>Password:             <input type="password" name="pass" placeholder="Enter password" onblur="validate2()" style="font-size:80%"><p id="password" class="error"></p>Captcha:              <input type="text" name="cap" placeholder="Enter captcha" onblur="validate3()" style="font-size:80%"><p id="captcha" class="error"></p><br>
<input type="button" value="refresh" class="myButton">             <input type="submit" class="myButton" value="sign in!" id="button">
</pre>
</fieldset>
</form>
<script>
var a=0;
var b=0;
var c=0;

function check()
{
if(a==1&&b==1&&c==1)
{
return true;
}
else
{
return false;
}
}
function validate1()
{
var name=document.forms[0].uname.value;

	if(name=="")
	{
		document.getElementById("username").innerHTML="* invald username";a=0;
	}
	else
	{
		if(!name.match(/^[A-Za-z0-9]+$/))
		{
			document.getElementById("username").innerHTML="* invald username";a=0;
		}
		else
		{
			document.getElementById("username").innerHTML="";a=1;
			
		}
	}
}

function validate2()
{
var name=document.forms[0].pass.value;

	if(name=="")
	{
		document.getElementById("password").innerHTML="* invald password";b=0;
	}
	else
	{
		if(!name.match(/^[A-Za-z0-9]+$/))
		{
			document.getElementById("password").innerHTML="* invald password";b=0;
		}
		else
		{
			document.getElementById("password").innerHTML="";b=1;
		}
	}
}
function validate3()
{
var name=document.forms[0].cap.value;

	if(name=="")
	{
		document.getElementById("captcha").innerHTML="* invald captcha";c=0;
	}
	else
	{
		if(!name.match(/^[A-Za-z0-9]+$/))
		{
			document.getElementById("captcha").innerHTML="* invald captcha";c=0;
		}
		else
		{
			document.getElementById("captcha").innerHTML="";c=1;
		}
	}
	
}
function validate()
{
validate1();
validate2();
validate3();

var chk;
chk=check();
if(chk==true)
{
return true;
}
else
{
return false;
}
}
</script>
</body>
</html>