<?php
    require_once('src/Hulu.php');
    $hulu = new Hulu();

    switch($_GET['method']) {
        case 'getVideos':
            // Remove method from GET so it can be passed to the library
            unset($_GET['method']);

            // Call the method!
            $videos = $hulu->getVideos($_GET);
            
            foreach ($videos as $video) {
                $videoId = $video->video_id;
                $largeThumb = $video->thumbnail_url_16x9_medium;
                $vidDuration = $video->duration;
                $vidDescription = $video->description;
                $eid = $video->eid;
                if (!empty($video)) {
                    echo '<a target="_blank" href="http://hulu.com/watch/' . $videoId . '">Watch on Hulu</a><br/>';
                    echo '<img src="' . $largeThumb . '"/><br/>';
                    echo gmdate("H:i:s", intval($vidDuration));
                    echo '<iframe src="http://www.hulu.com/embed.html?eid=' . $eid . '" width="640px" height="360px" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>';
                    echo $vidDescription;
                }
            }
            exit;
            break;
        default:
            // ...
    }
?>