<?php
	include_once('conn.php');
	include_once('class/project.class.php');
	include_once('class/resize.class.php');
	include_once('escapeSQL.php');
	
	$Project = new Project;
	
	if(isset($_POST['action'])){
		if($_POST['action']=='create'){
			$post = EscapeArray($_POST);
			
			$Project->CrateProject($conn, $post['data']);
		}
		if($_POST['action']=='update'){
			$post = EscapeArray($_POST);
			
			$Project->EditProject($conn, $post['data']);
		}
		
		if($_POST['action']=='loadlist'){
			$Project->SelectMultProjects($conn, $_POST['type'], $_POST['page']);
		}
		if($_POST['action']=='delete'){
			unlink('imagens/projetos/'.$_POST['name']);
			$Del = mysqli_query($conn, "DELETE FROM images_pr WHERE id_im=$_POST[id]");
			echo '
				<script type="text/javascript">
					location.href="";
				</script>
			';
		}
		
		if($_POST['action']=='deleteproject'){
			$Project->DeleteProject($conn, $_POST['id']);
		}
	}
	
	if(isset($_POST['addimage'])){
		if($_POST['addimage']=='ok'){
			
			$post = EscapeArray($_POST);
			$Imgs = $_FILES['images'];
			for($i=0; $i<count($Imgs['name']); $i++){
				
				$tempo = time().'.jpg';
				$NomeUnico = md5(time().$i).'.jpg';
				move_uploaded_file($Imgs['tmp_name'][$i], 'imagens/project'.$tempo);			
				
				$resizeObj = new resize('imagens/project'.$tempo);	
				$resizeObj -> resizeImage(800, 600, 'crop');		
				$resizeObj -> saveImage('imagens/projetos/'.$NomeUnico, 95);				
				
				$Return = $Project->InsertImages($conn, $post['project'], $NomeUnico, $post['text']);
				if($Return==0){
					unlink('imagens/projetos/'.$NomeUnico);
					echo '
						<script type="text/javascript">
							alert("Erro ao adicionar imagem!");
						</script>
					';
					break;
				}
				unlink('imagens/project'.$tempo);				
			}
		}
	}
?>