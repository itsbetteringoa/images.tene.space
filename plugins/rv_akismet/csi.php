<?php
define('IN_CSI', 1);
define('PHPWG_ROOT_PATH','../../');
include_once( PHPWG_ROOT_PATH.'include/common.inc.php' );

if (!isset($_SESSION['csi']))
	$_SESSION['csi'] = 1;

//set_status_header(204);
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==');
?>