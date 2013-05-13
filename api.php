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
                $videoTitle = $video->title;
                $largeThumb = $video->thumbnail_url_16x9_medium;
                $vidDuration = $video->duration;
                $vidDescription = $video->description;
                $eid = $video->eid;
                if (!empty($video)) {
                    echo '<div class="container"><div class="row"><div class="span3 sidebar">';
                    echo '<h3>' . $videoTitle . '</h3>';
                    echo '<img src="' . $largeThumb . '"/>';
                    echo '<h4>Length: ' . gmdate("H:i", intval($vidDuration)) . '</h4>';
                    echo '<h4>Description</h4>';
                    echo '<p>' . $vidDescription . '</p>';
                    echo '<p class="hidden-phone"><a target="_blank" href="http://hulu.com/watch/' . $videoId . '">Watch on Hulu</a></p>';
                    echo '</div><div class="span8">';
                    echo '<iframe class="pull-right visible-desktop" src="http://www.hulu.com/embed.html?eid=' . $eid . '" width="640px" height="360px" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>';
                    echo '<iframe class="pull-right visible-tablet" src="http://www.hulu.com/embed.html?eid=' . $eid . '" width="320px" height="240px" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>';
                    echo '</div></div></div>';
                }
            }
            exit;
            break;
        default:
            // ...
    }
?>