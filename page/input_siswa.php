<?php	
session_start();

$jurusan = mysql_query("SELECT * FROM jurusan");
while($nmjur=mysql_fetch_array($jurusan)){
	$kd_jur .= "<option value='$nmjur[0]' required=''>$nmjur[1]</option>";
}

$wiwi = mysql_query("SELECT * FROM kelas");
while($nmwi2=mysql_fetch_array($wiwi)){
	$kd_kl .= "<option value='$nmwi2[0]' required=''>$nmwi2[2]</option>";
}

if(isset($_POST['tambah'])){

$nis=strip_tags($_POST['nis']);
$nama=addslashes(strip_tags($_POST['nama']));
$jk=$_POST['jk'];
$kd_jurusan=$_POST['kd_jurusan'];
$kd_kelas=$_POST['kd_kls'];
	if($nis && $nama && $jk && $kd_jurusan && $kd_kelas){
		if(is_numeric($nis)){
			if(strlen($nis) < 6){
				echo "<script>
				alert('Teridentifikasi!Nis kurang dari 6 digit!')
				</script>";
			}else{
				$query=mysql_query("select nis from siswa ");
				$text=strip_tags($query);
				$cek=mysql_num_rows($text);
				if($cek==0){
					$get=mysql_query("insert into siswa values ('','$nis','$nama','$kd_jurusan','$kd_kelas','$jk')");
					if($get){
						echo"<script>alert('Data siswa baru berhasil di tambahkan...');
								window.location='?Pg=Kelola_siswa';</script>";
					}else{
						echo"<script>alert('Data siswa baru gagal di tambahkan...')</script>";
					}
				}else{
					echo"<script>alert('NIS sudah ada...')</script>";
				}
			}
		}else{
			echo"<script>alert('Isi NIS dengan angka...');</script>";
		}
	}else{
		echo"<script>alert('Mohon Isi data dengan lengkap!')</script>";
	}

	
}

$Isi = "<a href='?Pg=Kelola_siswa' style='text-decoration:none;'>Kembali</a></br><fieldset>
<legend><font size='5' color='#04018d'>Form Tambah Data Siswa</font></LEGEND>

<TABLE>
	<FORM METHOD='POST' ACTION='' >
		<tr>
			<TD>NIS</TD><TD>:</TD><TD><input type='text' name='nis' maxlength='8' required=''></TD>
		</tr>
		<TR>
			<TD>Nama</TD><TD>:</TD><TD><input type='text' name='nama' required=''></TD>
		</TR>
		<TR>
			<TD>Jenis Kelamin</TD><TD>:</TD>
			<TD>
			<SELECT NAME='jk'>
				<OPTION VALUE='L' required='' SELECTED>Laki-laki
				<OPTION VALUE='P' required=''>Perempuan
			</SELECT>
			</TD>
		</TR>
		<tr>
			<td>Jurusan</td><td>:</td>
			<td><select name='kd_jurusan'  value='kd_jurusan' required='' >
				<option value='' required=''>Pilih Jurusan
            	$kd_jur</select></br></td>
		</tr>
		<tr>
			<td>Kelas</td><td>:</td>
			<td><select name='kd_kls' value='kd_kls' required=''>
			<option value='' required=''>Pilih Kelas</option>
			$kd_kl 
			</select></br></td>
		</tr>
		<tr>
			<td colspan='3' align='center'><input type='submit' name='tambah' value='Input Data'/></td>
		</tr>
		
</FORM>
</TABLE>
</FIELDSET>";
?>