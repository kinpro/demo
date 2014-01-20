<?php
/**
* yoda-pagination
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

$isDisabled = false;
if($page == 1) $isDisabled = true;
if($isDisabled) $href = 'javascript: void(0);';
else $href = $link . (strpos($link, '&') ? '&' : '?') . 'page=1';
?>

<li><a href="<?= $href ?>">Start</a></li>