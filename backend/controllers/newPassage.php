<?php

require_once("../connection.php");
require_once("../models/passage.php");

$p = new Passage();

$p->passageName = $_POST['passageName'];
$p->passageReference = $_POST['passageReference'];
$p->baseURL = $_POST['baseURL'];
$p->date = $_POST['date'];
$p->url = "https://".$_POST['baseURL']."/recver.php?String=".$_POST['passageReference']."&Out=json";

$p->save($link);

header( "Content-type: text/json" );
echo json_encode( $p );

?>