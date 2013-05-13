
<?php
function videoSpinner() {	
	//Generates a random integer based on the total number of total videos on Hulu
	$xml = simplexml_load_file("http://m.hulu.com/videos?dp_id=hulu&order_by=desc&limit=%d&page=1&total=1");
	$totalVideos = $xml->total_count;
	$totalVideos = intval($totalVideos);
	$huluRandom = mt_rand(2, $totalVideos);
	echo $huluRandom;
}
?>	
<!DOCTYPE html>
<!-- Thanks: http://adammagana.com/ and Hulu -->
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<title>hulurandom - Randomly find something to watch on Hulu</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='assets/application.css' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      	<script src="assets/javascripts/html5shiv.js"></script>
    	<![endif]-->
	</head>
	<body>
		<header class="mobile-padding">
			<div class="container">
				<div class="row">
					<h1 class="span12"><span>hulu</span>random</h1>
				</div>
			</div>
		</header>
		<div class="leader mobile-padding">
			<section>
					<h2>Randomly find something to watch on Hulu</h2>
        			<form action="api.php?method=getVideos" method="GET">
            			<input type="hidden" name="limit" value="1"/>
            			<input type="hidden" name="order_by" value="name%20desc"/>
            			<!--
            			<input type="text" name="order_by" value="name%20asc"/>
            			-->
            			<input type="hidden" name="page" value="<?php videoSpinner(); ?>"/>
            			<input type="hidden" name="total" value="0"/>
            			<button class="btn btn-success btn-large" type="submit">Find Something! <span class="loader hide"><img src="assets/images/ajax-loader.gif"></span></button>
        			</form>
        	<div class="response_container">
        	</div>
    		</section>
    </div>
    <footer>
    	<div class="container">
    		<div class="row">
    			<div class="span12">
    				<p>This site was designed to make evenings watcing TV more interesting, and is not affiliated whatsoever with Hulu.</p>
    			</div>
    		</div>
    	</div>
    </footer>
	<script src="assets/jquery.min.js" type='text/javascript'></script>
	<script src='assets/application.min.js' type='text/javascript'></script>
	</body>
</html>
