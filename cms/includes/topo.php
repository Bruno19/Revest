<?php 
	include_once('php/class/usuario.class.php');
	$Usuario = new Usuario;
	$Usuario->CarregarDados($conn, $_SESSION['id']);
?>
		<header>
			<section class="Centro">
				<a href="../index.php">
					<img src="../imagens/logo.png" alt="Logo" class="Logo"/>
				</a>
				
				<div class="TopoSair">
					Seja Bem-vindo <a href="config.php?m=3"><?php echo $Usuario->nome;?></a>!<br/>
					<a href="config.php?m=3">Editar</a> | <a href="php/sair.php">Sair</a>
				</div>
				<div class="esp"></div>
			</section>
		</header>
		<nav>
			<section class="Centro">
				<ul class="ListaMenu">
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<li>
						<a href="#">Notícias</a>
						<ul class="DropDown">
							<li>
								<a href="noticia.php?action=create&type=news">Cadastrar Notícia</a>
							</li>
							<li>
								<a href="noticia.php?action=list&type=news">Notícias Cadastradas</a>
							</li>
							<li>
								<a href="#">Clipping de Notícias</a>
								<ul class="DropDown2">
									<li><a href="clipping.php?action=list&type=1">Lista de Cadastrados</a></li>
									<li><a href="clipping.php?action=create&type=1">Cadastrar Novo</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Doações</a>
						<ul class="DropDown">
							<li>
								<a href="noticia.php?action=create&type=donation">Cadastrar Doação</a>
							</li>
							<li>
								<a href="noticia.php?action=list&type=donation">Doações Cadastradas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Eventos</a>
						<ul class="DropDown">
							<li>
								<a href="clipping.php?action=create&type=2">Cadastrar Evento</a>
							</li>
							<li>
								<a href="clipping.php?action=list&type=2">Eventos Cadastrados</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Orgãos do Setor</a>
						<ul class="DropDown">
							<li>
								<a href="orgaos-do-setor.php?action=create">Cadastrar Orgãos</a>
							</li>
							<li>
								<a href="orgaos-do-setor.php?action=list">Orgãos Cadastrados</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Ofertas</a>
						<ul class="DropDown">
							<li>
								<a href="person.php?action=create&type=1">Cadastrar</a>
							</li>
							<li>
								<a href="person.php?action=list&type=1">Lista de Cadastrados</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Personalidades</a>
						<ul class="DropDown">
							<li>
								<a href="person.php?action=create&type=2">Cadastrar</a>
							</li>
							<li>
								<a href="person.php?action=list&type=2">Lista de Cadastrados</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Projetos</a>
						<ul class="DropDown">
							<li>
								<a href="project.php?action=create&type=project">Ver Mais</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Outros</a>
						<ul class="DropDown">
							<li>
								<a href="others.php?area=partner">Logo de Parceiros</a>
							</li>
							<li>
								<a href="others.php?area=sliders">Mini Slider</a>
							</li>
							<li>
								<a href="others.php?area=marketing">Publicidade</a>
							</li>
							<li>
								<a href="#">Profissionais</a>
								<ul class="DropDown2">
									<li><a href="mapping.php?action=list&area=1">Lista de Cadastrados</a></li>
									<li><a href="mapping.php?action=create&area=1">Cadastrar Novo</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Fabricantes</a>
								<ul class="DropDown2">
									<li><a href="mapping.php?action=list&area=2">Lista de Cadastrados</a></li>
									<li><a href="mapping.php?action=create&area=2">Cadastrar Novo</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Lojas</a>
								<ul class="DropDown2">
									<li><a href="mapping.php?action=list&area=3">Lista de Cadastrados</a></li>
									<li><a href="mapping.php?action=create&area=3">Cadastrar Novo</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Técnicos</a>
								<ul class="DropDown2">
									<li><a href="mapping.php?action=list&area=4">Lista de Cadastrados</a></li>
									<li><a href="mapping.php?action=create&area=4">Cadastrar Novo</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Usuários</a>
								<ul class="DropDown2">
									<li><a href="config.php?action=list&m=2">Lista de Cadastrados</a></li>
									<li><a href="config.php?action=create&m=1">Cadastrar Novo</a></li>
								</ul>
							</li>
							<li>
								<a href="midiakit.php">Midia Kit</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="esp"></div>
			</section>
		</nav>