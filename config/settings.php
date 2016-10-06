<?php
/*
Display all errors except warnings. 
Did this to not trouble with such msgs:
Warning: mysqli_connect(): Headers and client library minor version mismatch. Headers:50541 Library:50625 in /var/www/html/eoearth_redirect_sys/controllers/redirect.php on line 71
Didn't want to solve this at the moment since MySQL is being used by MediaWiki (and probably CKAN) and others in Archive server.
*/
error_reporting(E_ALL ^ E_WARNING); //display all errors except warnings in Archive server

if(!defined('DOWNLOAD_WAIT_TIME')) define('DOWNLOAD_WAIT_TIME', '300000'); //.3 seconds
define('DOWNLOAD_ATTEMPTS', '2');
if(!defined('DOWNLOAD_TIMEOUT_SECONDS')) define('DOWNLOAD_TIMEOUT_SECONDS', '30');

/* not used
define('CACHE_PATH', '/Volumes/MacMini_HD2/sc_cache/');
define('MEDIAWIKI_MAIN_FOLDER', 'LiteratureEditor');
*/

define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);

/* MySQL credentials */
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'm173');
define('DBNAME', 'redirect_eoearth');

// define('WIKI_DOMAIN', 'editors.eol.localhost');
define('WIKI_DOMAIN', 'editors.eol.org');
define('MEDIAWIKI_FOLDER', 'eoearth');

?>
