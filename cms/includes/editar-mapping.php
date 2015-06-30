<script type="text/javascript" src="js/editar-mapping.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo; ?></h1><br/>
	
	<form name="cadclipping" method="post" onsubmit="return CadastrarClipping(this)">	
		<input type="hidden" name="id" value="<?php echo $Mapa->Id;?>"/>
		<input type="hidden" name="type" value="<?php echo $Mapa->Area;?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Nome: " style="width: 37.3%" value="<?php echo $Mapa->Name;?>"/>						
		</div>
		<div class="Linha">				
			<select name="uf" class="Campo input" onchange="CapturarEstado(this.value)">
				<option value="<?php echo $Mapa->Uf;?>" selected><?php echo $Mapa->Uf;?></option>
				<?php 
					$uf = array(
						1=>array("sigla"=>"ac","nome"=>"acre"),
						2=>array("sigla"=>"al","nome"=>"alagoas"),
						3=>array("sigla"=>"am","nome"=>"amazonas"),
						4=>array("sigla"=>"ap","nome"=>"amapa"),
						5=>array("sigla"=>"ba","nome"=>"bahia"),
						6=>array("sigla"=>"ce","nome"=>"ceara"),
						7=>array("sigla"=>"df","nome"=>"distrito federal"),
						8=>array("sigla"=>"es","nome"=>"espirito santo"),
						9=>array("sigla"=>"go","nome"=>"goias"),
						10=>array("sigla"=>"ma","nome"=>"maranhao"),
						11=>array("sigla"=>"mt","nome"=>"mato grosso"),
						12=>array("sigla"=>"ms","nome"=>"mato grosso do sul"),
						13=>array("sigla"=>"mg","nome"=>"minas gerais"),
						14=>array("sigla"=>"pa","nome"=>"para"),
						15=>array("sigla"=>"pb","nome"=>"paraiba"),
						16=>array("sigla"=>"pr","nome"=>"parana"),
						17=>array("sigla"=>"pe","nome"=>"pernambuco"),
						18=>array("sigla"=>"pi","nome"=>"piaui"),
						19=>array("sigla"=>"rj","nome"=>"rio de janeiro"),
						20=>array("sigla"=>"rn","nome"=>"rio grande do norte"),
						21=>array("sigla"=>"ro","nome"=>"rondonia"),
						22=>array("sigla"=>"rs","nome"=>"rio grande do sul"),
						23=>array("sigla"=>"rr","nome"=>"roraima"),
						24=>array("sigla"=>"sc","nome"=>"santa catarina"),
						25=>array("sigla"=>"se","nome"=>"sergipe"),
						26=>array("sigla"=>"sp","nome"=>"sao paulo"),
						27=>array("sigla"=>"to","nome"=>"tocantins")
					);
					
					
					for($i=1; $i<count($uf); $i++){
						if(strtoupper($uf[$i]['sigla'])!=$Mapa->Uf){
							echo '<option value="'.strtoupper($uf[$i]['sigla']).'">'.strtoupper($uf[$i]['sigla']).'</option>';
						}
					}				
				?>
			</select>
			<select name="cidades" id="SelectCidades" class="Campo input" style="width: 218px">
				<?php 
					$SelectCid = mysqli_query($conn, "SELECT * FROM cidades WHERE uf='$Mapa->Uf'");
					while($Cidades=mysqli_fetch_object($SelectCid)){
						if($Cidades->id==$Mapa->Cidade){
							echo '<option value="'.$Cidades->id.'" selected>'.$Cidades->cidade.'</option>';
						}else{
							echo '<option value="'.$Cidades->id.'">'.$Cidades->cidade.'</option>';
						}
					}
				?>
			</select>
		</div>
		
		<div class="Linha">				
			<input type="text" name="info" class="Campo input" placeholder="Informação: " style="width: 37.3%" value="<?php echo $Mapa->Info;?>"/>						
		</div>	
		
		<div class="Linha">				
			<input type="text" name="cont1" class="Campo input" placeholder="E-mail / Contato 1: " style="width: 37.3%" value="<?php echo $Mapa->Cont1;?>"/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="cont2" class="Campo input" placeholder="Website / Contato 2: " style="width: 37.3%" value="<?php echo $Mapa->Cont2;?>"/>						
		</div>	
		
		<div class="Linha">
			<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterDs"/>
		</div>
		
		<div class="Linhainput resp">
			&nbsp;
		</div>
		<br/><br/>
	</form>
</section>