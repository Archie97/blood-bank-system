<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/sample.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$sample = new Sample($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$sample->blood_name = $data->blood_name;
$sample->blood_group = $data->blood_group;
$sample->blood_cell_count = $data->blood_cell_count;
$sample->haemoglobin = $data->haemoglobin;
 
// create the user
if($sample->create()){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "Sample was added."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to add sample."));
}
?>