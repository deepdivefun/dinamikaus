<?php
// connection
$Servername = "localhost";
$Username   = "dinami28_dinamikaus";
$Password   = "Dinamikautamasaka";
$Database   = "dinami28_dinamikaus";

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
