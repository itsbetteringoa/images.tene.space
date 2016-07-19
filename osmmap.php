<?php
define('PHPWG_ROOT_PATH','./');
if (isset($_GET['v']) and $_GET['v'] == 1)
	include_once( PHPWG_ROOT_PATH. 'plugins/piwigo-openstreetmap/osmmap.php');
else if (isset($_GET['v']) and $_GET['v'] == 2)
	include_once( PHPWG_ROOT_PATH. 'plugins/piwigo-openstreetmap/osmmap2.php');
else if (isset($_GET['v']) and $_GET['v'] == 3)
	include_once( PHPWG_ROOT_PATH. 'plugins/piwigo-openstreetmap/osmmap3.php');
else if (isset($_GET['v']) and $_GET['v'] == 4)
	include_once( PHPWG_ROOT_PATH. 'plugins/piwigo-openstreetmap/osmmap4.php');
else
	include_once( PHPWG_ROOT_PATH. 'plugins/piwigo-openstreetmap/osmmap3.php');
?>