<?php
session_start();
if($_SESSION["level"] == "Admin"){
	$Isi = "<p><center>
        <font color='#141485' size='4' ><b>Selamat datang di halaman Admin</b></font></br>
        <strong><font color='#141485' size='4'>Sistem Pembayaran SPP</font></strong></br></br>
		<img src='./image/smk1.png' alt='' width='150' height='150'/></br></br>
        <font size='6' color='#141485'><strong>SMK NEGERI 1 Subang</strong></font>
    </center></p>";
}else{
	$Isi = "<p><center>
        <font color='#141485' size='4' ><b>Selamat datang di halaman Petugas</b></font></br>
        <strong><font color='#141485' size='4'>Sistem Pembayaran SPP</font></strong></br></br>
		<img src='./image/smk1.png' alt='' width='150' height='150'/></br></br>
        <font size='6' color='#141485'><strong>SMK NEGERI 1 Subang</strong></font>
    </center></p>";
}

?>