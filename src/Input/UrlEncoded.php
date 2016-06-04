<?php 
declare(strict_types=1);

namespace Hx\Http\Input;

class UrlEncoded implements \Hx\Http\InputInterface {
	
	public function getContentType(): string
	{
		return 'application/x-www-form-urlencoded';
	}
	
	public function getInput(string $method): array
	{
		if ($method == 'GET')
		{
			return array('data' => json_decode($_GET, true));
		}
		else if ($method == 'POST')
		{
			return array('data' => json_decode($_POST, true));
		}
		else if ($method == 'PUT')
		{
			mb_parse_str(file_get_contents("php://input"), $result);
			
			return array('data' => json_decode($result, true));
		}
		else 
		{
			Throw new \Hx\Http\HttpException(
				"UrlEncoded input decoder not support request method <$method>");
		}
	}
}
?>