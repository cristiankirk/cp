<?php

include_once "src/config.php";

$currentUrl = currentUrl();
$parts = explode("-", $currentUrl);
$idArticulo = end($parts);

//$idArticulo = $_GET['id'];
$articulo = fetch($urlSinglePost."/".$idArticulo);
$img = getMedia($urlMedia . '/' . $articulo->featured_media);

$title = $articulo->title->rendered;
$tags = $articulo->tags;
$descripcion = strip_tags($articulo->excerpt->rendered);

$tagsString = implode(",",$tags);

$relatedPosts = fetch($urlRelatedTags.implode(",",$tags)."&exclude=".$idArticulo."&per_page=".$param_cantidad_related_posts);

//var_dump($param_cantidad_related_posts);
//var_dump($relatedPosts);
//die();



$metaFacebook = "";
$metaFacebook .= '<meta property="og:url" content="' .  $currentUrl . '">';
$metaFacebook .= '<meta property="og:type" content="article">';
$metaFacebook .= '<meta property="og:title" content="'. $title . '">';
$metaFacebook .= '<meta property="og:description" content="'. $descripcion . '">';
$metaFacebook .= '<meta property="og:image" content="'. $img . '">';
$metaFacebook .= '<meta property="fb:app_id" content="966242223397117">';


$metaX = "";
$metaX .= '<meta property="twitter:title" content="'.$title.'">';
$metaX .= '<meta property="twitter:description" content="'.$descripcion.'">';
$metaX .= '<meta property="twitter:image" content="'.$img.'">';

include_once "views/header.php";

?>

<link rel="stylesheet" href="css/styleArticulo.css">
<div id="body">

    <article>
    <div class="volanta">
                        <?php foreach ($articulo->categories as $category) { 
                                    renderCategory($category); 
                              }
                        ?>
             </div>
    <h3 id="fecha"><?=  date("d-m-Y", strtotime($articulo->date));?></h3>
    <h1 id="titulo"><?=$articulo->title->rendered?></h1>
    <?php $img = getMedia($urlMedia . '/' . $articulo->featured_media); ?>
    <?php if ($img != false) { ?>
                    <img class="imagen" src="<?=$img?>">
                  <?php } ?>
    <div id="content">
        <?=$articulo->content->rendered?>
    </div>
    </article>

    <section id="share">
        <div class="title">Si te interesó, compartí el artículo en tus redes</div>
        <div class="network link" onClick='Popup("https://www.facebook.com/sharer/sharer.php?u=<?php renderCurrentUrl(); ?>","envio",700,435,"no","yes");' title="Facebook">
            <img src="images/logo_facebook.png">
        </div>
        <div class="network link" onClick='Popup("https://twitter.com/intent/tweet?url=<?php renderCurrentUrl(); ?>&text=<?=$articulo->title->rendered?>","envio",700,435,"no","yes");' title="X">
            <img src="images/logo_x.png">
        </div>
        <a class="network link" href="https://api.whatsapp.com/send?text=<?php renderCurrentUrl(); ?>" target="_blank" title="WhatsApp">
            <img src="images/logo_whatsapp.png">
        </a>
    </section>
    
    <?php if (!empty($relatedPosts))  { ?>
    <section id="relatedPosts">
        <div class="relatedPosts_header">Artículos relacionados</div>
        <?php foreach ($relatedPosts as $post) { ?>
           <div class="relatedPost link" onClick='link(event,"articulo?<?=$post->slug?>-<?=$post->id?>");'>
                <h1 class="relatedPost_title"><?=$post->title->rendered ?></h1>
                <p class="relatedPost_excerpt"><?=$post->excerpt->rendered ?></p>
            </div>
        <?php } ?>
    </section>
    <?php } ?>



</div>

<?php if ($img == false) {
    $img = "images\conceptoprensa.jpg";
} ?>

<?php include_once "views/footer.php"; ?>
