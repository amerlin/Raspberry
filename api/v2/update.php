<?php
    $request_method=$_SERVER["REQUEST_METHOD"];
    
    //TODO: add authentication with token

    switch($request_method)
	{
        case 'GET':
            create_response();
        break;
        
        case 'POST':
            $json = file_get_contents('php://input');
            echo_response($json);
        break;

        default:
            header("HTTP/1.0 405 Method Not Allowed");
			break;
    }

    //create response
    function create_response(){
        header('Content-Type: application/json');

        //TODO: ADD SAVE TO DATABASE

        $response=array(
            'status' => 200,
            'status_message' =>'Creation ok',
            'debug' => false
        );
        echo json_encode($response);
    }

    function echo_response($json){
        $data = json_decode($json);
        $response=array(
            'datetime' => $data->datetime,
            'status_message' => $data->temperature,
            'debug' => true
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

?>