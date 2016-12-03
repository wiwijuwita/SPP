<?php 
session_start();
$session = $_SESSION["name"];
$nis = $_GET['nis'];
$Qry =mysql_query("SELECT siswa.*, kelas.*, jurusan.* FROM siswa INNER JOIN kelas ON siswa.kd_kls=kelas.kd_kls INNER JOIN jurusan ON siswa.kd_jurusan=jurusan.kd_jurusan WHERE NIS='$nis'");
$rec = mysql_fetch_array($Qry);
$nama = $rec['nama'];
$kelas = $rec['nama_kelas'];
$jur = $rec['fulname_jurusan'];
$tgl = date("Y-m-d");

$ambilBulan= mysql_query("select * from bulan");
while ($nmbln = mysql_fetch_row($ambilBulan)){
        $optionbln .="<option value=$nmbln[0]>".ucwords($nmbln[1])." </option>";
	}
$ambilthn = mysql_query("select * from tarif where aktif='yes'");
$datathn = mysql_fetch_array($ambilthn); 
$id_thn .= $datathn['id_tarif'];
$thn .= $datathn['tahun_ajaran'];


$id_user = $_SESSION["id_user"];

if($_POST['bayar']){
	$insertQ = mysql_query("INSERT INTO spp values ('','$nis','$id_thn','$id_user','$tgl','".$_POST['bulan']."')");
	if($insertQ){
		echo"<script>alert('SPP berhasil di bayar!'); document.location='?Pg=Kwitansi&nis=$nis&id_bulan=".$_POST['bulan']."'</script>";
	}else{
		echo "<script>alert('SPP gagal dibayar!')</script>";
	}
	$historiQ = mysql_query("SELECT spp.*, siswa.*, bulan.* FROM spp INNER JOIN siswa ON spp.nis=siswa.nis INNER JOIN bulan ON spp.id_bulan=bulan.id_bulan WHERE nis='$nis'");
	$numRow = mysql_num_rows($historiQ);
	while($datahistori=mysql_fetch_array($historiQ)){
		$nama = $datahistori['nama'];
		$bulan = $datahistori['nama_bulan'];
		$tgl = $datahistori['tgl_pembayaran'];
	}
$viewHistori .="<strong>". ucwords($nama)."</strong> terakhir membayar SPP bulan". $bulan ." pada tanggal $tgl";
}

$showHistori = mysql_query("SELECT spp.*,bulan.*,tarif.* FROM spp inner join bulan on spp.id_bulan=bulan.id_bulan inner join tarif on spp.id_tarif=tarif.id_tarif where nis='$nis' and aktif='yes' order by tgl_pembayaran DESC");
$no=0;
while($datashow=mysql_fetch_array($showHistori)){
	$no++;
	$tarif = $datashow['tarif'];
	$showTable .="<tr>
			<td id='content_tabel'><center>$no</center></td>
			<td id='content_tabel'><center>{$datashow['tgl_pembayaran']}</center></td>
			<td id='content_tabel'><center>".ucwords($datashow['nama_bulan'])."</center></td>
			<td id='content_tabel'><center>{$datashow['tahun_ajaran']}</center></td>
			<td id='content_tabel'><center>Rp. ".number_format($tarif).",-</center></td>
		</tr>"; 
	
}
$jml = number_format($tarif*$no);
$table = "<center><b>DAFTAR PEMBAYARAN SPP</b></center><BR><table id='tabel_gaya' width=100%>
	<tr>
	<td id='header_tabel'><center>No.</center></td>
	<td id='header_tabel'><center>Tgl. Bayar</center></td>
	<td id='header_tabel'><center>Bulan</center></td>
	<td id='header_tabel'><center>Thn. Ajaran</center></td>
	<td id='header_tabel'><center>Besar</center></td>
	</tr>
	$showTable
	<tr>
	<td id='content_tabel' colspan=4 align='center'>Jumlah</td>
	<td id='content_tabel' align='center'>Rp. $jml,00</td>
	</tr>
</table>";



$Isi = "<a href='?Pg=Pembayaran' style='text-decoration:none;'> Kembali</a>
	<H3>Pembayaran SPP Tahun Ajaran <font color='#2d5ad2'>$thn</font></H3>
		<TABLE >
			<TR>
				<TD><strong>NIS&nbsp;</strong></TD>
				<TD>:</TD>
				<TD>$nis</TD>
			</TR>
			<TR>
				<TD><strong>Nama &nbsp;</strong></TD>
				<TD>:</TD>
				<TD>$nama</TD>
			</TR>
			<TR>
				<TD><strong>Kelas&nbsp;</strong></TD>
				<TD>:</TD>
				<TD>$kelas</TD>
			</TR>
			<TR>
				<TD><strong>Komp. Keahlian&nbsp;</strong></TD>
				<TD>:</TD>
				<TD>$jur</TD>
			</TR>
			<TR>
				<TD><strong>Petugas&nbsp;</strong></TD>
				<TD>:</TD>
				<TD>$session</TD>
			</TR>
			<TR>
				<TD><strong>Tanggal</strong></TD>
				<TD>:</TD>
				<TD>$tgl</TD>
			</TR>
			</TABLE>
			<form method='POST' action=''>
				Pembayaran SPP <select name='bulan' value='id_bulan' required=''>
            		<option>--untuk bulan--</option>
					$optionbln</select> 
					<input type='submit' name='bayar' value='Bayar' />
			</form>
			$table
			
			";
?>