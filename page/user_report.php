<script>
		function printdiv(dataprint){
			var elemendiv = document.getElementById(dataprint).innerHTML;
			var oldpage = document.body.innerHTML;
			document.body.innerHTML="<html><head><title></title></head><body>"+elemendiv+"</body></html>";
			window.print();
			document.body.innerHTML=oldpage;
		}
	</script>
<?php
session_start();
$id_user = $_SESSION["id_user"];
$date = date("Y-m-d");
$NO=0;
$print ="printdiv('printdata')";
if(isset($_POST['cari'])){
	$cari = strip_tags(addslashes(trim($_POST['tanggal'])));
	$sampai = strip_tags(addslashes(trim($_POST['sampai'])));
	$search = mysql_query("select * from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls inner join spp on siswa.nis=spp.nis inner join bulan on spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif inner join user on spp.id_user=user.id_user where spp.tgl_pembayaran between '$cari' and '$sampai' and spp.id_user='$id_user' order by spp.tgl_pembayaran DESC");
	//$numRow = mysql_num_rows($search);
	while($temu=mysql_fetch_array($search)){
		$NO++;
		$nominal = $temu['tarif'];
		$content .="<tr>
		<td id='content_tabel' align='center'>$NO</td>
		<td id='content_tabel' align='center'>{$temu['nis']}</td>
		<td id='content_tabel' align='center'>{$temu['tgl_pembayaran']}</td>
		<td id='content_tabel'>{$temu['nama']}</td>
		<td id='content_tabel' align='center'>{$temu['nama_kelas']}</td>
		<td id='content_tabel' align='center'>".ucwords($temu['nama_bulan'])."</td>
		<td id='content_tabel' align='center'>Rp. ".number_format($temu['tarif']).",-</td>
	</tr>";
	}
	$j = $nominal * $NO;
	$Isi = "<strong>Lihat Laporan Siswa Yang <a href='?Pg=Belum_bayar' style='text-decoration:none;'>Belum Bayar</a> SPP</strong></br></br>
	<form action='' method='POST'>
		<strong>Cari transaksi pertanggal</strong><br>
		<strong>Masukkan tanggal&nbsp;: 
		</strong><input type='text' id='tanggal' name='tanggal' placeholder='YYYY-MM-DD' required=''/>
		<strong>Hingga tanggal&nbsp;: 
		</strong><input type='text' id='tanggal1' name='sampai' placeholder='YYYY-MM-DD' required=''/>
		<input type='submit' name='cari' value='Cari Histori Transaksi' />
	</form>
	<p align='right'><button style='margin-left:5%' onclick=$print>Cetak Laporan</button>&nbsp;&nbsp;&nbsp;</p>
	<div id='printdata'>
	Perolehan ".ucwords($_SESSION['name'])." pada tanggal $cari sampai tanggal $sampai.<br>
	<table id='tabel_gaya' width='100%' border='1'>
		<tr>
			<td id='header_tabel' align='center'>NO</td>
			<td id='header_tabel' align='center'>NIS</td>
			<td id='header_tabel' align='center'>TGL. BAYAR</td>
			<td id='header_tabel' align='center'>NAMA</td>
			<td id='header_tabel' align='center'>KELAS</td>
			<td id='header_tabel' align='center'>BULAN</td>
			<td id='header_tabel' align='center'>TARIF</td>
		</tr>
		$content
		<tr>
			<td id='content_tabel' align='center' colspan='6'>Total Perolehan</td>
			<td id='content_tabel' align='center'>Rp. ".number_format($j).",-</td>
		</tr>
	</table></div>";
}else{
	$Qreport = mysql_query("select * from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls inner join spp on siswa.nis=spp.nis inner join bulan on spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif where tgl_pembayaran='$date' and id_user='$id_user' order by tgl_pembayaran DESC");
	while($abc=mysql_fetch_array($Qreport)){
	$NO++;
	$asd = $abc['tarif'];
	$tr .="<tr>
		<td id='content_tabel' align='center'>$NO</td>
		<td id='content_tabel' align='center'>{$abc['nis']}</td>
		<td id='content_tabel'>{$abc['nama']}</td>
		<td id='content_tabel' align='center'>{$abc['nama_kelas']}</td>
		<td id='content_tabel' align='center'>".ucwords($abc['nama_bulan'])."</td>
		<td id='content_tabel' align='center'>Rp. ".number_format($abc['tarif']).",-</td>
	</tr>";
	}
	$total = $asd * $NO;
	$Isi = "<strong>Lihat Laporan Siswa Yang <a href='?Pg=Belum_bayar' style='text-decoration:none;'>Belum Bayar</a> SPP</strong></br></br>
	<form action='' method='POST'>
		<strong>Cari transaksi pertanggal</strong><br>
		<strong>Masukkan tanggal&nbsp;: 
		</strong><input type='text' id='tanggal' name='tanggal' placeholder='YYYY-MM-DD'/>
		<strong>Hingga tanggal&nbsp;: 
		</strong><input type='text' id='tanggal1' name='sampai' placeholder='YYYY-MM-DD'/>
		<input type='submit' name='cari' value='Cari Histori Transaksi' />
	</form>
	<p align='right'><button style='margin-left:5%' onclick=$print>Cetak Laporan</button>&nbsp;&nbsp;&nbsp;</p>
	<div id='printdata'>
	Histori Transaksi dan Perolehan ".ucwords($_SESSION['name'])." pada $date.<br>
	<table id='tabel_gaya' width='100%' border='1'>
		<tr>
			<td id='header_tabel' align='center'>NO</td>
			<td id='header_tabel' align='center'>NIS</td>
			<td id='header_tabel' align='center'>NAMA</td>
			<td id='header_tabel' align='center'>KELAS</td>
			<td id='header_tabel' align='center'>BULAN</td>
			<td id='header_tabel' align='center'>TARIF</td>
		</tr>
		$tr
		<tr>
			<td id='content_tabel' align='center' colspan='5'>Jumlah</td>
			<td id='content_tabel' align='center'>Rp. ".number_format($total).",-</td>
		</tr>
	</table></div>";
}

?>