<?php 

$input = floatval($argv[1]);
define("geld",[
    100,
    50,
    20,
    10,
    5,
    2,
    1,
]);
$input2 = floatval($argv[1]) * 100;
$input2 = substr($input2, -2,2);
define("geldt",[
    50,
    20,
    10,
    5]
);
round($input, 5);
round($input2, 5);
foreach (geld as $geldvalue ){
    if (floor($input / $geldvalue) > 0) {
        $amount = floor($input / $geldvalue);
        echo $amount . " x " . $geldvalue . " euro" . PHP_EOL;
        $input = $input - ($amount * $geldvalue);  
    }
}

foreach (geldt as $geldvalue){
    if(floor($input2 / $geldvalue) > 0) {
        $amount2 = round($input2 / $geldvalue);
        echo $amount2 . " x " . $geldvalue . " cent" . PHP_EOL;
        $input2 = $input2 - ($amount2 * $geldvalue);  
}
}
?> 
