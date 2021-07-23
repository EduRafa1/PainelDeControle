<section class="banner-container">
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form.jpg');" class="banner-single"></div><!--banner-single-->
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form2.jpg');" class="banner-single"></div><!--banner-single-->
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form3.jpg');" class="banner-single"></div><!--banner-single-->
		<div class="overlay"></div><!--overlay--->
		<div class="center">
			<form>
				<h2>Qual o seu melhor E-mail?</h2>
				<input type="email" name="email" required>
				<input type="submit" name="acao" value="Cadastrar!">
			</form>
		</div><!--center-->
		<div class="bullets">
		
			
		</div><!--bullets-->
	</section><!--banner-cotbainer-->
	<section class="descricao-autor">
		<div class="center">
			<div class="w50 left">
				<h2>Guilherme C. Grillo</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div><!--w50-->
			<div class="w50 left">
				<img class="right" src="<?php echo INCLUDE_PATH ?>images/foto.jpg">
			</div><!--w50-->
			<div class="clear"></div><!--clear-->
		</div><!--center-->
	</section><!--dexcricao-autor-->

	<section class="especialidades">
		<div class="center">
			<h2 class="title">Especialidades</h2>
			<div class="box-especialidades w33 left">
				<h3><i class="fab fa-css3-alt"></i></h3>
				<h4>CSS3</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi </p>
			</div><!--box-especialidade-->
			<div class="box-especialidades w33 left">
				<h3><i class="fab fa-html5"></i></h3>
				<h4>HTML5</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi </p>
			</div><!--box-especialidade-->
			<div class="box-especialidades w33 left">
				<h3><i class="fab fa-node-js"></i></h3>
				<h4>JavaScript</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi </p>
			</div><!--box-especialidade-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--especialidades-->



	<section class="extras">
		<div class="center">
			<div id="depoimentos" class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos dos nossos clientes</h2>
				<?php 
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3 ");
					$sql->execute();
					$depoimentos = $sql->fetchAll();
					foreach ($depoimentos as $key => $value) {
						# code...
					
				 ?>
				<div class="depoimento-single">
					<p class="depoimento-descricao"><?php echo $value['depoimento']; ?></p>
					<p class="nome-autor"><?php echo $value['nome'] ?> - <?php echo $value['data'] ?></p>
				</div><!--depoimento-single-->
				<?php } ?>
			</div><!--w50-->

			<div id="servicos" class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
					</ul>
				</div><!--servicos-->
				
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--extras-->