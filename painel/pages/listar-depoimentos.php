<?php 

	if (isset($_GET['excluir'])) {
		$idExcluir = (int)$_GET['excluir'];
		Painel::deletar('tb_site.depoimentos',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
	}else if(isset($_GET['order'])){
		Painel::order('tb_site.depoimentos',$_GET['order'],$_GET['id']);
	}
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;

		$depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);

 ?>
<div class="box-content">
	<h2><i class="fas fa-biohazard"></i> Depoimentos Cadastrados</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-file-signature"></i> Nome</td>
				<td><i class="fas fa-file-signature"></i> Data</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
			</tr>
			<?php 

				foreach ($depoimentos as $key => $value) {
					# code...
				

			 ?>
			<tr>
				<td><?php echo $value['nome']; ?></td>
				<td><?php echo $value['data']; ?></td>
				<td><a class="btn btn-edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar_depoimento?id=<?php echo $value['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
				<td><a actionBtn="delete" class="btn btn-delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?excluir=<?php echo $value['id'] ?>"><i class="fas fa-times"></i> Excluir</a></td>
				<td><a class="btn-arrow" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=down&id=<?php echo $value['id'] ?>"><i class="fas fa-arrow-down "></i></a></td>
				<td><a class="btn-arrow" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=up&id=<?php echo $value['id'] ?>"><i class="fas fa-arrow-up " ></i></a></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<div class="paginacao">
		<?php 
			$totalPagina = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);

			for ($i = 0; $i < $totalPagina ; $i++) {
				$valorPagina = $i + 1;
				if ($valorPagina == $paginaAtual) {
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$valorPagina.'">'.$valorPagina.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$valorPagina.'">'.$valorPagina.'</a>';
				}
				
			}

		 ?>
	</div>

</div><!--box-content-->