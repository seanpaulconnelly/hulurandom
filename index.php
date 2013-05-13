
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<title>HuluRandom - Randomly pick something to watch on Hulu</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='assets/application.css' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      	<script src="assets/javascripts/html5shiv.js"></script>
    	<![endif]-->
	</head>
	<body>
		<h1><i class="icon-search"></i>HuluRandom</h1>
		<h2>Randomly pick something to watch on Hulu</h2>
	<hr>
    <section>
        <form action="api.php?method=getVideos" method="GET">
            <!--
            <input type="text" name="limit" value="1"/>
            <input type="text" name="order_by" value="name%20desc"/>
            <input type="text" name="order_by" value="name%20asc"/>
            <input type="text" name="page" value="1"/>
        	-->
        	<input type="text" name="total" value="1"/>
            <button type="submit">Get It!</button>
        </form>
        <h3>Response:</h3>
        <pre class="response_container">No data yet...</pre>
    </section>
		<script src="assets/jquery.min.js" type='text/javascript'></script>
		<script src='assets/application.min.js' type='text/javascript'></script>
<?php
function videoSpinner() {	
	//Generates a random integer based on the total number of total videos on Hulu
	$xml = simplexml_load_file("http://m.hulu.com/videos?dp_id=hulu&order_by=desc&limit=%d&page=1&total=1");
	$totalVideos = $xml->total_count;
	$totalVideos = intval($totalVideos);
	echo mt_rand(2, $totalVideos);
}
videoSpinner();
?>	
	</body>
</html>
