<?php 
declare(strict_types=1);

namespace Hx\Http\Output;

class Text implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType(): string
	{
		return 'text';
	}
	
	public function generateOutput(int $statusCode, Array $data = null)
	{
		$this->writeHeader($statusCode);
	
		$this->writeBody($data['data']);
	}
	
	private function writeHeader(int $statusCode) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: text/plain; charset=utf-8');
	}
	
	private function writeBody(string $data)
	{
		echo $data;
	}
}
?>