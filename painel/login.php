<?php 
	if(isset($_COOKIE['lembrar'])) {
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
			$sql->execute(array($user,$password));
			if ($sql->rowCount() == 1) {

				$info = $sql->fetch();
				///Logamos com sucesso
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome'];
				$_SESSION['img'] = $info['img'];
				header('Location: '.INCLUDE_PATH_PAINEL);
				die();

			}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.min.css">
</head>
<body>
	<div class="box-login">
		<?php 
			if (isset($_POST['acao'])) {
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if ($sql->rowCount() == 1) {
					$info = $sql->fetch();
					///Logamos com sucesso
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					if (isset($_POST['lembrar'])) {
						setcookie('lembrar',true,time()+(60*60*24),'/');
						setcookie('user',$user,time()+(60*60*24),'/');
						setcookie('password',$password,time()+(60*60*24),'/');
					}
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//Falhou
					echo '<div class="erro-box"><i class="fas fa-times"></i> Usuário ou senha inválido</div>';
				}
			}
		 ?>
		<h2>Efetue o login</h2>
		<form method="post">
			<input type="text" name="user" placeholder="Login.." required>
			<input type="password" name="password" placeholder="Senha.." required>
			<div class="form-group-login left">	
				<input type="submit" name="acao" placeholder="Logar" required>
			</div>
			<div class="form-group-login right">	
				<label>Lembrar-me</label>
				<input type="checkbox" name="lembrar">
			</div>
			<div class="clear"></div>
			
		</form>
	</div><!--box-loguin-->
</body>
</html>