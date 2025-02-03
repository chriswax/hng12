<?php
//HNG12 Backend task to create a simple Restful API with GET Method

header("Access-Control-Allow-Origin: *"); // Allows requests from any domain
header("Access-Control-Allow-Methods: GET"); // Allowable method   POST, PUT, DELETE
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowable headers

// Set content-type to JSON for the response
header('Content-Type: application/json');

//declare variables
$myHngEmail ='chriswax.ent@gmail.com';
$dateTime = new DateTime();
$iso8601DateTime = $dateTime->format('c');
$githubUrl = 'https://github.com/chriswax/hng9-backend-stage1-Task';

$response = [
    "email" => $myHngEmail,
    "current_datetime" => $iso8601DateTime,
    "github_url" => $githubUrl
];

// Return the response as JSON
echo json_encode($response);

?>

