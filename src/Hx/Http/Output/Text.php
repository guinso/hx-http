<?php 
namespace Hx\Http\Output;

class Text implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType()
	{
		return 'text';
	}
	
	public function generateOutput($statusCode, Array $data = null)
	{
		$this->writeHeader($statusCode);
	
		$this->writeBody($data['data']);
	}
	
	private function writeHeader($statusCode) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: text/plain; charset=utf-8');
	}
	
	private function writeBody($data)
	{
		echo $data;
	}
}
?>