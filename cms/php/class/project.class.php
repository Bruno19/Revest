<?php
	class Project
	{
		var $Id;
		var $Name;
		var $Date;
		
		function SelectUniqProject($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM projects WHERE id_Pr=$Id");
			if(mysqli_num_rows($Select)==1){
				$Date = mysqli_fetch_object($Select);
				$this->Id=$Date->id_pr;
				$this->Name=$Date->name_pr;
				$this->Date=$Date->date_pr;
				return true;
			}else{
				return false;
			}
		}
		
		function CrateProject($Conn, $Data){
			$Insert = mysqli_query($Conn, "
				INSERT INTO projects(
					name_pr,
					date_pr
				)VALUES(
					'$Data[name]',
					CURRENT_DATE()
				)
			");
			
			if($Insert){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/>Código do erro: '.mysqli_error($Conn).'.</label>';
			}
		}
		
		function SelectMultProjects($Conn, $Type, $Page){
			
			echo '
				<tr>
					<th>ID</th>
					<th>Nome Do Projeto</th>
					<th>Núm. Imagens</th>
					<th>Data</th>
					<th>Deletar</th>
					<th>Imagens</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="6">&nbsp;</td>
				</tr>
			';
				
			$Quant = 10;
			$SelectRows = mysqli_query($Conn, "SELECT id_pr FROM projects");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM projects ORDER BY id_pr DESC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				$SelectImages = mysqli_query($Conn, "SELECT * FROM images_pr WHERE id_pr=$Data->id_pr");
				$Num = mysqli_num_rows($SelectImages);
				echo '
					<tr class="LinhatablePar">
						<td>'.$Data->id_pr.'</td>
						<td>'.$Data->name_pr.'</td>
						<td>'.$Num.'</td>
						<td>'.implode('/', array_reverse(explode('-', $Data->date_pr))).'</a></td>
						<td><button class="Btn" onclick="DeletarProjeto('.$Data->id_pr.', '.$Page.')">Excluir</button></td>
						<td><a href="project.php?action=addimages&type='.$Type.'&id='.$Data->id_pr.'">Editar</a></td>
					</tr>
				';
			}
			
			#paginação		
			echo
			'
				<tr class="LinhatableImpar">
					<td colspan="6" style="text-align: center"><br/>
						<a href="javascript:CarregarlistaProjetos('."'".$Type."'".', 1)">Primeiro</a> - 
					';
					
					if($Page>5){
						if($Page>5){
							for($i=($Page-5); $i<=$Page; $i++){
								echo ' <a href="javascript:CarregarlistaProjetos('."'".$Type."'".', '.$i.')">'.$i.'</a> ';
							}
						}
						$c=0;
						for($i=$Page+1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaProjetos('."'".$Type."'".', '.$i.')">'.$i.'</a> ';
							
							if($c==7){
								break;
							}else{
								$c++;
							}
						}
					}else{
						$c=0;
						for($i=1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaProjetos('."'".$Type."'".', '.$i.')">'.$i.'</a> ';
							
							if($c==5){
								break;
							}else{
								$c++;
							}
						}
					}
					
			echo'
						- <a href="javascript:CarregarlistaProjetos('."'".$Type."'".', '.$Pgs.')">Último</a>
					</td>
				</tr>
			';
		}
		
		function EditProject($Conn, $Date){
			$Update = mysqli_query($Conn, "UPDATE projects SET name_pr='$Date[name]' WHERE id_pr=$Date[id]");
			if($Update){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/>Código do erro: '.mysqli_error($Conn).'.</label>';
			}
		}
		
		function InsertImages($Conn, $Project, $Image, $Text){
			$Insert=mysqli_query($Conn, "
				INSERT INTO images_pr(
					id_pr,
					name_im,
					text_im
				)VALUES(
					$Project,
					'$Image',
					'$Text'
				)
			");
			if($Insert){
				return 1;
			}else{
				return 0;
			}
		}
		
		function SelectImages($Conn, $Project){
			$Select = mysqli_query($Conn, "SELECT * FROM images_pr WHERE id_pr=$Project ORDER BY id_im DESC");
			if(mysqli_num_rows($Select)>0){
				while($Date=mysqli_fetch_object($Select)){
					echo '
						<div class="BlocoImagem">
							<img src="imagens/projetos/'.$Date->name_im.'" alt="'.$Date->text_im.'" /><br/>						
							<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')" action="">
								<input type="hidden" name="action" value="delete"/>
								<input type="hidden" name="id" value="'.$Date->id_im.'"/>
								<input type="hidden" name="name" value="'.$Date->name_im.'"/>
								<input type="submit" value="Excluir"  class="Campo Btn CadEmp AlterDs"/>
							</form>
							<br/>
							<p>';
							if(strlen($Date->text_im)>100){
								echo substr($Date->text_im, 0, 100).'...';
							}else{
								echo $Date->text_im;
							}
							
							echo'
							</p>
						</div>
					';
				}
			}else{
				echo 'Nenhuma imagem adicionada!';
			}
		}
		
		function DeleteProject($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM images_pr WHERE id_pr=$Id");
			while($Date=mysqli_fetch_object($Select)){
				unlink('../imagens/projetos/'.$Date->name_im);
			}
			
			mysqli_query($Conn, "DELETE FROM images_pr WHERE id_pr=$Id");
			mysqli_query($Conn, "DELETE FROM projects WHERE id_pr=$Id");
		}
	}
?>