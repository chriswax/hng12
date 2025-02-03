<?php
//HNG12 Backend task 1 - Number Classification API

header("Access-Control-Allow-Origin: *"); // Allows requests from any domain
header("Access-Control-Allow-Methods: GET"); // Allowable method   POST, PUT, DELETE
header("Content-Type: application/json; charset=UTF-8"); 

// This function checks if an input is a prime number
//Prime number is a whole Number greater than 1 and can only be divided by 1 and itself
//e.g: 2, 3, 5, 7, 11,13
function IsPrime($number){
    if($number <= 1) return false;
    for ($i = 2; $i <= sqrt($number); $i++){
        if ($number % $i == 0) return false;
    }
    return true;
}

//Perfert number is a positive integer that is equal to the sum of its proper divsiors(excluding itself)
//e.g 6 :: divisors 1+2+3 = 6, 28, 496, 8128, 33,550,336
function IsPerfect ($number){
    $sum = 0;
    for ($i = 1; $i < $number; $i++){
        if($number % $i == 0) $sum +=$i;
    }
    return $sum == $number;
}

//Armstrong Number also known as a narcissistic number is a number that is equal to the sum of 
//its own digits each raised to the power of the number of digits
//eg. 153 -> 1^3 + 5^3 + 3^3 = 1+125+27 = 153
//egs 370, 371, 407, 9474
function IsArmstrong ($number){
    $digits = str_split($number);
    $numberOfDigits = count($digits);
    $sum = 0;

    foreach($digits as $digit){
        $sum += pow((int)$digit, $numberOfDigits);
    }
    return $sum == $number;
}

//This function calculates the sum of digits in the input number
function getDigitSum ($number){
    return array_sum(str_split($number));
}

//Generating a fun fact from the numbers api using armstrong function
function getFunFact($number){
    if(IsArmstrong($number)){
        $url = "http://numbersapi.com/".$number."/math";
        $response = file_get_contents($url);
        if($response){
            return $response;
        }else{
            return "No Fun Fact Found about this number, help to add by going to 'http://numbersapi.com/371/math'";
        }         
    }
    return "Number is not an Armstrong number";
}


if(isset($_GET['number']) && is_numeric($_GET['number'])){ //ensure that the request has a numeric parameter

    $number = (int)$_GET['number'];   //save the number from request query in a variable
    
    $response = [ //initialize the response array
        "number" => $number,
        "is_prime" => IsPrime($number),
        "is_perfect" => IsPerfect ($number),
        "properties" => [],
        "digit_sum" => getDigitSum ($number),
        "fun_fact" => getFunFact($number),   
    ];

    //Classify the input number with properties
    if(IsArmstrong($number)){
        $response["properties"][] = "armstrong";
    }
    if($number % 2 != 0){
        $response["properties"][] = "odd";
    }else{
        $response["properties"][] = "even";
    }

    http_response_code(200);  //set response code
    echo json_encode($response); // Return the response as JSON
}else{
    //
    http_response_code(400);  //set response code
    echo json_encode([
        "number" => $number . " Invalid input, Please enter a valid number",
        "error" => true
    ]);
}


?>

