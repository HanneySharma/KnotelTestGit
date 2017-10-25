<?php 
	echo "<pre>***** All Page load ******<br/>";
	exec('bin/behat --tags=press', $PageLoad);
	print_r($PageLoad);
	
	echo "<br/>***** Newsletter Subscription ******<br>";
	exec('bin/behat --tags=eventsubscription', $event);
	print_r($event);

/*	echo "<br/>***** salesforce Subscription ******<br>";
	exec('bin/behat --tags=salesforce', $salesforce);
	print_r($salesforce);*/
	

?>