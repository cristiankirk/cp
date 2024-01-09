<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

include_once "endpoints.php";
include_once "functions.php";

$categorias = fetch($urlCategorias);
$cate = [];
foreach ($categorias as $categoria) {
    $cate[$categoria->id]=$categoria->name;
}
$categorias=$cate;

//FLAGS & PARAMS
$flag_publicidad = true;
$param_cantidad_posts_index = 20;
$param_cantidad_related_posts = 3;

?>