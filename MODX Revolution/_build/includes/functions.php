<?php
/**
 * summary
 * Truncates the HTML string to the specified length
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */
/**
 * Functions for building
 */
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = str_replace('<?php','',$o);
    $o = str_replace('?>','',$o);
    $o = trim($o);
    return $o;
}