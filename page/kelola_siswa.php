<?php
$kelas = isset($_POST['kelas']) ? $_POST['kelas']:"";
$query = mysql_query("select * from kelas order by kd_kls");
while ($nmkls = mysql_fetch_array($query))
	{
        $kodekls = $nmkls['kd_kls'];
        $namakls = $nmkls['nama_kelas'];
        if($kodekls == $kelas){
            $hasil .="
		      <option value=$kodekls selected>$namakls</option>";	
        }else{
            $hasil .="
		      <option value=$kodekls>$namakls</option>";
        }
        
	}
	
$form ="<form action='' method='POST'>
 			Pilih kelas : 
            <select name='kelas' onchange=this.form.submit(); value='pilih kelas'>
            <option value=pilih kelas>nama kelas</option>$hasil</select>&nbsp;&nbsp;&nbsp; <br></br>
			<a href='?Pg=Input_siswa' style='text-decoration:none;'>Tambah Data Siswa</a>
		</form>";

if(isset($_POST['kelas'])){
    $q = mysql_query("select siswa.*, kelas.* from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls where siswa.kd_kls='$kelas' AND kelas.kd_kls='$kelas' order by nama");
    $i=0;
    $row=mysql_num_rows($q);
    while ($siswa=mysql_fetch_array($q)){
    $i++;
    $tamp .="
        <tr>
         <td id='content_tabel' align=center>$i</td>
        <td id='content_tabel' align=center>{$siswa['nis']}</td>
        <td id='content_tabel' align=left>{$siswa['nama']}</td>
        <td id='content_tabel' align=center>{$siswa['jk']}</td>
        <td id='content_tabel' align=center>{$siswa['nama_kelas']}</td>
        <td id='content_tabel' align=center>
			<A HREF='?Pg=Ubah&nis={$siswa['nis']}'><img src='./image/edit.png' alt='' /></A> || 
			<A HREF='?Pg=d_siswa&nis={$siswa['nis']}' onclick='return confirm(\"Anda Yakin akan menghapus data siswa tersebut\");'><img src='./image/delete.png' alt='' /></A>
		</td>
        </tr>
    ";
    }
	$Isi = " $form&nbsp;&nbsp;
		
		</br>
        <center><table id='tabel_gaya' width=100%>
        <tr>
         <td id='header_tabel' align=center>No</td>
        <td id='header_tabel' align=center>NIS</td>
        <td id='header_tabel' align=center>NAMA</td>
        <td id='header_tabel' align=center>JK</td>
        <td id='header_tabel' align=center>KELAS</td>
        <td id='header_tabel' align=center>AKSI</td>
        </tr>
        $tamp
</table></center>";
}else{
	$Isi = "$form";
}
 
 
 
 

?>