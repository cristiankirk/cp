<?php
$title = "";

$ads = [
    ["bb","https://instagram.com/barsisonebarbalace", "Barisone/Barbalace"],
    ["rehabitar","https://www.instagram.com/rehabitar.chivilcoy/","Rehabitar Consultorios"],
    ["djtejo","https://instagram.com/djtejodj", "DJ Tejo"],
    ["secys","https://secys.org/", "Sindicato de Empleados de Comercio y Servicios"],
    ["planetafitness","https://instagram.com/planetafitness", "Planeta Fitness"],
    ["importgroup","#","Import Group"]
];

shuffle($ads);

include_once "src/config.php";
include_once "views/header.php";

$postsSticky = fetch($urlPostsSticky);
$postsNoSticky = fetch($urlPostsNoSticky);
$posts = array_merge($postsSticky,$postsNoSticky);

?>
      <link rel="stylesheet" href="css/styleIndex.css">
      <div id="body">

        <section id="sticky">
              <div id="featured1">
                <div class="featured1_container" style="cursor:pointer;" onClick='link(event,"articulo?<?php echo formatDate($posts[0]->date); ?>/<?=$posts[0]->slug?>-<?=$posts[0]->id?>");' title="Leer artículo">
                    <div class="texto">
                    <h2 class="titulo"><?php echo $posts[0]->title->rendered; ?></h2>
                    <?php $img = getMedia($urlMedia . '/' . $posts[0]->featured_media); ?>
                    <img src="<?php echo $img; ?>" class="featured1_image_mobile">
                    <p class="copete"><?php echo strip_tags($posts[0]->excerpt->rendered); ?></p>
                    <h4 class="fecha"><?php echo formatDate($posts[0]->date); ?></h4>
                    <a href="#" class="boton">Leer nota</a>

                        <?php renderFuente($posts[0]->acf->fuente,"data") ?>

                        <?php renderFoto($posts[0]->acf->fotografia,"data") ?>

                        <time class="data">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:<br>
                                <b><?= renderTiempoEstimadoDeLectura($posts[0]->content->rendered) ?></b>
                            </span>
                        </time>

                    </div>
                    <img src="<?php echo $img; ?>" class="featured1_image">
                </div>
            </div>

            <hr>
            
            <div id="featured2">
                <div class="featured2_container"  style="cursor:pointer;"  onClick='link(event,"articulo?<?php echo formatDate($posts[1]->date); ?>/<?=$posts[1]->slug?>-<?=$posts[1]->id?>");' title="Leer artículo">
                    <?php $img = getMedia($urlMedia . '/' . $posts[1]->featured_media); ?>
                    <img src="<?php echo $img; ?>">
                    <div class="texto">
                        <h2 class="titulo"><?php echo $posts[1]->title->rendered; ?></h2>
                        <h3 class="categoria"><?php echo $categorias[$posts[1]->categories[0]]; ?></h3> |
                        <h4 class="fecha"><?php echo formatDate($posts[1]->date); ?></h4>
                        <?php renderFuente($posts[1]->acf->fuente,"data") ?>
                        <?php renderFoto($posts[1]->acf->fotografia,"data") ?>
                        <time class="data">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:<br>
                                <b><?= renderTiempoEstimadoDeLectura($posts[1]->content->rendered) ?></b>
                            </span>
                        </time>
                    </div>
                </div>

                <div class="featured2_container" style="cursor:pointer;" onClick='link(event,"articulo?<?php echo formatDate($posts[2]->date); ?>/<?=$posts[2]->slug?>-<?=$posts[2]->id?>");' title="Leer artículo">
                  <?php $img = getMedia($urlMedia . '/' . $posts[2]->featured_media); ?>
                    <img src="<?php echo $img; ?>">
                    <div class="texto">
                        <h2 class="titulo"><?php echo $posts[2]->title->rendered; ?></h2>
                        <h3 class="categoria"><?php echo $categorias[$posts[2]->categories[0]]; ?></h3> |
                        <h4 class="fecha"><?php echo formatDate($posts[2]->date); ?></h4>
                        <?php renderFuente($posts[2]->acf->fuente,"data") ?>
                        <?php renderFoto($posts[2]->acf->fotografia,"data") ?>
                        <time class="data">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:<br>
                                <b><?= renderTiempoEstimadoDeLectura($posts[2]->content->rendered) ?></b>
                            </span>
                        </time>
                    </div>
                </div>

                <div class="featured2_container" style="cursor:pointer;"  onClick='link(event,"articulo?<?php echo formatDate($posts[3]->date); ?>/<?=$posts[3]->slug?>-<?=$posts[3]->id?>");' title="Leer artículo">
                    <?php $img = getMedia($urlMedia . '/' . $posts[3]->featured_media); ?>
                    <img src="<?php echo $img; ?>">
                    <div class="texto">
                        <h2 class="titulo"><?php echo $posts[3]->title->rendered; ?></h2>
                        <h3 class="categoria"><?php echo $categorias[$posts[3]->categories[0]]; ?></h3> |
                        <h4 class="fecha"><?php echo formatDate($posts[3]->date); ?></h4>
                        <?php renderFuente($posts[3]->acf->fuente,"data") ?>
                        <?php renderFoto($posts[3]->acf->fotografia,"data") ?>
                        <time class="data">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo est. de lectura:<br>
                                <b><?= renderTiempoEstimadoDeLectura($posts[3]->content->rendered) ?></b>
                            </span>
                        </time>
                    </div>
                </div>
            </div>

        </section>

        <?php if ($flag_publicidad) {
            echo '<div class="ads">';
            for ($i = 0; $i < 3; $i++) {
                echo '<a href="' . $ads[$i][1] . '" target="_blank" title="'.$ads[$i][2].'"><img src="images/ad/ad_' . $ads[$i][0] . '.jpg"></a>';
            }
            echo '</div>';
            }
        ?>
        
        <main>
          <div id="posts">
            <div class="tituloEntrePosts">Lo último</div>

            <?php for ($i=4; $i < count($posts); $i++) { ?>
                <?php $img = getMedia($urlMedia . '/' . $posts[$i]->featured_media); ?>

                <div class="post" onClick='link(event,"articulo?<?php echo formatDate($posts[$i]->date); ?>/<?=$posts[$i]->slug?>-<?=$posts[$i]->id?>");' title="Leer artículo">
                  <?php if ($img != false) { ?>
                    <img src="<?=$img?>">
                  <?php } ?>
                  <div class="texto">
                      <h3 class="volanta link">
                        <?php foreach ($posts[$i]->categories as $category) { 
                                    renderCategory($category); 
                              }
                        ?>
                    </h3>
                      <h2 class="titulo"><?=$posts[$i]->title->rendered ?></h2>
                      <p class="copete"><?=$posts[$i]->excerpt->rendered ?></p>
                      <?php renderFuente($posts[$i]->acf->fuente,"data2") ?>
                      <?php renderFoto($posts[$i]->acf->fotografia,"data2") ?>

                      <div class="data2">
                            <i class="fa-solid fa-clock"></i>Tiempo est. de lectura: <b><?=renderTiempoEstimadoDeLectura($posts[$i]->content->rendered) ?></b>
                       </div>
                  </div>
                 </div>

            <?php } ?>


            <?php if ($flag_publicidad) {
            echo '<div class="ads">';
            for ($i = 3; $i < 6; $i++) {
                echo '<a href="' . $ads[$i][1] . '" target="_blank" title="'.$ads[$i][2].'"><img src="images/ad/ad_' . $ads[$i][0] . '.jpg"></a>';
            }
            echo '</div>';
            }
            ?>
            
            <div class="loadingMorePosts"><div class="loader"></div></div>

          </div>

          <?php if ($flag_publicidad) { ?>
          <div id="sidebar" style="display:none;">
              <div class="ad" style="padding-top:0;margin-top:0;">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
              <div class="ad">PUB</div>
          </div>
          <?php } ?>
          
        </main>

