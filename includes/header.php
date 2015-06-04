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
								<a href="index.php">
									<img src="imagens/icones/claquete.png" alt="claquete" class="IconeMenuSuperior"/>
									Home
								</a>
							</li>
							<li>
								<a href="quem-somos.php">
									Quem Somos
								</a>
							</li>
							<li>
								<a href="#">
									Holofótes
								</a>
							</li>
							<li>
								<a href="#">
									Anuncie
								</a>
							</li>
							<li>
								<a href="#">
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
					<?php for($i=1; $i<=3; $i++):?>
						<a href="#">
							<img src="imagens/dest<?php echo $i;?>.jpg" alt="destaque" class="ImagemDestaqueTopo"/>
						</a>
					<?php endfor;?>
					<div class="esp"></div>
				</div>			
			</div>
		</header>