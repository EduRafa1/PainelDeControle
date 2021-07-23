<?php 

	verificaPermissaoPagina(2);
 ?>
<div class="box-content">
	<h2><i class="fas fa-pen"></i> Editar Usuário</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if (isset($_POST['acao'])) {
				$loguin = $_POST['loguin'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];

				if ($loguin == '') {
					Painel::alert('erro','Loguin esta vázio');
				}else if($nome == ''){
					Painel::alert('erro','Nome esta vázio');
				}else if($senha == ''){
					Painel::alert('erro','Senha esta vázio');
				}else if($imagem == ''){
					Painel::alert('erro','Imagem esta vázio');
				}else if($cargo == ''){
					Painel::alert('erro','Cargo precisa estar selecionado');
				}else if($imagem['name'] == ''){
					Painel::alert('erro','Imagem precisa estar selecionada');
				}else{
					//Podemos cadastrar
					if ($cargo >= $_SESSION['cargo']) {
						Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
					}else if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','O formato da imagem não está correto!');
					}else if (Usuario::userExists($loguin)) {
						Painel::alert('erro','O nome " > '.$loguin.' < " já existe');
					}else{
						$imagem = Painel::uploadFile($imagem);
						Usuario::cadastrarUsuario($loguin,$senha,$imagem,$nome,$cargo);
						Painel::alert('sucesso','Cadastro do usuário '.$loguin .' foi feita com sucesso');
					}
				}
				
				
			
			}
			

		 ?>
		 <div class="form-group">
			<label>Loguin:</label>
			<input type="text" name="loguin" >
		</div><!--form-group-->
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" >
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" >
		</div><!--form-group-->
		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php foreach (Painel::$cargos as $key => $value) {
					if ($key < $_SESSION['cargo']) {
						echo "<option value=".$key.">".$value."</option>";
					}
				} ?>
			</select>
		</div><!--form-group-->
		<div class="form-group">
			<label>Image:</label>
			<input type="file" name="imagem">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar" required>
		</div><!--form-group-->

</div><!--box-content-->