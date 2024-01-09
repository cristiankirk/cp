<?php
include_once "config.php";
include_once "functions.php";

function loadMorePosts($pageNumber,$category) {
    global $urlPosts;
    global $urlPostsCategoria;
    if ($category == "") {
        $posts = fetch($urlPosts . "&page=" . $pageNumber);
    } else {
        $posts = fetch($urlPostsCategoria . $category . "&page=" . $pageNumber);
    }
    echo json_encode($posts);
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    if (isset($_GET['category'])) {
       $category=$_GET['category'];
    } else {
        $category="";
    }

    switch ($function) {
        case 'loadMorePosts':
            // Execute function to load more posts
            loadMorePosts($_GET['page'],$category);
            break;
        case 'anotherFunction':
            // Execute another function
            anotherFunction();
            break;
        // Add more cases for other functions as needed
        default:
            // Handle cases where function parameter doesn't match any expected values
            echo 'Invalid function parameter.';
            break;
    }
}

?>