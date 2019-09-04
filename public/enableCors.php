<?php

function enableCORS() {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    return true;
}

?>