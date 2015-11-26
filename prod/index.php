<?php
header("Content-Type: text/html");
include dirname(__FILE__) . '/API/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('');
 
/* Setup the URL routing. This is production ready. */
//ADMIN ROUTE
$router->map('GET','/adesiviprespaziati.it/prod/admin/', 'admin/home.php', 'admin-home');
// Main routes that non-customers see
$router->map('GET','/adesiviprespaziati.it/prod/', 'php/home.php', 'home-base');
//$router->map('GET','/adesiviprespaziati.it/prod/home/', 'php/home.php', 'home-home');
//$router->map('GET','/adesiviprespaziati.it/prod/test/', 'php/test.php', 'test');

// Route for added pages
for( $i=0; $i < count($GLOBALS['pageObj']); $i++){
	$router->map('GET', ROOT . $GLOBALS['pageObj'][$i]['urlMask']. '/', $GLOBALS['pageObj'][$i]['path'], $GLOBALS['pageObj'][$i]['urlMask']);
}
//$router->map('GET','/adesiviprespaziati.it/prod/plans/', 'plans.php', 'plans');
//$router->map('GET','/adesiviprespaziati.it/prod/about/', 'about.php', 'about');
//$router->map('GET','/adesiviprespaziati.it/prod/contact/', 'contact.php', 'contact');
//$router->map('GET','/adesiviprespaziati.it/prod/tos/', 'tos.html', 'tos');
// Special (payments, ajax processing, etc)
//$router->map('GET','/adesiviprespaziati.it/prod/charge/[*:customer_id]/','charge.php','charge');
//$router->map('GET','/adesiviprespaziati.it/prod/pay/[*:status]/','payment_results.php','payment-results');
// API Routes
//$router->map('GET','/adesiviprespaziati.it/prod/api/[*:key]/[*:name]/', 'json.php', 'api');
/* Match the current request */
$match = $router->match();
if($match) {
  require $match['target'];
}
else {
  header("HTTP/1.0 404 Not Found");
  require '404.html';
}
?>