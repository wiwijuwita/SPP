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
$ambilthn = mysql_query("select * from tarif where aktif='yes'");
$datathn = mysql_fetch_array($ambilthn); 
$id_thn .= $datathn['id_tarif'];
$thn .= $datathn['tahun_ajaran'];
$form ="<form action='' method='POST'>
		<table>
	<tr>
		<td><b>Cari nama petugas</b> </td><td><b>:</b></td>
		<td><input type='text' name='nama_petugas' placeholder='tuliskan nama petugas' required=''/></BR></td>
	</tr>
	<TR>
		<TD><b>Tanggal trnsaksi</b></TD><td><b>:</b></td>
		<TD><input type='text' id='tanggal' name='date' placeholder='YYYY-MM-DD' required=''/></TD>
		<TD><b> Hingga Tanggal</b></TD><td><b>:</b></td>
		<TD><input type='text' id='tanggal1' name='sampai' placeholder='YYYY-MM-DD' required=''/></TD>
	</TR>
	<TR>
		<TD><input type='submit' name='search' value='Lihat Laporan'/></TD>
	</TR>
</table>		 
	</form>";
$print ="printdiv('printdata')";
if(isset($_POST['search'])){
	$nama_petugas = strip_tags(addslashes(trim($_POST['nama_petugas'])));
	$date = strip_tags(addslashes(trim($_POST['date'])));
	$sampai = strip_tags(addslashes(trim($_POST['sampai'])));
	if(!empty($nama_petugas) && !empty($date)&& !empty($sampai)) {
		$SQL = mysql_query("select * from spp inner join user on spp.id_user=user.id_user inner join tarif on spp.id_tarif=tarif.id_tarif inner join siswa on spp.nis=siswa.nis inner join kelas on siswa.kd_kls=kelas.kd_kls inner join bulan on spp.id_bulan=bulan.id_bulan where spp.tgl_pembayaran between '$date'and '$sampai' and user.nama_user LIKE '$nama_petugas%' and tarif.aktif='yes' order by spp.tgl_pembayaran DESC");
		$numrow = mysql_num_rows($SQL);
		$a=0;
		while($record=mysql_fetch_array($SQL)){
			$a++;
			$nominal = $record['tarif'];
			$tamp .="<tr>
					<td id='content_tabel' align='center'>$a</td>
					<td id='content_tabel' align='center'>{$record['nis']}</td>
					<td id='content_tabel' align='center'>{$record['tgl_pembayaran']}</td>
					<td id='content_tabel'>{$record['nama']}</td>
					<td id='content_tabel'>{$record['nama_kelas']}</td>
					<td id='content_tabel' align='center'>".ucwords($record['nama_bulan'])."</td>
					<td id='content_tabel' align='center'>Rp. ".number_format($record['tarif']).",-</td>
				</tr>";
			
		}
		$j = number_format($nominal * $a);
		if(!$numrow){
			$view ="Tidak ada hasil. [<A HREF='?Pg=$Pg'>Coba Lagi</A>]</span><BR><BR>";
		}else{
			$viewtabel = "<p align='right'><button style='margin-left:5%' onclick=$print>Cetak Laporan</button>&nbsp;&nbsp;&nbsp;</p>
	<div id='printdata'>
			<b><center>Laporan Transaksi SPP Tahun Ajaran $thn<br> Perolehan Petugas Atas Nama ".ucwords($nama_petugas)."<br>Periode $date sampai $sampai</center></b><br>
			<table id='tabel_gaya' width='100%' border='1'>
					<tr>
						<td id='header_tabel' align='center'>NO.</td>
						<td id='header_tabel' align='center'>NIS</td>
						<td id='header_tabel' align='center'>TGL. BAYAR</td>
						<td id='header_tabel' align='center'>NAMA</td>
						<td id='header_tabel' align='center'>kelas</td>
						<td id='header_tabel' align='center'>BULAN</td>
						<td id='header_tabel' align='center'>NOMINAL</td>
					</tr>
					$tamp
					<tr>
					<td id='content_tabel' align='center' colspan='6'>Total</td>
					<td id='content_tabel' align='center'>Rp.$j ,-</td>
				</tr>
				</table></div>";
		}	
	}else{
		echo "<script>alert('Tidak ada hasil!')</script>";
	}
	$Isi = "$form </br> $view </br> $viewtabel";
}else{
	$Isi = "$form";
}

?>