<?php 
namespace Hx\Http;

class OutputService implements OutputServiceInterface {
	private $plugins;
	
	public function __construct()
	{
		$this->plugins = array(
			'file' => new Output\File(),
			'html' => new Output\Html(),
			'json' => new Output\Json(),
			'text' => new Output\Text(),
			'xml' => new Output\Xml()
		);
	}
	
	public function generateOutput($outputFormat, array $data = null)
	{
		return $this
			->getPlugin($outputFormat)
			->generateOutput(200, $data);
	}
	
	private function getPlugin($formatType)
	{
		if(array_key_exists($formatType, $this->plugins))
			return $this->plugins[$formatType];
		else
			Throw new \Hx\Http\HttpException(
				"No available OutputHandler plugin for <$formatType> found.");
	}
}
?>