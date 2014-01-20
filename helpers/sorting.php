<?php
/**
* notify2me.local
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

class SortingHelper
{
    static function sorting($title, $baseLink, $order, $currentOrder, $direction)
    {
        $direction = $direction == 'asc' ? 'desc' : 'asc';
        $class = ($currentOrder == $order) ? 'sorting_' . $direction : 'sorting';
        return "<th class='$class'><a href='$baseLink&order=$order&direction=$direction'>$title</a></th>";
    }
}