       <footer>
          <img src="images/logo_footer.png">
          <div class="info">
                conceptoprensa.com | desarrollado por <b>P11 Estudio</b>
          </div>
          <ul class="categorias">
                <li class="link" onclick='link(event,".");'>Inicio /&nbsp;</li>
                <?php foreach ($categorias as $key => $categoria) { 
                    echo "<li class='link' onClick='link(event,\"categoria?id=".$key."\");'>$categoria /&nbsp;</li>";
                } ?>
          </ul>
          
       </footer>
       </div>
   </div>
 
 <script src="js/scripts.js"></script>
 
 <link rel="stylesheet" href="css/responsive.css">
 </body>
 
</html>
 