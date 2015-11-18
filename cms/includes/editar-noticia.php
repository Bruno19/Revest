			<!-- TinyMCE 3.x -->
 
			<script type="text/javascript" src="js/tiny_mce/tiny_mce_src.js"></script>
            <script type="text/javascript">
             
            //http://cariprogram.blogspot.com
            //nuramijaya@gmail.com

            tinyMCE.init({
             
              mode : "textareas",
                
              // ===========================================
              // Set THEME to ADVANCED
              // ===========================================
                
              theme : "advanced",
                
              // ===========================================
              // INCLUDE the PLUGIN
              // ===========================================
             
              plugins : "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                
              // ===========================================
              // Set LANGUAGE to EN (Otherwise, you have to use plugin's translation file)
              // ===========================================
             
              language : "en",
                 
              theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
              theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
              theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
             
              // ===========================================
              // Put PLUGIN'S BUTTON on the toolbar
              // ===========================================
             
              theme_advanced_buttons4 : "jbimages,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                
              theme_advanced_toolbar_location : "top",
              theme_advanced_toolbar_align : "left",
              theme_advanced_statusbar_location : "bottom",
              theme_advanced_resizing : true,
                
              // ===========================================
              // Set RELATIVE_URLS to FALSE (This is required for images to display properly)
              // ===========================================
             
              relative_urls : false
                
            });
             
            </script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/editar-news.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo;?></h1><br/>
	
	<form name="editnews" method="post" id="editnews" onsubmit="return EditarNews(this)" enctype="multipart/form-data">	
		<input type="hidden" name="type" value="<?php echo $Type;?>"/>
		<input type="hidden" name="action" value="edit"/>
		<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%" value="<?php echo $News->Title;?>"/>						
		</div>
		<?php if($_GET['type']==1):?>
		<div class="Linha">				
			Destaque:
			<input type="radio" name="featured" value="0" <?php if($News->Featured==0){echo'checked';}?>/>Não | 
			<input type="radio" name="featured" value="1" <?php if($News->Featured==1){echo'checked';}?>/>Destaque 1 | 
			<input type="radio" name="featured" value="2" <?php if($News->Featured==2){echo'checked';}?>/>Destaque 2 
		</div>
		<?php 
			endif;
			if($_GET['type']==2):
		?>
			<input type="hidden" name="featured" value="0"/>
		<?php endif;?>
		<div class="Linha">				
			<textarea name="content" class="tiny" style="width: 37.3%; height: 350px; resize: none"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $News->Content));?></textarea>
		</div>		
		
		<div class="Linha">
			<input type="submit" value="Salvar" class="Campo Btn CadEmp AlterDs"/>
		</div>
	</form>
		<div class="Linhainput resp">
				
		</div>
		<br/><br/>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image1;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image1;?>"/>
				<input type="hidden" name="field" value="image1_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs" style="float: left;"/>
			</form>
			<form name="delimg" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image1;?>"/>
				<input type="hidden" name="field" value="image1_no"/>
				<input type="hidden" name="action" value="del-image"/>
				<input type="submit" value="Deletar Imagem" class="Campo Btn CadEmp AlterDs" style="background: #d00; float: right;"/>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image2;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image2;?>"/>
				<input type="hidden" name="field" value="image2_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs" style="float: left;"/>
			</form>
			<form name="delimg" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image2;?>"/>
				<input type="hidden" name="field" value="image2_no"/>
				<input type="hidden" name="action" value="del-image"/>
				<input type="submit" value="Deletar Imagem" class="Campo Btn CadEmp AlterDs" style="background: #d00; float: right;"/>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image3;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image3;?>"/>
				<input type="hidden" name="field" value="image3_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs" style="float: left;"/>
			</form>
			<form name="delimg" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image3;?>"/>
				<input type="hidden" name="field" value="image3_no"/>
				<input type="hidden" name="action" value="del-image"/>
				<input type="submit" value="Deletar Imagem" class="Campo Btn CadEmp AlterDs" style="background: #d00; float: right;"/>
			</form>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image4;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image4;?>"/>
				<input type="hidden" name="field" value="image4_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs" style="float: left;"/>
			</form>
			<form name="delimg" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image4;?>"/>
				<input type="hidden" name="field" value="image4_no"/>
				<input type="hidden" name="action" value="del-image"/>
				<input type="submit" value="Deletar Imagem" class="Campo Btn CadEmp AlterDs" style="background: #d00; float: right;"/>
			</form>
		</div>
		<?php  include_once('php/images-news.php');?>
		<div class="esp"></div>
	
</section>