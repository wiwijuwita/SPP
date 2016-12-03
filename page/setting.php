<?php
$qtarif = mysql_query("SELECT * FROM tarif order by id_tarif");
$a=0;
$tbl = "<form action='' method='POST'><input type='submit' name='update' value='Perbaharui'/></form>";
while($datatarif=mysql_fetch_array($qtarif)){
	if($datatarif['aktif'] == "yes"){
		$status = "<img src='./image/aktif.png' alt='' />";
	}else{
		$status="<img src='./image/nonaktif.png' alt='' />";
	}
	$a++;
	$showtarif .="<tr>
			<td id='content_tabel' align='center'>&nbsp;$a&nbsp;</td>
			<td id='content_tabel' align='center'>&nbsp;{$datatarif['tahun_ajaran']}&nbsp;</td>
			<td id='content_tabel' align='right'>&nbsp;Rp. ".number_format($datatarif['tarif']).",&nbsp;</td>
			<td id='content_tabel' align='center'>$status</td>
			<td id='content_tabel' align='center'><a href='?Pg=E_setting&id_tarif={$datatarif['id_tarif']}' style='text-decoration:none;'>&nbsp;&nbsp;Perbaharui&nbsp;&nbsp;</a></td>
		</tr>";
}

$tombol = "<form action='' method='POST'><input type='submit' name='tambah' value='Tambahkan Tarif & Tahun Ajaran'/></form>";
if(isset($_POST[tambah])){
	header('location:?Pg=T_setting');
}
$Isi = "<h4>Setting Tarif Pembayaran dan Tahun Ajaran</h4></br>
	$tombol
	<table id='tabel_gaya'>
		<tr>
			<td id='header_tabel' align='center'>NO.</td>
			<td id='header_tabel' align='center'>Thn. Ajaran</td>
			<td id='header_tabel' align='center'>Tarif</td>
			<td id='header_tabel' align='center'>Status</td>
			<td id='header_tabel' align='center'>Aksi</td>
		</tr>
		$showtarif
	</table>";
?>