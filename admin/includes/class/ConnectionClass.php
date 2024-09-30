<?php
// connection
$Servername = "localhost";
$Username   = "root";
$Password   = "";
$Database   = "dinamika";

// Create connection
try {
    if ($conn = new mysqli($Servername, $Username, $Password, $Database)) {
        // echo "Connected successfully";
    } else {
        throw new Exception('Unable to connect');
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
