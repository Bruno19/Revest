		<header>
			<div class="FundoSuperior">
				<div class="Centro">
					<a href="index.php">
						<img src="imagens/logo.png" alt="logo" class="Logo"/>
					</a>
					
					<div class="RedesSociaisHeader">
						<div class="IconesEsquerda">							
							<img src="imagens/icones/pinterest.png" alt="Pinterest" class="Icones"/>
							<img src="imagens/icones/instagram.png" alt="Instagram" class="Icones"/>
							<img src="imagens/icones/fb.png" alt="Facebook" class="Icones"/>
						</div>
						<div class="FormDireita">
							<form name="buscar" method="post" action="">
								<input type="text" name="busca"/>
								<button onclick="this.submit();">
									<img src="imagens/icones/lupa.png" alt="Lupa"/>
								</button>
							</form>
						</div>
					</div>
					<nav>
						<ul class="MenuSuperior">
							<li>
								<a href="index.php" style="margin-right:48px;">
									<img src="imagens/icones/claquete.png" alt="claquete" class="IconeMenuSuperior"/>
									Home
								</a>
							</li>
							<li>
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li>
								<a href="#">
									Holofótes
								</a>
								<ul class="Dropdown">
									<li onclick="location.href='personalidades.php'">
										<a href="personalidades.php">Personalidades IN CENA</a>
									</li>
									<li onclick="location.href=''">
										<a href="#">Matérias e Artigos</a>
									</li>
									<li onclick="location.href='orgaos-do-setor.php'">
										<a href="orgaos-do-setor.php">Orgãos do Setor</a>
									</li>
									<li onclick="location.href='noticias.php'">
										<a href="noticias.php">Notícias</a>
									</li>
									<li onclick="location.href='projetos.php'">
										<a href="projetos.php">Projetos</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
									Anuncie
								</a>
							</li>
							<li>
								<a href="contato.php">
									Contato
								</a>
							</li>
						</ul>
					</nav>
					<div class="esp"></div>
				</div>
			</div>
			<div class="FundoInferior">			
				<div class="Centro DestaqueTopo">
					<?php 
						$SelectPublict = mysqli_query($conn, "SELECT * FROM publicidade LIMIT 0, 3");
						while($Publict=mysqli_fetch_object($SelectPublict)):
						if($Publict->image_p!=''):
					?>
						<a href="<?php echo $Publict->url_p?>" target="_blank">
							<img src="cms/imagens/publicidade/<?php echo $Publict->image_p?>" alt="destaque" class="ImagemDestaqueTopo"/>
						</a>
					<?php 
						endif;
						endwhile;
					?>
					<div class="esp"></div>
				</div>			
			</div>
		</header>