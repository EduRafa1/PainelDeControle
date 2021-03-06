<?php 
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if ($class = 'Email') {
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
		/// Não deu pra incluir dinamicamente entao tenho que incluir individualmente
		include('classes/Painel.php');
		include('classes/MySql.php');
		include('classes/Site.php');
		include('classes/Usuario.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/php/projeto_1/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	//Conectar com o banco de dados
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD','');
	define('DATABASE','projeto_01');
	//Constantes

	define('NOME_EMPRESA','Danki Code');
	// Funcões do painel

	function pegaCargo($indice){
		
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if ($url == $par) {

			echo 'class="menu-active"';

		}
	} 
	function verificaPermissaoMenu($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			echo "style='display:none'";
		}
	}
	function verificaPermissaoPagina($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			include('painel/pages/permissao-negada.php');

			die();
		}
	}

 ?>