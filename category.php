<?php
$title = "categoría";

include_once "src/config.php";

$idCategoria = $_GET['id'];
$posts = fetch($urlPostsCategoria . $idCategoria);

//var_dump($urlPostsCategoria . $idCategoria);
//die();




include_once "views/header.php";

?>
      <link rel="stylesheet" href="css/styleIndex.css">
      <link rel="stylesheet" href="css/styleCategoria.css">
      <div id="body">

        <main>
          <div id="posts">
            <div class="tituloCategoria"><?= $categorias[$idCategoria] ?></div>

            <?php if (empty($posts))  { ?>
                No se encontró ningún artículo.
            <?php } ?>

            <?php for ($i=0; $i < count($posts); $i++) { ?>
                <?php $img = getMedia($urlMedia . '/' . $posts[$i]->featured_media); ?>

                <div class="post" onClick='link(event,"articulo?<?=$posts[$i]->slug?>-<?=$posts[$i]->id?>");' title="Leer artículo">
                  <?php if ($img != false) { ?>
                    <img src="<?=$img?>">
                  <?php } ?>
                  <div class="texto">
                     
                      <h2 class="titulo"><?=$posts[$i]->title->rendered ?></h2>
                      <p class="copete"><?=$posts[$i]->excerpt->rendered ?></p>
                  </div>
                 </div>

            <?php } ?>
         

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
let category = <?=$idCategoria?>;

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


function loadMorePosts(category) {
    console.log(category);
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
            page: pageNumber,
            category: category
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
                              console.log(cate);
                              categoriaDisplay += `<span class="category">${categorias[cate]}</span>`;
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
        loadMorePosts(category); // Load more posts
    }
});

</script>


<?php include_once "views/footer.php"; ?>
