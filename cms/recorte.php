<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="A complete example of Cropper.">
  <meta name="keywords" content="HTML, CSS, JS, JavaScript, jQuery, PHP, image cropping, web development">
  <meta name="author" content="Fengyuan Chen">
  <title>Crop Avatar - Cropper</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/cropper.min.css">
  <link rel="stylesheet" href="css/main.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
    
          <script>
            function cadastrar_img(){
                
                
                    var pega = $("#pega").val();
                    var cadastrar_imagem = $("cadastrar_imagem").val();
                
                    $.post('processa.php',{cadastrar_imagem:"cadastrar_imagem",pega:pega}).done(function(resultado){
                        $('.resposta').html(resultado);
             
                    });
            }
              
            function PassarJson(data){
                var CaminhoImagem = data.result;
                 $( "input[name*='man']" ).val(CaminhoImagem);
                $('.resposta').append('<input type="hidden" name="image1" value="'+CaminhoImagem+'"/>');
            }

              
              
        </script>
  
</head>
<body>
  <div class="container" id="crop-avatar">

    <!-- Current avatar -->
    <div class="avatar-view" title="Change the avatar">
      <img src="img/picture.jpg" alt="Avatar">
    </div>

    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">

                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Selecionar</button>
                  </div>
                </div>
              </div>
            </div>
        
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->
   
        <center>

                   
            <input class="Btn CadEmp AlterDs" type="submit" value="Cadastrar" onclick="cadastrar_img()">
            <input type="hidden" name="man" id="pega">
            <div class="resposta"></div>
        </center>

      
    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="dist/cropper.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>