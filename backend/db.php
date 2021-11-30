<?php




$conn = mysqli_connect('localhost', 'root', '', 'crud');

//checking connection

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

?>