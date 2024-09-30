<?php
function WebRootPath($WebPath = 'dinamikaus/admin/')
{
    global $_SERVER;

    return 'http://' . $_SERVER['SERVER_NAME'] . '/' . $WebPath;
}
