
<div class="box-content">
	<h2><i class="fas fa-pen"></i> Editar Usuário</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if (isset($_POST['acao'])) {
					
				
				
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagemAtual = $_POST['imagem_atual'];
				
				if ($imagem['name'] != '') {
					// Existe um upload de Imagem
					if (Painel::imagemValida($imagem)){
						Painel::deleteFile($imagemAtual);
					 	$imagem = Painel::uploadFile($imagem);

					 	if(Usuario::atualizarUsuario($nome,$senha,$imagem)){
					 		$_SESSION['img'] = $imagem;
						Painel::alert('sucesso','Atualizado com sucesso Junto com a imagem');
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar.. Junto com a imagem');
						}
					 } else{
					 	Painel::alert('erro','O formato da imagem não é valido');
					 }

				}else{
					$imagem = $imagemAtual;
					if(Usuario::atualizarUsuario($nome,$senha,$imagem)){
						Painel::alert('sucesso','Atualizado com sucesso');
					}else{
						Painel::alert('erro','Ocorreu um erro ao atualizar..');
					}
				}
			}
			

		 ?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" required value="<?php echo $_SESSION['password'];?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Image:</label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar" required>
		</div><!--form-group-->

</div><!--box-content-->