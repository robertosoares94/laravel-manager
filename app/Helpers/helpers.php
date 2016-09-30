<?php
/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
function setActive($path,$classes=null)
{
    return Request::is($path . '*') ? ' class=active '.$classes :  ' class='.$classes;
}