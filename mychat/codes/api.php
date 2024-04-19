<?php

require_once("classes/autoload.php")

$DB = new Database();

$data = file_get_contents("php://input");
$myobject = json_decode($data);

