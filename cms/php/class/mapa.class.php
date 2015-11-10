<?php
	class Mapa
	{
		var $Id;
		var $Name;
		var $Uf;
		var $Cidade;
		var $Info;
		var $Cont1;
		var $Cont2;
		var $Area;
		
		function LoadSelect($Conn, $Uf){
			  
			$Select = mysqli_query($Conn, "SELECT * FROM cidades WHERE uf='$Uf' ORDER BY cidade ASC");
			
			if(mysqli_num_rows($Select)>0){
				echo '<option value="null">Selecione a cidade!</option>';
				while($Cidades = mysqli_fetch_object($Select)){
					echo '<option value="'.$Cidades->id.'">'.$Cidades->cidade.'</option>';
				}
			}else{
				echo '<option value="null">Nenhuma cidade encontrada!</option>';
			}
		}
		
		function SelectUniqueMapping($Conn, $Id, $Type){
			mysqli_set_charset($Conn, "utf8");
			$Select = mysqli_query($Conn, "SELECT * FROM mapping WHERE id_ma=$Id AND area_ma=$Type");
			if(mysqli_num_rows($Select)==1){
			
				$Data = mysqli_fetch_object($Select);
				
				$this->Id=$Data->id_ma;
				$this->Name=$Data->name_ma;
				$this->Uf=$Data->uf_ma;
				$this->Cidade=$Data->id_ci;
				$this->Info=$Data->info_ma;
				$this->Cont1=$Data->cont1_ma;
				$this->Cont2=$Data->cont2_ma;
				$this->Area=$Data->area_ma;
				
				return true;
				
			}else{
				return false;
			}
		}
		
		function SelectMultMapping($Conn, $Type, $Page){
			mysqli_set_charset($Conn, "utf8");
			echo '
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>UF</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="5">&nbsp;</td>
				</tr>
			';
				
			$Quant = 10;
			$SelectRows = mysqli_query($Conn, "SELECT id_ma FROM mapping WHERE area_ma=$Type");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM mapping WHERE area_ma=$Type ORDER BY id_ma DESC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				echo '
					<tr class="LinhatablePar">
						<td>'.$Data->id_ma.'</td>
						<td>'.$Data->name_ma.'</td>
						<td>'.$Data->uf_ma.'</td>
						<td><button class="Btn" onclick="DeletarMapping('.$Data->id_ma.', '.$Page.')">Excluir</button></td>
						<td><a href="mapping.php?action=edit&area='.$Type.'&id='.$Data->id_ma.'">Editar</a></td>
					</tr>
				';
			}
			
			#paginação		
			echo
			'
				<tr class="LinhatableImpar">
					<td colspan="5" style="text-align: center"><br/>
						<a href="javascript:CarregarlistaMapping('.$Type.', 1)">Primeiro</a> - 
					';
					
					if($Page>5){
						if($Page>5){
							for($i=($Page-5); $i<=$Page; $i++){
								echo ' <a href="javascript:CarregarlistaMapping('.$Type.', '.$i.')">'.$i.'</a> ';
							}
						}
						$c=0;
						for($i=$Page+1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaMapping('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==7){
								break;
							}else{
								$c++;
							}
						}
					}else{
						$c=0;
						for($i=1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaMapping('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==5){
								break;
							}else{
								$c++;
							}
						}
					}
					
			echo'
						- <a href="javascript:CarregarlistaMapping('.$Type.', '.$Pgs.')">Último</a>
					</td>
				</tr>
			';
		}
		
		function UpdateMapping($Conn, $Id, $Data){
			mysqli_set_charset($Conn, "utf8");
			$Update = mysqli_query($Conn, "
				UPDATE mapping SET 
					id_ci=$Data[cidade], 
					uf_ma='$Data[uf]', 
					name_ma='$Data[name]', 
					info_ma='$Data[info]',					
					cont1_ma='$Data[cont1]',					
					cont2_ma='$Data[cont2]',
					area_ma=$Data[area] 
				WHERE id_ma=$Data[id]
			");
			
			if($Update){
				echo 'ok';
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function CreateMapping($Conn, $Data){
			mysqli_set_charset($Conn, "utf8");
			$Create = mysqli_query($Conn, "
				INSERT INTO mapping(
					id_ci,
					uf_ma,
					name_ma,
					info_ma,
					cont1_ma,
					cont2_ma,					
					area_ma
				)VALUES(
					$Data[cidade], 
					'$Data[uf]', 
					'$Data[name]',				
					'$Data[info]',				
					'$Data[cont1]',				
					'$Data[cont2]',				
					$Data[area]			
				)
			");
			
			if($Create){
				echo 'ok';
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function DeleteMapping($Conn, $Id){
			$Delete = mysqli_query($Conn, "DELETE FROM mapping WHERE id_ma=$Id");
			
			if($Delete){
				return true;
			}else{
				return false;
			}
		}
		
		function LoadMapping($Conn, $Id, $Area){
			mysqli_set_charset($Conn, "utf8");
			$Select = mysqli_query($Conn, "SELECT * FROM mapping WHERE id_ci=$Id AND area_ma=$Area ORDER BY name_ma ASC")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				while($Mapping=mysqli_fetch_object($Select)){
					echo '
						<div class="resultados">
							<b>'.$Mapping->name_ma.'</b> <br/> 
							  '.$Mapping->info_ma.' <br/> 
								'.$Mapping->cont1_ma.' <br/> 
								'.$Mapping->cont2_ma.'
						</div> 
					';
				}
			}else{
				echo '
					<div class="resultados">
						<b>Não existe dados desta região!</b> <br/> 
					</div> 
				';
			}
		}
		
		function LoadMapUf($Conn, $Uf, $Area){
			mysqli_set_charset($Conn, "utf8");
			$Select = mysqli_query($Conn, "SELECT * FROM mapping WHERE uf_ma='$Uf' AND area_ma=$Area ORDER BY name_ma ASC")or die(mysqli_error($Conn));
			if(mysqli_num_rows($Select)>0){
				while($Mapping=mysqli_fetch_object($Select)){
					echo '
						<div class="resultados">
							<b>'.$Mapping->name_ma.'</b> <br/> 
							  '.$Mapping->info_ma.' <br/> 
								'.$Mapping->cont1_ma.' <br/> 
								'.$Mapping->cont2_ma.'
						</div> 
					';
				}
			}else{
				echo '
					<div class="resultados">
						<b>Não existe dados desta região!</b> <br/> 
					</div> 
				';
			}
		}
		
		function SearchUF($Conn, $ID){
			$Select = mysqli_query($Conn, "SELECT * FROM mapping WHERE id_ma=$ID");
			$Dados = mysqli_fetch_object($Select);
			
			echo strtolower($Dados->uf_ma);
		}
	}
?>