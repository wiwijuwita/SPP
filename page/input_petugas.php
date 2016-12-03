<?php
session_start();
if($_POST['input'])
{
	$user=strip_tags(addslashes($_POST['username']));
	$password=strip_tags(addslashes($_POST['password']));
	$password2=strip_tags(addslashes($_POST['password2']));
	$nama=strip_tags(addslashes($_POST['nama']));
	$jk=strip_tags(addslashes($_POST['jk']));
	$alamat=strip_tags(addslashes($_POST['alamat']));
	$email=strip_tags(addslashes($_POST['email']));
	$telepon=strip_tags(addslashes($_POST['telepon']));
		
	if($user && $password && $nama && $jk && $alamat && $email && $telepon)
	{
		if($password==$password2)
		{	
			if(is_numeric($telepon)){
			$query=mysql_query("select * from user where username='$user' ");
			$text=strip_tags($query);
			$cekuser=mysql_num_rows($text);
			if($cekuser==0){
				$insert=mysql_query("insert into user (id_user,username,password,nama_user,jk,alamat,email,telepon,level) values('','$user',md5('$password'),'$nama','$jk','$alamat','$email','$telepon','Petugas')");
				if($insert){
					echo"<script>alert('Inputan berhasil.');
						window.location='?Pg=Petugas'</script>";
				}else{
					echo"<script>alert('Maaf,Inputan gagal')</script>";
				}			
			}else{
				echo"<script>alert('Mohon maaf, Username sudah ada. ')</script>";
			}
		}else{
			echo"<script>alert('Mohon, Isi telepon dengan angka. ')</script>";
		}
		}else{
			echo"<script>alert('Maaf, Kata Sandi yang anda masukan tidak Cocok.')</script>";
		}
	}else{
		echo"<script>alert('Mohon Isi data dengan lengkap!')</script>";
	}
}

$Isi="<fieldset>
<legend><font size='5' color='#18397e'>TAMBAH DATA USER</font></LEGEND>
<TABLE>
	<FORM METHOD=POST ACTION='?Pg=$Pg'>
		<TR>
			<TD width=200>Username</TD><TD width=5>:</TD><TD><input type='text' required='' name='username' maxlength='20'></TD>
		</TR>
		<TR>
			<TD>Nama</TD><TD>:</TD><TD><input type='text' name='nama' maxlength='50' required=''></TD>
		</TR>
		<TR>
			<TD>Password</TD><TD>:</TD><TD><input type='password' name='password' maxlength='32' required=''></TD>
		</TR>
		<TR>
			<TD>Ulangi Password</TD><TD>:</TD><TD><input type='password' name='password2' maxlength='32' required=''></TD>
		</TR>
		<TR>
			<TD>Jenis Kelamin</TD><TD>:</TD>
			<TD>
			<SELECT NAME='jk' required=''>
				<OPTION VALUE='L' required='' SELECTED>Laki-laki
				<OPTION VALUE='P' required=''>Perempuan
			</SELECT>
			</TD>
		</TR>
		<TR>
			<TD>Email</TD><TD>:</TD><TD><input type='text' name='email' maxlength='50' required=''></TD>
		</TR>
		<TR>
			<TD>Alamat</TD><TD>:</TD><TD ><textarea name=alamat maxlength='100' required=''></textarea></TD>
		</TR>
		<TR>
			<TD>Telepon</TD><TD>:</TD><TD><input type='text' name='telepon' maxlength='13' required=''></TD>
		</TR>
		<tr>
		<TR>
			<TD colspan='3' align='center'><INPUT TYPE='submit' name='input' value='Input Data' required=''></TD>
		</TR>
</FORM>
</TABLE>
</FIELDSET>
";
?>