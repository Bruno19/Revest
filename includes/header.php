	<?php error_reporting(0);?>
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
<?php 
        if($pagename=="home"){

?>
							<li style="background-position: 35px 3px;" class="claquete_ativa" id="hover_claquete">
								<a href="index.php" style="margin-right:48px;">
									Home
								</a>
							</li>
							<li style="background-position: 18px 3px; width: 150px;" id="hover_claquete">
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li style="background-position: 58px 3px;" id="hover_claquete">
								<a href="#">
									Holofótes
								</a>
								<ul class="Dropdown">
									<li onclick="location.href='personalidades.php'">
										<a href="personalidades.php">Personalidades IN CENA</a>
									</li>
									<li onclick="location.href=''">
										<a href="materias.php">Matérias e Artigos</a>
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
                                    <li onclick="location.href='newslatter.php'">
										<a href="newslatter.php">Newslatter</a>
									</li>
								</ul>
							</li>
							<li style="background-position: 65px 3px;" id="hover_claquete">
								<a href="#">
									Anuncie
								</a>
							</li>
							<li style="background-position: 63px 3px;" id="hover_claquete">
								<a href="contato.php">
									Contato
								</a>
							</li>
<?php }elseif($pagename=="quem-somos"){ ?>
                            
							<li style="background-position: 35px 3px;"  id="hover_claquete">
								<a href="index.php" style="margin-right:48px;">
									Home
								</a>
							</li>
							<li style="background-position: 18px 3px; width: 150px;" class="claquete_ativa" id="hover_claquete">
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li style="background-position: 58px 3px;" id="hover_claquete">
								<a href="#">
									Holofótes
								</a>
								<ul class="Dropdown">
									<li onclick="location.href='personalidades.php'">
										<a href="personalidades.php">Personalidades IN CENA</a>
									</li>
									<li onclick="location.href=''">
										<a href="materias.php">Matérias e Artigos</a>
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
                                    <li onclick="location.href='newslatter.php'">
										<a href="newslatter.php">Newslatter</a>
									</li>
								</ul>
							</li>
							<li style="background-position: 65px 3px;" id="hover_claquete">
								<a href="#">
									Anuncie
								</a>
							</li>
				            <li style="background-position: 63px 3px;" id="hover_claquete">
								<a href="contato.php">
									Contato
								</a>
							</li>
<?php }elseif($pagename=="contato"){ ?>
                            
							<li style="background-position: 35px 3px;"  id="hover_claquete">
								<a href="index.php" style="margin-right:48px;">
									Home
								</a>
							</li>
							<li style="background-position: 18px 3px; width: 150px;" id="hover_claquete">
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li style="background-position: 58px 3px;" id="hover_claquete">
								<a href="#">
									Holofótes
								</a>
								<ul class="Dropdown">
									<li onclick="location.href='personalidades.php'">
										<a href="personalidades.php">Personalidades IN CENA</a>
									</li>
									<li onclick="location.href=''">
										<a href="materias.php">Matérias e Artigos</a>
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
                                    <li onclick="location.href='newslatter.php'">
										<a href="newslatter.php">Newslatter</a>
									</li>
								</ul>
							</li>
							<li style="background-position: 65px 3px;" id="hover_claquete">
								<a href="#">
									Anuncie
								</a>
							</li>
                            				      
							<li style="background-position: 63px 3px;" id="hover_claquete"  class="claquete_ativa">
								<a href="contato.php">
									Contato
								</a>
							</li>
<?php }elseif($pagename=="holofotes"){ ?>
                            
							<li style="background-position: 35px 3px;"  id="hover_claquete">
								<a href="index.php" style="margin-right:48px;">
									Home
								</a>
							</li>
							<li style="background-position: 18px 3px; width: 150px;" id="hover_claquete">
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li style="background-position: 58px 3px;" id="hover_claquete" class="claquete_ativa">
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
                                    <li onclick="location.href='newslatter.php'">
										<a href="newslatter.php">Newslatter</a>
									</li>
								</ul>
							</li>
							<li style="background-position: 65px 3px;" id="hover_claquete">
								<a href="#">
									Anuncie
								</a>
							</li>
                            <li style="background-position: 63px 3px;" id="hover_claquete">
								<a href="contato.php">
									Contato
								</a>
							</li>
<?php }else if(!isset($pagename)){ ?>
                            
							<li style="background-position: 35px 3px;"  id="hover_claquete" class="claquete_ativa">
								<a href="index.php" style="margin-right:48px;">
									Home
								</a>
							</li>
							<li style="background-position: 18px 3px; width: 150px;" id="hover_claquete">
								<a href="quem-somos.php" style="margin-right:8px;">
									Quem Somos
								</a>
							</li>
							<li style="background-position: 58px 3px;" id="hover_claquete" >
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
                                    <li onclick="location.href='newslatter.php'">
										<a href="newslatter.php">Newslatter</a>
									</li>
								</ul>
                                
							</li>
							<li style="background-position: 65px 3px;" id="hover_claquete">
								<a href="#">
									Anuncie
								</a>
							</li>
                            <li style="background-position: 63px 3px;" id="hover_claquete">
								<a href="contato.php">
									Contato
								</a>
							</li>
<?php } ?>					
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