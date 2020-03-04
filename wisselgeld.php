<?php

$input = $argv[1];
$bedrag = floatval($input);
$restbedrag = $bedrag;

check($restbedrag);
function check($restbedrag){
    echo !is_numeric($restbedrag);
    try{
        if(!is_numeric($restbedrag) || $restbedrag == "" || $restbedrag == null) {
            throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld kan worden");
        }
        if($restbedrag <= 0) {
            throw new Exception("ik kan geen negatief bedrag wisselen");
        }
        $restbedrag = euros($restbedrag) * 100;
        cents($restbedrag);
    }
    catch(Exception $e){
   echo $e->getMessage();
    }
}








function euros($restbedrag){
    define(
        "GELDEENHEDEN", 
        [
        500,
        200,
        100,
        50,
        20,
        10,
        5,
        2,
        1
        ]
    ); 
    foreach(GELDEENHEDEN as $euro){
        define(
            "CENTEN",
            [
            50,
            20,
            10,
            5
            ]
        );
        if($restbedrag>=$euro) {
            $aantalKeerEuroInRestBedrag = floor($restbedrag / $euro);
            $restbedrag = $restbedrag - $euro * $aantalKeerEuroInRestBedrag;
            echo($aantalKeerEuroInRestBedrag. " X " .$euro. " euro".PHP_EOL);
        }
    }
    return $restbedrag;
}


function cents($restbedrag){
    foreach(CENTEN as $euro){
        if($restbedrag>=$euro) {
            $aantalKeerEuroInRestBedrag = floor($restbedrag / $euro);
            $restbedrag = round($restbedrag - $euro * $aantalKeerEuroInRestBedrag);
            echo($aantalKeerEuroInRestBedrag. " X " .$euro. " cent".PHP_EOL);
        }
    }
}

?>