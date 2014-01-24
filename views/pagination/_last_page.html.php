<?php
/**
 * yoda-pagination
 *
 * @author Igor Gonchar <gigorok@gmail.com>
 * @copyright 2013 Igor Gonchar
 */

$isDisabled = false;
if($page == count($pages)) $isDisabled = true;
if($isDisabled) $href = 'javascript: void(0);';
else $href = $link . '&page=' . count($pages);
?>

<li><a href="<?= $href ?>">End</a></li>