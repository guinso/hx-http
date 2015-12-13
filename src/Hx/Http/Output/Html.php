<?php 
namespace Hx\Http\Output;

class Html implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType()
	{
		return 'html';
	}
	
	public function generateOutput($statusCode, Array $data = null)
	{
		$this->writeHeader($statusCode);
	
		$this->writeBody($data['header'], $data['body']);
	}
	
	private function writeHeader($statusCode) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: text/html; charset=utf-8');
	}
	
	private function writeBody($header, $body)
	{
		// this should be templatized in a real-world solution
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' .
					$header .
				'</head>' .
				$body .
			'</html>';
	}
	
	private function getServerSignature() {
		return ($_SERVER['SERVER_SIGNATURE'] == '') ?
		$_SERVER['SERVER_SOFTWARE'] . ' Server at ' .
		$_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] :
		$_SERVER['SERVER_SIGNATURE'];
	}
}
?>