<?php
require_once('core/libs/classes/JStartSite.class.php');
try{
$startSite = new JStartSite(__DIR__.'/core/config.ini',__DIR__.'/core/const.php');
$route = new JRoute();
}catch(JException $errIni) {
	echo $errIni->getMessage();
}
JDbug::startMemory();
	
	$db = new JDb();
	
	
	
new JDbug($db);
JDbug::resultMemory();
?>