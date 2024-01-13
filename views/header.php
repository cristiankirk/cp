<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
 <?php if ($title != "") {
        echo "c:p | " . $title;
      }  else {
        echo "concepto:prensa";
      }
  ?>
  </title>
  
  <meta name="description" content="Concepto Prensa">
  <meta name="author" content="Cristian Kirk">

  <?php if (isset($metaFacebook)) { 
    echo $metaFacebook;
  }?>

  <?php if (isset($metaX)) { 
    echo $metaX;
  }?>

  <link rel="icon" type="image/x-icon" href="./favicon/favicon.ico">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
  
  
</head>

<body>
  <div id="app">
  
    <div id="loaderContainer">
          <div class="loader"></div>
    </div>
    
    <header>
        <div id="headerContainer">
              <div id="navButtonContainer" class="link">
                <div id="nav-icon3">
                               <span></span>
                               <span></span>
                               <span></span>
                               <span></span>
                </div>
              </div>
              <ul id="navCategorias" class="link">
                <li onclick='link(event,".");'>Inicio</li>
                <?php foreach ($categorias as $key => $categoria) { 
                    echo "<li onClick='link(event,\"categoria?id=".$key."\");'>$categoria</li>";
                } ?>
              </ul>
        </div>
        <div class="logo link" onclick="link(event,'.');"><img src="images/logo_index.png"></div>
        <div class="logo_mobile link" onclick="link(event,'.');"><img src="images/logo_index_mobile.png"></div>
        <div></div>
      
    </header>

