<?php
if (isset($_GET['nis'])) {
	$induk=$_GET['nis'];
}else{
	die ("error");
}
$wiwiQuery	= mysql_query("SELECT * FROM siswa WHERE nis='$induk'");
$hasil		= mysql_fetch_array($wiwiQuery);
$nis		= $hasil ['nis'];
$nama		= $hasil ['nama'];
$KK		= $hasil ['kd_jurusan'];
$KLS		= $hasil ['kd_kls'];
$jk		    = $hasil ['jk'];

$QueryKLS= mysql_query("select * from kelas");
while ($nmKLS = mysql_fetch_row($QueryKLS)){
        $optionKLS .="<option value=$nmKLS[0]>$nmKLS[2]</option>";
	}
$QueryKK= mysql_query("select * from jurusan");
while ($nmKK = mysql_fetch_row($QueryKK)){
        $optionKK .="<option value=$nmKK[0]>$nmKK[1]</option>";
	}
if(isset($_POST['edit'])){

	$editNIS = $_POST['nis'];
	$editNAMA = $_POST['nama'];
	$editKELAS = $_POST['kelas'];
	$editJUR = $_POST['jurusan'];
	$editJK = $_POST['jk'];
	$editQ = mysql_query("UPDATE siswa SET nis='$editNIS', nama='$editNAMA', kd_jurusan='$editJUR', kd_kls='$editKELAS', jk='$editJK' where nis='$nis'");
	if($editQ){
		echo "<script>alert('Data sukses di ubah!');
			window.location='?Pg=Kelola_siswa';</script>";
	}else{
		echo "<script>alert('Data gagal di ubah!')</script>";
	}
}
	
$Isi = "<a href='?Pg=Kelola_siswa'>Kembali</a></br><fieldset>
<legend><font size='5' color='#04018d'>Edit Data Siswa</font></LEGEND>

<TABLE>
	<FORM METHOD='POST' ACTION='' >
		<tr>
			<TD>NIS</TD><TD>:</TD><TD><input type='text' name='nis' value='$nis'></TD>
		</tr>
		<TR>
			<TD>Nama</TD><TD>:</TD><TD><input type='text' name='nama' value='$nama'></TD>
		</TR>
		<TR>
			<TD>Jenis Kelamin</TD><TD>:</TD>
			<TD>
			<SELECT NAME='jk'>
				<OPTION VALUE='$jk' SELECTED>$jk
				<OPTION VALUE='L'>Laki-laki
				<OPTION VALUE='P'>Perempuan
			</SELECT>
			</TD>
		</TR>
		<tr>
			<td>Jurusan</td><td>:</td>
			<td><select name='jurusan' value='kd_jurusan'>
            	<option>jurusan</option>$optionKK</select></br></td>
		</tr>
		<tr>
			<td>Kelas</td><td>:</td>
			<td><select name='kelas' value='kd_kls'>
            	<option value>nama kelas</option>$optionKLS</select></br></td>
		</tr>
		<tr>
			<td colspan='3' align='center'><input type='submit' name='edit' value='Simpan Perubah'/></td>
		</tr>
		
</FORM>
</TABLE>
</FIELDSET>";
?>