<?php 
	$usuariosOnline = Painel::listarUsuariosOnline();
 ?>
 <?php $pegarVisitasTotais = MySql::conectar()->prepare('SELECT * FROM `tb_admin.visita`');
 		$pegarVisitasTotais->execute();
 		$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

 		$pegarVisitasHoje = MySql::conectar()->prepare('SELECT * FROM `tb_admin.visita` WHERE dia = ?');
 		$pegarVisitasHoje->execute(array(date('Y-m-d')));
 		$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
 		
 ?>
<div class="box-content left w100">
		<div class="box-metricas">
			<h1>Painel de controle - <?php echo NOME_EMPRESA ?></h1>
			<div style="background-color: #338a81" class="box-metricas-single">
					<h2>Usuários online</h2>
					<p><?php echo count($usuariosOnline); ?></p>
			</div><!--box-metricas-single-->
			<div style="background-color: #fc944e"  class="box-metricas-single">
					<h2>Total de visitas</h2>
					<p><?php echo $pegarVisitasTotais; ?></p>
			</div><!--box-metricas-single-->
			<div style="background-color: #4c52f5"  class="box-metricas-single">
					<h2>Visitas hoje</h2>
					<p><?php echo $pegarVisitasHoje; ?></p>
			</div><!--box-metricas-single-->
		</div><!--box-metricas-->
</div><!--box-content-->

<div class="box-content left w100">
	<div class="box-metricas">
			<h1><i class="fas fa-toggle-on"></i> Usuários Online </h1>
	</div><!--box-metricas-->
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div><!--col-->
			<div class="col">
				<span>Ultima Ação</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
		<?php 
			foreach ($usuariosOnline as $key => $value) {
								# code...
											
		 ?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip']; ?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
		<?php } ?>
	</div><!--table-responsive-->
</div><!--box-content-->
<div class="box-content left w100">
	<div class="box-metricas">
			<h1><i class="fas fa-toggle-on"></i> Usuários do Painel </h1>
	</div><!--box-metricas-->
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>Nome:</span>
			</div><!--col-->
			<div class="col">
				<span>Cargo</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
		<?php 
			$usuariosPainel = MySql::conectar()->prepare('SELECT * FROM `tb_admin.usuarios`');
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value) {
								# code...
											
		 ?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['user']; ?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo pegaCargo($value['cargo']); ?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
		<?php } ?>
	</div><!--table-responsive-->
</div><!--box-content-->
<div class="clear"></div>