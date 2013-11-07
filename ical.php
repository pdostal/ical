<?php
	ob_start();
	if (!isset($url)) {
		$url = file_get_contents("webcal://p06-calendarws.icloud.com/ca/subscribe/1/dfIEBQ0xfxb6Gd2RwCwE_RQDTXXHbNb_S47L3nvguWX-KfBOHvzSVn0mxfUkhYPo6KeLmUWOBD7T4ku0JGpksAu0hNINd8H2YI2mOjdBvl4");
	}
	$url = str_replace('CLASS:PRIVATE', 'CLASS:PUBLIC', $url);
	function eventFilter($m) {
		return strpos($m[0], 'PARTSTAT:NEEDS-ACTION') ? '' : $m[0];
	}
	$url = preg_replace_callback('#^BEGIN:VEVENT(.*?)^END:VEVENT\r?\n#sm', 'eventFilter', $url);
	header('Content-Type: text/calendar; charset=utf-8');
	echo $url;
	exit();
?>