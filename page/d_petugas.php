<?php
if(isset($_GET['id_user'])) {$id=$_GET['id_user'];
} else {
	die ("Error.No Id Selected");
		}
if (!empty($id)!="")
	{
		$query="DELETE FROM user WHERE id_user='$id'";
		$sql= mysql_query($query);
		if ($sql)
		{
			echo"
			<script>
			alert('Data petugas atas nama tersebut telah di hapus');
			window.location='?Pg=Petugas';
			</script>
			";
		}else{
			echo "<script>
            alert('Petugas atas Id tersebut gagal dihapus');
            history.back(-1);
            </script>";
		}
		
	}
?>