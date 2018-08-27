<?php
header("Access-Control-Allow-Origin: *");
//$json_string = 'https://api.lsm.org/recver.php?String=Psalm119&Out=json'; // string with the url of the website
//$jsondata = file_get_contents($json_string); // fetches the information from the api
//$obj = json_decode($jsondata, TRUE); // Set second argument as TRUE, converts information from "jsondata" variable to an array
//print_r ($obj["verses"][0]["ref"]["text"]); // display the array information selected

$ch = curl_init(); 

// set url 
curl_setopt($ch, CURLOPT_URL, "https://api.lsm.org/recver.php?String=Psalm119&Out=json"); 

//return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// $output contains the output string 

$output = curl_exec($ch); 
echo $output;
/*
$temp = json_decode($output, true); // converts jSON to array

$max = sizeof($temp["verses"]); //size of array from the api

for ($i = 0; $i < $max; $i++){

    
    echo $temp["verses"][$i]["text"] . "<br>";
    echo $temp["verses"][$i]["ref"] . "<br>";
}
*/

// close curl resource to free up system resources 
curl_close($ch);      
?>