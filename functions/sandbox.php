<?php
/*
 *  http://www.example.com/users/page.php?id=4578&do=edit
 *
 * The url is divided into several parts:
* 		http:// - scheme, protocol to be used
*		www.example.com - server address
*		/users - path
*		page.php - filename
*		?id=4578&do=edit - parameter string
*
*
*	http://forum.codecall.net/topic/74170-clean-urls-with-php/
*
 */

function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

/* testing code
$path_info = parse_path();
echo '<pre>'.print_r($path_info, true).'</pre>';
*/

?>