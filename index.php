<?
	ob_start();
	if (!empty($_SERVER[QUERY_STRING])) {
		$url = file_get_contents("http://www.facebook.com/ical/u.php?$_SERVER[QUERY_STRING]");
		include('ical.php');
	}
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="FB iCal filter" />
		<meta name="author" content="Pavel Dostál" />
		<title>FB iCal</title>
		<style type="text/css">
			a:link,a:visited,a:hover {
				text-decoration: none;
				color: #000;
			}
		</style>
	</head>
	<body>
		<h1>Facebook Calendar filter</h1>
		<p>Please add the original params from facebook URL to this script!</p>
		<p>From <a href="http://phpfashion.com/export-z-facebooku-do-google-calendar">Export z Facebooku do Google Calendar</a>.</p>
		<div id="footer">
			&copy; <a itemprop="url" href="http://pdostal.cz/">Pavel Dostál</a>
			( <a href="mailto:pdostal@pdostal.cz">pdostal@pdostal.cz</a> )
		</div>
	</body>
</html>