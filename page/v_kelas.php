<?php
$jur = isset($_POST['jurusan']) ? $_POST['jurusan']:"";
$query = mysql_query("select * from jurusan order by kd_jurusan");
while ($nmkls = mysql_fetch_array($query))
	{
        $kodejur = $nmkls['kd_jurusan'];
        $namajur = $nmkls['nama_jurusan'];
        if($kodejur == $jur){
            $hasil .="
		      <option value=$kodejur selected>$namajur</option>";	
        }else{
            $hasil .="
		      <option value=$kodejur>$namajur</option>";
        }
        
	}
$form ="<form action='' method='POST'>
 			
			Pilih Kompetensi Keahlian : 
            <select name='jurusan' onchange=this.form.submit(); value='pilih jurusan'>
            <option value=pilih jurusan>nama jurusan</option>$hasil</select></br>
		</form>";
		
if(isset($_POST['jurusan'])){
	$X = mysql_query("SELECT * FROM kelas INNER JOIN jurusan ON kelas.kd_jurusan=jurusan.kd_jurusan WHERE kelas.kd_jurusan='$jur'");
	$s = 0;
	while($exs=mysql_fetch_array($X)){
	$s++;
	$tamp_kls .="<tr>
			<td id='content_tabel' align='center'>$s</td>
			<td id='content_tabel' align='center'>{$exs['nama_kelas']}</td>
			<td id='content_tabel' align='center'>{$exs['nama_jurusan']}</td>
		</tr>";
	}
	$tx = "<table id='tabel_gaya' border='1'>
		<tr>
			<td id='header_tabel' align='center'>NO.</td>
			<td id='header_tabel' align='center'>NAMA KELAS</td>
			<td id='header_tabel' align='center'>KOMP. KEAHLIAN</td>
		</tr>
		$tamp_kls
	</table>";
	$Isi = "$form</br>$tx";
}else{
	$Isi = "$form";
}
?>