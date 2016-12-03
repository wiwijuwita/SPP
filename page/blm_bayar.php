<?php
$pilih_bulan = mysql_query("SELECT * FROM bulan");
while($s_bulan=mysql_fetch_array($pilih_bulan)){
	$optionbln .="<option value='$s_bulan[0]' required=''>".ucwords($s_bulan[1])."</option>";
}

$pilih_kls =mysql_query("SELECT * FROM kelas");
while($s_kls=mysql_fetch_array($pilih_kls)){
	$optionkls .="<option value='$s_kls[0]' required=''>$s_kls[2]</option>";
}

$form = "<form action='' method='POST'>
		Pilih Bulan : <select name='bulan'value='pilih kelas' required=''>
            <option value='' required=''>nama bulan</option>$optionbln</select>
		Sampai Bulan : <select name='sampai'value='pilih kelas' required=''>
            <option value='' required=''>nama bulan</option>$optionbln</select>
		Pilih Kelas :<select name='kelas' value='pilih kelas' required=''>
            <option value='' required=''>nama kelas</option>$optionkls</select>
		<input type='submit' name='search' value='Lihat Siswa'/>
	</form>";
	
$tahun = mysql_query("SELECT * FROM tarif WHERE aktif='yes'");
$ajaran = mysql_fetch_array($tahun);
$id_tarif = $ajaran['id_tarif'];
$thn_ajaran = $ajaran['tahun_ajaran'];
$tarif = $ajaran['tarif'];

if(isset($_POST['search'])){
	$milih = mysql_query("SELECT * FROM siswa INNER JOIN kelas ON siswa.kd_kls=kelas.kd_kls WHERE siswa.nis NOT IN (SELECT nis FROM spp WHERE id_tarif='$id_tarif' AND id_bulan between '".$_POST['bulan']."' and '".$_POST['sampai']."') AND siswa.kd_kls='".$_POST['kelas']."' ORDER BY siswa.nama");
	$no=0;
	while($showsiswa=mysql_fetch_array($milih)){
		$no++;
		$eusi .= "<tr>
				<td id='content_tabel' align='center'>$no</td>
				<td id='content_tabel' align='center'>{$showsiswa['nis']}</td>
				<td id='content_tabel'>{$showsiswa['nama']}</td>
				<td id='content_tabel' align='center'>{$showsiswa['nama_kelas']}</td>
				<td id='content_tabel' align='center'><a href='?Pg=Bayar&nis={$showsiswa['nis']}'>BAYAR SPP</a></td>
			</tr>";
	}
	$tabel = "<table id='tabel_gaya' width='100%'>
			<tr>
				<td id='header_tabel' align='center'>NO</td>
				<td id='header_tabel' align='center'>NIS</td>
				<td id='header_tabel' align='center'>NAMA</td>
				<td id='header_tabel' align='center'>KELAS</td>
				<td id='header_tabel' align='center'>&nbsp;</td>
			</tr>
			$eusi
		</table>";
	$Isi = "$form</BR>$tabel";
}ELSE{
	$Isi ="$form";	
}
?>