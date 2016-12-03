<?php
session_start();
if($_SESSION['level'] == 'Admin'){
	$Menu = "
	<div id='cssmenu'> 
	<ul> 
		<li class='active'><a href='?Pg='>Beranda</a></li>
		<li class='active'><a href='?Pg=Pembayaran'>Transaksi</a></li> 
		<li class='active'><a href='?Pg=Laporan'>Kelola Laporan</a></li> 
		<li class='active'><a href='?Pg=Kelola_siswa'>Kelola Data Siswa</a></li> 
		<li class='active'><a href='?Pg=Petugas'>Kelola Data User</a></li> 
		<li class='active'><a href='?Pg=Setting'>Setting Tarif Pembayaran</a></li> 
	</ul> 
	</div>";
}else{
	$Menu = "
    <div id='cssmenu'> 
	<ul> 
		<li class='active'><a href='?Pg='>Beranda</a></li>
		<li class='active'><a href='?Pg=Pembayaran'>Transaksi</a></li> 
		<li class='active'><a href='?Pg=Report'>Laporan</a></li> 
		<li class='active'><a href='?Pg=Siswa'>Lihat Data Siswa</a></li> 
		
	</ul> 
	</div>";
}




?>