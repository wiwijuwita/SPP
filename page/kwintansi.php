<?php

$petugas = $_SESSION["name"];
$induk = $_GET['nis'];
$bl = $_GET['id_bulan'];
$date = date("Y-m-d");
$ambilthn = mysql_query("select * from tarif where aktif='yes'");
$datathn = mysql_fetch_array($ambilthn);
$id_thn .= $datathn['id_tarif'];
$thn .= $datathn['tahun_ajaran'];
$pilih = mysql_query("SELECT * FROM spp INNER JOIN siswa ON spp.nis=siswa.nis INNER JOIN kelas ON siswa.kd_kls=kelas.kd_kls INNER JOIN bulan ON spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif where spp.nis='$induk' and bulan.id_bulan='$bl'");
$dat = mysql_fetch_array($pilih);
$id .= $dat['id_spp'];
$nis .= $dat['nis'];
$nama .= $dat['nama'];
$kelas .= $dat['nama_kelas'];
$bulan .= $dat['nama_bulan'];
$tgl .= $dat['tgl_pembayaran'];
$nominal .= $dat['tarif'];
	$print ="printdiv('printdata')";

$Isi = "</BR><p align='right'><button style='margin-left:5%' onclick=$print>Print</button> || <a href='?Pg=Pembayaran' style='text-decoration:none;'>Cencel</a> </p>
<div id='printdata'><fieldset>
<center><b>KWITANSI PEMBAYARAN SPP <br>
	SMK NEGERI 1 SUBANG<br>TAHUN AJARAN $thn</b></center><BR>
	<table>
		<tr>
			<td><strong>No. Transaksi</strong></td>
			<td><strong>:</strong></td>
			<td>$id</td>
		</tr>
		<tr>
			<td><strong>Tanggal</strong></td>
			<td><strong>:</strong></td>
			<td>$date</td>
		</tr>
		<tr>
			<td><strong>Telah terima dari</strong></td>
			<td><strong>:</strong></td>
			<td>$nama</td>
		</tr>
		<tr>
			<td><strong>Kelas</strong></td>
			<td><strong>:</strong></td>
			<td>$kelas</td>
		</tr>
		<tr>
			<td><strong>Uang sejumlah</strong></td>
			<td><strong>:</strong></td>
			<td>Rp. ".number_format($nominal).",-</td>
		</tr>
		<tr>
			<td><strong>Untuk pembayaran</strong></td>
			<td></td>
			<td><strong>SPP bulan ".ucwords($bulan)."</strong></td>
		</tr>
	</table>
	<p align='right'>Penerima</br></br></br>
	<b>$petugas</b></p></fieldset></div>";

?>
    <script>
		function printdiv(dataprint){
			var elemendiv = document.getElementById(dataprint).innerHTML;
			var oldpage = document.body.innerHTML;
			document.body.innerHTML="<html><head><title></title></head><body>"+elemendiv+"</body></html>";
			window.print();
			document.body.innerHTML=oldpage;
		}
	</script>
