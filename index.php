
<?php
function videoSpinner() {	
	//Generates a random integer based on the total number of total videos on Hulu
	$xml = simplexml_load_file("http://m.hulu.com/videos?dp_id=hulu&order_by=desc&limit=%d&page=1&total=1");
	$totalVideos = $xml->total_count;
	$totalVideos = intval($totalVideos);
  // would be $totalVideos as the second param of mt_rand() if it wasn't so damn slow
	$huluRandom = mt_rand(2, 200000);
	echo $huluRandom;
}

$quotes = array();
$quotes[0] = "Patience is bitter, but its fruit is sweet.";
$quotes[1] = "Patience, grasshopper.";
$quotes[2] = "He that can have patience can have what he will.";
$quotes[3] = "Time has no meaning, Love will endure..";
$quotes[4] = "Our patience will achieve more than our force.";
$quotes[5] = "Even a snail will eventually reach its destination.";
$quotes[6] = "Well, we must wait for the future to show.";
$quotes[7] = "Waiting is a form of passive persistence.";
$quotes[8] = "A life is not a waste of time.";
$quotes[9] = "Perfect love is perfectly patient.";
$quotes[10] = "Patience is the direct antithesis of anger.";
$quotes[11] = "Genius is eternal patience.";
$quotes[12] = "Crushed again!";
$quotes[13] = "Patience is learned through waiting.";
$quotes[14] = "When you get mad, it's the time you lose.";
$quotes[15] = "Patience is a conquering virtue.";
$quotes[16] = "Learn a little patience. You never know what might be around the corner.";

$num = count($quotes);

$target = rand(0, $num-1);

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
            			<button class="btn btn-success btn-large" type="submit">Find <br class="visible-phone"/>Something! <span class="loader hide"><img src="assets/images/ajax-loader.gif"><br/><small><?php echo $quotes[$target]; ?></small></span></button>
        			</form>
        	<div class="response_container">
        	</div>
    		</section>
    </div>
    <footer>
    	<div class="container">
    		<div class="row">
    			<div class="span12">
            <p class="alert alert-warning visible-phone">On your phone?  Download the Hulu app or come back with your computer to stream right from the site.</p>
    				<p>A Sunday science experiment by <a target="_blank" href="http://www.linkedin.com/in/connellysean/">Sean Connelly</a></p>
            <p>This site was designed to make evenings watcing TV more interesting.  It's not affiliated whatsoever with Hulu.</p>
    			</div>
    		</div>
    	</div>
    </footer>
	<script src="assets/jquery.min.js" type='text/javascript'></script>
	<script src='assets/application.min.js' type='text/javascript'></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40826160-1', 'hulurandom.com');
  ga('send', 'pageview');

</script>
	</body>
</html>
