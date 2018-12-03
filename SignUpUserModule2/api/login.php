<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here
// files needed to connect to database
include_once './config/database.php';
include_once './user.php';
 
// get database connection
$database = new Database();
$db = $database->connect();
 
// instantiate userAuth object
$userAuth = new User_auth($db);

// check email existence here
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
$userAuth->email = $data->email;
$email_exists = $userAuth->emailExists();

// login Successful
if($email_exists)
{
 
    http_response_code(200);
    echo json_encode(array("message" => "login Successful."));
    
}
 
// if unable to login
else
{
    http_response_code(503);
    echo json_encode(array("message" => "invalid id or Password."));
}


?>