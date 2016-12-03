<?php
if(isset($_POST['submit'])){
	$tahun = $_POST['tahun'];
	$tarif = $_POST['tarif'];
	$status = $_POST['status'];
	if(is_numeric($tarif)){
		$q = mysql_query("select tarif from tarif ");
		$qtarif = mysql_query("INSERT INTO tarif VALUES('','$tahun','$tarif','$status')");
		if($qtarif){
			echo "<script>alert('Tahun dan tarif telah di tambah!');
			window.location='?Pg=Setting';</script>";
		}else{
			echo "<script>alert('tahun dan tarif gagal ditambahkan')</script>";
		}
	}else{
			echo"<script>alert('Isi Tarif dengan angka...');</script>";
		}	
}
$Isi = "<h3>Setting Tarif dan Tahun Ajaran</h3>
		<a href='?Pg=Setting' style='text-decoration:none;'>kembali</a><br>
		
		<form action='' method='POST'>
		<table>
			<tr>
				<td>Tahun Ajaran</td>
				<td>:</td>
				<td><input type='text' name='tahun' placeholder='yyyy-yyyy' /></td>
			</tr>
			<tr>
				<td>Tarif</td>
				<td>:</td>
				<td>Rp. <input type='text' name='tarif'/>,-</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><select name='status'>
					<option value='yes' selected>Aktifkan</option>
					<option value='no' selected>Non-Aktifkan</option>
				</select></td>
			</tr>
			<tr>
				<td colspan='3' align='center'><input type='submit' name='submit' value='Tambahkan' /></td>
			</tr>
		</table>
	</form>";
?>