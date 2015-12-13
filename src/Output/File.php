<?php 
namespace Hx\Http\Output;

class File implements \Hx\Http\OutputInterface {

	private $statusCodeService;
	
	public function __construct(\Hx\Http\StatusCode $statusCodeService)
	{
		$this->statusCodeService = $statusCodeService;
	}
	
	public function getFormatType()
	{
		return 'file';
	}
	
	public function generateOutput($statusCode, Array $data = null)
	{
		$fileName = $data['fileName'];
	
		$filePath = $data['filePath'];
	
		$this->writeHeader($statusCode, $fileName, $filePath);
	
		$this->writeBody($filePath);
	}
	
	private function writeHeader($statusCode, $fileName, $filePath) 
	{
		$msg = $this->statusCodeService->getStatusMessage($statusCode);
		
		header("HTTP/1.1 $statusCode $msg");
		
		header('Content-Type: ' . finfo_file(
				finfo_open(FILEINFO_MIME_TYPE), 
				$filePath));
		
		header('Content-Disposition: ' . 'attachment;filename="' . $fileName . '"');
		
		header('Content-Length: ' . filesize($this->value['filePath']));
		
		header('Pragma: public');
		
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	}
	
	private function writeBody($filePath)
	{
		readfile($filePath);
	}
}
?>