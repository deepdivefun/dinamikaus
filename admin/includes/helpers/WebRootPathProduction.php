<?php
function WebRootPath($WebPath = 'admin/')
{
    global $_SERVER;

    return 'https://' . $_SERVER['SERVER_NAME'] . '/' . $WebPath;
}
