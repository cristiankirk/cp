<?php
$baseUrl = 'https://conceptoprensa.com/wp/';
$urlPostsSticky = $baseUrl.'wp-json/wp/v2/posts?sticky=true';
$urlPostsNoSticky = $baseUrl.'/wp-json/wp/v2/posts?page=1&per_page=3&sticky=false';
$urlCategorias = $baseUrl.'wp-json/wp/v2/categories';
$urlMedia = $baseUrl.'wp-json/wp/v2/media';
$urlPosts = $baseUrl.'wp-json/wp/v2/posts?sticky=false&per_page=3';
$urlSinglePost = $baseUrl.'wp-json/wp/v2/posts';
$urlRelatedTags = $baseUrl.'wp-json/wp/v2/posts?tags=';
$urlTags = $baseUrl.'wp-json/wp/v2/posts';
$urlPostsCategoria = $baseUrl.'wp-json/wp/v2/posts?categories=';
?>