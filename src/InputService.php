<?php 
declare(strict_types=1);

namespace Hx\Http;

class InputService implements InputServiceInterface {
	private $plugins;
	
	public function __construct()
	{
		$this->plugins = array(
			'application/json' => new Input\Json(),
			'multipart/form-data' => new Input\Multipart(),
			'application/x-www-form-urlencoded' => new Input\UrlEncoded(),
			'urlparam' => new Input\UrlParam()
		);
	}
	
	public function getInput(HeaderReaderInterface $headerReader): array
	{
		return $this
			->getPlugin($headerReader->getContentType())
			->getInput($headerReader->getMethod());
	}
	
	private function getPlugin(string $contentType): InputInterface
	{
		//use url param (GET) if no cotnent type is specified
		if(empty($contentType))
			return $this->plugins['urlparam'];
		else if(array_key_exists($contentType, $this->plugins))
			return $this->plugins[$contentType];
		else
			Throw new \Hx\Http\HttpException(
					"No available InputHandler plugin for <$contentType> found.");
	}
}
?>