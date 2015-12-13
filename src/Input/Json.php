<?php 
namespace Hx\Http\Input;

class Json implements \Hx\Http\InputInterface {
	
	public function getContentType()
	{
		return 'application/json';
	}
	
	public function getInput($method)
	{
		if ($method == 'GET')
		{
			$x = array();
			foreach($_GET as $k => $v)
			{
				$x[$k] = json_decode($v, true);
			}
			
			return array(
				'data' => $x
			);
		}
		else if ($method == 'POST')
		{
			//mb_parse_str(file_get_contents("php://input"), $result);
			
			return array(
				'data' => json_decode(file_get_contents("php://input"), true)
			);
		}
		else if ($method == 'PUT')
		{
			//mb_parse_str(file_get_contents("php://input"), $result);
			
			return array(
				'data' => json_decode(file_get_contents("php://input"), true)
			);
		}
		else 
		{
			Throw new \Hx\Http\HttpException(
				"Json input decoder not support request method <$method>");
		}
	}
}
?>