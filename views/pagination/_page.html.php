<?php
/**
 * yoda-pagination
 *
 * @author Igor Gonchar <gigorok@gmail.com>
 * @copyright 2013 Igor Gonchar
 */

$href = $link . (strpos($link, '&') ? '&' : '?') . 'page=' . $i ;
?>

<li><a href="<?= $href ?>"><?= $i ?></a></li>