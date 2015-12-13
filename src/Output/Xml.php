<?php 
namespace Hx\Http\Output;

class Xml implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType()
	{
		return 'xml';
	}
	
	public function generateOutput($statusCode, Array $data = null)
	{
		$this->writeHeader($statusCode);
	
		$this->writeBody($data);
	}
	
	private function writeHeader($statusCode) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: text/xml; charset=utf-8');
	}
	
	private function writeBody($data)
	{
		echo '<? xml version="1.0" encoding="UTF-8" ?>';
		
		$this->_writeMarkup($data);
	}
	
	private function _writeMarkup(&$data)
	{
		foreach($data as $key => $value)
		{
			if(is_array($value))
			{
				echo "<$key>" . $this->_writeMarkup($data[$key]) . "</$key>";
			} 
			else
			{
				echo "<$key>" . $value . "</$key>";
			}
		}
	}
}
?>