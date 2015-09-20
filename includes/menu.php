
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
				<li style="margin-left:15px;">
					<a href="fabricantes.php">
						<div class="FundoSubMenu f2"></div>
						<div class="TextoMenu">
							Fabricantes<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li style="margin-left:15px;">
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
						<div class="FundoSubMenu f4" style="width: 27%;"></div>
						<div class="TextoMenu" style="width: 72%;">
							Grupo técnico<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li style="margin-left:10px;">
					<a href="ofertas.php">
						<div class="FundoSubMenu f5" style="width: 27%;"></div>
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
				<li >
					<a href="doacao.php">
						<div class="FundoSubMenu f7"></div>
						<div class="TextoMenu">
							Doações<br/>
							IN CENA
						</div>
					</a>
				</li>
				<li>
					<?php
						$SelectMidiakit = mysqli_query($conn, "SELECT * FROM midiakit");
						$Midia = mysqli_fetch_object($SelectMidiakit);
						if($Midia->existe==0){
							echo '
								<a href="javascript:alert('."'".'Nenhum conteúdo para download!'."'".')">
							';
						}else{
							echo '
								<a href="cms/midiakit/'.$Midia->nome.'" download="'.$Midia->nome.'">
							';
						}
					?>
						<div class="FundoSubMenu f8"></div>
						<div class="TextoMenu">
							Baixe Nosso<br/>Mídia Kit
						</div>
					</a>
				</li>
			</ul>
			<div class="esp"></div>
		</div>