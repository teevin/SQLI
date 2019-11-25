<?php
  require_once "Controller/Process.php";

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: OPTIONS,POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
  if(stripos($content_type, 'application/json') === false){
    throw new Exception('Content type must be: application/json' . $content_type);
  }
  $json_data = file_get_contents("php://input");
  if(empty($json_data['data'])){
    $message = "There is no data in the body";
    $code = 400;
    $status = "error";
    response($message,$code,$status);
    exit;
  }

  $json_data = json_decode($_POST['data']);
  $process_data = new Process();

  if($json_data && $process_data->updateFile($json_data)){
    $message = "File Updated";
    $code = 200;
    $status = "success";
    response($message,$code,$status);
  }
  else{
    $message = "Unable to process file";
    $code = 500;
    $status = "error";
    response($message,$code,$status);
  }

  function response($message,$response_code,$response_status){
  	$response['message'] = $message;
  	$response['code'] = $response_code;
  	$response['status'] = $response_status;
    $json_response = json_encode($response);
  	echo $json_response;
  }
