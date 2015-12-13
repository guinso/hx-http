<?php 
namespace Hx\Http\Input;

class UrlParam implements \Hx\Http\InputInterface {
	
	public function getContentType()
	{
		return 'urlparam';
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
		else 
		{
			Throw new \Hx\Http\HttpException(
				"Url param input decoder not support request method <$method>");
		}
	}
}
?>