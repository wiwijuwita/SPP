<?php
if($_POST['cari']){
	$Siswa = strip_tags(addslashes(trim($_POST['siswa'])));
	if(!empty($Siswa)){
		if(strlen($Siswa) < 3){
			echo "<script>
				alert('Teridentifikasi!Karakter kurang dari 3 karakter!')
				</script>";
		}else{
			$no = 1;
			$Search = mysql_query("SELECT siswa.*, kelas.* FROM siswa INNER JOIN kelas ON siswa.kd_kls=kelas.kd_kls WHERE (nama like '%$Siswa%' or nis like '%$Siswa%')");
			$numRow = mysql_num_rows($Search);
			while($data=mysql_fetch_array($Search)){
				$nisSiswa = $data['nis'];
				$namaSiswa = $data['nama'];
				$kelasSiswa = $data['nama_kelas'];
				$jkSiswa = $data['jk'];
				$DisplaySearch .= "<TR>
						<TD id='content_tabel'><center>$no.</center></TD>
						<TD id='content_tabel'><center>$nisSiswa</center></TD>
						<TD id='content_tabel'><A HREF='?Pg=Bayar&nis=$nisSiswa' style='text-decoration:none;'>$namaSiswa</a></TD>
						<TD id='content_tabel'><center>$jkSiswa</center></TD>
						<TD id='content_tabel'><center>$kelasSiswa</center></TD>
					</TR>";
				$no++;
				$View = "Terdapat <b>$numRow</b> siswa dari hasil pencarian <b>$Siswa</b>";
			}
			if(!$numRow){
				$HeaderView ="<span>Tidak ada hasil untuk <B>$Siswa</B>. [<A HREF='?Pg=$Pg'>Coba Lagi</A>]</span><BR><BR>";
			}else{
				$HeaderView = "<TABLE id='tabel_gaya' width=100%><TR>
					<TD id='header_tabel'><center>NO</center></TD>
					<TD id='header_tabel'><center>NIS</center></TD>
					<TD id='header_tabel'><center>NAMA</center></TD>
					<TD id='header_tabel'><center>L/P</center></TD>
					<TD id='header_tabel'><center>KELAS</center></TD>
					</TR>
					$DisplaySearch
					</TABLE>";
			}
		}
	}else{
			echo "<script>alert('Tidak ada hasil!')</script>";
		}
}
$Isi = "<H3>Transaksi Pembayaran</H3></br>
		<form action='' method='POST'>
		<strong>Cari Siswa.<br>Masukkan Nama Lengkap / NIS : </strong>
		<input type='text' name='siswa' placeholder='ketikan nama lengkap' required=''>
		<input type='submit' name='cari' value='Cari Siswa'>
		</form><br>
		$View
		$HeaderView";

?> 