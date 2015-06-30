<?php
	include_once('conn.php');
	mysqli_set_charset($conn, 'utf8');
	include_once('class/clipping.class.php');
	include_once('escapeSQL.php');
	
	$Clipping = new Clipping;
	
	@$Data = EscapeArray($_POST['data']);	
	
	if(isset($_POST['action'])){
		if($_POST['action']=='create'){			
			$Return = $Clipping->CreateClipping($conn, $Data);
			if($Return==true){
				echo 'ok';
			}else{				
				echo $Return;
			}
		}
		
		if($_POST['action']=='loadlist'){
			$Clipping->SelectMultClipping($conn, $_POST['type'], $_POST['page']);
		}
		
		if($_POST['action']=='delete'){
			$Clipping->DeleteClipping($conn, $_POST['id']);
		}
		
		if($_POST['action']=='edit'){			
			$Return = $Clipping->UpdateClipping($conn, $Data['id'], $Data);
			if($Return==true){
				echo 'ok';
			}else{				
				echo $Return;
			}
		}
	}
?>