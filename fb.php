<?
	ob_start();
	if (!empty($_SERVER[QUERY_STRING])) {
		$s = file_get_contents("http://www.facebook.com/ical/u.php?$_SERVER[QUERY_STRING]");
		$s = str_replace('CLASS:PRIVATE', 'CLASS:PUBLIC', $s);
		function eventFilter($m) {
		        return strpos($m[0], 'PARTSTAT:NEEDS-ACTION') ? '' : $m[0];
		}
		$s = preg_replace_callback('#^BEGIN:VEVENT(.*?)^END:VEVENT\r?\n#sm', 'eventFilter', $s);
		header('Content-Type: text/calendar; charset=utf-8');
		echo $s;
		exit();
	}
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta http-equiv="Content-Language" content="English">
		<title>Screenshots</title>
		<style type="text/css">
			a:link,a:visited,a:hover {
				text-decoration: none;
				color: #000;
			}
		</style>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-28270341-1']);
		  _gaq.push(['_trackPageview']);
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	</head>
	<body>
		<h1>Facebook Calendar filter</h1>
		<p>Ples add the original params from facebook URL to this script!</p>
		<p>From <a href="http://phpfashion.com/export-z-facebooku-do-google-calendar">Export z Facebooku do Google Calendar</a>.</p>
		<div id="footer">
			&copy; <a itemprop="url" href="http://pdostal.cz/">Pavel Dostál</a>
			( <a href="mailto:pdostal@pdostal.cz">pdostal@pdostal.cz</a> )
		</div>
	</body>
</html>