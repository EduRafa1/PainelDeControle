<?php 
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.min.css">
	<title>Painel de Controle</title>
</head>
<body>

<div class="menu">
	<div class="menu-wraper">
		<div class="box-usuario">
			<?php 
				if ($_SESSION['img'] == '') {
					# code...
				
			 ?>
			<div class="avatar-usuario">
				<i class="fas fa-user"></i>
			</div><!--AVATAR-USUARIO-->
			<?php }else{
			 ?>
			<div class="image-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img']?>">
			</div><!--AVATAR-USUARIO-->
			<?php } ?>
			<div class="nome-usuario">
				<p><?php echo $_SESSION['nome']; ?></p>
				<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
			</div><!--NOME-USUARIO-->	
		</div><!--box-usuario-->
		<div class="itens-menu">
			<h2>Cadastro</h2>
			
			<a <?php selecionadoMenu('cadastrar-depoimentos');?> href=" <?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimentos">Cadastrar Depoimentos</a>
			<a <?php selecionadoMenu('cadastrar-servico');?> href="">Cadastrar Serviço</a>
			<a href="">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a <?php selecionadoMenu('listar-depoimento');?> href=" <?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos">Lista Depoimentos</a>
			<a <?php selecionadoMenu('listar-servico');?> href="">Lista Serviços</a>
			<a <?php selecionadoMenu('listar-slide');?> href="">Lista Slides</a>
			<h2>Adiministração do painel</h2>
			<a <?php selecionadoMenu('editar_usuario');?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar_usuario">Editar Usuário</a>
			<a <?php selecionadoMenu('adicionar-usuario');?> <?php verificaPermissaoMenu(2); ?>adicionar-usuari href="<?php INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar Usuário</a>
			<h2>Configuração Geral</h2>
			<a <?php selecionadoMenu('editar-site');?> href="">Editar Site</a>
			
		</div><!--intens-menu-->
	</div><!--menu-wraper-->	
</div><!--menu--->
<header class="painel-controle">
	<div class="center">
		<div class="menu-btn">
			<i class="fas fa-bars"></i>
		</div>
		
		<div class="loggout">
		 <a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fas fa-sign-out-alt"></i> Sair</a>		
		</div><!--loggout-->
		<div class="loggout">
			<a <?php  if(@$_GET['url'] == 'home'){ ?> style='background-color: #60727a; padding: 10px;' <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>home"><i class="fas fa-home"></i> Página Inicial</a>
		</div><!--btn-home-->
		<div class="clear"></div>
	</div><!--center--->
</header>
<div class="content">
	<?php Painel::carregarPagina(); ?>
</div>
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>

</body>
</html>