<?php

require_once("../connection.php");
require_once("../models/passage.php");

$p = new Passage();
$result = $p->findByDate($link, $_GET["date"]);

echo json_encode($result);

?>