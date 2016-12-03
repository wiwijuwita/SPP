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
$date = date("Y-m-d");
$no=0;
$print ="printdiv('printdata')";
if(isset($_POST['cari'])){
	

	$cari = strip_tags(addslashes(trim($_POST['tanggal'])));
	$sampai = strip_tags(addslashes(trim($_POST['sampai'])));
	$Search = mysql_query("select * from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls inner join spp on siswa.nis=spp.nis inner join bulan on spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif WHERE spp.tgl_pembayaran between '$cari' and '$sampai' order by spp.tgl_pembayaran DESC ");
	$numRow = mysql_num_rows($Search);
	while($pilih=mysql_fetch_array($Search)){
		$no++;
		$nominal = $pilih['tarif'];
		$tbl .="<tr>
			<td id='content_tabel' align='center'>$no</td>
			<td id='content_tabel' align='center'>{$pilih['nis']}</td>
			<td id='content_tabel'>{$pilih['nama']}</td>
			<td id='content_tabel' align='center'>{$pilih['nama_kelas']}</td>
			<td id='content_tabel' align='center'>{$pilih['tgl_pembayaran']}</td>
			<td id='content_tabel' align='center'>".ucwords($pilih['nama_bulan'])."</td>
			<td id='content_tabel' align='center'>Rp. ".number_format($nominal).",-</td>
		</tr>";
	}
	$j = number_format($nominal * $no);
	$show ="<table id='tabel_gaya' width=100% border='1'>
	<tr>
		<td id='header_tabel' align='center'>No.</td>
		<td id='header_tabel' align='center'>NIS</td>
		<td id='header_tabel' align='center'>NAMA</td>
		<td id='header_tabel' align='center'>Kelas</td>
		<td id='header_tabel' align='center'>Tgl. Bayar.</td>
		<td id='header_tabel' align='center'>Bulan</td>
		<td id='header_tabel' align='center'>Nominal</td>
	</tr>
	$tbl
	<tr>
	<td id='content_tabel' align='center' colspan=6>Total jumlah pembayaran</td>
	<td id='content_tabel' align='center'>Rp. $j,-</td>
	</tr>
	</table>";
	
	$Isi ="<strong>Lihat Laporan <a href='?Pg=Belum_bayar' style='text-decoration:none;'>Siswa Yang Belum Bayar</a> || 
 <a href='?Pg=Perpetugas' style='text-decoration:none;'>Perolehan Perpetugas</a> SPP</strong></br></br>
	<form action='' method='POST'>
	<strong>Cari transaksi pertanggal</strong><br>
	<strong>Masukkan tanggal : 
	</strong><input type='text' id='tanggal' name='tanggal' placeholder='YYYY-MM-DD' required=''/>
	<strong>Hingga tanggal :
	</strong><input type='text' id='tanggal1' name='sampai' placeholder='YYYY-MM-DD' required=''/>
	<input type='submit' name='cari' value='Cari Histori Transaksi' />
</form>
	<p align='right'><button style='margin-left:5%' onclick=$print>Cetak Laporan</button>&nbsp;&nbsp;&nbsp;</p>
	<div id='printdata'>
	<strong>Laporan Pembayaran SPP Tanggal $cari sampai Tanggal $sampai</strong>
	$show</div>
";
}else{
	$ambil = mysql_query("select siswa.*,kelas.*,spp.*,bulan.*,tarif.* from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls inner join spp on siswa.nis=spp.nis inner join bulan on spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif where tgl_pembayaran='$date' order by tgl_pembayaran ASC");
while($pilih=mysql_fetch_array($ambil)){
	$no++;
	$nominal = $pilih['tarif'];
	$tb .="<tr>
			<td id='content_tabel' align='center'>$no</td>
			<td id='content_tabel' align='center'>{$pilih['nis']}</td>
			<td id='content_tabel'>{$pilih['nama']}</td>
			<td id='content_tabel' align='center'>{$pilih['nama_kelas']}</td>
			<td id='content_tabel' align='center'>{$pilih['tgl_pembayaran']}</td>
			<td id='content_tabel' align='center'>".ucwords($pilih['nama_bulan'])."</td>
			<td id='content_tabel' align='center'>Rp. ".number_format($nominal).",-</td>
		   </tr>";
}
$j = number_format($nominal * $no);
$table = "<table id='tabel_gaya' width=100% border='1'>
	<tr>
		<td id='header_tabel' align='center'>No.</td>
		<td id='header_tabel' align='center'>NIS</td>
		<td id='header_tabel' align='center'>NAMA</td>
		<td id='header_tabel' align='center'>Kelas</td>
		<td id='header_tabel' align='center'>Tgl. Bayar.</td>
		<td id='header_tabel' align='center'>Bulan</td>
		<td id='header_tabel' align='center'>Nominal</td>
	</tr>
	$tb
	<tr>
	<td id='content_tabel' colspan=6 align='center'>Total jumlah pembayaran</td>
	<td id='content_tabel'>Rp. $j,-</td>
	</tr>
	</table>";
	
	$prev = $start - $per_page;
$next = $start + $per_page;

if (!($start<=0))
	$p= "<a href='?Pg=kata_m&&start=$prev'>[ Prev ]</a> ";


$i = 1;
for ($x=0; $x<$record; $x=$x+$per_page)
{

	if ($start !=$x)
		$a.="<a href='?Pg=kata_m&&start=$x'>[ $i ]</a> ";
	else
		$a.=  "<b>[ $i ]</b> ";
	$i++;

}


if (!($start>=$record-$per_page))
{
	$n=  "<a href='?Pg=kata_m&&start=$next'>[ Next ]</a>";
	}


$Isi ="
<strong>Lihat Laporan <a href='?Pg=Belum_bayar' style='text-decoration:none;'>Siswa Yang Belum Bayar</a> || 
 <a href='?Pg=Perpetugas' style='text-decoration:none;'>Perolehan Perpetugas</a> SPP</strong></br></br>
<form action='' method='POST'>
	<strong>Cari transaksi pertanggal</strong><br>
	<table></tr>
		<td><strong>Dari tanggal:</strong></td> 
		<td><input type='text' id='tanggal' name='tanggal' placeholder='YYYY-MM-DD'/></td>
		<td><strong>Hingga tanggal:</strong></td>
		<td><input type='text' id='tanggal1' name='sampai' placeholder='YYYY-MM-DD'/></td>
		<td><input type='submit' name='cari' value='Lihat' /></td>
	</tr></table>
</form>
	
	<p align='right'><button style='margin-left:5%' onclick=$print>Cetak Laporan</button>&nbsp;&nbsp;&nbsp;</p>
	<div id='printdata'
	<strong>Laporan Pembayaran SPP Hari ini, Tanggal $date</strong>
$table</div>";
}
//
?>