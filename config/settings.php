<?php

if(!defined('DOWNLOAD_WAIT_TIME')) define('DOWNLOAD_WAIT_TIME', '300000'); //.3 seconds
define('DOWNLOAD_ATTEMPTS', '2');
if(!defined('DOWNLOAD_TIMEOUT_SECONDS')) define('DOWNLOAD_TIMEOUT_SECONDS', '30');
define('CACHE_PATH', '/Volumes/MacMini_HD2/sc_cache/');
define('MEDIAWIKI_MAIN_FOLDER', 'LiteratureEditor');
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);

/* MySQL credentials */
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'm173');
define('DBNAME', 'redirect_eoearth');

define('WIKI_DOMAIN', 'editors.eol.localhost');
define('MEDIAWIKI_FOLDER', 'eoearth');

?>
