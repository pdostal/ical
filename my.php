<?php
	ob_start();
	if (!isset($url)) {
		$url = file_get_contents("http://p06-calendarws.icloud.com/ca/subscribe/1/S0mbwfYpJNJOOn1EDxtXVjyMDRw9cvQMaUW70a3eBQPdV857rJP_RfeJxbzbEUx02FPNZJ2-cjoEZQggvh-syZ5RjqH53LJeZa_AhlXIRhM");
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
