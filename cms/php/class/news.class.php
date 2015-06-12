<?php
	class News 
	{
		var $Id;
		var $Title;
		var $Content;
		var $Image1;
		var $Image2;
		var $Image3;
		var $Image4;
		var $Date;
		var $Type;
		
		function SelectUniqueNews($Conn, $Id, $Type){
			$Select = mysqli_query($Conn, "SELECT * FROM news WHERE id_no=$Id AND type_no=$Type");
			if(mysqli_num_rows($Select)==1){
			
				$Data = mysqli_fetch_object($Select);
				
				$this->Id=$Data->id_no;
				$this->Title=$Data->title_no;
				$this->Content=$Data->content_no;
				$this->Image1=$Data->image1_no;
				$this->Image2=$Data->image2_no;
				$this->Image3=$Data->image3_no;
				$this->Image4=$Data->image4_no;
				$this->Date=$Data->date_no;
				$this->Type=$Data->type_no;
				
				return true;
				
			}else{
				return false;
			}
		}
		
		function SelectMultNews($Conn, $Type, $Page){
			
			echo '
				<tr>
					<th>Imagem</th>
					<th>Título</th>
					<th>Data</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="5">&nbsp;</td>
				</tr>
			';
				
			$Quant = 10;
			$SelectRows = mysqli_query($Conn, "SELECT id_no FROM news WHERE type_no=$Type");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM news WHERE type_no=$Type ORDER BY id_no DESC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				
				$DateArray = explode(' ', $Data->date_no);
				$Date = implode('/', array_reverse(explode('-', $DateArray[0])));
				echo '
					<tr class="LinhatablePar">
						<td><image src="imagens/news/'.$Data->image1_no.'" alt="'.$Data->title_no.'" class="ImageList"/></td>
						<td>'.$Data->title_no.'</td>
						<td>'.$Date.' as '.$DateArray[1].'</td>
						<td><button class="Btn" onclick="DeletarClipping('.$Data->id_no.', '.$Page.')">Excluir</button></td>
						<td><a href="noticia.php?action=edit&type='.$Type.'&id='.$Data->id_no.'">Editar</a></td>
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
		
		function UpdateNews($Conn, $Id, $Data){
			$Update = mysqli_query($Conn, "
				UPDATE news SET 
					title_no='$Data[title]', 
					content_no='$Data[content]'  
				WHERE id_no=$Data[id]
			");
			
			if($Update){
				return true;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function CreateNews($Conn, $Data, $Images){
			$Create = mysqli_query($Conn, "
				INSERT INTO news(
					title_no, 
					content_no, 
					image1_no, 
					image2_no, 
					image3_no, 
					image4_no, 
					type_no
				)VALUES(
					'$Data[title]', 
					'$Data[content]', 
					'$Images[0]',
					'$Images[1]',
					'$Images[2]',
					'$Images[3]',
					$Data[type]
				)
			");
			
			if($Create){
				return true;
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function DeleteNews($Conn, $Id){
			$SelectNews = mysqli_query($Conn, "SELECT * FROM news WHERE id_no=$Id");
			$Date = mysqli_fetch_object($SelectNews);
			
			if($Date->image1_no!='none.jpg'){
				unlink('../imagens/news/'.$Date->image1_no);
			}
			if($Date->image2_no!='none.jpg'){
				unlink('../imagens/news/'.$Date->image2_no);
			}
			if($Date->image3_no!='none.jpg'){
				unlink('../imagens/news/'.$Date->image3_no);
			}
			if($Date->image4_no!='none.jpg'){
				unlink('../imagens/news/'.$Date->image4_no);
			}
			
			$Delete = mysqli_query($Conn, "DELETE FROM news WHERE id_no=$Id");
			
			if($Delete){
				return true;
			}else{
				return false;
			}
		}
	}
?>