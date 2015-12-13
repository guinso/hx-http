<?php 
namespace Hx\Http;

interface HeaderReaderInterface {
	
	public function getContentType();
	
	public function getMethod();
	
	public function getRequestUri();
}
?>