<?php
	ob_start();
	$s = file_get_contents("https://www.google.com/calendar/ical/quiiicq%40gmail.com/public/basic.ics");
	$s = str_replace('CLASS:PRIVATE', 'CLASS:PUBLIC', $s);
	function eventFilter($m) {
	        return strpos($m[0], 'PARTSTAT:NEEDS-ACTION') ? '' : $m[0];
	}
	$s = preg_replace_callback('#^BEGIN:VEVENT(.*?)^END:VEVENT\r?\n#sm', 'eventFilter', $s);
	header('Content-Type: text/calendar; charset=utf-8');
	echo $s;
	exit();
?>
