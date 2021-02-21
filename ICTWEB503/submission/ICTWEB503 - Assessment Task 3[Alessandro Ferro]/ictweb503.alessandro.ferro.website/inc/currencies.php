<?php

if(isset($_GET['currency']) && !empty($_GET['currency'])) {
    $currencies_array = array("AUD"=>1, "USD"=>0.73, "EUR"=>0.61);
    foreach($currencies_array as $key => $key_value) {
        if($_GET['currency'] == $key) {
            $_SESSION['currency'] = array("CURR"=>$key, "EX_RATE"=>$key_value);
        }
    }
}

if(!isset($_SESSION['currency'])) {
    $_SESSION['currency'] = array("CURR"=>"AUD","EX_RATE"=> 1);  
}


define("_CURR", $_SESSION['currency']["CURR"]);
define("_EX_RATE", $_SESSION['currency']["EX_RATE"]);



// if(isset($_GET['currency']) && !empty($_GET['currency'])) {
//     $_SESSION["currency"] = $_GET["currency"];
    

// }

// if(isset($_SESSION['currency'])) {
//     foreach($currencies_array as $key => $key_value) {
//         if($_SESSION['currency'] == $key) {
//             $curr = $key;
//             $ex_rate = $key_value;
//         }
//     }

//     define("_CURR", $curr);
//     define("_EX_RATE", $ex_rate);

// } else {
//     define("_CURR", "AUD");
//     define("_EX_RATE", 1);
// }

?>