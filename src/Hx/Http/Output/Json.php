<?php 
namespace Hx\Http\Output;

use GuzzleHttp\head;
class Json implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType()
	{
		return 'json';
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
		
		header('Content-Type: application/json; charset=utf-8');
	}
	
	private function writeBody($data)
	{
		if($data === null)
			echo "{}";
		else
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}
?>