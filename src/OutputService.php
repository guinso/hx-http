<?php 
declare(strict_types=1);

namespace Hx\Http;

class OutputService implements OutputServiceInterface {
	private $plugins;
	
	public function __construct()
	{
		$statusCode = new StatusCode();
		
		$this->plugins = array(
			'file' => new Output\File($statusCode),
			'html' => new Output\Html($statusCode),
			'json' => new Output\Json($statusCode),
			'text' => new Output\Text($statusCode),
			'xml' => new Output\Xml($statusCode)
		);
	}
	
	public function generateOutput(string $outputFormat, array $data = null)
	{
		return $this
			->getPlugin($outputFormat)
			->generateOutput(200, $data);
	}
	
	private function getPlugin(string $formatType): OutputInterface
	{
		//use url param (GET) if no cotnent type is specified
		if(empty($formatType))
			return $this->plugins['text'];
		else if(array_key_exists($formatType, $this->plugins))
			return $this->plugins[$formatType];
		else
			Throw new \Hx\Http\HttpException(
				"No available OutputHandler plugin for <$formatType> found.");
	}
}
?>