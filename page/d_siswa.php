<?php
if(isset($_GET['nis'])) {$nis=$_GET['nis'];
} else {
	die ("Error.No NIS Selected");
		}
if (!empty($nis)!="")
	{
		$query="DELETE FROM siswa WHERE nis=$nis";
		$sql= mysql_query($query);
		if ($sql)
		{
			echo"
			<script>
			alert('Data siswa atas nama tersebut telah di hapus');
			window.location='?Pg=Kelola_siswa';
			</script>
			";
		}else{
			echo "<script>
            alert('Nama atas Id tersebut gagal dihapus');
            history.back(-1);
            </script>";
		}
		
	}



	
?>