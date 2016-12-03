<?php session_start();
require "./common/konfig.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if(!empty($_SESSION['login'])){
    require "./template/template.php";
    require "./template/header.php";
    require "./template/atas.php";
    require "./template/menu.php";
    require "./template/footer.php";
}else{
    require "./template/layout.php";
}

$tampil = $Template;
$Pg=isset($_GET['Pg'])?$_GET['Pg']:"";
switch ($Pg){
    case "Login":
        require "./template/layout.php";
        break;
    case "Logout":
		require ("./template/logout.php");
		break;
    case "Petugas":
		require ("./page/dftuser.php");
		break;
    case "Input_petugas":
		require ("./page/input_petugas.php");
		break;
	case "D_petugas":
		require ("./page/d_petugas.php");
		break;
	case "E_user":
		require ("./page/e_user.php");
		break;
	case "Pembayaran":
		require ("./page/pembayaran.php");
		break;
	case "Bayar":
		require ("./page/bayar.php");
		break;
	case "Kwitansi":
		require ("./page/kwintansi.php");
		break;
    case "Laporan":
	   require("./page/laporan.php");
		break;
	case "Belum_bayar":
	   require("./page/blm_bayar.php");
		break;
	case "Report":
	   require("./page/user_report.php");
		break;
	case "Perpetugas":
	   require("./page/report_perpetugas.php");
		break;
	case "Siswa":
		require ("./page/siswa.php");
		break;
	case "Kelola_siswa":
		require ("./page/kelola_siswa.php");
		break;
	case "Input_siswa":
		require ("./page/input_siswa.php");
		break;
	case "d_siswa":
		require ("./page/d_siswa.php");
		break;
	case "Ubah":
		require ("./template/ubah.php");
		break;
	case "Setting":
		require ("./page/setting.php");
		break;
	case "T_setting":
		require ("./page/t_setting.php");
		break;
	case "E_setting":
		require ("./page/e_setting.php");
		break;
	case "Print":
		require ("./page/print.php");
		break;

    default :
        require "./template/isi.php";
        break;
}

$tampil = str_replace("<!--Header-->",$Header,$tampil);
$tampil = str_replace("<!--Atas-->",$Atas,$tampil);
$tampil = str_replace("<!--Menu-->",$Menu,$tampil);
$tampil = str_replace("<!--Isi-->",$Isi,$tampil);
$tampil = str_replace("<!--Footer-->",$Footer,$tampil);

echo $tampil;
?>
