<?php 
declare(strict_types=1);

namespace Hx\Http\Output;

class Json implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType(): string
	{
		return 'json';
	}
	
	public function generateOutput(int $statusCode, Array $data = null)
	{
		$this->writeHeader($statusCode);
	
		$this->writeBody($data);
	}
	
	private function writeHeader(int $statusCode) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: application/json; charset=utf-8');
	}
	
	private function writeBody(array $data)
	{
		if($data === null)
			echo "{}";
		else
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}
?>