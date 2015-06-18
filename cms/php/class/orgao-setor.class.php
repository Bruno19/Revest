<?php
	class OrgaoSetor 
	{
		var $Id;
		var $Title;
		var $Url;
		
		function SelectUniqueOrgao($Conn, $Id){
			$Select = mysqli_query($Conn, "SELECT * FROM orgaos WHERE id_or=$Id");
			if(mysqli_num_rows($Select)==1){
			
				$Data = mysqli_fetch_object($Select);
				
				$this->Id=$Data->id_or;
				$this->Title=$Data->title_or;
				$this->Url=$Data->url_or;
				
				return true;
				
			}else{
				return false;
			}
		}
		
		function SelectMultOrgan($Conn, $Type, $Page){
			
			echo '
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="4">&nbsp;</td>
				</tr>
			';
				
			$Quant = 10;
			$SelectRows = mysqli_query($Conn, "SELECT id_or FROM orgaos");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM orgaos ORDER BY id_or DESC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				echo '
					<tr class="LinhatablePar">
						<td>'.$Data->id_or.'</td>
						<td>'.$Data->title_or.'</td>
						<td><button class="Btn" onclick="DeletarOrgao('.$Data->id_or.', '.$Page.')">Excluir</button></td>
						<td><a href="orgaos-do-setor.php?action=edit&id='.$Data->id_or.'">Editar</a></td>
					</tr>
				';
			}
			
			#paginação		
			echo
			'
				<tr class="LinhatableImpar">
					<td colspan="4" style="text-align: center"><br/>
						<a href="javascript:CarregarlistaOrgao('.$Type.', 1)">Primeiro</a> - 
					';
					
					if($Page>5){
						if($Page>5){
							for($i=($Page-5); $i<=$Page; $i++){
								echo ' <a href="javascript:CarregarlistaOrgao('.$Type.', '.$i.')">'.$i.'</a> ';
							}
						}
						$c=0;
						for($i=$Page+1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaOrgao('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==7){
								break;
							}else{
								$c++;
							}
						}
					}else{
						$c=0;
						for($i=1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaOrgao('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==5){
								break;
							}else{
								$c++;
							}
						}
					}
					
			echo'
						- <a href="javascript:CarregarlistaOrgao('.$Type.', '.$Pgs.')">Último</a>
					</td>
				</tr>
			';
		}
		
		function EditOrgan($Conn, $Data){
			$Update = mysqli_query($Conn, "
				UPDATE orgaos SET 
					title_or='$Data[title]', 
					url_or='$Data[url]' 
				WHERE id_or=$Data[id]
			");
			
			if($Update){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/> Código do erro: '.mysqli_error($Conn).'</label>';
			}
		}
		
		function CreateOrgan($Conn, $Data){
			$Create = mysqli_query($Conn, "
				INSERT INTO orgaos(
					title_or, 
					url_or
				)VALUES(
					'$Data[title]', 
					'$Data[url]'
				)
			");
			
			if($Create){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/> Código do erro: '.mysqli_error($Conn).'</label>';
			}
		}
		
		function DeleteOrgao($Conn, $Id){
			$Delete = mysqli_query($Conn, "DELETE FROM orgaos WHERE id_or=$Id");
			
			if($Delete){
				return true;
			}else{
				return false;
			}
		}
	}
?>