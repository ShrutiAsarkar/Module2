<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once './config/database.php';
include_once 'todo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare todo object
$todo = new Todo($db);
 
// set ID property of record to read
$todo->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of todo to be edited
$todo->readOne();
 
if($todo->name!=null){
    // create array
    $todo_arr = array(
        "id" =>  $todo->id,
        "list" => $todolist,
        "todoDate" => $todoDate,
        "time" => $time,
            
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($todo_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user todo does not exist
    echo json_encode(array("message" => "todo does not exist."));
}
?>