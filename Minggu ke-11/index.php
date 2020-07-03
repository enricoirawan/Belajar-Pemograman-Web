<?php 
include 'conn.php'; 
include 'conf.php';
include_once("controller/Controller.php");
$koneksi = new Connect();
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>PDO CRUDSRUD</title> 
	<link rel="stylesheet" type="text/css" href="assets/css/css.css"> 
</head> 
<body> 
	<div class="top-gray"></div> 
	<div class="header"> 
		<div class="big-logo">Latihan CRUDSRUD</div> 
		<?php include 'menu.php';?> 
	</div> 
	<div class="content"><div class="container"> 
	<?php 
	if(!is_null(get('p'))){ 
		switch (get('p')) { 
			case 'home': 
			inc('home'); 
			break; 
		case 'sekolah': 
			$controller = new Controller();
			$controller->invoke(); 
			switch (get('m')) { 
			case 'home': 
			inc('tampilan/sekolah/all'); 
			break; 
			case 'add': 
			inc('tampilan/sekolah/add'); 
			break; 
			case 'edit': 
			inc('tampilan/sekolah/edit'); 
			break; 
		} 
		break; 
		default: 
			inc('home'); 
			break; 
		} 
		}else{ inc('home'); } ?> 
	</div></div> 
</body> 
</html>