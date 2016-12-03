<?php
	session_start();
	unset($_SESSION["id"]);
	unset($_SESSION["nama"]);
	unset($_SESSION["jk"]);
	session_destroy();
	header("Location:?");


?>