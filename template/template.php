<?php
$Template = "
<html>
<head>
<title>Sistem Pembayaran SPP</title>

<link type='text/css' href='./date/themes/base/ui.all.css' rel='stylesheet' /> 

	<script type='text/javascript' src='./date/jquery-1.3.2.js'></script>
		<script type='text/javascript' src='./date/ui.core.js'></script>
		<script type='text/javascript' src='./date/ui.datepicker.js'></script>
		
		<script type='text/javascript'> 
      $(document).ready(function(){
        $('#tanggal').datepicker({
		dateFormat  : 'yy-mm-dd', 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
	<script type='text/javascript'> 
      $(document).ready(function(){
        $('#tanggal1').datepicker({
		dateFormat  : 'yy-mm-dd', 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
<link rel='stylesheet' type='text/css' href='./default.css'>
<link rel='stylesheet' type='text/css' href='./style.css'>
</head>
<body bgcolor='#4f719f' style='font-family:Tahoma; font-size:14px'>
    <center>
    <table width=900 height=100% cellspasing='' style='border:0px solid #131859;border-radius:6px;box-shadow:0px 0px 5px #fff;'>
        <tr>
        	<td colspan='2' width=900 height=150><!--Header--></td>
        </tr>
        <tr>
        	<td colspan='2' width=900 height=5 bgcolor='#648bbf' style='border-radius:0px 0px 6px 6px;'><!--Atas--></td>
        </tr>
        <tr>
        	<td  bgcolor='#dce8ed' width=100 height=* valign='top' style='padding:0px'><!--Menu--></td>
            <td bgcolor='#dce8ed' width=800 height=* valign=top ><!--Isi--></td>
        </tr>
        <tr>
        	<td bgcolor='#648bbf' colspan='2' width=900 height=100 style='border-radius:0px 0px 10px 10px;'><!--Footer--></td>
        </tr>
    </table>
	</center>

</body>
</html>

";


?>