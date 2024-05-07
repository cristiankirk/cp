<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php if ($title != "") {
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
  <script src="js/jquery/jquery-3.7.1.js"></script>
  <link rel="stylesheet" href="libraries/font-awesome-6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css?v=1">

</head>

<body>
  <div id="app">
  
    <div id="loaderContainer">
          <div class="loader"></div>
    </div>
    
    <header>
        <div id="headerContainer">
            <div id="redes">
                <a href="https://www.instagram.com/conceptoprensa" class="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/conceptoprensa" class="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com/@ConceptoPrensa" class="youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://twitter.com/conceptoprensa" class="twitter" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
              <div id="navButtonContainer" class="link">
                <div id="nav-icon3">
                               <span></span>
                               <span></span>
                               <span></span>
                               <span></span>
                </div>
              </div>
              <ul id="navCategorias" class="link">
                <li id="redes-mobile-container">
                  <div id="redes-mobile">
                    <a href="https://www.instagram.com/conceptoprensa" class="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/conceptoprensa" class="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.youtube.com/@ConceptoPrensa" class="youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://twitter.com/conceptoprensa" class="twitter" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                  </div>
                </li>
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

