<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once("../connection.php");
require_once("../models/passage.php");

$p = new Passage();
if (isset($_GET["date"])){
    $result = $p->findByDate($link, $_GET["date"]);
}
else if (isset($_GET["id"])){
    $result = $p->findByID($link, $_GET["id"]);
}
else{
    $result = $p->getAll($link);
}

echo json_encode($result);

?>