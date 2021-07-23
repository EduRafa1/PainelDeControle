<?php 	include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/style.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descrição do meu Website">
	<meta name="keywords" content="palavras,chaves,do,meu,site">

	<meta charset="utf-8" />
</head>
<body>
	<?php 
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos" />';
				break;
			
			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	 ?>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH ?>images/ajax-loader.gif">
	</div><!--overlay-loading-->
	<header>
		<div class="center">
			<div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>
			</nav><!--desktop-->
			<nav class="mobile right">
				<i class="fas fa-bars"></i>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>
			</nav><!--mobile-->

			<div class="clear"></div>
		</div><!--center-->
	</header>
	<?php 
		
		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			//Podemos fazer o que quiser pois a pagina não existe
			if ($url != 'depoimentos' && $url != 'servicos') {
				$pagina404 = true;
				include('pages/404.php');
			}else
				include('pages/home.php');
			}
			
		
			
		
	 ?>
	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'?> >
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div>
	</footer>

	<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
	<?php 
		if ($url == 'home' || $url == '') {

	 ?>
	<script src="<?php echo INCLUDE_PATH ?>js/slider.js"></script>
	<?php 
}
	 ?>
	<?php 
		if ($url == 'contato') {
		
	 ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzasyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
	<script src="<?php echo INCLUDE_PATH ?>js/map.js"></script>
	<?php 
		}
	 ?>
	 <script src="<?php echo INCLUDE_PATH  ?>js/formularios.js"></script>
</body>
</html>