<?php
session_start();
$nmuser = isset($_SESSION['name']) ? $_SESSION['name']:"";
$Mulai = isset($_SESSION['login']) ? "
 <a href='?Pg=Logout' style='color:#fffbfb; text-decoration:none;'><font size = 4,5><strong>Logout</strong></font></a>" : "<a href='?Pg=Login'> Login </a> ";

if($_SESSION["level"] == "Admin"){
	$Atas = " <TABLE width='100%'>
	<TR>
        <TD align=left valign=center><b>".ucwords($nmuser).",</b> anda login sebagai Admin</TD>
		<TD align='right' valign=center>$Mulai </font>
		</TD>
	</TR>
</TABLE></p>";
}else{
	$Atas = " <TABLE width='100%'>
	<TR>
        <TD align=left valign=center><b>".ucwords($nmuser).",</b> anda login sebagai Petugas</TD>
		<TD align='right'>$Mulai</TD>
	</TR>
</TABLE></p>";
}


?>