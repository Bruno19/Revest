
		<div class="Centro SubMenu">
			<ul class="ListaSubMenu">
				<li>
					<a href="profissionais.php">
						<div class="FundoSubMenu f1"></div>
						<div class="TextoMenu">
							Profissionais<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="fabricantes.php">
						<div class="FundoSubMenu f2"></div>
						<div class="TextoMenu">
							Fabricantes<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="lojas.php">
						<div class="FundoSubMenu f3"></div>
						<div class="TextoMenu">
							Lojas<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="tecnicos.php">
						<div class="FundoSubMenu f4"></div>
						<div class="TextoMenu">
							Técnicos<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="ofertas.php">
						<div class="FundoSubMenu f5"></div>
						<div class="TextoMenu">
							Ofertas<br/>
							IN CENA
						</div> 
					</a>
				</li>
				<li>
					<a href="eventos.php">
						<div class="FundoSubMenu f6"></div>
						<div class="TextoMenu">
							Eventos<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="doacao.php">
						<div class="FundoSubMenu f7"></div>
						<div class="TextoMenu">
							Doação<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="FundoSubMenu f8"></div>
						<div class="TextoMenu">
						<?php
							$SelectMidiakit = mysqli_query($conn, "SELECT * FROM midiakit");
							$Midia = mysqli_fetch_object($SelectMidiakit);
							if($Midia->existe==0){
								echo '
									<a href="javascript:alert('."'".'Nenhum conteúdo para download!'."'".')" style="color: inherit; text-decoration: none">Baixe Nosso<br/>Mídia Kit</a>
								';
							}else{
								echo '
									<a href="cms/midiakit/'.$Midia->nome.'" download="'.$Midia->nome.'" style="color: inherit; text-decoration: none">Baixe Nosso<br/>Mídia Kit</a>
								';
							}
						?>							
						</div>
					</a>
				</li>
			</ul>
			<div class="esp"></div>
		</div>