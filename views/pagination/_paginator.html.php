<?php
/**
* yoda-pagination
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/
?>

<div style="text-align: center">
    <ul class="pagination">
        <? include __DIR__ . DIRECTORY_SEPARATOR . '_first_page.html.php' ?>
        <? include __DIR__ . DIRECTORY_SEPARATOR . '_prev_page.html.php' ?>
        <?php foreach($pages as $i) {
            if($i == $page) {
                echo '<li class="disabled"><a href="#">' . $i . '</a></li>';
            } else {
                if($i == ($page - 1) || $i == ($page - 2) || $i == ($page + 1) || $i == ($page + 2)) {
                    include __DIR__ . DIRECTORY_SEPARATOR . '_page.html.php';
                }
            }
        }
        ?>
        <? include __DIR__ . DIRECTORY_SEPARATOR . '_next_page.html.php' ?>
        <? include __DIR__ . DIRECTORY_SEPARATOR . '_last_page.html.php' ?>
    </ul>
    <span class="pull-right" style="padding: 30px;"><?= sprintf('Page %s of %s', $page, count($pages)) ?></span>
</div>