<?php
    require_once('src/Hulu.php');
    $hulu = new Hulu();

    switch($_GET['method']) {
        case 'getVideos':
            // Remove method from GET so it can be passed to the library
            unset($_GET['method']);

            // Call the method!
            $videos = $hulu->getVideos($_GET);
            exit(print_r($videos));
            break;
        default:
            // ...
    }
?>