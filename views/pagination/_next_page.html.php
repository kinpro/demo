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
else $href = $link . '&page=' . ($page + 1);
?>

<li><a href="<?= $href ?>">Next</a></li>