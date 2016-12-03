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
            <option value=pilih kelas>nama kelas</option>$hasil</select></br>
		</form>";

if(isset($_POST['kelas'])){
    $q = mysql_query("select siswa.*, kelas.* from siswa inner join kelas on siswa.kd_kls=kelas.kd_kls where siswa.kd_kls='$kelas' AND kelas.kd_kls='$kelas'");
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
        </tr>
    ";
    }
	$Isi = " $form</br>
        <center><table id='tabel_gaya' width=100%>
        <tr>
         <td id='header_tabel' align=center>No</td>
        <td id='header_tabel' align=center>NIS</td>
        <td id='header_tabel' align=center>NAMA</td>
        <td id='header_tabel' align=center>JK</td>
        <td id='header_tabel' align=center>KELAS</td>
        </tr>
        $tamp
</table></center>";
}else{
	$Isi = "$form</br>";
}
 
 
 
 

?>