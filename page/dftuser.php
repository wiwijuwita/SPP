<?php
$query = mysql_query("SELECT * FROM user ");
$i = 0;
while($data=mysql_fetch_array($query)){
	
	$i++;
	$show .= "<tr>
				<td id='content_tabel' align=center>$i</td>
				<td id='content_tabel' align=center>{$data['username']}</td>
				<td id='content_tabel'>{$data['nama_user']}</td>
                <td id='content_tabel' align=center>{$data['jk']}</td>
                <td id='content_tabel' align=center>{$data['alamat']}</td>
                <td id='content_tabel' align=center>{$data['telepon']}</td>
                <td id='content_tabel' align=center>{$data['level']}</td>
                <td id='content_tabel' align=center>
					<a href='?Pg=E_user&id_user={$data['id_user']}'><img src='./image/edit.png' alt='' /></a> || 
                    <a href='?Pg=D_petugas&id_user={$data['id_user']}' onclick='return confirm(\"Anda Yakin akan menghapus data user tersebut\");'><img src='./image/delete.png' alt='' /></a>
                </td>
			<tr>";
}

$Isi = "<h2>Data Petugas</h2>
    <a href='?Pg=Input_petugas' style='text-decoration:none;'>Tambah Petugas</a></br></br>
	<center><table id='tabel_gaya' width=100%>
	<tr>
		<td id='header_tabel' align=center>No.</td>
		<td id='header_tabel' align=center>Username</td>
		<td id='header_tabel' align=center>Nama</td>
        <td id='header_tabel' align=center>JK</td>
        <td id='header_tabel' align=center>Alamat</td>
        <td id='header_tabel' align=center>Telepon</td>
        <td id='header_tabel' align=center>Status</td>
        <td id='header_tabel' align=center>Aksi</td>
	</tr>
	$show
	</table></center>";
?>