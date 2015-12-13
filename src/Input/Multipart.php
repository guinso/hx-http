<?php 
namespace Hx\Http\Input;

class Multipart implements \Hx\Http\InputInterface {
	
	public function getContentType()
	{
		return 'multipart/form-data';
	}
	
	public function getInput($method)
	{
		if ($method == 'GET')
		{
			return array('data' => json_decode($_GET, true));
		}
		else if ($method == 'POST')
		{
			return array(
				'data' => json_decode($_POST, true),
				'file' => $_FILES
			);
		}
		/*
		else if ($method == 'PUT')
		{
			mb_parse_str(file_get_contents("php://input"), $result);
			
			return array('data' => json_decode($result, true));
		}
		*/
		else 
		{
			Throw new \Hx\Http\HttpException(
				"multipart input decoder not support request method <$method>");
		}
	}
}
?>