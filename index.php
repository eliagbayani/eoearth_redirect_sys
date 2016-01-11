<!doctype html>
<html lang="us">
<head>
    <title>EoEarth Redirect Interface</title>
    <?php require_once("config/head-entry.html") ?>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$params =& $_GET;
if(!$params) $params =& $_POST;
// print_r($params);// exit;

require_once("config/settings.php");
require_once("controllers/redirect.php");

$path = $_SERVER['REQUEST_URI'];

/*
$path = "topics/view/51cbfc8bf702fc2ba812cc39/";
$path = "topics/view/51cbfc78f702fc2ba8129e6d/index.html";
$path = "view/article/51cbed2d7896bb431f6904d6/index-topic=51cbfc77f702fc2ba8129ab9.html";  //from dbase
$path = "view/article/51cbed2d7896bb431f6904d6/?topic=51cbfc77f702fc2ba8129ab9";            //from website
*/

$ctrler = new eoearth_redirect_controller();
// require_once("templates/redirect/layout.php");
if($title = $ctrler->search_path($path))
{
    echo $ctrler->render_template('titlesearch-found', array('title' => $title));
    
    $url = $ctrler->create_url($title);
    require_once("config/script-below-entry.html.php");
}
else print $ctrler->render_template('titlesearch-notfound', array('title' => false));
?>
</body>
</html>
