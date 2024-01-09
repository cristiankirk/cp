<?php
$title = "";

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
                    <p class="copete"><p><?php echo $posts[0]->excerpt->rendered; ?></p>
                    <h4 class="fecha"><?php echo formatDate($posts[0]->date); ?></h4>
                    <a href="#" class="boton">Leer nota</a>
                        <time class="readingTime">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:
                                <b><?= renderTiempoEstimadoDeLectura($posts[0]->content->rendered) ?></b>
                            </span>
                        </time>
                    </div>
                    <?php $img = getMedia($urlMedia . '/' . $posts[0]->featured_media); ?>
                    <img src="<?php echo $img; ?>">
                </div>
            </div>

            <hr>
            
            <div id="featured2">
                <div class="featured2_container"  style="cursor:pointer;"  onClick='link(event,"articulo?<?php echo formatDate($posts[1]->date); ?>/<?=$posts[1]->slug?>-<?=$posts[1]->id?>");' title="Leer artículo">
                    <?php $img = getMedia($urlMedia . '/' . $posts[1]->featured_media); ?>
                    <img src="<?php echo $img; ?>">
                    <div class="texto">
                        <h2 class="titulo"><?php echo $posts[1]->title->rendered; ?></h2>
                        <h3 class="categoria"><?php echo $categorias[$posts[1]->categories[0]]; ?></h3>
                        <h4 class="fecha"><?php echo formatDate($posts[1]->date); ?></h4>
                        <time class="readingTime">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:
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
                        <h3 class="categoria"><?php echo $categorias[$posts[2]->categories[0]]; ?></h3>
                        <h4 class="fecha"><?php echo formatDate($posts[2]->date); ?></h4>
                        <time class="readingTime">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:
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
                        <h3 class="categoria"><?php echo $categorias[$posts[3]->categories[0]]; ?></h3>
                        <h4 class="fecha"><?php echo formatDate($posts[3]->date); ?></h4>
                        <time class="readingTime">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                Tiempo estimado de lectura:
                                <b><?= renderTiempoEstimadoDeLectura($posts[3]->content->rendered) ?></b>
                            </span>
                        </time>
                    </div>
                </div>
            </div>

        </section>

        <?php if ($flag_publicidad) { ?>
        <section class="ad">
          PUB
        </section>
        <?php } ?>

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
                      <div class="readingTime2">
                            <i class="fa-solid fa-clock"></i>
                            Tiempo estimado de lectura:
                            <b><?= renderTiempoEstimadoDeLectura($posts[$i]->content->rendered) ?></b>
                        </div>
                  </div>
                 </div>

            <?php } ?>
         

          </div>

          <?php if ($flag_publicidad) { ?>
          <div id="sidebar">
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
    if (stopLoadingPosts || isLoading) {
        return; // Stop if all posts are loaded or if a request is already in progress
    }

    if (pagesLoaded[pageNumber]) {
        return;
    }

    if (document.querySelectorAll('.post').length >= cantidadLimitePosts) {
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
                                        <p class="copete">${post.excerpt.rendered}</p>
                                        <div class="readingTime2">
                                            Tiempo estimado de lectura:
                                            <b>${renderTiempoEstimadoDeLectura(post.content.rendered)}</b>
                                        </div>
                                    </div>
                                </div>`;
                            // Append the new post HTML to the 'posts' container
                            document.getElementById('posts').innerHTML += nuevoPost;
                        });
                        pageNumber++; // Increment page number for the next request
                    })
                    .catch(error => {
                        console.error(error);
                        // Handle error if one of the fetchMediaDetails fails
                    });
            } else {
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
