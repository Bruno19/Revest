<?php
	class Product 
	{
		var $Id;
		var $Title;
		var $Subtitle;
		var $Contact;
		var $Link;
		var $About;
		var $Featured;
		var $Image;
		var $Type;
		
		function SelectUniqueProduct($Conn, $Id, $Type){
			$Select = mysqli_query($Conn, "SELECT * FROM product WHERE id_pro=$Id AND type_pro=$Type");
			if(mysqli_num_rows($Select)==1){
			
				$Data = mysqli_fetch_object($Select);
				
				$this->Id=$Data->id_pro;
				$this->Title=$Data->title_pro;
				$this->Subtitle=$Data->subtitle_pro;
				$this->Contact=$Data->contact_pro;
				$this->Link=$Data->link_pro;
				$this->About=$Data->about_pro;
				$this->Featured=$Data->featured_pro;
				$this->Image=$Data->image_pro;
				$this->Type=$Data->type_pro;
				
				return true;
				
			}else{
				return false;
			}
		}
		
		function SelectMultProducts($Conn, $Type, $Page){
			
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
			$SelectRows = mysqli_query($Conn, "SELECT id_pro FROM product WHERE type_pro=$Type");
			$Rows = mysqli_num_rows($SelectRows);
			
			$Pgs = ceil($Rows/$Quant);
			
			if($Page>0 && is_numeric($Page)==true){
				$Limit = ($Page-1)*$Quant;
			}else{
				$Limit=0;
			}
			
			$SelectClipping = mysqli_query($Conn, "SELECT * FROM product WHERE type_pro=$Type ORDER BY id_pro DESC LIMIT $Limit, $Quant");
			while($Data = mysqli_fetch_object($SelectClipping)){
				echo '
					<tr class="LinhatablePar">
						<td>'.$Data->id_pro.'</td>
						<td>'.$Data->title_pro.'</td>
						<td><button class="Btn" onclick="DeletarProduto('.$Data->id_pro.', '.$Page.')">Excluir</button></td>
						<td><a href="person.php?action=edit&type='.$Type.'&id='.$Data->id_pro.'">Editar</a></td>
					</tr>
				';
			}
			
			#paginação		
			echo
			'
				<tr class="LinhatableImpar">
					<td colspan="4" style="text-align: center"><br/>
						<a href="javascript:CarregarlistaProdutos('.$Type.', 1)">Primeiro</a> - 
					';
					
					if($Page>5){
						if($Page>5){
							for($i=($Page-5); $i<=$Page; $i++){
								echo ' <a href="javascript:CarregarlistaProdutos('.$Type.', '.$i.')">'.$i.'</a> ';
							}
						}
						$c=0;
						for($i=$Page+1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaProdutos('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==7){
								break;
							}else{
								$c++;
							}
						}
					}else{
						$c=0;
						for($i=1; $i<=$Pgs; $i++){
							echo ' <a href="javascript:CarregarlistaProdutos('.$Type.', '.$i.')">'.$i.'</a> ';
							
							if($c==5){
								break;
							}else{
								$c++;
							}
						}
					}
					
			echo'
						- <a href="javascript:CarregarlistaProdutos('.$Type.', '.$Pgs.')">Último</a>
					</td>
				</tr>
			';
		}
		
		function UpdateProduct($Conn, $Data){
			$Update = mysqli_query($Conn, "
				UPDATE product SET 
					title_pro='$Data[title]', 
					subtitle_pro='$Data[subtitle]', 
					contact_pro='$Data[contact]', 
					link_pro='$Data[url]', 
					about_pro='$Data[content]', 
					featured_pro=$Data[featured]
					
				WHERE id_pro=$Data[id]
			");
			
			if($Update){
				echo 'ok';
			}else{
				echo mysqli_error($Conn);
			}
		}
		
		function CreateProduct($Conn, $Imagem, $Data){
			$Create = mysqli_query($Conn, "
				INSERT INTO product(
					title_pro, 
					subtitle_pro, 
					contact_pro, 
					link_pro, 
					about_pro, 
					featured_pro, 
					image_pro, 
					type_pro 
				)VALUES(
					'$Data[title]', 
					'$Data[subtitle]', 
					'$Data[contact]', 
					'$Data[url]', 
					'$Data[content]',
					0, 
					'$Imagem',
					$Data[type]
				)
			");
			
			if($Create){
				echo 'ok';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/>Código do erro: '.mysqli_error($Conn).'.</label>';
			}
		}
		
		function DeleteProduct($Conn, $Id){
			
			$Select = mysqli_query($Conn, "SELECT image_pro FROM product WHERE id_pro=$Id");
			$Data = mysqli_fetch_object($Select);
			if(unlink('../imagens/produto/'.$Data->image_pro)){
				$Delete = mysqli_query($Conn, "DELETE FROM product WHERE id_pro=$Id");
				if($Delete){
					return true;
				}else{
					return false;
				}			
			}
		}
	}
?>