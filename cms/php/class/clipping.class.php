<?php
	class Clipping 
	{
		var $Id;
		var $Title;
		var $Content;
		var $Url;
		var $Type;
		
		function SelectUniqueClipping($Conn, $Id, $Type){
			$Select = mysqli_query($Conn, "SELECT * FROM clipping WHERE id_c=$Id AND type_c=$Type");
			if(mysqli_num_rows($Select)==1){
			
				$Data = mysqli_fetch_object($Select);
				
				$this->Id=$Data->id_c;
				$this->Title=$Data->title_c;
				$this->Content=$Data->content_c;
				$this->Url=$Data->url_c;
				$this->Type=$Data->type_c;
				
				return true;
				
			}else{
				return false;
			}
		}
		
		function SelectMultClipping($Conn, $Type, $Page){
			
			echo '
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>URL</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="5">&nbsp;</td>
				</tr>
			';
				
			$Quant = 10;
			$SelectRows = mysqli_query($Conn, "SELECT id_c FROM clipping WHERE type_c=$Type");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM clipping WHERE type_c=$Type ORDER BY id_c ASC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				echo '
					<tr class="LinhatablePar">
						<td>'.$Data->id_c.'</td>
						<td>'.$Data->title_c.'</td>
						<td><a href="'.$Data->url_c.'">Link</a></td>
						<td><button class="Btn" onclick="DeletarClipping('.$Data->id_c.', '.$Page.')">Excluir</button></td>
						<td><a href="clipping.php?action=edit&type='.$Type.'&id='.$Data->id_c.'">Editar</a></td>
					</tr>
				';
			}
			
			#paginação		
			echo
			'
				<tr class="LinhatableImpar">
					<td colspan="5" style="text-align: center"><br/>
						<a href="javascript:CarregarlistaClipping('.$Type.', 1)">Primeiro</a> - 
					';
					
					if($Page>5){
						if($Page>5){
							for($i=($Page-5); $i<=$Page; $i++){
								echo ' <a href="javascript:CarregarlistaClipping('.$Type.', '.$i.')">'.$i.'</a> ';
							}
						}
						$c=0;
						for($i=$Page+1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaClipping('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==7){
								break;
							}else{
								$c++;
							}
						}
					}else{
						$c=0;
						for($i=1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaClipping('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==5){
								break;
							}else{
								$c++;
							}
						}
					}
					
			echo'
						- <a href="javascript:CarregarlistaClipping('.$Type.', '.$Pgs.')">Último</a>
					</td>
				</tr>
			';
		}
		
		function UpdateClipping($Conn, $Id, $Data){
			$Update = mysqli_query($Conn, "
				UPDATE clipping SET 
					title_c='$Data[title]', 
					content_c='$Data[content]', 
					url_c='$Data[url]', 
					type_c=$Data[type] 
				WHERE id_c=$Data[id]
			");
			
			if($Update){
				return true;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function CreateClipping($Conn, $Data){
			$Create = mysqli_query($Conn, "
				INSERT INTO clipping(
					title_c, 
					content_c, 
					url_c, 
					type_c 
				)VALUES(
					'$Data[title]', 
					'$Data[content]', 
					'$Data[url]', 
					$Data[type]
				)
			");
			
			if($Create){
				return true;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function DeleteClipping($Conn, $Id){
			$Delete = mysqli_query($Conn, "DELETE FROM clipping WHERE id_c=$Id");
			
			if($Delete){
				return true;
			}else{
				return false;
			}
		}
	}
?>