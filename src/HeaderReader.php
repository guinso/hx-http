<?php 
namespace Hx\Http;

class HeaderReader implements \Hx\Http\HeaderReaderInterface {
	
	public function getContentType()
	{
		if (array_key_exists("CONTENT_TYPE", $_SERVER))
		{
			$result = $_SERVER["CONTENT_TYPE"];
			
			$position = strpos($result, ';');
			
			if($position === false)
				return $result;
			else 
			{
				return substr($result, 0, $position);
			}
			
			return $result;
		}
		else 
			return '';
	}
	
	public function getMethod()
	{
		/*
		if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
				array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER))
		{
			if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE')
			{
				return 'DELETE';
			}
			else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT')
			{
				return 'PUT';
			}
			else
			{
				Throw new \Hx\Route\HttpException(
					"Http request method <$method> not support.",
					\Hx\Route\HttpException::METHOD_NOT_SUPPORT);
			}
		}
		else
		{
			return $_SERVER['REQUEST_METHOD'];
		}
		*/
		
		return $_SERVER['REQUEST_METHOD'];
	}
	
	public function getRequestUri()
	{
		//x return $_SERVER['REQUEST_URI']; //full uri path
		
		return empty($_GET['__route__'])? '/' : $_GET['__route__'];
	}
}
?>