<?php
if(isset($_GET['id_user'])){
	$id_user = $_GET['id_user'];
}else{
	die ("Error! No Id user selected!");
}
$userQ = mysql_query("SELECT * FROM user WHERE id_user='$id_user'");
$dt = mysql_fetch_array($userQ);
$nama = $dt['nama_user'];
$jk = $dt['jk'];
$alamat = $dt['alamat'];
$email = $dt['email'];
$telepon = $dt['telepon'];
$level = $dt['level'];

if(isset($_POST['edit'])){
	$e_name = $_POST['nama'];
	$e_jk = $_POST['jk'];
	$e_alamat = $_POST['alamat'];
	$e_email = $_POST['email'];
	$e_telepon = $_POST['telepon'];
	$e_level = $_POST['level'];
	
	$e_userQ = mysql_query("UPDATE user SET nama_user='$e_name', jk='$e_jk', alamat='$e_alamat', email='$e_email', telepon='$e_telepon', level='$e_level' WHERE id_user='$id_user'");
	if($e_userQ){
		echo "<script>alert('Data sukses di ubah!');
			window.location='?Pg=Petugas';</script>";
	}else{
		echo "<script>alert('Data gagal di ubah!')</script>";
	}
	
}

$Isi ="<a href='?Pg=Petugas' style='text-decoration:none;'>Kembali</a></br><fieldset>
<legend><font size='5' color='#04018d'>Edit Data User</font></LEGEND>
<TABLE>
	<FORM METHOD='POST' ACTION='' >
		<TR>
			<TD>Nama</TD><TD>:</TD>
			<TD><input type='text' name='nama' value='$nama' required=''/></TD>
		</TR>
		<TR>
			<TD>Gender</TD><TD>:</TD>
			<TD><SELECT NAME='jk' required=''>
				<OPTION VALUE='$jk' required='' SELECTED>--L/P--
				<OPTION VALUE='L' required=''>Laki-laki
				<OPTION VALUE='P' required=''>Perempuan
			</SELECT></TD>
		</TR>
		<TR>
			<TD valign='top'>Alamat</TD><TD valign='top'>:</TD>
			<TD><textarea name='alamat' required=''>$alamat</textarea></TD>
		</TR>
		<TR>
			<TD>E-mail</TD><TD>:</TD>
			<TD><input type='text' name='email' value='$email' required=''/></TD>
		</TR>
		<TR>
			<TD>Telepon</TD><TD>:</TD>
			<TD><input type='text' name='telepon' value='$telepon' required=''/></TD>
		</TR>
		<TR>
			<TD>Status</TD><TD>:</TD>
			<TD><SELECT NAME='level' >
				<OPTION VALUE='' required='' SELECTED>$level
				<OPTION VALUE='Admin' required=''>Admin
				<OPTION VALUE='Petugas' required=''>Petugas
			</SELECT></TD>
		</TR>
		<TR>
			<TD>&nbsp;</TD><TD></TD><TD><input type='submit' name='edit' value='Simpan Perubahan' /></TD>
		</TR>
	</FORM>
</TABLE>
</FIELDSET>";
?>