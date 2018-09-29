<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case ["hi"]:
			$speech = "Hi, Nice to meet you" ;
			break;

		case ["bye"]:
			$speech = "Bye, good night";
			break;

		case ["anything"]:
			$speech = "Yes, you can type anything here";
			break;
			
		case ["shabari"]:
			$speech = "Yes, He is Great";
			break;
		
		default:
			$speech = "Sorry Dude, I didnt get that. Please ask me something else buddy.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->messages = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
