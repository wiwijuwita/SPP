<?php
session_start();

$user = isset($_POST['username']) ? $_POST['username']:"";
$pass = isset($_POST['password']) ? md5($_POST['password']):"";


$info="";



if (!empty($user)&& !empty($pass))
{
	$qcekuser=mysql_query("select * from user where username='$user' && password='$pass' ");
	if(!mysql_num_rows($qcekuser))
	{
	echo"<script>alert('username atau password tidak cocok!')</script>";
	}else
	{
	$rest=mysql_fetch_array($qcekuser);
	$_SESSION["username"] = $rest[username];
	$_SESSION["id_user"] = $rest[id_user];
	$_SESSION["name"] = $rest[nama_user];
	$_SESSION["login"] = true;
	$_SESSION["level"] = $rest[level];
	header("location:?");
	}
}


$Template = "
<!DOCTYPE html>
<head>
<meta charset='utf-8'>
<title>Slick Login</title>
<meta name='description' content='slick Login'>
<meta name='author' content='Webdesigntuts+'>
<link rel='stylesheet' type='text/css' href='css.css' />
<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='http://www.modernizr.com/downloads/modernizr-latest.js'></script>
<script type='text/javascript' src='placeholder.js'></script>
</head>
<body>
    <form id='slick-login' action='?Pg=Pg' method='POST' name='login'>
    
    <label for='username'>Username</label><input type='text' name='username' required='' class='placeholder' placeholder='username...'>
    <label for='password'>Password</label><input type='password' required='' name='password' class='placeholder' placeholder='password...'>
    <input type='submit'  name='login' value='Log In'>
    </form>
</body>
</html>

";


?>