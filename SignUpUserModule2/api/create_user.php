<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once './config/database.php';
include_once './user.php';
 
$database = new Database();
$db = $database->connect();

$userAuth = new User_auth($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
//Add data into user auth object

$userAuth->username = $data->username;
$userAuth->email = $data->email;
$userAuth->password =$data->password;
// make sure data is not empty
if(
    !empty($data->username) &&
    !empty($data->email) &&
    !empty($data->password)
){
 
    // set userAuth property values
    $userAuth->username = $data->username;
    $userAuth->email = $data->email;
    $userAuth->password = $data->password;
    
    // create the userAuth
    if($userAuth->registration()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "You are Successfully Registered...."));
    }
 
    // if unable to create the userAuth, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to register."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to register. Since Data is incomplete."));
}


// login Successful
if($userAuth->registration()){
    http_response_code(200);
    //echo json_encode(array("message" => "Register Successfully."));
    
        ?>
        <script type="text/javascript">
        alert("Registered Successfully");
        //history.back();
        window.location.href = 'http://localhost/Trial/class/register.php';
        </script>
        <?php
}
 
// if unable to login
else{
    http_response_code(503);
    // echo json_encode(array("message" => "NOt Regster."));
    
        ?>
        <script type="text/javascript">
        alert("Not Register");
        history.back();
        </script>
        <?php
}
?>