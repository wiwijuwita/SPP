<?php
if(isset($_GET['id_tarif'])){
	$id_tarif = $_GET['id_tarif'];
}else{
	die ("Error! No Id user selected!");
}
$tarifQ = mysql_query("SELECT * FROM tarif WHERE id_tarif='$id_tarif'");
$dt = mysql_fetch_array($tarifQ);
$tahun = $dt['tahun_ajaran'];
$tarif = $dt['tarif'];
$aktif = $dt['aktif'];

if(isset($_POST['perbaharui'])){
	$e_tarif = $_POST['tarif'];
	$e_aktif = $_POST['aktif'];
	$e_th = mysql_query("UPDATE tarif SET tarif='$e_tarif', aktif='$e_aktif' WHERE id_tarif='$id_tarif'");
	if($e_th){
		echo "<script>alert('Data sukses diperbaharui!');
			window.location='?Pg=Setting';</script>";
	}else{
		echo "<script>alert('Data gagal diperbaharui!')</script>";
	}
}

$Isi="<a href='?Pg=Setting'>Kembali</a></br><fieldset>
<legend><font size='5' color='#04018d'>Perbaharui Tarif dan Tahun Ajaran</font></LEGEND>
<TABLE>
	<FORM METHOD='POST' ACTION='' >
		<TR>
			<TD>Tahun Ajaran</TD><TD>:</TD>
			<TD>$tahun</TD>
		</TR>
		<TR>
			<TD>Tarif</TD><TD>:</TD>
			<TD><input type='text' name='tarif' value='$tarif'/></TD>
		</TR>
		<TR>
			<TD>Status</TD><TD>:</TD>
			<TD><SELECT NAME='aktif'>
				<OPTION VALUE='$aktif' SELECTED>$aktif
				<OPTION VALUE='yes'>Yes
				<OPTION VALUE='no'>No
			</SELECT></TD>
		</TR>
		<TR>
			<TD>&nbsp;</TD><TD></TD><TD><input type='submit' name='perbaharui' value='Simpan Perubahan' /></TD>
		</TR>
	</FORM>
</TABLE>
</FIELDSET>";
?>