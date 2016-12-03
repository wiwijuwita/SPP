<?php
$Template="
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<HTML>
	<HEAD>
	<TITLE><!--Judul--></TITLE>
	<link type='text/css' href='./js/date/themes/base/ui.all.css' rel='stylesheet' /> 

	  	<script type='text/javascript' src='js/jquery.js'></script>
	  	<script type='text/javascript' src='js/slide.js'></script>
		<script type='text/javascript' src='js/menu1.js'></script>
		<script type='text/javascript' src='./js/date/jquery-1.3.2.js'></script>
		<script type='text/javascript' src='./js/date/ui.core.js'></script>
		<script type='text/javascript' src='./js/date/ui.datepicker.js'></script>


	<script type='text/javascript'>
	$(document).ready(function () {	
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(100);			
		}
	);
	
});
	</script>

<script type='text/javascript'> 
      $(document).ready(function(){
        $('#tanggal').datepicker({
		dateFormat  : 'yy-mm-dd', 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
 
	 <script type='text/javascript' src='js/sll.js'>
  </script>
  	<META NAME=\"Generator\" CONTENT=\"EditPlus\">
  	<META NAME=\"Author\" CONTENT=\"\">
  	<META NAME=\"Keywords\" CONTENT=\"\">
  	<META NAME=\"Description\" CONTENT=\"\">
	 <LINK REL='Shortcut icon' HREF='./gambar/kelpa.png'>
  <link rel='stylesheet' href='css/css.css' type='text/css'/>
 	</HEAD>

<BODY  ><HR>
<center><div id=top>
</div></center>
<CENTER>
	<TABLE width=800 height=100% cellpadding=2 cellspacing=5 >

	<TR>
		<TD height=20 width=900 /**bgcolor=#FFFF99**/><!--Menu--></TD>
		<td height=25 bgcolor=#FFFF99><!--Kanan--></td>
	</TR>
	<TR>
		<TD width=500  bgcolor=#FFFFFF valign=top><!--Isi--></TD>
		<TD width=150 bgcolor=#c0c0c0 valign=top><!--Menu1-->
		</TD>
	</TR>
	<TR>
		<TD height=40 colspan=2 bgcolor=#c0c0c0><!--Bawah--></TD>
	</TR>
  	</TABLE>
</CENTER>
</BODY>
</HTML>
";
?>