<script>
let cantidadLimitePosts = <?=$param_cantidad_posts_index?>;
let categorias = <?=json_encode($categorias)?>;
let stopLoadingPosts = false; // Set to true when all posts are loaded
let pageNumber = 2; // Initial page number
let pagesLoaded = [];
let isLoading = false; // To prevent multiple simultaneous requests

function isScrolledToLastPost() {
    let posts = document.getElementsByClassName('post');
    if (posts.length === 0) {
        return false; // No posts available
    }
    let lastPost = posts[posts.length - 1];
    let lastPostRect = lastPost.getBoundingClientRect();
    let windowHeight = window.innerHeight;
    return lastPostRect.top <= windowHeight;
}

function fetchMediaDetails(featuredMediaId) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: `<?=$urlMedia?>/${featuredMediaId}`,
            method: 'GET',
            success: function(mediaData) {
                const sourceUrl = mediaData.source_url;
                resolve(sourceUrl); // Resolve the Promise with sourceUrl
            },
            error: function() {
                reject('Failed to fetch media details.'); // Reject the Promise on error
            }
        });
    });
}


function loadMorePosts() {
    const loadingMorePosts = document.querySelector('.loadingMorePosts');
    if (stopLoadingPosts || isLoading) {
        return; // Stop if all posts are loaded or if a request is already in progress
    }

    if (pagesLoaded[pageNumber]) {
        return;
    }

    if (document.querySelectorAll('.post').length >= cantidadLimitePosts) {
        if (loadingMorePosts) { loadingMorePosts.remove();}
        return;
    }

    isLoading = true; // Set loading to true to prevent multiple requests

    // Make an AJAX request to fetch more posts
    $.ajax({
        url: './src/ajax.php',
        method: 'GET',
        data: {
            function: 'loadMorePosts',
            page: pageNumber
        },
        success: function (response) {
            pagesLoaded[pageNumber] = true;
            let posts = JSON.parse(response);
            isLoading = false; // Reset isLoading after the request is complete
            
            // Check if there are new posts to append
            if (Array.isArray(posts) && posts.length > 0) {
                let mediaPromises = [];
                
                posts.forEach(post => {
                    if (post.featured_media > 0) {
                        mediaPromises.push(fetchMediaDetails(post.featured_media));
                    } else {
                        mediaPromises.push(Promise.resolve('')); // Resolve empty string if no media
                    }
                });

                // Wait for all media fetch promises to resolve
                Promise.all(mediaPromises)
                    .then(mediaSources => {
                        if (loadingMorePosts) { loadingMorePosts.remove();}
                        // Loop through posts and construct nuevoPost HTML with media sources
                        posts.forEach((post, index) => {

                            categoriaDisplay = "";
                            post.categories.forEach(function(cate) {
                              categoriaDisplay += `<span class="category" onClick='link(event,"categoria?id=${cate}");'>${categorias[cate]}</span>`;
                            });


                            let mediaSource = mediaSources[index];
                            mediaSourceTag = "";
                            if (mediaSource != "") {
                                mediaSourceTag = `<img src="${mediaSource}">`;
                            }

                            
                            let nuevoPost = `
                                <div class="post" onClick='link(event,"articulo?${formatDate(post.date)}/${post.slug}-${post.id}");' title="Leer artículo">
                                    ${mediaSourceTag}
                                    <div class="texto">
                                        <h3 class="volanta">${categoriaDisplay}</h3>
                                        <h2 class="titulo">${post.title.rendered}</h2>
                                        <p class="copete">${post.excerpt.rendered}</p>`;

                            if (post.acf.fuente !== "") {
                                nuevoPost += `<fuente class="data2"><i class="fa-solid fa-magnifying-glass"></i><span>Fuente: <b>${post.acf.fuente}</b></span></fuente>`;
                            }

                            if (post.acf.fotografia !== "") {
                                nuevoPost += `<foto class="data2"><i class="fa-solid fa-camera"></i><span>Foto: <b>${post.acf.fotografia}</b></span></foto>`;
                            }

                            nuevoPost += `
                                        <div class="data2">
                                            <i class="fa-solid fa-clock"></i>Tiempo est. de lectura:
                                            <b>${renderTiempoEstimadoDeLectura(post.content.rendered)}</b>
                                        </div>
                                    </div>
                                </div>`;
                            // Append the new post HTML to the 'posts' container
                            document.getElementById('posts').innerHTML += nuevoPost;
                        });

                        document.getElementById('posts').innerHTML += `<div class="loadingMorePosts"><div class="loader"></div></div>`;

                        pageNumber++; // Increment page number for the next request
                    })
                    .catch(error => {
                        console.error(error);
                        // Handle error if one of the fetchMediaDetails fails
                    });
            } else {
                document.querySelector('.loadingMorePosts').remove();
                stopLoadingPosts = true; // No more posts to load
            }
        },
        error: function () {
            isLoading = false; // Reset isLoading in case of an error
            alert('Failed to load more posts.');
        }
    });
}

window.addEventListener('scroll', function () {
    // Check if the user has scrolled to the last post
    if (isScrolledToLastPost()) {
        loadMorePosts(); // Load more posts
    }
});

</script>


<?php include_once "views/footer.php"; ?>
