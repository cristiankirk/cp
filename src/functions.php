<?php

function fetch($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        // Error occurred
        $errorMessage = curl_error($ch);
        curl_close($ch);
        return false;
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 400) {
        // HTTP request failed with an error status code
        return false;
    }

    return json_decode($response);
}


function getMedia($url) {
    try {
        $response = fetch($url);

        if ($response) {
            return $response->source_url;
        } else {
            return false;
        }
    } catch (Exception $e)  {
        return false;  
    }
}

function formatDate($originalDate) {
    $timestamp = strtotime($originalDate);
    $formattedDate = date('d/m/Y', $timestamp);
    return $formattedDate;
}

function renderCategory($categoria) {
    global $categorias;
    echo "<span class='category link' onClick='link(event,\"category.php?id=".$categoria."\");'>". $categorias[$categoria]. "</span>";
}

function renderCurrentUrl() {
    $currentURL = 'http';
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $currentURL .= "s";
    }
    $currentURL .= "://";
    if($_SERVER["SERVER_PORT"] != "80") {
        $currentURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $currentURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    echo $currentURL;
}

function currentUrl() {
    $currentURL = 'http';
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $currentURL .= "s";
    }
    $currentURL .= "://";
    if($_SERVER["SERVER_PORT"] != "80") {
        $currentURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $currentURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $currentURL;
}

function renderTiempoEstimadoDeLectura($text) {
    $word_count = str_word_count(strip_tags($text));
    // Set the average reading speed in words per minute
    $average_speed = 200;
    // Calculate the estimated reading time in minutes
    $reading_time_minutes = floor($word_count / $average_speed);
    $reading_time_seconds = round(($word_count % $average_speed) / ($average_speed / 60));
    if ($reading_time_seconds < 10) {
        $reading_time_seconds_string = "0" . $reading_time_seconds;
    } else {
        $reading_time_seconds_string = $reading_time_seconds;
    }
    if ($reading_time_minutes == 0) {
        echo $reading_time_seconds_string . " seg.";
    } else {
        echo $reading_time_minutes . ":" . $reading_time_seconds_string . " min.";
    }
}

function renderFuente($fuente,$class) {
    if ($fuente != "") {
        $html = "<fuente class='".$class."'>";
        $html .= "<i class='fa-solid fa-magnifying-glass'></i>";
        $html .= "<span>Fuente: <b>".$fuente."</b></span>";
        $html .= "</fuente>";
        echo $html;
    }
}

function renderFoto($foto,$class) {
    if ($foto != "") {
        $html = "<foto class='".$class."'>";
        $html .= "<i class='fa-solid fa-camera'></i>";
        $html .= "<span>Foto: <b>".$foto."</b></span>";
        $html .= "</foto>";
        echo $html;
    }
}
?>