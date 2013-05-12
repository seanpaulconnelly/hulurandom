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
        <h2>Retrieving Video List</h2>
        <h3>Options:</h3>
        <form action="api.php?method=getVideos" method="GET">
            <label>Limit: </label>
            <select name="limit">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <label>Order by: </label>
            <select name="order_by">
                <option value="name%20asc">Name - Ascending</option>
                <option value="name%20desc">Name - Descending</option>
            </select>
            <label>Page: </label>
            <select name="page">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label>Total only: </label>
            <select name="total">
                <option value="0">False</option>
                <option value="1">True</option>
            </select>
            <button type="submit">Get It!</button>
        </form>
        <h3>Response:</h3>
        <pre class="response_container">No data yet...</pre>
    </section>
		<script src="assets/jquery.min.js" type='text/javascript'></script>
		<script src='assets/application.min.js' type='text/javascript'></script>
	</body>
</html>
