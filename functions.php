<?php
define("DEVEL", TRUE);

function dbConnect() {
    $db = new mysqli("localhost", "root", "password123", "smk_komputer_milenium");
    return $db;
}
?>