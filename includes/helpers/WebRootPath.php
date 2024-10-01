<?php
function WebRootPath($WebPath = 'dinamikaus/')
{
    global $_SERVER;

    return 'http://' . $_SERVER['SERVER_NAME'] . '/' . $WebPath;
}
