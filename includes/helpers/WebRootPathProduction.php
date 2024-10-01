<?php
function WebRootPath()
{
    global $_SERVER;

    return 'https://' . $_SERVER['SERVER_NAME'] . '/';
}
