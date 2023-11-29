<?php
$connection = new mysqli("localhost","root","elsneradmin","codingbirds");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
